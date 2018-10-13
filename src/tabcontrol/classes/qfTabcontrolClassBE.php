<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   qfTabcontrol
 * @author    Enrico Schiller
 * @license   GPL-3.0+
 * @copyright querformat GmbH & Co. KG
 */


namespace qfTabcontrol;


class qfTabcontrolClassBE extends \Backend
{
    /**
     * Import the back end user object
     */
    public function __construct()
    {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }

    /**
     * Get all articles and return them as array (article alias)
     *
     * @param DataContainer $dc
     *
     * @return array
     */
    public function getArticleAlias()
    {
        $arrPids = array();
        $arrAlias = array();

        if (!$this->User->isAdmin)
        {
            foreach ($this->User->pagemounts as $id)
            {
                $arrPids[] = $id;
                $arrPids = array_merge($arrPids, $this->Database->getChildRecords($id, 'tl_page'));
            }

            if (empty($arrPids))
            {
                return $arrAlias;
            }

            $objAlias = $this->Database->prepare("SELECT a.id, a.pid, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid WHERE a.pid IN(". implode(',', array_map('intval', array_unique($arrPids))) .") AND a.inColumn = 'tabcontrol' ORDER BY parent, a.sorting")
                ->execute();
        }
        else
        {
            $objAlias = $this->Database->prepare("SELECT a.id, a.pid, a.title, a.inColumn, p.title AS parent FROM tl_article a LEFT JOIN tl_page p ON p.id=a.pid WHERE a.inColumn = 'tabcontrol' ORDER BY parent, a.sorting")
                ->execute();
        }

        if ($objAlias->numRows)
        {
            \Contao\System::loadLanguageFile('tl_article');

            while ($objAlias->next())
            {
                $key = $objAlias->parent . ' (ID ' . $objAlias->pid . ')';
                $arrAlias[$key][$objAlias->id] = $objAlias->title . ' (' . ($GLOBALS['TL_LANG']['COLS'][$objAlias->inColumn] ?: $objAlias->inColumn) . ', ID ' . $objAlias->id . ')';
            }
        }

        return $arrAlias;
    }
}