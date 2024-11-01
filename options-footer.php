<?php
/**
 * Footer page
 */
?>
<div class="page-header">
	<h1>Theme Options<span class="pull-right"> Footer :)</span></h1>
</div>
<div class="wrap">
    <div id="" class="avengersthemeoptionswrap background__grey">
        <?php do_action('disable_comments_notice'); ?>
        <div class="theme__option_block">
			<div class="av-row">
				<div class="av-col-lg-9">
					<form method="post" action="options.php">
						<?php settings_fields( 'avengers_options_footer' ); do_settings_sections( 'avengers_options_footer' ); ?>
						<?php $options = get_option( 'footer_options' ); ?>
						<div class="theme__option__tab">
							<div  class="theme__option__tab__item show">
								<h3 class="hndle"><span>Avengers Footer information</span></h3>
								<div class="disable_option dc-text__block mb30 mt30">
									<div class="inside">
										<table cellpadding="0" class="avengers-input-global-fields">
											<tbody>
												<tr>
													<th width="25%" align="left" valign="top" scope="row"><?php _e( 'Copyright information', 'itechavengers' ); ?></th>
													<td width="2%"></td>
													<td align="left">
														<textarea id="footer_options[copyright_info]" class="large-text" cols="50" rows="4" name="footer_options[copyright_info]"><?php echo esc_textarea( $options['copyright_info'] ); ?></textarea><br />
														<small for="footer_options[copyright_info]"><?php _e( '© 2022. Copyright information code here.', 'itechavengers' ); ?></small>
													</td>
												</tr>
												<tr>
													<th width="25%" align="left" valign="top" scope="row"><?php _e( 'Design & Development Text', 'itechavengers' ); ?></th>
													<td width="2%"></td>
													<td align="left">
														<textarea id="footer_options[design_development]" class="large-text" cols="50" rows="4" name="footer_options[design_development]"><?php echo esc_textarea( $options['design_development'] ); ?></textarea><br />
														<small for="footer_options[design_development]"><?php _e( 'Design & Developed By iTech Avengers', 'itechavengers' ); ?></small>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div id="major-publishing-actions">
										<div id="publishing-action">
											<input type="submit" name="save" id="save" class="button button__success button__fade" value="<?php _e( 'Save Options', 'itechavengers' ); ?>"  />
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="av-col-lg-3">
					<?php include AVENGERS_PLUGIN_DIR . 'tabs/sidebar.php'; ?>
				</div>
			</div>
			
		</div>
	</div>
</div>

