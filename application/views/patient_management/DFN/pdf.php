<img src="<?php echo base_url(); ?>/dist/img/pdf_header_portrait.png">

<h3 class="box-title">Due For 485</h3><br>

Date: <?php echo  $currentDate; ?><br>
Total: <?php echo  $total; ?><br>

<br>

<table class="table no-margin table-hover" style="font-size: 7px;padding: 5px;">
    <thead>
        <tr>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Patient Name</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Date Referral was Emailed</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Home Health</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Contact Person</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Phone</th>
        </tr>
    </thead>

    <tbody>
        
        <?php foreach($records as $record): ?>

            <tr>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['patientName']; ?>
                </td>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['dfe']; ?>
                </td>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['homeHealth']; ?>
                </td>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['contactPerson']; ?>
                </td>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record['phone']; ?>
                </td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>