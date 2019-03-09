<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<?php if ($headcounts_total): ?>

<p style="margin:0; padding:0;"><span style="font-size:16px;">HEAD COUNT</span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Date:</span> <?php echo $dateFormat; ?></p>

<p style="font-size:12px;">Total: <strong><?php echo $headcounts_total; ?></strong></p>  

<?php endif; ?>

<table id="headcount-list" class="table no-margin table-hover" style="font-size: 7px;padding: 5px;">
    <thead>
        <tr>
            <th width="160px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Patient Name</th>
            <th width="160px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Provider</th>
            <th width="80px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Date of Service</th>
            <th width="80px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Deductible</th>
            <th width="220px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Home Health</th>
            <th width="70px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Visit Billed</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach($headcounts as $headcount): ?>

            <tr>
                <td width="160px" style="border-bottom: 1px solid #d2d6de;"><?php echo $headcount['patient_name']; ?></td>
                <td width="160px" style="border-bottom: 1px solid #d2d6de;"><?php echo $headcount['provider']; ?></td>
                <td width="80px" style="border-bottom: 1px solid #d2d6de;"><?php echo $headcount['dateOfService']; ?></td>
                <td width="80px" style="border-bottom: 1px solid #d2d6de;">
                    <?php if ($headcount['deductible'] == '$185'): ?>
                        <span class="text-red"><strong><?php echo $headcount['deductible']; ?></strong></span>
                    <?php else: ?>
                        <?php echo $headcount['deductible']; ?>
                    <?php endif; ?>
                </td>
                <td width="220px" style="border-bottom: 1px solid #d2d6de;"><?php echo $headcount['home_health']; ?></td>
                <td width="70px" style="border-bottom: 1px solid #d2d6de;"><?php echo $headcount['visit_billed']; ?></td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>