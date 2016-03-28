<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="<?php bloginfo('charset');?>" />
    <title>
      <?php if ( is_single() ) { ?>
        <?php } ?>
          <?php wp_title( ''); ?>
            <?php bloginfo(’name’); ?>
    </title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>"   />
       <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/touch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/touch-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/touch-icon-ipad-retina.png">
    <meta name="keywords" content="<?php if($SearchKey)echo $SearchKey;if(is_single())echo ', '.$keywords;?>"  />
    <link href="<?php bloginfo('template_url'); ?>/favicon.ico" mce_href="<?php bloginfo('template_url'); ?>/favicon.ico" rel="bookmark" type="image/x-icon" /> 
<link href="<?php bloginfo('template_url'); ?>/favicon.ico" mce_href="<?php bloginfo('template_url'); ?>/favicon.ico" rel="icon" type="image/x-icon" /> 
<link href="<?php bloginfo('template_url'); ?>/favicon.ico" mce_href="<?php bloginfo('template_url'); ?>/favicon.ico" rel="shortcut icon" type="image/x-icon" /> 
 <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/images/icons.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/fonts/font-awesome-4.5.0/css/font-awesome.min.css" />
  <link href="<?php bloginfo('template_url'); ?>/css/vendor/bootstrap.min.css" rel="stylesheet">
 
    <?php wp_head() ?>
      <script src="<?php bloginfo('template_url'); ?>/jquery/jquery.min.js">
      </script>
   <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js" type="text/javascript"></script>
      <script>
        $(document).ready(function() {
           $("ul[data-liffect] li").each(function (i) {
              $(this).attr("style", "-webkit-animation-delay:" + i * 300 + "ms;"
                      + "-moz-animation-delay:" + i * 300 + "ms;"
                      + "-o-animation-delay:" + i * 300 + "ms;"
                      + "animation-delay:" + i * 300 + "ms;");
              if (i == $("ul[data-liffect] li").size() -1) {
                  $("ul[data-liffect]").addClass("play")
              }
             });
          var listimg = $(".list").find("img");
          listimg.each(function(){
          	idmark = $(this).parent().attr('id').replace(/comment-/,"");
          	$(this).wrap("<a href='?replytocom="+ idmark +"#respond' ></a>");
          });
          $(".link--kukuri::before").hover();
        });
      </script>
  </head>
  
  <body>
    <div id="main">
      <div id="header">
        <div class="tbg">
        </div>
        <div id="logo">
          
            <a class="link link--kukuri" href="#" data-letters="<?php bloginfo( 'name'); ?>"><?php bloginfo( 'name'); ?></a>
         
          <div class="tit">
            <?php bloginfo( 'description'); ?>
          </div>
        </div>
        <div id="tab">
          <ul data-liffect="flipInY" >
            <?php if (is_page()) {?>
              <li class="notvs">
                <a href="<?php bloginfo('url') ?>">
                  Home
                </a>
              </li>
              <?php }else {?>
                <li class="vsss">
                  <a href="<?php bloginfo('url') ?>">
                    Home
                  </a>
                </li>
                <?php }?>
                  <?php wp_list_pages( 'sort_column=menu_order&title_li='); ?>
          </ul>
          <div id="search" class="hidden-xs">
            <form role="search" method="get" class="search-form" action="<?php bloginfo('url') ?>">
              <input class="ipt" type="search" name="s" placeholder="请输入要搜索的内容">
              <input type="submit" class="search-submit" value="搜索" />
            </form>
          </div>
        </div>
      </div>