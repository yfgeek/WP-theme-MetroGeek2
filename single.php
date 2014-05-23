
<?php get_header(); ?>
<?php setPostViews(get_the_ID()); ?>  
<script>
$(document).ready(function(){

$(".blogtitle").click(function(){
$(".blogdate").fadeToggle(600);
$(".blogcom").fadeToggle(700);
});

});

</script>
	<div id="blogcontent">
	<div class="blog">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div  class="blogtitle" ><a href="#" title="点击查看访问量,评论量信息"><?php the_title(); ?></a></div>	
		<div class="blogdate" title="阅读量"><?php echo getPostViews(get_the_ID()); ?>  </div>
		<div class="blogcom" title="评论数"><?php comments_number('0','1','%') ?></div>
		<div class="blogcon">
			<?php the_content(); ?>
		</div>	
		<div class="blogmeta">
			<span class="blogcate">分类: <?php the_category(', '); ?>  </span>
			<span class="blogau">作者: <a><?php the_author(); ?></a></span>
		</div>

	<?php endwhile; else: ?>
		<p>暂无文章</p>
	<?php endif; ?>
	 <?php comments_template(); ?> 
	</div>
	</div>
</div>
<?php get_footer(); ?>