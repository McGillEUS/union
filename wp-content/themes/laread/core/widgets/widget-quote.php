<?php 
/**
 * Custom Search Widget 
 * laread Theme
 */
class laread_quote extends WP_Widget
{
	 function laread_quote(){


        $widget_ops = array('classname' => 'laread-quote','description' => __( "Quote..." ,'laread') );
		    $this->WP_Widget('laread-quote', __('laread Quote','laread'), $widget_ops);
    }



    function widget( $args , $instance )
    {
    	  extract( $args );
        
        $author_name = (  $instance['author_name']  ) ? $instance['author_name'] : __('Search...' , 'laread');
        $quote = (  $instance['quote']  ) ? $instance['quote'] : __('Search...' , 'laread');

        echo $before_widget;
        // echo $before_title;
        // echo $title;
        echo $after_title;

?>  

        <div class="laread-list quotes-basic">
              <i class="fa fa-quote-left"></i>
              <p><?php echo $quote; ?></p>
              <span class="whosay">- <?php echo $author_name; ?> </span>
            </div>


		<?php
  		echo $after_widget;
    }


    // Widget Admin Area

    function form($instance)
    {
      if(!isset($instance['author_name'])) $instance['author_name'] = '';
      if(!isset($instance['quote'])) $instance['quote'] = '';
      
    	?>


       <b><label for="<?php echo $this->get_field_id('author_name'); ?>"><?php _e('Author Name','laread') ?></label></b>
      <br />
      <input type="text" class="widefat" value="<?php echo esc_attr($instance['author_name']); ?>"name="<?php echo $this->get_field_name('author_name'); ?>" id="<?php $this->get_field_id('author_name'); ?>" />
         <br />

         <b><label for="<?php echo $this->get_field_id('quote'); ?>"><?php _e('Quote','laread') ?></label></b>
      <br />
      <textarea class="widefat" name="<?php echo $this->get_field_name('quote'); ?>" id="<?php $this->get_field_id('quote'); ?>"><?php echo esc_attr($instance['quote']); ?></textarea>
    
      <br>
      <br>
    	<?php
    }
}


function reg_laread_quoteform()
{
	register_widget('laread_quote');
}
add_action('widgets_init' , 'reg_laread_quoteform');