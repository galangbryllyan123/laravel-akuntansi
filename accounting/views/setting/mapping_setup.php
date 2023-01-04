<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php 

  $acc_automatic_conversion = get_option('acc_automatic_conversion');

  $acc_invoice_payment_account = get_option('acc_invoice_payment_account');
  $acc_invoice_deposit_to = get_option('acc_invoice_deposit_to');
  $acc_payment_payment_account = get_option('acc_payment_payment_account');
  $acc_payment_deposit_to = get_option('acc_payment_deposit_to');
  $acc_expense_payment_account = get_option('acc_expense_payment_account');
  $acc_expense_deposit_to = get_option('acc_expense_deposit_to');
  $acc_tax_payment_account = get_option('acc_tax_payment_account');
  $acc_tax_deposit_to = get_option('acc_tax_deposit_to');
 ?>
 
<?php echo form_open(admin_url('accounting/update_automatic_conversion'),array('id'=>'general-settings-form')); ?>
<div class="row">
  <div class="col-md-12">
    <div class="col-md-6">
      <div class="row">
          <div class="col-md-6 mtop10 border-right">
            <span><?php echo _l('automatic_conversion'); ?> <i class="fa fa-question-circle" data-toggle="tooltip" data-title="<?php echo _l('automatic_conversion_note'); ?>"></i></span>
          </div>
          <div class="col-md-6 mtop10">
              <div class="onoffswitch">
                  <input type="checkbox" id="acc_automatic_conversion" data-perm-id="3" class="onoffswitch-checkbox" <?php if($acc_automatic_conversion == '1'){echo 'checked';} ?>  value="1" name="acc_automatic_conversion">
                  <label class="onoffswitch-label" for="acc_automatic_conversion"></label>
              </div>
          </div>
      </div>
    </div>
    <div class="col-md-12">
      <div id="div_automatic_conversion" class="<?php if($acc_automatic_conversion != '1'){echo 'hide';} ?>">
        <div class="div_content">
          <h5 class="title mbot5"><?php echo _l('invoice_default_for_all_item') ?></h5>
          <div class="row">
            <div class="col-md-6">
              <?php echo render_select('acc_invoice_payment_account',$accounts,array('id','name', 'account_type_name'),'payment_account',$acc_invoice_payment_account,array(),array(),'','',false); ?>
            </div>
            <div class="col-md-6">
              <?php echo render_select('acc_invoice_deposit_to',$accounts,array('id','name', 'account_type_name'),'deposit_to',$acc_invoice_deposit_to,array(),array(),'','',false); ?>
            </div>
          </div>
        </div>
        <div class="div_content">
          <h5 class="title mbot5"><?php echo _l('payment') ?></h5>
          <div class="row">
            <div class="col-md-6">
              <?php echo render_select('acc_payment_payment_account',$accounts,array('id','name', 'account_type_name'),'payment_account',$acc_payment_payment_account,array(),array(),'','',false); ?>
            </div>
            <div class="col-md-6">
              <?php echo render_select('acc_payment_deposit_to',$accounts,array('id','name', 'account_type_name'),'deposit_to',$acc_payment_deposit_to,array(),array(),'','',false); ?>
            </div>
          </div>
        </div>
        <div class="div_content">
          <h5 class="title mbot5"><?php echo _l('expense_default') ?></h5>
          <div class="row">
            <div class="col-md-6">
              <?php echo render_select('acc_expense_payment_account',$accounts,array('id','name', 'account_type_name'),'payment_account',$acc_expense_payment_account,array(),array(),'','',false); ?>
            </div>
            <div class="col-md-6">
              <?php echo render_select('acc_expense_deposit_to',$accounts,array('id','name', 'account_type_name'),'deposit_to',$acc_expense_deposit_to,array(),array(),'','',false); ?>
            </div>
          </div>
        </div>
        <div class="div_content">
          <h5 class="title mbot5"><?php echo _l('tax_default') ?></h5>
          <div class="row">
            <div class="col-md-6">
              <?php echo render_select('acc_tax_payment_account',$accounts,array('id','name', 'account_type_name'),'payment_account',$acc_tax_payment_account,array(),array(),'','',false); ?>
            </div>
            <div class="col-md-6">
              <?php echo render_select('acc_tax_deposit_to',$accounts,array('id','name', 'account_type_name'),'deposit_to',$acc_tax_deposit_to,array(),array(),'','',false); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
  <div class="col-md-12">
    <button type="submit" class="btn btn-info pull-right"><?php echo _l('submit'); ?></button>
  </div>
<?php echo form_close(); ?>
<div class="row">
  <div class="col-md-12">
    <hr>
  </div>
</div>
  <h4 class="no-margin font-bold"><?php echo _l('item_mapping_setup'); ?></h4>
<hr>
<a href="#" onclick="add_item_automatic(); return false;" class="btn btn-info mr-4 button-margin-r-b" title="<?php echo _l('add') ?> ">
  <?php echo _l('add'); ?>
</a>
<hr>
<table class="table table-item-automatic">
  <thead>
    <th><?php echo _l('invoice_items_list_description'); ?></th>
    <th><?php echo _l('invoice_items_list_rate'); ?></th>
    <th><?php echo _l('item_group_name'); ?></th>
  </thead>
  <tbody>
  </tbody>
</table>
<div class="row">
  <div class="col-md-12">
    <hr>
  </div>
</div>
  <h4 class="no-margin font-bold"><?php echo _l('tax_mapping_setup'); ?></h4>
<hr>
<a href="#" onclick="add_tax_mapping(); return false;" class="btn btn-info mr-4 button-margin-r-b" title="<?php echo _l('add') ?> ">
  <?php echo _l('add'); ?>
</a>
<hr>
<table class="table table-tax-mapping">
  <thead>
    <th><?php echo _l('id'); ?></th>
    <th><?php echo _l('tax_dt_name'); ?></th>
    <th><?php echo _l('tax_dt_rate'); ?></th>
  </thead>
  <tbody>
  </tbody>
</table>

<?php $arrAtt = array();
      $arrAtt['data-type']='currency';
?>
<div class="modal fade" id="item-automatic-modal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?php echo _l('item_mapping_setup')?></h4>
         </div>
         <?php echo form_open_multipart(admin_url('accounting/item_automatic'),array('id'=>'item-automatic-form'));?>
         <?php echo form_hidden('id'); ?>
         <div class="modal-body">
              <?php echo render_select('item[]',$items,array('id','description'),'acc_item', '', array('multiple' => true, 'data-actions-box' => true), array(), '', '', false); ?>
              <?php echo render_select('inventory_asset_account',$accounts,array('id','name','account_type_name'),'inventory_asset_account', '37', array(), array(), '', '', false); ?>
              <?php echo render_select('income_account',$accounts,array('id','name','account_type_name'),'income_account', '69', array(), array(), '', '', false); ?>
              <?php echo render_select('expense_account',$accounts,array('id','name','account_type_name'),'expense_account', '16', array(), array(), '', '', false); ?>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
            <button type="submit" class="btn btn-info btn-submit"><?php echo _l('submit'); ?></button>
         </div>
         <?php echo form_close(); ?>  
      </div>
   </div>
</div>

<div class="modal fade" id="edit-item-automatic-modal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?php echo _l('item_mapping_setup')?></h4>
         </div>
         <?php echo form_open_multipart(admin_url('accounting/item_automatic'),array('id'=>'edit-item-automatic-form'));?>
         <?php echo form_hidden('id'); ?>
         
         <div class="modal-body">
              <?php echo render_select('item_id',$_items,array('itemid','description'),'acc_item', '',array('disabled' => true), array(), '', '', false); ?>
              <?php echo render_select('inventory_asset_account',$accounts,array('id','name','account_type_name'),'inventory_asset_account', '37', array(), array(), '', '', false); ?>
              <?php echo render_select('income_account',$accounts,array('id','name','account_type_name'),'income_account', '69', array(), array(), '', '', false); ?>
              <?php echo render_select('expense_account',$accounts,array('id','name','account_type_name'),'expense_account', '16', array(), array(), '', '', false); ?>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
            <button type="submit" class="btn btn-info btn-submit"><?php echo _l('submit'); ?></button>
         </div>
         <?php echo form_close(); ?>  
      </div>
   </div>
</div>


<div class="modal fade" id="tax-mapping-modal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?php echo _l('tax_mapping_setup')?></h4>
         </div>
         <?php echo form_open_multipart(admin_url('accounting/tax_mapping'),array('id'=>'tax-mapping-form'));?>
         <?php echo form_hidden('id'); ?>
         <div class="modal-body">
              <?php echo render_select('tax[]',$taxes,array('id','name', 'taxrate'),'tax', '', array('multiple' => true, 'data-actions-box' => true), array(), '', '', false); ?>
              <div class="row">
                <div class="col-md-6">
                  <?php echo render_select('payment_account',$accounts,array('id','name', 'account_type_name'),'payment_account',$acc_tax_payment_account,array(),array(),'','',false); ?>
                </div>
                <div class="col-md-6">
                  <?php echo render_select('deposit_to',$accounts,array('id','name', 'account_type_name'),'deposit_to',$acc_tax_deposit_to,array(),array(),'','',false); ?>
                </div>
              </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
            <button type="submit" class="btn btn-info btn-submit"><?php echo _l('submit'); ?></button>
         </div>
         <?php echo form_close(); ?>  
      </div>
   </div>
</div>

<div class="modal fade" id="edit-tax-mapping-modal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?php echo _l('item_mapping_setup')?></h4>
         </div>
         <?php echo form_open_multipart(admin_url('accounting/tax_mapping'),array('id'=>'edit-tax-mapping-form'));?>
         <?php echo form_hidden('id'); ?>
         
         <div class="modal-body">
              <?php echo render_select('tax_id',$_taxes,array('id','name', 'taxrate'),'acc_item', '',array('disabled' => true), array(), '', '', false); ?>
              <div class="row">
                <div class="col-md-6">
                  <?php echo render_select('payment_account',$accounts,array('id','name', 'account_type_name'),'payment_account',$acc_tax_payment_account,array(),array(),'','',false); ?>
                </div>
                <div class="col-md-6">
                  <?php echo render_select('deposit_to',$accounts,array('id','name', 'account_type_name'),'deposit_to',$acc_tax_deposit_to,array(),array(),'','',false); ?>
                </div>
              </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _l('close'); ?></button>
            <button type="submit" class="btn btn-info btn-submit"><?php echo _l('submit'); ?></button>
         </div>
         <?php echo form_close(); ?>  
      </div>
   </div>
</div>