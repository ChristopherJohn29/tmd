<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<p style="margin:0; padding:0;"><span style="font-size:16px;"><?php echo $provider_details->get_fullname(); ?></span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Report Period:</span> <?php echo $pay_period; ?></p>

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


