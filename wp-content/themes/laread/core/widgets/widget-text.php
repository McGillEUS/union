<?php 
/**
 * Custom Search Widget 
 * laread Theme
 */
class laread_text extends WP_Widget
{
	 function laread_text(){


        $widget_ops = array('classname' => 'laread-text','description' => __( "Text..." ,'laread') );
		    $this->WP_Widget('laread-text', __('laread Text','laread'), $widget_ops);
    }



    function widget( $args , $instance )
    {
    	  extract( $args );
        
        $author_name = (  $instance['author_name']  ) ? $instance['author_name'] : __('...' , 'laread');
        $quote = (  $instance['quote']  ) ? $instance['quote'] : __('...' , 'laread');

        echo $before_widget;
        // echo $before_title;
        // echo $title;
        echo $after_title;

?>  
        <div class="title"><?php echo $author_name; ?> </div>
        <ul class="laread-list">
              <li class="text-bar">
                <p><?php echo $quote; ?></p>
              </li>
            </ul>

		<?php
  		echo $after_widget;
    }


    // Widget Admin Area

    function form($instance)
    {
      if(!isset($instance['author_name'])) $instance['author_name'] = '';
      if(!isset($instance['quote'])) $instance['quote'] = '';
      
    	?>


       <b><label for="<?php echo $this->get_field_id('author_name'); ?>"><?php _e('Text Title','laread') ?></label></b>
      <br />
      <input type="text" class="widefat" value="<?php echo esc_attr($instance['author_name']); ?>"name="<?php echo $this->get_field_name('author_name'); ?>" id="<?php $this->get_field_id('author_name'); ?>" />
         <br />

         <b><label for="<?php echo $this->get_field_id('quote'); ?>"><?php _e('Text','laread') ?></label></b>
      <br />
      <textarea class="widefat" name="<?php echo $this->get_field_name('quote'); ?>" id="<?php $this->get_field_id('quote'); ?>"><?php echo esc_attr($instance['quote']); ?></textarea>
      
      <br>
      <br>
    	<?php
    }
}


function reg_laread_textform()
{
	register_widget('laread_text');
}
add_action('widgets_init' , 'reg_laread_textform');