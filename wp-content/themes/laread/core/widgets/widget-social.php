<?php 

/**
 * Social  Widget 
 * 
 */
class laread_Social extends WP_Widget
{
	 function laread_Social(){

        $widget_ops = array('classname' => 'laread-social','description' => __( "laread Social Networks" ,'laread') );
		    $this->WP_Widget('laread-social', __('laread Social Networks','laread'), $widget_ops);
       
    }


    function widget($args , $instance)
    {
    	extract($args);
        $title = ($instance['title']) ? $instance['title'] : __('FOLLOW US' , 'laread');
        

      echo $before_widget;
      // echo $before_title;
      // echo $title;
      echo $after_title;

		/**
		 * Widget Content
		 */

    $opts = TitanFramework::getInstance( 'laread' );
        $fb_link = $opts->getOption( 'social_facebook_link' );
        $tw_link = $opts->getOption( 'social_twitter_link' );
        $gp_link = $opts->getOption( 'social_google_plus' );
        $pt_link = $opts->getOption( 'social_pinterest_link' );
    ?>
        
        <div class="title"><?php echo $title; ?></div>
        <ul class="laread-list social-bar">
                            <li class="social-icons">
                                <a href="<?php echo $fb_link ?>"><i class="fa fa-facebook"></i></a>
                                <a href="<?php echo $tw_link ?>"><i class="fa fa-twitter"></i></a>
                                <a href="<?php echo $gp_link ?>"><i class="fa fa-google-plus"></i></a>
                                <a href="<?php echo $pt_link; ?>"><i class="fa fa-dribbble"></i></a>
                            </li>
                        </ul>


		<?php

		echo $after_widget;
    }


    function form($instance)
    {
      if(!isset($instance['title'])) $instance['title'] = __('FOLLOW US' , 'laread');
      


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


function reg_social_widget()
{
	register_widget('laread_Social');
}
add_action('widgets_init' , 'reg_social_widget');

?>