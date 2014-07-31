<?php get_header(); ?>
<?php setindexview(); ?>  
<div id="main">
	<div id="blogcontent" style="min-height:300px;">
	<div class="blog"> 
	<div  class="blogtitle" ><a href="#" >搜索结果</a></div>	
	<p>以下是关于" <b><?php echo htmlentities($_GET["s"]) ?></b> "的全部结果：</p>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h3 id="comments"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<div class="blogcon">
			<?php the_content('More'); ?>
		</div>	
	<?php endwhile; else: ?>
		<p>暂无文章</p>
	<?php endif; ?>

	<p class="updown"><?php posts_nav_link(' ','Prev', 'Next'); ?></p>
	</div>
	</div>
</div>
<?php get_footer(); ?>