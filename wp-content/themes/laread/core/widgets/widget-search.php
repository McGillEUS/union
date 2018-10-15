<?php 
/**
 * Custom Search Widget 
 * laread Theme
 */
class laread_search extends WP_Widget
{
	 function laread_search(){


        $widget_ops = array('classname' => 'laread-search','description' => __( "Search..." ,'laread') );
		    $this->WP_Widget('laread-search', __('laread Search','laread'), $widget_ops);
    }



    function widget( $args , $instance )
    {
    	  extract( $args );
        
        $title = (  $instance['title']  ) ? $instance['title'] : __('Search...' , 'laread');

        echo $before_widget;
        // echo $before_title;
        // echo $title;
        echo $after_title;
		
?>

      <form class="laread-form search-form" method="get" action="<?php echo laread_HOME; ?>">
        <div class="input"><input type="text" name="s" class="form-control" placeholder="<?php echo $title; ?>"></div>
        <button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
      </form>

		<?php
  		echo $after_widget;
    }


    // Widget Admin Area

    function form($instance)
    {
      if(!isset($instance['title'])) $instance['title'] = __('Search...' , 'laread');
      
    	?>


       <b><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','laread') ?></label></b>
      <br />
      <input type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>"name="<?php echo $this->get_field_name('title'); ?>" id="<?php $this->get_field_id('title'); ?>" />
         
      <br>
      <br>
    	<?php
    }
}


function reg_laread_searchform()
{
	register_widget('laread_search');
}
add_action('widgets_init' , 'reg_laread_searchform');