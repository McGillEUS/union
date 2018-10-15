<?php 
/**
 * Custom Search Widget 
 * laread Theme
 */
class laread_tags extends WP_Widget
{
	 function laread_tags(){


        $widget_ops = array('classname' => 'laread-tags','description' => __( "Tags..." ,'laread') );
		    $this->WP_Widget('laread-tags', __('laread Tags','laread'), $widget_ops);
    }



    function widget( $args , $instance )
    {
    	  extract( $args );
        
        $title = (  $instance['title']  ) ? $instance['title'] : __('Search...' , 'laread');
        $limit = ($instance['limit']) ? $instance['limit'] : 10;

        echo $before_widget;
        // echo $before_title;
        // echo $title;
        echo $after_title;
		    
        $tags = get_tags();

?>
      <div class="title"><?php echo $title; ?></div>
      <ul class="laread-list">
              <li class="bar-tags">
                <?php $s=0; foreach ($tags as $tag): $s++; ?>
                  <a href="<?php echo get_tag_link( $tag->term_id ); ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>  
                <?php if ($s >= $limit ) break; ?>
                <?php endforeach ?>
              </li>
            </ul>

		<?php
  		echo $after_widget;
    }


    // Widget Admin Area

    function form($instance)
    {
      if(!isset($instance['title'])) $instance['title'] = __('Search...' , 'laread');
      if(!isset($instance['limit'])) $instance['limit'] = 10;
    	?>


       <b><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','laread') ?></label></b>
      <br />
      <input type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>"name="<?php echo $this->get_field_name('title'); ?>" id="<?php $this->get_field_id('title'); ?>" />
          <b><label for="<?php echo $this->get_field_id('limit'); ?>">
      <?php _e('Limit ','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['limit']); ?>"
                                   name="<?php echo $this->get_field_name('limit'); ?>"
                 id="<?php $this->get_field_id('limit'); ?>" />
      <br>
      <br>
    	<?php
    }
}


function reg_laread_tagsform()
{
	register_widget('laread_tags');
}
add_action('widgets_init' , 'reg_laread_tagsform');