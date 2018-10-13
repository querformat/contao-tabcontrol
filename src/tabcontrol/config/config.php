<?php

/**
 * Contao Open Source CMS
 *
 * @package   querformat/tabcontrol
 * @author    Enrico Schiller
 * @license   GPL-3.0+
 * @copyright querformat GmbH & Co. KG
 */

$GLOBALS['TL_CTE']['includes']['qf_tabcontrol'] = 'includeQfTabcontrol';

$GLOBALS['TL_HOOKS']['addLayoutSections'][] = array('tabcontrol' => 'Tab-Inhalt');

if(TL_MODE == 'BE')
{
    $GLOBALS['TL_CSS'][]        = 'system/modules/tabcontrol/assets/css/tabcontrol.css';
}