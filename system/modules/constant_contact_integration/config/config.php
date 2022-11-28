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

/* Front end modules */
$GLOBALS['FE_MOD']['constant_contact_integration']['constant_contact_authorize'] 	= 'Bcs\Module\DirectoryList';

/* Crons */
$GLOBALS['TL_CRON']['minutely'][] = ['ConstantContactIntegration\EventListener', 'refreshToken'];
