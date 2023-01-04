<div id="accordion">
  <div class="card">
    <h3 class="text-center"><?php echo get_option('companyname'); ?></h3>
    <h4 class="text-center"><?php echo _l('profit_and_loss_as_of_total_income'); ?></h4>
    <p class="text-center"><?php echo _d($data_report['from_date']) .' - '. _d($data_report['to_date']); ?></p>
    <table class="tree">
      <thead>
        <tr class="tr_header">
          <th rowspan="2"></th>
          <th colspan="2" class="text-center th_total_2"><?php echo _l('total'); ?></th>
        </tr>
        <tr class="tr_header">
          <th class="th_total_2"><?php echo _d($data_report['from_date']) .' - '. _d($data_report['to_date']); ?></th>
          <th class="th_total_2"><?php echo _l('percent_of_income'); ?></th>
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
              <?php echo html_entity_decode($value['amount']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['percent']); ?>% 
              </td>
            </tr>
          <?php } ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_income'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['total']['income'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo html_entity_decode($data_report['percent']['income']); ?>% </td>
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
              <?php echo html_entity_decode($value['amount']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['percent']); ?>%
              </td>
            </tr>
          <?php } ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_cost_of_sales'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['total']['cost_of_sales'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo html_entity_decode($data_report['percent']['cost_of_sales']); ?>% </td>
          </tr>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('gross_profit_uppercase'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['total']['income'] - $data_report['total']['cost_of_sales'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo html_entity_decode($data_report['percent']['income'] - $data_report['percent']['cost_of_sales']); ?>% </td>
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
              <?php echo html_entity_decode($value['amount']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['percent']); ?>% 
              </td>
            </tr>
          <?php } ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_other_income_loss'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['total']['other_income'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo html_entity_decode($data_report['percent']['other_income']); ?>% </td>
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
              <?php echo html_entity_decode($value['amount']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['percent']); ?>% 
              </td>
            </tr>
          <?php } ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_expenses'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['total']['expenses'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo html_entity_decode($data_report['percent']['expenses']); ?>% </td>
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
              <?php echo html_entity_decode($value['amount']); ?> 
              </td>
              <td class="total_amount">
              <?php echo html_entity_decode($value['percent']); ?>% 
              </td>
            </tr>
          <?php } 
            $row_index += 1;
          ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_other_expenses'); ?></td>
            <td class="total_amount"><?php echo app_format_money($data_report['total']['other_expenses'], $currency->name); ?> </td>
            <td class="total_amount"><?php echo html_entity_decode($data_report['percent']['other_expenses']); ?>% </td>
          </tr>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('net_earnings_uppercase'); ?></td>
            <td class="total_amount"><?php echo app_format_money(($data_report['total']['income'] - $data_report['total']['cost_of_sales']) - ($data_report['total']['other_income'] + $data_report['total']['expenses'] + $data_report['total']['other_expenses']), $currency->name); ?> </td>
            <?php if($data_report['total']['income'] != 0){ ?>
              <td class="total_amount"><?php echo round(((($data_report['total']['income'] - $data_report['total']['cost_of_sales']) - ($data_report['total']['other_income'] + $data_report['total']['expenses'] + $data_report['total']['other_expenses'])) / $data_report['total']['income']) * 100, 2); ?>% </td>
            <?php }else{ ?>
              <td class="total_amount">0%</td>
           <?php } ?>
          </tr>
        </tbody>
    </table>
  </div>
</div>