<?php 
// include all PHP files in ./includes/widgets/ directory:
foreach (glob(dirname(__FILE__) . '/widgets/*.php') as $file) {
	include $file;
}


function it_news_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'it-news' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'it-news' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'it_news_widgets_init' );

register_sidebar( array(
	'name'          => __( 'Homepage widgets', 'it_news' ),
	'id'            => 'sidebar-home',
	'description'   => __( 'Main sidebar that appears on the homepage.', 'it_news' ),
	'before_widget' => '<section id="%1$s" class="%2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
) ); 



/**
 * Extend Recent Posts Widget 
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {
		
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
		
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
		
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			echo $before_widget;
			?>
			<div class="cell mt16 mb16">
				<div class="HeroListingCard2">
					<?php
					if( $title ) {  ?>
						<div class="ListingTitle">
							<h2>
								<?php echo $before_title . $title . $after_title; ?>
							</h2>
						</div>
					<?php } ?>
					<?php while( $r->have_posts() ) : $r->the_post(); ?>	
						<div class="grid-x">
							<?php if( get_comments_number(get_the_ID()) > 0 ) { ?><span class="mea-comments-count" data-datalayer="widgetSameSubject" data-datalayer-url="<?php the_permalink(); ?>"><?php echo get_comments_number(get_the_ID()); ?></span> <?php } ?>           
							<a href="<?php the_permalink(); ?>" class="cell" data-vr-excerpttitle="">
								<picture>
									<?php the_post_thumbnail('top-story'); ?>
								</picture>
							</a>
							<div class="cell auto align-self-middle">
								<a href="<?php the_permalink(); ?>" data-datalayer="widgetSameSubject" class="titre" data-vr-excerpttitle=""><?php the_title(); ?></a>
							</div>
						</div>


					<?php endwhile; ?>
				</div>
			</div>
			
			<?php
			echo $after_widget;
			
			wp_reset_postdata();
			
		endif;
	}
}
function my_recent_widget_registration() {
	unregister_widget('WP_Widget_Recent_Posts');
	register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');