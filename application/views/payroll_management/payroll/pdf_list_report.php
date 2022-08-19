<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<?php if ($headcounts_total): ?>

<p style="margin:0; padding:0;"><span style="font-size:16px;">REPORT GENERATION PER PROVIDER</span><br>
<span style="font-size:10px; color: gray; padding-top:6px"><?php echo $results[0]['tov_name']; ?></span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Date:</span> <?php echo $datePeriod; ?></p>
<p style="font-size:12px;">Total: <strong><?php echo $headcounts_total; ?></strong></p>  

<?php endif; ?>

<table id="headcount-list" class="table no-margin table-hover" style="font-size: 7px;padding: 5px;">
    <thead>
        <tr>
            <th width="170px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Provider Name</th>
            <th width="160px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Total <?php echo $results[0]['tov_name']; ?></th>
            <th width="100px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Total</th>
            <th width="90px" bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Date Paid</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach($results as $result): ?>

            <tr>
                <td width="170px" style="border-bottom: 1px solid #d2d6de;"><?php echo $result['provider_name']; ?></td>
                <td width="160px" style="border-bottom: 1px solid #d2d6de;"><?php echo $result['total_visits']; ?></td>
                <td width="100px" style="border-bottom: 1px solid #d2d6de;">$<?php echo number_format($result['total_salary']); ?></td>
                <td width="90px" style="border-bottom: 1px solid #d2d6de;"><?php echo $result['dateBilled']; ?></td>
               </tr>

        <?php endforeach; ?>

    </tbody>
</table>

