<?php
/**
 * Layout Object CSS
 *
 * Image blocks, lists, tables, gallery, messages
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

/* ***************************************
	Image Block
*************************************** */
.elgg-image-block {
	padding: 2rem 2rem;
	margin: 2rem 0 0;
	background-color: #f1f9fc;
	box-sizing: border-box;
}
.elgg-image-block .elgg-image {
	float: left;
	margin-left: 1.25rem;
	margin-right: 1.25rem;
}

.elgg-image-block .elgg-image .elgg-avatar a img {
	border-radius: 50% !important;
}

.elgg-image-block .elgg-image img {
	border-radius: 50% !important;
}

.elgg-image-block .elgg-image-alt {
	float: right;
	margin-left: 5px;
}
.elgg-image-block .elgg-body .elgg-subtext a {
  font-size: 1.6rem;
  line-height: 2.2rem;
  text-decoration: none;
  font-family: "ROsanswebtext_bold", sans-serif;
  color: #01689b;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.elgg-image-block .elgg-body .elgg-subtext a:hover {
  color: #009ee3;
}
/* ***************************************
	List
*************************************** */
.elgg-list {
	margin: 5px 0;
	clear: both;
}
.elgg-list > li {
}

.elgg-item .elgg-subtext {
	margin-bottom: 5px;
}
.elgg-item .elgg-content {
	margin: 10px 5px;
}

/* ***************************************
	Gallery
*************************************** */
.elgg-gallery {
	border: none;
	margin-right: auto;
	margin-left: auto;
}
.elgg-gallery td {
	padding: 5px;
}
.elgg-gallery-fluid > li {
	float: left;
}
.elgg-gallery-users > li {
	margin: 0 2px;
}

/* ***************************************
	Tables
*************************************** */
.elgg-table {
	width: 100%;
}
.elgg-table td, .elgg-table th {
	padding: 1rem 0;
}
.elgg-table th {
	font-weight: bold;
}
.elgg-table tr {
	border-bottom: 1px solid #ccc;
}
.elgg-table-alt {
	width: 100%;
}
.elgg-table-alt th {
	font-weight: bold;
	color: #000 !important;
}
.elgg-table-alt td, .elgg-table-alt th {
	padding: 1rem 0;
	-webkit-transition: color 0.2s ease, border 0.2s ease;
         -o-transition: color 0.2s ease, border 0.2s ease;
            transition: color 0.2s ease, border 0.2s ease;
}

.elgg-table-alt tr {
	border-bottom: 1px solid #ccc;
}
.elgg-table-alt tr:hover {
	color: #009ee3;
}

/* ***************************************
	Owner Block
*************************************** */
.elgg-owner-block {
	margin-bottom: 20px;
}

/* ***************************************
	Messages
*************************************** */
.elgg-message {
	color: white;
	font-weight: bold;
	display: block;
	padding: 3px 10px;
	cursor: pointer;
	opacity: 0.9;
	
	-webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45);
	-moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45);
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45);
	
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
}
.elgg-state-success {
	background-color: black;
}
.elgg-state-error {
	background-color: red;
}
.elgg-state-notice {
	background-color: #4690D6;
}

/* ***************************************
	River
*************************************** */
.elgg-list-river {
	
}
.elgg-list-river > li {
	
}
.elgg-river-item {
	padding: 7px 0;
}
.elgg-river-item .elgg-pict {
	margin-right: 20px;
}
.elgg-river-timestamp {
	color: #666;
	font-size: 85%;
	float: right;
	line-height: 1.2em;
}

.elgg-river-attachments,
.elgg-river-message,
.elgg-river-content {
	font-size: 85%;
	line-height: 1.5em;
	margin: 8px 0 5px 0;
	padding-left: 5px;
}
.elgg-river-attachments .elgg-avatar,
.elgg-river-attachments .elgg-icon {
	float: left;
}
.elgg-river-layout .elgg-input-dropdown {
	float: right;
	margin: 10px 0;
}

.elgg-river-comments-tab {
	display: block;
	background-color: #EEE;
	color: #4690D6;
	margin-top: 5px;
	width: auto;
	float: right;
	font-size: 85%;
	padding: 1px 7px;
	
	-webkit-border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0;
}

<?php //@todo components.php ?>
.elgg-river-comments {
	margin: 0;
	border-top: none;
}
.elgg-river-comments li:first-child {
	-webkit-border-radius: 5px 0 0;
	-moz-border-radius: 5px 0 0;
	border-radius: 5px 0 0;
}
.elgg-river-comments li:last-child {
	-webkit-border-radius: 0 0 5px 5px;
	-moz-border-radius-bottomleft: 0 0 5px 5px;
	border-radius-bottomleft: 0 0 5px 5px;
}
.elgg-river-comments li {
	background-color: #EEE;
	border-bottom: none;
	padding: 4px;
	margin-bottom: 2px;
}
.elgg-river-comments .elgg-media {
	padding: 0;
}
.elgg-river-more {
	background-color: #EEE;
	
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	
	padding: 2px 4px;
	font-size: 85%;
	margin-bottom: 2px;
}

<?php //@todo location-dependent styles ?>
.elgg-river-item form {
	background-color: #EEE;
	padding: 4px;
	
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	
	height: 30px;
}
.elgg-river-item input[type=text] {
	width: 80%;
}
.elgg-river-item input[type=submit] {
	margin: 0 0 0 10px;
}


/* **************************************
	Comments (from elgg_view_comments)
************************************** */
.elgg-comments {
	margin-top: 25px;
}
.elgg-comments > form {
	margin-top: 15px;
}

/* ***************************************
	Image-related
*************************************** */
.elgg-photo {
	border: 1px solid #ccc;
	padding: 3px;
	background-color: white;
}

/* ***************************************
	Tags
*************************************** */
.elgg-tags {
	font-size: 85%;
}
.elgg-tags > li {
	float:left;
	margin-right: 5px;
}
.elgg-tags li.elgg-tag:after {
	content: ",";
}
.elgg-tags li.elgg-tag:last-child:after {
	content: "";
}
.elgg-tagcloud {
	text-align: justify;
}

.elgg-tagcloud a {
	font-size: 1.6rem;
	color: #CCC;
	-webkit-transition: color 0.2s ease, border 0.2s ease;
	 -o-transition: color 0.2s ease, border 0.2s ease;
	    transition: color 0.2s ease, border 0.2s ease;
}

.elgg-tagcloud a:hover {
	color: #009ee3;
}

.elgg-tag a {
	font-size: 1.6rem;
	color: #CCC;
	-webkit-transition: color 0.2s ease, border 0.2s ease;
	 -o-transition: color 0.2s ease, border 0.2s ease;
	    transition: color 0.2s ease, border 0.2s ease;
}

.elgg-tag a:hover {
	color: #009ee3;
}