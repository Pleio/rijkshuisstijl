@-webkit-keyframes spin {
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spin {
  100% {
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
       transform: rotate(360deg);
  }
}
@keyframes spin {
  100% {
    -webkit-transform: rotate(360deg);
    -o-transform: rotate(360deg);
       transform: rotate(360deg);
  }
}
*,
*:after,
*:before {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}
*:focus {
  outline: none;
}
html {
  font-size: 10px;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -webkit-overflow-scrolling: touch;
  text-rendering: auto;
  -webkit-text-size-adjust: 100%;
  position: relative;
  width: 100%;
  height: 100%;
  margin: 0;
}
@media (min-width: 1681px) {
  html {
    font-size: 12px;
  }
}
body {
  position: relative;
  font-size: 1.8rem;
  line-height: 2.4rem;
  font-family: "ROsanswebtext_regular", sans-serif;
  color: #000;
  background-color: #fff;
  -webkit-overflow-scrolling: touch;
  width: 100%;
  min-height: 100%;
  margin: 0;
  -webkit-transition: 0.3s margin;
       -o-transition: 0.3s margin;
          transition: 0.3s margin;
  overflow-x: hidden;
}
body.landing,
body.end-results {
  background-color: #fff;
}
body.main-nav-search--open {
  height: 100%;
  overflow: hidden;
  top: 0;
  left: 0;
  position: fixed;
}
body.background-grey {
  background-color: #F3F3F3;
}
.ccm-toolbar-visible body {
  min-height: 100%;
  height: auto !important;
}
@media (max-width: 767px) {
  body.question-modal--open,
  body.video-block--is-open {
    height: 100%;
    overflow: hidden;
  }
}
img {
  max-width: 100%;
  border: none;
}
.relative {
  position: relative;
}
.float-right {
  float: right;
}
@font-face {
  font-family: 'ROsanswebtext_regular';
  src: url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-regular-webfont.eot'); ?>');
  src: url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-regular-webfont.eot?#iefix'); ?>') format('embedded-opentype'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-regular-webfont.woff2'); ?>') format('woff2'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-regular-webfont.woff'); ?>') format('woff'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-regular-webfont.ttf'); ?>') format('truetype'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-regular-webfont.svg#rijksoverheidsanswebtext_regular'); ?>') format('svg');
  font-weight: normal;
  font-style: normal;
}
@font-face {
  font-family: 'ROsanswebtext_bold';
  src: url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-bold-webfont.eot'); ?>');
  src: url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-bold-webfont.eot?#iefix'); ?>') format('embedded-opentype'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-bold-webfont.woff2'); ?>') format('woff2'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-bold-webfont.woff'); ?>') format('woff'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-bold-webfont.ttf'); ?>') format('truetype'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-bold-webfont.svg#rijksoverheidsanswebtext_bold'); ?>') format('svg');
  font-weight: normal;
  font-style: normal;
}
@font-face {
  font-family: 'ROsanswebtext_italic';
  src: url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-italic-webfont.eot'); ?>');
  src: url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-italic-webfont.eot?#iefix'); ?>') format('embedded-opentype'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-italic-webfont.woff2'); ?>') format('woff2'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-italic-webfont.woff'); ?>') format('woff'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-italic-webfont.ttf'); ?>') format('truetype'), url('<?php echo rijkshuisstijl_asset('font/rijksoverheidsanswebtext-italic-webfont.svg#rijksoverheidsanswebtext_italic'); ?>') format('svg');
  font-weight: normal;
  font-style: normal;
}
@font-face {
  font-family: 'pleio';
  src: url('<?php echo rijkshuisstijl_asset('font/icons/pleio.eot?4tthzi'); ?>');
  src: url('<?php echo rijkshuisstijl_asset('font/icons/pleio.eot?4tthzi#iefix'); ?>') format('embedded-opentype'), url('<?php echo rijkshuisstijl_asset('font/icons/pleio.woff2?4tthzi'); ?>') format('woff2'), url('<?php echo rijkshuisstijl_asset('font/icons/pleio.ttf?4tthzi'); ?>') format('truetype'), url('<?php echo rijkshuisstijl_asset('font/icons/pleio.woff?4tthzi'); ?>') format('woff'), url('<?php echo rijkshuisstijl_asset('font/icons/pleio.svg?4tthzi#icons/pleio'); ?>') format('svg');
  font-weight: normal;
  font-style: normal;
}
[class^="icon-"],
[class*=" icon-"] {
  /* use !important to prevent issues with browser extensions that change fonts */
  font-family: 'pleio' !important;
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.icon-mobile-menu:before {
  content: "\e920";
}
.icon-angle-left:before {
  content: "\e900";
}
.icon-angle-right:before {
  content: "\e901";
}
.icon-angle-up:before {
  content: "\e902";
}
.icon-angle-down:before {
  content: "\e903";
}
.icon-pencil:before {
  content: "\e904";
}
.icon-camera:before {
  content: "\e905";
}
.icon-eye:before {
  content: "\e906";
}
.icon-chatbox:before {
  content: "\e907";
}
.icon-community:before {
  content: "\e908";
}
.icon-chat-boxes:before {
  content: "\e909";
}
.icon-arrow-right-circle:before {
  content: "\e90a";
}
.icon-arrow-right:before {
  content: "\e90b";
}
.icon-checkmark-circle:before {
  content: "\e90c";
}
.icon-chevron-down:before {
  content: "\e90d";
}
.icon-chevron-left:before {
  content: "\e90e";
}
.icon-chevron-right:before {
  content: "\e90f";
}
.icon-chevron-up:before {
  content: "\e910";
}
.icon-cross:before {
  content: "\e911";
}
.icon-download:before {
  content: "\e912";
}
.icon-envelope:before {
  content: "\e913";
}
.icon-facebook:before {
  content: "\e914";
}
.icon-flip-circle:before {
  content: "\e915";
}
.icon-flip:before {
  content: "\e916";
}
.icon-google-plus:before {
  content: "\e917";
}
.icon-help:before {
  content: "\e918";
}
.icon-linked-in:before {
  content: "\e919";
}
.icon-play:before {
  content: "\e91a";
}
.icon-print:before {
  content: "\e91b";
}
.icon-question-mark:before {
  content: "\e91c";
}
.icon-search:before {
  content: "\e91d";
}
.icon-share:before {
  content: "\e91e";
}
.icon-twitter:before {
  content: "\e91f";
}
.last-section {
  padding-bottom: 5.2rem !important;
}
@media (max-width: 767px) {
  .hidden-mobile {
    display: none;
  }
}
p {
  margin: 0 0 2rem 0;
}
h1,
h2,
h3,
h4,
h5,
h6,
strong {
  font-family: "ROsanswebtext_bold", sans-serif;
  font-weight: 400;
}
.print-header {
  display: none;
}
@media print {
  html {
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
  * {
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
  }
  @page {
    size: A4;
  }
  @page :first {
    margin-top: 0;
  }
  html,
  body {
    width: 210mm;
    height: auto;
    background-color: white;
  }
  body {
    padding: 0 25mm;
    font-family: "ROsanswebtext_regular", sans-serif;
    font-size: 11pt;
    line-height: 14pt;
  }
  h2,
  h3,
  h4 {
    font-family: "ROsanswebtext_bold", sans-serif;
    font-weight: normal;
    font-size: 15pt;
    line-height: 19pt;
  }
  p {
    margin-bottom: 11pt;
  }
  /*!
   *  Print header
   */
  .print-header {
    display: block;
    height: 78mm;
  }
  .print-header img {
    position: relative;
    left: 73.5mm;
    width: 40.758mm;
    height: auto;
  }
  /*!
   *  Page Styling
   */
  .header,
  .lead,
  .footer,
  .top-navigation,
  .main-navigation,
  .featured-pages,
  .content-page__share,
  .main-articles,
  .check-filter,
  .results-content__controls {
    display: none;
  }
  .content-page {
    padding: 0 !important;
  }
  .container {
    width: auto;
    max-width: 100%;
  }
  div[class*='col-'] {
    width: 100% !important;
    margin: 0 !important;
    float: none !important;
    clear: both;
  }
  .content-page__title {
    font-size: 24pt;
    line-height: 30pt;
  }
}
@media (min-width: 768px) {
  .pull-right {
    float: right !important;
  }
}
.selecter {
  max-width: 100% !important;
  margin: 0 !important;
}
.news .selecter {
  margin-bottom: 1rem !important;
}
@media (min-width: 768px) {
  .news .selecter {
    margin-bottom: 0 !important;
  }
}
span.selecter-selected {
  -webkit-box-shadow: none !important;
          box-shadow: none !important;
  padding: 0.6rem 3rem 0.6rem 2rem !important;
  font-size: 1.6rem !important;
  line-height: 3.2rem;
  border-radius: 0 !important;
  min-height: 4.6rem;
}
span.selecter-selected:after {
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
.selecter.open span.selecter-selected {
  border-radius: 0;
  -webkit-box-shadow: none !important;
          box-shadow: none !important;
  border: none;
}
.selecter-options {
  border-radius: 0 !important;
  max-height: none !important;
  -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2) !important;
          box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2) !important;
  padding: 0.6rem 0 !important;
  border: 1px solid #fff !important;
  top: 0 !important;
  z-index: 60 !important;
}
.selecter-options:after {
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
.selecter-item {
  font-size: 1.6rem !important;
  line-height: 3.2rem !important;
  padding: 0 2rem !important;
  border: none !important;
}
.selecter-item:hover {
  color: #009ee3 !important;
  background-color: transparent !important;
}
.selecter-item.selected {
  color: #B4B4B4 !important;
  background-color: #fff !important;
}
.selecter.open .selecter-selected {
  color: #B4B4B4 !important;
}
/*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */
html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}
body {
  margin: 0;
}
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
menu,
nav,
section,
summary {
  display: block;
}
audio,
canvas,
progress,
video {
  display: inline-block;
  vertical-align: baseline;
}
audio:not([controls]) {
  display: none;
  height: 0;
}
[hidden],
template {
  display: none;
}
a {
  background-color: transparent;
}
a:active,
a:hover {
  outline: 0;
}
abbr[title] {
  border-bottom: 1px dotted;
}
dfn {
  font-style: italic;
}
h1 {
  font-size: 2em;
  margin: 0.67em 0;
}
mark {
  background: #ff0;
  color: #000;
}
small {
  font-size: 80%;
}
sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}
sup {
  top: -0.5em;
}
sub {
  bottom: -0.25em;
}
img {
  border: 0;
}
svg:not(:root) {
  overflow: hidden;
}
figure {
  margin: 1em 40px;
}
hr {
  -webkit-box-sizing: content-box;
          box-sizing: content-box;
  height: 0;
}
pre {
  overflow: auto;
}
code,
kbd,
pre,
samp {
  font-family: monospace, monospace;
  font-size: 1em;
}
button,
input,
optgroup,
select,
textarea {
  color: inherit;
  font: inherit;
  margin: 0;
}
button {
  overflow: visible;
}
button,
select {
  text-transform: none;
}
button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
  -webkit-appearance: button;
  cursor: pointer;
}
button[disabled],
html input[disabled] {
  cursor: default;
}
button::-moz-focus-inner,
input::-moz-focus-inner {
  border: 0;
  padding: 0;
}
input {
  line-height: normal;
}
input[type="checkbox"],
input[type="radio"] {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  padding: 0;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  height: auto;
}
input[type="search"] {
  -webkit-appearance: textfield;
  -webkit-box-sizing: content-box;
          box-sizing: content-box;
}
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}
fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em;
}
legend {
  border: 0;
  padding: 0;
}
textarea {
  overflow: auto;
}
optgroup {
  font-weight: bold;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}
td,
th {
  padding: 0;
}
.container {
  margin-right: auto;
  margin-left: auto;
  padding-left: 2rem;
  padding-right: 2rem;
  max-width: 102.4rem;
}
.container:before,
.container:after {
  content: " ";
  display: table;
}
.container:after {
  clear: both;
}
.container-fluid {
  margin-right: auto;
  margin-left: auto;
  padding-left: 2rem;
  padding-right: 2rem;
  max-width: 102.4rem;
}
.container-fluid:before,
.container-fluid:after {
  content: " ";
  display: table;
}
.container-fluid:after {
  clear: both;
}
.row {
  margin-left: -1rem;
  margin-right: -1rem;
}
.row:before,
.row:after {
  content: " ";
  display: table;
}
.row:after {
  clear: both;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xl-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xl-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xl-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xl-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xl-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xl-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xl-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xl-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xl-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xl-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xl-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12, .col-xl-12 {
  position: relative;
  min-height: 1px;
  padding-left: 1rem;
  padding-right: 1rem;
}
.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
  float: left;
}
.col-xs-12 {
  width: 100%;
}
.col-xs-11 {
  width: 91.66666667%;
}
.col-xs-10 {
  width: 83.33333333%;
}
.col-xs-9 {
  width: 75%;
}
.col-xs-8 {
  width: 66.66666667%;
}
.col-xs-7 {
  width: 58.33333333%;
}
.col-xs-6 {
  width: 50%;
}
.col-xs-5 {
  width: 41.66666667%;
}
.col-xs-4 {
  width: 33.33333333%;
}
.col-xs-3 {
  width: 25%;
}
.col-xs-2 {
  width: 16.66666667%;
}
.col-xs-1 {
  width: 8.33333333%;
}
.col-xs-pull-12 {
  right: 100%;
}
.col-xs-pull-11 {
  right: 91.66666667%;
}
.col-xs-pull-10 {
  right: 83.33333333%;
}
.col-xs-pull-9 {
  right: 75%;
}
.col-xs-pull-8 {
  right: 66.66666667%;
}
.col-xs-pull-7 {
  right: 58.33333333%;
}
.col-xs-pull-6 {
  right: 50%;
}
.col-xs-pull-5 {
  right: 41.66666667%;
}
.col-xs-pull-4 {
  right: 33.33333333%;
}
.col-xs-pull-3 {
  right: 25%;
}
.col-xs-pull-2 {
  right: 16.66666667%;
}
.col-xs-pull-1 {
  right: 8.33333333%;
}
.col-xs-pull-0 {
  right: auto;
}
.col-xs-push-12 {
  left: 100%;
}
.col-xs-push-11 {
  left: 91.66666667%;
}
.col-xs-push-10 {
  left: 83.33333333%;
}
.col-xs-push-9 {
  left: 75%;
}
.col-xs-push-8 {
  left: 66.66666667%;
}
.col-xs-push-7 {
  left: 58.33333333%;
}
.col-xs-push-6 {
  left: 50%;
}
.col-xs-push-5 {
  left: 41.66666667%;
}
.col-xs-push-4 {
  left: 33.33333333%;
}
.col-xs-push-3 {
  left: 25%;
}
.col-xs-push-2 {
  left: 16.66666667%;
}
.col-xs-push-1 {
  left: 8.33333333%;
}
.col-xs-push-0 {
  left: auto;
}
.col-xs-offset-12 {
  margin-left: 100%;
}
.col-xs-offset-11 {
  margin-left: 91.66666667%;
}
.col-xs-offset-10 {
  margin-left: 83.33333333%;
}
.col-xs-offset-9 {
  margin-left: 75%;
}
.col-xs-offset-8 {
  margin-left: 66.66666667%;
}
.col-xs-offset-7 {
  margin-left: 58.33333333%;
}
.col-xs-offset-6 {
  margin-left: 50%;
}
.col-xs-offset-5 {
  margin-left: 41.66666667%;
}
.col-xs-offset-4 {
  margin-left: 33.33333333%;
}
.col-xs-offset-3 {
  margin-left: 25%;
}
.col-xs-offset-2 {
  margin-left: 16.66666667%;
}
.col-xs-offset-1 {
  margin-left: 8.33333333%;
}
.col-xs-offset-0 {
  margin-left: 0%;
}
@media (min-width: 680px) {
  .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
    float: left;
  }
  .col-sm-12 {
    width: 100%;
  }
  .col-sm-11 {
    width: 91.66666667%;
  }
  .col-sm-10 {
    width: 83.33333333%;
  }
  .col-sm-9 {
    width: 75%;
  }
  .col-sm-8 {
    width: 66.66666667%;
  }
  .col-sm-7 {
    width: 58.33333333%;
  }
  .col-sm-6 {
    width: 50%;
  }
  .col-sm-5 {
    width: 41.66666667%;
  }
  .col-sm-4 {
    width: 33.33333333%;
  }
  .col-sm-3 {
    width: 25%;
  }
  .col-sm-2 {
    width: 16.66666667%;
  }
  .col-sm-1 {
    width: 8.33333333%;
  }
  .col-sm-pull-12 {
    right: 100%;
  }
  .col-sm-pull-11 {
    right: 91.66666667%;
  }
  .col-sm-pull-10 {
    right: 83.33333333%;
  }
  .col-sm-pull-9 {
    right: 75%;
  }
  .col-sm-pull-8 {
    right: 66.66666667%;
  }
  .col-sm-pull-7 {
    right: 58.33333333%;
  }
  .col-sm-pull-6 {
    right: 50%;
  }
  .col-sm-pull-5 {
    right: 41.66666667%;
  }
  .col-sm-pull-4 {
    right: 33.33333333%;
  }
  .col-sm-pull-3 {
    right: 25%;
  }
  .col-sm-pull-2 {
    right: 16.66666667%;
  }
  .col-sm-pull-1 {
    right: 8.33333333%;
  }
  .col-sm-pull-0 {
    right: auto;
  }
  .col-sm-push-12 {
    left: 100%;
  }
  .col-sm-push-11 {
    left: 91.66666667%;
  }
  .col-sm-push-10 {
    left: 83.33333333%;
  }
  .col-sm-push-9 {
    left: 75%;
  }
  .col-sm-push-8 {
    left: 66.66666667%;
  }
  .col-sm-push-7 {
    left: 58.33333333%;
  }
  .col-sm-push-6 {
    left: 50%;
  }
  .col-sm-push-5 {
    left: 41.66666667%;
  }
  .col-sm-push-4 {
    left: 33.33333333%;
  }
  .col-sm-push-3 {
    left: 25%;
  }
  .col-sm-push-2 {
    left: 16.66666667%;
  }
  .col-sm-push-1 {
    left: 8.33333333%;
  }
  .col-sm-push-0 {
    left: auto;
  }
  .col-sm-offset-12 {
    margin-left: 100%;
  }
  .col-sm-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-sm-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-sm-offset-9 {
    margin-left: 75%;
  }
  .col-sm-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-sm-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-sm-offset-6 {
    margin-left: 50%;
  }
  .col-sm-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-sm-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-sm-offset-3 {
    margin-left: 25%;
  }
  .col-sm-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-sm-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-sm-offset-0 {
    margin-left: 0%;
  }
}
@media (min-width: 768px) {
  .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: left;
  }
  .col-md-12 {
    width: 100%;
  }
  .col-md-11 {
    width: 91.66666667%;
  }
  .col-md-10 {
    width: 83.33333333%;
  }
  .col-md-9 {
    width: 75%;
  }
  .col-md-8 {
    width: 66.66666667%;
  }
  .col-md-7 {
    width: 58.33333333%;
  }
  .col-md-6 {
    width: 50%;
  }
  .col-md-5 {
    width: 41.66666667%;
  }
  .col-md-4 {
    width: 33.33333333%;
  }
  .col-md-3 {
    width: 25%;
  }
  .col-md-2 {
    width: 16.66666667%;
  }
  .col-md-1 {
    width: 8.33333333%;
  }
  .col-md-pull-12 {
    right: 100%;
  }
  .col-md-pull-11 {
    right: 91.66666667%;
  }
  .col-md-pull-10 {
    right: 83.33333333%;
  }
  .col-md-pull-9 {
    right: 75%;
  }
  .col-md-pull-8 {
    right: 66.66666667%;
  }
  .col-md-pull-7 {
    right: 58.33333333%;
  }
  .col-md-pull-6 {
    right: 50%;
  }
  .col-md-pull-5 {
    right: 41.66666667%;
  }
  .col-md-pull-4 {
    right: 33.33333333%;
  }
  .col-md-pull-3 {
    right: 25%;
  }
  .col-md-pull-2 {
    right: 16.66666667%;
  }
  .col-md-pull-1 {
    right: 8.33333333%;
  }
  .col-md-pull-0 {
    right: auto;
  }
  .col-md-push-12 {
    left: 100%;
  }
  .col-md-push-11 {
    left: 91.66666667%;
  }
  .col-md-push-10 {
    left: 83.33333333%;
  }
  .col-md-push-9 {
    left: 75%;
  }
  .col-md-push-8 {
    left: 66.66666667%;
  }
  .col-md-push-7 {
    left: 58.33333333%;
  }
  .col-md-push-6 {
    left: 50%;
  }
  .col-md-push-5 {
    left: 41.66666667%;
  }
  .col-md-push-4 {
    left: 33.33333333%;
  }
  .col-md-push-3 {
    left: 25%;
  }
  .col-md-push-2 {
    left: 16.66666667%;
  }
  .col-md-push-1 {
    left: 8.33333333%;
  }
  .col-md-push-0 {
    left: auto;
  }
  .col-md-offset-12 {
    margin-left: 100%;
  }
  .col-md-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-md-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-md-offset-9 {
    margin-left: 75%;
  }
  .col-md-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-md-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-md-offset-6 {
    margin-left: 50%;
  }
  .col-md-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-md-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-md-offset-3 {
    margin-left: 25%;
  }
  .col-md-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-md-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-md-offset-0 {
    margin-left: 0%;
  }
}
@media (min-width: 1024px) {
  .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
    float: left;
  }
  .col-lg-12 {
    width: 100%;
  }
  .col-lg-11 {
    width: 91.66666667%;
  }
  .col-lg-10 {
    width: 83.33333333%;
  }
  .col-lg-9 {
    width: 75%;
  }
  .col-lg-8 {
    width: 66.66666667%;
  }
  .col-lg-7 {
    width: 58.33333333%;
  }
  .col-lg-6 {
    width: 50%;
  }
  .col-lg-5 {
    width: 41.66666667%;
  }
  .col-lg-4 {
    width: 33.33333333%;
  }
  .col-lg-3 {
    width: 25%;
  }
  .col-lg-2 {
    width: 16.66666667%;
  }
  .col-lg-1 {
    width: 8.33333333%;
  }
  .col-lg-pull-12 {
    right: 100%;
  }
  .col-lg-pull-11 {
    right: 91.66666667%;
  }
  .col-lg-pull-10 {
    right: 83.33333333%;
  }
  .col-lg-pull-9 {
    right: 75%;
  }
  .col-lg-pull-8 {
    right: 66.66666667%;
  }
  .col-lg-pull-7 {
    right: 58.33333333%;
  }
  .col-lg-pull-6 {
    right: 50%;
  }
  .col-lg-pull-5 {
    right: 41.66666667%;
  }
  .col-lg-pull-4 {
    right: 33.33333333%;
  }
  .col-lg-pull-3 {
    right: 25%;
  }
  .col-lg-pull-2 {
    right: 16.66666667%;
  }
  .col-lg-pull-1 {
    right: 8.33333333%;
  }
  .col-lg-pull-0 {
    right: auto;
  }
  .col-lg-push-12 {
    left: 100%;
  }
  .col-lg-push-11 {
    left: 91.66666667%;
  }
  .col-lg-push-10 {
    left: 83.33333333%;
  }
  .col-lg-push-9 {
    left: 75%;
  }
  .col-lg-push-8 {
    left: 66.66666667%;
  }
  .col-lg-push-7 {
    left: 58.33333333%;
  }
  .col-lg-push-6 {
    left: 50%;
  }
  .col-lg-push-5 {
    left: 41.66666667%;
  }
  .col-lg-push-4 {
    left: 33.33333333%;
  }
  .col-lg-push-3 {
    left: 25%;
  }
  .col-lg-push-2 {
    left: 16.66666667%;
  }
  .col-lg-push-1 {
    left: 8.33333333%;
  }
  .col-lg-push-0 {
    left: auto;
  }
  .col-lg-offset-12 {
    margin-left: 100%;
  }
  .col-lg-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-lg-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-lg-offset-9 {
    margin-left: 75%;
  }
  .col-lg-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-lg-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-lg-offset-6 {
    margin-left: 50%;
  }
  .col-lg-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-lg-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-lg-offset-3 {
    margin-left: 25%;
  }
  .col-lg-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-lg-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-lg-offset-0 {
    margin-left: 0%;
  }
}
@media (min-width: 1681px) {
  .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12 {
    float: left;
  }
  .col-xl-12 {
    width: 100%;
  }
  .col-xl-11 {
    width: 91.66666667%;
  }
  .col-xl-10 {
    width: 83.33333333%;
  }
  .col-xl-9 {
    width: 75%;
  }
  .col-xl-8 {
    width: 66.66666667%;
  }
  .col-xl-7 {
    width: 58.33333333%;
  }
  .col-xl-6 {
    width: 50%;
  }
  .col-xl-5 {
    width: 41.66666667%;
  }
  .col-xl-4 {
    width: 33.33333333%;
  }
  .col-xl-3 {
    width: 25%;
  }
  .col-xl-2 {
    width: 16.66666667%;
  }
  .col-xl-1 {
    width: 8.33333333%;
  }
  .col-xl-pull-12 {
    right: 100%;
  }
  .col-xl-pull-11 {
    right: 91.66666667%;
  }
  .col-xl-pull-10 {
    right: 83.33333333%;
  }
  .col-xl-pull-9 {
    right: 75%;
  }
  .col-xl-pull-8 {
    right: 66.66666667%;
  }
  .col-xl-pull-7 {
    right: 58.33333333%;
  }
  .col-xl-pull-6 {
    right: 50%;
  }
  .col-xl-pull-5 {
    right: 41.66666667%;
  }
  .col-xl-pull-4 {
    right: 33.33333333%;
  }
  .col-xl-pull-3 {
    right: 25%;
  }
  .col-xl-pull-2 {
    right: 16.66666667%;
  }
  .col-xl-pull-1 {
    right: 8.33333333%;
  }
  .col-xl-pull-0 {
    right: auto;
  }
  .col-xl-push-12 {
    left: 100%;
  }
  .col-xl-push-11 {
    left: 91.66666667%;
  }
  .col-xl-push-10 {
    left: 83.33333333%;
  }
  .col-xl-push-9 {
    left: 75%;
  }
  .col-xl-push-8 {
    left: 66.66666667%;
  }
  .col-xl-push-7 {
    left: 58.33333333%;
  }
  .col-xl-push-6 {
    left: 50%;
  }
  .col-xl-push-5 {
    left: 41.66666667%;
  }
  .col-xl-push-4 {
    left: 33.33333333%;
  }
  .col-xl-push-3 {
    left: 25%;
  }
  .col-xl-push-2 {
    left: 16.66666667%;
  }
  .col-xl-push-1 {
    left: 8.33333333%;
  }
  .col-xl-push-0 {
    left: auto;
  }
  .col-xl-offset-12 {
    margin-left: 100%;
  }
  .col-xl-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-xl-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-xl-offset-9 {
    margin-left: 75%;
  }
  .col-xl-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-xl-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-xl-offset-6 {
    margin-left: 50%;
  }
  .col-xl-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-xl-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-xl-offset-3 {
    margin-left: 25%;
  }
  .col-xl-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-xl-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-xl-offset-0 {
    margin-left: 0%;
  }
}
@-ms-viewport {
  width: device-width;
}
.visible-xs,
.visible-sm,
.visible-md,
.visible-lg,
.visible-xl {
  display: none !important;
}
.visible-xs-block,
.visible-xs-inline,
.visible-xs-inline-block,
.visible-sm-block,
.visible-sm-inline,
.visible-sm-inline-block,
.visible-md-block,
.visible-md-inline,
.visible-md-inline-block,
.visible-lg-block,
.visible-lg-inline,
.visible-lg-inline-block,
.visible-xl-block,
.visible-xl-inline,
.visible-xl-inline-block {
  display: none !important;
}
@media (max-width: 320px) {
  .visible-xs {
    display: block !important;
  }
  table.visible-xs {
    display: table !important;
  }
  tr.visible-xs {
    display: table-row !important;
  }
  th.visible-xs,
  td.visible-xs {
    display: table-cell !important;
  }
}
@media (max-width: 320px) {
  .visible-xs-block {
    display: block !important;
  }
}
@media (max-width: 320px) {
  .visible-xs-inline {
    display: inline !important;
  }
}
@media (max-width: 320px) {
  .visible-xs-inline-block {
    display: inline-block !important;
  }
}
@media (min-width: 680px) and (max-width: 767px) {
  .visible-sm {
    display: block !important;
  }
  table.visible-sm {
    display: table !important;
  }
  tr.visible-sm {
    display: table-row !important;
  }
  th.visible-sm,
  td.visible-sm {
    display: table-cell !important;
  }
}
@media (min-width: 680px) and (max-width: 767px) {
  .visible-sm-block {
    display: block !important;
  }
}
@media (min-width: 680px) and (max-width: 767px) {
  .visible-sm-inline {
    display: inline !important;
  }
}
@media (min-width: 680px) and (max-width: 767px) {
  .visible-sm-inline-block {
    display: inline-block !important;
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .visible-md {
    display: block !important;
  }
  table.visible-md {
    display: table !important;
  }
  tr.visible-md {
    display: table-row !important;
  }
  th.visible-md,
  td.visible-md {
    display: table-cell !important;
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .visible-md-block {
    display: block !important;
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .visible-md-inline {
    display: inline !important;
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .visible-md-inline-block {
    display: inline-block !important;
  }
}
@media (min-width: 1024px) and (max-width: 1680px) {
  .visible-lg {
    display: block !important;
  }
  table.visible-lg {
    display: table !important;
  }
  tr.visible-lg {
    display: table-row !important;
  }
  th.visible-lg,
  td.visible-lg {
    display: table-cell !important;
  }
}
@media (min-width: 1024px) and (max-width: 1680px) {
  .visible-lg-block {
    display: block !important;
  }
}
@media (min-width: 1024px) and (max-width: 1680px) {
  .visible-lg-inline {
    display: inline !important;
  }
}
@media (min-width: 1024px) and (max-width: 1680px) {
  .visible-lg-inline-block {
    display: inline-block !important;
  }
}
@media (min-width: 1681px) {
  .visible-xl {
    display: block !important;
  }
  table.visible-xl {
    display: table !important;
  }
  tr.visible-xl {
    display: table-row !important;
  }
  th.visible-xl,
  td.visible-xl {
    display: table-cell !important;
  }
}
@media (min-width: 1681px) {
  .visible-xl-block {
    display: block !important;
  }
}
@media (min-width: 1681px) {
  .visible-xl-inline {
    display: inline !important;
  }
}
@media (min-width: 1681px) {
  .visible-xl-inline-block {
    display: inline-block !important;
  }
}
@media (max-width: 679px) {
  .hidden-xs {
    display: none !important;
  }
}
@media (min-width: 680px) and (max-width: 767px) {
  .hidden-sm {
    display: none !important;
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .hidden-md {
    display: none !important;
  }
}
@media (min-width: 1024px) and (max-width: 1680px) {
  .hidden-lg {
    display: none !important;
  }
}
@media (min-width: 1681px) {
  .hidden-xl {
    display: none !important;
  }
}
.visible-print {
  display: none !important;
}
@media print {
  .visible-print {
    display: block !important;
  }
  table.visible-print {
    display: table !important;
  }
  tr.visible-print {
    display: table-row !important;
  }
  th.visible-print,
  td.visible-print {
    display: table-cell !important;
  }
}
.visible-print-block {
  display: none !important;
}
@media print {
  .visible-print-block {
    display: block !important;
  }
}
.visible-print-inline {
  display: none !important;
}
@media print {
  .visible-print-inline {
    display: inline !important;
  }
}
.visible-print-inline-block {
  display: none !important;
}
@media print {
  .visible-print-inline-block {
    display: inline-block !important;
  }
}
@media print {
  .hidden-print {
    display: none !important;
  }
}
/* 
 * Selecter v3.2.4 - 2015-01-07 
 * A jQuery plugin for replacing default select elements. Part of the Formstone Library. 
 * http://formstone.it/selecter/ 
 * 
 * Copyright 2015 Ben Plum; MIT Licensed 
 */
.selecter {
  position: relative;
  display: block;
  margin: 10px 0;
  z-index: 1;
  max-width: 30%;
}
.selecter:focus {
  -webkit-box-shadow: none;
          box-shadow: none;
  outline: none;
}
.selecter,
.selecter * {
  -webkit-user-select: none !important;
  -moz-user-select: none !important;
  -ms-user-select: none !important;
  user-select: none !important;
}
.selecter,
.selecter *,
.selecter *:before,
.selecter *:after {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}
.selecter-element {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  opacity: 0;
  z-index: -1;
}
.selecter-element,
.selecter-element:focus {
  outline: none;
  -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
  -webkit-tap-highlight-color: transparent;
}
.no-opacity .selecter-element {
  left: -999999px;
}
.selecter-selected {
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
.selecter-selected:after {
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
.no-touch .selecter-selected:hover {
  color: #333333;
}
.no-touch .selecter.disabled .selecter-selected:hover {
  color: #cccccc;
}
.selecter-options {
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
.selecter-options.scroller {
  position: absolute;
}
.no-opacity .selecter-options {
  width: auto;
}
.selecter-group {
  border-bottom: 1px solid #cccccc;
  color: #999999;
  display: block;
  font-size: 11px;
  padding: 10px 15px;
  text-transform: uppercase;
}
.selecter-item {
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
.selecter-item.placeholder {
  display: none;
}
.selecter-item.selected {
  background: #eeeeee;
}
.selecter-item.disabled {
  color: #999999;
  cursor: default;
}
.selecter-item:first-child {
  border-radius: 0;
}
.selecter-item:last-child {
  border-bottom: 0;
  border-radius: 0 0 2px 2px;
}
.no-touch .selecter-item:hover,
.no-touch .selecter-item.selected:hover {
  color: #333333;
  background-color: #cccccc;
}
.selecter-item.disabled,
.no-touch .selecter-item.disabled:hover {
  color: #cccccc;
  background-color: #ffffff;
}
.selecter.open {
  z-index: 3;
}
.selecter.open .selecter-selected {
  z-index: 51;
  border-radius: 3px 3px 0 0;
}
.selecter.open .selecter-selected,
.selecter.focus .selecter-selected {
  background-color: #ffffff;
  -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
          box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.selecter.cover .selecter-options {
  border-width: 1px;
  top: 0;
  border-radius: 3px;
}
.selecter.cover .selecter-options .selecter-item.first {
  border-radius: 3px 3px 0 0;
}
.selecter.cover.open .selecter-selected {
  z-index: 49;
  border-radius: 3px 3px 0 0;
}
.selecter.bottom .selecter-options {
  top: auto;
  bottom: 100%;
  border-width: 1px 1px 0;
}
.selecter.bottom .selecter-item:last-child {
  border: none;
}
.selecter.bottom.open .selecter-selected {
  border-radius: 0 0 3px 3px;
}
.selecter.bottom.open .selecter-options {
  border-radius: 3px 3px 0 0;
}
.selecter.bottom .cover .selecter-options {
  top: auto;
  bottom: 0;
}
.selecter.bottom .cover.open .selecter-selected {
  border-radius: 3px;
}
.selecter.bottom .cover.open .selecter-options {
  border-radius: 3px;
}
.selecter.multiple .selecter-options {
  width: 100%;
  position: static;
  border-width: 1px;
  display: block;
  border-radius: 3px;
  -webkit-box-shadow: none;
          box-shadow: none;
}
.selecter.disabled .selecter-selected {
  background: #ffffff;
  border-color: #cccccc;
  color: #cccccc;
  cursor: default;
}
.selecter.disabled .selecter-options {
  background: #ffffff;
  border-color: #cccccc;
}
.selecter.disabled .selecter-group,
.selecter.disabled .selecter-item {
  border-color: #cccccc;
  color: #cccccc;
  cursor: default;
}
.selecter.disabled .selecter-item.selected,
.no-touch .selecter.disabled .selecter-item.selected:hover {
  background: #fafafa;
}
.selecter.disabled .selecter-item,
.no-touch .selecter.disabled .selecter-item:hover {
  color: #cccccc;
  background-color: #ffffff;
}
.selecter-options.scroller {
  overflow: hidden;
}
.selecter-options.scroller .scroller-content {
  max-height: 260px;
  padding: 0;
}
@media screen and (max-width: 740px) {
  .selecter {
    max-width: 40%;
  }
}
@media screen and (max-width: 500px) {
  .selecter {
    max-width: 100%;
  }
}
.top-navigation {
  display: none;
  background-color: #F3F3F3;
  position: relative;
  z-index: 21;
}
@media (min-width: 1024px) {
  .top-navigation {
    display: block;
  }
}
.top-navigation__link {
  line-height: 3rem;
  display: inline-block;
  margin-left: 2rem;
  font-size: 1.4rem;
  color: #535353;
  text-decoration: none;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
  position: relative;
}
.top-navigation__link:hover {
  color: #000;
}
.top-navigation__link:first-child {
  margin-left: 0;
}
.top-navigation__link--left:after {
  content: "\e903";
  font-family: "pleio";
  position: absolute;
  font-size: 0.9rem;
  padding-left: 0.5rem;
  margin-top: 0.1rem;
  pointer-events: none;
  -webkit-transition: -webkit-transform 0.2s ease, margin-top 0.2s ease;
       -o-transition: -o-transform 0.2s ease, margin-top 0.2s ease;
          transition: transform 0.2s ease, margin-top 0.2s ease;
}
.dropdown:hover .top-navigation__link--left:after {
  -webkit-transform: scaleY(-1);
      -ms-transform: scaleY(-1);
       -o-transform: scaleY(-1);
          transform: scaleY(-1);
  margin-top: -0.2rem;
}
.top-navigation__link--right {
  float: right;
}
.top-navigation__link--right img {
  max-width: 2.2rem;
  border-radius: 50%;
  position: absolute;
  top: 0.4rem;
  -webkit-transition: -webkit-transform 0.25s ease;
       -o-transition: -o-transform 0.25s ease;
          transition: transform 0.25s ease;
  margin-left: -2.8rem;
}
.main-navigation {
  position: relative;
  background-color: #8FCAE7;
}
@media (min-width: 1024px) {
  .main-navigation {
    z-index: 20;
  }
}
.main-navigation__link {
  display: block;
  font-size: 1.8rem;
  line-height: 4.3rem;
  color: #000;
  padding: 0.2rem 2rem 0;
  position: relative;
  text-decoration: none;
  -webkit-transition: background-color 0.2s ease, color 0.2s ease, -webkit-transform 0.2s;
       -o-transition: background-color 0.2s ease, color 0.2s ease, -o-transform 0.2s;
          transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s;
  font-family: "ROsanswebtext_bold", sans-serif;
}
@media (max-width: 1023px) {
  .mobile-sub-open .main-navigation__link {
    -webkit-transform: translate(-100%, 0);
        -ms-transform: translate(-100%, 0);
         -o-transform: translate(-100%, 0);
            transform: translate(-100%, 0);
  }
  .main-navigation__link.active {
    color: #009ee3;
  }
}
@media (min-width: 768px) {
  .main-navigation__link {
    line-height: 4.3rem;
    padding-top: 0.2rem;
  }
}
@media (min-width: 1024px) {
  .main-navigation__link {
    float: left;
  }
  .main-navigation__link:hover {
    background-color: rgba(221, 239, 248, 0.5);
  }
  .main-navigation__link.active {
    background-color: #DDEFF8;
  }
  .mobile-sub-open .main-navigation__link {
    margin-left: 0;
  }
}
@media (max-width: 1023px) {
  .main-navigation__link {
    font-size: 1.6rem;
    line-height: 3.8rem;
    padding: 0.2rem 2rem 0;
  }
  .main-navigation__link.main-navigation__link--search {
    line-height: 4.3rem;
  }
  .mobile-navigation .main-navigation__link {
    font-family: "ROsanswebtext_regular", sans-serif;
    line-height: 3rem;
    padding: 0 2rem;
  }
  .main-navigation__link.home-link {
    font-family: "ROsanswebtext_bold", sans-serif;
    line-height: 3.8rem;
    padding: 0.2rem 2rem 0;
    margin-bottom: 1.4rem;
  }
}
@media (max-width: 767px) {
  .main-navigation__link.main-navigation__link--search {
    line-height: 3.8rem;
  }
}
.main-navigation__link--search {
  float: right;
  padding: 0.2rem 1rem 0 1rem;
}
@media (min-width: 680px) {
  .main-navigation__link--search {
    float: right;
    width: auto;
    padding: 0.2rem 1rem 0;
  }
}
.main-navigation__link--search__icon {
  font-size: 1.3rem;
  line-height: 1;
  position: relative;
}
@media (min-width: 680px) {
  .main-navigation__link--search__icon {
    font-size: 1.3rem;
    top: -0.1rem;
    margin-right: 0.4rem;
  }
}
@media (min-width: 1681px) {
  .main-navigation__link--search__icon {
    top: 0;
  }
}
.main-navigation__link__text {
  display: none;
}
@media (min-width: 680px) {
  .main-navigation__link__text {
    display: inline-block;
  }
}
@media (min-width: 1024px) {
  .main-navigation-dropdown {
    padding-right: 3.4rem;
    display: block;
  }
  .main-navigation-dropdown:after {
    content: "\e90d";
    font-family: "pleio";
    font-size: 1.1rem;
    position: absolute;
    top: 1.9rem;
    right: 2rem;
    -webkit-transition: all 0.2s ease;
         -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
    width: 1.1rem;
    height: auto;
    line-height: 1;
  }
  .dropdown:hover .main-navigation-dropdown {
    background-color: rgba(221, 239, 248, 0.5);
  }
  .dropdown:hover .main-navigation-dropdown.active {
    background-color: #DDEFF8;
  }
  .dropdown:hover .main-navigation-dropdown:after {
    -webkit-transform: scaleY(-1);
        -ms-transform: scaleY(-1);
         -o-transform: scaleY(-1);
            transform: scaleY(-1);
    top: 1.7rem;
  }
}
@media (min-width: 1681px) {
  .dropdown:hover .main-navigation-dropdown:after {
    -webkit-transform: scaleY(-1);
        -ms-transform: scaleY(-1);
         -o-transform: scaleY(-1);
            transform: scaleY(-1);
    top: 1.7rem;
  }
}
@media (max-width: 1023px) {
  .main-navigation-dropdown:after {
    position: absolute;
    font-family: "pleio";
    right: 2rem;
    content: "\e901";
    font-size: 1rem;
  }
}
.main-navigation__mobile {
  margin-top: 2rem;
  padding-bottom: 4rem;
}
@media (min-width: 1024px) {
  .main-navigation__mobile {
    display: none;
  }
}
@media (max-width: 1023px) {
  .mobile-navigation {
    position: fixed;
    top: 0;
    height: 100%;
    width: 90%;
    left: 0;
    min-width: 30rem;
    max-width: 35rem;
    -webkit-transform: translate(-100%, 0) translateZ(0);
            transform: translate(-100%, 0) translateZ(0);
    z-index: 999;
    background-color: #fff;
    overflow-y: hidden;
    overflow-x: hidden;
    padding-top: 5.2rem;
    -webkit-transition: -webkit-transform 0.3s, -webkit-box-shadow 0.3s;
         -o-transition: -o-transform 0.3s, box-shadow 0.3s;
            transition: transform 0.3s, box-shadow 0.3s;
  }
  .mobile-menu--open .mobile-navigation {
    left: 0;
    -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.24);
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.24);
    -webkit-transform: translate(0%, 0) translateZ(0);
            transform: translate(0%, 0) translateZ(0);
    visibility: visible;
    opacity: 1;
  }
}
@media (max-width: 680px) {
  .mobile-navigation {
    overflow-y: auto;
  }
}
@media (min-width: 1024px) {
  .mobile-navigation {
    opacity: 1;
    visibility: visible;
    position: relative;
    display: inline;
    top: auto;
    left: auto;
    bottom: auto;
    width: auto;
    -webkit-transform: translate(-100%, 0);
        -ms-transform: translate(-100%, 0);
         -o-transform: translate(-100%, 0);
            transform: translate(-100%, 0);
    -webkit-transition: none;
         -o-transition: none;
            transition: none;
    z-index: 0;
  }
  .mobile-menu--open .mobile-navigation {
    -webkit-transition: 0s;
         -o-transition: 0s;
            transition: 0s;
    -webkit-transform: none;
        -ms-transform: none;
         -o-transform: none;
            transform: none;
    left: auto;
    position: relative;
  }
}
.mobile-navigation-bar {
  background-color: #8FCAE7;
  min-height: 4rem;
  position: relative;
  width: 5rem;
  -webkit-transition: opacity 0.2s ease, visibility 0.2s ease;
       -o-transition: opacity 0.2s ease, visibility 0.2s ease;
          transition: opacity 0.2s ease, visibility 0.2s ease;
}
@media (min-width: 1024px) {
  .mobile-navigation-bar {
    opacity: 0;
    visibility: hidden;
  }
}
.mobile-navigation-bar__trigger {
  float: left;
  position: absolute;
  left: 0;
  line-height: 4rem;
  padding: 0 2rem;
  background-color: #DDEFF8;
  min-width: 4rem;
  height: 4rem;
  overflow: hidden;
  cursor: pointer;
}
.mobile-navigation-bar__trigger .icon {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
       -o-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  font-size: 1rem;
}
@media (min-width: 680px) and (max-width: 1023px) {
  .mobile-navigation-bar__trigger {
    padding-left: 4rem;
  }
  .mobile-navigation-bar__trigger .icon {
    left: 2rem;
    -webkit-transform: translate(0, -50%);
        -ms-transform: translate(0, -50%);
         -o-transform: translate(0, -50%);
            transform: translate(0, -50%);
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
  .mobile-navigation-bar__trigger {
    height: 4.5rem;
    line-height: 4.5rem;
  }
}
@media (min-width: 1024px) {
  .mobile-navigation-bar__trigger {
    display: none;
  }
}
.mobile-navigation-bar__span {
  display: none;
  line-height: 4.2rem;
  font-family: "ROsanswebtext_bold", sans-serif;
}
@media (min-width: 680px) and (max-width: 1023px) {
  .mobile-navigation-bar__span {
    display: block;
  }
}
@media (min-width: 768px) and (max-width: 1024px) {
  .mobile-navigation-bar__span {
    line-height: 4.7rem;
  }
}
.mobile-navigation__close {
  display: none;
  position: absolute;
  top: 1.6rem;
  right: 2rem;
  cursor: pointer;
  font-size: 1.4rem;
  color: #B4B4B4;
}
@media (max-width: 1023px) {
  .mobile-navigation__close {
    display: block;
  }
}
.mobile-navigation__search {
  height: 4rem;
  line-height: 2rem;
  padding: 0.5rem 2rem;
  position: relative;
  background-color: #DDEFF8;
  margin-bottom: 1rem;
}
@media (min-width: 1024px) {
  .mobile-navigation__search {
    display: none;
  }
}
.mobile-navigation__search input {
  background-color: transparent;
  border: none;
  width: 100%;
  line-height: 1.2;
  padding: 0.5rem 0 0 2.5rem;
}
.mobile-navigation__search label {
  top: 55%;
  -webkit-transform: translate(0, -50%);
      -ms-transform: translate(0, -50%);
       -o-transform: translate(0, -50%);
          transform: translate(0, -50%);
  position: absolute;
  font-size: 1.7rem;
  color: #01689b;
}
.mobile-navigation__search ::-webkit-input-placeholder {
  /* Safari, Chrome and Opera */
  color: #8FCAE7;
  font-family: "ROsanswebtext_bold", sans-serif;
}
.mobile-navigation__search :-moz-placeholder {
  /* Firefox 18- */
  color: #8FCAE7;
  font-family: "ROsanswebtext_bold", sans-serif;
}
.mobile-navigation__search ::-moz-placeholder {
  /* Firefox 19+ */
  color: #8FCAE7;
  font-family: "ROsanswebtext_bold", sans-serif;
}
.mobile-navigation__search :-ms-input-placeholder {
  /* IE 10+ */
  color: #8FCAE7;
  font-family: "ROsanswebtext_bold", sans-serif;
}
.mobile-navigation__search :-ms-input-placeholder {
  /* Edge */
  color: #8FCAE7;
  font-family: "ROsanswebtext_bold", sans-serif;
}
.mobile-navigation__profile {
  font-size: 1.6rem;
  line-height: 3rem;
  padding: 0 2rem 0 4.5rem;
  position: relative;
  margin-bottom: 1rem;
  display: block;
  text-decoration: none;
  color: #000;
}
.mobile-navigation__profile img {
  max-width: 2rem;
  border-radius: 50%;
  position: absolute;
  left: 2rem;
  top: 50%;
  -webkit-transform: translate(0, -50%);
      -ms-transform: translate(0, -50%);
       -o-transform: translate(0, -50%);
          transform: translate(0, -50%);
}
@media (min-width: 1024px) {
  .mobile-navigation__profile {
    display: none;
  }
}
.header {
  position: relative;
  width: 100%;
  height: 8.8rem;
  background-color: #fff;
}
.header .container {
  position: relative;
}
.header__logo {
  text-align: center;
  background: #fff;
  position: absolute;
  left: 50%;
  margin-left: -2.2rem;
}
.header__logo img {
  height: 7.7rem;
}
.page-wrapper {
  min-height: 100%;
  margin-bottom: -26.8rem;
  -webkit-overflow-scrolling: touch;
}
.page-wrapper:after {
  height: 26.8rem;
  content: "";
  display: block;
}
.profiled .page-wrapper:after {
  background-color: #F3F3F3;
}
@media (min-width: 768px) {
  .page-wrapper {
    min-height: 100vh;
  }
}
.footer {
  position: relative;
  padding: 4.5rem 0 0 0;
  border-top: 3px solid #154273;
  background-color: #E6E6E6;
}
.footer:before,
.footer:after {
  content: " ";
  display: table;
}
.footer:after {
  clear: both;
}
.footer:before {
  content: '';
  width: 4.4rem;
  margin-left: -2.2rem;
  height: 2.2rem;
  left: 50%;
  background: #154273;
  position: absolute;
  bottom: 100%;
  z-index: 10;
}
@media (min-width: 768px) {
  .footer {
    padding: 4rem 0;
  }
}
.footer__title {
  font-family: "ROsanswebtext_regular", sans-serif;
  font-weight: normal;
  font-size: 2.4rem;
  line-height: 2.88rem;
  border-bottom: 1px solid #B4B4B4;
  margin: 0 0 1rem 0;
  padding-bottom: 2rem;
}
.footer__list {
  margin: 0 0 4.5rem 0;
  padding: 0;
  list-style-type: none;
}
.footer__list li {
  padding-left: 0;
}
@media (min-width: 768px) {
  .footer__list {
    margin: 0;
  }
}
.footer__list--multiple {
  margin-bottom: 0;
}
@media (min-width: 1024px) {
  .footer__list--half {
    width: 50%;
    float: left;
  }
}
.footer__link {
  font-size: 1.8rem;
  line-height: 3.2rem;
  text-decoration: none;
  color: #000;
  display: block;
}
@media (max-width: 767px) {
  .footer__link {
    font-size: 1.6rem;
    line-height: 3rem;
  }
}
.footer__link:hover {
  text-decoration: underline;
}
.lead {
  background-repeat: no-repeat;
  background-position: center center;
  -webkit-background-size: cover;
          background-size: cover;
  height: auto;
  position: relative;
  background-color: #fff;
}
.lead__background {
  background-repeat: no-repeat;
  background-position: center center;
  -webkit-background-size: cover;
          background-size: cover;
  position: relative;
  height: 10rem;
}
@media (min-width: 768px) {
  .lead__background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 19.8rem;
  }
}
.lead__content {
  position: relative;
}
.page-title {
  font-size: 3.6rem;
  line-height: 4.2rem;
  color: #009ee3;
  margin: 0 0 2rem;
}
.content-editable,
#content-editable {
  font-size: 1.6rem;
  line-height: 2.2rem;
}
@media (min-width: 768px) {
  .content-editable,
  #content-editable {
    font-size: 1.8rem;
    line-height: 2.4rem;
  }
}
.content-editable h2,
#content-editable h2,
.content-editable h3,
#content-editable h3 {
  font-size: 3.6rem;
  line-height: 4.4rem;
  color: #009ee3;
}
@media (min-width: 768px) {
  .content-editable h2,
  #content-editable h2,
  .content-editable h3,
  #content-editable h3 {
    font-size: 2.8rem;
    line-height: 3.4rem;
  }
}
.content-editable h4,
#content-editable h4,
.content-editable h5,
#content-editable h5 {
  font-size: 2.8rem;
  line-height: 3.4rem;
}
@media (min-width: 768px) {
  .content-editable h4,
  #content-editable h4,
  .content-editable h5,
  #content-editable h5 {
    font-size: 2.2rem;
    line-height: 2.8rem;
  }
}
.content-editable p,
#content-editable p {
  font-size: 1.6rem;
  line-height: 2.2rem;
}
@media (min-width: 768px) {
  .content-editable p,
  #content-editable p {
    font-size: 1.8rem;
    line-height: 2.4rem;
  }
}
.content-editable p:last-child,
#content-editable p:last-child {
  margin-bottom: 0;
}
.content-editable a,
#content-editable a {
  font-family: "ROsanswebtext_bold", sans-serif;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.content-editable a:hover,
#content-editable a:hover {
  border-bottom: 1px dotted #009ee3;
}
.content-editable strong,
#content-editable strong,
.content-editable em,
#content-editable em {
  font-family: "ROsanswebtext_bold", sans-serif;
  font-weight: 400;
}
.content-editable img,
#content-editable img {
  width: 100%;
  margin-bottom: 2rem;
}
.content-editable img:last-child,
#content-editable img:last-child {
  margin-bottom: 0;
}
#content-editable {
  margin: 0;
  padding: 1.5rem 2rem !important;
  font-size: 1.6rem !important;
  line-height: 2.2rem !important;
}
@media (min-width: 768px) {
  #content-editable {
    font-size: 1.8rem !important;
    line-height: 2.4rem !important;
  }
}
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  visibility: hidden;
  opacity: 0;
  -webkit-transition: 0.2s ease;
       -o-transition: 0.2s ease;
          transition: 0.2s ease;
  background-color: rgba(0, 0, 0, 0.15);
  z-index: 30;
}
@media (max-width: 1023px) {
  .mobile-menu--open .overlay {
    opacity: 1;
    visibility: visible;
  }
}
.question-modal--open .overlay {
  opacity: 1;
  visibility: visible;
}
.link {
  font-family: "ROsanswebtext_bold", sans-serif;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.link:hover {
  border-bottom: 1px dotted #009ee3;
}
.article {
  -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
          box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
  background-color: #fff;
  overflow: hidden;
  position: relative;
}
.article__image {
  background-position: top left;
  -webkit-background-size: cover;
          background-size: cover;
  height: 10rem;
}
@media (min-width: 768px) {
  .article__image {
    min-height: 34.5rem;
    float: left;
    width: 50%;
  }
}
@media (min-width: 1024px) {
  .article__image {
    min-height: 36.5rem;
    width: 100%;
  }
}
.article__content {
  padding: 3rem;
  position: relative;
  background-color: #fff;
}
@media (min-width: 768px) {
  .article__content {
    min-height: 34.5rem;
    float: right;
    width: 50%;
  }
}
@media (min-width: 1024px) {
  .article__content {
    min-height: 36.5rem;
    float: right;
    width: 33.5rem;
    position: absolute;
    right: 0;
  }
}
.article__title {
  margin: 0 0 1rem 0;
  font-size: 2.2rem;
  line-height: 2.8rem;
}
@media (min-width: 768px) {
  .article__title {
    font-size: 2.8rem;
    line-height: 3.4rem;
  }
}
.article__category {
  color: #B4B4B4;
  font-size: 1.6rem;
  line-height: 2.2rem;
}
@media (min-width: 768px) {
  .article__category {
    font-size: 1.8rem;
    line-height: 2.4rem;
  }
}
.article__text {
  line-height: 2.2rem;
  display: block;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  word-wrap: break-word;
  font-size: 1.6rem;
  max-height: 6.6rem;
}
@media (min-width: 768px) {
  .article__text {
    line-height: 2.4rem;
    display: block;
    display: -webkit-box;
    -webkit-line-clamp: 5;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    word-wrap: break-word;
    font-size: 1.8rem;
    max-height: 12rem;
  }
}
@media (min-width: 768px) {
  .article__read-more {
    position: absolute;
    bottom: 3rem;
    left: 3rem;
  }
}
.radios:before,
.radios:after {
  content: " ";
  display: table;
}
.radios:after {
  clear: both;
}
.radio {
  display: block;
  padding-left: 3rem;
  padding-top: 0.1rem;
  padding-bottom: 0.3rem;
  position: relative;
  cursor: pointer;
}
.radio a {
  font-family: "ROsanswebtext_bold", sans-serif;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.radio a:hover {
  border-bottom: 1px dotted #009ee3;
}
.radio--floated {
  float: left;
  margin-right: 3rem;
}
.radio__placeholder {
  width: 2rem;
  height: 2rem;
  position: absolute;
  left: 0;
  top: 0.2rem;
  background-color: #fff;
  border: 2px solid #CCCCCC;
  border-radius: 50%;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.modal--check-filter .radio__placeholder {
  border-color: #CCCCCC;
}
.radio__placeholder:after {
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
.chosen .radio__placeholder:after {
  background-color: #154273;
}
.radio__input {
  position: absolute;
  visibility: hidden;
  top: 0;
  left: 0;
}
.checkbox {
  display: block;
  padding-left: 2.4rem;
  padding-bottom: 0.6rem;
  position: relative;
  cursor: pointer;
}
.checkbox a {
  font-family: "ROsanswebtext_bold", sans-serif;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.checkbox a:hover {
  border-bottom: 1px dotted #009ee3;
}
.checkbox--floated {
  float: left;
  margin-right: 3rem;
}
.checkbox__placeholder {
  width: 1.6rem;
  height: 1.6rem;
  position: absolute;
  left: 0;
  top: 0.4rem;
  background-color: #fff;
  border: 2px solid #CCCCCC;
  border-radius: 0.4rem;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.modal--check-filter .checkbox__placeholder {
  border-color: #CCCCCC;
}
.checkbox__placeholder:after {
  content: '';
  position: absolute;
  top: 0.45rem;
  left: 0.45rem;
  width: 0.8rem;
  height: 0.3rem;
  background-color: #fff;
  -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
       -o-transform: rotate(-45deg);
          transform: rotate(-45deg);
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.chosen .checkbox__placeholder:after {
  background-color: #01689b;
}
.checkbox__placeholder:before {
  content: '';
  position: absolute;
  top: 0.65rem;
  left: 0.1rem;
  width: 0.66rem;
  height: 0.3rem;
  background-color: #fff;
  -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
       -o-transform: rotate(45deg);
          transform: rotate(45deg);
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.chosen .checkbox__placeholder:before {
  background-color: #01689b;
}
.checkbox__input {
  position: absolute;
  visibility: hidden;
  top: 0;
  left: 0;
}
.checkbox-switch {
  display: block;
  padding-top: 0.4rem;
  padding-bottom: 0.6rem;
  padding-left: 4.4rem;
  position: relative;
  cursor: pointer;
}
.checkbox-switch a {
  font-family: "ROsanswebtext_bold", sans-serif;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.checkbox-switch a:hover {
  border-bottom: 1px dotted #009ee3;
}
.checkbox-switch__placeholder {
  width: 3.7rem;
  height: 2rem;
  position: absolute;
  display: block;
  left: 0;
  top: 0.5rem;
  border: 0;
  border-radius: 1rem;
  background-color: #CCCCCC;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.chosen .checkbox-switch__placeholder {
  background-color: #009ee3;
}
.checkbox-switch__placeholder:after {
  content: '';
  position: absolute;
  display: block;
  width: 2.2rem;
  height: 2.2rem;
  top: -0.1rem;
  left: -0.1rem;
  border-radius: 50%;
  background-color: #fff;
  border: 1px solid #CCCCCC;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.chosen .checkbox-switch__placeholder:after {
  left: 1.6rem;
  border-color: #01689b;
}
.checkbox-switch__input {
  position: absolute;
  visibility: hidden;
  top: 0;
  left: 0;
}
.button {
  -webkit-appearance: none;
  -moz-appearance: none;
  border: none;
  border-radius: 0.5rem;
  background-color: #CCCCCC;
  height: 4rem;
  padding: 0.8rem 2rem;
  font-family: "ROsanswebtext_bold", sans-serif;
  font-size: 1.8rem;
  line-height: 2.4rem;
  -webkit-transition: color 0.2s ease, background-color 0.2s ease;
       -o-transition: color 0.2s ease, background-color 0.2s ease;
          transition: color 0.2s ease, background-color 0.2s ease;
  text-decoration: none;
  display: inline-block;
  color: #fff;
  cursor: pointer;
}
.button--inline {
  height: 4.6rem;
  padding: 1.1rem 2rem;
}
.button--full-width {
  width: 100%;
  text-align: center;
  height: 4.6rem;
  padding: 1.1rem 2rem;
}
.button--check-filter {
  background-color: #01689b;
}
.button--check-filter:hover {
  background-color: #fff;
  color: #154273;
}
.button--control {
  line-height: 4rem;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
  text-decoration: none;
  display: inline-block;
  color: #fff;
}
.button--control:hover {
  background-color: #01689b;
}
.button--control:disabled {
  background-color: #CCCCCC;
}
.button--color-septenary {
  background: #01689b;
  color: #fff;
}
.button--color-septenary:hover {
  background: #154273;
}
.button--color-septenary:disabled {
  background-color: #B4B4B4;
}
.button--primary {
  background-color: #1AA0E0;
  color: #fff;
}
.button--primary:hover {
  background-color: #01689b;
}
.button--primary:disabled {
  background-color: #CCCCCC;
}
.button--with-icon span {
  margin-right: 0.7rem;
}
.button--with-icon .icon-print {
  font-size: 1.3rem;
}
.button--with-icon .icon-pencil {
  font-size: 1.5rem;
}
.button--link {
  color: #535353;
  border: 0;
  padding: 1.2rem 0 0.4rem 0;
  background: transparent;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
  text-decoration: underline;
  font-family: "ROsanswebtext_regular", sans-serif;
  font-size: 1.8rem;
}
.button--link:hover {
  color: #000;
}
.button--disabled {
  background: #B4B4B4;
}
.button--disabled:hover {
  background: #B4B4B4;
}
.read-more {
  text-decoration: none;
  color: #000;
  display: block;
  font-size: 1.6rem;
  line-height: 2.2rem;
  font-family: "ROsanswebtext_bold", sans-serif;
  padding-left: 2.8rem;
  position: relative;
}
.read-more__icon {
  position: absolute;
  color: #009ee3;
  border-radius: 50%;
  text-align: center;
  width: 2rem;
  height: 2rem;
  display: inline-block;
  top: 0;
  margin-left: -3rem;
  -webkit-transition: color 0.2s, background-color 0.2s;
       -o-transition: color 0.2s, background-color 0.2s;
          transition: color 0.2s, background-color 0.2s;
  font-size: 2rem;
}
.read-more__icon:before {
  position: absolute;
  top: 51%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
       -o-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}
.read-more:hover .read-more__icon {
  color: #154273;
}
.autocomplete {
  position: absolute;
  top: 100%;
  -webkit-transform: scale(0);
      -ms-transform: scale(0);
       -o-transform: scale(0);
          transform: scale(0);
  opacity: 0;
  background-color: #fff;
  z-index: 5;
  -webkit-box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
          box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
  border-radius: 0;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  width: 100%;
  padding: 0 2rem;
  -webkit-transition: opacity 0.3s cubic-bezier(0.25, 0.95, 0.25, 1), -webkit-transform 0.1s cubic-bezier(0.25, 0.95, 0.25, 1) 0.3s;
       -o-transition: opacity 0.3s cubic-bezier(0.25, 0.95, 0.25, 1), -o-transform 0.1s cubic-bezier(0.25, 0.95, 0.25, 1) 0.3s;
          transition: opacity 0.3s cubic-bezier(0.25, 0.95, 0.25, 1), transform 0.1s cubic-bezier(0.25, 0.95, 0.25, 1) 0.3s;
  border-top: #E6E6E6 0.1rem solid;
}
.autocomplete.open {
  -webkit-transform: scale(1);
      -ms-transform: scale(1);
       -o-transform: scale(1);
          transform: scale(1);
  opacity: 1;
  -webkit-transition: opacity 0.3s cubic-bezier(0.25, 0.95, 0.25, 1);
       -o-transition: opacity 0.3s cubic-bezier(0.25, 0.95, 0.25, 1);
          transition: opacity 0.3s cubic-bezier(0.25, 0.95, 0.25, 1);
}
.autocomplete__results {
  text-align: left;
}
.autocomplete__results a {
  display: block;
  min-height: 4.5rem;
  padding: 1rem 0 1rem 1.3rem;
  position: relative;
  color: #000;
  text-decoration: none;
  text-shadow: none;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
  border-top: 0.1rem dotted #B4B4B4;
}
.autocomplete__results a:first-child {
  border: none;
}
.autocomplete__results a:before {
  font-family: "pleio";
  content: "\e916";
  position: absolute;
  top: 1.7rem;
  font-size: 1rem;
  line-height: 1;
  left: 0;
  display: block;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
  color: #01689b;
}
.autocomplete__results a:hover {
  color: #01689b;
}
.autocomplete__submit-button {
  -webkit-appearance: none;
  -moz-appearance: none;
  border: none;
  cursor: pointer;
  font-family: "ROsanswebtext_regular", sans-serif;
  position: absolute;
  right: 2rem;
  top: 1.2rem;
  color: #154273;
  text-shadow: none;
  font-size: 2.1rem;
  background-color: transparent;
  padding: 0 0 0 0.1rem;
  visibility: hidden;
  opacity: 0;
  z-index: 20;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.open .autocomplete__submit-button {
  visibility: visible;
  opacity: 1;
  color: #009ee3;
}
.typing .autocomplete__submit-button {
  visibility: hidden;
  opacity: 0;
}
.autocomplete__more {
  border: none;
  background-color: transparent;
  display: block;
  width: 100%;
  text-align: center;
  padding: 1rem;
  height: 4.5rem;
  position: relative;
  color: #01689b;
  text-decoration: none;
  text-shadow: none;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
  border-top: 0.1rem dotted #B4B4B4;
  visibility: hidden;
  opacity: 0;
}
.open .autocomplete__more {
  visibility: visible;
  opacity: 1;
}
.autocomplete__more:hover {
  color: #009ee3;
}
.form {
  margin-top: 2rem;
  margin-bottom: 2rem;
  font-size: 1.8rem;
}
.form__group {
  position: relative;
  margin-top: 2rem;
}
.form__group:first-child {
  margin-top: 2rem;
}
.form__label {
  font-size: 1.8rem;
  display: block;
}
.form__label a {
  font-family: "ROsanswebtext_bold", sans-serif;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.form__label a:hover {
  border-bottom: 1px dotted #009ee3;
}
.form__label-text {
  display: block;
  padding: 0 0 0.38rem 0;
  font-family: "ROsanswebtext_bold", sans-serif;
  line-height: 2.2rem;
}
.form__label-text a {
  color: #009ee3;
  text-decoration: none;
}
.form__label-text--hidden {
  position: absolute;
  top: -9999px;
  left: -9999px;
}
.form__label-message {
  display: block;
  padding: 0.6rem 0 0 0;
  color: #e17000;
  font-size: 1.6rem;
  line-height: 1.8rem;
}
.form__label-message--above-input {
  padding-top: 0;
  padding-bottom: 0.6rem;
}
.form__label-message--inline {
  display: inline;
  padding-top: 0;
  padding-left: 0.5rem;
}
.form__label-message--problem {
  color: #d52b1e;
}
.form__label-extra-info {
  display: block;
  padding: 0.75rem 0 0 0;
  color: #B4B4B4;
  font-size: 1.6rem;
  line-height: 2.2rem;
}
.form__input {
  width: 100%;
  font-size: 1.8rem;
  line-height: 2.2rem;
  border: 0.1rem solid #CCCCCC;
  padding: 1.1rem 1rem 1.1rem 1.25rem;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.form__input::-webkit-input-placeholder {
  font-size: 1.8rem;
  line-height: 2.4rem;
}
.form__input::-moz-placeholder {
  font-size: 1.8rem;
  line-height: 2.4rem;
}
.form__input:-ms-input-placeholder {
  font-size: 1.8rem;
  line-height: 2.4rem;
}
.form__input::placeholder {
  font-size: 1.8rem;
  line-height: 2.4rem;
}
label.__problem .form__input {
  border-color: #d52b1e;
}
.form__input.form__input--euro {
  padding-left: 3rem;
}
.form__input:hover {
  border-color: #009ee3;
}
.form__input:focus,
.form__input:active {
  border-color: #009ee3;
}
.form__input.error {
  border: 0.1rem solid #d52b1e;
}
.form__input--small-right-inset {
  padding-right: 0.4rem;
}
.form-sign--euro {
  position: absolute;
  top: 50%;
  -webkit-transform: translate(0, -50%);
      -ms-transform: translate(0, -50%);
       -o-transform: translate(0, -50%);
          transform: translate(0, -50%);
  left: 2.4rem;
}
.form__actions {
  margin: 0;
  padding-top: 1.5rem;
  text-align: right;
}
.form__actions a,
.form__actions button {
  margin-left: 1.5rem;
}
.form__actions-block {
  margin-left: 2rem;
}
.form__element {
  margin: 0 0 2rem 0;
}
.form__element--text {
  font-size: 1.6rem;
}
.form__element--small-padding,
.form__element--little-padding {
  margin: 0 0 1rem 0;
}
.form__element--no-padding {
  margin: 0;
}
.form__background {
  margin: 0 -1rem 1rem -1rem;
  padding: 1rem 1.5rem 0.5rem 1.5rem;
  font-size: 1.6rem;
  background: #f1f9fc;
}
.form__date:before,
.form__date:after {
  content: " ";
  display: table;
}
.form__date:after {
  clear: both;
}
.form__date__input {
  float: left;
}
.form__date__input--day {
  width: 28%;
}
.form__date__input--month {
  width: 32%;
  padding: 0 0.5rem;
}
.form__date__input--year {
  width: 40%;
}
.table {
  width: 100%;
  max-width: 40rem;
  font-size: 1.6rem;
  line-height: 3.2rem;
  margin-bottom: 3rem;
}
@media (min-width: 680px) {
  .table {
    font-size: 1.8rem;
  }
}
.table th {
  font-family: "ROsanswebtext_regular", sans-serif;
  font-weight: normal;
  text-align: left;
}
.table td {
  border-top: 1px dotted #000;
  font-family: "ROsanswebtext_bold", sans-serif;
}
.table td:first-child {
  width: 75%;
  font-family: "ROsanswebtext_regular", sans-serif;
}
@media (680px) {
  .table td:first-child {
    width: 55%;
  }
}
.table tr:last-child td {
  color: #0E6999;
  border-top: 1px dotted #0E6999;
}
.forum-block {
  border-bottom: 1px solid #B4B4B4;
  position: relative;
}
.forum-block:after {
  content: "\e903";
  font-family: "pleio";
  position: absolute;
  right: 0.5rem;
  top: 1rem;
  color: #009ee3;
  font-size: 1.4rem;
}
.forum-block.open:after {
  -webkit-transform: scaleY(-1);
      -ms-transform: scaleY(-1);
       -o-transform: scaleY(-1);
          transform: scaleY(-1);
}
@media (min-width: 768px) {
  .forum-block {
    padding: 3rem;
    -webkit-box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
            box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
    border: none;
    margin-bottom: 2rem;
  }
  .forum-block:after {
    display: none;
  }
}
@media (min-width: 768px) {
  .forum-block {
    background-color: #fff;
  }
}
.forum-block__title {
  font-size: 1.8rem;
  line-height: 2.4rem;
  margin: 0;
  padding: 1rem 2rem 1rem 0;
}
@media (min-width: 768px) {
  .forum-block__title {
    margin: 0 0 1rem;
    padding: 0;
    font-size: 2.4rem;
  }
}
.forum-block__content {
  display: none;
  padding-bottom: 2.5rem;
}
.open .forum-block__content {
  display: block;
}
@media (min-width: 768px) {
  .forum-block__content {
    display: block;
    padding-bottom: 0;
  }
}
.forum-block__list {
  margin: 2.5rem 0 0;
  padding: 0;
  list-style-type: none;
}
.forum-block__item {
  font-size: 1.6rem;
  line-height: 2.4rem;
  width: 100%;
  border-bottom: 1px solid #ccc;
  padding: 1rem 0;
  text-decoration: none;
  display: block;
}
.forum-block__item:hover .forum-block__text,
.forum-block__item:hover .forum-block__date {
  color: #009ee3;
}
.forum-block__table {
  width: 100%;
  position: relative;
}
.forum-block__text {
  padding: 0 1rem 0 0;
  color: #000;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
  line-height: 2.4rem;
  display: block;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  word-wrap: break-word;
  font-size: 1.6rem;
  max-height: 2.4rem;
}
@media (max-width: 767px) {
  .forum-block__text {
    display: block;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    word-wrap: break-word;
    font-size: 1.6rem;
    max-height: 2.4rem;
    padding: 0;
  }
}
.forum-block__date {
  color: #01689b;
  min-width: 5rem;
  max-width: 6rem;
}
@media (max-width: 767px) {
  .forum-block__date {
    display: block;
  }
}
.forum-block__number {
  color: #B4B4B4;
  padding-left: 2rem;
  position: relative;
  min-width: 4.6rem;
}
.forum-block__number:before {
  content: "\e909";
  font-family: "pleio";
  position: absolute;
  left: 0;
}
@media (max-width: 767px) {
  .forum-block__number {
    display: block;
    position: absolute;
    right: 0;
    top: 0;
    text-align: right;
    width: auto;
  }
  .forum-block__number:before {
    left: auto;
    margin-left: -2rem;
  }
}
.forum-block__readmore {
  position: relative;
  margin-top: 2.5rem;
}
.forum-block__readmore .read-more__icon {
  -webkit-transform: none;
      -ms-transform: none;
       -o-transform: none;
          transform: none;
  margin-left: -2.8rem;
}
@media (max-width: 767px) {
  .forum-block__readmore {
    text-align: right;
    padding-left: 0;
    padding-right: 2.8rem;
  }
  .forum-block__readmore .read-more__icon {
    left: auto;
    right: 0;
  }
}
.news-list__item {
  position: relative;
  display: block;
  text-decoration: none;
  color: inherit;
  font-size: 1.6rem;
  line-height: 2.2rem;
  padding: 1rem 0 1rem 1.5rem;
  border-bottom: 1px solid #CCCCCC;
}
@media (min-width: 768px) {
  .news-list__item {
    padding: 1rem 21.5rem 1rem 13.5rem;
    font-size: 1.8rem;
    line-height: 2.4rem;
  }
}
.news-list__item__date {
  color: #009ee3;
  position: relative;
  display: block;
  left: -1.5rem;
  padding-left: 1.5rem;
}
@media (min-width: 768px) {
  .news-list__item__date {
    position: absolute;
    left: 0;
  }
}
.news-list__item__date:before {
  font-family: "pleio";
  content: "\e901";
  font-size: 1rem;
  position: absolute;
  top: 50%;
  left: 0;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
       -o-transform: translateY(-50%);
          transform: translateY(-50%);
}
.news-list__item__title {
  color: #154273;
  font-family: "ROsanswebtext_bold", sans-serif;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.news-list__item:hover .news-list__item__title {
  color: #009ee3;
}
.news-list__item:visited .news-list__item__title,
.visited .news-list__item__title {
  color: #B4B4B4;
  font-family: "ROsanswebtext_regular", sans-serif;
}
.news-list__item__category {
  color: #B4B4B4;
  margin-left: 3px;
}
@media (min-width: 768px) {
  .news-list__item__category {
    position: absolute;
    right: 0;
  }
}
.news-list__item__category__icon {
  margin-right: 0.7rem;
  margin-left: 0.5rem;
  font-size: 1.4rem;
}
@media (min-width: 768px) {
  .news-list__item__category__icon {
    font-size: 1.6rem;
  }
}
.pagination {
  height: 4rem;
  line-height: 4rem;
  position: relative;
  padding: 0 7rem 0 5.5rem;
  overflow: hidden;
}
.pagination__form {
  float: right;
}
.pagination__previous,
.pagination__next {
  color: #fff;
  background-color: #CCCCCC;
  text-decoration: none;
  border-radius: 0.5rem;
  width: 4rem;
  height: 4rem;
  display: block;
  text-align: center;
  line-height: 4rem;
  position: absolute;
  top: 0;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.pagination__previous:hover,
.pagination__next:hover {
  background-color: #009ee3;
}
.pagination__previous.disabled,
.pagination__next.disabled {
  color: #CCCCCC;
  background-color: transparent;
  border: 1px solid #CCCCCC;
  cursor: default;
  pointer-events: none;
}
.pagination__previous {
  left: 0;
}
.pagination__next {
  right: 0;
}
.pagination__icon {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
       -o-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}
.pagination__previous .pagination__icon {
  padding-right: 0.3rem;
}
.pagination__next .pagination__icon {
  padding-left: 0.3rem;
}
.pagination__input {
  text-align: right;
  width: 8rem;
  height: 4rem;
  font-size: 1.6rem;
  line-height: 2.2rem;
  border-radius: 0.5rem;
  padding: 0 2rem;
  border: 1px solid #CCCCCC;
  margin-right: 1.5rem;
}
.pagination__input:disabled {
  background-color: transparent;
}
.forum-question {
  background-color: #fff;
  padding: 2rem;
  position: relative;
  -webkit-box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
          box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
  margin-top: 2rem;
}
@media (min-width: 768px) {
  .forum-question {
    padding: 3rem 2.5rem;
  }
}
.forum-question__picture {
  display: none;
  border-radius: 50%;
  max-width: 4rem;
  position: absolute;
  left: 2.5rem;
  top: 3rem;
}
@media (min-width: 768px) {
  .forum-question__picture {
    display: block;
  }
}
@media (min-width: 768px) {
  .forum-question__content {
    padding-right: 17.5rem;
    padding-left: 6rem;
  }
}
@media (min-width: 1024px) {
  .forum-question__content {
    padding-right: 23.7rem;
  }
}
.forum-question__aside {
  margin-top: 2rem;
}
@media (min-width: 768px) {
  .forum-question__aside {
    width: 15rem;
    position: absolute;
    right: 2.5rem;
    top: 4.5rem;
    bottom: 3rem;
    margin: 0;
  }
}
@media (min-width: 1024px) {
  .forum-question__aside {
    width: 20.7rem;
  }
}
.forum-question__title {
  font-size: 1.8rem;
  line-height: 2.4rem;
  font-family: "ROsanswebtext_bold", sans-serif;
  text-decoration: none;
  color: #01689b;
  margin: 0 0 0.5rem;
  display: block;
}
@media (min-width: 768px) {
  .forum-question__title {
    margin: 0 0 1rem;
    font-size: 2.4rem;
    line-height: 3rem;
  }
}
.forum-question__info {
  font-size: 1.6rem;
  line-height: 2.4rem;
  color: #B4B4B4;
  position: relative;
  margin-bottom: 2.5rem;
}
.forum-question__info a {
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.forum-question__info a:hover {
  border-bottom: 1px dotted #009ee3;
}
.forum-question__description {
  display: none;
}
@media (min-width: 768px) {
  .forum-question__description {
    display: block;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    word-wrap: break-word;
    font-size: 1.8rem;
    max-height: 4.8rem;
  }
}
.forum-question__answers {
  position: relative;
  padding-left: 2.5rem;
  display: inline-block;
  text-decoration: none;
  color: #535353;
  font-family: "ROsanswebtext_bold", sans-serif;
  line-height: 2.2rem;
  font-size: 1.6rem;
}
.forum-question__answers:before {
  content: "\e907";
  font-family: "pleio";
  position: absolute;
  left: 0;
  color: #009ee3;
}
@media (min-width: 768px) {
  .forum-question__answers {
    display: block;
    position: absolute;
    bottom: 0;
    line-height: 2.4rem;
    font-size: 1.8rem;
  }
}
.forum-question__follow {
  padding-left: 2.5rem;
  position: relative;
  color: #B4B4B4;
  font-size: 1.6rem;
  line-height: 2.2rem;
  display: none;
  text-decoration: none;
}
.forum-question__follow:before {
  content: "\e909";
  font-family: "pleio";
  position: absolute;
  left: 0;
  font-size: 1.5rem;
}
@media (min-width: 768px) {
  .forum-question__follow {
    display: block;
  }
}
.forum-question__views {
  padding-left: 2.5rem;
  position: relative;
  display: inline-block;
  float: right;
  text-decoration: none;
  color: #B4B4B4;
  font-size: 1.6rem;
  line-height: 2.2rem;
}
.forum-question__views:before {
  content: "\e906";
  font-family: "pleio";
  position: absolute;
  left: 0;
}
@media (min-width: 768px) {
  .forum-question__views {
    display: block;
    float: none;
  }
}
.breadcrumb {
  font-size: 1.6rem;
  line-height: 2.2rem;
}
.breadcrumb a {
  text-decoration: none;
  color: #B4B4B4;
  margin-left: 2.5rem;
  position: relative;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
}
.breadcrumb a:before {
  content: "\e901";
  font-family: "pleio";
  color: #B4B4B4 !important;
  position: absolute;
  -webkit-transform: translate(-50%, 5%);
      -ms-transform: translate(-50%, 5%);
       -o-transform: translate(-50%, 5%);
          transform: translate(-50%, 5%);
  margin-left: -1.4rem;
  font-size: 1rem;
  pointer-events: none;
}
.breadcrumb a:hover {
  color: #009ee3;
}
.breadcrumb a:hover:before {
  color: #B4B4B4;
}
.breadcrumb a:first-child {
  margin-left: 0;
}
.breadcrumb a:first-child:before {
  display: none;
}
.forum-answer {
  background-color: #f1f9fc;
  padding: 3rem 2rem;
  margin-top: 2rem;
}
@media (min-width: 768px) {
  .forum-answer {
    margin-top: 2rem;
  }
}
.forum-answer__top {
  padding-left: 5rem;
  position: relative;
  margin-bottom: 2rem;
}
@media (min-width: 768px) {
  .forum-answer__top {
    padding-left: 6rem;
  }
}
@media (min-width: 768px) {
  .forum-answer__body {
    padding-left: 6rem;
  }
}
.forum-answer__profile {
  max-width: 4rem;
  border-radius: 50%;
  position: absolute;
  left: 0;
  margin-top: 0.2rem;
}
@media (min-width: 768px) {
  .forum-answer__profile {
    margin-top: -0.7rem;
  }
}
.forum-answer__name {
  font-size: 1.6rem;
  line-height: 2.2rem;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.forum-answer__name:hover {
  border-bottom: 1px dotted #009ee3;
}
@media (min-width: 768px) {
  .forum-answer__name {
    display: inline;
    font-size: 1.8rem;
    line-height: 2.4rem;
  }
}
.forum-answer__time {
  display: block;
  font-size: 1.6rem;
  line-height: 2.2rem;
  color: #8FCAE7;
}
@media (min-width: 768px) {
  .forum-answer__time {
    display: inline-block;
    float: right;
    line-height: 2.4rem;
  }
}
@media (min-width: 768px) {
  .forum-answer__bottom {
    padding-left: 6rem;
  }
}
.forum-answer__upvote,
.forum-answer__downvote {
  color: #8FCAE7;
  font-size: 1.6rem;
  line-height: 2.2rem;
  position: relative;
  padding-left: 2rem;
  text-decoration: none;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
}
.forum-answer__upvote:before,
.forum-answer__downvote:before {
  font-family: "pleio";
  content: "\e902";
  position: absolute;
  left: 0;
  font-size: 1.3rem;
  margin-top: 0.1rem;
}
.forum-answer__upvote:hover,
.forum-answer__downvote:hover {
  color: #01689b;
}
.forum-answer__downvote {
  display: block;
  margin-top: 1rem;
}
.forum-answer__downvote:before {
  margin-top: 0.2rem;
  content: "\e903";
}
@media (min-width: 768px) {
  .forum-answer__downvote {
    display: inline-block;
    margin-left: 2rem;
    margin-top: 0;
  }
}
.content-actions__print {
  display: none;
}
@media (min-width: 768px) {
  .content-actions__print {
    display: block;
    float: left;
    margin-right: 2.5rem;
  }
}
.content-actions__views {
  color: #B4B4B4;
  display: block;
  float: left;
  padding-left: 2.5rem;
  position: relative;
}
@media (min-width: 768px) {
  .content-actions__views {
    height: 4rem;
    line-height: 4rem;
  }
}
.content-actions__views__icon {
  margin-right: 0.7rem;
  margin-top: -0.2rem;
  font-size: 2.1rem;
  display: inline-block;
  position: absolute;
  top: 50%;
  left: 0;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
       -o-transform: translateY(-50%);
          transform: translateY(-50%);
}
.popular-articles__title {
  margin: 0 0 3rem 0;
  font-size: 2.2rem;
  line-height: 2.8rem;
  font-family: "ROsanswebtext_regular", sans-serif;
  color: #01689b;
}
@media (min-width: 768px) {
  .popular-articles__title {
    font-size: 2.8rem;
    line-height: 3.4rem;
  }
}
.popular-article {
  position: relative;
  margin-bottom: 2rem;
  padding-left: 5.5rem;
  display: block;
}
.popular-article:last-child {
  margin-bottom: 0;
}
.popular-article__number {
  position: absolute;
  left: 0;
  top: 0;
  border-radius: 50%;
  background-color: #fff;
  width: 3.4rem;
  height: 3.4rem;
  line-height: 3.4rem;
  text-align: center;
  color: #01689b;
  font-size: 1.44rem;
  font-family: "ROsanswebtext_bold", sans-serif;
}
@media (min-width: 768px) {
  .popular-article__number {
    width: 4.2rem;
    height: 4.2rem;
    font-size: 1.8rem;
    line-height: 4.2rem;
  }
}
.popular-article__date {
  color: #009ee3;
  font-size: 1.6rem;
  line-height: 2.2rem;
}
@media (min-width: 768px) {
  .popular-article__date {
    font-size: 1.8rem;
    line-height: 2.4rem;
  }
}
.popular-article__title {
  margin: 0;
  font-size: 1.6rem;
  line-height: 2.2rem;
  color: #154273;
}
@media (min-width: 768px) {
  .popular-article__title {
    font-size: 1.8rem;
    line-height: 2.4rem;
  }
}
.answer-edit-block {
  margin-top: 3rem;
  position: relative;
  display: none;
}
.answer-edit-block:before {
  content: "";
  width: 2rem;
  height: 2rem;
  border: 0.1rem solid #B4B4B4;
  display: block;
  position: absolute;
  -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
       -o-transform: rotate(-45deg);
          transform: rotate(-45deg);
  background-color: #fff;
  top: -1rem;
  left: 4rem;
  border-bottom: none;
  border-left: none;
  z-index: 1;
}
.open .answer-edit-block {
  display: block;
}
.answer-edit-block__content {
  background-color: #fff;
  padding: 2rem;
  width: 100%;
  margin-bottom: 1rem;
  font-size: 1.6rem;
  line-height: 2.2rem;
  display: block;
  resize: none;
  min-height: 22rem;
  border: 0.1rem solid #B4B4B4;
}
@media (min-width: 768px) {
  .answer-edit-block__content {
    font-size: 1.8rem;
    line-height: 2.6rem;
  }
}
.answer-edit-block__top {
  padding: 2.25rem 2rem 2.25rem 7.5rem;
  border: 0.1rem solid #B4B4B4;
  border-bottom: none;
  position: relative;
}
.answer-edit-block__controls {
  border: 0.1rem solid #B4B4B4;
  border-bottom: none;
  height: 4.1rem;
  padding: 0 1.5rem;
}
.answer-edit-block__control {
  width: 3rem;
  height: 4rem;
  color: #B4B4B4;
  display: inline-block;
  text-decoration: none;
  position: relative;
}
.answer-edit-block__control:last-child {
  float: right;
}
.answer-edit-block__control .icon {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
       -o-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  font-size: 1.5rem;
}
.answer-edit-block__control .icon-edit-italic,
.answer-edit-block__control .icon-edit-bold {
  font-size: 1.4rem;
}
.answer-edit-block__control .icon-edit-link {
  font-size: 1.2rem;
}
.answer-edit-block__control:hover .icon {
  color: #535353;
}
.answer-edit-block__name {
  font-family: "ROsanswebtext_bold", sans-serif;
  line-height: 2.2rem;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.answer-edit-block__name:hover {
  border-bottom: 1px dotted #009ee3;
}
.answer-edit-block__image {
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
  position: absolute;
  left: 2rem;
  top: 50%;
  -webkit-transform: translate(0, -50%);
      -ms-transform: translate(0, -50%);
       -o-transform: translate(0, -50%);
          transform: translate(0, -50%);
}
.answer-edit-block__submit {
  margin-top: 1rem;
  text-align: right;
}
@media (min-width: 768px) {
  .answer-edit-block__submit {
    position: absolute;
    bottom: 2rem;
    right: 2rem;
  }
}
.video-block {
  display: block;
  margin-top: 2rem;
  -webkit-box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
          box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
}
.video-block:before,
.video-block:after {
  content: " ";
  display: table;
}
.video-block:after {
  clear: both;
}
.video-block__left {
  padding: 2rem 2rem;
  position: relative;
}
@media (min-width: 768px) {
  .video-block__left {
    width: 42.8%;
    float: left;
    display: inline-block;
    min-height: 36.6rem;
    padding: 3rem;
    background-color: #fff;
    -webkit-transition: background-color 0.2s ease;
         -o-transition: background-color 0.2s ease;
            transition: background-color 0.2s ease;
  }
  .video-block--open .video-block__left {
    background-color: #F3F3F3;
  }
}
@media (min-width: 1024px) {
  .video-block__left {
    width: 34%;
  }
}
@media (min-width: 768px) {
  .video-block__right {
    width: 57.2%;
    float: right;
    display: inline-block;
    min-height: 36.6rem;
    position: relative;
  }
}
@media (min-width: 1024px) {
  .video-block__right {
    width: 66%;
  }
}
.video-block__background {
  background-position: center;
  background-repeat: no-repeat;
  -webkit-background-size: cover;
          background-size: cover;
  position: relative;
  height: 14.8rem;
}
@media (min-width: 768px) {
  .video-block__background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: auto;
  }
}
.video-block__play {
  text-decoration: none;
  position: absolute;
  background-color: #fff;
  border-radius: 50%;
  width: 6rem;
  height: 6rem;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
       -o-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  -webkit-box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
          box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.25);
  display: block;
  text-align: center;
  line-height: 6rem !important;
  color: #154273;
  font-size: 3rem;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.video-block__play .icon {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-42%, -50%);
      -ms-transform: translate(-42%, -50%);
       -o-transform: translate(-42%, -50%);
          transform: translate(-42%, -50%);
}
.video-block__play:hover {
  background-color: #154273;
  color: #fff;
}
.video-block__date {
  color: #009ee3;
  font-size: 1.6rem;
  line-height: 2.2rem;
}
@media (min-width: 768px) {
  .video-block__date {
    font-size: 1.8rem;
    line-height: 2.8rem;
  }
}
.video-block__subject {
  color: #8FCAE7;
  font-size: 1.6rem;
  line-height: 2.2rem;
}
@media (min-width: 768px) {
  .video-block__subject {
    font-size: 1.8rem;
    line-height: 2.8rem;
  }
}
.video-block__title {
  font-size: 2rem;
  line-height: 2.6rem;
  color: #01689b;
  margin: 0;
  font-family: "ROsanswebtext_bold", sans-serif;
}
@media (min-width: 768px) {
  .video-block__title {
    font-size: 2.8rem;
    line-height: 3.4rem;
  }
}
.video-block__menu .video-block__title {
  padding-right: 2rem;
  margin-bottom: 1rem;
}
@media (min-width: 768px) {
  .video-block__menu .video-block__title {
    display: none;
  }
}
.video-block__readmore {
  position: relative;
  margin-top: 2.5rem;
  -webkit-transition: color 0.2s ease, visibility 0.2s ease, opacity 0.2s ease;
       -o-transition: color 0.2s ease, visibility 0.2s ease, opacity 0.2s ease;
          transition: color 0.2s ease, visibility 0.2s ease, opacity 0.2s ease;
}
.video-block__readmore .read-more__icon {
  -webkit-transform: none;
      -ms-transform: none;
       -o-transform: none;
          transform: none;
  margin-left: -2.8rem;
}
@media (min-width: 768px) {
  .video-block__readmore {
    position: absolute;
    bottom: 3rem;
  }
}
.video-block--open .video-block__readmore {
  opacity: 0;
  visibility: hidden;
}
.video-block__back {
  opacity: 0;
  visibility: hidden;
}
.video-block__back .read-more__icon {
  color: #fff;
}
.video-block__back .read-more__icon:before {
  z-index: 1;
}
.video-block__back .read-more__icon:after {
  background-color: #009ee3;
  content: "";
  width: 1rem;
  height: 1rem;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
       -o-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  -webkit-transition: background-color 0.2s;
       -o-transition: background-color 0.2s;
          transition: background-color 0.2s;
}
.video-block--open .video-block__back {
  opacity: 1;
  visibility: visible;
}
.video-block__back:hover .read-more__icon:after {
  background-color: #fff;
}
@media (max-width: 767px) {
  .video-block__back {
    display: none;
  }
}
.video-block__menu {
  visibility: hidden;
  opacity: 0;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #fff;
  z-index: 1;
  padding: 2rem 2rem 2rem;
  overflow: scroll;
  -webkit-transition: visibility 0.2s ease, opacity 0.2s ease;
       -o-transition: visibility 0.2s ease, opacity 0.2s ease;
          transition: visibility 0.2s ease, opacity 0.2s ease;
}
@media (min-width: 768px) {
  .video-block__menu {
    left: -74.7%;
    position: absolute;
    -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
    padding: 5rem 2rem 2rem;
  }
}
@media (min-width: 1024px) {
  .video-block__menu {
    left: 0;
  }
}
.video-block--open .video-block__menu {
  visibility: visible;
  opacity: 1;
}
.video-block__item {
  position: relative;
  padding-top: 1rem;
  padding-bottom: 1.1rem;
}
.video-block__item:after {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 1px;
  background-color: #B4B4B4;
  content: "";
}
.video-block__link {
  position: relative;
  color: #000;
  text-decoration: none;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
  padding-right: 2.5rem;
  line-height: 2.4rem;
  display: block;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  word-wrap: break-word;
  font-size: 1.8rem;
  max-height: 2.4rem;
}
.video-block__link:before {
  content: "\e901";
  position: absolute;
  right: 0.7rem;
  bottom: -1.2rem;
  font-family: "pleio";
  -webkit-transform: translate(0, -50%);
      -ms-transform: translate(0, -50%);
       -o-transform: translate(0, -50%);
          transform: translate(0, -50%);
  font-size: 1.1rem;
  -webkit-transition: 0.2s right ease;
       -o-transition: 0.2s right ease;
          transition: 0.2s right ease;
}
.video-block__link:hover {
  color: #009ee3;
}
.video-block__link:hover:before {
  right: 0.4rem;
}
.video-block__link.visited {
  color: #B4B4B4;
}
.video-block__link.visited:hover {
  color: #009ee3;
}
.video-block__link.visited:hover:before {
  right: 0.4rem;
}
.video-block__menu-close {
  position: absolute;
  top: 2.4rem;
  right: 2rem;
  color: #B4B4B4;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
  text-decoration: none;
  font-size: 1.4rem;
}
.video-block__menu-close:hover {
  color: #009ee3;
}
@media (min-width: 768px) {
  .video-block__menu-close {
    top: 2rem;
    right: 2.2rem;
  }
}
.dropdown {
  display: inline-block;
  float: left;
}
.main-navigation .dropdown {
  display: block;
  float: none;
}
@media (min-width: 1024px) {
  .main-navigation .dropdown {
    display: inline-block;
    float: left;
  }
}
@media (min-width: 1024px) {
  .dropdown:hover .dropdown__wrapper {
    opacity: 1;
    visibility: visible;
  }
}
@media (max-width: 1023px) {
  .main-navigation .dropdown {
    z-index: 20;
    background-color: #fff;
  }
  .main-navigation .dropdown.dropdown--open .dropdown__wrapper {
    opacity: 1;
    visibility: visible;
  }
}
.top-navigation .dropdown {
  position: relative;
  z-index: 30;
}
.dropdown__trigger {
  position: relative;
  display: inline-block;
}
.main-navigation .dropdown__trigger {
  display: block;
}
@media (min-width: 1024px) {
  .main-navigation .dropdown__trigger {
    display: inline-block;
  }
}
.dropdown__wrapper {
  position: absolute;
  padding: 1.2rem 2rem;
  width: auto;
  background-color: #fff;
  -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
          box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity 0.2s ease, visibility 0.2s ease;
       -o-transition: opacity 0.2s ease, visibility 0.2s ease;
          transition: opacity 0.2s ease, visibility 0.2s ease;
}
.main-navigation .dropdown__wrapper {
  top: 4.45rem;
}
@media (max-width: 1023px) {
  .main-navigation .dropdown__wrapper {
    opacity: 1;
    visibility: visible;
    right: 0;
    -webkit-box-shadow: none;
            box-shadow: none;
    width: 100%;
    top: 14.2rem;
    -webkit-transform: translate(100%, 0);
        -ms-transform: translate(100%, 0);
         -o-transform: translate(100%, 0);
            transform: translate(100%, 0);
    bottom: 0;
    z-index: 20;
    -webkit-transition: 0.2s ease;
         -o-transition: 0.2s ease;
            transition: 0.2s ease;
    padding-top: 0;
  }
  .main-navigation .dropdown--open .dropdown__wrapper {
    -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
         -o-transform: translate(0, 0);
            transform: translate(0, 0);
  }
}
.dropdown__link {
  display: block;
  color: #000;
  text-decoration: none;
  font-size: 1.6rem;
  line-height: 3rem;
  white-space: nowrap;
  padding: 0;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
}
.dropdown__link:hover {
  color: #009ee3;
}
.dropdown__link.active {
  color: #009ee3;
}
@media (min-width: 1024px) {
  .dropdown__link {
    font-size: 1.8rem;
    line-height: 3.2rem;
    padding: 0;
  }
}
@media (max-width: 1023px) {
  .mobile-navigation .dropdown__link:hover {
    color: #000;
  }
}
@media (min-width: 1024px) {
  .dropdown__mobile {
    display: none;
  }
}
.dropdown__back {
  text-decoration: none;
  display: block;
  color: #000;
  padding-right: 2rem;
  margin-bottom: 1.1rem;
  padding-bottom: 0.3rem;
  font-size: 1.6rem;
  line-height: 4rem;
  border-bottom: 0.1rem solid #CCCCCC;
}
.dropdown__back:after {
  font-family: "pleio";
  content: "\e900";
  position: absolute;
  right: 2.5rem;
  font-size: 1rem;
}
.dropdown__subject {
  display: block;
  color: #000;
  font-family: "ROsanswebtext_bold", sans-serif;
  text-decoration: none;
  font-size: 1.6rem;
  line-height: 3rem;
}
.question-modal {
  background-color: #fff;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 40;
  padding: 4rem;
  visibility: hidden;
  opacity: 0;
  -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.24);
          box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.24);
  -webkit-transition: opacity 0.25s, visibility 0.25s;
       -o-transition: opacity 0.25s, visibility 0.25s;
          transition: opacity 0.25s, visibility 0.25s;
  overflow: auto;
}
.question-modal--open .question-modal {
  visibility: visible;
  opacity: 1;
}
@media (min-width: 768px) {
  .question-modal {
    max-width: 72.8rem;
    width: 100%;
    left: 50%;
    top: 50%;
    bottom: auto;
    right: auto;
    height: auto;
    overflow: visible;
    -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
         -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
  }
}
.question-modal__content {
  display: block;
  position: relative;
  opacity: 1;
  -webkit-transition: opacity 0.3s;
       -o-transition: opacity 0.3s;
          transition: opacity 0.3s;
}
.question-modal__close {
  position: absolute;
  right: 0;
  top: 0;
  text-decoration: none;
  color: #B4B4B4;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
  font-size: 1.4rem;
}
.question-modal__close:hover {
  color: #009ee3;
}
.question-modal__title {
  padding-right: 3rem;
  font-size: 2.8rem;
  line-height: 4.2rem;
  margin: 0 0 2rem;
  color: #009ee3;
}
@media (min-width: 768px) {
  .question-modal__title {
    font-size: 3.6rem;
    line-height: 4.2rem;
    margin-bottom: 1rem;
  }
}
.question-modal__input {
  width: 100%;
  border: 0.1rem solid #B4B4B4;
  padding: 0.3rem 1.5rem 0.3rem 1.5rem;
  font-size: 1.6rem;
  line-height: 3.2rem;
}
@media (min-width: 768px) {
  .question-modal__input {
    font-size: 1.8rem;
  }
}
.question-modal__textarea {
  padding: 1rem 1.5rem 1rem 1.5rem;
  width: 100%;
  font-size: 1.6rem;
  line-height: 2.2rem;
  display: block;
  resize: none;
  min-height: 22rem;
  border: 0.1rem solid #B4B4B4;
}
@media (min-width: 768px) {
  .question-modal__textarea {
    font-size: 1.8rem;
    line-height: 2.4rem;
  }
}
.question-modal__select .selecter-selected {
  border: 0.1rem solid #B4B4B4;
  max-width: 100%;
}
.question-modal__submit {
  margin-top: 1rem;
  float: right;
  color: #fff;
  display: inline-block;
}
.question-modal__submit:hover {
  background-color: #009ee3;
}
.video-modal {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  display: none;
  z-index: 9999;
}
.video-modal__box {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
       -o-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  width: 98.4rem;
  height: 55.3rem;
  z-index: 9999;
}
@media (max-width: 767px) {
  .video-modal__box {
    width: 70%;
    height: 20rem;
  }
}
.video-modal__box iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.video-modal__overlay {
  background-color: rgba(0, 0, 0, 0.5);
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 100;
}
.video-modal__close {
  background-color: #fff;
  color: #000;
  position: absolute;
  top: 0;
  right: 0;
  width: 3rem;
  height: 3rem;
  border-radius: 50%;
  -webkit-transform: translate(50%, -50%);
      -ms-transform: translate(50%, -50%);
       -o-transform: translate(50%, -50%);
          transform: translate(50%, -50%);
  z-index: 9999;
  cursor: pointer;
  display: block;
}
.video-modal__close:before {
  font-family: "pleio";
  content: "\e911";
  font-size: 1.3rem;
  text-align: center;
  line-height: 3.1rem;
  display: block;
  color: #000;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 10;
  width: 3rem;
  height: 3rem;
}
.forum-action {
  background-color: #DDEFF8;
  margin-left: -2rem;
  margin-right: -2rem;
  padding: 2.5rem 2rem;
}
@media (min-width: 768px) {
  .forum-action {
    margin: 10.5rem 0 0;
    min-height: 17.2rem;
    padding: 3rem 4rem 4rem;
  }
}
.forum-action__title {
  font-size: 2.8rem;
  line-height: 3.4rem;
  margin: 0 0 0.5rem;
  color: #009ee3;
}
@media (min-width: 768px) {
  .forum-action__title {
    margin: 0 0 2rem;
  }
}
.forum-action__indicator {
  color: #8FCAE7;
  text-align: right;
  line-height: 3.4rem;
}
.forum-action__indicator p {
  margin: 0;
}
@media (min-width: 680px) {
  .forum-action__indicator p {
    padding-right: 4rem;
  }
}
.forum-action__indicator .icon {
  font-size: 3.1rem;
  position: absolute;
  padding-left: 0.9rem;
  display: none;
}
@media (min-width: 680px) {
  .forum-action__indicator .icon {
    display: inline-block;
  }
}
.forum-action__button {
  width: 100%;
  margin-top: 1rem;
  text-align: center;
}
@media (min-width: 768px) {
  .forum-action__button {
    float: right;
    width: auto;
    margin-top: 0;
  }
}
.forum-action__separate-text {
  line-height: 4.6rem;
  color: #B4B4B4;
  display: none;
}
@media (min-width: 768px) {
  .forum-action__separate-text {
    display: inline-block;
  }
}
@media (min-width: 1024px) {
  .forum-action__separate-text {
    position: absolute;
    -webkit-transform: translate(-25%, 0);
        -ms-transform: translate(-25%, 0);
         -o-transform: translate(-25%, 0);
            transform: translate(-25%, 0);
    left: auto;
  }
}
.forum-action__search {
  position: relative;
  width: 100%;
  margin: 0 auto;
  z-index: 10;
}
.forum-action__search:before {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.1);
  content: "";
  visibility: hidden;
  opacity: 0;
  pointer-events: none;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.forum-action__search.open:before {
  visibility: visible;
  opacity: 1;
}
.forum-action__search__label {
  position: absolute;
  right: 2rem;
  top: 0;
  bottom: 0;
  line-height: 5.2rem;
  padding: 0 0 0 0.1rem;
  color: #01689b;
  text-shadow: none;
  font-size: 2.1rem;
  z-index: 16;
}
.forum-action__search__label .icon-search {
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
  margin-top: 0.1rem;
}
.forum-action__search__label .icon-circle-arrow {
  position: absolute;
  -webkit-animation: spin 1.8s linear infinite;
       -o-animation: spin 1.8s linear infinite;
          animation: spin 1.8s linear infinite;
  visibility: hidden;
  opacity: 0;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
  font-size: 1.8rem;
  top: 50%;
  color: #B4B4B4;
  -webkit-transform: translate(0, -50%);
      -ms-transform: translate(0, -50%);
       -o-transform: translate(0, -50%);
          transform: translate(0, -50%);
}
.open .forum-action__search__label .icon-search {
  opacity: 0;
  visibility: hidden;
}
.typing .forum-action__search__label .icon-search {
  visibility: hidden;
  opacity: 0;
}
.typing .forum-action__search__label .icon-circle-arrow {
  visibility: visible;
  opacity: 1;
}
@media (max-width: 767px) {
  .forum-action__search__label {
    line-height: 4.5rem;
  }
}
.forum-action__search__input {
  position: relative;
  z-index: 6;
  width: 100%;
  border-radius: 0;
  height: 4.6rem;
  font-size: 1.8rem;
  line-height: 2.4rem;
  padding: 1.1rem 5rem 1rem 2rem;
  color: #000;
  border: 0.1rem solid #B4B4B4;
}
@media (max-width: 767px) {
  .forum-action__search__input {
    height: 4rem;
  }
}
.forum-action__search__submit-button {
  -webkit-appearance: none;
  -moz-appearance: none;
  border: none;
  cursor: pointer;
  font-family: "ROsanswebtext_regular", sans-serif;
  position: absolute;
  right: 2rem;
  top: 1.2rem;
  color: #01689b;
  text-shadow: none;
  font-size: 2.1rem;
  background-color: transparent;
  padding: 0 0 0 0.1rem;
  z-index: 70;
}
.forum-section {
  padding: 0.5rem 0 2rem;
  background-color: #fff;
}
.forum-section.forum-section--grey {
  padding: 1rem 0 1.5rem;
  background-color: #F3F3F3;
}
@media (min-width: 768px) {
  .forum-section.forum-section--grey {
    padding: 2rem 0 1.5rem;
    background-color: #F3F3F3;
  }
}
.profiled .forum-section.forum-section--grey {
  background-color: #F3F3F3;
}
.forum-section.last-section {
  padding-bottom: 7.2rem !important;
}
@media (min-width: 768px) {
  .forum-section {
    padding: 3.5rem 0 2rem;
  }
}
.forum__filter {
  margin-bottom: 1rem;
}
@media (min-width: 768px) {
  .forum__filter {
    margin-bottom: 0;
  }
}
.forum__title {
  font-size: 3.6rem;
  line-height: 4.2rem;
  color: #009ee3;
  margin: 2rem 0 1rem;
  font-family: "ROsanswebtext_bold", sans-serif;
}
@media (min-width: 768px) {
  .forum__title {
    margin-bottom: 2rem;
    margin-top: 0;
  }
}
.forum-section__title {
  margin-top: 1rem;
  font-size: 2.8rem;
  line-height: 3.2rem;
  margin-bottom: 0rem;
  color: #01689b;
}
@media (min-width: 768px) {
  .forum-section__title {
    margin-bottom: 2rem;
    margin-top: 2rem;
  }
}
.forum-section__dropdown {
  width: 100%;
  margin-top: 1rem;
  margin-bottom: 1rem;
}
@media (min-width: 768px) {
  .forum-section__dropdown {
    margin-bottom: 2rem;
    margin-top: 2rem;
    max-width: 23.15rem;
  }
}
.forum-section__button {
  width: 100%;
  text-align: center;
  overflow: hidden;
}
@media (max-width: 767px) {
  .forum-section__button {
    width: 2.6rem;
    height: 2.6rem;
    line-height: 2.6rem;
    padding: 0;
    border-radius: 50%;
    font-size: 2.4rem;
    position: absolute;
    top: 0;
    right: 0;
    margin-top: -4.4rem;
    -webkit-transform: translate(-50%, 0);
        -ms-transform: translate(-50%, 0);
         -o-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
  }
  .forum-section__button span {
    display: none;
  }
}
.main-nav-results {
  position: absolute;
  left: 0;
  right: 0;
  width: 100%;
  height: auto;
  min-height: 0;
  top: 0;
  background-color: #f1f9fc;
  z-index: 20;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: visibility 0.2s, opacity 0.2s, top 0s 0.3s, height 0s 0.3s, min-height 0s 0.3s;
       -o-transition: visibility 0.2s, opacity 0.2s, top 0s 0.3s, height 0s 0.3s, min-height 0s 0.3s;
          transition: visibility 0.2s, opacity 0.2s, top 0s 0.3s, height 0s 0.3s, min-height 0s 0.3s;
  padding-top: 2.5rem;
  bottom: 0;
}
.main-nav-results.main-nav-search--open {
  opacity: 1;
  visibility: visible;
  top: 12.8rem;
  height: auto;
  min-height: 100%;
  -webkit-transition: visibility 0.2s, opacity 0.2s, top 0s 0s, height 0s 0s, min-height 0s 0s;
       -o-transition: visibility 0.2s, opacity 0.2s, top 0s 0s, height 0s 0s, min-height 0s 0s;
          transition: visibility 0.2s, opacity 0.2s, top 0s 0s, height 0s 0s, min-height 0s 0s;
  overflow-y: auto;
}
@media (min-width: 680px) {
  .main-nav-results.main-nav-search--open {
    top: 12.8rem;
  }
}
@media (min-width: 768px) {
  .main-nav-results {
    padding-top: 3.5rem;
  }
  .main-nav-results.main-nav-search--open {
    top: 13.3rem;
    height: auto;
    min-height: 100%;
    bottom: 0;
  }
}
@media (min-width: 1024px) {
  .main-nav-results.main-nav-search--open {
    top: 16.2rem;
  }
}
.main-nav-results .container {
  height: auto;
  padding-bottom: 10rem;
}
.main-nav-results__submit {
  color: #01689b;
  margin-top: 1rem;
  position: relative;
  padding-left: 1.3rem;
  text-decoration: none;
  display: inline-block;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.main-nav-results__submit:before {
  font-family: "pleio";
  content: "\e901";
  position: absolute;
  font-size: 1rem;
  line-height: 1;
  top: 50%;
  left: 0;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
       -o-transform: translateY(-50%);
          transform: translateY(-50%);
  display: block;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
  color: #01689b;
}
.main-nav-results__submit:hover {
  color: #009ee3;
}
.main-nav-search {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  line-height: 4rem;
  min-height: 4rem;
  background-color: #DDEFF8;
  opacity: 0;
  visibility: hidden;
  -webkit-transition: visibility 0.3s ease, opacity 0.3s;
       -o-transition: visibility 0.3s ease, opacity 0.3s;
          transition: visibility 0.3s ease, opacity 0.3s;
}
.main-nav-search--open .main-nav-search {
  -webkit-transition: visibility 0s ease, opacity 0.3s;
       -o-transition: visibility 0s ease, opacity 0.3s;
          transition: visibility 0s ease, opacity 0.3s;
  opacity: 1;
  visibility: visible;
}
@media (min-width: 768px) {
  .main-nav-search {
    line-height: 4.5rem;
  }
}
.main-nav-search__input {
  width: 100%;
  border: none;
  background-color: transparent;
  position: absolute;
  left: 0;
  height: 4rem;
  font-family: "ROsanswebtext_bold", sans-serif;
  padding: 1rem 10rem 1rem 4rem;
  color: #01689b;
  line-height: 4rem;
}
@media (min-width: 768px) {
  .main-nav-search__input {
    height: 4.5rem;
  }
}
.main-nav-search__label {
  font-size: 1.3rem;
  line-height: 1;
  color: #01689b;
  position: absolute;
  top: 50%;
  left: 2rem;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
       -o-transform: translateY(-50%);
          transform: translateY(-50%);
}
.main-nav-search__close {
  float: right;
  position: relative;
  z-index: 100;
  display: block;
  font-size: 1.8rem;
  padding: 0.2rem 2rem 0 2rem;
  line-height: 3.8rem;
  color: #01689b;
  font-family: "ROsanswebtext_bold", sans-serif;
  text-decoration: none;
  -webkit-transition: color 0.2s;
       -o-transition: color 0.2s;
          transition: color 0.2s;
  text-indent: -9999px;
}
.main-nav-search__close:before {
  font-family: "pleio";
  content: "\e911";
  position: absolute;
  font-size: 1.2rem;
  line-height: 1;
  top: 50%;
  right: 1rem;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
       -o-transform: translateY(-50%);
          transform: translateY(-50%);
  display: block;
  color: #01689b;
  text-indent: 0;
}
@media (min-width: 680px) {
  .main-nav-search__close:before {
    display: none;
  }
}
@media (min-width: 680px) {
  .main-nav-search__close {
    padding: 0 2rem;
    text-indent: 0;
  }
}
@media (min-width: 768px) {
  .main-nav-search__close {
    line-height: 4.3rem;
    padding: 0.2rem 1rem 0 2rem;
  }
}
.main-nav-search__close:hover {
  color: #154273;
}
.main-nav-search__container {
  position: relative;
}
.nav-result-list {
  margin-bottom: 3rem;
}
.nav-result-list__title {
  line-height: 2.8rem;
  font-size: 2.2rem;
  margin: 0 0 1rem 0;
}
.nav-result-list__item {
  display: block;
  text-decoration: none;
  color: #000;
  padding-left: 1.2rem;
  position: relative;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
  margin-bottom: 0.6rem;
  font-size: 1.8rem;
}
.nav-result-list__item:before {
  font-family: "pleio";
  content: "\e901";
  position: absolute;
  font-size: 1rem;
  line-height: 1;
  top: 0.6rem;
  left: 0;
  display: block;
  -webkit-transition: all 0.2s ease;
       -o-transition: all 0.2s ease;
          transition: all 0.2s ease;
  color: #01689b;
}
.nav-result-list__item:hover {
  color: #009ee3;
}
.nav-result-list__item span {
  color: #01689b;
}
@media (max-width: 767px) {
  .nav-result-list__item {
    font-size: 1.6rem;
  }
}
.news {
  padding-top: 3rem;
}
.news__filter {
  margin-bottom: 0.5rem;
}
@media (min-width: 1024px) {
  .news__filter {
    margin-bottom: 2.5rem;
  }
}
.news__featured-article {
  margin-bottom: 2rem;
}
.news__pagination {
  padding: 4rem 0 7.2rem 0;
  float: right;
  width: 100%;
  overflow: hidden;
}
@media (min-width: 680px) {
  .news__pagination {
    width: auto;
  }
}
.news-item__lead {
  height: 10rem;
  background-position: center top;
  -webkit-background-size: cover;
          background-size: cover;
}
@media (min-width: 768px) {
  .news-item__lead {
    height: 33rem;
  }
}
.news-item__title {
  color: #009ee3;
  font-size: 2.8rem;
  line-height: 3.4rem;
  margin: 1.5rem 0 1rem 0;
}
@media (min-width: 768px) {
  .news-item__title {
    margin: 3.5rem 0 1.5rem 0;
    font-size: 3.6rem;
    line-height: 4.2rem;
  }
}
.news-item__meta {
  margin-bottom: 2rem;
  font-size: 1.6rem;
  line-height: 2.2rem;
  overflow: hidden;
}
@media (min-width: 768px) {
  .news-item__meta {
    margin-bottom: 3.5rem;
  }
}
.news-item__meta__date {
  float: left;
  color: #01689b;
  font-family: "ROsanswebtext_bold", sans-serif;
  font-weight: 400;
  margin-right: 0.5rem;
}
.news-item__meta__source {
  color: #B4B4B4;
  float: left;
  margin-top: -0.1rem;
}
.news-item__meta__source a {
  color: #01689b;
  font-family: "ROsanswebtext_bold", sans-serif;
  text-decoration: none;
  margin-left: 0.3rem;
}
.news-item__actions {
  padding: 4rem 0 4rem 0;
  overflow: hidden;
}
.news-item__popular-articles {
  background-color: #F3F3F3;
  padding: 3.5rem 0 7.2rem 0;
}
.forum-item {
  padding: 2rem 0 7.2rem;
}
@media (min-width: 768px) {
  .forum-item {
    padding: 4rem 0 7.2rem;
  }
}
.forum-item__title {
  font-size: 2.8rem;
  line-height: 3.4rem;
  margin: 2rem 0;
  color: #009ee3;
}
@media (min-width: 768px) {
  .forum-item__title {
    font-size: 3.6rem;
    line-height: 4.4rem;
  }
}
.forum-item__meta {
  padding-left: 4rem;
  position: relative;
}
.forum-item__profile {
  max-width: 3rem;
  border-radius: 50%;
  display: inline-block;
  position: absolute;
  left: 0;
}
.forum-item__data {
  display: inline-block;
  line-height: 3.2rem;
  font-size: 1.6rem;
  color: #B4B4B4;
}
.forum-item__data a {
  margin-right: 0.4rem;
  font-family: "ROsanswebtext_bold", sans-serif;
  border-bottom: 1px dotted #009ee3;
  text-decoration: none;
  color: #009ee3;
  -webkit-transition: color 0.2s ease, border 0.2s ease;
       -o-transition: color 0.2s ease, border 0.2s ease;
          transition: color 0.2s ease, border 0.2s ease;
}
.forum-item__data a:hover {
  border-bottom: 1px dotted #009ee3;
}
.forum-item__content {
  margin: 2rem 0;
}
@media (min-width: 768px) {
  .forum-item__content {
    margin: 2rem 0 4rem;
  }
}
.forum-item__options {
  padding-top: 5rem;
  position: relative;
}
@media (min-width: 768px) {
  .forum-item__options {
    padding-top: 0;
  }
}
@media (min-width: 768px) {
  .forum-item__button {
    float: left;
  }
}
.forum-item__mobile-top {
  position: absolute;
  top: 0;
}
@media (min-width: 768px) {
  .forum-item__mobile-top {
    position: relative;
    top: auto;
    display: inline-block;
  }
}
.forum-item__views {
  display: inline-block;
  color: #B4B4B4;
  position: relative;
  padding-left: 1.9rem;
  font-size: 1.6rem;
}
.forum-item__views:before {
  position: absolute;
  left: 0;
  content: "\e906";
  font-family: "pleio";
}
@media (min-width: 768px) {
  .forum-item__views {
    margin-left: 1.5rem;
  }
}
.forum-item__follow {
  display: inline-block;
  font-size: 1.6rem;
  color: #B4B4B4;
  margin-left: 1.5rem;
  position: relative;
  text-decoration: none;
  padding-left: 2rem;
}
.forum-item__follow:before {
  left: 0;
  position: absolute;
  content: "\e909";
  font-family: "pleio";
}
.forum-item__follow:hover {
  color: #009ee3;
}
.forum-item__amount {
  position: relative;
  padding-left: 2.5rem;
  display: block;
  text-decoration: none;
  color: #535353;
  font-family: "ROsanswebtext_bold", sans-serif;
  line-height: 2.2rem;
  font-size: 1.6rem;
  margin-top: 3rem;
}
.forum-item__amount:before {
  content: "\e907";
  font-family: "pleio";
  position: absolute;
  left: 0;
  color: #009ee3;
}
@media (min-width: 768px) {
  .forum-item__amount {
    display: block;
    line-height: 2.4rem;
    font-size: 1.8rem;
    margin-top: 4rem;
  }
}
.video-section {
  padding: 4rem 0 7.2rem;
}
.profile-section {
  background-color: #fff;
}
.profile__title {
  font-size: 3.6rem;
  line-height: 4.2rem;
  color: #009ee3;
  margin: 2.5rem 0;
}
.profile__filter {
  margin: 2.5rem 0;
}
.content-header {
  background-color: #fff;
  padding: 4rem 0 0;
}
.content-header.content-header__search-results {
  margin-bottom: 1.5rem;
}
.content-header__search-results .content-header__menu {
  margin-top: 5rem;
}
.content-header__link {
  text-decoration: none;
  font-size: 1.6rem;
  line-height: 3.2rem;
  color: #000;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
  margin: 0 1.5rem 0 0;
  padding: 0 0 0.8rem;
  position: relative;
  display: inline-block;
}
.content-header__link:hover {
  color: #009ee3;
}
.content-header__link:after {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  width: 100%;
  bottom: 0;
  border-bottom: 0.5rem solid transparent;
}
.content-header__link.active {
  color: #01689b;
}
.content-header__link.active:after {
  border-bottom: 0.5rem solid #009ee3;
}
@media (min-width: 768px) {
  .content-header__link {
    font-size: 1.8rem;
    margin: 0 2rem 0 0;
    padding: 0 0.5rem 0.8rem;
  }
}
.search-results__pagination {
  padding: 4rem 0 7.2rem 0;
  float: right;
  width: 100%;
  overflow: hidden;
}
@media (min-width: 768px) {
  .search-results__pagination {
    width: auto;
  }
}
.search-results__amount {
  display: none;
}
@media (min-width: 768px) {
  .search-results__amount {
    display: block;
    color: #B4B4B4;
    min-height: 4.6rem;
    line-height: 4.6rem;
  }
}
.mce-tinymce {
  border: 1px solid #B4B4B4 !important;
}
.mce-tinymce * {
  -webkit-box-sizing: border-box !important;
          box-sizing: border-box !important;
}
.mce-toolbar-grp {
  border-bottom: 1px solid #B4B4B4 !important;
  height: 4.5rem  !important;
  line-height: 4.5rem  !important;
}
.mce-edit-area {
  border-top: none !important;
}
.mce-statusbar {
  display: none !important;
}
.mce-ico {
  color: #B4B4B4 !important;
  -webkit-transition: color 0.2s ease;
       -o-transition: color 0.2s ease;
          transition: color 0.2s ease;
  font-size: 1.45rem !important;
  text-align: center !important;
}
.mce-ico:before {
  position: absolute;
  left: 50%;
  -webkit-transform: translate(-50%, 0);
      -ms-transform: translate(-50%, 0);
       -o-transform: translate(-50%, 0);
          transform: translate(-50%, 0);
}
.mce-active .mce-ico {
  color: #000 !important;
}
.mce-i-bold:before {
  font-family: "pleio";
  content: "\e927" !important;
}
.mce-i-italic {
  font-size: 1.4rem !important;
}
.mce-i-italic:before {
  font-family: "pleio";
  content: "\e926" !important;
}
.mce-i-numlist {
  font-size: 1.4rem !important;
}
.mce-i-numlist:before {
  font-family: "pleio";
  content: "\e925" !important;
}
.mce-i-bullist {
  font-size: 1.35rem !important;
}
.mce-i-bullist:before {
  font-family: "pleio";
  content: "\e924" !important;
}
.mce-i-link {
  font-size: 10px !important;
  margin-left: -2px;
}
.mce-i-link:before {
  font-family: "pleio";
  content: "\e923" !important;
}
.mce-i-image:before {
  font-family: "pleio";
  content: "\e922" !important;
}
.mce-btn button {
  background-color: #fff !important;
  border: none;
  padding: 0 !important;
  margin-right: 1rem !important;
}
.mce-btn button:hover {
  background-color: #fff;
}
.mce-btn {
  background-color: #fff !important;
  border: none !important;
}
.mce-btn:hover .mce-ico {
  color: #009ee3 !important;
}
#mceu_5 {
  position: absolute !important;
  right: 1rem;
}
.mce-panel {
  background-color: #fff !important;
}
.mce-open {
  display: none;
}
.mce-menu-item-normal.mce-active {
  background-color: #009ee3 !important;
}
.mce-menu-item-normal:hover {
  background-color: #009ee3 !important;
}
.mce-toolbar-grp {
  padding: 1rem 1rem !important;
}
@media (min-width: 768px) {
  #mce_0_ifr {
    height: 17.1rem !important;
  }
}
.mce-tooltip {
  display: none !important;
}