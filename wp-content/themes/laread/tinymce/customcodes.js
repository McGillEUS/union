


//////////////////////////////////////////////////////////////////
//Add divider button
//////////////////////////////////////////////////////////////////
(function() {  
 tinymce.create('tinymce.plugins.divider', {  
     init : function(ed, url) {  
         ed.addButton('divider', {  
             title : 'Add a Divider',  
             image : url+'/divider.png',  
             onclick : function() {  
                  ed.selection.setContent('[divider type="triagle"][/divider]');  

             }  
         });  
     },  
     createControl : function(n, cm) {  
         return null;  
     },  
 });  
 tinymce.PluginManager.add('divider', tinymce.plugins.divider);  
})();

//////////////////////////////////////////////////////////////////
// Add laread_changelog button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_changelog', {  
        init : function(ed, url) {  
            ed.addButton('laread_changelog', {  
                title : 'Add a Changelog',  
                image : url+'/changelog.png',  
                onclick : function(a) {  
                    
                     selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_changelog name="Update Log" title="Title" other_title_link="#" other_title="full changelog"]'+selected+'[/laread_changelog]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_changelog', tinymce.plugins.laread_changelog);  
})();

//////////////////////////////////////////////////////////////////
// Add laread_review button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_review', {  
        init : function(ed, url) {  
            ed.addButton('laread_review', {  
                title : 'Add a Review',  
                image : url+'/review.png',  
                onclick : function(a) {  
                    
                     selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_review name="Name" date="" stars="5"]'+selected+'[/laread_review]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_review', tinymce.plugins.laread_review);  
})();

//////////////////////////////////////////////////////////////////
// Add laread_twitter button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_twitter', {  
        init : function(ed, url) {  
            ed.addButton('laread_twitter', {  
                title : 'Add a Twitter',  
                image : url+'/twitter.png',  
                onclick : function(a) {  
                  
                     ed.selection.setContent('[laread_twitter]<br>Embed code<br>[/laread_twitter]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_twitter', tinymce.plugins.laread_twitter);  
})();

//////////////////////////////////////////////////////////////////
// Add laread_facebook button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_facebook', {  
        init : function(ed, url) {  
            ed.addButton('laread_facebook', {  
                title : 'Add a Facebook',  
                image : url+'/facebook.png',  
                onclick : function(a) {  
                  
                     ed.selection.setContent('[laread_facebook]<br>Embed code<br>[/laread_facebook]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_facebook', tinymce.plugins.laread_facebook);  
})();


//////////////////////////////////////////////////////////////////
// Add laread_iframe button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_iframe', {  
        init : function(ed, url) {  
            ed.addButton('laread_iframe', {  
                title : 'Add a Iframe Code',  
                image : url+'/youtube.png',  
                onclick : function(a) {  
                  
                     ed.selection.setContent('[laread_iframe desc=""]Iframe Code[/laread_iframe]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_iframe', tinymce.plugins.laread_iframe);  
})();


//////////////////////////////////////////////////////////////////
// Add laread_promotebox button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_promotebox', {  
        init : function(ed, url) {  
            ed.addButton('laread_promotebox', {  
                title : 'Add a Promotebox',  
                image : url+'/promotebox.png',  
                onclick : function(a) {  
                     
                    selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_promotebox title="TITLE" type="promote-box" button_color="btn-golden" button_name="BUTTON" button_link="#"]'+selected+'[/laread_promotebox]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_promotebox', tinymce.plugins.laread_promotebox);  
})();


//////////////////////////////////////////////////////////////////
// Add Notification button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_notification', {  
        init : function(ed, url) {  
            ed.addButton('laread_notification', {  
                title : 'Add a Notification',  
                image : url+'/notification.png',  
                onclick : function(a) {  
                     
                    selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_notification type="success"]'+selected+'[/laread_notification]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_notification', tinymce.plugins.laread_notification);  
})();

//////////////////////////////////////////////////////////////////
// Add Button button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_button', {  
        init : function(ed, url) {  
            ed.addButton('laread_button', {  
                title : 'Add a Button',  
                image : url+'/button.png',  
                onclick : function(a) {  
                     
                    selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_button link="#" target="" type="btn-outline btn-rounded" color="btn-golden"]'+selected+'[/laread_button]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_button', tinymce.plugins.laread_button);  
})();

//////////////////////////////////////////////////////////////////
//Add Accordion shortcode
//////////////////////////////////////////////////////////////////
(function() {  
 tinymce.create('tinymce.plugins.laread_accordion', {  
     init : function(ed, url) {  
         ed.addButton('laread_accordion', {  
             title : 'Add Accordion Pane',  
             image : url+'/accordion.png',  
             onclick : function() {  
                  ed.selection.setContent('[laread_accordion type="with-outline"]<br>[panel title="panel 1"]Panel 1 content here[/panel]<br>[panel title="panel 2"]Panel 2 content here[/panel]<br>[/laread_accordion]');  

             }  
         });  
     },  
     createControl : function(n, cm) {  
         return null;  
     },  
 });  
 tinymce.PluginManager.add('laread_accordion', tinymce.plugins.laread_accordion);  
})();


//////////////////////////////////////////////////////////////////
// laread_striking
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_preformat', {  
        init : function(ed, url) {  
            ed.addButton('laread_preformat', {  
                title : 'Add Preformat',  
                image : url+'/preformat.png',  
                onclick : function() {  

                    selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_preformat]'+selected+'[/laread_preformat]'); 

                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_preformat', tinymce.plugins.laread_preformat);  
})();

//////////////////////////////////////////////////////////////////
// laread_striking
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_striking', {  
        init : function(ed, url) {  
            ed.addButton('laread_striking', {  
                title : 'Add Striking',  
                image : url+'/striking.png',  
                onclick : function() {  

                    selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_striking number="1"]'+selected+'[/laread_striking]'); 

                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_striking', tinymce.plugins.laread_striking);  
})();

//////////////////////////////////////////////////////////////////
// laread_quote
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_quote', {  
        init : function(ed, url) {  
            ed.addButton('laread_quote', {  
                title : 'Add Quotes with Ratings',  
                image : url+'/quote.png',  
                onclick : function() {  

                    selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_quote name="Name" info="Info" stars="5" ]'+selected+'[/laread_quote]'); 

                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_quote', tinymce.plugins.laread_quote);  
})();

//////////////////////////////////////////////////////////////////
// Add First Letter
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_first_letter', {  
        init : function(ed, url) {  
            ed.addButton('laread_first_letter', {  
                title : 'Add First Letter',  
                image : url+'/first-letter.png',  
                onclick : function() {  

                    selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_first_letter]'+selected+'[/laread_first_letter]'); 

                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_first_letter', tinymce.plugins.laread_first_letter);  
})();

//////////////////////////////////////////////////////////////////
// Add Button button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.laread_label', {  
        init : function(ed, url) {  
            ed.addButton('laread_label', {  
                title : 'Add Label',  
                image : url+'/label.png',  
                onclick : function() {  

                    selected = tinyMCE.activeEditor.selection.getContent();
                    if (!selected) {
                        var selected = 'Text here';
                    };
                     ed.selection.setContent('[laread_label color="golden"]'+selected+'[/laread_label]'); 

                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('laread_label', tinymce.plugins.laread_label);  
})();







//////////////////////////////////////////////////////////////////
//Add Tabs button
//////////////////////////////////////////////////////////////////
(function() {  
 tinymce.create('tinymce.plugins.tabs', {  
     init : function(ed, url) {  
         ed.addButton('tabs', {  
             title : 'Add Tabs Pane',  
             image : url+'/tabs.png',  
             onclick : function() {  
                  ed.selection.setContent('[tabgroup type="with-outline"]<br>[tab title="Tab 1"]Tab 1 content here[/tab]<br>[tab title="Tab 2"]Tab 2 content here[/tab]<br>[/tabgroup]');  

             }  
         });  
     },  
     createControl : function(n, cm) {  
         return null;  
     },  
 });  
 tinymce.PluginManager.add('tabs', tinymce.plugins.tabs);  
})();