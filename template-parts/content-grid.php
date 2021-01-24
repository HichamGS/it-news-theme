<div class="cell">
	<?php if( get_comments_number(get_the_ID()) > 0 ) { ?>
		<span class="hero-comments-count"><?php echo get_comments_number(get_the_ID()) ; ?></span>
	<?php } ?> 
	<a href="<?php the_permalink(); ?>" data-datalayer="heroTop" class="flex-container align-bottom">
		<picture class="heroTop">
			<?php the_post_thumbnail('top-story'); ?>
		</picture>
		<div data-datalayer="heroTop" data-datalayer-url="<?php the_permalink(); ?>" class="titre"><?php the_title(); ?></div>
	</a>
</div>