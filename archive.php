
<?php get_header(); ?>
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

	<p  class="updown"><?php posts_nav_link(' ','Prev', 'Next'); ?></p>
	</div>
	</div>
	<div id="side">
			<div id="cate" class="sids">
			<div class="sidetitle">分类</div>
			<ul>	
				<?php wp_list_categories('title_li='); ?>
			</ul>
		</div>
	</div>
	</div>

<?php get_footer(); ?>