<div class="commentsss">
	<?php if(post_password_required()){?><p class="nopassword"><?php _e('请输入阅读密码：');?></p>
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
comment_form('comment_notes_after= ');
?>

</div>