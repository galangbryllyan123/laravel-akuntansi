<div id="accordion">
  <div class="card">
    <h3 class="text-center"><?php echo get_option('companyname'); ?></h3>
    <h4 class="text-center"><?php echo _l('profit_and_loss_detail'); ?></h4>
    <p class="text-center"><?php echo _d($data_report['from_date']) .' - '. _d($data_report['to_date']); ?></p>
    <table class="tree">
      <thead>
        <tr class="tr_header">
          <th><?php echo _l('invoice_payments_table_date_heading'); ?></th>
          <th><?php echo _l('transaction_type'); ?></th>
          <th><?php echo _l('description'); ?></th>
          <th><?php echo _l('split'); ?></th>
          <th class="total_amount"><?php echo _l('amount'); ?></th>
          <th class="total_amount"><?php echo _l('balance'); ?></th>
        </tr>
      </thead>
      <tbody>
        <tr class="treegrid-1000 parent-node expanded">
          <td class="parent"><?php echo _l('acc_ordinary_income_expenses'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php
         $row_index = 1;
         $parent_index = 1; ?>

        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1000 parent-node expanded">
          <td class="parent"><?php echo _l('acc_income'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php
        $total_income = 0;
         foreach ($data_report['data']['income'] as $key => $value) {
          $row_index += 1;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php 
            $_index = $row_index;
          foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?>">
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
          <tr class="treegrid-total-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } 
        $total_income += $total_amount;
        ?>
        <?php } ?>
        <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', _l('acc_income')); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_income, $currency->name); ?> </td>
            <td></td>
          </tr>

        <?php
         $row_index += 1;
         $parent_index = $row_index; ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1000 parent-node expanded">
          <td class="parent"><?php echo _l('acc_cost_of_sales'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php 
          $total_cost_of_sales = 0;
        foreach ($data_report['data']['cost_of_sales'] as $key => $value) {
          $row_index += 1;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php 
          $_index = $row_index;
          foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?>">
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
           <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } 
        $total_cost_of_sales += $total_amount;
        ?>
        <?php } ?>
        <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', _l('acc_cost_of_sales')); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_cost_of_sales, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php $row_index += 1; ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1000 parent-node expanded tr_total">
          <td class="parent"><?php echo _l('gross_profit'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td class="total_amount"><?php echo app_format_money($total_income - $total_cost_of_sales, $currency->name); ?></td>
          <td></td>
        </tr>
        <?php
         $row_index += 1;
         $parent_index = $row_index; ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1000 parent-node expanded">
          <td class="parent"><?php echo _l('acc_other_income'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php 
        $total_other_income = 0;
        foreach ($data_report['data']['other_income'] as $key => $value) {
          $row_index += 1;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>
          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php 
          $_index = $row_index;
          foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?>">
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
           <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } 
        $total_other_income += $total_amount;
        ?>
        <?php } ?>
        <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', _l('acc_other_income')); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_other_income, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php
         $row_index += 1;
         $parent_index = $row_index; ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1000 parent-node expanded">
          <td class="parent"><?php echo _l('acc_expenses'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php 
        $total_expenses = 0;
        foreach ($data_report['data']['expenses'] as $key => $value) {
          $row_index += 1;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
              <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          <?php 
          $_index = $row_index;
          foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?>">
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
            <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } 
        $total_expenses += $total_amount;
        ?>
        <?php } ?>
        <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', _l('acc_expenses')); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_expenses, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php
         $row_index += 1;
         $parent_index = $row_index; ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1000 parent-node expanded">
          <td class="parent"><?php echo _l('acc_other_expenses'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php 
        $total_other_expenses = 0;
        foreach ($data_report['data']['other_expenses'] as $key => $value) {
          $row_index += 1;
          $total_amount = 0;
          ?>
          <?php if(count($value['details']) > 0){ ?>

          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
            <td class="parent"><?php echo html_entity_decode($value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <?php 
          $_index = $row_index;
          foreach ($value['details'] as $val) { 
              $row_index += 1;
              $total_amount += $val['amount'];
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?>">
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
            <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', $value['name']); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_amount, $currency->name); ?> </td>
            <td></td>
          </tr>
        <?php } 
        $total_other_expenses += $total_amount;
        ?>
        <?php } ?>
          <?php $row_index += 1; ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('total_for', _l('acc_other_expenses')); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="total_amount"><?php echo app_format_money($total_other_expenses, $currency->name); ?> </td>
            <td></td>
          </tr>
          <?php $row_index += 1; ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1000 parent-node expanded tr_total">
          <td class="parent"><?php echo _l('acc_net_income'); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td class="total_amount"><?php echo app_format_money($total_income - $total_cost_of_sales - $total_expenses - $total_other_expenses - $total_other_income, $currency->name); ?></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>