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

class includeQfTabcontrol extends \ContentElement {

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_includeQfTabcontrol';

    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            /** @var \BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate('be_includeQfTabcontrol');
            $objTemplate->tabArticles    = deserialize($this->qf_tabcontrol_articles);
            $objTemplate->collapsed      = $this->qf_tabcontrol_collapsed;
            $objTemplate->id             = $this->id;
            return $objTemplate->parse();
        }

        return parent::generate();
    }

    /**
     * Generate the content element
     */
    protected function compile()
    {
        $this->Template->tabArticles    = deserialize($this->qf_tabcontrol_articles);
        $this->Template->collapsed      = $this->qf_tabcontrol_collapsed;
    }

}
