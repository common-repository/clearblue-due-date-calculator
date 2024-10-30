<?php

if (!defined('ABSPATH')) exit;

if (!class_exists('CbDueDateCalculator_Admin')) :

class CbDueDateCalculator_Admin {

    public static $languages = array(
        'en_UK' => 'English',
        'fr_FR' => 'Français',
        'es_ES' => 'Español',
        'br_BR' => 'Brasileiro',
        'cn_CN' => '中文',
        'de_DE' => 'Deutsche',
        'fi_FI' => 'Suomalainen',
        'it_IT' => 'Italiano',
        'kr_KR' => '한국어',
        'nl_NL' => 'Nederlands',
        'pl_PL' => 'Polskie',
        'ru_RU' => 'Pусский',
        'se_SE' => 'Svenska'
     );

    public static $colors = array(
        'background' => '#FFFFFF',
        'title' => '#00457C',
        'text' => '#222222',
        'button' => '#00457C',
        'button-text' => '#FFFFFF',
        'input' => '#FFFFFF',
        'border' => '#EBEBEB',
        'error' => '#DC3545'
    );

    public static $formats = array(
        'square',
        'round'
    );

    public static $options = array();

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
        add_action('admin_menu', 'CbDueDateCalculator_Admin::admin_menu');
        add_action('admin_enqueue_scripts', 'CbDueDateCalculator_Admin::load_assets');

        self::update_options();
        self::$options = self::get_options();
    }

    /*
    *  admin_menu
    *
    *  @type    static
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   N/A
    *  @return  N/A
    */

    public static function admin_menu() {
        add_submenu_page(
            'tools.php',
            CbDueDateCalculator_Data::__(CBDDC_NAME),
            CbDueDateCalculator_Data::__(CBDDC_NAME),
            'manage_options',
            CBDDC_BASENAME,
            'CbDueDateCalculator_Admin::admin'
        );
    }

    /*
    *  admin
    *
    *  @type    static
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   N/A
    *  @return  N/A
    */

    public static function admin() {
        require dirname(__FILE__) . '/../inc/admin.php';
    }

    /*
    *  get_options
    *
    *  @type    static
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   N/A
    *  @return  $options
    */

    public static function get_options() {
        $options = array(
            'language' => get_option('cbddc-language', 'en_UK'),
            'format' => get_option('cbddc-format', 'square'),
            'show-credits' => get_option('cbddc-show-credits', 1),
            'colors' => array()
        );

        foreach (CbDueDateCalculator_Admin::$colors as $key => $default) {
            $options['colors'][$key] = get_option('cbddc-color-' . $key, $default);
        }
        return $options;
    }

    /*
    *  update_options
    *
    *  @type    static
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   N/A
    *  @return  N/A
    */

    public static function update_options() {
        if (isset($_POST['cbddc-submit'])) {
            if (isset($_POST['cbddc-reset'])) {
                self::reset_options();
            }
            else {
                foreach ($_POST as $key => $value) {
                    if (strpos($key, 'cbddc-') === 0) {
                        $safe_value = sanitize_text_field($value);
                        update_option($key, $safe_value);
                    }
                }
                if (!isset($_POST['cbddc-show-credits'])) {
                    update_option('cbddc-show-credits', 0);
                }
                else {
                  update_option('cbddc-show-credits', 1);
                }
            }
        }
    }

    /*
    *  reset_options
    *
    *  @type    static
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   N/A
    *  @return  N/A
    */

    public static function reset_options() {
        update_option('cbddc-language', array_keys(self::$languages)[0]);
        update_option('cbddc-format', self::$formats[array_keys(self::$formats)[0]]);
        update_option('cbddc-show-credits', 1);

        foreach (self::$colors as $key => $color) {
            update_option('cbddc-color-' . $key, $color);
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
            'spectrum',
            CBDDC_PLUGIN_URL . 'assets/css/vendor/spectrum.css',
            array(),
            '2.0.0'
        );

        wp_enqueue_style(
            CBDDC_BASENAME,
            CBDDC_PLUGIN_URL . 'assets/css/' . CBDDC_BASENAME . '-admin.css',
            array(),
            CBDDC_VERSION
        );

        wp_enqueue_script(
            'spectrum',
            CBDDC_PLUGIN_URL . 'assets/js/vendor/spectrum.min.js',
            array('jquery'),
            '2.0.0',
            true
        );

        wp_enqueue_script(
            CBDDC_BASENAME,
            CBDDC_PLUGIN_URL . 'assets/js/' . CBDDC_BASENAME . '-admin.js',
            array('jquery'),
            CBDDC_VERSION,
            true
        );
    }

}

endif;
