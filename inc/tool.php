<?php
	$date_today = '11/02/2020';
	// TODO: nombre de colonnes

	CbDueDateCalculator_Data::display_js_data();
?>

<div class="cbddc -<?php echo CbDueDateCalculator_Admin::$options['format'];?>" data-locale="<?php echo CbDueDateCalculator_Admin::$options['language']; ?>">
	<div class="cbddc-wrapper -format-element">
		<div class="cbddc-tool -active">
			<div class="cbddc-tool-title">
				<?php CbDueDateCalculator_Data::_e(CBDDC_NAME); ?>
			</div>

			<div class="cbddc-input-line">
				<div class="cbddc-question">
					<?php CbDueDateCalculator_Data::_e('When did your last period start?'); ?>
				</div>
				<label class="cbddc-input-wrapper cbddc-datepicker -format-element">
					<input class="cbddc-input" name="cbddc-last-period-start-date" readonly="readonly" type="text" required>
					<svg version="1.1" class="-calendar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="48px" height="48px" viewBox="6 0 48 48" enable-background="new 6 0 48 48" xml:space="preserve"> <g> <path d="M50.244,48H9.756C7.686,48,6,46.315,6,44.244V6.757C6,4.686,7.686,3,9.757,3h40.485 C52.314,3,54,4.686,54,6.757v37.487C54,46.315,52.315,48,50.244,48z M9.757,6C9.34,6,9,6.34,9,6.757v37.487 C9,44.661,9.339,45,9.756,45h40.488C50.661,45,51,44.661,51,44.244V6.757C51,6.34,50.66,6,50.242,6H9.757z M52.5,15h-45 C6.672,15,6,14.328,6,13.5S6.672,12,7.5,12h45c0.83,0,1.5,0.672,1.5,1.5S53.33,15,52.5,15z M15,9c-0.828,0-1.5-0.672-1.5-1.5v-6 C13.5,0.672,14.172,0,15,0s1.5,0.672,1.5,1.5v6C16.5,8.328,15.828,9,15,9z M45,9c-0.83,0-1.5-0.672-1.5-1.5v-6 C43.5,0.672,44.17,0,45,0s1.5,0.672,1.5,1.5v6C46.5,8.328,45.83,9,45,9z"/> <circle cx="15" cy="27" r="1.5"/> <circle cx="15" cy="33" r="1.5"/> <circle cx="15" cy="39" r="1.5"/> <circle cx="39" cy="21" r="1.5"/> <circle cx="39" cy="27" r="1.5"/> <circle cx="39" cy="33" r="1.5"/> <circle cx="39" cy="39" r="1.5"/> <circle cx="45" cy="21" r="1.5"/> <circle cx="45" cy="27" r="1.5"/> <circle cx="45" cy="33" r="1.5"/> <circle cx="27" cy="21" r="1.5"/> <circle cx="27" cy="27" r="1.5"/> <circle cx="27" cy="33" r="1.5"/> <circle cx="27" cy="39" r="1.5"/> <circle cx="21" cy="21" r="1.5"/> <circle cx="21" cy="27" r="1.5"/> <circle cx="21" cy="33" r="1.5"/> <circle cx="21" cy="39" r="1.5"/> <circle cx="33" cy="21" r="1.5"/> <circle cx="33" cy="27" r="1.5"/> <circle cx="33" cy="33" r="1.5"/> <circle cx="33" cy="39" r="1.5"/> </g> </svg>
				</label>
			</div>
			<div class="cbddc-input-line">
				<div class="cbddc-question">
					<?php CbDueDateCalculator_Data::_e('Generally, how long are your cycles?'); ?>
				</div>
				<label class="cbddc-input-wrapper -format-element">
					<select class="cbddc-input" name="cbddc-cycle-length" required>
						<option value="" selected="selected"></option>
						<?php for ($i=20; $i<=40; $i++) : ?>
							<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php endfor; ?>
					</select>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="14" viewBox="0 0 12 14"> <g> <path d="M-0.011,8.065 C-0.011,8.065 -0.011,6.078 -0.011,6.078 C-0.011,6.078 5.244,11.312 5.244,11.312 C5.244,11.312 5.244,0.010 5.244,0.010 C5.244,0.010 6.730,0.010 6.730,0.010 C6.730,0.010 6.730,11.312 6.730,11.312 C6.730,11.312 11.985,6.078 11.985,6.078 C11.985,6.078 11.985,8.065 11.985,8.065 C11.985,8.065 5.979,14.012 5.979,14.012 C5.979,14.012 -0.011,8.065 -0.011,8.065 Z" fill-rule="evenodd"/> </svg>
				</label>
			</div>
			<div class="cbddc-button-wrapper">
				<div class="cbddc-button cbddc-button--arrow-right -format-element">
					<span><?php CbDueDateCalculator_Data::_e('Calculate your due date'); ?></span>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="14" height="12" viewBox="0 0 14 12"> <g> <path d="M8.065,12.011 C8.065,12.011 6.078,12.011 6.078,12.011 C6.078,12.011 11.312,6.756 11.312,6.756 C11.312,6.756 0.010,6.756 0.010,6.756 C0.010,6.756 0.010,5.270 0.010,5.270 C0.010,5.270 11.312,5.270 11.312,5.270 C11.312,5.270 6.078,0.015 6.078,0.015 C6.078,0.015 8.065,0.015 8.065,0.015 C8.065,0.015 14.012,6.021 14.012,6.021 C14.012,6.021 8.065,12.011 8.065,12.011 Z" fill-rule="evenodd"/> </g> </svg>
				</div>
			</div>
		</div>
		
		<div class="cbddc-results">
			<div class="cbddc-result">
				<div class="cbddc-result-container -format-element">
					<div class="cbddc-result-title"><strong><?php CbDueDateCalculator_Data::_e('Your baby is likely to be born on or around*'); ?></strong></div>
					<div class="cbddc-result-date"></div>
				</div>
				<div class="cbddc-description">
					<?php CbDueDateCalculator_Data::_e('*Only your physician can accurately determine your due date or the date of your conception based on his/her knowledge of your complete medical condition.'); ?>
				</div>
			</div>
			<div class="cbddc-button-wrapper">
				<div class="cbddc-button cbddc-button--arrow-left -format-element">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="14" height="12" viewBox="0 0 14 12"> <g> <path d="M5.935,-0.011 C5.935,-0.011 7.922,-0.011 7.922,-0.011 C7.922,-0.011 2.688,5.244 2.688,5.244 C2.688,5.244 13.990,5.244 13.990,5.244 C13.990,5.244 13.990,6.730 13.990,6.730 C13.990,6.730 2.688,6.730 2.688,6.730 C2.688,6.730 7.922,11.985 7.922,11.985 C7.922,11.985 5.935,11.985 5.935,11.985 C5.935,11.985 -0.012,5.979 -0.012,5.979 C-0.012,5.979 5.935,-0.011 5.935,-0.011 Z" fill-rule="evenodd"/> </g> </svg>
					<span><?php CbDueDateCalculator_Data::_e('Change my informations'); ?></span>
				</div>
			</div>
		</div>

		<div class="cbddc-description cbddc-description-global">
			<?php if (CbDueDateCalculator_Admin::$options['show-credits']) : ?>
				<?php CbDueDateCalculator_Data::_e('In partnership with Clearblue.'); ?>
			<?php else: ?>
				<?php // Remove the <a> link ?>
				<?php echo strip_tags(CbDueDateCalculator_Data::__('In partnership with Clearblue.')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
