<?php
session_start();

$step = $_REQUEST['step'];
$formData = $_REQUEST['formData'];


function save($step, $data) {
	//$_SESSION[$step] = $data;
	$fields = explode('&',$data);
	foreach ($fields as $field) {
		$keyVal = explode('=', $field);
		$key = urldecode($keyVal[0]);
		$val = urldecode($keyVal[1]);
		$_SESSION[$step][$key] = $val;
	}
}

if ($formData) {
	$formStep = $_REQUEST['saveData'];
	save($formStep, $_REQUEST['formData']);
}

if ($step) {
	switch ($step) {
		case 'formstep1':
			$html = <<<FORM
			<form id="form_{$step}" name="form_{$step}">
			<fieldset>
    <legend>Personal information</legend>
    <div class="fm-req">
      <label for="fm-firstname">First name:</label>
      <input name="fm-firstname" id="fm-firstname" type="text" value="{$_SESSION[$step]['fm-firstname']}"/>
    </div>
    <div class="fm-opt">

      <label for="fm-middlename">Middle name:</label>
      <input id="fm-middlename" name="fm-middlename" type="text" value="{$_SESSION[$step]['fm-middlename']}"/>
    </div>
    <div class="fm-req">
      <label for="fm-lastname">Last name:</label>
      <input name="fm-lastname" id="fm-lastname" type="text" value="{$_SESSION[$step]['fm-lastname']}"/>
    </div>
    </fieldset>
	</fieldset>
	</form>	
FORM;
		echo $html;
		break;
		case 'formstep2':
			$html = <<<FORM
			<form id="form_{$step}" name="form_{$step}">
<fieldset>
<legend>Address </legend>
    <div class="fm-opt">
      <label for="fm-addr">Address:</label>
      <input id="fm-addr" name="fm-addr" type="text" value="{$_SESSION[$step]['fm-addr']}"/>
    </div>
    <div class="fm-opt">
      <label for="fm-city">City or Town:</label>

      <input id="fm-city" name="fm-city" type="text" value="{$_SESSION[$step]['fm-city']}"/>
    </div>
    <div class="fm-opt">
      <label for="fm-state">State:</label>
      <input id="fm-state" name="fm-state" type="text" value="{$_SESSION[$step]['fm-state']}"/>
    </div>
    <div class="fm-req">
      <label for="fm-zipcode">Zip code:</label>
      <input id="fm-zipcode" name="fm-zipcode" type="text" value="{$_SESSION[$step]['fm-zipcode']}"/>
    </div>
    </fieldset>
</form>

FORM;
		echo $html;
		break;
		case 'formstep3':
			$html = <<<FORM
			<form id="form_{$step}" name="form_{$step}">
<fieldset>
<legend>Interests </legend>
    <div class="fm-opt">
      <label for="fm-int1">Interest 1:</label>
      <input id="fm-int1" name="fm-int1" type="text" value="{$_SESSION[$step]['fm-int1']}"/>
    </div>
    <div class="fm-opt">
      <label for="fm-int2">Interest 2:</label>

      <input id="fm-int2" name="fm-int2" type="text" value="{$_SESSION[$step]['fm-int2']}"/>
    </div>
    </fieldset>
</form>

FORM;
		echo $html;
		break;
		case 'getAllData':
			echo '<h3>Saved Data</h3>';
			echo '<div style="text-align: left;"><pre>';
			print_r($_SESSION);
			echo '</pre></div>';
		break;
	}
}

