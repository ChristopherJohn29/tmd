<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<p style="margin:0; padding:0;"><span style="font-size:16px;"><?php echo $record->get_provider_fullname(); ?></span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Date of Service:</span> <?php echo $record->get_date_format($record->prs_dateOfService); ?></p>

<p style="font-size:8px; color: gray;">ROUTE SHEET</p>

<table style="font-size: 7px;padding: 5px;">
	<thead>
		<tr>
			<th width="80px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Time</th>
			<th width="120px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Patient's Info</th>
			<th width="120px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Home Health Info</th>
			<th width="200px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($lists as $list): ?>
			<tr>
				<td width="80px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $list->get_combined_time(); ?>		
				</td>
				<td width="120px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $list->patient_name; ?><br>
					<?php echo $list->patient_address; ?><br>
					<?php echo $list->patient_phoneNum; ?>
				</td>
	            <td width="120px" style="border-bottom: 1px solid #d2d6de;">
	            	<?php echo $list->hhc_name ?><br>
	            	<?php echo $list->hhc_contact_name; ?><br>
    				<?php echo $list->hhc_phoneNumber; ?>
	            </td>
				<td width="200px" style="border-bottom: 1px solid #d2d6de;">
					Type of Visit : <?php echo $list->tov_name; ?><br>
					Other Notes: <br>
					<?php echo nl2br($list->prsl_notes); ?>
				</td>
			</tr>			
		<?php endforeach; ?>
	</tbody>
</table>
