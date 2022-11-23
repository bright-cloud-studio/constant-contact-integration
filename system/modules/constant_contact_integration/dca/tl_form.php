<?

/**
 * Bright Cloud Studio's Constant Contact Integration
 *
 * @copyright  2022-2023 Bright Cloud Studio
 * @package    bright-cloud-studio/constant-contact-integration
 * @license    GNU/LGPL
 * @filesource
 */

/* Add fields to tl_user */
$GLOBALS['TL_DCA']['tl_form']['fields']['state'] = array
(
  'sorting'                 => true,
  'inputType'               => 'text',
  'eval'                    => array('includeBlankOption'=>true, 'feEditable'=>true, 'feViewable'=>true, 'feGroup'=>'address', 'tl_class'=>'w50'),
  'sql'                     => "varchar(64) NOT NULL default ''"
);
