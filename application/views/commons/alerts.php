{% if states['success'] is defined %}
  {{ include('modules/alert_success.php') }}
{% elseif states['danger'] is defined %}
  {{ include('modules/alert_danger.php') }}
{% elseif states['info'] is defined %}
  {{ include('modules/alert_info.php') }}
{% elseif states['warning'] is defined %}
  {{ include('modules/alert_warning.php') }}
{% endif %}