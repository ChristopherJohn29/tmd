<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<p style="margin:0; padding:0;"><span style="font-size:16px;"><?php echo $provider_details->get_fullname(); ?></span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Pay Period:</span> <?php echo $pay_period; ?></p>

<p style="font-size:8px; color: gray;">VISITS</p>

<table style="font-size: 7px;padding: 5px;">
	<thead>
		<tr>
			<th width="80px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Date of Service</th>
			<th width="120px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Type of Visit</th>
			<th width="60px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">AW / IPPE</th>
			<th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">ACP</th>
			<th width="160px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Patient Name</th>
			<th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Mileage</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($provider_transactions as $provider_transaction): ?>
			<tr>
				<td width="80px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->get_date_format($provider_transaction->pt_dateOfService); ?>
				</td>
				<td width="120px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->tov_name; ?>
				</td>
				<td width="60px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->get_aw_ippe_format($provider_transaction->pt_aw_ippe_code); ?>
				</td>
				<td width="50px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->get_selected_choice_format($provider_transaction->pt_acp); ?>
				</td>
				<td width="160px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->patient_name; ?>
				</td>
				<td width="50px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->pt_mileage; ?>
				</td>
			</tr>			
		<?php endforeach; ?>
	</tbody>
</table>

<br>
<br><br>

<table>
	<tr>
		<td style="width: 50%;">
            
            <p style="font-size:8px; color: gray; margin-bottom:10px; margin-left:5px;">NOTES</p>
            
            <div style="font-size: 7px;">

				<?php if ( ! empty($notes)): ?>

					<?php echo nl2br($notes); ?>

				<?php else: ?>

	            There are no additional notes.

				<?php endif; ?>
                
            </div>
            
		</td>
        
		<td style="width: 50%;">
            
            <p style="font-size:8px; color: gray; margin-bottom:10px; margin-left:5px;">PAYMENT SUMMARY</p>
            
			<table style="font-size: 8px;padding: 5px;">
				<thead>
					<tr>
						<th width="110px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Description</th>
						<th width="45px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Quantity</th>
						<th width="45px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Amount</th>
						<th width="60px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Total Amount</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($provider_payment_summary['initial_visit_home']['total'] != 0): ?>

						<tr>
							<th style="border-bottom: 1px solid #d2d6de;">Initial Visit (Home)</th>
							<td style="border-bottom: 1px solid #d2d6de;"><?php echo $provider_payment_summary['initial_visit_home']['qty'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['initial_visit_home']['amount'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['initial_visit_home']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['initial_visit_facility']['total'] != 0 ): ?>

						<tr>
							<th style="border-bottom: 1px solid #d2d6de;">Initial Visit (Facility)</th>
							<td style="border-bottom: 1px solid #d2d6de;"><?php echo $provider_payment_summary['initial_visit_facility']['qty'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['initial_visit_facility']['amount'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['initial_visit_facility']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['initial_visit_telehealth']['total'] != 0 ): ?>

						<tr>
							<th style="border-bottom: 1px solid #d2d6de;">Initial Visit (Office)</th>
							<td style="border-bottom: 1px solid #d2d6de;"><?php echo $provider_payment_summary['initial_visit_telehealth']['qty'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['initial_visit_telehealth']['amount'] != '' ? $provider_payment_summary['initial_visit_telehealth']['amount'] : 0 ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['initial_visit_telehealth']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['follow_up_home']['total'] != 0 ): ?>

						<tr>
							<th style="border-bottom: 1px solid #d2d6de;">Follow-Up Visit (Home)</th>
							<td style="border-bottom: 1px solid #d2d6de;"><?php echo $provider_payment_summary['follow_up_home']['qty'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['follow_up_home']['amount'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['follow_up_home']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['follow_up_facility']['total'] != 0 ): ?>

						<tr>
							<th style="border-bottom: 1px solid #d2d6de;">Follow-Up Visit (Facility)</th>
							<td style="border-bottom: 1px solid #d2d6de;"><?php echo $provider_payment_summary['follow_up_facility']['qty'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['follow_up_facility']['amount'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['follow_up_facility']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['follow_up_telehealth']['total'] != 0 ): ?>

						<tr>
							<th style="border-bottom: 1px solid #d2d6de;">Follow-Up Visit (Office)</th>
							<td style="border-bottom: 1px solid #d2d6de;"><?php echo $provider_payment_summary['follow_up_telehealth']['qty'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['follow_up_telehealth']['amount'] != '' ? $provider_payment_summary['follow_up_telehealth']['amount'] : 0 ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['follow_up_telehealth']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['no_show']['total'] != 0 ): ?>

						<tr>
							<th style="border-bottom: 1px solid #d2d6de;">No Show</th>
							<td style="border-bottom: 1px solid #d2d6de;"><?php echo $provider_payment_summary['no_show']['qty'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['no_show']['amount'] ?></td>
							<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['no_show']['total'] ?></td>
						</tr>

					<?php endif; ?>
						
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">AW / IPPE</th>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $provider_payment_summary['aw_ippe']['qty'] ?></td>
						<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['aw_ippe']['amount'] ?></td>
						<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['aw_ippe']['total'] ?></td>
					</tr>
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">ACP</th>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $provider_payment_summary['acp']['qty'] ?></td>
						<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['acp']['amount'] ?></td>
						<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $provider_payment_summary['acp']['total'] ?></td>
					</tr>
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">Mileage</th>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $mileageQty ?? $provider_payment_summary['mileage']['qty'] ?></td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $mileageAmount ?? $provider_payment_summary['mileage']['amount'] ?>¢</td>
						<td style="border-bottom: 1px solid #d2d6de;">$<?php echo $mileageTotal ?? $provider_payment_summary['mileage']['total'] ?></td>
					</tr>
					<tr>
						<td colspan="3" style="border-bottom: 1px solid #d2d6de;"><strong><?php echo $others_field; ?></strong></td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $others; ?></td>
					</tr>
					<tr>
						<td colspan="3" style="border-bottom: 1px solid #d2d6de;"><span style="font-size:12px">Grand Total</span></td>
						<td style="border-bottom: 1px solid #d2d6de;"><span style="font-size:12px; font-weight:bold;">$<?php echo $total; ?></span></td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
</table>