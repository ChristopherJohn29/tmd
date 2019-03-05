<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<p style="margin:0; padding:0;"><span style="font-size:16px;"><?php echo  $record->patient_name; ?></span></p>

<table style="font-size: 8px;padding: 5px;">
    <tbody>
        <tr>
            <td style="color: white;background-color: #548bb8;">Basic Information</td>
            <td style="color: white;background-color: #548bb8;">Contact Information</td>
            <td style="color: white;background-color: #548bb8;">Home Health Information</td>
        </tr>
        <tr>
            <td>
                <table style="font-size: 8px; padding:0;">
                    <tr>
                        <th>Medicare:</th>
                        <td><?php echo  $record->patient_medicareNum; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?php echo  $record->get_date_format($record->patient_dateOfBirth); ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?php echo  $record->patient_gender; ?></td>
                    </tr>
                    <tr>
                        <th>Place of Service:</th>
                        <td><?php echo  $record->get_fullpos_name(); ?></td>
                    </tr>
                    <tr>
                        <th>Supervising MD:</th>
                        <td><?php echo  $record->patient_supervising_MD; ?></td>
                    </tr>
                </table>
            </td>
            <td>
                <table style="font-size: 8px; padding:0;">
                    <tr>
                        <th>Address:</th>
                        <td><?php echo  $record->patient_address; ?></td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td><?php echo  $record->patient_phoneNum; ?></td>
                    </tr>
                    <tr>
                        <th>Caregiver/Family:</th>
                        <td><?php echo  $record->patient_caregiver_family; ?></td>
                    </tr>
                </table>
            </td>
            <td>
                <table style="font-size: 8px; padding:0;">
                    <tr>
                        <th>Home Health:</th>
                        <td><?php echo  $record->hhc_name; ?></td>
                    </tr>
                    <tr>
                        <th>Contact Person:</th>
                        <td><?php echo  $record->hhc_contact_name; ?></td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td><?php echo  $record->hhc_phoneNumber; ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo  $record->hhc_email; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>

<p style="font-size:8px; color: gray;">VISITS</p>

<?php foreach ($transactions as $transaction): ?>

    <?php if ($transaction_entity->not_in_tab_list($transaction->tov_id)): ?>

        <p style="font-size:8px;">Type of visit : <span style="color: gray;"><?php echo  $transaction->tov_name; ?></span></p>

    <?php endif; ?>
    
    <?php if ($transaction_entity->is_tov_sel_noshow_cancelled($transaction->pt_tovID)): ?>


         <table style="font-size: 8px;padding: 5px;" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th style="color: white;background-color: #548bb8;">Provider</th>
                    <th style="color: white;background-color: #548bb8;">Date of Service</th>
                    <th style="color: white;background-color: #548bb8;">Note</th>
                </tr>

            </thead>

            <tbody>
                <tr>
                    <td><?php echo  $transaction->get_provider_fullname() ;?></td>
                    <td><?php echo  $transaction->get_date_format($transaction->pt_dateOfService) ;?></td>
                    <td><?php echo  $transaction->pt_notes ;?></td>
                </tr>
            </tbody>
        </table>

    <?php else: ?>

        <table style="font-size: 8px;padding: 5px;" class="table no-margin table-hover">
            <thead>
                <tr>
                    <th style="color: white;background-color: #548bb8;" width="140px">Provider</th>
                    <th style="color: white;background-color: #548bb8;">Date of Service</th>
                    <th style="color: white;background-color: #548bb8;">Deductible</th>
                    <th style="color: white;background-color: #548bb8;">AW/IPPE</th>
                    <th style="color: white;background-color: #548bb8;">Performed</th>
                    <th style="color: white;background-color: #548bb8;">AW/IPPE Date</th>
                    <th style="color: white;background-color: #548bb8;" width="80px">AW Billed</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td width="140px"><?php echo  $transaction->get_provider_fullname() ;?></td>
                    <td><?php echo  $transaction->get_date_format($transaction->pt_dateOfService) ;?></td>
                    <td><?php echo  $transaction->pt_deductible ;?></td>
                    <td><?php echo  $transaction->pt_aw_ippe_code ;?></td>
                    <td><?php echo  $transaction->get_selected_choice_format($transaction->pt_performed) ;?></td>
                    <td><?php echo  $transaction->get_date_format($transaction->pt_aw_ippe_date) ;?></td>
                    <td width="80px"><span class="text-red"><strong><?php echo  $transaction->get_date_format($transaction->pt_aw_billed) ;?></strong></span></td>
                </tr>
            </tbody>
        </table>

        <table style="font-size: 8px;padding: 5px;" >
            <thead>
                <tr>
                    <th style="color: white;background-color: #548bb8;" width="40px">ACP</th>
                    <th style="color: white;background-color: #548bb8;" width="50px">Diabetes</th>
                    <th style="color: white;background-color: #548bb8;" width="50px">Tobacco</th>
                    <th style="color: white;background-color: #548bb8;" width="40px">TCM</th>
                    <th style="color: white;background-color: #548bb8;" width="70px">Others</th>
                    <th style="color: white;background-color: #548bb8;" width="250px">ICD-Code Diagnoses</th>
                    <th style="color: white;background-color: #548bb8;" width="70px">Referral Date</th>
                    <th style="color: white;background-color: #548bb8;" width="120px">Date Referral was Emailed</th>
                    <th style="color: white;background-color: #548bb8;" width="80px">Visits Billed</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td width="40px"><?php echo  $transaction->get_selected_choice_format($transaction->pt_acp) ;?></td>
                    <td width="50px"><?php echo  $transaction->get_selected_choice_format($transaction->pt_diabetes) ;?></td>
                    <td width="50px"><?php echo  $transaction->get_selected_choice_format($transaction->pt_tobacco) ;?></td>
                    <td width="40px"><?php echo  $transaction->get_selected_choice_format($transaction->pt_tcm) ;?></td>
                    <td width="70px"><?php echo  $transaction->pt_others ;?></td>
                    <td width="250px"><?php echo  $transaction->pt_icd10_codes ;?></td>
                    <td width="70px"><?php echo  $transaction->get_date_format($transaction->pt_dateRef) ;?></td>
                    <td width="120px"><?php echo  $transaction->get_date_format($transaction->pt_dateRefEmailed) ;?></td>
                    <td width="80px"><span class="text-red"><strong><?php echo  $transaction->get_date_format($transaction->pt_visitBilled) ;?></strong></span></td>
                </tr>
            </tbody>
        </table>

    <?php endif; ?>

<?php endforeach; ?>

<p style="font-size:8px; color: gray;">CERTIFICATIONS</p>

<table id="" style="font-size: 8px;padding: 5px;">               
    <thead>
        <tr>
            <th style="color: white;background-color: #548bb8;" width="210px"></th>
            <th style="color: white;background-color: #548bb8;" width="120px">485 Cert Date Signed</th>
            <th style="color: white;background-color: #548bb8;" width="120px">1st month CPO</th>
            <th style="color: white;background-color: #548bb8;" width="120px">2nd month CPO</th>
            <th style="color: white;background-color: #548bb8;" width="120px">3rd month CPO</th>
            <th style="color: white;background-color: #548bb8;" width="80px">Discharge Date</th>
        </tr>
    </thead>

    <tbody>

        <?php foreach($cpos as $cpo): ?>

            <tr>
                <th><?php echo  $cpo->ptcpo_status ; ?></th>
                <td><?php echo  $cpo->get_date_format($cpo->ptcpo_dateSigned) ; ?></td>
                <td><?php echo  $cpo->ptcpo_firstMonthCPO ; ?></td>
                <td><?php echo  $cpo->ptcpo_secondMonthCPO ; ?></td>
                <td><?php echo  $cpo->ptcpo_thirdMonthCPO ; ?></td>
                <td><?php echo  $cpo->get_date_format($cpo->ptcpo_dischargeDate) ; ?></td>
            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<p style="font-size:8px; color: gray;">COMMUNICATION NOTES</p>


<?php foreach ($communication_notes as $cn): ?>

    <table style="font-size: 8px;padding: 5px;">
         <thead>
            <tr>
                <th style="color: white;background-color: #548bb8;" width="80px">Note Added</th>
                <th style="color: white;background-color: #548bb8;" width="690px">Note</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th width="80px"><?php echo $cn->get_date_format($cn->ptcn_dateCreated); ?></th>
                <td width="690px"><?php echo $cn->ptcn_message; ?></td>
            </tr>
        </tbody>
    </table>
    
<?php endforeach; ?>