<?php

/**
 * Bright Cloud Studio's Constant Contact Integration
 *
 * Copyright (c) 2022-2023 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/constant-contact-integration
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
**/

  
namespace Bcs\Module;
 
class ConstantContactAuthorize extends \Contao\Module
{
 
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_constant_contact_authorize';
    
	/**
	 * Initialize the object
	 *
	 * @param \ModuleModel $objModule
	 * @param string       $strColumn
	 */
	public function __construct($objModule, $strColumn='main')
	{
		parent::__construct($objModule, $strColumn);
	}
	
    /**
     * Display a wildcard in the back end
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            $objTemplate = new \BackendTemplate('be_wildcard');
 
            $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['constant_contact_authorize'][0]) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&table=tl_module&act=edit&id=' . $this->id;
 
            return $objTemplate->parse();
        }
 
        return parent::generate();
    }
 
 
    /**
     * Generate the module
     */
    protected function compile()
    {
        
        // add js file for filter functions
	    //$GLOBALS['TL_BODY'][] = '<script src="system/modules/contao_directory/assets/js/directory_list.js"></script>';

	}
} 
