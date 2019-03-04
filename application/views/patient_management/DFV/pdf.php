<img src="<?php echo base_url(); ?>/dist/img/pdf_header_portrait.png">

<?php if ($totalRecords): ?>

<p style="font-size:12px;">Total: <strong><?php echo $totalRecords; ?></strong></p>  

<?php endif; ?>

<table class="table no-margin table-hover" style="font-size: 7px;padding: 5px;">
    <thead>
        <tr>
            <tr>
                <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Patient Name</th>
                <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Referral Date</th>
                <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Date of Service</th>
                <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Provider</th>
            </tr>
        </tr>
    </thead>

    <tbody>
        
        <?php foreach($records as $record): ?>

            <tr>
                <td style="border-bottom: 1px solid #d2d6de;">
                    <?php echo $record->patient_name; ?>
                </td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>