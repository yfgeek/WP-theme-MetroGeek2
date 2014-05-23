<?php 
 function my_function_admin_bar(){ return false; } add_filter( 'show_admin_bar' ,  'my_function_admin_bar');
/*
评论框
*/
function custom_comments($comment,$args,$depth){
	$GLOBALS['comment']=$comment;
	switch($comment->comment_type){
		case '':?>
	<li <?php comment_class();?> id="li-comment-<?php comment_ID();?>">
    <?php if($comment->comment_author_email==get_the_author_meta('email')){?>
		<div id="comment-<?php comment_ID();?>" class="list children">
    <?php echo get_avatar($comment,48);?>
    <table class="bubble" border="0" cellpadding="0" cellspacing="0">
      <tr><td class="topleft"></td><td class="top"></td><td class="topright"></td></tr>
      <tr><td class="left"></td>
        <td align="left" class="comment-body"><?php comment_text();?></td>
        <td class="right"></td></tr>
      <tr><td class="bottomleft"></td><td class="bottom"></td><td class="bottomright"></td></tr>
    </table>
    <div class="comment-author">
			<?php printf(__('%1$s  %2$s <span class="says"></span>'),sprintf('<cite class="fn">%s</cite>',get_comment_author_link()),sprintf('<small class="comment-meta"><a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a></small>',esc_url(get_comment_link($comment->comment_ID)),get_comment_time('c'),sprintf(__('%1$s %2$s'),get_comment_date('m-d'),get_comment_time(' H:i'))));
			if($comment->comment_approved=='0'){?><em><?php _e('Your comment is awaiting moderation.');?></em><?php }
			edit_comment_link('编辑','&nbsp;&nbsp;',' | ');comment_reply_link(array_merge($args,array('depth'=>$depth,'max_depth'=>$args['max_depth'])));?>
		</div>
	</div>
	<?php }else{?>
	<div id="comment-<?php comment_ID();?>" class="list">
		<?php echo get_avatar($comment,48);?>
    <table class="bubble" border="0" cellpadding="0" cellspacing="0">
      <tr><td class="topleft"></td><td class="top"></td><td class="topright"></td></tr>
      <tr><td class="left"></td>
        <td align="left" class="comment-body"><?php comment_text();?></td>
        <td class="right"></td></tr>
      <tr><td class="bottomleft"></td><td class="bottom"></td><td class="bottomright"></td></tr>
    </table>
    <div class="comment-author">
			<?php 
			printf(__('%1$s  %2$s <span class="says"></span>'),sprintf('<cite class="fn">%s</cite>',get_comment_author_link()),sprintf('<small class="comment-meta"><a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a></small>',esc_url(get_comment_link($comment->comment_ID)),get_comment_time('c'),sprintf(__('%1$s %2$s'),get_comment_date('m-d'),get_comment_time(' H:i'))));
			if($comment->comment_approved=='0'){
			?><em>
			<?php _e('Your comment is awaiting moderation.');?>
			</em><?php }
			edit_comment_link('编辑','&nbsp;&nbsp;',' | ');comment_reply_link(array_merge($args,array('depth'=>$depth,'max_depth'=>$args['max_depth'])));
			?>
		</div>
	</div>
	<?php }?>
	<?php break;
		case 'pingback':
		case 'trackback':?>
	<li class="post pingback">
		<p><?php _e('Pingback:');comment_author_link();edit_comment_link(__('Edit'),' <span class="edit-link">[',']</span>');?></p>
	<?php break;
	}
}


/*
阅读量
*/
function getPostViews($postID){   
    $count_key = 'post_views_count';   
    $count = get_post_meta($postID, $count_key, true);   
    if($count==''){   
        delete_post_meta($postID, $count_key);   
        add_post_meta($postID, $count_key, '0');   
        return "0";   
    }   
    return $count ;   
}   
function setPostViews($postID) {   
    $count_key = 'post_views_count';   
    $count = get_post_meta($postID, $count_key, true);   
    if($count==''){   
        $count = 0;   
        delete_post_meta($postID, $count_key);   
        add_post_meta($postID, $count_key, '0');   
    }else{   
        $count++;   
        update_post_meta($postID, $count_key, $count);   
    }   
}  
/*首页访问次数统计*/
function getindexview(){   
    $count_key = 'index_view';   
    $count = get_post_meta(1, $count_key, true);   
    if($count==''){   
        delete_post_meta(1, $count_key);   
        add_post_meta(1, $count_key, '0');   
        return "0";   
    }   
    return $count ;   
}   
function setindexview() {   
    $count_key = 'index_view';   
    $count = get_post_meta(1, $count_key, true);   
    if($count==''){   
        $count = 0;   
        delete_post_meta(1, $count_key);   
        add_post_meta(1, $count_key, '0');   
    }else{   
        $count++;   
        update_post_meta(1, $count_key, $count);   
    }   
}


/*
最近评论
*/
function a_rcomments($limit){
$comments=get_comments(array('number'=>100,'status'=>'approve'));
$wpchres=get_option('blog_charset');
$i=1;
$istorcoutput='';
foreach($comments as $comment){
if(stripslashes($comment->comment_author)==''){
$authors='匿名';
}else{
$authors=stripslashes($comment->comment_author);
}
$istorcoutput.='<li><a href="'.get_permalink($comment->comment_post_ID).'#comment-'.$comment->comment_ID.'" title="On '.get_the_title($comment->comment_post_ID).'">'.$authors.' : '.mb_substr(strip_tags($comment->comment_content),0,11,$wpchres).'</a></li>'."\n";if($i==$limit)
{
break;
}
$i++;
}
echo ent2ncr($istorcoutput);
}

?>