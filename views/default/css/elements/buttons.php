<?php
/**
 * CSS buttons
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>
/* **************************
	BUTTONS
************************** */

/* Base */
.elgg-button {
	width: auto;
	cursor: pointer;
	outline: none;

    font-family: "ROsanswebtext_bold", sans-serif;
    font-size: 1.8rem;
    line-height: 2.4rem;

    height: 4.0rem;

    text-decoration: none;
    line-height: 2.4rem;
    border: none;
    border-radius: 0.5rem !important;

	background-color: #009ee3;
    color: #FFF;
    box-sizing: border-box;

    -webkit-transition: color 0.2s ease, background-color 0.2s ease;
       -o-transition: color 0.2s ease, background-color 0.2s ease;
          transition: color 0.2s ease, background-color 0.2s ease;
}

li .elgg-button {
	margin-top: 0.0 !important;
	margin-left: 0.0 !important;
	margin-bottom: 0.0 !important;
	margin-right: 20px !important;
}

a.elgg-button {
	padding: 0.8rem 2rem;
}

/* Submit: This button should convey, "you're about to take some definitive action" */
.elgg-button-submit {

}

.elgg-button-submit:hover {
	background-color: #01689b;
}

.elgg-button-submit.elgg-state-disabled {
	background: #999;
	border-color: #999;
	cursor: default;
}

/* Cancel: This button should convey a negative but easily reversible action (e.g., turning off a plugin) */
.elgg-button-cancel {
	background-color: #B4B4B4;
}
.elgg-button-cancel:hover {
	background-color: #009ee3;
}

/* Action: This button should convey a normal, inconsequential action, such as clicking a link */
.elgg-button-action {
	
}

.elgg-button-action:hover,
.elgg-button-action:focus {
	background-color: #01689b;
}

.elgg-button.elgg-state-disabled {
	background-color: #B4B4B4 !important;
	cursor: default;
}

/* Delete: This button should convey "be careful before you click me" */
.elgg-button-delete {
	background-color: #B4B4B4;
}
.elgg-button-delete:hover {
	background-color: #009ee3;
}

.elgg-button-dropdown {
	padding:3px 6px;
	text-decoration:none;
	display:block;
	font-weight:bold;
	position:relative;
	margin-left:0;
	color: white;
	border:1px solid #71B9F7;

	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;

	-webkit-box-shadow: 0 0 0;
	-moz-box-shadow: 0 0 0;
	box-shadow: 0 0 0;

	/*background-image:url(<?php echo elgg_get_site_url(); ?>_graphics/elgg_sprites.png);
	background-position:-150px -51px;
	background-repeat:no-repeat;*/
}

.elgg-button-dropdown:after {
	content: " \25BC ";
	font-size:smaller;
}

.elgg-button-dropdown:hover {
	background-color:#71B9F7;
	text-decoration:none;
}

.elgg-button-dropdown.elgg-state-active {
	background: #ccc;
	outline: none;
	color: #333;
	border:1px solid #ccc;

	-webkit-border-radius:4px 4px 0 0;
	-moz-border-radius:4px 4px 0 0;
	border-radius:4px 4px 0 0;
}
