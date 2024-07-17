<?php
/**
 * @file
 * Cost-text component's template
 */
?>

<div :style="additionalCss" class="calc-item ccb-field" :class="{required: requiredWrapperActive, [formElementField.additionalStyles]: formElementField.additionalStyles}" :data-id="formElementField.alias" :data-repeater="repeater">
	<div class="calc-item__title">
		<span>{{ formElementField.label }}</span>
		<span class="ccb-required-mark" v-if="formElementField.required">*</span>
	</div>

	<div class="calc-item__description before">
		<span v-text="formElementField.description"></span>
	</div>
	<div class="calc-form-element-field-wrapper">
		<component :is="getComponent" :value="value" :repeater="repeater" :field="formElementField" @update-value="updateValue" @update-error="updateError"></component>
	</div>

	<div class="calc-item__description after">
		<span v-text="formElementField.description"></span>
	</div>
</div>
