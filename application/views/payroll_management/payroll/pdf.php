<img src="<?php echo base_url() ?>/dist/img/pdf_header.png">

<br>
<br>

<table>
	<tr>
		<td style="font-size: 20px;"><strong><?php echo $provider_details->get_fullname(); ?></strong></td>
	</tr>
	<tr>
		<td style="color: gray;">PROVIDER NAME</td>
	</tr>
</table>

<br>
<br>
<br>

<table>
	<tr>
		<td>Pay Period: <?php echo $pay_period; ?></td>
	</tr>
</table>

<br>
<br>

<table>
	<tr>
		<td style="color: gray;">CONTACT INFORMATION</td>
	</tr>
</table>

<br>
<br>

<table>
	<tr>
		<td style="width: 15%;">Address:</td>
		<td><?php echo $provider_details->provider_address; ?></td>
	</tr>
	<tr>
		<td style="width: 15%;">Phone:</td>
		<td><?php echo $provider_details->provider_contactNum; ?></td>
	</tr>
	<tr>
		<td style="width: 15%;">Email:</td>
		<td><?php echo $provider_details->provider_email; ?></td>
	</tr>
</table>

<br>
<br>
<br>
<br>

<table>
	<tr>
		<td style="color: gray;">VISITS</td>
	</tr>
</table>

<br>
<br>

<table style="font-size: 9px;padding: 10px;">
	<thead>
		<tr>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Date of Service</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Type of Visit</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">AW / IPPE</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">ACP</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Patient Name</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Mileage</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($provider_transactions as $provider_transaction): ?>
			<tr>
				<td  style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->get_date_format($provider_transaction->pt_dateOfService); ?>
				</td>
				<td  style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->tov_name; ?>
				</td>
				<td  style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->get_aw_ippe_format($provider_transaction->pt_aw_ippe_code); ?>
				</td>
				<td  style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->get_selected_choice_format($provider_transaction->pt_acp); ?>
				</td>
				<td  style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->patient_name; ?>
				</td>
				<td  style="border-bottom: 1px solid #d2d6de;">
					<?php echo $provider_transaction->pt_mileage; ?>
				</td>
			</tr>			
		<?php endforeach; ?>
	</tbody>
</table>

<br>
<br>
<br>

<table>
	<tr>
		<td style="color: gray;width: 50%;">NOTES</td>
		<td style="color: gray;width: 50%;">PAYMENT SUMMARY</td>
	</tr>
</table>

<br>
<br>

<table>
	<tr>
		<td style="width: 50%;">
			<?php if ( ! empty($notes)): ?>

				<?php echo $notes; ?>

			<?php else: ?>

				There are no additional notes.

			<?php endif; ?>
		</td>
		<td style="width: 50%;">
			<table style="font-size: 7px;padding: 5px;">
				<thead>
					<tr>
						<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Description</th>
						<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Quantity</th>
						<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Amount</th>
						<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Total Amount</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($provider_payment_summary['initial_visit_home']['total'] != 0): ?>

						<tr>
							<th>Initial Visit (Home)</th>
							<td><?php echo $provider_payment_summary['initial_visit_home']['qty'] ?></td>
							<td>$<?php echo $provider_payment_summary['initial_visit_home']['amount'] ?></td>
							<td>$<?php echo $provider_payment_summary['initial_visit_home']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['initial_visit_facility']['total'] != 0 ): ?>

						<tr>
							<th>Initial Visit (Facility)</th>
							<td><?php echo $provider_payment_summary['initial_visit_facility']['qty'] ?></td>
							<td>$<?php echo $provider_payment_summary['initial_visit_facility']['amount'] ?></td>
							<td>$<?php echo $provider_payment_summary['initial_visit_facility']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['initial_visit_office']['total'] != 0 ): ?>

						<tr>
							<th>Initial Visit (Office)</th>
							<td><?php echo $provider_payment_summary['initial_visit_office']['qty'] ?></td>
							<td>$<?php echo $provider_payment_summary['initial_visit_office']['amount'] != '' ? $provider_payment_summary['initial_visit_office']['amount'] : 0 ?></td>
							<td>$<?php echo $provider_payment_summary['initial_visit_office']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['follow_up_home']['total'] != 0 ): ?>

						<tr>
							<th>Follow-Up Visit (Home)</th>
							<td><?php echo $provider_payment_summary['follow_up_home']['qty'] ?></td>
							<td>$<?php echo $provider_payment_summary['follow_up_home']['amount'] ?></td>
							<td>$<?php echo $provider_payment_summary['follow_up_home']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['follow_up_facility']['total'] != 0 ): ?>

						<tr>
							<th>Follow-Up Visit (Facility)</th>
							<td><?php echo $provider_payment_summary['follow_up_facility']['qty'] ?></td>
							<td>$<?php echo $provider_payment_summary['follow_up_facility']['amount'] ?></td>
							<td>$<?php echo $provider_payment_summary['follow_up_facility']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['follow_up_office']['total'] != 0 ): ?>

						<tr>
							<th>Follow-Up Visit (Office)</th>
							<td><?php echo $provider_payment_summary['follow_up_office']['qty'] ?></td>
							<td>$<?php echo $provider_payment_summary['follow_up_office']['amount'] != '' ? $provider_payment_summary['follow_up_office']['amount'] : 0 ?></td>
							<td>$<?php echo $provider_payment_summary['follow_up_office']['total'] ?></td>
						</tr>

					<?php endif; ?>

					<?php if ($provider_payment_summary['no_show']['total'] != 0 ): ?>

						<tr>
							<th>No Show</th>
							<td><?php echo $provider_payment_summary['no_show']['qty'] ?></td>
							<td>$<?php echo $provider_payment_summary['no_show']['amount'] ?></td>
							<td>$<?php echo $provider_payment_summary['no_show']['total'] ?></td>
						</tr>

					<?php endif; ?>
						
					<tr>
						<th>AW / IPPE</th>
						<td><?php echo $provider_payment_summary['aw_ippe']['qty'] ?></td>
						<td>$<?php echo $provider_payment_summary['aw_ippe']['amount'] ?></td>
						<td>$<?php echo $provider_payment_summary['aw_ippe']['total'] ?></td>
					</tr>
					<tr>
						<th>ACP</th>
						<td><?php echo $provider_payment_summary['acp']['qty'] ?></td>
						<td>$<?php echo $provider_payment_summary['acp']['amount'] ?></td>
						<td>$<?php echo $provider_payment_summary['acp']['total'] ?></td>
					</tr>
					<tr>
						<th>Mileage</th>
						<td><?php echo $provider_payment_summary['mileage']['qty'] ?></td>
						<td><?php echo $provider_payment_summary['mileage']['amount'] ?>¢</td>
						<td>$<?php echo $provider_payment_summary['mileage']['total'] ?></td>
					</tr>
					<tr>
						<td colspan="3"><strong><?php echo $others_field; ?></strong></td>
						<td><?php echo $others; ?></td>
					</tr>
					<tr>
						<td colspan="3"><strong>Total</strong></td>
						<td>$<?php echo $total; ?></td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
</table>