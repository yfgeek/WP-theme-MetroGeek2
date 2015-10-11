<?php get_header(); ?>
<?php setPostViews(get_the_ID()); ?>  
<script>
$(document).ready(function(){
$(".ablogtitle").click(function(){
$(".blogmeta").fadeIn(500);
});

});

</script>
	<div id="blogcontent">
	<div class="blog">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
<?php get_footer(); ?>