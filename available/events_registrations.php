<?php
/*
 * @version .1
 * @link https://raw.github.com/virtuecenter/manager/master/available/events_registrations.php
 * @mode upgrade
 *
 */
namespace Manager;

class events_registrations {
	private $field = false;
	public $collection = 'events';
	public $title = 'Registrations Options';
	public $titleField = 'title';
	public $singular = 'events_registration';
	public $description = '{{count}} registrations';
	public $definition = 'Coming Soon';
	public $acl = ['content', 'admin', 'superadmin'];
	public $icon = 'browser';
	public $category = 'Content';
	public $after = 'function';
	public $function = 'embeddedUpsert';
	public $notice = 'Registration Saved';
	public $embedded = true;
	public $storage = [
		'collection' => 'events',
		'key' => '_id'
	];

	public function __construct ($field=false) {
		$this->field = $field;
	}

	function titleField () {
		return [
			'name'		=> 'title',
			'label'		=> 'Name',
			'required'	=> true,
			'display'	=> 'InputText'
		];
	}

	function descriptionField () {
		return [
			'name' => 'description',
			'label' => 'Summary',
			'display' => 'Ckeditor'
		];
	}

	function costField () {
		return [
			'name' => 'price',
			'label' => 'Cost',
			'required' => false,
			'display' => 'InputText'
		];
	}

	function maximumUnitsPerCustomer () {
	    return [
	        'name' => 'maximum_units_per_customer',
	        'label' => '"Maximum Units Per Customer"',
	        'required' => false,
	        'options' => function () {
	        	$options = '';
	        	for ($i=1; $i<=100; $i++) {
	        		$options .= "<option value='" . $i . "'>" . $i . "</option>";
	        	}

	        	return $options;
	        },
	        'display' => 'Select'
	    ];
	}

	function quantity() {
	    return [
	        'name' => 'quantity',
	        'label' => '"Attendees Per Item"',
	        'required' => false,
	        'options' =>[
	                   '<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>'
						],
			'display' => 'Select'
			];
	}

	function chooseForm() {
	    return [
	        'name' => ' form',
	        'label' => 'Form',
	        'required' => false,
	        'options' =>[
	                    '<option value="Choose Form">1</option>'],
	        'display' => 'Select'
	        ];
	}


	public function tablePartial () {
		$partial = <<<'HBS'
			{{#EmbeddedCollectionHeader label="Registration"}}
			{{#if events_registrations}}
				<table class="ui table manager segment">
					<thead>
						<tr>
							<th>Title</th>
							<th class="trash">Delete</th>
						</tr>
					</thead>
					<tbody>
						{{#each events_registrations}}
							<tr data-id="{{dbURI}}">
								<td>{{title}}</td>
								<td><div class="manager trash ui icon button"><i class="trash icon small"></i></div></td>
							</tr>
						{{/each}}
					</tbody>
				</table>
		    {{else}}
			    {{#EmbeddedCollectionEmpty singular="Registration Options"}}
	        {{/if}}
HBS;
		return $partial;
	}

	public function formPartial () {
		$partial = <<<'HBS'
			{{#EmbeddedHeader}}
	        {{#FieldFull title Title}}{{/FieldFull}}
		    {{#FieldFull description Summary}}{{/FieldFull}}
		    {{#FieldFull price Cost}}{{/FieldFull}}
		    {{#FieldFull maximum_units_per_customer "Maximum Units Per Customer"}}{{/FieldFull}}
		    {{#FieldFull quantity "Attendees Per Item"}}{{/FieldFull}}
		    {{#FieldFull form Form}}{{/FieldFull}}
		    {{{id}}}
			{{#EmbeddedFooter}}
HBS;
		return $partial;
	}
}
