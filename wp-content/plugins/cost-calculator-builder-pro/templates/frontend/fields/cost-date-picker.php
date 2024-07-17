<?php
/**
 * @file
 * Cost-date-picker component's template
 */
?>

<div :style="additionalCss" class="calc-item ccb-field" :class="[dateField.additionalStyles, {required: requiredActive}]" :data-id="dateField.alias" :data-repeater="repeater">
	<div class="calc-item__title">
		<span> {{ dateField.label }} </span>
		<span class="ccb-required-mark" v-if="dateField.required">*</span>
		<span class="is-pro">
			<span class="pro-tooltip">
				pro
				<span style="visibility: hidden;" class="pro-tooltiptext">Feature Available <br> in Pro Version</span>
			</span>
		</span>
	</div>

	<div class="calc-item__description before">
		<span v-text="dateField.description"></span>
	</div>

	<div :class="['calc_' + dateField.alias]">
		<customDateCalendarField :repeater="repeater" v-model="value" :index="index" @setDatetimeField="setDatetimeField" :dateField="dateField"></customDateCalendarField>
	</div>

	<div class="calc-item__description after">
		<span v-text="dateField.description"></span>
	</div>
</div>
