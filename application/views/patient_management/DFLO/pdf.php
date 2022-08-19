<img src="<?php echo base_url(); ?>/dist/img/pdf_header_portrait.png">

<h3 class="box-title">Due For Lab Orders</h3><br>

Date: <?php echo  $currentDate; ?><br>
Total: <?php echo  $total; ?><br>

<br>

<table class="table no-margin table-hover" style="font-size: 7px;padding: 5px;">
    <thead>
        <tr>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Patient Name</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Date Lab Orders were sent</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Orders by</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Status</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Added by</th>
        </tr>
    </thead>

    <tbody>
        
        <?php foreach($records as $record): ?>

            <tr>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['patientName']; ?>
                </td>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['date_referral']; ?>
                </td>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['provider']; ?>
                </td>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['status']; ?>
                </td>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['added_by']; ?>
                </td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>