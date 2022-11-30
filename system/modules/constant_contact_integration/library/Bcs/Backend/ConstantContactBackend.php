<?php

/**
 * Contao Directory - Users can make submissions to a directory with a module to display and filter the results.
 *
 * Copyright (C) 2022 Bright Cloud Studio
 *
 * @package    bright-cloud-studio/contao-directory
 * @link       https://www.brightcloudstudio.com/
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 */

 
namespace Bcs\Backend;

use Contao\DataContainer;

class ConstantContactBackend extends \Backend
{
    
    public function optionsLists() {
		return array(
            'USA'       => 'United States',
            'Afghanistan'    => 'Afghanistan',
            'Albania'    => 'Albania');
	}
}
