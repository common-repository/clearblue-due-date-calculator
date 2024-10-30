<?php
/**
 * Plugin Name: Clearblue® Due Date Calculator
 * Plugin URI: 
 * Description: Estimates the date a baby is due to be born by using the date of the first day of the woman’s last period and her average menstrual cycle length.
 * Version: 1.0.4
 * Author: Agence Kali
 * Author URI: http://www.agencekali.com/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: clearblue-due-date-calculator
 */

if (!defined('ABSPATH')) exit;

if (!class_exists('CbDueDateCalculator')) :

define('CBDDC_PLUGIN_URL',   plugin_dir_url(__FILE__));
define('CBDDC_BASENAME',     'clearblue-due-date-calculator');
define('CBDDC_NAME',         'Due Date Calculator');
define('CBDDC_VERSION',      '1.0.4');

require dirname(__FILE__) . '/class/plugin.php';
require dirname(__FILE__) . '/class/admin.php';
require dirname(__FILE__) . '/class/widget.php';
require dirname(__FILE__) . '/class/shortcode.php';
require dirname(__FILE__) . '/class/data.php';

new CbDueDateCalculator();

endif;
