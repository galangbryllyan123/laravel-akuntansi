<?php init_head();?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="panel_s">
        <div class="panel-body">
          <h4 class="no-margin font-bold"><?php echo _l($title); ?></h4>
          <hr />
          <div>
            <a href="#" class="btn btn-info add-new-account mbot15"><?php echo _l('add'); ?></a>
          </div>
          <div class="row">
            <div class="col-md-3">
              <?php echo render_select('ft_account',$accounts,array('id','name', 'account_type_name'),'acc_account', '', array('multiple' => true, 'data-actions-box' => true), array(), '', '', false); ?>
            </div>
            <div class="col-md-3">
              <?php echo render_select('ft_parent_account',$accounts,array('id','name', 'account_type_name'),'parent_account', '', array('multiple' => true, 'data-actions-box' => true), array(), '', '', false); ?>
            </div>
            <div class="col-md-3">
              <?php echo render_select('ft_type',$account_types,array('id','name'),'type', '', array('multiple' => true, 'data-actions-box' => true), array(), '', '', false); ?>
            </div>
            <div class="col-md-3">
              <?php echo render_select('ft_detail_type',$detail_types,array('id','name'),'detail_type', '', array('multiple' => true, 'data-actions-box' => true), array(), '', '', false); ?>
            </div>
            <div class="col-md-3">
              <?php $active = [ 
                    1 => ['id' => 'all', 'name' => _l('all')],
                    2 => ['id' => 'yes', 'name' => _l('is_active_export')],
                    3 => ['id' => 'no', 'name' => _l('is_not_active_export')],
                  ]; 
                  ?>
                  <?php echo render_select('ft_active',$active,array('id','name'),'staff_dt_active', 'yes', array(), array(), '', '', false); ?>
            </div>
          </div>
          <hr>
          <table class="table table-accounts">
            <thead>
              <?php if(get_option('acc_enable_account_numbers') == 1 && get_option('acc_show_account_numbers') == 1){ ?>
                <th><?php echo _l('number'); ?></th>
              <?php } ?>
              <th><?php echo _l('name'); ?></th>
              <th><?php echo _l('parent_account'); ?></th>
              <th><?php echo _l('type'); ?></th>
              <th><?php echo _l('detail_type'); ?></th>
              <th><?php echo _l('primary_balance'); ?></th>
              <th><?php echo _l('bank_balance'); ?></th>
              <th><?php echo _l('staff_dt_active'); ?></th>
              <th><?php echo _l('options'); ?></th>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $arrAtt = array();
      $arrAtt['data-type']='currency';
?>
<div class="modal fade" id="account-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo _l('acc_account')?></h4>
      </div>
      <?php echo form_open_multipart(admin_url('accounting/account'),array('id'=>'account-form'));?>
      <?php echo form_hidden('id'); ?>
      <?php echo form_hidden('update_balance'); ?>
      <div class="modal-body">
          <?php echo render_select('account_type_id',$account_types,array('id','name'),'account_type','',array(),array(),'','',false); ?>
          <?php echo render_select('account_detail_type_id',$detail_types,array('id','name'),'detail_type','',array(),array(),'','',false); ?>
          <p><i class="detail_type_note"><?php echo html_entity_decode($detail_types[0]['note']); ?></i></p>
        <?php echo render_input('name','name'); ?>
        <?php if(get_option('acc_enable_account_numbers') == 1){
           echo render_input('number','number'); 
        } ?>
        <?php echo render_select('parent_account',$accounts,array('id','name'),'parent_account'); ?>
        <div class="row hide" id="div_balance">
          <div class="col-md-6">
          <?php echo render_input('balance','balance','','text', $arrAtt); ?>
          </div>
          <div class="col-md-6">
          <?php echo render_date_input('balance_as_of','as_of'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="bold"><?php echo _l('dt_expense_description'); ?></p>
            <?php echo render_textarea('description','','',array(),array(),'','tinymce'); ?>
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
<?php init_tail(); ?>
</body>
</html>
<?php require 'modules/accounting/assets/js/chart_of_accounts/manage_js.php'; ?>
