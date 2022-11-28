<?php

/**
 * Bright Cloud Studio's Constant Contact Integration
 *
 * Copyright (C) 2022-2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/constant-contact-integration
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
**/

/* Register Classes */
ClassLoader::addClasses(array
(
    // This is the listing module
    'Bcs\Module\ConstantContactAuthorize'           => 'system/modules/constant_contact_integration/library/Bcs/Module/ConstantContactAuthorize.php',
    // This is the Cron listener
	'ConstantContactIntegration\EventListener'      => 'system/modules/constant_contact_integration/src/EventListener.php'
));

/* Register the templates */
TemplateLoader::addFiles(array
(
    // Front end module to make initial authorization
   	'mod_constant_contact_authorize'                => 'system/modules/contao_directory/templates/modules'
));

