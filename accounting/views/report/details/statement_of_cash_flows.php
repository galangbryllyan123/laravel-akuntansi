<div id="accordion">
  <div class="card">
    <h3 class="text-center"><?php echo get_option('companyname'); ?></h3>
    <h4 class="text-center"><?php echo _l('statement_of_cash_flows'); ?></h4>
    <p class="text-center"><?php echo _d($data_report['from_date']) .' - '. _d($data_report['to_date']); ?></p>
    <table class="tree">
      <thead>
        <tr class="tr_header">
          <th></th>
          <th class="th_total"><?php echo _l('total'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $row_index = 1;
          $parent_index = 1;
          $total_cash_flows_from_operating_activities = 0;
          $total = 0;
          ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> parent-node expanded">
          <td class="parent"><?php echo _l('cash_flows_from_operating_activities'); ?></td>
          <td></td>
        </tr>
        <?php $row_index += 1; ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
          <td class="parent"><?php echo _l('profit_for_the_year'); ?></td>
          <td class="total_amount"><?php echo app_format_money($data_report['total']['income'], $currency->name); ?> </td>
        </tr>
        <?php
          $total_cash_flows_from_operating_activities += $data_report['total']['income'];
          ?>
        <?php $row_index += 1; ?>
        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded">
          <td class="parent"><?php echo _l('adjustments_for_non_cash_income_and_expenses'); ?></td>
          <td></td>
        </tr>
        <?php $parent_index = $row_index; ?>
        <?php $row_index += 1; ?>
          <?php 
            $_index = $row_index;
            foreach ($data_report['data']['accounts_receivable'] as $key => $value) { 
              $total += $value['amount'];
              $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
          <?php }
            $row_index += 1;
           ?>
           
            <?php foreach ($data_report['data']['current_assets'] as $key => $value) { 
              if($value['account_detail_type_id'] == 3 || $value['account_detail_type_id'] == 6 || $value['account_detail_type_id'] == 13){
                continue;
              }
              $total += $value['amount'];
            $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
          <?php } 
            $row_index += 1;
          ?>
          <?php foreach ($data_report['data']['fixed_assets'] as $key => $value) { 
            if($value['account_detail_type_id'] == 21 || $value['account_detail_type_id'] == 22){
                continue;
              }
              $total += $value['amount'];
            $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
                <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
                <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
            <?php } ?>
          <?php foreach ($data_report['data']['non_current_assets'] as $key => $value) { 
            if($value['account_detail_type_id'] != 31){
                continue;
              }
              $total += $value['amount'];
            $row_index += 1;
              ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td >
                <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
                <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
            <?php } 
            $row_index += 1;
            ?>
            <?php 
              foreach ($data_report['data']['accounts_payable'] as $key => $value) { 
              $total += $value['amount'];
                $row_index += 1;
              ?>
              <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                <td>
                <?php echo html_entity_decode($value['name']); ?> 
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
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td >
                <?php echo html_entity_decode($value['name']); ?> 
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
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td >
                <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
                <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
            <?php } $row_index += 1; ?>
            <?php foreach ($data_report['data']['non_current_liabilities'] as $key => $value) { 
              if($value['account_detail_type_id'] != 63 || $value['account_detail_type_id'] != 64){
                continue;
              }
              $total += $value['amount'];
              $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td >
                <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
                <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
            <?php } $row_index += 1; ?>

            <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
              <td class="parent"><?php echo _l('total_adjustments_for_non_cash_income_and_expenses'); ?></td>
              <td class="total_amount"><?php echo app_format_money($total, $currency->name); ?> </td>
            </tr>
            <?php $total_cash_flows_from_operating_activities += $total; ?>
            <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1 parent-node expanded tr_total">
              <td class="parent"><?php echo _l('net_cash_from_operating_activities'); ?></td>
              <td class="total_amount"><?php echo app_format_money($total_cash_flows_from_operating_activities, $currency->name); ?> </td>
            </tr>
            <?php 
              $row_index += 1; 
              $net_cash_used_in_investing_activities = 0;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> parent-node expanded">
              <td class="parent"><?php echo _l('cash_flows_from_investing_activities'); ?></td>
              <td></td>
            </tr>
            <?php $parent_index = $row_index; ?>
            <?php foreach ($data_report['data']['current_assets'] as $key => $value) { 
              if($value['account_detail_type_id'] != 3 && $value['account_detail_type_id'] != 6){
                continue;
              }
              $net_cash_used_in_investing_activities += $value['amount'];
            $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
          <?php } 
            $row_index += 1;
          ?>

          <?php foreach ($data_report['data']['fixed_assets'] as $key => $value) {
          if($value['account_detail_type_id'] != 21 && $value['account_detail_type_id'] != 22){
                continue;
              } 
              $net_cash_used_in_investing_activities += $value['amount'];
            $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
                <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
                <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
            <?php } ?>
            <?php foreach ($data_report['data']['non_current_assets'] as $key => $value) { 
            if($value['account_detail_type_id'] == 31){
                continue;
              }
              $net_cash_used_in_investing_activities += $value['amount'];
            $row_index += 1;
              ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td >
                <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
                <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
            <?php } 
            $row_index += 1;
            ?>
            <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
              <td class="parent"><?php echo _l('net_cash_used_in_investing_activities'); ?></td>
              <td class="total_amount"><?php echo app_format_money($net_cash_used_in_investing_activities, $currency->name); ?> </td>
            </tr>
            <?php $row_index += 1; ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> parent-node expanded">
              <td class="parent"><?php echo _l('cash_flows_from_financing_activities'); ?></td>
              <td></td>
            </tr>
            <?php $parent_index = $row_index; 
              $net_cash_used_in_financing_activities = 0;
            ?>
            <?php foreach ($data_report['data']['non_current_liabilities'] as $key => $value) { 
              if($value['account_detail_type_id'] == 63 || $value['account_detail_type_id'] == 64){
                continue;
              }
              $net_cash_used_in_financing_activities += $value['amount'];
              $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td >
                <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
                <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
            <?php } $row_index += 1; ?>
            <?php foreach ($data_report['data']['owner_equity'] as $key => $value) { 
              $net_cash_used_in_financing_activities += $value['amount'];
              $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td >
                <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
                <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
            <?php } $row_index += 1; ?>
            <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
              <td class="parent"><?php echo _l('net_cash_used_in_financing_activities'); ?></td>
              <td class="total_amount"><?php echo app_format_money($net_cash_used_in_financing_activities, $currency->name); ?> </td>
            </tr>
            <?php $row_index += 1; ?>
            <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> parent-node expanded tr_total">
              <td class="parent"><?php echo _l('net_increase_decrease_in_cash_and_cash_equivalents_uppercase'); ?></td>
              <td class="total_amount"><?php echo app_format_money($net_cash_used_in_financing_activities + $net_cash_used_in_investing_activities + $total_cash_flows_from_operating_activities, $currency->name); ?> </td>
            </tr>
            <?php $row_index += 1; ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> parent-node expanded">
              <td class="parent"><?php echo _l('cash_and_cash_equivalents_at_beginning_of_year'); ?></td>
              <td></td>
            </tr>
            <?php $parent_index = $row_index; 
            $total = 0;
            ?>
          <?php foreach ($data_report['data']['cash_and_cash_equivalents'] as $key => $value) {
              $total += $value['amount'];
            $row_index += 1;
           ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
          <?php } 
            $row_index += 1;
          ?>
          <?php foreach ($data_report['data']['current_assets'] as $key => $value) { 
              if($value['account_detail_type_id'] != 13){
                continue;
              }
              $total += $value['amount'];
            $row_index += 1;
            ?>
            <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
              <td>
              <?php echo html_entity_decode($value['name']); ?> 
              </td>
              <td class="total_amount">
              <?php echo app_format_money($value['amount'], $currency->name); ?> 
              </td>
            </tr>
          <?php } 
            $row_index += 1;
          ?>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> parent-node expanded tr_total">
              <td class="parent"><?php echo _l('total_cash_and_cash_equivalents_at_beginning_of_year'); ?></td>
              <td class="total_amount"><?php echo app_format_money($total, $currency->name); ?> </td>
            </tr>
          <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> parent-node expanded tr_total">
            <td class="parent"><?php echo _l('cash_and_cash_equivalents_at_end_of_year_uppercase'); ?></td>
            <td class="total_amount"><?php echo app_format_money($total + $net_cash_used_in_financing_activities + $net_cash_used_in_investing_activities + $total_cash_flows_from_operating_activities, $currency->name); ?> </td>
          </tr>

         
        </tbody>
    </table>
  </div>
</div>