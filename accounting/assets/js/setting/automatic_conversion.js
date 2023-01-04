var fnServerParams, id, inventory_asset_account, income_account, expense_account, item_id, tax_id, payment_account, deposit_to;
(function($) {
	"use strict";

	appValidateForm($('#item-automatic-form'), {
		'item[]': 'required',
    },item_automatic_form_handler);

  appValidateForm($('#tax-mapping-form'), {
    'tax[]': 'required',
    },tax_mapping_form_handler);

  appValidateForm($('#edit-tax-mapping-form'), {
    'tax_id': 'required',
    },tax_mapping_form_handler);

    appValidateForm($('#edit-item-automatic-form'), {
		item_id: 'required',
    },item_automatic_form_handler);

		fnServerParams = {

    };

	$('input[name="acc_automatic_conversion"]').on('change', function() {
	    if($('input[name="acc_automatic_conversion"]').is(':checked') == true){
	      $('#div_automatic_conversion').removeClass('hide');
	    }else{
	      $('#div_automatic_conversion').addClass('hide');
	    }
	});
	
  init_item_automatic_table();
	init_tax_mapping_table();
})(jQuery);

function init_item_automatic_table() {
  "use strict";

  if ($.fn.DataTable.isDataTable('.table-item-automatic')) {
     $('.table-item-automatic').DataTable().destroy();
  }
  initDataTable('.table-item-automatic', admin_url + 'accounting/item_automatic_table', false, false, fnServerParams, [0, 'desc']);
}

function init_tax_mapping_table() {
  "use strict";

  if ($.fn.DataTable.isDataTable('.table-tax-mapping')) {
     $('.table-tax-mapping').DataTable().destroy();
  }
  initDataTable('.table-tax-mapping', admin_url + 'accounting/tax_mapping_table', false, false, fnServerParams, [0, 'desc']);
}

function add_item_automatic(invoker) {
  "use strict";

  $('#item-automatic-modal').find('button[type="submit"]').prop('disabled', false);
  $('#item-automatic-modal').modal('show');
  $('#item-automatic-modal input[name="id"]').val('');
  $('#item-automatic-modal select[name="transfer_funds_from"]').val('').change();
  $('#item-automatic-modal select[name="transfer_funds_to"]').val('').change();
  $('#item-automatic-modal input[name="date"]').val('');
  $('#item-automatic-modal input[name="transfer_amount"]').val('');
}

function edit_item_automatic(invoker) {
  "use strict";

  	id = $(invoker).data('id');
	item_id = $(invoker).data('item-id');
	inventory_asset_account = $(invoker).data('inventory-asset-account');
	income_account = $(invoker).data('income-account');
	expense_account = $(invoker).data('expense-account');

    $('#edit-item-automatic-modal').find('button[type="submit"]').prop('disabled', false);
    $('#edit-item-automatic-modal input[name="id"]').val(id);
    $('#edit-item-automatic-modal select[name="item_id"]').val(item_id).change();
    $('#edit-item-automatic-modal select[name="inventory_asset_account"]').val(inventory_asset_account).change();
    $('#edit-item-automatic-modal select[name="income_account"]').val(income_account).change();
    $('#edit-item-automatic-modal select[name="expense_account"]').val(expense_account).change();

    $('#edit-item-automatic-modal').modal('show');
}


function item_automatic_form_handler(form) {
    "use strict";
    $('#item-automatic-modal').find('button[type="submit"]').prop('disabled', true);

    var formURL = form.action;
    var formData = new FormData($(form)[0]);

    $.ajax({
        type: $(form).attr('method'),
        data: formData,
        mimeType: $(form).attr('enctype'),
        contentType: false,
        cache: false,
        processData: false,
        url: formURL
    }).done(function(response) {
        response = JSON.parse(response);
        if (response.success == 'close_the_book' || $.isNumeric(response.success)) {
          alert_float('warning', response.message);
        }else if (response.success === true || response.success == 'true' || $.isNumeric(response.success)) {
          alert_float('success', response.message);
          init_item_automatic_table();
        }else {
          alert_float('danger', response.message);
        }
        $('#item-automatic-modal').modal('hide');
        $('#edit-item-automatic-modal').modal('hide');
    }).fail(function(error) {
        alert_float('danger', JSON.parse(error.mesage));
    });

    return false;
}

function add_tax_mapping(invoker) {
  "use strict";

  $('#tax-mapping-modal').find('button[type="submit"]').prop('disabled', false);
  $('#tax-mapping-modal').modal('show');
  $('#tax-mapping-modal input[name="id"]').val('');
  $('#tax-mapping-modal select[name="tax[]"]').val('').change();
  $('#tax-mapping-modal select[name="payment_account"]').val($('#acc_tax_payment_account').val()).change();
  $('#tax-mapping-modal select[name="deposit_to"]').val($('#acc_tax_deposit_to').val()).change();
}

function edit_tax_mapping(invoker) {
  "use strict";

    id = $(invoker).data('id');
    tax_id = $(invoker).data('tax-id');
    payment_account = $(invoker).data('payment-account');
    deposit_to = $(invoker).data('deposit-to');

    $('#edit-tax-mapping-modal').find('button[type="submit"]').prop('disabled', false);
    $('#edit-tax-mapping-modal input[name="id"]').val(id);
    $('#edit-tax-mapping-modal select[name="tax_id"]').val(tax_id).change();
    $('#edit-tax-mapping-modal select[name="payment_account"]').val(payment_account).change();
    $('#edit-tax-mapping-modal select[name="deposit_to"]').val(deposit_to).change();

    $('#edit-tax-mapping-modal').modal('show');
}

function tax_mapping_form_handler(form) {
    "use strict";
    $('#tax-mapping-modal').find('button[type="submit"]').prop('disabled', true);

    var formURL = form.action;
    var formData = new FormData($(form)[0]);

    $.ajax({
        type: $(form).attr('method'),
        data: formData,
        mimeType: $(form).attr('enctype'),
        contentType: false,
        cache: false,
        processData: false,
        url: formURL
    }).done(function(response) {
        response = JSON.parse(response);
        if (response.success == 'close_the_book' || $.isNumeric(response.success)) {
          alert_float('warning', response.message);
        }else if (response.success === true || response.success == 'true' || $.isNumeric(response.success)) {
          alert_float('success', response.message);
          init_tax_mapping_table();
        }else {
          alert_float('danger', response.message);
        }
        $('#tax-mapping-modal').modal('hide');
        $('#edit-tax-mapping-modal').modal('hide');
    }).fail(function(error) {
        alert_float('danger', JSON.parse(error.mesage));
    });

    return false;
}