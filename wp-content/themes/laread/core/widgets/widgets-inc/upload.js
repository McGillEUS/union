jQuery(document).ready(function()
	{
		


		// media manager holder
        var laread_widget_upload;


        // when click on the upload button
        jQuery('.aboutus-upload-image').live('click' , function(e){


              // json field
              var field = jQuery(this).prev('.aboutus-image-field');

             

              e.preventDefault();

              // open the frame
              if(laread_widget_upload){

                  laread_widget_upload.open();
                  return ;
              }


              // create the media frame
              laread_widget_upload = wp.media.frames.laread_widget_upload = wp.media({

                    className : 'media-frame laread-media-manager' ,
                    multiple: true,
                    title : 'Select Images' ,
                    button : {
                      text : 'Select'
                    }


              });


              laread_widget_upload.on('select', function(){
              
                      var selection = laread_widget_upload.state().get('selection');
       
                        selection.map( function( attachment ) {
                       
                            attachment = attachment.toJSON();

                            // insert images to the  feild
                            field.val(attachment.url);
                      });

                      });

              // Now that everything has been set, let's open up the frame.
              laread_widget_upload.open();


        });
        // end upload script





        // when click on the upload button
        jQuery('.wrap-btn .upload').live('click' , function(e){


              // json field
              var field = jQuery(this).parent().prev('.upload-field-btn');

             

              e.preventDefault();

              // open the frame
              if(laread_widget_upload){

                  laread_widget_upload.open();
                  return ;
              }


              // create the media frame
              laread_widget_upload = wp.media.frames.laread_widget_upload = wp.media({

                    className : 'media-frame laread-media-manager' ,
                    multiple: true,
                    title : 'Select Images' ,
                    button : {
                      text : 'Select'
                    }


              });


              laread_widget_upload.on('select', function(){
              
                      var selection = laread_widget_upload.state().get('selection');
       
                        selection.map( function( attachment ) {
                       
                            attachment = attachment.toJSON();

                            // insert images to the  feild
                            field.val(attachment.url);
                      });

                      });

              // Now that everything has been set, let's open up the frame.
              laread_widget_upload.open();


        });
        // end upload script
	});