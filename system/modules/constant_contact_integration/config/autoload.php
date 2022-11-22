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
	'ConstantContactIntegration\EventListener' => 'system/modules/constant_contact_integration/src/EventListener.php'
));
