<img src="<?php echo base_url() ?>/dist/img/pdf_header_portrait.png">

<h3><?php echo  $record->patient_name; ?></h3>

<table>
    <tbody>
        <tr>
            <td style="color: white;background-color: #548bb8;">Basic Information</td>
            <td style="color: white;background-color: #548bb8;">Contact Information</td>
            <td style="color: white;background-color: #548bb8;">Home Health Information</td>
        </tr>
        <tr>
            <td>
                <table>
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
                </table>
            </td>
            <td>
                <table>
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
                <table>
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

        <p>Type of visit : <?php echo  $transaction->tov_name; ?></p>

    <?php endif; ?>
    
    <?php if ($transaction_entity->is_tov_sel_noshow_cancelled($transaction->pt_tovID)): ?>

         <table class="table no-margin table-hover">
            <thead>
                <tr>
                    <th style="color: white;background-color:  #548bb8;">Provider</th>
                    <th style="color: white;background-color:  #548bb8;">Date of Service</th>
                    <th style="color: white;background-color:  #548bb8;">Note</th>
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

        <table>
            <thead>
                <tr>
                    <th style="color: white;background-color: #548bb8;">Provider</th>
                    <th style="color: white;background-color: #548bb8;">Date of Service</th>
                    <th style="color: white;background-color: #548bb8;">Deductible</th>
                    <th style="color: white;background-color: #548bb8;">AW/IPPE</th>
                    <th style="color: white;background-color: #548bb8;">Performed</th>
                    <th style="color: white;background-color: #548bb8;">AW/IPPE Date</th>
                    <th style="color: white;background-color: #548bb8;" width="110px">AW Billed</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo  $transaction->get_provider_fullname() ;?></td>
                    <td><?php echo  $transaction->get_date_format($transaction->pt_dateOfService) ;?></td>
                    <td><?php echo  $transaction->pt_deductible ;?></td>
                    <td><?php echo  $transaction->pt_aw_ippe_code ;?></td>
                    <td><?php echo  $transaction->get_selected_choice_format($transaction->pt_performed) ;?></td>
                    <td><?php echo  $transaction->get_date_format($transaction->pt_aw_ippe_date) ;?></td>
                    <td><span class="text-red"><strong><?php echo  $transaction->get_date_format($transaction->pt_aw_billed) ;?></strong></span></td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th style="color: white;background-color: #548bb8;">ACP</th>
                    <th style="color: white;background-color: #548bb8;">Diabetes</th>
                    <th style="color: white;background-color: #548bb8;">Tobacco</th>
                    <th style="color: white;background-color: #548bb8;">TCM</th>
                    <th style="color: white;background-color: #548bb8;">Others</th>
                    <th style="color: white;background-color: #548bb8;">ICD-Code Diagnoses</th>
                    <th style="color: white;background-color: #548bb8;">Referral Date</th>
                    <th style="color: white;background-color: #548bb8;">Date Referral was Emailed</th>
                    <th style="color: white;background-color: #548bb8;" width="110px">Visits Billed</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?php echo  $transaction->get_selected_choice_format($transaction->pt_acp) ;?></td>
                    <td><?php echo  $transaction->get_selected_choice_format($transaction->pt_diabetes) ;?></td>
                    <td><?php echo  $transaction->get_selected_choice_format($transaction->pt_tobacco) ;?></td>
                    <td><?php echo  $transaction->get_selected_choice_format($transaction->pt_tcm) ;?></td>
                    <td><?php echo  $transaction->pt_others ;?></td>
                    <td><?php echo  $transaction->pt_icd10_codes ;?></td>
                    <td><?php echo  $transaction->get_date_format($transaction->pt_dateRef) ;?></td>
                    <td><?php echo  $transaction->get_date_format($transaction->pt_dateRefEmailed) ;?></td>
                    <td><span class="text-red"><strong><?php echo  $transaction->get_date_format($transaction->pt_visitBilled) ;?></strong></span></td>
                </tr>
            </tbody>
        </table>

    <?php endif; ?>

<?php endforeach; ?>

<p style="font-size:8px; color: gray;">CERTIFICATIONS</p>

<table id="" class="table no-margin table-striped">               
    <thead>
        <tr>
            <th style="color: white;background-color: #548bb8;"></th>
            <th style="color: white;background-color: #548bb8;">485 Cert Date Signed</th>
            <th style="color: white;background-color: #548bb8;">1st month CPO</th>
            <th style="color: white;background-color: #548bb8;">2nd month CPO</th>
            <th style="color: white;background-color: #548bb8;">3rd month CPO</th>
            <th style="color: white;background-color: #548bb8;" width="200px">Discharge Date</th>
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

    <table>
         <thead>
            <tr>
                <th style="color: white;background-color: #548bb8;" width="200px">Note Added</th>
                <th style="color: white;background-color: #548bb8;">Note</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th><?php echo $cn->get_date_format($cn->ptcn_dateCreated); ?></th>
                <td><?php echo $cn->ptcn_message; ?></td>
            </tr>
        </tbody>
    </table>
    
<?php endforeach; ?>