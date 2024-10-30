<?php

if (!defined('ABSPATH')) exit;

class CbDueDateCalculator {

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
        new CbDueDateCalculator_Admin();
        new CbDueDateCalculator_Data();
        new CbDueDateCalculator_Widget();
        new CbDueDateCalculator_Shortcode();

        add_action('wp_enqueue_scripts', 'CbDueDateCalculator::load_assets');
        add_action('wp_head', 'CbDueDateCalculator::add_inline_style', 100);

        // on update, always check the credits
        if (get_option('cbddc-version') != CBDDC_VERSION) {
            update_option('cbddc-show-credits', 1);
            update_option('cbddc-version', CBDDC_VERSION);
        }
    }


    /*
    *  load_assets
    *
    *  @type    static
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   N/A
    *  @return  N/A
    */

    public static function load_assets() {
        wp_enqueue_style(
            'air-datepicker',
            CBDDC_PLUGIN_URL . 'assets/css/vendor/datepicker.min.css',
            array(),
            '2.2.3'
        );

        wp_enqueue_style(
            CBDDC_BASENAME,
            CBDDC_PLUGIN_URL . 'assets/css/' . CBDDC_BASENAME . '.css',
            array(),
            CBDDC_VERSION
        );

        wp_enqueue_script(
            'air-datepicker',
            CBDDC_PLUGIN_URL . 'assets/js/vendor/datepicker.min.js',
            array('jquery'),
            '2.2.3',
            true
        );

        wp_enqueue_script(
            'clearblue-datepicker',
            CBDDC_PLUGIN_URL . 'assets/js/clearblue-datepicker.js',
            array('jquery'),
            '1.0.0',
            true
        );

        wp_enqueue_script(
            CBDDC_BASENAME,
            CBDDC_PLUGIN_URL . 'assets/js/' . CBDDC_BASENAME . '.js',
            array('jquery'),
            CBDDC_VERSION,
            true
        );
    }

    /*
    *  add_inline_style
    *
    *  @type    static
    *  @date    2020-02-11
    *  @since   1.0
    *
    *  @param   N/A
    *  @return  N/A
    */

    public static function add_inline_style() {
        $styles = '<style>';
        $styles .= ':root {';

        foreach (CbDueDateCalculator_Admin::$options['colors'] as $key => $value) {
            $styles .= '--cbddc-color-' . $key . ': ' . $value . ';';
        }

        $styles .= '}';
        $styles .= '</style>';

        echo $styles;
    }

}
