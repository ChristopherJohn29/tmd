<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<?php if ($headcounts_total): ?>

   <p style="font-size: 1.5em;"><strong>Total: </strong> <?php echo $headcounts_total; ?></p>  

<?php endif; ?>

<table id="headcount-list" class="table no-margin table-hover">
    <thead>
        <tr>
            <th>Patient Name</th>
            <th>Provider</th>
            <th>Date of Service</th>
            <th>Deductible</th>
            <th>Home Health</th>
            <th>Visit Billed</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach($headcounts as $headcount): ?>

            <tr>
                <td><?php echo $headcount['patient_name']; ?></td>
                <td><?php echo $headcount['provider']; ?></td>
                <td><?php echo $headcount['dateOfService']; ?></td>
                <td>
                    <?php if ($headcount['deductible'] == '$185'): ?>
                        <span class="text-red"><strong><?php echo $headcount['deductible']; ?></strong></span>
                    <?php else: ?>
                        <?php echo $headcount['deductible']; ?>
                    <?php endif; ?>
                </td>
                <td><?php echo $headcount['home_health']; ?></td>
                <td><?php echo $headcount['visit_billed']; ?></td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>