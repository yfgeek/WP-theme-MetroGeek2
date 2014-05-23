
<?php get_header(); ?>
<?php setPostViews(get_the_ID()); ?>  
	<div id="blogcontent">
	<div class="blog">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div  class="blogtitle" ><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>	
		<div class="blogcon">
			<?php the_content(); ?>
		</div>	
	<?php endwhile; else: ?>
		<p>暂无文章</p>
	<?php endif; ?>

	 <?php comments_template(); ?> 
	</div>
	</div>
<?php get_footer(); ?>