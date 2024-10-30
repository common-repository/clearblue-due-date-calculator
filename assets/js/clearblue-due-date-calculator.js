(function ($, window, document, undefined) { 'use strict';

    /*
    *  Class creation
    */
	var CbDueDateCalculator = function(el) { this.constructor(el); }

    /*
    *  @function
    *  constructor
    */
	CbDueDateCalculator.prototype.constructor = function(el) {
		this.$container = $(el);
		this.locale = this.$container.attr('data-locale');
		this.$tool = this.$container.find('.cbddc-tool');
		this.$datepickers = this.$tool.find('.cbddc-datepicker');
		this.$results = this.$container.find('.cbddc-results');
		this.$buttonResults = this.$tool.find('.cbddc-button--arrow-right');
		this.$buttonModify = this.$results.find('.cbddc-button--arrow-left');

		this.initInputs();
		this.initDatepickers();

		this.$buttonResults.on('click', this.onClickButtonResults.bind(this));
		this.$buttonModify.on('click', this.onClickButtonModify.bind(this));
	}

    /*
    *  @function
    *  initInputs
    */
	CbDueDateCalculator.prototype.initInputs = function() {
		var inputs = {};
		this.$inputs = this.$tool.find('input, select, textarea');

		this.$inputs.each(function() {
			var $input = $(this),
				name = $input.attr('name');

			inputs[name] = {
				$el: $input,
				$wrapper: $input.parents('.cbddc-input-line'),
				value: $input.val(),
				required: !!$input.prop('required')
			};
		});

		this.$inputs.on('change', this.onInputChange.bind(this));
		this.inputs = inputs;
	}

    /*
    *  @function
    *  initDatepickers
    */
	CbDueDateCalculator.prototype.initDatepickers = function() {
		var tool = this;

		this.$datepickers.each(function() {
			new CbDatepicker(this, tool);
		});
	}

    /*
    *  @eventListener
    *  onInputChange
    */
	CbDueDateCalculator.prototype.onInputChange = function(e) {
		var $input = $(e.currentTarget),	
			name = $input.attr('name'),
			value = $input.val();

		this.inputs[name].value = value;
		this.checkRequiredInput(this.inputs[name]);
	}

    /*
    *  @eventListener
    *  onSelectDate
    */
	CbDueDateCalculator.prototype.onSelectDate = function(formattedDate, date, name) {
		this.inputs[name].value = date;
		this.checkRequiredInput(this.inputs[name]);
	}

    /*
    *  @function
    *  checkRequired
    */
	CbDueDateCalculator.prototype.checkRequired = function() {
		var errors = false;

		for (var i in this.inputs) {
			errors = (this.checkRequiredInput(this.inputs[i]) === true) ? true : errors;
		}

		return errors;
	}

    /*
    *  @function
    *  checkRequiredInput
    */
	CbDueDateCalculator.prototype.checkRequiredInput = function(input) {
		if (input.required && !!input.value === false) {
			input.$wrapper.addClass('-error');
			return true;
		}
		else {
			input.$wrapper.removeClass('-error');
			return false;
		}
	}

    /*
    *  @eventListener
    *  onClickButtonResults
    */
	CbDueDateCalculator.prototype.onClickButtonResults = function() {
		var errors = this.checkRequired();

		if (!errors) {
			this.showResults();
		}
	}

    /*
    *  @eventListener
    *  onClickButtonModify
    */
	CbDueDateCalculator.prototype.onClickButtonModify = function() {
		this.hideResults();
	}

    /*
    *  @function
    *  calculate
    */
	CbDueDateCalculator.prototype.calculate = function() {
		var cycleLength = parseInt(this.inputs['cbddc-cycle-length'].value),
			startDate = this.inputs['cbddc-last-period-start-date'].value,
			resultDate = (cycleLength == 0) ? startDate.addDays(280) : startDate.addDays(252 + cycleLength);

		this.$results.find('.cbddc-result-date').text(this.formatDateStr(resultDate, CBDDC_LOCALE.dateFormatLong));
	}

    /*
    *  @function
    *  showResults
    */
	CbDueDateCalculator.prototype.showResults = function() {
		this.calculate();
		this.$tool.removeClass('-active');
		this.$results.addClass('-active');
	}

    /*
    *  @function
    *  hideResults
    */
	CbDueDateCalculator.prototype.hideResults = function() {
		this.$tool.addClass('-active');
		this.$results.removeClass('-active');
	}

    /*
    *  @function
    *  formatDateStr
    */
	CbDueDateCalculator.prototype.formatDateStr = function(date, format) {
		format = format || CBDDC_LOCALE.dateFormat;
		return date.formatCustom(format, CBDDC_LOCALE);
	}

    /*
    *  Instanciation
    */
    $('.cbddc').each(function() {
    	new CbDueDateCalculator(this);
    });

})(jQuery, window, document);
