<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" version="g42dymwpi--nx">
  
  <head>
    <meta charset="<?php bloginfo('charset');?>" />
    <title>
      <?php if ( is_single() ) { ?>
        <?php } ?>
          <?php wp_title( ''); ?>
            <?php bloginfo(’name’); ?>
    </title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>"
    />
    <meta name="keywords" content="<?php if($SearchKey)echo $SearchKey;if(is_single())echo ', '.$keywords;?>"
    />
    <?php wp_head() ?>
      <script src="<?php bloginfo('template_url'); ?>/jquery/jquery.min.js">
      </script>
      <script>
        $(document).ready(function() {
          $(".vsss").fadeIn(400);
          $(".notvs").fadeIn(500);
          $(".page_item").fadeIn(500);
          $(".comment-form-email").html("<label for='email'>Email</label> <input id='email' name='email' type='text' value='' size='30' aria-describedby='email-notes'>");
          var listimg = $(".list").find("img");
          listimg.each(function(){
          	idmark = $(this).parent().attr('id').replace(/comment-/,"");
          	$(this).wrap("<a href='?replytocom="+ idmark +"#respond' ></a>");
          });
         // $(".list").find("img").wrap("<a href=/?replytocom="+$(this).parent().last()+" #respond></a>");
        });
      </script>
  </head>
  
  <body>
    <div id="main">
      <div id="header">
        <div class="tbg">
        </div>
        <div id="logo">
          <div class="title">
            <?php bloginfo( 'name'); ?>
          </div>
          <div class="tit">
            <?php bloginfo( 'description'); ?>
          </div>
        </div>
        <div id="tab">
          <ul>
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
          <div id="search">
            <form role="search" method="get" class="search-form" action="<?php bloginfo('url') ?>">
              <input class="ipt" type="search" name="s" placeholder="请输入要搜索的内容">
              <input type="submit" class="search-submit" value="搜索" />
            </form>
          </div>
        </div>
      </div>