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
	'ConstantContactIntegration\EventListener'      => 'system/modules/constant_contact_integration/src/EventListener.php',
    // The Listings section in the back end
	'Bcs\Backend\ConstantContactBackend'            => 'system/modules/constant_contact_integration/library/Bcs/Backend/ConstantContactBackend.php',
    // hook when processing form to enter our listing into db
    'Bcs\Handler'                                   => 'system/modules/constant_contact_integration/library/Bcs/Handler.php'
));

/* Register the templates */
TemplateLoader::addFiles(array
(
    // Front end module to make initial authorization
   	'mod_constant_contact_authorize'                => 'system/modules/constant_contact_integration/templates/modules'
));

