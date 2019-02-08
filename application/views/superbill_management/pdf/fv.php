<img src="<?php echo base_url() ?>/dist/img/pdf_header_landscape.png">

<br>
<br>

<table>
	<tr>
		<td style="font-size: 20px;"><strong>Facility Visits</strong></td>
	</tr>
	<tr>
		<td style="color: gray;">SUPERBILL</td>
	</tr>
</table>

<br>
<br>
<br>

<table>
	<tr>
		<td>Date Billed: <?php echo $date_billed; ?></td>
	</tr>
</table>

<br>
<br>
<br>
<br>

<table>
	<tr>
		<td style="color: gray;">TRANSACTIONS</td>
	</tr>
</table>

<br>
<br>

<table style="font-size: 5px;padding: 5px;">
	<thead>
		<tr>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Patient Name</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Medicare</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">DOB</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Address</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Phone</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">AW/IPPE</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">ACP</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Diabetes</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Tobacco</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">TCM</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Provider</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Date of Service</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Type of Visit</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Place of Service</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">ICD-Code Diagnoses</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($transactions as $transaction): ?>
			<tr>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->patient_name; ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->patient_medicareNum; ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_date_format($transaction->patient_dateOfBirth); ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->patient_address; ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->patient_phoneNum; ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->pt_aw_ippe_code; ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_selected_choice_format($transaction->pt_acp) == 'Yes' ? 1 : '0'; ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_selected_choice_format($transaction->pt_diabetes) == 'Yes' ? 1 : '0'; ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_selected_choice_format($transaction->pt_tobacco) == 'Yes' ? 1 : '0'; ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_selected_choice_format($transaction->pt_tcm) == 'Yes' ? 1 : '0'; ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_provider_fullname(); ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_date_format($transaction->pt_dateOfService); ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_tov_code($transaction->tov_id); ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $POS_entity->get_pos_name($transaction->patient_placeOfService); ?>
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->pt_icd10_codes; ?>
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
			<table style="font-size: 7px;padding: 2px;">
				<tbody>
					<tr>
						<th>99328</th>
						<td>INITIAL VISIT</td>
						<td><?php echo $summary['INITIAL_VISIT_FACILITY']; ?></td>
					</tr>
					
					<tr>
						<th>99337</th>
						<td>FOLLOW UP</td>
						<td><?php echo $summary['FOLLOW_UP_FACILITY']; ?></td>
					</tr>
					
					<tr>
						<th>G0402</th>
						<td>IPPE</td>
						<td><?php echo $summary['AW_CODES_G0402']; ?></td>
					</tr>
					
					<tr>
						<th>G0438</th>
						<td>AW – 8</td>
						<td><?php echo $summary['AW_CODE_G0438']; ?></td>
					</tr>
					
					<tr>
						<th>G0439</th>
						<td>AW – 9</td>
						<td><?php echo $summary['AW_CODE_G0439']; ?></td>
					</tr>
					
					<tr class="total">
						<th colspan="2"><strong>TOTAL</strong></th>
						<th><?php echo $summary['total']; ?></th>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
</table>