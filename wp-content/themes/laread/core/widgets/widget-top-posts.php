<?php 

/**
 * Featrher Top Posts 
 * Featrher Theme
 */
class laread_TopPosts extends WP_Widget
{
	 function laread_TopPosts(){

        $widget_ops = array('classname' => 'laread-topposts','description' => __( "laread Popular Posts" ,'laread') );
		    $this->WP_Widget('laread-topposts', __('laread Popular Posts','laread'), $widget_ops);
       
    }


    function widget($args , $instance)
    {
    	 extract($args);
        $title = ($instance['title']) ? $instance['title'] : __('Popular Posts' , 'laread');
        $limit = ($instance['limit']) ? $instance['limit'] : 5;

      echo $before_widget;
      // echo $before_title;
      // echo $title;
      echo $after_title;

      wp_reset_query();
                  $featured_args = array(
                      'orderby' => 'comment_count',
                      'order' => 'DESC',
                      'posts_per_page'=>$limit,
                      'offset' =>1
                    );


                  $featured_query = new WP_Query($featured_args);
                
		
    ?>
      
          
          <div class="title"><?php echo $title; ?></div>
          <ul class="laread-list">
                
              <?php if($featured_query->have_posts()) : while($featured_query->have_posts()) : $featured_query->the_post(); ?>
              
              <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a><i class="date"><?php echo get_the_date('d M '); ?></i></li>
              
              <?php endwhile; endif; wp_reset_query();  ?>

            </ul>
		<?php

		echo $after_widget;
    }


    function form($instance)
    {
      if(!isset($instance['title'])) $instance['title'] = __('Popular Posts' , 'laread');
      if(!isset($instance['limit'])) $instance['limit'] = 5;
      


    	?>


      <b><label for="<?php echo $this->get_field_id('title'); ?>">
      <?php _e('Title ','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>"
                                   name="<?php echo $this->get_field_name('title'); ?>"
                 id="<?php $this->get_field_id('title'); ?>" />


                 <br />

      <b><label for="<?php echo $this->get_field_id('limit'); ?>">
      <?php _e('Limit Posts Number ','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['limit']); ?>"
                                   name="<?php echo $this->get_field_name('limit'); ?>"
                 id="<?php $this->get_field_id('limit'); ?>" />

      <br>
      <br>
   

    	<?php
    }




}


function register_laread_posts()
{
	register_widget('laread_TopPosts');
}
add_action('widgets_init' , 'register_laread_posts');