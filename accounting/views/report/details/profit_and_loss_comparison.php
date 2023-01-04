<div id="accordion">
  <div class="card">
    <h3 class="text-center"><?php echo get_option('companyname'); ?></h3>
    <h4 class="text-center"><?php echo _l('profit_and_loss_comparison'); ?></h4>
    <p class="text-center"><?php echo _d($data_report['from_date']) .' - '. _d($data_report['to_date']); ?></p>
    <table class="tree">
      <thead>
        <tr class="tr_header">
          <th rowspan="2"></th>
          <th colspan="2" class="text-center th_total"><?php echo _l('total'); ?></th>
        </tr>
        <tr class="tr_header">
          <th class="th_total"><?php echo html_entity_decode($data_report['this_year_header']); ?></th>
          <th class="th_total"><?php echo html_entity_decode($data_report['last_year_header']); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $row_index = 0;
          $parent_index = 0;
          $row_index += 1;
          $parent_index = $row_index;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo _l('acc_income'); ?></td>
            <td class="total_amount"></td>
            <td class="total_amount"></td>
          </tr>
          <?php
          $row_index += 1;
          ?>
          <?php 
            $_index = $row_index;
            foreach ($data_report['data']['income'] as $key => $value) { 
              $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['this_year']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['last_year']); ?> 
              </td>
            </tr>
          <?php } ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_income'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['this_year']['income'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo app_format_money($data_report['last_year']['income'], $currency->name); ?></td>
          </tr>
          <?php $row_index += 1;
            $parent_index = $row_index;
          ?>
           <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo _l('acc_cost_of_sales'); ?></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($data_report['data']['cost_of_sales'] as $key => $value) {
            $row_index += 1;
           ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['this_year']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['last_year']); ?>
              </td>
            </tr>
          <?php } ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_cost_of_sales'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['this_year']['cost_of_sales'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo app_format_money($data_report['last_year']['cost_of_sales'], $currency->name); ?> </td>
          </tr>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('gross_profit_uppercase'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['this_year']['income'] - $data_report['this_year']['cost_of_sales'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo app_format_money($data_report['last_year']['income'] - $data_report['last_year']['cost_of_sales'], $currency->name); ?> </td>
          </tr>
          <?php $row_index += 1;
            $parent_index = $row_index;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo _l('acc_other_income'); ?></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($data_report['data']['other_income'] as $key => $value) {
            $row_index += 1;
           ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['this_year']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['last_year']); ?> 
              </td>
            </tr>
          <?php } ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_other_income_loss'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['this_year']['other_income'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo app_format_money($data_report['last_year']['other_income'], $currency->name); ?> </td>
          </tr>
          <?php $row_index += 1;
            $parent_index = $row_index;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo _l('acc_expenses'); ?></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($data_report['data']['expenses'] as $key => $value) { 
            $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['this_year']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['last_year']); ?>
              </td>
            </tr>
          <?php } ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_expenses'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['this_year']['expenses'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo app_format_money($data_report['last_year']['expenses'], $currency->name); ?> </td>
          </tr>
          <?php $row_index += 1;
            $parent_index = $row_index;
          ?>
          <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo _l('acc_other_expenses'); ?></td>
            <td></td>
            <td></td>
          </tr>
          <?php foreach ($data_report['data']['other_expenses'] as $key => $value) { 
            $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['this_year']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['last_year']); ?> 
              </td>
            </tr>
          <?php } 
            $row_index += 1;
          ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_other_expenses'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['this_year']['other_expenses'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo app_format_money($data_report['last_year']['other_expenses'], $currency->name); ?> </td>
          </tr>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('net_earnings_uppercase'); ?></td>
            <td class="total_amount"><?php echo app_format_money(($data_report['this_year']['income'] - $data_report['this_year']['cost_of_sales']) - ($data_report['this_year']['other_income'] + $data_report['this_year']['expenses'] + $data_report['this_year']['other_expenses']), $currency->name); ?> </td>
            <td class="total_amount"><?php echo app_format_money(($data_report['last_year']['income'] - $data_report['last_year']['cost_of_sales']) - ($data_report['last_year']['other_income'] + $data_report['last_year']['expenses'] + $data_report['last_year']['other_expenses']), $currency->name); ?> </td>
          </tr>
        </tbody>
    </table>
  </div>
</div>