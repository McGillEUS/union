<?php 

/**
 * Custom Categories Widget 
 * laread Theme
 */
class laread_Categories extends WP_Widget
{
	 function laread_Categories(){

        $widget_ops = array('classname' => 'laread-cats','description' => __( "laread Categories" ,'laread') );
		    $this->WP_Widget('laread-cats', __('laread Categories','laread'), $widget_ops);
    }


    function widget($args , $instance)
    {
    	extract($args);
        $title = ($instance['title']) ? $instance['title'] : __('Categories' , 'laread');
        $enable_count = '';
        if(isset($instance['enable_count']))
        $enable_count = $instance['enable_count'] ? $instance['enable_count'] : 'checked';
      
        $limit = ($instance['limit']) ? $instance['limit'] : 4;
        

      echo $before_widget;
      // echo $before_title;
      // echo $title;
      echo $after_title;
		
		/**
		 * Widget Content
		 */
		
		?>

        <div class="title"><?php echo $title; ?></div>
        <ul class="laread-list">
              <?php 
        if($enable_count != '') {

              $args = array (
              'echo' => 0,
              'show_count' => 1,
              'title_li' => '',
              'depth' => 1 ,
              'orderby' => 'count' ,
              'order' => 'DESC' ,
              'number' => $limit
              );
        }
        else{
            $args = array (
              'echo' => 0,
              'show_count' => 0,
              'title_li' => '',
              'depth' => 1 ,
              'orderby' => 'count' ,
              'order' => 'DESC' ,
              'number' => $limit
              );
        } 
    $variable = wp_list_categories($args);
    echo $variable; 

    ?>
              
            </ul>

		<?php

		echo $after_widget;
    }


    function form($instance)
    {
      if(!isset($instance['title'])) $instance['title'] = __('Categories' , 'laread');
      if(!isset($instance['limit'])) $instance['limit'] = 4;
      if(!isset($instance['enable_count'])) $instance['enable_count'] = '';



    	?>


       <b><label for="<?php echo $this->get_field_id('title'); ?>">
      <?php _e('Title ','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>"
                                   name="<?php echo $this->get_field_name('title'); ?>"
                 id="<?php $this->get_field_id('title'); ?>" />


                 <br />



          <b><label for="<?php echo $this->get_field_id('limit'); ?>">
      <?php _e('Limit Categories ','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['limit']); ?>"
                                   name="<?php echo $this->get_field_name('limit'); ?>"
                 id="<?php $this->get_field_id('limit'); ?>" />


                 <br />

      <b><label>
      
      <input type="checkbox"  class="widefat" name="<?php echo $this->get_field_name('enable_count'); ?>"
         id="<?php $this->get_field_id('enable_count'); ?>" <?php if($instance['enable_count'] != '') echo 'checked=checked '; ?>
         />
         <?php _e('Enable Posts Count','laread') ?></label></b>

      <br>
      <br>


    

     


    	<?php
    }
}


function register_laread_cats()
{
	register_widget('laread_Categories');
}
add_action('widgets_init' , 'register_laread_cats');