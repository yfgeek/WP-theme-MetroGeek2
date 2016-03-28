<div class="commentsss">
	<?php if(post_password_required()){?><p class="nopassword"><?php _e('这个文章不可见呢：');?></p>
</div>
<?php return;}
if(have_comments()){?>
  <h3 id="comments">评论</h3>
    
	<ol class="commentlist"><?php wp_list_comments(array('callback'=>'custom_comments'));?></ol>
  
	<?php if(get_option('page_comments')){$comment_pages=paginate_comments_links('echo=0');if($comment_pages){?><div class="navigation"><div class="<?php echo $pnavcalss;?>"><?php echo $comment_pages;?></div><div class="clear"></div></div><?php }}
}else{
if(!comments_open()){?>
	<p class="nocomments"></p>

<?php }}
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$fields =  array(
    'author' => '<p class="comment-form-author">' . '<label for="author" class="sr-only">' . __( 'Name' ) . '</label> ' . ( $req ? '' : '' ) .
        '<input id="author" name="author" class="form-control" type="text" placeholder="昵称(必填)" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
    'email'  => '<p class="comment-form-email"><label for="email" class="sr-only">' . __( 'Email' ) . '</label> ' . ( $req ? '' : '' ) .
        '<input id="email" class="form-control" name="email" type="text" placeholder="Email(必填)" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
);
 
$comments_args = array(
    'fields' =>  $fields,
    'comment_field'	=> '<textarea id="comment" name="comment" class="form-control" rows="3" aria-required="true"></textarea>',
    'title_reply'=>'评论一下',
    'label_submit' => '我写好啦'
);
 
comment_form($comments_args);
?>
<div style="clear:both"></div>

</div>