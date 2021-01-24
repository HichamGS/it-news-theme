<?php
/**
 * Author:          Hicham Ajarif <hicham.ajarif@gmail.com>
 * Created on:      21/01/2021
 *
 * @package Tech_It
 */

get_header();

?>
<div id="main-content" class="single-post-container">
	<div class="grid-container content-wrapper">
		
		<div class="grid-x grid-padding-x">
			<div class="cell medium-order-4">
				<div class="grid-x grid-padding-x">
					<div class="cell medium-8 mt16" id="contenu">
						<article class="item-marty">
							<div class="grid-x">
								<div class="cell">
									<h1><?php the_title(); ?></h1>
								</div>
							</div>
							<div class="grid-x mt16 mb16 AuthorBox align-middle">
								<div class="cell auto fs14 txtleft lh10 txt-nightblue author-bloc">
									<div class="author-infos">
										<div class="bold dflex align-middle">
											<a href="#">
												<span><?php the_author();?></span>
											</a>
										</div>
										<div class="author-infos-date">
											<?php the_date();?>
										</div>
									</div>
								</div>
								<div class="cell shrink txtright comments-bloc">
									<?php if( get_comments_number(get_the_ID()) > 0 ) { ?><a href="#" class="discourse-comments-count tag-comments-count">
										<?php echo get_comments_number(); ?>
									</a><?php } ?>
								</div>
							</div>
							<div class="grid-x grid-padding-x text">
								<div class="cell marty-body">
									<div class="marty-cell marty-size-12">
										<div class="marty-row">
											<div class="marty-cell marty-size-12">
												<div class="marty-cell-media">
													<picture class="marty-picture-no-link">
														<?php the_post_thumbnail('full'); ?>
													</picture>
												</div>

											</div>
										</div>
										<div class="marty-row">
										    <div class="marty-cell marty-size-12">
											    <p class="marty-paragraph-left"><strong><?php the_excerpt(); ?></strong></p>
											</div>
										</div>
										<div class="marty-row">
										    <div class="marty-cell marty-size-12">
											    <div class="marty-paragraph-left"><?php the_content(); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</article>
						<div id="comments" class="grid-x mt16">
							<?php 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
							?>
						</div>
					</div>
					<div class="cell cell-block-container medium-4 mt16">
						<div class="flex">
							<div class="grid-x">
								<?php get_sidebar(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
