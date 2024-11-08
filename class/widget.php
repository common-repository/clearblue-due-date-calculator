<?php

if (!defined('ABSPATH')) exit;

if (!class_exists('CbDueDateCalculator_Widget')) :

class CbDueDateCalculator_Widget extends WP_Widget {

	public $args = array(

	);

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
        parent::__construct(
        	CBDDC_BASENAME . '-widget',
        	CbDueDateCalculator_Data::__(CBDDC_NAME),
        	array(
        		//'description' => CbDueDateCalculator_Data::__("Clearblue Ovulation Calculator Widget Description")
        	)
        );

        add_action('widgets_init', function() {
        	register_widget('CbDueDateCalculator_Widget');
        });
    }

    /*
    *  widget
    *
    *  @type    function
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   $args
    *  @param   $instance
    *  @return  N/A
    */

    public function widget($args, $instance) {
    	require dirname(__FILE__) . '/../inc/tool.php';
    }

    /*
    *  form
    *
    *  @type    function
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   $instance
    *  @return  N/A
    */

    public function form($instance) {

    }

    /*
    *  update
    *
    *  @type    function
    *  @date    2020-02-05
    *  @since   1.0
    *
    *  @param   $new_instance
    *  @param   $old_instance
    *  @return  $instance
    */

    public function update($new_instance, $old_instance) {
        $instance = array();
  
        return $instance;
    }
}

endif;