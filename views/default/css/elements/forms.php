<?php
/**
 * CSS form/input elements
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

/* ***************************************
	Form Elements
*************************************** */
.elgg-form-alt > fieldset > .elgg-foot {
	border-top: 1px solid #CCC;
	padding: 10px 0;
}

.elgg-longtext-control {
	float: right;
	margin-left: 14px;
	font-size: 80%;
	cursor: pointer;
}

.elgg-input-access {
	margin:5px 0 0 0;
}

.elgg-input-text {
	border: 0.1rem solid #CCCCCC;
	padding: 1.1rem 1rem 1.1rem 1.25rem;
	transition: all 0.2s ease;
}

.elgg-input-text:focus {
	border-color: #009ee3;
}

.elgg-input-text:hover {
	border-color: #009ee3;
}

.elgg-input-password {
	border: 0.1rem solid #CCCCCC;
	padding: 1.1rem 1rem 1.1rem 1.25rem;
	transition: all 0.2s ease;
}

.elgg-input-password:focus {
	border-color: #009ee3;
}

.elgg-input-password:hover {
	border-color: #009ee3;
}

.elgg-input-checkboxes.elgg-horizontal li,
.elgg-input-radios.elgg-horizontal li {
	display: inline;
	padding-right: 10px;
}

.elgg-form-login, .elgg-form-account {
	max-width: 450px;
}

/* ***************************************
	FRIENDS PICKER
*************************************** */
.friends-picker-main-wrapper {
	margin-bottom: 15px;
}
.friends-picker-container h3 {
	font-size:4em !important;
	text-align: left;
	margin:10px 0 20px !important;
	color:#999 !important;
	background: none !important;
	padding:0 !important;
}
.friends-picker .friends-picker-container .panel ul {
	text-align: left;
	margin: 0;
	padding:0;
}
.friends-picker-wrapper {
	margin: 0;
	padding:0;
	position: relative;
	width: 730px;
}
.friends-picker {
	position: relative;
	overflow: hidden;
	margin: 0;
	padding:0;
	width: 730px;
	height: auto;
	background-color: #dedede;
	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
}
.friendspicker-savebuttons {
	background: white;
	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	
	margin:0 10px 10px;
}
.friends-picker .friends-picker-container { /* long container used to house end-to-end panels. Width is calculated in JS  */
	position: relative;
	left: 0;
	top: 0;
	width: 100%;
	list-style-type: none;
}
.friends-picker .friends-picker-container .panel {
	float:left;
	height: 100%;
	position: relative;
	width: 730px;
	margin: 0;
	padding:0;
}
.friends-picker .friends-picker-container .panel .wrapper {
	margin: 0;
	padding:4px 10px 10px 10px;
	min-height: 230px;
}
.friends-picker-navigation {
	margin: 0 0 10px;
	padding:0 0 10px;
	border-bottom:1px solid #ccc;
}
.friends-picker-navigation ul {
	list-style: none;
	padding-left: 0;
}
.friends-picker-navigation ul li {
	float: left;
	margin:0;
	background:white;
}
.friends-picker-navigation a {
	font-weight: bold;
	text-align: center;
	background: white;
	color: #999;
	text-decoration: none;
	display: block;
	padding: 0;
	width:20px;
	
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}
.tabHasContent {
	background: white;
	color:#333 !important;
}
.friends-picker-navigation li a:hover {
	background: #333;
	color:white !important;
}
.friends-picker-navigation li a.current {
	background: #4690D6;
	color:white !important;
}
.friends-picker-navigation-l, .friends-picker-navigation-r {
	position: absolute;
	top: 46px;
	text-indent: -9000em;
}
.friends-picker-navigation-l a, .friends-picker-navigation-r a {
	display: block;
	height: 40px;
	width: 40px;
}
.friends-picker-navigation-l {
	right: 48px;
	z-index:1;
}
.friends-picker-navigation-r {
	right: 0;
	z-index:1;
}
.friends-picker-navigation-l {
	background: url("<?php echo elgg_get_site_url(); ?>_graphics/friendspicker.png") no-repeat left top;
}
.friends-picker-navigation-r {
	background: url("<?php echo elgg_get_site_url(); ?>_graphics/friendspicker.png") no-repeat -60px top;
}
.friends-picker-navigation-l:hover {
	background: url("<?php echo elgg_get_site_url(); ?>_graphics/friendspicker.png") no-repeat left -44px;
}
.friends-picker-navigation-r:hover {
	background: url("<?php echo elgg_get_site_url(); ?>_graphics/friendspicker.png") no-repeat -60px -44px;
}
.friendspicker-savebuttons .elgg-button-submit,
.friendspicker-savebuttons .elgg-button-cancel {
	margin:5px 20px 5px 5px;
}
.friendspicker-members-table {
	background: #dedede;
	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	
	margin:10px 0 0;
	padding:10px 10px 0;
}

/* ***************************************
	AUTOCOMPLETE
*************************************** */
<?php //autocomplete will expand to fullscreen without max-width ?>
.ui-autocomplete {
	position: absolute;
	cursor: default;
}
.elgg-autocomplete-item .elgg-body {
	max-width: 600px;
}
.ui-autocomplete {
	background-color: white;
	border: 1px solid #ccc;
	overflow: hidden;

	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}
.ui-autocomplete .ui-menu-item {
	padding: 0px 4px;
	
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}
.ui-autocomplete .ui-menu-item:hover {
	background-color: #eee;
}
.ui-autocomplete a:hover {
	text-decoration: none;
	color: #4690D6;
}
.ui-autocomplete a.ui-state-hover {
	background-color: #eee;
	display: block;
}

/* ***************************************
	USER PICKER
*************************************** */
.elgg-user-picker-list li:first-child {
	border-top: 1px dotted #ccc;
	margin-top: 5px;
}
.elgg-user-picker-list > li {
	border-bottom: 1px dotted #ccc;
}

/* ***************************************
      DATE PICKER
**************************************** */
.ui-datepicker {
	display: none;

	margin-top: 3px;
	width: 208px;
	background-color: white;
	border: 1px solid #0054A7;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	overflow: hidden;

	-webkit-box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
	box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
}
.ui-datepicker-inline {
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
}

.ui-datepicker-header {
	position: relative;
	background: #4690D6;
	color: white;
	padding: 2px 0;
	border-bottom: 1px solid #0054A7;
}
.ui-datepicker-header a {
	color: white;
}
.ui-datepicker-prev, .ui-datepicker-next {
	position: absolute;
	top: 5px;
	cursor: pointer;
}
.ui-datepicker-prev {
	left: 6px;
}
.ui-datepicker-next {
	right: 6px;
}
.ui-datepicker-title {
	line-height: 1.8em;
	margin: 0 30px;
	text-align: center;
	font-weight: bold;
}
.ui-datepicker-calendar {
	margin: 4px;
}
.ui-datepicker th {
	color: #0054A7;
	border: none;
	font-weight: bold;
	padding: 5px 6px;
	text-align: center;
}
.ui-datepicker td {
	padding: 1px;
}
.ui-datepicker td span, .ui-datepicker td a {
	display: block;
	padding: 2px;
	line-height: 1.2em;
	text-align: right;
	text-decoration: none;
}
.ui-datepicker-calendar .ui-state-default {
	border: 1px solid #ccc;
	color: #4690D6;;
	background: #fafafa;
}
.ui-datepicker-calendar .ui-state-hover {
	border: 1px solid #aaa;
	color: #0054A7;
	background: #eee;
}
.ui-datepicker-calendar .ui-state-active,
.ui-datepicker-calendar .ui-state-active.ui-state-hover {
	font-weight: bold;
	border: 1px solid #0054A7;
	color: #0054A7;
	background: #E4ECF5;
}
.elgg-input-radios:before,
.elgg-input-radios:after {
  content: " ";
  display: table;
}
.elgg-input-radios:after {
  clear: both;
}
.elgg-input-radio-label {
  display: block;
  padding-left: 3rem;
  padding-top: 0.1rem;
  padding-bottom: 0.3rem;
  position: relative;
  cursor: pointer;
}
.elgg-input-radio-label a {
  font-family: "ROsanswebtext_bold", sans-serif;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.elgg-input-radio-label a:hover {
  border-bottom: 1px dotted #009ee3;
}
.elgg-input-radio-label-floated {
  float: left;
  margin-right: 3rem;
}
.elgg-input-radio-placeholder {
  width: 2rem;
  height: 2rem;
  position: absolute;
  left: 0;
  top: 0.4rem;
  background-color: #fff;
  border: 2px solid #B4B4B4;
  border-radius: 50% !important;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.focus > .elgg-input-radio-placeholder {
  border-color: #01689b;
}
.elgg-input-radio-placeholder:after {
  content: '';
  position: absolute;
  border-radius: 50%;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%) scale(0.6);
      -ms-transform: translate(-50%, -50%) scale(0.6);
       -o-transform: translate(-50%, -50%) scale(0.6);
          transform: translate(-50%, -50%) scale(0.6);
  width: 2rem;
  height: 2rem;
  background-color: #fff;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
:hover > .elgg-input-radio-placeholder:after {
  background-color: #CCCCCC;
}
.chosen .elgg-input-radio-placeholder:after {
  background-color: #154273;
}
.elgg-input-radio {
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
}

input[type="checkbox"],
input[type="radio"] {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  padding: 0;
}

.elgg-input-checkbox-label {
  display: block;
  padding-left: 2.4rem;
  padding-bottom: 0.6rem;
  position: relative;
  cursor: pointer;
}
.elgg-input-checkbox-label a {
  font-family: "ROsanswebtext_bold", sans-serif;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.elgg-input-checkbox-label a:hover {
  border-bottom: 1px dotted #009ee3;
}
.elgg-input-checkbox-floated {
  float: left;
  margin-right: 3rem;
}
.elgg-input-checkbox-placeholder {
  width: 1.6rem;
  height: 1.6rem;
  position: absolute;
  left: 0;
  top: 0.4rem;
  background-color: #fff;
  border: 2px solid #B4B4B4;
  border-radius: 0.4rem;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.focus > .elgg-input-checkbox-placeholder {
  border-color: #01689b;
}
.elgg-input-checkbox-placeholder:after {
  content: "\e92b";
  position: absolute;
  top: 53%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
       -o-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  font-size: 1.2rem;
  color: transparent;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
  font-family: "pleio";
}
:hover > .elgg-input-checkbox-placeholder:after {
  color: #CCCCCC;
}
.chosen > .elgg-input-checkbox-placeholder:after {
  color: #01689b;
}
@media (min-width: 1681px) {
  .elgg-input-checkbox-placeholder:after {
    top: 55%;
  }
}
.elgg-input-checkbox {
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
}