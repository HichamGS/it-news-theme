<div class="grid-x posts">
	<a href="<?php the_permalink(); ?>" class="cell" data-vr-excerpttitle="">
		<picture>
			<?php the_post_thumbnail('listing'); ?>
		</picture>
	</a>
	<div class="cell auto post-infos">
		<?php if( get_comments_number(get_the_ID()) > 0 ) { ?><a href="<?php the_permalink(); ?>" class="post-comments-count"><?php echo get_comments_number(get_the_ID()); ?></a><?php } ?>
		<a href="<?php the_permalink(); ?>" data-vr-excerpttitle=""><?php the_title(); ?></a>
		<?php the_excerpt(); ?>
		<div class="grid-x align-justify">
			<div class="cell auto fs12">
				<?php the_time() ?>
				<?php foreach(get_the_category() as $category) { ?>
				   <a class="post-badge" href="<?php echo get_category_link($category->cat_ID);?>"> <?php echo $category->cat_name; ?></a>
				   <?php } ?>
			</div>
		</div>
	</div>
</div>