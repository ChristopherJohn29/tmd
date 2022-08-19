{% extends "main.php" %}

{% set page_title = 'Specialist' %}

{% 
  set scripts = [
    'bower_components/datatables.net/js/dataTables.buttons.min',
    'dist/js/specialist/profile/list'
  ]
%}

{% block content %}
    <div class="row">

        <div class="col-xs-12">
          {% if states %}
            {{ include('commons/alerts.php') }}
          {% endif %}
        </div>

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Specialist</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                
                <div class="table-responsive">
                    <input type="hidden" name="total" value="{{ total }}">
                    <input type="hidden" id="highlight" value="{{ highlight }}">

                    <table id="all-specialist-list" class="table no-margin table-hover">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Contact Person</th>
                                <th>Phone</th>
                                <th>Fax</th>
                                <th>Services Provided</th>
                                <th>Address</th>
                                <!-- <th>Notes</th> -->
                                <th width="50px">Action</th>
                            </tr>
                        </thead>
                      
                        <tbody>

                            {% if records %}                    

                                {% for record in records %}

                                    <tr>
                                        <td>{{ highlight_phrase(record.company_name, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}</td>
                                        <td>{{ highlight_phrase(record.contact_person, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}</td>
                                        <td>{{ highlight_phrase(record.phone_number, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}</td>
                                        <td>{{ highlight_phrase(record.fax, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}</td>
                                        <td>{{ highlight_phrase(record.services_provided|nl2br, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}</td>
                                        <td>{{ highlight_phrase(record.address|nl2br, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}</td>
                                        <!-- <td>{{ highlight_phrase(record.notes|nl2br, highlight, '<span style="background-color: #f1d40f;">', '</span>') }}</td> -->
                                        <td>
                                            <a href="{{ site_url("specialist/profile/details/#{ record.id }") }}" target="_blank" title="Edit"><span class="label label-primary">View</span></a>
                                        </td>
                                    </tr>


                                {% endfor %}

                            {% else %}

                                <tr>
                                    <td colspan="7" class="text-center">No data available in table</td>
                                </tr>

                            {% endif %}

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Company Name</th>
                                <th>Contact Person</th>
                                <th>Phone</th>
                                <th>Fax</th>
                                <th>Services Provided</th>
                                <th>Address</th>
                                <!-- <th>Notes</th> -->
                                <th width="50px">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>

      </div>
{% endblock %}