<img src="<?php echo base_url() ?>/dist/img/pdf_header_landscape.png">

<p style="margin:0; padding:0;"><span style="font-size:16px;">Home Visit Request</span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Date Request:</span> <?php echo $date_sent; ?></p>

<p style="font-size:8px; color: gray;">VISITS</p>

<table style="font-size: 7px;padding: 5px;">

	<thead>
		<tr>
			<th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Home Health</th>
			<th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8;">Patient Name</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Medicare</th>
			<th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Date of Birth</th>
            <th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Type of Visit</th>
			<th  bgcolor="#548bb8" style="color: white;border:1px solid #548bb8">Date Sent</th>
			
		</tr>
	</thead>
	<tbody>
		<?php foreach($records as $record): 

			$phone_no = $record['pi_phone'];

			// 👇 format phone number
			$format_phone =
				'('.substr($phone_no, -10, -7) . ") " .
				substr($phone_no, -7, -4) . "-" .
				substr($phone_no, -4);
			?>
			<tr>
				<td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['pf_name_of_facility']; ?></td>
				<td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['pi_patient_name']; ?></td>
				<td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['ii_medicare']; ?></td>
                <td  style="border-bottom: 1px solid #d2d6de;"><?php echo  date('m/d/Y', strtotime($record['pi_dob'])); ?></td>
                <td  style="border-bottom: 1px solid #d2d6de;"><?php echo  $record['tov']; ?></td>
                <td  style="border-bottom: 1px solid #d2d6de;"><?php echo  date('m/d/Y', strtotime($record['date_of_sent'])); ?></td>
			</tr>			
		<?php endforeach; ?>
	</tbody>
</table>
