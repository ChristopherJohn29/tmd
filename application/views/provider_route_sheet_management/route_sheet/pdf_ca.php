<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<p style="margin:0; padding:0;"><span style="font-size:16px;"><?php echo $record->get_provider_fullname(); ?></span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Date of Service:</span> <?php echo $record->get_date_format($record->prs_dateOfService); ?></p>

<p style="font-size:8px; color: gray;">COGNITIVE ROUTE SHEET</p>

<table style="font-size: 10px;padding: 5px;">
	<thead>
		<tr>
			<th width="120px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Time</th>
			<th width="195px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Patient's Info</th>
			<th width="185px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Home Health Info</th>
			<th width="270px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Notes</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($lists as $list): ?>
			<tr>
				<td width="120px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $list->get_combined_time(); ?>
				</td>
				<td width="190px" style="border-bottom: 1px solid #d2d6de;">
					<?php echo $list->patient_name; ?><br>
					<strong>DOB:</strong> <?php echo $list->get_date_format($list->patient_dateOfBirth); ?><br>
					<strong>Medicare:</strong> <?php echo $list->patient_medicareNum; ?><br>
					<strong>Address:</strong> <?php echo $list->patient_address; ?><br>
					<strong>Phone:</strong> <?php echo $list->patient_phoneNum; ?><br><br>
					<strong>Caregiver/Family:</strong> <?php echo $list->patient_caregiver_family; ?><br>
					<strong>Spouse:</strong> <?php echo $spouse[$list->patient_spouse][0]['patient_name']; ?><br>
					<strong>Supervising MD:</strong> <?php echo $list->supervisingMD_firstname . ' ' . $list->supervisingMD_lastname; ?>
				</td>
	            <td width="190px" style="border-bottom: 1px solid #d2d6de;">
	            	<?php echo $list->hhc_name ?><br>
	            	<?php echo $list->hhc_contact_name; ?><br>
    				<?php echo $list->hhc_phoneNumber; ?>
	            </td>
				<td width="270px" style="border-bottom: 1px solid #d2d6de;">
					Reason for Visit : <?php echo $list->pt_reasonForVisit; ?><br>
					Type of Visit : <?php echo $list->tov_name; ?><br>
					Other Notes: <br>
					<?php echo nl2br($list->prsl_notes); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
