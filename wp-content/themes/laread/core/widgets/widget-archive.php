<?php 

/**
 * Social  Widget 
 * laread_Archive Theme
 */
class laread_Archive extends WP_Widget
{
	 function laread_Archive(){

        $widget_ops = array('classname' => 'laread-archive','description' => __( "laread Archive" ,'laread') );
		    $this->WP_Widget('laread-archive', __('laread Archive','laread'), $widget_ops);
       
    }


    function widget($args , $instance)
    {
    	extract($args);
        $title = ($instance['title']) ? $instance['title'] : __('ARCHIVE' , 'laread');
        

      echo $before_widget;
      // echo $before_title;
      // echo $title;
      echo $after_title;


		/**
		 * Widget Content
		 */
    ?>
        
        <div class="title"><?php echo $title; ?></div>
        <ul class="laread-list archive-bar">
          <?php wp_get_archives(); ?>
        </ul>


		<?php

		echo $after_widget;
    }


    function form($instance)
    {
      if(!isset($instance['title'])) $instance['title'] = __('ARCHIVE' , 'laread');
      


    	?>


       <b><label for="<?php echo $this->get_field_id('title'); ?>">
      <?php _e('Title ','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>"
                                   name="<?php echo $this->get_field_name('title'); ?>"
                 id="<?php $this->get_field_id('title'); ?>" />


                 <br />


   

    	<?php
    }




}


function reg_laread_arhcive()
{
	register_widget('laread_Archive');
}
add_action('widgets_init' , 'reg_laread_arhcive');

?>