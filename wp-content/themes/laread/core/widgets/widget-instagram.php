<?php 

/**
 * Instagram
 * laread Theme
 */
class laread_Instagram extends WP_Widget
{
	 function laread_Instagram(){

        $widget_ops = array('classname' => 'laread-Instagram','description' => __( "laread Instagram" ,'laread') );
		    $this->WP_Widget('laread-Instagram', __('laread Instagram','laread'), $widget_ops);
    }


    function widget($args , $instance)
    {
    	extract($args);
        $title = ($instance['title']) ? $instance['title'] : __('Instagram' , 'laread');
        $limit = ($instance['limit']) ? $instance['limit'] : 3;
        
        $user_name = ($instance['user_name']) ? $instance['user_name'] : '';

        $user_id = ($instance['user_id']) ? $instance['user_id'] : '';
        $client_id = ($instance['client_id']) ? $instance['client_id'] : '';
        $access_token = ($instance['access_token']) ? $instance['access_token'] : '';
        

      echo $before_widget;
      // echo $before_title;
      // echo $title;
      echo $after_title;
		
		/**
		 * Widget Content
		 */
		
		?>


    <?php 

    ?>

      <div class="title"><?php echo $title; ?></div>
      <ul class="laread-list instagram-border-bar">
          <li>
                               

       <?php  

       $return = '';
       if ( $access_token ) {

        $content  ='https://api.instagram.com/v1/users/self/media/recent/?access_token='.$access_token.'&count='.$limit;
       } else {
        $content = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent?client_id='.$client_id.'&count='.$limit;  
       }
       

       $get_content = wp_remote_get($content);


      // check for errors
       if(is_wp_error($get_content))
       {
          $error = $get_content->get_error_message;
          $return .= $error;
       }else{


          $output = json_decode( $get_content['body']);

          if(!empty($output) && is_array($output->data))
          {
               foreach ($output->data as $key => $value) {
                    
                    $caption = (is_object($value->caption)) ? $value->caption->text : '';

                      echo '<a target="_blank" href="'.$value->link.'"><img src="'.$value->images->standard_resolution->url.'" alt="'.$caption.'" /></a>';

                }

          }
         
       }


       ?>

       <p><a href="https://instagram.com/<?php echo $user_name; ?>" target="_blank"><i class="fa fa-instagram"></i> by <?php echo $user_name; ?></a></p>
              </li>
            </ul>
                
    

		      

		<?php

		echo $after_widget;
    }


    function form($instance)
    {
      if(!isset($instance['title'])) $instance['title'] = __('Instagram' , 'laread');
      if(!isset($instance['limit'])) $instance['limit'] = 3;
      if(!isset($instance['client_id'])) $instance['client_id'] = '';
      if(!isset($instance['user_id'])) $instance['user_id'] = '';


    	?>


       <b><label for="<?php echo $this->get_field_id('title'); ?>">
      <?php _e('Title ','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>"
                                   name="<?php echo $this->get_field_name('title'); ?>"
                 id="<?php $this->get_field_id('title'); ?>" />


                 <br /><br>


      <b><label for="<?php echo $this->get_field_id('user_name'); ?>">
      <?php _e('User Name ','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['user_name']); ?>"
                                   name="<?php echo $this->get_field_name('user_name'); ?>"
                 id="<?php $this->get_field_id('user_name'); ?>" />


                 <br /><br>

     <b><label for="<?php echo $this->get_field_id('user_id'); ?>">
      <?php _e('User ID','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['user_id']); ?>"
                                   name="<?php echo $this->get_field_name('user_id'); ?>"
                 id="<?php $this->get_field_id('user_id'); ?>" />

                 <p>You can get any user id http://jelled.com/instagram/lookup-user-id</p>


    <b><label for="<?php echo $this->get_field_id('client_id'); ?>">
      <?php _e('Client ID','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['client_id']); ?>"
                                   name="<?php echo $this->get_field_name('client_id'); ?>"
                 id="<?php $this->get_field_id('client_id'); ?>" />

  
      <p><b>Note : </b> Check documenations for more information about how to setup your API key .</p>

      <hr>

      <b><label for="<?php echo $this->get_field_id('access_token'); ?>">
      <?php _e('Or Access Token','laread') ?> <small>(if not working other option)</small></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['access_token']); ?>"
                                   name="<?php echo $this->get_field_name('access_token'); ?>"
                 id="<?php $this->get_field_id('access_token'); ?>" />

  
      <p><b>Note : </b> <a target="_blank" href="http://bobmckay.com/web/simple-tutorial-for-getting-an-instagram-clientid-and-access-token/">How to Can i get access token?</a> .</p>


      <b><label for="<?php echo $this->get_field_id('limit'); ?>">
      <?php _e('Limit Query','laread') ?></label></b>
      <br />

      <input type="text" class="widefat" value="<?php echo esc_attr($instance['limit']); ?>"
                                   name="<?php echo $this->get_field_name('limit'); ?>"
                 id="<?php $this->get_field_id('limit'); ?>" />


                 <br />
                 <br />

    	<?php
    }
}


function reg_Instagram_widget()
{
	register_widget('laread_Instagram');
}
add_action('widgets_init' , 'reg_Instagram_widget');

?>