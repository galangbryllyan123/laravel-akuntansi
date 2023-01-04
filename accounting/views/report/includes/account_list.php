<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head();?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="panel_s">
        <div class="panel-body">
          <h4 class="no-margin font-bold"><?php echo _l($title); ?></h4>
          <a href="<?php echo admin_url('accounting/report'); ?>"><?php echo _l('back_to_report_list'); ?></a>
          <hr />
          <div class="col-md-12"> 
            <div class="btn-group pull-right">
               <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i><?php if(is_mobile()){echo ' PDF';} ?> <span class="caret"></span></a>
               <ul class="dropdown-menu dropdown-menu-right">
                  <li>
                     <a href="#" onclick="printDiv(); return false;">
                     <?php echo _l('export_to_pdf'); ?>
                     </a>
                  </li>
                  <li>
                     <a href="#" onclick="printExcel(); return false;">
                     <?php echo _l('export_to_excel'); ?>
                     </a>
                  </li>
               </ul>
            </div>
          </div>
          <div class="row"> 
            <div class="col-md-12"> 
              <hr>
            </div>
          </div>
          <div class="page" id="DivIdToPrint">
            <div id="accordion">
              <div class="card">
                <h3 class="text-center"><?php echo get_option('companyname'); ?></h3>
                <h4 class="text-center"><?php echo _l('account_list'); ?></h4>
                <p class="text-center"><?php echo _d(date('Y-m-d')); ?></p>
                <table class="tree">
                  <thead>
                    <tr class="tr_header">
                      <th><?php echo _l('number'); ?></th>
                      <th><?php echo _l('acc_account'); ?></th>
                      <th><?php echo _l('type'); ?></th>
                      <th><?php echo _l('detail_type'); ?></th>
                      <th><?php echo _l('description'); ?></th>
                      <th class="th_total"><?php echo _l('balance'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $row_index = 1;
                      $total = 0;
                      ?>
                      <?php foreach ($data_report['data']['cash_and_cash_equivalents'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000" >
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['accounts_receivable'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['current_assets'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['fixed_assets'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['non_current_assets'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['accounts_payable'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['credit_card'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['current_liabilities'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['non_current_liabilities'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['owner_equity'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['income'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['cost_of_sales'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['expenses'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['other_income'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                      <?php foreach ($data_report['data']['other_expenses'] as $key => $value) { 
                        $total += $value['amount'];
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
                        <td >
                          <?php echo html_entity_decode($value['number']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['name']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['detail_type']); ?> 
                        </td>
                        <td >
                          <?php echo html_entity_decode($value['description']); ?> 
                        </td>
                        <td class="total_amount">
                          <?php echo app_format_money($value['amount'], $currency->name); ?> 
                        </td>
                      </tr>
                      <?php } $row_index += 1; ?>
                    </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php init_tail(); ?>
</body>
</html>
