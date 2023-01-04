<div id="accordion">
  <div class="card">
    <h3 class="text-center"><?php echo get_option('companyname'); ?></h3>
    <h4 class="text-center"><?php echo _l('balance_sheet_detail'); ?></h4>
    <p class="text-center"><?php echo _d($data_report['from_date']) .' - '. _d($data_report['to_date']); ?></p>
    <table class="tree">
      <thead>
        <tr class="tr_header">
          <th><?php echo _l('invoice_payments_table_date_heading'); ?></th>
          <th><?php echo _l('transaction_type'); ?></th>
          <th><?php echo _l('description'); ?></th>
          <th><?php echo _l('debit'); ?></th>
          <th><?php echo _l('credit'); ?></th>
          <th><?php echo _l('amount'); ?></th>
          <th><?php echo _l('balance'); ?></th>
        </tr>
      </thead>
      <tbody>
        <tr class="treegrid-1000 parent-node expanded">
          <td class="parent"><?php echo _l('acc_assets'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php $total_assets = 0; ?>
        <?php
         $row_index = 0;
         $parent_index = 0;
         foreach ($data_report['data']['accounts_receivable'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php $total_assets += $total_amount; ?>
        <?php }
        foreach ($data_report['data']['cash_and_cash_equivalents'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php $total_assets += $total_amount; ?>
        <?php } ?>
        <?php foreach ($data_report['data']['current_assets'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>
          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php $total_assets += $total_amount; ?>
        <?php } ?>
        <?php foreach ($data_report['data']['fixed_assets'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>
            <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded">
              <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
            <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php $total_assets += $total_amount; ?>
        <?php } ?>
        <?php foreach ($data_report['data']['non_current_assets'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
            <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php $total_assets += $total_amount; ?>
        <?php } ?>
        <?php $row_index += 1; ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10001 parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_assets'); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_assets, $currency->name); ?> </td>
            <td></td>
          </tr>
        <tr class="treegrid-1001 parent-node expanded">
          <td class="parent"><?php echo _l('liabilities_and_shareholders_equity'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php $row_index += 1;
          $_parent_index = $row_index; 
          ?>
        <tr class="treegrid-<?php echo html_entity_decode($_parent_index); ?> treegrid-parent-1001 parent-node expanded">
          <td class="parent"><?php echo _l('liabilities'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php 
        $total_liabilities_and_equity = 0;
        foreach ($data_report['data']['accounts_payable'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php $total_liabilities_and_equity += $total_amount; ?>
        <?php } ?>
        <?php foreach ($data_report['data']['credit_card'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php $total_liabilities_and_equity += $total_amount; ?>
        <?php } ?>
        <?php foreach ($data_report['data']['current_liabilities'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php $total_liabilities_and_equity += $total_amount; ?>
        <?php } ?>
        <?php foreach ($data_report['data']['non_current_liabilities'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php $total_liabilities_and_equity += $total_amount; ?>
        <?php } ?>
        <?php $row_index += 1;
          $_parent_index = $row_index; 
          ?>
        <tr class="treegrid-<?php echo html_entity_decode($_parent_index); ?> treegrid-parent-1001 parent-node expanded">
          <td class="parent"><?php echo _l('equity'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php foreach ($data_report['data']['owner_equity'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo _d($val['date']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['type']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['debit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['credit'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td>
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php $total_liabilities_and_equity += $total_amount; ?>
        <?php } ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('acc_net_income'); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($data_report['net_income'], $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php $row_index += 1; 
        $total_liabilities_and_equity += $total_amount + $data_report['net_income'];
        ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10011 parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_liabilities_and_equity'); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo app_format_money($total_liabilities_and_equity, $currency->name); ?> </td>
            <td></td>
          </tr>
      </tbody>
    </table>
  </div>
</div>