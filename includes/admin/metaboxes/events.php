<div class="event_meta_control">
	<div id="events" class="box">
		<h4>Events details</h4>

		<?php while($mb->have_fields_and_multi('kamino_events')): ?>
			<?php $mb->the_group_open(); ?>

			<div class="wpa_event_title">
				<?php $mb->the_field('displayed_events_title'); ?>
				<label for="term_meta[displayed_events_title]"><?php _e( 'title', 'kamino' ); ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>"  value="<?php $mb->the_value(); ?>" size="42"/>
			</div>
			<div class="wpa_event_link">
				<?php $mb->the_field('displayed_events_link'); ?>
				<label for="term_meta[displayed_events_link]"><?php _e( 'link', 'kamino' ); ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>"  value="<?php $mb->the_value(); ?>" size="42"/>
			</div>

			<div class="wpa_event_date">

				<?php $mb->the_field('displayed_events_date'); ?>
				<label for="term_meta[displayed_events_date]"><?php _e( 'Date', 'kamino' ); ?></label>
				<input type="text" size="42" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" class="datepicker"  /><span><em>(yyyy-mm-dd)</em></span>

			</div>

			<div class="wpa_event_time">

				<?php $mb->the_field('displayed_events_time'); ?>
				<label for="term_meta[displayed_events_time]"><?php _e( 'Time', 'kamino' ); ?></label>
				<input type="text" placeholder="time (HH:MM)" class="timepicker" placeholder="hh:mm" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="42"/>

			</div>

			<div class="wpa_event_manager">
				<?php $mb->the_field('displayed_events_manager'); ?>
				<label for="term_meta[displayed_events_manager]"><?php _e( 'Manager', 'kamino' ); ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>"  value="<?php $mb->the_value(); ?>" size="42"/>
			</div>

			<div class="wpa_event_company">
				<?php $mb->the_field('displayed_events_company'); ?>
				<label for="term_meta[displayed_events_company]"><?php _e( 'Company', 'kamino' ); ?></label>
				<input type="text" name="<?php $mb->the_name(); ?>"  value="<?php $mb->the_value(); ?>" size="42"/>
			</div>

			<div class="wpa_event_image">
				<label>Select an Image for the event</label>
				<?php
				$wpalchemy_media_access = new WPAlchemy_MediaAccess();
				$mb->the_field('kamino_event_image');
				$wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Insert');
				echo '<div class="thumbnail">';
				echo '<a class="'.$wpalchemy_media_access->getButtonClass().' {label:\'Insert\'}" href="'.$wpalchemy_media_access->getButtonLink().'">';
				echo '<img alt=" " src="'.$mb->get_the_value().'" scale="0">';
				echo '</a>';
				echo $wpalchemy_media_access->getField(array('class'=> 'uploadfile', 'type' => 'hidden', 'name' => $mb->get_the_name(), 'value' => $mb->get_the_value()));
				echo '<span><em>upload header image (1080x200)</em></span>';
				echo '<a href="#" class="remove-image">Remove image</a>';
				echo '</div>';
				?>
			</div>

			<a href="#" class="dodelete button" style="float:right"><?php echo _e('Remove', 'kamino'); ?></a>
			<?php $mb->the_group_close(); ?>

		<?php endwhile; ?>

		<div class="clear"></div>
		<p class="wpa_footer" >
			<a href="#" class="docopy-kamino_events button button-primary"><?php echo _e('Add a new event', 'kamino'); ?></a>
		</p>
		

	</div>
</div>