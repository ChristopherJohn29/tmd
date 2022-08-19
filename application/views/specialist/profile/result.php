{% if records > 0 %}
    
    <p  style="font-size: 1.5em;"><strong>Total: </strong>{{ total }}</p>

    <table id="all-patient-list" class="table no-margin table-hover">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Contact Person</th>
                <th>Phone</th>
                <th>Fax</th>
                <th>Services Provided</th>
                <th>Address</th>
                <th width="50px">Action</th>
            </tr>
        </thead>

        <tbody>

            {% for record in records %}
                
                <tr>
                    <td>{{ record['company_name'] }}</td>
                    <td>{{ record['contact_person'] }}</td>
                    <td>{{ record['phone_number'] }}</td>
                    <td>{{ record['fax'] }}</td>
                    <td>{{ record['services_provided'] }}</td>
                    <td>{{ record['address'] }}</td>
                    <td><a target="_blank" href="{{ site_url("patient_management/profile/details/#{ record['id']}") }}"><span class="label label-primary">View</span></a></td>
                </tr>

            {% endfor %}

        </tbody>
    </table>

{% endif %}