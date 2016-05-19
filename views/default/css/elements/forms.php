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
  width: 100%;
  background: #FFF;
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
  width: 100%;
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

.elgg-form-login fieldset div input[type='text'] {
  width: 100%;
}

.elgg-form-login fieldset div input[type='password'] {
  width: 100%;
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

.elgg-input-plaintext {
	width: 100%;
    background: #FFF;
  	font-size: 1.8rem;
  	line-height: 2.2rem;
  	border: 0.1rem solid #CCCCCC;
  	padding: 1.1rem 1rem 1.1rem 1.25rem;
    -webkit-transition: all 0.2s ease;
         -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
}

.elgg-input-plaintext:focus {
	border-color: #009ee3;
}

.elgg-input-plaintext:hover {
	border-color: #009ee3;
}

.elgg-input-longtext {
	width: 100%;
  	font-size: 1.8rem;
  	line-height: 2.2rem;
  	border: 0.1rem solid #CCCCCC;
  	padding: 1.1rem 1rem 1.1rem 1.25rem;
    -webkit-transition: all 0.2s ease;
         -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
}

.elgg-input-longtext:focus {
	border-color: #009ee3;
}

.elgg-input-longtext:hover {
	border-color: #009ee3;
}

.elgg-input-user-picker {
  	font-size: 1.8rem;
  	line-height: 2.2rem;
  	border: 0.1rem solid #CCCCCC;
  	padding: 1.1rem 1rem 1.1rem 1.25rem;
    -webkit-transition: all 0.2s ease;
         -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
}

.elgg-input-user-picker:focus {
	border-color: #009ee3;
}

.elgg-input-user-picker:hover {
	border-color: #009ee3;
}

.elgg-input-date {
  	font-size: 1.8rem;
  	line-height: 2.2rem;
  	border: 0.1rem solid #CCCCCC;
  	padding: 1.1rem 1rem 1.1rem 1.25rem;
    -webkit-transition: all 0.2s ease;
         -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
}

.elgg-input-date:focus {
	border-color: #009ee3;
}

.elgg-input-date:hover {
	border-color: #009ee3;
}

.elgg-input-autocomplete {
  	font-size: 1.8rem;
  	line-height: 2.2rem;
  	border: 0.1rem solid #CCCCCC;
  	padding: 1.1rem 1rem 1.1rem 1.25rem;
    -webkit-transition: all 0.2s ease;
         -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
}

.elgg-input-autocomplete:focus {
	border-color: #009ee3;
}

.elgg-input-autocomplete:hover {
	border-color: #009ee3;
}

.elgg-input-email {
  	font-size: 1.8rem;
  	line-height: 2.2rem;
  	border: 0.1rem solid #CCCCCC;
  	padding: 1.1rem 1rem 1.1rem 1.25rem;
    -webkit-transition: all 0.2s ease;
         -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
}

.elgg-input-email:focus {
	border-color: #009ee3;
}

.elgg-input-email:hover {
	border-color: #009ee3;
}

.elgg-input-tags {
    width: 100%;
  	font-size: 1.8rem;
  	line-height: 2.2rem;
    background: #FFF;
  	border: 0.1rem solid #CCCCCC;
  	padding: 1.1rem 1rem 1.1rem 1.25rem;
    -webkit-transition: all 0.2s ease;
         -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
}

.elgg-input-tags:focus {
	border-color: #009ee3;
}

.elgg-input-tags:hover {
	border-color: #009ee3;
}

.elgg-input-url {
  	font-size: 1.8rem;
  	line-height: 2.2rem;
  	border: 0.1rem solid #CCCCCC;
  	padding: 1.1rem 1rem 1.1rem 1.25rem;
    -webkit-transition: all 0.2s ease;
         -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
}

.elgg-input-url:focus {
	border-color: #009ee3;
}

.elgg-input-url:hover {
	border-color: #009ee3;
}

.elgg-input-file {
	border: 0.1rem solid #CCCCCC;
	padding: 1.1rem 1rem 1.1rem 1.25rem;
	transition: all 0.2s ease;
}

.elgg-input-file:focus {
	border-color: #009ee3;
}

.elgg-input-file:hover {
	border-color: #009ee3;
}
.elgg-input-selecter {
  position: relative;
  display: block;
  margin: 10px 0;
  z-index: 1;
}
.elgg-input-selecter:focus {
  -webkit-box-shadow: none;
          box-shadow: none;
  outline: none;
}
.elgg-input-selecter,
.elgg-input-selecter * {
  -webkit-user-select: none !important;
  -moz-user-select: none !important;
  -ms-user-select: none !important;
  user-select: none !important;
}
.elgg-input-selecter,
.elgg-input-selecter *,
.elgg-input-selecter *:before,
.elgg-input-selecter *:after {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}
.elgg-input-selecter-element {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  opacity: 0;
  z-index: -1;
}
.elgg-input-selecter-element,
.elgg-input-selecter-element:focus {
  outline: none;
  -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
  -webkit-tap-highlight-color: transparent;
}
.no-opacity .elgg-input-selecter-element {
  left: -999999px;
}
.elgg-input-selecter-selected {
  position: relative;
  background: #ffffff;
  border: 1px solid #cccccc;
  color: #222222;
  cursor: pointer;
  display: block;
  font-size: 13px;
  margin: 0;
  overflow: hidden;
  padding: 10px 15px;
  text-overflow: clip;
  z-index: 2;
  border-radius: 3px;
}
.elgg-input-selecter-selected:after {
  height: 0;
  width: 0;
  position: absolute;
  top: 0;
  right: 15px;
  bottom: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid #cccccc;
  content: '';
  display: block;
  margin: auto 0;
}
.no-touch .elgg-input-selecter-selected:hover {
  color: #333333;
}
.no-touch .elgg-input-selecter.disabled .elgg-input-selecter-selected:hover {
  color: #cccccc;
}
.elgg-input-selecter-options {
  width: 100%;
  max-height: 260px;
  position: absolute;
  top: 100%;
  left: 0;
  border: 1px solid #cccccc;
  border-width: 0 1px 1px;
  background-color: #ffffff;
  display: none;
  margin: 0;
  overflow: auto;
  overflow-x: hidden;
  padding: 0;
  z-index: 50;
  border-radius: 0 0 3px 3px;
  -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
          box-shadow: 0 1px 4px rgba(0, 0, 0, 0.15);
}
.elgg-input-selecter-options.scroller {
  position: absolute;
}
.no-opacity .elgg-input-selecter-options {
  width: auto;
}
.elgg-input-selecter-group {
  border-bottom: 1px solid #cccccc;
  color: #999999;
  display: block;
  font-size: 11px;
  padding: 10px 15px;
  text-transform: uppercase;
}
.elgg-input-selecter-item {
  width: 100%;
  background: #ffffff;
  border-bottom: 1px solid #cccccc;
  color: #222222;
  cursor: pointer;
  display: block;
  font-size: 13px;
  margin: 0;
  overflow: hidden;
  padding: 10px 15px;
  text-decoration: none;
  text-overflow: ellipsis;
}
.elgg-input-selecter-item.placeholder {
  display: none;
}
.elgg-input-selecter-item.selected {
  background: #eeeeee;
}
.elgg-input-selecter-item.disabled {
  color: #999999;
  cursor: default;
}
.elgg-input-selecter-item:first-child {
  border-radius: 0;
}
.elgg-input-selecter-item:last-child {
  border-bottom: 0;
  border-radius: 0 0 2px 2px;
}
.no-touch .elgg-input-selecter-item:hover,
.no-touch .elgg-input-selecter-item.selected:hover {
  color: #333333;
  background-color: #cccccc;
}
.elgg-input-selecter-item.disabled,
.no-touch .elgg-input-selecter-item.disabled:hover {
  color: #cccccc;
  background-color: #ffffff;
}
.elgg-input-selecter.open {
  z-index: 3;
}
.elgg-input-selecter.open .elgg-input-selecter-selected {
  z-index: 51;
  border-radius: 3px 3px 0 0;
}
.elgg-input-selecter.open .elgg-input-selecter-selected,
.elgg-input-selecter.focus .elgg-input-selecter-selected {
  background-color: #ffffff;
  -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
          box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.elgg-input-selecter.cover .elgg-input-selecter-options {
  border-width: 1px;
  top: 0;
  border-radius: 3px;
}
.elgg-input-selecter.cover .elgg-input-selecter-options .elgg-input-selecter-item.first {
  border-radius: 3px 3px 0 0;
}
.elgg-input-selecter.cover.open .elgg-input-selecter-selected {
  z-index: 49;
  border-radius: 3px 3px 0 0;
}
.elgg-input-selecter.bottom .elgg-input-selecter-options {
  top: auto;
  bottom: 100%;
  border-width: 1px 1px 0;
}
.elgg-input-selecter.bottom .elgg-input-selecter-item:last-child {
  border: none;
}
.elgg-input-selecter.bottom.open .elgg-input-selecter-selected {
  border-radius: 0 0 3px 3px;
}
.elgg-input-selecter.bottom.open .elgg-input-selecter-options {
  border-radius: 3px 3px 0 0;
}
.elgg-input-selecter.bottom .cover .elgg-input-selecter-options {
  top: auto;
  bottom: 0;
}
.elgg-input-selecter.bottom .cover.open .elgg-input-selecter-selected {
  border-radius: 3px;
}
.elgg-input-selecter.bottom .cover.open .elgg-input-selecter-options {
  border-radius: 3px;
}
.elgg-input-selecter.multiple .elgg-input-selecter-options {
  width: 100%;
  position: static;
  border-width: 1px;
  display: block;
  border-radius: 3px;
  -webkit-box-shadow: none;
          box-shadow: none;
}
.elgg-input-selecter.disabled .elgg-input-selecter-selected {
  background: #ffffff;
  border-color: #cccccc;
  color: #cccccc;
  cursor: default;
}
.elgg-input-selecter.disabled .elgg-input-selecter-options {
  background: #ffffff;
  border-color: #cccccc;
}
.elgg-input-selecter.disabled .elgg-input-selecter-group,
.elgg-input-selecter.disabled .elgg-input-selecter-item {
  border-color: #cccccc;
  color: #cccccc;
  cursor: default;
}
.elgg-input-selecter.disabled .elgg-input-selecter-item.selected,
.no-touch .elgg-input-selecter.disabled .elgg-input-selecter-item.selected:hover {
  background: #fafafa;
}
.elgg-input-selecter.disabled .elgg-input-selecter-item,
.no-touch .elgg-input-selecter.disabled .elgg-input-selecter-item:hover {
  color: #cccccc;
  background-color: #ffffff;
}
.elgg-input-selecter-options.scroller {
  overflow: hidden;
}
.elgg-input-selecter-options.scroller .scroller-content {
  max-height: 260px;
  padding: 0;
}
@media screen and (max-width: 740px) {
  .elgg-input-selecter {
    max-width: 40%;
  }
}
@media screen and (max-width: 500px) {
  .elgg-input-selecter {
    max-width: 100%;
  }
}

.elgg-input-selecter {
  /*max-width: 100% !important;*/
  margin: 0 !important;
  text-align: left;
}
.rhs-news .elgg-input-selecter {
  margin-bottom: 1rem !important;
}
@media (min-width: 768px) {
  .rhs-news .elgg-input-selecter {
    margin-bottom: 0 !important;
  }
}
span.elgg-input-selecter-selected {
  -webkit-box-shadow: none !important;
          box-shadow: none !important;
  padding: 0.6rem 3rem 0.6rem 2rem !important;
  font-size: 1.6rem !important;
  line-height: 3.2rem;
  border-radius: 0 !important;
  min-height: 4.6rem;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
span.elgg-input-selecter-selected:hover {
  border-color: #009ee3;
}
.elgg-input-selecter.focus span.elgg-input-selecter-selected {
  border-color: #009ee3;
}
span.elgg-input-selecter-selected:after {
  border: none;
  width: auto;
  height: auto;
  font-family: "pleio";
  content: "\e903";
  color: #000;
  font-size: 1rem;
  bottom: auto;
  top: 50%;
  -webkit-transform: translate(0, -50%);
      -ms-transform: translate(0, -50%);
       -o-transform: translate(0, -50%);
          transform: translate(0, -50%);
  display: block;
}
.elgg-input-selecter.open span.elgg-input-selecter-selected {
  border-radius: 0;
  -webkit-box-shadow: none !important;
          box-shadow: none !important;
  border: 1px solid transparent;
}
@media (min-width: 768px) {
  span.elgg-input-selecter-selected {
    font-size: 1.8rem !important;
  }
}
.elgg-input-selecter-options {
  border-radius: 0 !important;
  -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2) !important;
          box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2) !important;
  padding: 0.6rem 0 !important;
  border: 1px solid #fff !important;
  top: 0 !important;
  z-index: 60 !important;
}
.elgg-input-selecter-options:after {
  font-family: "pleio";
  content: "\e902";
  z-index: 9999;
  position: absolute;
  top: 1.5rem;
  right: 1.5rem;
  color: #B4B4B4;
  font-size: 1rem;
  line-height: 1;
}
@media (min-width: 768px) {
  .rhs-modal__content .elgg-input-selecter-options {
    margin-bottom: 2rem;
  }
}
.elgg-input-selecter-item {
  font-size: 1.6rem !important;
  line-height: 3.2rem !important;
  padding: 0 2rem !important;
  border: none !important;
  position: relative !important;
  z-index: 80 !important;
  background: #fff;
}
.elgg-input-selecter-item:hover {
  color: #009ee3 !important;
  background-color: transparent !important;
}
.elgg-input-selecter-item.selected {
  color: #009ee3 !important;
  background-color: transparent !important;
}
.elgg-input-selecter-item:disabled {
  color: #B4B4B4 !important;
}
.elgg-input-selecter-item:disabled:hover {
  color: #B4B4B4 !important;
}
.elgg-input-selecter-item.disabled {
  color: #B4B4B4 !important;
}
.elgg-input-selecter-item.disabled:hover {
  color: #B4B4B4 !important;
}
@media (min-width: 768px) {
  .elgg-input-selecter-item {
    font-size: 1.8rem !important;
  }
}
.elgg-input-selecter.open .elgg-input-selecter-selected {
  color: #009ee3 !important;
}
.elgg-input-selecter.open .elgg-input-selecter-selected:disabled {
  color: #B4B4B4 !important;
}
.elgg-input-selecter.open .elgg-input-selecter-selected:disabled:hover {
  color: #B4B4B4 !important;
}

.elgg-input-dropdown {
	width: 100%;
}