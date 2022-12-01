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

/* Add a palette to tl_module */
$GLOBALS['TL_DCA']['tl_module']['palettes']['constant_contact_authorize'] 		= '{title_legend},name,headline,type;{cci_auth_legend},cci_key,cci_secret,cci_url;{template_legend:hide},customTpl;{expert_legend:hide},guests,cssID,space';

// Sort Fields
$GLOBALS['TL_DCA']['tl_module']['fields']['cci_key'] = array
(
	'label' 			    => &$GLOBALS['TL_LANG']['tl_module']['cci_key'],
	'inputType' 		    => 'text',
    'default'               => '',
    'search'                => true,
	'eval' 				    => array('mandatory'=>false, 'tl_class'=>'clr long'),
	'sql' 				    => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['cci_secret'] = array
(
	'label' 			    => &$GLOBALS['TL_LANG']['tl_module']['cci_secret'],
	'inputType' 		    => 'text',
    'default'               => '',
    'search'                => true,
	'eval' 				    => array('mandatory'=>false, 'tl_class'=>'clr long'),
	'sql' 				    => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['cci_url'] = array
(
	'label' 			    => &$GLOBALS['TL_LANG']['tl_module']['cci_url'],
	'inputType' 		    => 'text',
    'default'               => '',
    'search'                => true,
	'eval' 				    => array('mandatory'=>false, 'tl_class'=>'clr long'),
	'sql' 				    => "varchar(255) NOT NULL default ''"
);

