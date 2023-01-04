<div id="accordion">
              <div class="card">
                <h3 class="text-center"><?php echo get_option('companyname'); ?></h3>
                <h4 class="text-center"><?php echo _l('balance_sheet_summary'); ?></h4>
                <p class="text-center"><?php echo _d($data_report['from_date']) .' - '. _d($data_report['to_date']); ?></p>
                <table class="tree">
                  <thead>
                    <tr class="tr_header">
                      <th></th>
                      <th class="th_total"><?php echo _l('total'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="treegrid-1000 parent-node expanded">
                      <td class="parent"><?php echo _l('acc_assets'); ?></td>
                      <td></td>
                    </tr>
                    <?php
                      $row_index = 0;
                      $parent_index = 0;
                      $row_index += 1;
                      $parent_index = $row_index;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded">
                        <td class="parent"><?php echo _l('acc_current_assets'); ?></td>
                        <td></td>
                      </tr>
                      <?php
                      $row_index += 1;
                      ?>
                      <?php 
                        $_index = $row_index;
                        foreach ($data_report['data']['accounts_receivable'] as $key => $value) { 
                          $row_index += 1;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                          <td>
                          <?php echo html_entity_decode($value['name']); ?> 
                          </td>
                          <td class="total_amount">
                          <?php echo html_entity_decode($value['amount']); ?> 
                          </td>
                        </tr>
                      <?php }
                        $row_index += 1;
                       ?>
                      <?php foreach ($data_report['data']['cash_and_cash_equivalents'] as $key => $value) {
                        $row_index += 1;
                       ?>
                        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                          <td>
                          <?php echo html_entity_decode($value['name']); ?> 
                          </td>
                          <td class="total_amount">
                          <?php echo html_entity_decode($value['amount']); ?> 
                          </td>
                        </tr>
                      <?php } 
                        $row_index += 1;
                      ?>
                      <?php foreach ($data_report['data']['current_assets'] as $key => $value) { 
                        $row_index += 1;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                          <td>
                          <?php echo html_entity_decode($value['name']); ?> 
                          </td>
                          <td class="total_amount">
                          <?php echo html_entity_decode($value['amount']); ?> 
                          </td>
                        </tr>
                      <?php } 
                        $row_index += 1;
                      ?>
                      <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1000 parent-node expanded tr_total">
                        <td class="parent"><?php echo _l('total_current_assets'); ?></td>
                        <td class="total_amount"><?php echo app_format_money($data_report['total']['current_assets'] + $data_report['total']['cash_and_cash_equivalents'] + $data_report['total']['accounts_receivable'], $currency->name); ?> </td>
                      </tr>
                      <?php 
                        $row_index += 1;
                        $parent_index = $row_index;
                      ?>
                      <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1000 parent-node expanded">
                        <td class="parent"><?php echo _l('long_term_assets'); ?></td>
                        <td></td>
                      </tr>
                      <?php foreach ($data_report['data']['fixed_assets'] as $key => $value) { 
                        $row_index += 1;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                          <td>
                            <?php echo html_entity_decode($value['name']); ?> 
                          </td>
                          <td class="total_amount">
                            <?php echo html_entity_decode($value['amount']); ?> 
                          </td>
                        </tr>
                        <?php } ?>
                        <?php foreach ($data_report['data']['non_current_assets'] as $key => $value) { 
                        $row_index += 1;
                          ?>
                        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                          <td >
                            <?php echo html_entity_decode($value['name']); ?> 
                          </td>
                          <td class="total_amount">
                            <?php echo html_entity_decode($value['amount']); ?> 
                          </td>
                        </tr>
                        <?php } 
                        $row_index += 1;
                        ?>
                      <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1000 parent-node expanded tr_total">
                        <td class="parent"><?php echo _l('total_long_term_assets'); ?></td>
                        <td class="total_amount"><?php echo app_format_money($data_report['total']['fixed_assets']+ $data_report['total']['non_current_assets'], $currency->name); ?> </td>
                      </tr>
                      <?php 
                        $row_index += 1;
                        ?>
                      <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> tr_total">
                        <td class="parent"><?php echo _l('total_assets'); ?></td>
                        <td class="total_amount"><?php echo app_format_money($data_report['total']['fixed_assets']+ $data_report['total']['non_current_assets'] + $data_report['total']['current_assets'] + $data_report['total']['cash_and_cash_equivalents'] + $data_report['total']['accounts_receivable'], $currency->name); ?> </td>
                      </tr>
                      <?php 
                        $row_index += 1;
                        ?>
                        <tr class="treegrid-1001 parent-node expanded">
                          <td class="parent"><?php echo _l('liabilities_and_shareholders_equity'); ?></td>
                          <td></td>
                        </tr>
                        <?php
                        $row_index += 1;
                        $parent_index = $row_index;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1001 parent-node expanded">
                          <td class="parent"><?php echo _l('acc_current_liabilities'); ?></td>
                          <td></td>
                        </tr>
                        <?php 
                          foreach ($data_report['data']['accounts_payable'] as $key => $value) { 
                            $row_index += 1;
                          ?>
                          <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                            <td>
                            <?php echo html_entity_decode($value['name']); ?> 
                            </td>
                            <td class="total_amount">
                            <?php echo html_entity_decode($value['amount']); ?> 
                            </td>
                          </tr>
                        <?php } $row_index += 1; ?>
                        <?php foreach ($data_report['data']['credit_card'] as $key => $value) { 
                          $row_index += 1;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                          <td >
                            <?php echo html_entity_decode($value['name']); ?> 
                          </td>
                          <td class="total_amount">
                            <?php echo html_entity_decode($value['amount']); ?> 
                          </td>
                        </tr>
                        <?php } $row_index += 1; ?>
                        <?php foreach ($data_report['data']['current_liabilities'] as $key => $value) { 
                          $row_index += 1;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                          <td >
                            <?php echo html_entity_decode($value['name']); ?> 
                          </td>
                          <td class="total_amount">
                            <?php echo html_entity_decode($value['amount']); ?> 
                          </td>
                        </tr>
                        <?php } $row_index += 1; ?>
                        <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1001 tr_total">
                          <td class="parent"><?php echo _l('total_current_liabilities'); ?></td>
                          <td class="total_amount"><?php echo app_format_money($data_report['total']['credit_card'] + $data_report['total']['current_liabilities'] + $data_report['total']['accounts_payable'], $currency->name); ?> </td>
                        </tr>
                        <?php $row_index += 1; ?>
                        <?php
                        $row_index += 1;
                        $parent_index = $row_index;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1001 parent-node expanded">
                          <td class="parent"><?php echo _l('acc_non_current_liabilities'); ?></td>
                          <td></td>
                        </tr>
                        <?php $row_index += 1; ?>
                        <?php foreach ($data_report['data']['non_current_liabilities'] as $key => $value) { 
                          $row_index += 1;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                          <td >
                            <?php echo html_entity_decode($value['name']); ?> 
                          </td>
                          <td class="total_amount">
                            <?php echo html_entity_decode($value['amount']); ?> 
                          </td>
                        </tr>
                        <?php } $row_index += 1; ?>
                        <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1001 tr_total">
                          <td class="parent"><?php echo _l('total_non_current_liabilities'); ?></td>
                          <td class="total_amount"><?php echo app_format_money($data_report['total']['non_current_liabilities'], $currency->name); ?> </td>
                        </tr>
                        <?php $row_index += 1; ?>
                        <?php
                        $row_index += 1;
                        $parent_index = $row_index;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($parent_index); ?> treegrid-parent-1001 parent-node expanded">
                          <td class="parent"><?php echo _l('shareholders_equity'); ?></td>
                          <td></td>
                        </tr>
                        <?php $row_index += 1; ?>
                        <?php foreach ($data_report['data']['owner_equity'] as $key => $value) { 
                          $row_index += 1;
                        ?>
                        <tr class="treegrid-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?>">
                          <td >
                            <?php echo html_entity_decode($value['name']); ?> 
                          </td>
                          <td class="total_amount">
                            <?php echo html_entity_decode($value['amount']); ?> 
                          </td>
                        </tr>
                        <?php } $row_index += 1; ?>
                        <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-<?php echo html_entity_decode($parent_index); ?> tr_total">
                          <td class="parent"><?php echo _l('acc_net_income'); ?></td>
                          <td class="total_amount"><?php echo app_format_money($data_report['net_income'], $currency->name); ?> </td>
                        </tr>
                        <?php $row_index += 1; ?>
                        <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> treegrid-parent-1001 tr_total">
                          <td class="parent"><?php echo _l('total_shareholders_equity'); ?></td>
                          <td class="total_amount"><?php echo app_format_money($data_report['total']['owner_equity'] + $data_report['net_income'], $currency->name); ?> </td>
                        </tr>
                        <?php $row_index += 1; ?>
                        <tr class="treegrid-total-<?php echo html_entity_decode($row_index); ?> tr_total">
                          <td class="parent"><?php echo _l('total_liabilities_and_equity'); ?></td>
                          <td class="total_amount"><?php echo app_format_money($data_report['total']['owner_equity']+ $data_report['net_income']+ $data_report['total']['non_current_liabilities'] + $data_report['total']['credit_card'] + $data_report['total']['accounts_payable'] + $data_report['total']['current_liabilities'], $currency->name); ?> </td>
                        </tr>
                        <?php $row_index += 1; ?>
                    </tbody>
                </table>
              </div>
          </div>