<?php get_header(); ?>
<?php setPostViews(get_the_ID()); ?>  

<script>
$.fn.postLike = function() {
	if ($(this).hasClass('done')) {
		alert('您已赞过该文章');
		return false;
	} else {
		$(this).addClass('done');
		var id = $(this).data("id"),
		action = $(this).data('action'),
		rateHolder = $(this).children('.count');
		var ajax_data = {
			action: "specs_zan",
			um_id: id,
			um_action: action
		};
		$.post("/wp-admin/admin-ajax.php", ajax_data,
		function(data) {
			$(rateHolder).html(data);
		});
		return false;
	}
};
$(document).on("click", ".specsZan",
	function() {
		$(this).postLike();
});



</script>
	<div id="blogcontent">
	<div class="blog">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="likeit">
		<ol class="grid">
		<li class="grid__item" style="list-style: none;">
		<button  data-action="ding" data-id="<?php the_ID(); ?>" class="icobutton icobutton--heart specsZan <?php if(isset($_COOKIE['specs_zan_'.$post->ID])) echo 'done';?>"
		<span class="fa fa-heart"></span>
		<span class="icobutton__text icobutton__text--side count">
		<?php if( get_post_meta($post->ID,'specs_zan',true) ){
            		echo get_post_meta($post->ID,'specs_zan',true);
                } else {
					echo '0';
				}?>
		</span>

		</button>
 

		</li>
		</ol>
		</div>



		<ul class="blogmeta">
			<li class="blogcate"><strong>分类:</strong> <?php the_category(', '); ?>  </li>
			<li class="blogau"><strong>日期:</strong> <?php the_time('Y-m-d'); ?> </li>
			<li class="blogau"><strong>作者:</strong> <?php the_author(); ?></li>
		</ul>
		<div  class="blogtitle" ><a class="ablogtitle" href="#" title="点击查看更多信息"><?php the_title(); ?></a></div>
		<div class="dottit"></div>		
		<div class="blogdate" title="阅读量"><?php echo getPostViews(get_the_ID()); ?>  </div>
		<div class="blogcom" title="评论数"><?php comments_number('0','1','%') ?></div>		
		<div class="blogcon">
			<?php the_content(); ?>
		</div>	

	<?php endwhile; else: ?>
		<p>暂无文章</p>
	<?php endif; ?>
	 <?php comments_template(); ?> 
	</div>
	</div>
</div>
	<script src="<?php bloginfo('template_url'); ?>/js/mo.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/demo.js"></script>
<?php get_footer(); ?>