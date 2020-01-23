<img src="<?php echo base_url() ?>/dist/img/pdf_header_landscape.png">

<p style="margin:0; padding:0;"><span style="font-size:16px;">CP0-485</span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Date Billed:</span> <?php echo $date_billed; ?></p>

<p style="font-size:8px; color: gray;">TRANSACTIONS</p>

<table style="font-size: 7px;padding: 5px;">
	<thead>
		<tr>
			<th width="90px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Patient Name</th>
			<th width="90px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Medicare</th>
			<th width="90px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">ICD-Code Diagnoses</th>
            <th width="70px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Supervising MD</th>
			<th width="70px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8"></th>
			<th width="90px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Cert Period</th>
			<th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">485 Date Signed</th>
			<th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">1st Month CPO</th>
			<th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">2nd Month CPO</th>
			<th width="50px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">3rd Month CPO</th>
			<th width="70px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Discharge Date</th>
		</tr>
	</thead>
	<tbody>
		
		<?php foreach ($transactions as $i => $transaction): ?>
			<?php $borderStyle = 'border-top: 1px solid #d2d6de;'; ?>

			<tr>
				<?php if ($i > 0 && $transactions[$i - 1]['patient_name'] == $transaction['patient_name']) : ?>
					<?php $borderStyle = ''; ?>

					<td width="100px" style="<?php echo $borderStyle; ?>"></td>
					<td width="90px" style="<?php echo $borderStyle; ?>"></td>
					<td width="90px" style="<?php echo $borderStyle; ?>"></td>
				<?php else: ?>
					<td width="90px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['patient_name']; ?></td>
					<td width="90px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['medicare']; ?></td>
					<td width="90px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['icd10']; ?></td>
				<?php endif; ?>

                <td width="70px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['supervisingMD_fullname']; ?></td>
				<td width="70px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['status']; ?></td>
				<td width="90px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['cert_Period']; ?></td>
				<td width="50px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['date_Signed']; ?></td>
				<td width="50px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['first_Month_CPO']; ?></td>
				<td width="50px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['second_Month_CPO']; ?></td>
				<td width="50px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['third_Month_CPO']; ?></td>
				<td width="70px" style="<?php echo $borderStyle; ?>"><?php echo $transaction['discharge_Date']; ?></td>
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
						<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Total</th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">G0180</th>
						<td style="border-bottom: 1px solid #d2d6de;">Certification</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo  $summary['certification'] ; ?></td>
					</tr>
					
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">G0181</th>
						<td style="border-bottom: 1px solid #d2d6de;">1st Month CPO</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo  $summary['first_Month_CPO'] ; ?></td>
					</tr>
					
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">G0181</th>
						<td style="border-bottom: 1px solid #d2d6de;">2nd Month CPO</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo  $summary['second_Month_CPO'] ; ?></td>
					</tr>
					
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">G0181</th>
						<td style="border-bottom: 1px solid #d2d6de;">3rd Month CPO</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo  $summary['third_Month_CPO'] ; ?></td>
					</tr>

					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">G0179</th>
						<td style="border-bottom: 1px solid #d2d6de;">Recertification</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo  $summary['recertification'] ; ?></td>
					</tr>

					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">G0181</th>
						<td style="border-bottom: 1px solid #d2d6de;">1st Month CPO</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo  $summary['Refirst_Month_CPO'] ; ?></td>
					</tr>
					
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">G0181</th>
						<td style="border-bottom: 1px solid #d2d6de;">2nd Month CPO</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo  $summary['Resecond_Month_CPO'] ; ?></td>
					</tr>
					
					<tr>
						<th style="border-bottom: 1px solid #d2d6de;">G0181</th>
						<td style="border-bottom: 1px solid #d2d6de;">3rd Month CPO</td>
						<td style="border-bottom: 1px solid #d2d6de;"><?php echo  $summary['Rethird_Month_CPO'] ; ?></td>
					</tr>

					<tr class="total">
						<th colspan="2" style="border-bottom: 1px solid #d2d6de;"><span style="font-size:12px">Total</span></th>
                        <th style="border-bottom: 1px solid #d2d6de;"><span style="font-size:12px; font-weight:bold;"><?php echo  $summary['total'] ; ?></span></th>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
</table>