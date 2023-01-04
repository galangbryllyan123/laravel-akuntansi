<div id="accordion">
  <div class="card">
    <h3 class="text-center"><?php echo get_option('companyname'); ?></h3>
    <h4 class="text-center"><?php echo _l('general_ledger'); ?></h4>
    <p class="text-center"><?php echo _d($data_report['from_date']) .' - '. _d($data_report['to_date']); ?></p>
    <table class="tree">
      <thead>
        <tr class="tr_header">
          <th><?php echo _l('invoice_payments_table_date_heading'); ?></th>
          <th><?php echo _l('transaction_type'); ?></th>
          <th><?php echo _l('customer'); ?></th>
          <th><?php echo _l('description'); ?></th>
          <th><?php echo _l('split'); ?></th>
          <th class="total_amount"><?php echo _l('amount'); ?></th>
          <th class="total_amount"><?php echo _l('balance'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
         $row_index = 0;
         $parent_index = 0;
         foreach ($data_report['data']['accounts_receivable'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php }
        foreach ($data_report['data']['cash_and_cash_equivalents'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['current_assets'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>
          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['fixed_assets'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>
            <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
            <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['non_current_assets'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
            <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['accounts_payable'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['credit_card'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['current_liabilities'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['non_current_liabilities'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['owner_equity'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['income'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['other_income'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['cost_of_sales'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['expenses'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php } ?>
        <?php foreach ($data_report['data']['other_expenses'] as $key => $value) {
          $row_index += 1;
          $parent_index = $row_index;
          $total_amount = 0;
          ?>
          <?php if(count($value['details'])){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
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
              <?php echo get_company_name($val['customer']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['description']); ?> 
              </td>
              <td>
              <?php echo html_entity_decode($val['split']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['amount'], $currency->name); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($val['balance'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php } ?>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>