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


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'qfTabcontrol',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    // Elements
    'qfTabcontrol\includeQfTabcontrol'   => 'system/modules/tabcontrol/elements/includeQfTabcontrol.php',
    // Classes
    'qfTabcontrol\qfTabcontrolClassBE'   => 'system/modules/tabcontrol/classes/qfTabcontrolClassBE.php',
));

/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'ce_includeQfTabcontrol' => 'system/modules/tabcontrol/templates',
    'be_includeQfTabcontrol' => 'system/modules/tabcontrol/templates',
));
