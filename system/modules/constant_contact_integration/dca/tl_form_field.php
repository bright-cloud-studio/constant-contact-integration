<?

/**
 * Bright Cloud Studio's Constant Contact Integration
 *
 * @copyright  2022-2023 Bright Cloud Studio
 * @package    bright-cloud-studio/constant-contact-integration
 * @license    GNU/LGPL
 * @filesource
 */

 /* Extend the tl_news palettes */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['text'] = str_replace(';{invisible_legend:hide}', ';{cci_linked_field_legend},cci_linked_field;{invisible_legend:hide}', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['text']);
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['checkbox'] = str_replace(';{invisible_legend:hide}', ';{cci_express_permission_legend},cci_express_permission;{invisible_legend:hide}', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['checkbox']);

/* Add fields to tl_user */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['cci_linked_field'] = array
(
    'label'                     => &$GLOBALS['TL_LANG']['tl_form_field']['cci_linked_field'],
    'inputType'                 => 'select',
    'default'                   => '',
    'options_callback'          => array('Bcs\Backend\ConstantContactBackend', 'optionsFields'),
    'eval'                      => array('includeBlankOption'=>false, 'mandatory'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql'                       => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['cci_express_permission'] = array
(
    'label'                     => &$GLOBALS['TL_LANG']['tl_form_field']['cci_express_permission'],
    'inputType'                 => 'checkbox',
    'default'                   => '',
    'eval'                      => array('mandatory'=>false, 'multiple'=>false, 'tl_class'=>'w50'),
	'sql'                       => "varchar(255) NOT NULL default ''"
);
