{% extends "main.php" %}

{% set page_title = '' %}

{% block content %}

<h2>{{ total }}  Search result for "{{ searchTerm }}"</h2>

	{% for result in results %}

		<h3><a target="_blank" {{ result['url'] }}>{{ result['moduleName'] }}</a></h3>
		<p>
			<strong>Name:</strong> {{ result['name'] }}<br>
			<strong>{{ result['value']['field'] }}:</strong> {{ result['value']['value'] }}
		</p>

	{% endfor %}

{% endblock %}