<?php

if (!defined('ABSPATH')) exit;

if (!class_exists('CbDueDateCalculator_Shortcode')) :

class CbDueDateCalculator_Shortcode {

    /*
    *  __construct
    *
    *  @type    function
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   N/A
    *  @return  N/A
    */

    function __construct() {
        add_shortcode(CBDDC_BASENAME, 'CbDueDateCalculator_Shortcode::shortcode');
    }

    /*
    *  shortcode
    *
    *  @type    static
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   N/A
    *  @return  N/A
    */

    public static function shortcode() {
        ob_start();
        require dirname(__FILE__) . '/../inc/tool.php';
        $tool = ob_get_clean();

        return $tool;
    }

}

endif;