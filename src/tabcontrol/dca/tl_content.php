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


$GLOBALS['TL_DCA']['tl_content']['palettes']['qf_tabcontrol']
= '{type_legend},name,type'
. ';{Tabs},qf_tabcontrol_articles'
. ';{Einstellungen},qf_tabcontrol_collapsed,qf_tabcontrol_hashchange'
. ';{template_legend:hide},customTpl'
. ';{protected_legend:hide},protected'
. ';{expert_legend:hide},guests,invisible,cssID,space';



$GLOBALS['TL_DCA']['tl_content']['fields']['qf_tabcontrol_articles'] = array
(
    'label'         => array(' '),
    'inputType'     => 'multiColumnWizard',
    'exclude'       => true,
    'eval'          => array
    (
        'dragAndDrop'  => true,
        'columnFields' => array
        (
            'title' => array(
                'label'         	=> array('<strong>Name</strong>'),
                'inputType'     	=> 'text',
                'eval'         => array('mandatory' => true),
            ),
            'subtitle' => array(
                'label'         	=> array('<strong>Zusatz</strong>'),
                'inputType'     	=> 'text'
            ),
            'articleID' => array
            (
                'label'         	=> array('<strong>Artikel</strong>'),
                'inputType'     	=> 'select',
                'options_callback'  => array('qfTabcontrolClassBE', 'getArticleAlias'),
                'eval'              => array('includeBlankOption'=>true,'chosen'=>true,'style'=>'width:300px'),
                'wizard' => array
                (
                    array('tl_content', 'editArticleAlias')
                ),
            ),
            'link' => array
            (
                'label'         	=> array('<strong>Link</strong>'),
                'search'            => true,
                'inputType'         => 'text',
                'eval'              => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'tl_class'=>'wizard'),
                'wizard' => array
                (
                    array('tl_content','pagePicker')
                )
            ),
        ),
        'tl_class' => 'qfTabcontrol'
    ),
    'sql'           => "blob NOT NULL"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['qf_tabcontrol_collapsed'] = array
(
    'label'         => array('Kein aktiver Tab','Standardmäßig ist der oberste Tab in der Liste aktiv und aufgeklappt. Hiermit sind alle Tabs anfangs geschlossen und werden auch zuklappbar.'),
    'exclude'       => true,
    'inputType'     => 'checkbox',
    'sql'           => "char(1) NOT NULL default ''"
);
