<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<p style="margin:0; padding:0;">
	<span style="font-size:16px;"><?php echo $record->get_provider_fullname(); ?></span><br>
	<span style="font-size:8px; color: gray;">PROVIDER NAME</span>
</p>

<br>
<br>

<span style="font-size:10px; padding-top:6px">Date of Service:</span> <?php echo $record->get_date_format($record->prs_dateOfService); ?>

<br>

<p style="font-size:8px; color: gray;">ROUTE SHEET</p>

<br>
<br>

<table style="font-size: 7px;padding: 5px;">
	<thead>
		<tr>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Time</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Patient's Info</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Home Health Info</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($lists as $list): ?>
			<tr>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $list->get_combined_time(); ?>		
				</td>
				<td style="border-bottom: 1px solid #d2d6de;">
					<?php echo $list->patient_name; ?><br>
					<?php echo $list->patient_address; ?><br>
					<?php echo $list->patient_phoneNum; ?>
				</td>
	            <td style="border-bottom: 1px solid #d2d6de;">
	            	<?php echo $list->hhc_name ?><br>
	            	<?php echo $list->hhc_contact_name; ?><br>
    				<?php echo $list->hhc_phoneNumber; ?>
	            </td>
				<td style="border-bottom: 1px solid #d2d6de;">
					Type of Visit : <?php echo $list->tov_name; ?><br>
					Other Notes: <?php echo $list->prsl_notes; ?>
				</td>
			</tr>			
		<?php endforeach; ?>
	</tbody>
</table>
