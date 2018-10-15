<?php 

/**
 * Flickr Photos Feed Widget
 * Author Url : http://themeforest.com/user/waleed_ds
 * @package business theme
 */

class laread_Flickr extends WP_Widget
{

	public $code;
	public $handle;
	public $limit;
	public $id;
	public $flickr_rand;


	function laread_Flickr(){
        $widget_ops = array('classname' => 'flickr-widget','description' => __( "laread Latest Flickr Photos" ,'laread') );
		$this->WP_Widget('flickr_widget', __('laread Flickr','laread'), $widget_ops);
    }



    function widget($args , $instance)
    {
    	extract($args);
    	$title = apply_filters('widget_title', empty($instance['title']) ? __('Flickr Widget','laread') : $instance['title'], $instance, $this->id_base);
    	$flickr_limit = ( $instance['flickr_limit'] ) ? $instance['flickr_limit'] : 6 ;
    	$flickr_id = ( $instance['flickr_id'] ) ? $instance['flickr_id'] : '' ;
    	$flickr_rand = rand(1 , 99);


    	echo $before_widget;
		// echo $before_title;
		// echo $title;
		echo $after_title;

		/**
		 * Add custom script to footer
		 */
		$this->handle = 'jflickrfeed';
		$this->code = '';
		$this->limit = $flickr_limit;
		$this->id = $flickr_id;
		$this->flickr_rand = $flickr_rand;



		add_action( 'wp_footer', array(&$this , 'print_inline_content' )  , 99 , 1);

		?>
		
		<div class="title"><?php echo $title; ?></div>
		<ul class="laread-list flickr-bar clearfix flickr-widget-<?php echo $flickr_rand; ?>">
			<li></li>
			<li>
				<p><a href="https://www.flickr.com/photos/<?php echo $flickr_id; ?>" target="_blank"><i class="fa fa-flickr"></i> <?php _e('view stream on flickr','laread'); ?></a></p>
			</li>
		</ul>

		

		<?php
		echo $after_widget;

    }


    function form($instance)
    {


    	if(!isset($instance['title'])) $instance['title'] = __('Flickr Widget' , 'laread');
    	if(!isset($instance['flickr_limit'])) $instance['flickr_limit'] = 6;
    	if(!isset($instance['flickr_id'])) $instance['flickr_id'] = '';


    	?>

    	<label for="<?php echo $this->get_field_id('title'); ?>">
	
		<b><label for="<?php echo $this->get_field_id('title'); ?>">
			<?php _e('Widget Title ','laread') ?></label></b>
			<br />

			<input type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>"
				                           name="<?php echo $this->get_field_name('title'); ?>"
							   id="<?php $this->get_field_id('title'); ?>" />

		<br />

		<label for="<?php echo $this->get_field_id('flickr_id'); ?>">
	
		<b><label for="<?php echo $this->get_field_id('flickr_id'); ?>">
			<?php _e('Flickr ID ','laread') ?></label></b>
			<br />

			<input type="text" class="widefat" value="<?php echo esc_attr($instance['flickr_id']); ?>"
				                           name="<?php echo $this->get_field_name('flickr_id'); ?>"
							   id="<?php $this->get_field_id('flickr_id'); ?>" />


		<br />


		<label for="<?php echo $this->get_field_id('flickr_limit'); ?>">
	
		<b><label for="<?php echo $this->get_field_id('flickr_limit'); ?>">
			<?php _e('Limit Photos ','laread') ?></label></b>
			<br />

			<input type="text" class="widefat" value="<?php echo esc_attr($instance['flickr_limit']); ?>"
				                           name="<?php echo $this->get_field_name('flickr_limit'); ?>"
							   id="<?php $this->get_field_id('flickr_limit'); ?>" />

    	<?php
    }

    function print_inline_content()
    {	
    	
    		
    		/* . */
    	
    		?>
			
    		<script type="text/javascript">

    			jQuery('.flickr-widget-<?php echo $this->flickr_rand; ?> li:first').html('').jflickrfeed({
					        limit: <?php echo $this->limit; ?>,
					        qstrings: {
					          id: '<?php echo $this->id; ?>'
					        },
					        itemTemplate: 
					        '<a href="{{link}}"><img src="{{image_m}}" alt="{{title}}" /></a>'
					      	});    		
    		</script>

    		<?php
    	

    }

}

function regflickrwidget()
{
	register_widget('laread_Flickr');
}
add_action('widgets_init' , 'regflickrwidget');

?>