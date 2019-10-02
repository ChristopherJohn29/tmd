<img src="<?php echo base_url() ?>/dist/img/pdf_header_landscape.png">

<p style="margin:0; padding:0;"><span style="font-size:16px;">Home Visits</span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Date Billed:</span> <?php echo $date_billed; ?></p>

<p style="font-size:8px; color: gray;">VISITS</p>

<table style="font-size: 7px;padding: 5px;">
	<thead>
		<tr>
			<th width="70px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Patient Name</th>
			<th width="60px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Medicare</th>
			<th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">DOB</th>
			<th width="80px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Address</th>
			<th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Phone</th>
			<th width="25px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">ACP</th>
			<th width="25px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">DM</th>
			<th width="35px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Tobacco</th>
			<th width="30px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">TCM</th>
			<th width="60px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Provider</th>
            <th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Supervising MD</th>
			<th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Date of Service</th>
			<th width="40px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Type of Visit</th>
			<th width="40px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Place of Service</th>
			<th width="105px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">ICD-Code Diagnoses</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($transactions as $transaction): ?>
			<tr>
				<td width="70px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->patient_name; ?>
				</td>
				<td width="60px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->patient_medicareNum; ?>
				</td>
				<td width="50px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_date_format($transaction->patient_dateOfBirth); ?>
				</td>
				<td width="80px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->patient_address; ?>
				</td>
				<td width="50px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->patient_phoneNum; ?>
				</td>
				<td width="25px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_selected_choice_format($transaction->pt_acp) == 'Yes' ? 1 : '0'; ?>
				</td>
				<td width="25px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_selected_choice_format($transaction->pt_diabetes) == 'Yes' ? 1 : '0'; ?>
				</td>
				<td width="35px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_selected_choice_format($transaction->pt_tobacco) == 'Yes' ? 1 : '0'; ?>
				</td>
				<td width="30px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_selected_choice_format($transaction->pt_tcm) == 'Yes' ? 1 : '0'; ?>
				</td>
				<td width="60px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_provider_fullname(); ?>
				</td>
                <td width="50px" style="border-bottom: 1px solid #d2d6de;">
					
				</td>
				<td width="50px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_date_format($transaction->pt_dateOfService); ?>
				</td>
				<td width="40px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->get_tov_code($transaction->tov_id); ?>
				</td>
				<td width="40px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $POS_entity->get_pos_name($transaction->patient_placeOfService); ?>
				</td>
				<td width="105px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $transaction->pt_icd10_codes; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<table>
	<tr>
		<td style="width: 50%;">
            
            <p style="font-size:8px; color: gray; margin-bottom:10px; margin-left:5px;">NOTES</p>
            
            <span style="font-size: 7px;">
                
			<?php if ( ! empty($notes)): ?>

				<?php echo $notes; ?>

			<?php else: ?>

				There are no additional notes.

			<?php endif; ?>
                
            </span>
            
		</td>
		<td style="width: 50%;">
            
            <p style="font-size:8px; color: gray; margin-bottom:10px; margin-left:5px;">SUMMARY</p>
            
			<table style="font-size: 8px;padding: 5px;">
                <thead>
					<tr>
						<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Code</th>
						<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Name</th>
						<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">No. of Visits</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">99345</th>
						<td style="border-bottom: 1px solid #d2d6de;">INITIAL VISIT</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $summary['INITIAL_VISIT_HOME']; ?></td>
					</tr>
					
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">99350</th>
						<td style="border-bottom: 1px solid #d2d6de;">FOLLOW UP</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $summary['FOLLOW_UP_HOME']; ?></td>
					</tr>
					
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">99497</th>
						<td style="border-bottom: 1px solid #d2d6de;">ACP</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $summary['ACP']; ?></td>
					</tr>
					
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">G0108</th>
						<td style="border-bottom: 1px solid #d2d6de;">DM</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $summary['DM']; ?></td>
					</tr>
					
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">99407</th>
						<td style="border-bottom: 1px solid #d2d6de;">TOBACCO</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo $summary['TOBACCO']; ?></td>
					</tr>
					
					<tr class="total">
						<th colspan="2" style="border-bottom: 1px solid #d2d6de;"><span style="font-size:12px">Total</span></th>
                        <th style="border-bottom: 1px solid #d2d6de;"><span style="font-size:12px; font-weight:bold;"><?php echo $summary['total']; ?></span></th>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
</table>