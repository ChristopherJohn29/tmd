<img src="<?php echo base_url() ?>/dist/img/pdf_header_landscape.png">

<p style="margin:0; padding:0;"><span style="font-size:16px;">Home Visit Request</span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Date Request:</span> <?php echo $date_sent; ?></p>

<p style="font-size:8px; color: gray;">VISITS</p>

<table style="font-size: 7px;padding: 5px;">

	<thead>
		<tr>
			<th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Patient Name</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Medicare</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">DOB</th>
			<th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Address</th>
			<th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Phone</th>
			<th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Provider</th>
            <th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Supervising MD</th>
			<th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Date of Request</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($records as $record): ?>
			<tr>
				<td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['pi_patient_name']; ?></td>
				<td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['ii_medicare']; ?></td>
                <td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['pi_dob']; ?></td>
                <td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['pi_address']; ?></td>
                <td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['pi_phone']; ?></td>
                <td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['pf_name_of_facility']; ?></td>
                <td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $mds[$record['preferred_smd']]; ?></td>
                <td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['date_of_sent']; ?></td>
			</tr>			
		<?php endforeach; ?>
	</tbody>
</table>
