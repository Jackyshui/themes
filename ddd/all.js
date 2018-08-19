jQuery.noConflict();
jQuery(document).ready(function($) {
$('a, input[type="submit"],object').bind('focus',function(){if(this.blur)this.blur()});
}); // end jQ

/* css */
css = '#site_title a{text-shadow:1px 4px 4px #aaa;}'
    + '.guide_txt{text-shadow:0 1px 1px #666;}'
    + '#comment_form input.submit{text-shadow:0 1px 0 #fff;}'
    + '.comment-body p{word-wrap:break-word;}';
function css3(a, b){
  css += a +'{'+ b +';-moz-'+ b +';-webkit-'+ b + ';-khtml-'+ b +';}';
}
css3('#nav_box, #nav_menu li.current a', 'border-radius:5px 5px 0 0');
css3('.container', 'border-radius:0 0 5px 5px');
css3('#comment_form input.submit, #smiley', 'border-radius:12px');
css3('.widget', 'border-radius:5px');
css3('.codebox, img.avatar', 'box-shadow:rgba(0,0,0,.4) 1px 3px 5px;');
css3('#smiley', 'box-shadow:rgba(190,190,190,1) 1px 3px 15px');
document.write('<style type="text\/css">'+ css +'<\/style>');

 