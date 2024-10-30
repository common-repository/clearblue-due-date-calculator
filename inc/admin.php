<div class="wrap" id="cbddc-admin">
	<form method="POST">
		<h1>Clearblue® <strong><?php echo CbDueDateCalculator_Data::__(CBDDC_NAME); ?></strong></h1>

		<hr style="margin: 10px 0 30px 0;">
		<h2><?php CbDueDateCalculator_Data::_e("Shortcode"); ?></h2>
		<p>			
			<input
				value="[<?php echo CBDDC_BASENAME ?>]"
				class="text-regular"
				type="text"
				readonly
				style="min-width: 250px;"
			>
		</p>

		<hr style="margin: 30px 0;">
		<h2><?php CbDueDateCalculator_Data::_e("Settings"); ?></h2>
		<table class="form-table">
			<!--====== LANGUAGE =====-->
			<tr>
				<th scope="row"><label for="cbddc-language"><?php CbDueDateCalculator_Data::_e("cbddc-language"); ?></label></th>
				<td>
					<select id="cbddc-language" name="cbddc-language">
					<?php
						foreach (CbDueDateCalculator_Admin::$languages as $key => $value) :
							$selected = ($key === CbDueDateCalculator_Admin::$options['language']) ? 'selected="selected"' : '';
							echo '<option value="'. $key .'" '. $selected .'>'. $value .'</option>';
						endforeach;
					?>
					</select>
				</td>
			</tr>

			<!--====== FORMAT =====-->
			<tr>
				<th scope="row"><label for="cbddc-format"><?php CbDueDateCalculator_Data::_e("cbddc-format"); ?></label></th>
				<td>
					<fieldset>
						<?php foreach (CbDueDateCalculator_Admin::$formats as $key) : ?>
							<label>
								<input
									type="radio"
									name="cbddc-format"
									value="<?php echo $key; ?>"
									<?php if (CbDueDateCalculator_Admin::$options['format'] === $key) echo 'checked' ?>
								>
								<span><?php CbDueDateCalculator_Data::_e("cbddc-format-" . $key); ?></span>
							</label><br>
						<?php endforeach; ?>
					</fieldset>
				</td>
			</tr>

			<!--====== CREDITS =====-->
			<tr>
				<th scope="row"><label for="cbddc-show-credits"><?php CbDueDateCalculator_Data::_e("Credits"); ?></label></th>
				<td>
					<fieldset>
						<label>
							<input
								type="checkbox"
								name="cbddc-show-credits"
								<?php if (CbDueDateCalculator_Admin::$options['show-credits'] != 0) echo 'checked' ?>
							>
							<span><?php CbDueDateCalculator_Data::_e('Allow the plugin to display a "In partnership with Clearblue" link'); ?></span>
						</label>
					</fieldset>
				</td>
			</tr>
		</table>

		<hr style="margin: 10px 0 30px 0;">
		<h2><?php CbDueDateCalculator_Data::_e("Colors"); ?></h2>
		<table class="form-table">
			<?php foreach (CbDueDateCalculator_Admin::$options['colors'] as $key => $value) : ?>
				<tr>
					<th scope="row"><label for="cbddc-color-<?php echo $key; ?>">
						<?php CbDueDateCalculator_Data::_e("cbddc-color-" . $key); ?>
					</label></th>
					<td>
						<input
							id="cbddc-color-<?php echo $key; ?>"
							name="cbddc-color-<?php echo $key; ?>"
							value="<?php echo esc_attr(CbDueDateCalculator_Admin::$options['colors'][$key]); ?>"
							class="cb-color-picker"
							type="text"
						>
					</td>
				</tr>
        	<?php endforeach; ?>
		</table>

		<p class="submit">
			<input type="submit" name="cbddc-submit" id="submit" class="button button-primary" value="<?php CbDueDateCalculator_Data::_e('Save'); ?>">
		</p>
	</form>

	<hr style="margin: 30px 0;">
	<form method="POST">
		<h2><?php CbDueDateCalculator_Data::_e("Reset settings"); ?></h2>

		<input type="hidden" name="cbddc-reset" value="1">
		<p class="submit">
			<input type="submit" name="cb-submit-reset" id="cb-submit-reset" class="button" value="<?php CbDueDateCalculator_Data::_e('Reset settings'); ?>">
		</p>
	</form>
</div>
