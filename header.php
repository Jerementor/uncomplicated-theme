<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta content="width=device-width, initial-scale=1" name="viewport">      
    <title><?php wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" 
    href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() 
    && get_option( 'thread_comments' ) ) 
    wp_enqueue_script( 'comment-reply' ); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>

     <script type="text/javascript">WebFont.load({  google: {    families: ["Muli:200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic"]  }});</script>
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->

    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>

    <!-- RightMessage -->
    <script type="text/javascript"> 
    (function(p, a, n, d, o, b) {
    o = n.createElement('script'); o.type = 'text/javascript'; o.async = true; o.src = 'https://tag.rightmessage.com/'+p+'.js';
    b = n.getElementsByTagName('script')[0]; b.parentNode.insertBefore(o, b);
    d = function(h, u, i) { var o = n.createElement('style'); o.id = 'rmcloak'+i; o.type = 'text/css';
    o.appendChild(n.createTextNode('.rmcloak'+h+'{visibility:hidden}.rmcloak'+u+'{display:none}'));
    b.parentNode.insertBefore(o, b); return o; }; o = d('', '-hidden', ''); d('-stay-invisible', '-stay-hidden', '-stay');
    setTimeout(function() { o.parentNode && o.parentNode.removeChild(o); }, a);
    })('1855395163', 2500, document);
    </script>


    <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?>>
<!--<div class="section-20 section-light">-->
<!--<div class="w-container">-->
<!--<div class="jer_640">-->
<!--<!?php get_template_part('template-parts/nav/logged_out_nav'); ?>-->

<div class="blue-topbar"></div>
<?php if (is_user_logged_in() ) : ?> 
<?php get_template_part('template-parts/nav/logged_in_nav'); ?>
<?php else: ?>
<?php get_template_part('template-parts/nav/logged_out_nav'); ?>
<?php endif; ?>    


