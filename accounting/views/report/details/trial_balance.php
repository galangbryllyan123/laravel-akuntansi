<div id="accordion">
  <div class="card">
    <h3 class="text-center"><?php echo get_option('companyname'); ?></h3>
    <h4 class="text-center"><?php echo _l('trial_balance'); ?></h4>
    <p class="text-center"><?php echo _d($data_report['from_date']) .' - '. _d($data_report['to_date']); ?></p>
    <table class="tree">
      <thead>
        <tr class="tr_header">
          <th><?php echo _l('acc_account'); ?></th>
          <th class="th_total"><?php echo _l('debit'); ?></th>
          <th class="th_total"><?php echo _l('credit'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $row_index = 0;
          $total_credit = 0;
          $total_debit = 0;
          ?>
          <?php foreach ($data_report['data']['cash_and_cash_equivalents'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['accounts_receivable'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['current_assets'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['fixed_assets'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['non_current_assets'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['accounts_payable'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['credit_card'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['current_liabilities'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['non_current_liabilities'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['owner_equity'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['income'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['cost_of_sales'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['expenses'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['other_income'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <?php foreach ($data_report['data']['other_expenses'] as $key => $value) { 
            $total_debit += $value['debit'];
            $total_credit += $value['credit'];
            $row_index += 1;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000">
            <td >
              <?php echo html_entity_decode($value['name']); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['debit'], $currency->name); ?> 
            </td>
            <td class="total_amount">
              <?php echo app_format_money($value['credit'], $currency->name); ?> 
            </td>
          </tr>
          <?php } $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-10000 tr_total">
            <td class="parent"><?php echo _l('total'); ?></td>
            <td class="total_amount"><?php echo app_format_money($total_debit, $currency->name); ?> </td>
            <td class="total_amount"><?php echo app_format_money($total_credit, $currency->name); ?> </td>
          </tr>
        </tbody>
    </table>
  </div>
</div>