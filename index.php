<?php get_header(); ?>
<?php setindexview(); ?>  
<div id="maincon">
	<div id="content">
	<div class="blog"> 
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div  class="blogtitle" ><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
		<div class="blogcon">
			<?php the_content('More'); ?>
		</div>	
	<?php endwhile; else: ?>
		<p>暂无文章</p>
	<?php endif; ?>

	<p class="updown"><?php posts_nav_link(' ','Prev', 'Next'); ?></p>
	</div>
	
	</div>
<?php get_sidebar() ?>
</div>
<?php get_footer(); ?>