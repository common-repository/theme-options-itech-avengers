<h3 class="hndle"><span>Avengers Global Settings</span></h3>
<div class="disable_option dc-text__block mb30 mt30">
	<div class="inside">
		<table cellpadding="0" class="avengers-input-global-fields">
			<tbody>
				<tr>
					<th width="25%" align="left" valign="top" scope="row"><?php _e( 'Google Analytics', 'itechavengers' ); ?></th>
					<td width="2%"></td>
					<td align="left">
						<input type="text" id="avengers_theme_options[analytics]" class="avengers-input" placeholder="UA-12345678-9" name="avengers_theme_options[analytics]" value="<?php esc_attr_e( $options['analytics'] ); ?>">
						<small for="avengers_theme_options[analytics]"><?php _e( 'Add your Google Analytics code here UA-12345678-9.', 'itechavengers' ); ?></small>
					</td>
				</tr>
				<tr>
					<th align="left" valign="top" scope="row"><?php _e( 'Google Tag Manager', 'itechavengers' ); ?></th>
					<td></td>
					<td align="left">
						<input type="text" id="avengers_theme_options[customCodeHeaderTag]" class="avengers-input" placeholder="G-XX123AABB" name="avengers_theme_options[customCodeHeaderTag]" value="<?php esc_attr_e( $options['customCodeHeaderTag'] ); ?>">
						<small for="avengers_theme_options[customCodeHeaderTag]">
							<?php _e( 'Add your Google Tag Manager ID here, like G-XX123AABB', 'itechavengers' ); ?>
						</small>
					</td>
				</tr>
				<!--<tr>
					<th align="left" valign="top" scope="row"><?php _e( 'Other Code<br />add to footer.php', 'itechavengers' ); ?></th>
					<td></td>
					<td align="left"><textarea id="avengers_theme_options[customCodeFooterTag]" class="large-text" cols="50" rows="10" name="avengers_theme_options[customCodeFooterTag]"><?php //echo esc_textarea( $options['customCodeFooterTag'] ); ?></textarea>
						<small for="avengers_theme_options[customCodeFooterTag]">
							<?php //_e( 'Any custom code that needs to be added to footer.php', 'itechavengers' ); ?>
						</small></td>
				</tr>-->
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
