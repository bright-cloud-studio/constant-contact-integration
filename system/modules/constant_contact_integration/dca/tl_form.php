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
$GLOBALS['TL_DCA']['tl_form']['palettes']['default'] = str_replace(';{expert_legend:hide}', ';{cci_legend},cci_list;cci_implied;{expert_legend:hide}', $GLOBALS['TL_DCA']['tl_form']['palettes']['default']);

/* Add fields to tl_user */
$GLOBALS['TL_DCA']['tl_form']['fields']['cci_list'] = array
(
    'label'                     => &$GLOBALS['TL_LANG']['tl_form']['cci_list'],
    'inputType'                 => 'select',
    'default'                   => '',
    'options_callback'          => array('Bcs\Backend\ConstantContactBackend', 'optionsLists'),
    'eval'                      => array('includeBlankOption'=>false, 'mandatory'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
    'sql'                       => "varchar(255) NOT NULL default ''"
);
/* Field to skip the mandatory checkbox and give implied permission */
$GLOBALS['TL_DCA']['tl_form']['fields']['cci_implied'] = array
(
    'label'                     => &$GLOBALS['TL_LANG']['tl_form']['cci_implied'],
    'inputType'                 => 'radio',
    'options'                   => array('yes' => 'Yes', 'no' => 'No'),
    'eval'                      => array('mandatory'=>true, 'tl_class'=>'w50'),
    'sql'                       => "varchar(32) NOT NULL default ''"
);
