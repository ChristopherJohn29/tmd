{% extends "main.php" %}

{% set page_title = '' %}

{% block content %}

<h2>{{ total }}  Search result for "{{ searchTerm }}"</h2>

	{% for result in results %}

		<p>
			<a target="_blank" {{ result['url'] }}>{{ result['name'] }}</a><br>
			<strong>{{ result['value']['field'] }}:</strong> {{ result['value']['value'] }}
		</p>

	{% endfor %}

{% endblock %}