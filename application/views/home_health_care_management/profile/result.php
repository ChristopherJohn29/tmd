{% if records > 0 %}
    
    <p  style="font-size: 1.5em;"><strong>Total: </strong>{{ total }}</p>

    <table id="all-patient-list" class="table no-margin table-hover">
        <thead>
            <tr>
                <th class="text-center">Patient Name</th>
                <th class="text-center">Referral Date</th>
                <th>Provider</th>
                <th class="text-center">Date of Service</th>
                <th class="text-center">Home Health</th>
                <th width="70px">Action</th>
            </tr>
        </thead>

        <tbody>

            {% for record in records %}
                
                <tr>
                    <td>{{ record['patientName'] }}</td>
                    <td>{{ record['refDate'] }}</td>
                    <td>{{ record['providerName'] }}</td>
                    <td>{{ record['dateOfService'] }}</td>
                    <td>{{ record['homeHealth'] }}</td>
                    <td><a target="_blank" href="{{ site_url("patient_management/profile/details/#{ record['patientID']}") }}"><span class="label label-primary">View</span></a></td>
                </tr>

            {% endfor %}

        </tbody>
    </table>

{% endif %}