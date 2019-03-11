<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<?php if ($headcounts_total): ?>

<p style="margin:0; padding:0;"><span style="font-size:16px;">HEAD COUNT</span><br>
<span style="font-size:10px; color: gray; padding-top:6px">Date:</span> </p>

<p style="font-size:12px;">Total: <strong><?php echo $headcounts_total; ?></strong></p>  

<?php endif; ?>

<table id="headcount-list" class="table no-margin table-hover" style="font-size: 7px;padding: 5px;">
    <thead>
        <tr>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Provider Name</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Total Visits</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Total Salary</th>
            <th bgcolor="#548bb8" style="color: white;border:1px solid #548bb8; font-weight:bold;">Date Paid</th>            
        </tr>
    </thead>

    <tbody>

        <?php foreach($headcounts as $headcount): ?>

            <tr>
                <td style="border-bottom: 1px solid #d2d6de;"><?php echo $headcount['provider_name']; ?></td>
                <td style="border-bottom: 1px solid #d2d6de;"><?php echo $headcount['total_visits']; ?></td>
                <td style="border-bottom: 1px solid #d2d6de;">$<?php echo $headcount['total_salary']; ?></td>
                <td style="border-bottom: 1px solid #d2d6de;"><span class="text-red"><strong><?php echo $headcount['dateBilled']; ?></strong></span>
                </td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>