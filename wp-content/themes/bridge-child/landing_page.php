<?php
/*
Template Name: Sanctuary Systems Landing Page
*/
?>
<?php get_header(); ?>
<div class="wrapper">
	<div class="wrapper_inner">

		<?php do_action('bridge_qode_action_after_wrapper_inner'); ?>

		<div class="content content_top_margin">
			<div class="content_inner">
				<?php
				$revslider = get_post_meta($id, "qode_revolution-slider", true);
				if (!empty($revslider)) { ?>
					<div class="q_slider">
						<div class="q_slider_inner">
							<?php echo do_shortcode($revslider); ?>
						</div>
					</div>
				<?php
				}
				?>
				<div class="full_width" <?php if ($bridge_qode_background_color != "") {
											echo " style='background-color:" . $bridge_qode_background_color . "'";
										} ?>>
					<?php if (isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') { ?>
						<div class="overlapping_content">
							<div class="overlapping_content_inner">
							<?php } ?>
							<div class="full_width_inner default_template_holder clearfix page_container_inner" <?php bridge_qode_inline_style($bridge_qode_content_style_spacing); ?>>
								<?php if (($sidebar == "default") || ($sidebar == "")) : ?>
									<?php if (have_posts()) :
										while (have_posts()) : the_post(); ?>
											<?php the_content(); ?>
											<?php
											$args_pages = array(
												'before'           => '<p class="single_links_pages">',
												'after'            => '</p>',
												'pagelink'         => '<span>%</span>'
											);

											wp_link_pages($args_pages); ?>
											<?php
											if ($enable_page_comments) {
											?>
												<div class="container">
													<div class="container_inner">
														<?php
														comments_template('', true);
														?>
													</div>
												</div>
											<?php
											}
											?>
										<?php endwhile; ?>
									<?php endif; ?>
								<?php elseif ($sidebar == "1" || $sidebar == "2") : ?>

									<?php if ($sidebar == "1") : ?>
										<div class="two_columns_66_33 clearfix grid2">
											<div class="column1">
											<?php elseif ($sidebar == "2") : ?>
												<div class="two_columns_75_25 clearfix grid2">
													<div class="column1">
													<?php endif; ?>
													<?php if (have_posts()) :
														while (have_posts()) : the_post(); ?>
															<div class="column_inner">

																<?php the_content(); ?>
																<?php
																$args_pages = array(
																	'before'           => '<p class="single_links_pages">',
																	'after'            => '</p>',
																	'pagelink'         => '<span>%</span>'
																);

																wp_link_pages($args_pages); ?>
																<?php
																if ($enable_page_comments) {
																?>
																	<div class="container">
																		<div class="container_inner">
																			<?php
																			comments_template('', true);
																			?>
																		</div>
																	</div>
																<?php
																}
																?>
															</div>
														<?php endwhile; ?>
													<?php endif; ?>


													</div>
													<div class="column2"><?php get_sidebar(); ?></div>
												</div>
											<?php elseif ($sidebar == "3" || $sidebar == "4") : ?>
												<?php if ($sidebar == "3") : ?>
													<div class="two_columns_33_66 clearfix grid2">
														<div class="column1"><?php get_sidebar(); ?></div>
														<div class="column2">
														<?php elseif ($sidebar == "4") : ?>
															<div class="two_columns_25_75 clearfix grid2">
																<div class="column1"><?php get_sidebar(); ?></div>
																<div class="column2">
																<?php endif; ?>
																<?php if (have_posts()) :
																	while (have_posts()) : the_post(); ?>
																		<div class="column_inner">
																			<?php the_content(); ?>
																			<?php
																			$args_pages = array(
																				'before'           => '<p class="single_links_pages">',
																				'after'            => '</p>',
																				'pagelink'         => '<span>%</span>'
																			);

																			wp_link_pages($args_pages); ?>
																			<?php
																			if ($enable_page_comments) {
																			?>
																				<div class="container">
																					<div class="container_inner">
																						<?php
																						comments_template('', true);
																						?>
																					</div>
																				</div>
																			<?php
																			}
																			?>
																		</div>
																	<?php endwhile; ?>
																<?php endif; ?>


																</div>

															</div>
														<?php endif; ?>
														</div>
													</div>
											</div>
										</div>
							</div>
							</div>
							<?php do_action('bridge_qode_action_page_after_container') ?>
	<?php get_footer(); ?>
							</body>

							</html>
