<?php 
 function my_function_admin_bar(){ return false; } add_filter( 'show_admin_bar' ,  'my_function_admin_bar');
/*
解决头像问题
*/
function duoshuo_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'duoshuo_avatar', 10, 3 );

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
    <div class="rightcoment">
        <?php echo get_avatar($comment,48);?>
        <div class="rtit">
            <cite class="fn"><?php echo get_comment_author_link() ?></cite>
        </div>
    </div> 

    <table class="bubble" border="0" cellpadding="0" cellspacing="0">
      <tr><td class="topleft"></td><td class="top"></td><td class="topright"></td></tr>
      <tr><td class="left"></td>
        <td align="left" class="comment-body"><?php comment_text();?></td>
        <td class="right"></td></tr>
<!--       <tr><td class="bottomleft"></td><td class="bottom"></td><td class="bottomright"></td></tr>
 -->    </table>
    <div class="comment-author">
			<?php 
			if($comment->comment_approved=='0'){?><em><?php _e('Your comment is awaiting moderation.');?></em><?php }
			edit_comment_link('编辑','&nbsp;&nbsp;',' | ');comment_reply_link(array_merge($args,array('depth'=>$depth,'max_depth'=>$args['max_depth'])));?>
		</div>
	</div>
	<?php }else{?>
	<div id="comment-<?php comment_ID();?>" class="list">
    <div class="leftcoment">
		<?php echo get_avatar($comment,48);?>
        <div class="ltit">
            <cite class="fn"><?php echo get_comment_author_link() ?></cite>
        </div>
    </div>       
    <table class="bubble" border="0" cellpadding="0" cellspacing="0">
      <tr><td class="topleft"></td><td class="top"></td><td class="topright"></td></tr>
      <tr><td class="left"></td>
        <td align="left" class="comment-body"><?php comment_text();?></td>
        <td class="right"></td></tr>
<!--       <tr><td class="bottomleft"></td><td class="bottom"></td><td class="bottomright"></td></tr>
 -->    </table>
    <div class="comment-author">
			<?php 
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
/*文章点赞*/
add_action('wp_ajax_nopriv_specs_zan', 'specs_zan');
add_action('wp_ajax_specs_zan', 'specs_zan');
function specs_zan(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'ding'){
        $specs_raters = get_post_meta($id,'specs_zan',true);
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
        setcookie('specs_zan_'.$id,$id,$expire,'/',$domain,false);
        if (!$specs_raters || !is_numeric($specs_raters)) {
            update_post_meta($id, 'specs_zan', 1);
        } 
        else {
            update_post_meta($id, 'specs_zan', ($specs_raters + 1));
        }
        echo get_post_meta($id,'specs_zan',true);
    } 
    die;
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
$authors='路人';
}else{
$authors=stripslashes($comment->comment_author);
}
$istorcoutput.='<li><span class="leftimg">'.get_avatar( $comment, 32,'',$comment->comment_author).'<span class="imgtx">'.$authors.'</span></span><span class="rightcomments"><a href="'.get_permalink($comment->comment_post_ID).'#comment-'.$comment->comment_ID.'" title="'.strip_tags($comment->comment_content).'">'.mb_substr(strip_tags($comment->comment_content),0,40,$wpchres).'</a></span></li>'."\n";if($i==$limit)
{
break;
}
$i++;
}
echo ent2ncr($istorcoutput);
}

?>