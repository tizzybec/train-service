
/* ../source/dom/dom.css */

/* things we always want */
body {
	font-family: 'Helvetica Neue', 'Nimbus Sans L', Arial, sans-serif;
}

/* allow hw-accelerated scrolling on platforms that support it */
body.webkitOverflowScrolling {
	-webkit-overflow-scrolling: touch;
}

/* for apps */
.enyo-document-fit {
	margin: 0;
	height: 100%;
	/* note: giving html overflow: auto is odd and was only ever done to avoid duplication
		however, android 4.04 sometimes does not hide nodes when their display is set to none
		if document is overflow auto.
	*/
	position: relative;
}

.enyo-body-fit {
	margin: 0;
	height: 100%;
	/* helps prevent ios page scroll */
	overflow: auto;
	position: relative;
}

.enyo-no-touch-action {
	-ms-touch-action: none;
}

/* reset */

button {
	font-size: inherit;
	font-family: inherit;
}
button::-moz-focus-inner {
    border: 0;
    padding: 0;
}

/* user selection */

.enyo-unselectable {
	cursor: default;
	-ms-user-select: none;
	-webkit-user-select: none;
	-moz-user-select: -moz-none;
	user-select: none;
}

.enyo-unselectable::selection, .enyo-unselectable ::selection {
	color: transparent;
}

.enyo-selectable {
	cursor: auto;
	-ms-user-select: element;
	-webkit-user-select: text;
	-moz-user-select: text;
	user-select: text;
}

.enyo-selectable::selection, .enyo-selectable ::selection {
	background: #3297FD;
	color: #FFF;
}

/* layout */

body .enyo-fit {
	position: absolute;
	left: 0;
	top: 0;
	right: 0;
	bottom: 0;
}

.enyo-clip {
	overflow: hidden;
}

.enyo-border-box {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

/* compositing */

.enyo-composite {
	-webkit-transform: translateZ(0);
	-moz-transform: translateZ(0);
	-ms-transform: translateZ(0);
	-o-transform: translateZ(0);
	transform: translateZ(0);
}


/* ../source/touch/Thumb.css */

.enyo-thumb {
	position: absolute;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	border-radius: 4px;
	background: #333;
	border: 1px solid #666;
	opacity: 0.75;
	z-index: 1;
}

.enyo-vthumb {
	top: 0;
	right: 2px;
	width: 4px;
}

.enyo-hthumb {
	left: 0;
	bottom: 2px;
	height: 4px;
}


/* ../source/touch/Scroller.css */

.enyo-scroller {
	position: relative;
}

.enyo-fit.enyo-scroller {
	position: absolute;
}

.enyo-touch-scroller {
	overflow: hidden;
}

.enyo-touch-strategy-container {
	overflow: hidden;
}

.enyo-scrollee-fit {
	height: 100%;
}

/* ../source/ui/ui.css */

.enyo-inline, .enyo-tool-decorator {
	display: inline-block;
}

.enyo-children-inline > *, .enyo-tool-decorator > * {
	display: inline-block;
}

.enyo-children-middle > *, .enyo-tool-decorator > * {
	vertical-align: middle;
}

.enyo-positioned {
	position: relative;
}

.enyo-fill {
	position: relative;
	width: 100%;
	height: 100%;
}

.enyo-popup {
	position: absolute;
	z-index: 10;
}

/* /home/dinsy/Projects/bootplate/enyo/../lib/layout/fittable/source/FittableLayout.css */

.enyo-fittable-rows-layout {
	position: relative;
}

.enyo-fittable-rows-layout > * {
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	/* float when not stretched */
	float: left;
	clear: both;
}

/* non-floating when stretched */
.enyo-fittable-rows-layout.enyo-stretch > * {
	float: none;
	clear: none;
}

/* setting to enforce margin collapsing */
/* NOTE: rows cannot have margin left/right */
.enyo-fittable-rows-layout.enyo-stretch.enyo-margin-expand > * {
	float: left;
	clear: both;
	width: 100%;
	/* note: harsh resets */
	margin-left: 0 !important;
	margin-right: 0 !important;
}

.enyo-fittable-columns-layout {
	position: relative;
	text-align: left;
	white-space: nowrap;
}

.enyo-fittable-columns-layout.enyo-center {
	text-align: center;
}

.enyo-fittable-columns-layout > * {
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	vertical-align: top;
	display: inline-block;
	white-space: normal;
}

.enyo-fittable-columns-layout.enyo-tool-decorator > * {
	vertical-align: middle;
}

/* repair clobbered white-space setting for pre, code */
.enyo-fittable-columns-layout > pre, .enyo-fittable-columns-layout > code {
	white-space: pre;
}

.enyo-fittable-columns-layout > .enyo-fittable-columns-layout, .enyo-fittable-columns-layout > .onyx-toolbar-inline {
	white-space: nowrap;
}

/* NOTE: columns cannot have margin top/bottom */
.enyo-fittable-columns-layout.enyo-stretch > * {
	height: 100%;
	/* note: harsh resets */
	margin-top: 0 !important;
	margin-bottom: 0 !important;
}

/* /home/dinsy/Projects/bootplate/enyo/../lib/layout/list/source/List.css */

.enyo-list {
	position: relative;
}

.enyo-list-port {
	overflow: hidden;
	position: relative;
	height: 1000000px;
}

.enyo-list-page, .enyo-list-holdingarea {
	position: absolute;
	left: 0;
	right: 0;
}

.enyo-list-holdingarea {
	top: -10000px;
}

.enyo-pinned-list-placeholder {
	border: 1px solid red;
	position: absolute;
	top: 0; left: 0;
	z-index: 1000;
	background: transparent;
	overflow: hidden;
}

.enyo-pinned-list-placeholder button {
	width: 100px; height: 100%;
	position: absolute;
	top: 0; right: 0;
}

.enyo-list-reorder-container {
	position: absolute;
	top: 0; left: 0;
	z-index: 1000;
	background: transparent;
	overflow: hidden;
}

.enyo-animatedTopAndLeft {
	-webkit-transition: top 0.1s linear, left 0.1s linear;
	-moz-transition: top 0.1s linear, left 0.1s linear;
	-o-transition: top 0.1s linear, left 0.1s linear;
	transition: top 0.1s linear, left 0.1s linear;
}

/* /home/dinsy/Projects/bootplate/enyo/../lib/layout/list/source/PulldownList.css */

.enyo-list-pulldown {
	position: absolute;
	bottom: 100%;
	left: 0;
	right: 0;
}

.enyo-puller {
	position: relative;
	height: 50px;
	font-size: 22px;
	color: #444;
	padding: 20px 0 0px 34px;
}

.enyo-puller-text {
	position: absolute;
	left: 80px;
	top: 22px;
}

.enyo-puller-arrow {
	position: relative;
	background: #444;
	width: 7px;
	height: 28px;
	transition: transform 0.3s;
	-webkit-transition: -webkit-transform 0.3s;
	-moz-transition: -moz-transform 0.3s;
	-o-transition: -o-transform 0.3s;
	-ms-transition: -ms-transform 0.3s;
}

.enyo-puller-arrow:after {
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	border: 10px solid transparent;
	border-bottom-color: #444;
	bottom: 100%;
	left: 50%;
	margin-left: -10px;
}

.enyo-puller-arrow-up {
	transform: rotate(0deg);
	-webkit-transform: rotate(0deg);
	-moz-transform: rotate(0deg);
	-o-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
}

.enyo-puller-arrow-down {
	transform: rotate(180deg);
	-webkit-transform: rotate(180deg);
	-moz-transform: rotate(180deg);
	-o-transform: rotate(180deg);
	-ms-transform: rotate(180deg);
}

/* /home/dinsy/Projects/bootplate/enyo/../lib/layout/panels/source/arrangers/Arranger.css */

.enyo-arranger {
	position: relative;
	overflow: hidden;
}

.enyo-arranger.enyo-fit {
	position: absolute;
}

.enyo-arranger > * {
	position: absolute;
	left: 0;
	top: 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.enyo-arranger-fit > * {
	/* override any width/height set on panels */
	width: 100% !important;
	height: 100% !important;
	min-width: 0 !important;
	min-height: 0 !important;
}


/* /home/dinsy/Projects/bootplate/enyo/../lib/layout/panels/source/Panels.css */

.enyo-panels {
}

.enyo-panels-fit-narrow {
}

@media all and (max-width: 800px) {
	.enyo-panels-fit-narrow > * {
		min-width: 100%;
		max-width: 100%;
	}
}

/* /home/dinsy/Projects/bootplate/enyo/../lib/layout/tree/source/Node.css */

.enyo-node {
	cursor: default;
	padding: 4px;
}

.enyo-node img {
	vertical-align: middle;
	padding-right: 6px;
}

.enyo-node-box {
	overflow: hidden;
}

.enyo-node-client {
	position: relative;
}

.enyo-animate .enyo-node-box, .enyo-animate .enyo-node-client {
	-ms-transition-property: height, top;
	-ms-transition-duration: 0.2s, 0.2s;
	-moz-transition-property: height, top;
	-moz-transition-duration: 0.2s, 0.2s;
	-o-transition-property: height, top;
	-o-transition-duration: 0.2s, 0.2s;
	-webkit-transition-property: height, top;
	-webkit-transition-duration: 0.2s, 0.2s;
	transition-property: height, top;
	transition-duration: 0.2s, 0.2s;
}


/* /home/dinsy/Projects/bootplate/enyo/../lib/layout/imageview/source/ImageViewPin.css */


.pinDebug {
	background:yellow;
	border:1px solid yellow;
}

/* /home/dinsy/Projects/bootplate/enyo/../lib/onyx/css/onyx.less */

/* Onyx default parameters defined here */
/* Fonts */
/* ---------------------------------------*/
/* Text Colors */
/* ---------------------------------------*/
/* Background Colors */
/* ---------------------------------------*/
/* Border Radius */
/* ---------------------------------------*/
/* Padding */
/* ---------------------------------------*/
/* Icon Sizes */
/* ---------------------------------------*/
/* Disabled Opacity */
/* ---------------------------------------*/
/* Gradient Overlays */
/* ---------------------------------------*/
/* Images */
/* ---------------------------------------*/
/* Onyx rules defined here */
/* onyx-classes.less - combined CSS (less) files for all released Onyx controls
   into single onyx.less file to avoid IE bug that allows
   a maximum of 31 style sheets to be loaded before silently failing */
.onyx {
  color: #333333;
  font-family: 'Helvetica Neue', 'Nimbus Sans L', Arial, sans-serif;
  font-size: 20px;
  cursor: default;
  background-color: #eaeaea;
  /* remove automatic tap highlight color */

  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
/* prevent IE from inheriting line-height for these elements */
.onyx button,
.onyx label,
.onyx input {
  line-height: normal;
}
.onyx-selected {
  background-color: #c4e3fe;
}
/* LESS pre-calculations */
/* Individual Widget CSS */
/* Icon.css */
.onyx-icon,
.onyx-icon-toggle {
  width: 32px;
  height: 32px;
  background-repeat: no-repeat;
  display: inline-block;
  vertical-align: middle;
}
.onyx-icon.onyx-icon-button.active,
.onyx-icon.onyx-icon-button.pressed,
.onyx-icon.onyx-icon-button:active:hover,
.onyx-icon-toggle.active {
  background-position: 0 -32px;
}
.onyx-icon.disabled {
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-icon.disabled:active:hover {
  background-position: 0 0px;
}
/* Button.css */
.onyx-button {
  outline: 0;
  color: #292929;
  font-size: 16px;
  text-align: center;
  white-space: nowrap;
  margin: 0;
  padding: 6px 18px;
  overflow: hidden;
  border-radius: 3px;
  /* for IE8 */

  border: 1px solid #707070;
  border: 1px solid rgba(15, 15, 15, 0.2);
  /*
		The border and the gradient interact in a strange way that
		causes the bottom-border (top if the gradient is aligned top)
		to be lighter than other borders.
		We can fix it by using the darker bottom border below, but
		then there are a few rogue pixels that end up very dark.
	*/

  /* border-bottom: 1px solid rgba(15, 15, 15, 0.5); */

  box-shadow: inset 0px 1px 0px rgba(255, 255, 255, 0.2);
  background: #e1e1e1 url(../lib/onyx/images/gradient.png) repeat-x bottom;
  background-size: contain;
  /**/

  text-overflow: ellipsis;
  /* the following cause arcane problems on IE */

  /*
	min-width: 14px;
	min-height: 20px;
	*/

}
/*
	IE8 can't handle these selectors in tandem:
	.onyx-button.active, .onyx-button:active:not([disabled]) {

	the effect is as if .onyx-button.active doesn't exist
*/
.onyx-button.active,
.onyx-button.pressed {
  background-image: url(../lib/onyx/images/gradient-invert.png);
  background-position: top;
  border-top: 1px solid rgba(15, 15, 15, 0.6);
  box-shadow: inset 0px 1px 0px rgba(0, 0, 0, 0.1);
}
.onyx-button:active:hover:not([disabled]) {
  background-image: url(../lib/onyx/images/gradient-invert.png);
  background-position: top;
  border-top: 1px solid rgba(15, 15, 15, 0.6);
  box-shadow: inset 0px 1px 0px rgba(0, 0, 0, 0.1);
}
.onyx-button[disabled] {
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-button > img {
  padding: 0px 3px;
}
/* Remove the focused inner-border style in Firefox (Windows) */
.onyx-button::-moz-focus-inner {
  border: 0;
}
/* Checkbox.css */
.onyx-checkbox {
  cursor: pointer;
  height: 32px;
  width: 32px;
  background: url(../lib/onyx/images/checkbox.png) no-repeat;
  /* reset for ? */

  margin: 0px;
  /* these entries cause toggle-button and checkbox to line up properly*/

  display: inline-block;
  vertical-align: middle;
}
.onyx-checkbox[checked] {
  background-position: 0px -32px;
}
.onyx-checkbox[disabled] {
  opacity: 0.4;
}
/* Grabber.css */
.onyx-grabber {
  background: url(../lib/onyx/images/grabbutton.png) no-repeat center;
  width: 23px;
  height: 27px;
}
/* Popup.css */
.onyx-popup {
  font-size: 16px;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  padding: 6px;
  color: #ffffff;
  background: #4c4c4c url(../lib/onyx/images/gradient.png) repeat-x 0 bottom;
}
.onyx-popup-decorator {
  position: relative;
}
/* Groupbox.css */
.onyx-groupbox > * {
  display: block;
  /*box-shadow: inset 0px 1px 1px rgba(255,255,255,0.5);*/

  border-color: #aaaaaa;
  border-style: solid;
  border-width: 0 1px 1px 1px;
  /*padding: 10px;*/

  /* reset styles that make 'item' look bad if they happen to be there */

  border-radius: 0;
  margin: 0;
  font-size: 16px;
}
.onyx-groupbox > *:first-child {
  border-top-color: #aaaaaa;
  border-width: 1px;
  border-radius: 4px 4px 0 0;
}
.onyx-groupbox > *:last-child {
  border-radius: 0 0 4px 4px;
}
.onyx-groupbox > *:first-child:last-child {
  border-radius: 4px;
}
.onyx-groupbox-header {
  padding: 2px 10px;
  color: #ffffff;
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
  /**/

  background-color: #4c4c4c;
  border: none;
  background: #4c4c4c url(../lib/onyx/images/gradient.png) repeat-x 0 10px;
}
.onyx-groupbox .onyx-input-decorator {
  display: block;
}
.onyx-groupbox > .onyx-input-decorator {
  border-color: #aaaaaa;
  border-width: 0 1px 1px 1px;
  border-radius: 0;
}
.onyx-groupbox > .onyx-input-decorator:first-child {
  border-width: 1px;
  border-radius: 4px 4px 0 0;
}
.onyx-groupbox > .onyx-input-decorator:last-child {
  border-radius: 0 0 4px 4px;
}
.onyx-groupbox > .onyx-input-decorator:first-child:last-child {
  border-radius: 4px;
}
/* Input.css */
.onyx-input-decorator {
  padding: 6px 8px 10px 8px;
  border-radius: 3px;
  border: 1px solid;
  border-color: rgba(0, 0, 0, 0.1);
  margin: 0;
}
.onyx-input-decorator.onyx-focused {
  box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.3);
  border-color: rgba(0, 0, 0, 0.3);
  background-color: #ffffff;
}
.onyx-input-decorator.onyx-disabled {
  /* FIXME: needed to color a disabled input placeholder. */

  /*-webkit-text-fill-color: #888;*/

  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-input-decorator > input {
  /* reset */

  margin: 0;
  padding: 0;
  border: none;
  outline: none;
  cursor: pointer;
  background-color: transparent;
  background-image: none;
  font-size: 16px;
  box-shadow: none;
  /* FIXME: hack for styling reset on Android */

  /* -webkit-appearance: caret;*/

}
.onyx-input-decorator.onyx-focused > input {
  cursor: text;
}
.onyx-input-decorator.onyx-disabled > input {
  cursor: default;
}
/* Menu.css */
.onyx-menu,
.onyx.onyx-menu {
  min-width: 160px;
  top: 100%;
  left: 0;
  margin-top: 2px;
  padding: 3px 0;
  border-radius: 3px;
}
.onyx-menu.onyx-menu-up {
  top: auto;
  bottom: 100%;
  margin-top: 0;
  margin-bottom: 2px;
}
.onyx-toolbar .onyx-menu {
  margin-top: 11px;
  border-radius: 0 0 3px 3px;
}
.onyx-toolbar .onyx-menu.onyx-menu-up {
  margin-top: 0;
  margin-bottom: 10px;
  border-radius: 3px 3px 0 0;
}
.onyx-menu-item {
  display: block;
  padding: 10px;
}
.onyx-menu-item:hover {
  background: #284152;
}
.onyx-menu-divider,
.onyx-menu-divider:hover {
  margin: 6px 0;
  padding: 0;
  border-bottom: 1px solid #aaa;
}
.onyx-menu-label {
  cursor: default;
  -webkit-user-select: none;
  -moz-user-select: -moz-none;
  user-select: none;
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-menu-label:hover {
  background: none;
}
/* customize a toolbar to support menus */
.onyx-menu-toolbar,
.onyx-toolbar.onyx-menu-toolbar {
  position: relative;
  z-index: 10;
  overflow: visible;
}
/* Picker.css */
.onyx-picker-decorator .onyx-button {
  padding: 10px 18px;
}
.onyx-picker {
  top: 0;
  margin-top: -3px;
  min-width: 0;
  width: 100%;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  color: black;
  background: #e1e1e1;
}
.onyx-picker.onyx-menu-up {
  top: auto;
  bottom: 0;
  margin-top: 3px;
  margin-bottom: -3px;
}
.onyx-picker .onyx-menu-item {
  text-align: center;
}
.onyx-picker .onyx-menu-item:hover {
  background-color: transparent;
}
.onyx-picker .onyx-menu-item.selected,
.onyx-picker .onyx-menu-item.active,
.onyx-picker .onyx-menu-item:active:hover {
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  background-color: #cde7fe;
  box-shadow: inset 0px 0px 3px rgba(0, 0, 0, 0.2);
}
.onyx-picker .onyx-menu-item {
  border-top: 1px solid rgba(255, 255, 255, 0.5);
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}
.onyx-picker:not(.onyx-flyweight-picker) .onyx-menu-item:first-child,
.onyx-flyweight-picker :first-child > .onyx-menu-item {
  border-top: none;
}
.onyx-picker:not(.onyx-flyweight-picker) .onyx-menu-item:last-child,
.onyx-flyweight-picker :last-child > .onyx-menu-item {
  border-bottom: none;
}
/* TextArea.css */
.onyx-input-decorator > textarea {
  /* reset */

  margin: 0;
  padding: 0;
  border: none;
  outline: none;
  cursor: pointer;
  background-color: transparent;
  background-image: none;
  font-size: 16px;
  box-shadow: none;
  /* Remove scrollbars and resize handle */

  resize: none;
  overflow: auto;
  /* FIXME: hack for styling reset on Android */

  /* -webkit-appearance: caret;*/

}
.onyx-input-decorator.onyx-focused > textarea {
  cursor: text;
}
.onyx-input-decorator.onyx-disabled > textarea {
  cursor: default;
}
.onyx-textarea {
  /* need >=50px for scrollbar to be usable on mac */

  min-height: 50px;
}
/* RichText.css */
.onyx-input-decorator > .onyx-richtext {
  /* reset */

  margin: 0;
  padding: 0;
  border: none;
  outline: none;
  cursor: pointer;
  background-color: transparent;
  background-image: none;
  font-size: 16px;
  min-height: 20px;
  min-width: 100px;
  box-shadow: none;
  /* FIXME: hack for styling reset on Android */

  /* -webkit-appearance: caret;*/

}
.onyx-input-decorator.onyx-focused > .onyx-richtext {
  cursor: text;
}
.onyx-input-decorator.onyx-disabled > .onyx-richtext {
  cursor: default;
}
/* RadioButton.css */
.onyx-radiobutton {
  padding: 8px 12px;
  margin: 0;
  outline: 0;
  font-size: 16px;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  text-align: center;
  /**/

  background: #e7e7e7 url(../lib/onyx/images/gradient.png) repeat-x bottom;
  /* IE8 */

  border: 1px solid #333333;
  border: 1px solid rgba(15, 15, 15, 0.2);
  /* turn off right-border in a way IE8 ignores, because IE8 does not support :last-child */

  border-right-color: rgba(0, 0, 0, 0);
  box-shadow: inset 1px 1px 0px rgba(255, 255, 255, 0.2);
}
.onyx-radiobutton:first-child {
  border-radius: 3px 0 0 3px;
}
.onyx-radiobutton:last-child {
  border-radius: 0px 3px 3px 0px;
  /* IE8 */

  border-right: 1px solid #333333;
  border-right: 1px solid rgba(15, 15, 15, 0.2);
}
.onyx-radiobutton.active {
  color: #ffffff;
  background: #0091f2 url(../lib/onyx/images/gradient-invert.png) repeat-x top;
  border-top: 1px solid rgba(15, 15, 15, 0.6);
  box-shadow: inset 1px 2px 2px rgba(0, 0, 0, 0.2);
}
/* Scrim.css */
.onyx-scrim {
  z-index: 1;
  /*
		note: by using pointer-events we allow tapping on scrim
		while it is fading out; however, this requires any showing classes
		to set pointer events to auto or scrim will not function as expected.
	*/

  pointer-events: none;
}
.onyx-scrim.onyx-scrim-translucent {
  pointer-events: auto;
  background-color: #000000;
  opacity: 0.65;
  filter: alpha(opacity=65);
}
.onyx-scrim.onyx-scrim-transparent {
  pointer-events: auto;
  background: transparent;
}
/* TabButton.css */
.onyx-radiobutton.onyx-tabbutton {
  padding: 8px 34px;
  font-size: 20px;
  border-radius: 0px;
}
/* ToggleButton.css */
.onyx-toggle-button {
  display: inline-block;
  height: 32px;
  line-height: 32px;
  min-width: 64px;
  vertical-align: middle;
  text-align: center;
  /* */

  border-radius: 3px;
  box-shadow: inset 0px 1px 3px rgba(0, 0, 0, 0.4);
  background: #8bba3d url(../lib/onyx/images/gradient-invert.png) repeat-x bottom;
  background-size: auto 100%;
  /* label */

  color: #ffffff;
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
}
.onyx-toggle-button.off {
  background-color: #b1b1b1 !important;
}
.onyx-toggle-button-knob {
  display: inline-block;
  width: 30px;
  height: 30px;
  margin: 1px;
  border-radius: 3px;
  background: #f6f6f6 url(../lib/onyx/images/gradient.png) repeat-x;
  background-size: auto 100%;
}
.onyx-toggle-button .onyx-toggle-button-knob {
  box-shadow: -1px 0px 4px rgba(0, 0, 0, 0.35), inset 0 -1px 0 rgba(0, 0, 0, 0.4);
  float: right;
}
.onyx-toggle-button.off .onyx-toggle-button-knob {
  box-shadow: 1px 0px 4px rgba(0, 0, 0, 0.35), inset 0 -1px 0 rgba(0, 0, 0, 0.4);
  float: left;
}
.onyx-toggle-button.disabled,
.onyx-icon-button.disabled {
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-toggle-content {
  min-width: 32px;
  padding: 0 6px;
}
.onyx-toggle-content.empty {
  padding: 0;
}
.onyx-toggle-content.off {
  float: right;
}
.onyx-toggle-content.on {
  float: left;
}
/* Toolbar.css */
.onyx-toolbar {
  /*
		line-height is unreliable for centering, instead
		use vertical-align: middle to align
		elements along a common centerline and use
		padding to fill out the space.
	*/

  padding: 9px 8px 10px 8px;
  border: 1px solid #3A3A3A;
  background: #4c4c4c url(../lib/onyx/images/gradient.png) repeat-x 0 bottom;
  background-size: contain;
  color: #ffffff;
  /**/

  white-space: nowrap;
  overflow-y: visible;
  font-size: 20px;
}
.onyx-toolbar-inline > *,
.enyo-fittable-columns-layout.onyx-toolbar-inline > * {
  display: inline-block;
  vertical-align: middle;
  margin: 4px 6px 5px;
  box-sizing: border-box;
}
.onyx-toolbar .onyx-icon-button {
  margin: 3px 2px 1px;
}
.onyx-toolbar .onyx-button {
  color: #f2f2f2;
  background-color: #555656;
  border-color: rgba(15, 15, 15, 0.5);
  margin-top: 0;
  margin-bottom: 0;
  height: 36px;
}
.onyx-toolbar .onyx-input-decorator {
  margin: 1px 3px;
  box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.1);
  background-color: rgba(0, 0, 0, 0.1);
  padding: 0px 6px 5px 6px;
}
.onyx-toolbar .onyx-input-decorator.onyx-focused {
  box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.3);
  background-color: #ffffff;
}
.onyx-toolbar .onyx-input-decorator .onyx-input {
  color: #e5e5e5;
  font-size: 14px;
}
.onyx-toolbar .onyx-input-decorator .onyx-input:focus {
  color: #000000;
}
.onyx-toolbar .onyx-input-decorator .onyx-input:focus::-webkit-input-placeholder {
  color: #dddddd;
}
/* Tooltip.css */
.onyx-tooltip {
  z-index: 20;
  left: 0;
  padding: 4px 6px;
  margin-top: 4px;
  margin-left: -6px;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.2);
  color: #ffffff;
  background: #216593 url(../lib/onyx/images/gradient.png) repeat-x 0 bottom;
  border-radius: 3px;
  white-space: nowrap;
}
/*move the tooltip over to the right when displaying the right arrow so it aligns better with the decorator*/
.onyx-tooltip.right-arrow {
  left: 30px;
}
/*prep the left & right arrows using before & after - left arrow uses before & right arrow uses after*/
.onyx-tooltip::before {
  content: '';
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  position: absolute;
  top: -6px;
  left: 16px;
}
.onyx-tooltip::after {
  content: '';
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  position: absolute;
  top: -6px;
  margin-left: -12px;
}
/*The following 3 rules handle the left & right arrows when the tooltip is displayed below the activator*/
.onyx-tooltip.below {
  top: 100%;
}
.onyx-tooltip.below.right-arrow::after {
  border-bottom: 6px solid #1D587F;
  top: -6px;
}
.onyx-tooltip.below.left-arrow::before {
  border-bottom: 6px solid #1D587F;
  top: -6px;
}
/*The following 3 rules handle the left & right arrows when the tooltip is displayed above the activator*/
.onyx-tooltip.above {
  top: -100%;
}
.onyx-tooltip.above.right-arrow::after {
  content: '';
  border-top: 6px solid #1D587F;
  top: 100%;
}
.onyx-tooltip.above.left-arrow::before {
  content: '';
  border-top: 6px solid #1D587F;
  top: 100%;
}
/* ProgressBar.css */
.onyx-progress-bar {
  margin: 8px;
  height: 8px;
  border: 1px solid rgba(15, 15, 15, 0.2);
  border-radius: 3px;
  background: #b8b8b8 url(../lib/onyx/images/gradient-invert.png) repeat-x;
  background-size: auto 100%;
}
.onyx-progress-bar-bar {
  height: 100%;
  border-radius: 3px;
  background: #58abef url(../lib/onyx/images/gradient.png) repeat-x;
  background-size: auto 100%;
}
.onyx-progress-bar-bar.striped {
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-size: 40px 40px;
}
.onyx-progress-bar-bar.striped.animated {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
  -moz-animation: progress-bar-stripes 2s linear infinite;
  -o-animation: progress-bar-stripes 2s linear infinite;
  animation: progress-bar-stripes 2s linear infinite;
}
@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
@-moz-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
@-o-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
@keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
/* ProgressButton.css */
.onyx-progress-button {
  position: relative;
  height: 36px;
  line-height: 36px;
  color: #f1f1f1;
  font-size: 16px;
  text-overflow: ellipsis;
}
.onyx-progress-button-bar {
  height: 36px;
}
.onyx-progress-button-icon {
  display: inline-block;
  position: absolute;
  top: 2px;
  right: 0;
}
.onyx-progress-button-client {
  display: inline-block;
  position: absolute;
  top: 0;
  left: 0;
  right: 36px;
  margin-left: 8px;
}
.onyx-progress-button-client > * {
  display: inline-block;
}
/* Slider.css */
.onyx-slider {
  position: relative;
  margin: 8px 20px;
}
.onyx-slider-taparea {
  position: absolute;
  top: -11px;
  height: 28px;
  width: 100%;
}
.onyx-slider-knob {
  position: relative;
  height: 40px;
  width: 40px;
  background: url(../lib/onyx/images/slider-handle.png) left top no-repeat;
  margin: -23px -20px;
}
.onyx-slider-knob.active,
.onyx-slider-knob.pressed,
.onyx-slider-knob:active:hover {
  background-position: 0 -40px;
}
/* RangeSlider.css */
.onyx-range-slider-knob {
  top: -17px;
}
.onyx-range-slider-label {
  position: relative;
  top: -18px;
  text-align: center;
  white-space: nowrap;
}
/* Item.css */
.onyx-item {
  padding: 14px;
}
.onyx-highlight,
.onyx-highlight.onyx-swipeable-item-content {
  background-color: #dedfdf;
}
.enyo-selected,
.enyo-selected.onyx-swipeable-item-content {
  background-color: #c4e3fe;
}
.onyx-item.onyx-swipeable-item {
  overflow: hidden;
  padding: 0;
}
.onyx-swipeable-item-content {
  background-color: #eaeaea;
  box-sizing: border-box;
  padding: 18px 6px;
  min-height: 40px;
}
/* Spinner.css */
.onyx-spinner {
  width: 59px;
  height: 58px;
  display: inline-block;
  background: url(../lib/onyx/images/spinner-dark.gif) no-repeat 0 0;
}
.onyx-spinner.onyx-light {
  background: url(../lib/onyx/images/spinner-light.gif) no-repeat 0 0;
}
/* MoreToolbar.css */
.onyx-more-toolbar {
  overflow: visible;
  position: relative;
  z-index: 10;
}
.onyx-more-toolbar.active {
  z-index: 11;
}
.onyx-more-menu {
  left: auto;
  right: 0px;
  min-width: 0;
}
.onyx-more-toolbar .onyx-more-menu > * {
  float: right;
  clear: both;
  margin: 5px;
  margin-top: 5px;
  margin-bottom: 5px;
}
.onyx-more-button {
  background-image: url(../lib/onyx/images/more.png);
  width: 32px;
  height: 32px;
}
/* DatePicker.css */
.onyx-datepicker-month {
  min-width: 75px;
}
.onyx-datepicker-day {
  min-width: 60px;
}
.onyx-datepicker-year {
  min-width: 70px;
}
/* TimePicker.css */
.onyx-timepicker-hour {
  min-width: 60px;
}
.onyx-timepicker-minute {
  min-width: 60px;
}
.onyx-timepicker-ampm {
  min-width: 60px;
}
/* ButtonColors.css */
.onyx-button.onyx-blue {
  background-color: #35A8EE;
  color: #F2F2F2;
}
.onyx-button.onyx-affirmative {
  background-color: #91BA07;
  color: #F2F2F2;
}
.onyx-button.onyx-negative {
  background-color: #C51616;
  color: #F2F2F2;
}
.onyx-button.onyx-dark {
  background-color: #555656;
  color: #F2F2F2;
}
.onyx-button.onyx-light {
  background-color: #cacaca;
  color: #2F2F2F;
}
/* ContextualPopup.css */
.onyx-contextual-popup-title {
  font-weight: bold;
  padding: 24px 32px 0px;
}
.onyx-contextual-popup-scroller {
  padding: 24px 32px;
}
.onyx-contextual-popup-action-buttons {
  display: inline-block;
  width: 100%;
  text-align: center;
}
.onyx-contextual-popup-action-button {
  margin-left: 5px;
  margin-right: 5px;
}
.onyx-contextual-popup,
.onyx.onyx-contextual-popup {
  font-size: 16px;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  padding: 6px;
  color: #ffffff;
  background: #4c4c4c;
}
/*setup the nub*/
.onyx-contextual-popup::after {
  content: '';
  position: absolute;
  top: -10px;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}
/*for popups above activator*/
.onyx-contextual-popup.vertical.above {
  top: auto;
  margin-top: -10px;
  bottom: 100%;
  margin-bottom: 10px;
}
/*for popups below activator*/
.onyx-contextual-popup.vertical.below {
  margin-top: 10px;
}
/*for popups on the left of the activator*/
.onyx-contextual-popup.right.horizontal {
  margin-left: -11px;
}
/*for popups on the right of the activator*/
.onyx-contextual-popup.left.horizontal {
  margin-left: 10px;
}
/*nub positioning*/
/*horizontally centered nub*/
.onyx-contextual-popup.vertical::after {
  position: absolute;
  left: 45%;
  border-bottom: 10px solid #4c4c4c;
  border-top: none;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
}
/*nub near horizontal left*/
.onyx-contextual-popup.vertical.right::after {
  left: 0%;
  margin-left: 20px;
}
/*nub near horizontal right*/
.onyx-contextual-popup.vertical.left::after {
  left: 100%;
  margin-left: -55px;
}
/*downward facing nub*/
.onyx-contextual-popup.vertical.above::after {
  top: 100%;
  border-top: 10px solid #4c4c4c;
  border-bottom: none;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
}
.onyx-contextual-popup.vertical.below.right::after {
  top: 0%;
  margin-top: -10px;
  border-bottom: 10px solid #4c4c4c;
  border-left: 10px solid transparent;
}
.onyx-contextual-popup.vertical.below.left::after {
  top: 0%;
  margin-top: -10px;
  border-right: 10px solid transparent;
}
/*nub positioning for left/right popups*/
/*vertically centered nub for popups on left of activator*/
.onyx-contextual-popup.right::after {
  left: 100%;
  top: 47%;
  margin-right: 20px;
  border-left: 10px solid #4C4C4C;
}
/*nub near vertical top for popups on left of activator*/
.onyx-contextual-popup.right.high::after {
  top: 35px;
  border-left: 10px solid #4C4C4C;
}
/*nub near vertical bottom for popups on left of activator*/
.onyx-contextual-popup.right.low::after {
  top: 100%;
  margin-top: -55px;
  border-left: 10px solid #4C4C4C;
}
/*vertically centered nub for popups on right of activator*/
.onyx-contextual-popup.left::after {
  left: 0%;
  margin-left: -20px;
  top: 45%;
  border-right: 10px solid #4C4C4C;
}
/*nub near vertical top for popups on right of activator*/
.onyx-contextual-popup.left.high::after {
  top: 35px;
  border-right: 10px solid #4C4C4C;
}
/*nub near vertical bottom for popups on right of activator*/
.onyx-contextual-popup.left.low::after {
  top: 100%;
  margin-top: -55px;
  border-right: 10px solid #4C4C4C;
}
/*corners*/
/*vertical top corners*/
/*for popups on the left of the activator*/
.onyx-contextual-popup.vertical.right.corner {
  margin-left: 0px;
}
/*for popups on the right of the activator*/
.onyx-contextual-popup.vertical.left.corner {
  margin-left: 0px;
}
.onyx-contextual-popup.vertical.below.left.corner {
  border-top-right-radius: 0px;
}
.onyx-contextual-popup.vertical.below.right.corner {
  border-top-left-radius: 0px;
}
.onyx-contextual-popup.vertical.below.left.corner::after {
  top: 0%;
  left: 100%;
  margin-top: -10px;
  margin-left: -19px;
  border-right: 10px solid #4c4c4c;
  border-top: 10px solid transparent;
}
.onyx-contextual-popup.vertical.below.right.corner::after {
  top: 0%;
  left: 0%;
  margin-left: -1px;
  border-left: 10px solid #4c4c4c;
  border-top: 10px solid transparent;
}
/*vertical bottom corners*/
.onyx-contextual-popup.left.above.corner {
  border-bottom-right-radius: 0px;
}
.onyx-contextual-popup.right.above.corner {
  border-bottom-left-radius: 0px;
}
.onyx-contextual-popup.vertical.left.above.corner::after {
  top: 100%;
  margin-left: -19px;
  border-right: 10px solid #4C4C4C;
  border-bottom: 10px solid transparent;
  border-top: none;
}
.onyx-contextual-popup.vertical.right.above.corner::after {
  top: 100%;
  left: 0%;
  margin-left: -1px;
  border-left: 10px solid #4c4c4c;
  border-bottom: 10px solid transparent;
  border-top: none;
}
/*horizontal bottom corners*/
.onyx-contextual-popup.left.low.corner {
  border-bottom-left-radius: 0px;
}
.onyx-contextual-popup.right.low.corner {
  border-bottom-right-radius: 0px;
}
.onyx-contextual-popup.left.low.corner::after {
  top: 100%;
  left: 0%;
  margin-top: -19px;
  margin-left: -12px;
  border-bottom: 10px solid #4c4c4c;
  border-right: 10px solid #4c4c4c;
}
.onyx-contextual-popup.right.low.corner::after {
  top: 100%;
  left: 100%;
  margin-top: -19px;
  border-bottom: 10px solid#4c4c4c;
  border-left: none;
}
/*horizontal top corners*/
.onyx-contextual-popup.left.high.corner {
  border-top-left-radius: 0px;
}
.onyx-contextual-popup.right.high.corner {
  border-top-right-radius: 0px;
}
.onyx-contextual-popup.left.high.corner::after {
  top: 0%;
  left: 0%;
  margin-top: -1px;
  margin-left: -12px;
  border-top: 10px solid #4C4C4C;
  border-bottom: none;
}
.onyx-contextual-popup.right.high.corner::after {
  top: 0%;
  left: 100%;
  margin-top: -1px;
  margin-left: -9px;
  border-top: 10px solid #4C4C4C;
  border-bottom: none;
}
/* some default colors */
.onyx-dark {
  background-color: #555656;
}
.onyx-light {
  background-color: #cacaca;
}
.onyx-green {
  background-color: #91BA07;
}
.onyx-red {
  background-color: #C51616;
}
.onyx-blue {
  background-color: #35A8EE;
}


/* source/font-awesome.less */

/*!
 *  Font Awesome 3.0.2
 *  the iconic font designed for use with Twitter Bootstrap
 *  -------------------------------------------------------
 *  The full suite of pictographic icons, examples, and documentation
 *  can be found at: http://fortawesome.github.com/Font-Awesome/
 *
 *  License
 *  -------------------------------------------------------
 *  - The Font Awesome font is licensed under the SIL Open Font License - http://scripts.sil.org/OFL
 *  - Font Awesome CSS, LESS, and SASS files are licensed under the MIT License -
 *    http://opensource.org/licenses/mit-license.html
 *  - The Font Awesome pictograms are licensed under the CC BY 3.0 License - http://creativecommons.org/licenses/by/3.0/
 *  - Attribution is no longer required in Font Awesome 3.0, but much appreciated:
 *    "Font Awesome by Dave Gandy - http://fortawesome.github.com/Font-Awesome"

 *  Contact
 *  -------------------------------------------------------
 *  Email: dave@davegandy.com
 *  Twitter: http://twitter.com/fortaweso_me
 *  Work: Lead Product Designer @ http://kyruus.com
 */
@font-face {
  font-family: 'FontAwesome';
  src: url(../assets/font/fontawesome-webfont.eot?v=3.0.1);
  src: url(../assets/font/fontawesome-webfont.eot?#iefix&v=3.0.1) format('embedded-opentype'), url(../assets/font/fontawesome-webfont.woff?v=3.0.1) format('woff'), url(../assets/font/fontawesome-webfont.ttf?v=3.0.1) format('truetype');
  font-weight: normal;
  font-style: normal;
}
/*  Font Awesome styles
    ------------------------------------------------------- */
[class^="icon-"],
[class*=" icon-"] {
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  -webkit-font-smoothing: antialiased;
  /* sprites.less reset */

  display: inline;
  width: auto;
  height: auto;
  line-height: normal;
  vertical-align: baseline;
  background-image: none;
  background-position: 0% 0%;
  background-repeat: repeat;
  margin-top: 0;
}
/* more sprites.less reset */
.icon-white,
.nav-pills > .active > a > [class^="icon-"],
.nav-pills > .active > a > [class*=" icon-"],
.nav-list > .active > a > [class^="icon-"],
.nav-list > .active > a > [class*=" icon-"],
.navbar-inverse .nav > .active > a > [class^="icon-"],
.navbar-inverse .nav > .active > a > [class*=" icon-"],
.dropdown-menu > li > a:hover > [class^="icon-"],
.dropdown-menu > li > a:hover > [class*=" icon-"],
.dropdown-menu > .active > a > [class^="icon-"],
.dropdown-menu > .active > a > [class*=" icon-"],
.dropdown-submenu:hover > a > [class^="icon-"],
.dropdown-submenu:hover > a > [class*=" icon-"] {
  background-image: none;
}
[class^="icon-"]:before,
[class*=" icon-"]:before {
  text-decoration: inherit;
  display: inline-block;
  speak: none;
}
/* makes sure icons active on rollover in links */
a [class^="icon-"],
a [class*=" icon-"] {
  display: inline-block;
}
/* makes the font 33% larger relative to the icon container */
.icon-large:before {
  vertical-align: -10%;
  font-size: 1.3333333333333333em;
}
.btn [class^="icon-"],
.nav [class^="icon-"],
.btn [class*=" icon-"],
.nav [class*=" icon-"] {
  display: inline;
  /* keeps button heights with and without icons the same */

}
.btn [class^="icon-"].icon-large,
.nav [class^="icon-"].icon-large,
.btn [class*=" icon-"].icon-large,
.nav [class*=" icon-"].icon-large {
  line-height: .9em;
}
.btn [class^="icon-"].icon-spin,
.nav [class^="icon-"].icon-spin,
.btn [class*=" icon-"].icon-spin,
.nav [class*=" icon-"].icon-spin {
  display: inline-block;
}
.nav-tabs [class^="icon-"],
.nav-pills [class^="icon-"],
.nav-tabs [class*=" icon-"],
.nav-pills [class*=" icon-"] {
  /* keeps button heights with and without icons the same */

}
.nav-tabs [class^="icon-"],
.nav-pills [class^="icon-"],
.nav-tabs [class*=" icon-"],
.nav-pills [class*=" icon-"],
.nav-tabs [class^="icon-"].icon-large,
.nav-pills [class^="icon-"].icon-large,
.nav-tabs [class*=" icon-"].icon-large,
.nav-pills [class*=" icon-"].icon-large {
  line-height: .9em;
}
li [class^="icon-"],
.nav li [class^="icon-"],
li [class*=" icon-"],
.nav li [class*=" icon-"] {
  display: inline-block;
  width: 1.25em;
  text-align: center;
}
li [class^="icon-"].icon-large,
.nav li [class^="icon-"].icon-large,
li [class*=" icon-"].icon-large,
.nav li [class*=" icon-"].icon-large {
  /* increased font size for icon-large */

  width: 1.5625em;
}
ul.icons {
  list-style-type: none;
  text-indent: -0.75em;
}
ul.icons li [class^="icon-"],
ul.icons li [class*=" icon-"] {
  width: .75em;
}
.icon-muted {
  color: #eeeeee;
}
.icon-border {
  border: solid 1px #eeeeee;
  padding: .2em .25em .15em;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}
.icon-2x {
  font-size: 2em;
}
.icon-2x.icon-border {
  border-width: 2px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.icon-3x {
  font-size: 3em;
}
.icon-3x.icon-border {
  border-width: 3px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
.icon-4x {
  font-size: 4em;
}
.icon-4x.icon-border {
  border-width: 4px;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
}
.pull-right {
  float: right;
}
.pull-left {
  float: left;
}
[class^="icon-"].pull-left,
[class*=" icon-"].pull-left {
  margin-right: .3em;
}
[class^="icon-"].pull-right,
[class*=" icon-"].pull-right {
  margin-left: .3em;
}
.btn [class^="icon-"].pull-left.icon-2x,
.btn [class*=" icon-"].pull-left.icon-2x,
.btn [class^="icon-"].pull-right.icon-2x,
.btn [class*=" icon-"].pull-right.icon-2x {
  margin-top: .18em;
}
.btn [class^="icon-"].icon-spin.icon-large,
.btn [class*=" icon-"].icon-spin.icon-large {
  line-height: .8em;
}
.btn.btn-small [class^="icon-"].pull-left.icon-2x,
.btn.btn-small [class*=" icon-"].pull-left.icon-2x,
.btn.btn-small [class^="icon-"].pull-right.icon-2x,
.btn.btn-small [class*=" icon-"].pull-right.icon-2x {
  margin-top: .25em;
}
.btn.btn-large [class^="icon-"],
.btn.btn-large [class*=" icon-"] {
  margin-top: 0;
}
.btn.btn-large [class^="icon-"].pull-left.icon-2x,
.btn.btn-large [class*=" icon-"].pull-left.icon-2x,
.btn.btn-large [class^="icon-"].pull-right.icon-2x,
.btn.btn-large [class*=" icon-"].pull-right.icon-2x {
  margin-top: .05em;
}
.btn.btn-large [class^="icon-"].pull-left.icon-2x,
.btn.btn-large [class*=" icon-"].pull-left.icon-2x {
  margin-right: .2em;
}
.btn.btn-large [class^="icon-"].pull-right.icon-2x,
.btn.btn-large [class*=" icon-"].pull-right.icon-2x {
  margin-left: .2em;
}
.icon-spin {
  display: inline-block;
  -moz-animation: spin 2s infinite linear;
  -o-animation: spin 2s infinite linear;
  -webkit-animation: spin 2s infinite linear;
  animation: spin 2s infinite linear;
}
@-moz-keyframes spin {
  0% {
    -moz-transform: rotate(0deg);
  }
  100% {
    -moz-transform: rotate(359deg);
  }
}
@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(359deg);
  }
}
@-o-keyframes spin {
  0% {
    -o-transform: rotate(0deg);
  }
  100% {
    -o-transform: rotate(359deg);
  }
}
@-ms-keyframes spin {
  0% {
    -ms-transform: rotate(0deg);
  }
  100% {
    -ms-transform: rotate(359deg);
  }
}
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(359deg);
  }
}
@-moz-document url-prefix() {
  .icon-spin {
    height: .9em;
  }
  .btn .icon-spin {
    height: auto;
  }
  .icon-spin.icon-large {
    height: 1.25em;
  }
  .btn .icon-spin.icon-large {
    height: .75em;
  }
}
/*  Font Awesome uses the Unicode Private Use Area (PUA) to ensure screen
    readers do not read off random characters that represent icons */
.icon-glass:before {
  content: "\f000";
}
.icon-music:before {
  content: "\f001";
}
.icon-search:before {
  content: "\f002";
}
.icon-envelope:before {
  content: "\f003";
}
.icon-heart:before {
  content: "\f004";
}
.icon-star:before {
  content: "\f005";
}
.icon-star-empty:before {
  content: "\f006";
}
.icon-user:before {
  content: "\f007";
}
.icon-film:before {
  content: "\f008";
}
.icon-th-large:before {
  content: "\f009";
}
.icon-th:before {
  content: "\f00a";
}
.icon-th-list:before {
  content: "\f00b";
}
.icon-ok:before {
  content: "\f00c";
}
.icon-remove:before {
  content: "\f00d";
}
.icon-zoom-in:before {
  content: "\f00e";
}
.icon-zoom-out:before {
  content: "\f010";
}
.icon-off:before {
  content: "\f011";
}
.icon-signal:before {
  content: "\f012";
}
.icon-cog:before {
  content: "\f013";
}
.icon-trash:before {
  content: "\f014";
}
.icon-home:before {
  content: "\f015";
}
.icon-file:before {
  content: "\f016";
}
.icon-time:before {
  content: "\f017";
}
.icon-road:before {
  content: "\f018";
}
.icon-download-alt:before {
  content: "\f019";
}
.icon-download:before {
  content: "\f01a";
}
.icon-upload:before {
  content: "\f01b";
}
.icon-inbox:before {
  content: "\f01c";
}
.icon-play-circle:before {
  content: "\f01d";
}
.icon-repeat:before {
  content: "\f01e";
}
/* \f020 doesn't work in Safari. all shifted one down */
.icon-refresh:before {
  content: "\f021";
}
.icon-list-alt:before {
  content: "\f022";
}
.icon-lock:before {
  content: "\f023";
}
.icon-flag:before {
  content: "\f024";
}
.icon-headphones:before {
  content: "\f025";
}
.icon-volume-off:before {
  content: "\f026";
}
.icon-volume-down:before {
  content: "\f027";
}
.icon-volume-up:before {
  content: "\f028";
}
.icon-qrcode:before {
  content: "\f029";
}
.icon-barcode:before {
  content: "\f02a";
}
.icon-tag:before {
  content: "\f02b";
}
.icon-tags:before {
  content: "\f02c";
}
.icon-book:before {
  content: "\f02d";
}
.icon-bookmark:before {
  content: "\f02e";
}
.icon-print:before {
  content: "\f02f";
}
.icon-camera:before {
  content: "\f030";
}
.icon-font:before {
  content: "\f031";
}
.icon-bold:before {
  content: "\f032";
}
.icon-italic:before {
  content: "\f033";
}
.icon-text-height:before {
  content: "\f034";
}
.icon-text-width:before {
  content: "\f035";
}
.icon-align-left:before {
  content: "\f036";
}
.icon-align-center:before {
  content: "\f037";
}
.icon-align-right:before {
  content: "\f038";
}
.icon-align-justify:before {
  content: "\f039";
}
.icon-list:before {
  content: "\f03a";
}
.icon-indent-left:before {
  content: "\f03b";
}
.icon-indent-right:before {
  content: "\f03c";
}
.icon-facetime-video:before {
  content: "\f03d";
}
.icon-picture:before {
  content: "\f03e";
}
.icon-pencil:before {
  content: "\f040";
}
.icon-map-marker:before {
  content: "\f041";
}
.icon-adjust:before {
  content: "\f042";
}
.icon-tint:before {
  content: "\f043";
}
.icon-edit:before {
  content: "\f044";
}
.icon-share:before {
  content: "\f045";
}
.icon-check:before {
  content: "\f046";
}
.icon-move:before {
  content: "\f047";
}
.icon-step-backward:before {
  content: "\f048";
}
.icon-fast-backward:before {
  content: "\f049";
}
.icon-backward:before {
  content: "\f04a";
}
.icon-play:before {
  content: "\f04b";
}
.icon-pause:before {
  content: "\f04c";
}
.icon-stop:before {
  content: "\f04d";
}
.icon-forward:before {
  content: "\f04e";
}
.icon-fast-forward:before {
  content: "\f050";
}
.icon-step-forward:before {
  content: "\f051";
}
.icon-eject:before {
  content: "\f052";
}
.icon-chevron-left:before {
  content: "\f053";
}
.icon-chevron-right:before {
  content: "\f054";
}
.icon-plus-sign:before {
  content: "\f055";
}
.icon-minus-sign:before {
  content: "\f056";
}
.icon-remove-sign:before {
  content: "\f057";
}
.icon-ok-sign:before {
  content: "\f058";
}
.icon-question-sign:before {
  content: "\f059";
}
.icon-info-sign:before {
  content: "\f05a";
}
.icon-screenshot:before {
  content: "\f05b";
}
.icon-remove-circle:before {
  content: "\f05c";
}
.icon-ok-circle:before {
  content: "\f05d";
}
.icon-ban-circle:before {
  content: "\f05e";
}
.icon-arrow-left:before {
  content: "\f060";
}
.icon-arrow-right:before {
  content: "\f061";
}
.icon-arrow-up:before {
  content: "\f062";
}
.icon-arrow-down:before {
  content: "\f063";
}
.icon-share-alt:before {
  content: "\f064";
}
.icon-resize-full:before {
  content: "\f065";
}
.icon-resize-small:before {
  content: "\f066";
}
.icon-plus:before {
  content: "\f067";
}
.icon-minus:before {
  content: "\f068";
}
.icon-asterisk:before {
  content: "\f069";
}
.icon-exclamation-sign:before {
  content: "\f06a";
}
.icon-gift:before {
  content: "\f06b";
}
.icon-leaf:before {
  content: "\f06c";
}
.icon-fire:before {
  content: "\f06d";
}
.icon-eye-open:before {
  content: "\f06e";
}
.icon-eye-close:before {
  content: "\f070";
}
.icon-warning-sign:before {
  content: "\f071";
}
.icon-plane:before {
  content: "\f072";
}
.icon-calendar:before {
  content: "\f073";
}
.icon-random:before {
  content: "\f074";
}
.icon-comment:before {
  content: "\f075";
}
.icon-magnet:before {
  content: "\f076";
}
.icon-chevron-up:before {
  content: "\f077";
}
.icon-chevron-down:before {
  content: "\f078";
}
.icon-retweet:before {
  content: "\f079";
}
.icon-shopping-cart:before {
  content: "\f07a";
}
.icon-folder-close:before {
  content: "\f07b";
}
.icon-folder-open:before {
  content: "\f07c";
}
.icon-resize-vertical:before {
  content: "\f07d";
}
.icon-resize-horizontal:before {
  content: "\f07e";
}
.icon-bar-chart:before {
  content: "\f080";
}
.icon-twitter-sign:before {
  content: "\f081";
}
.icon-facebook-sign:before {
  content: "\f082";
}
.icon-camera-retro:before {
  content: "\f083";
}
.icon-key:before {
  content: "\f084";
}
.icon-cogs:before {
  content: "\f085";
}
.icon-comments:before {
  content: "\f086";
}
.icon-thumbs-up:before {
  content: "\f087";
}
.icon-thumbs-down:before {
  content: "\f088";
}
.icon-star-half:before {
  content: "\f089";
}
.icon-heart-empty:before {
  content: "\f08a";
}
.icon-signout:before {
  content: "\f08b";
}
.icon-linkedin-sign:before {
  content: "\f08c";
}
.icon-pushpin:before {
  content: "\f08d";
}
.icon-external-link:before {
  content: "\f08e";
}
.icon-signin:before {
  content: "\f090";
}
.icon-trophy:before {
  content: "\f091";
}
.icon-github-sign:before {
  content: "\f092";
}
.icon-upload-alt:before {
  content: "\f093";
}
.icon-lemon:before {
  content: "\f094";
}
.icon-phone:before {
  content: "\f095";
}
.icon-check-empty:before {
  content: "\f096";
}
.icon-bookmark-empty:before {
  content: "\f097";
}
.icon-phone-sign:before {
  content: "\f098";
}
.icon-twitter:before {
  content: "\f099";
}
.icon-facebook:before {
  content: "\f09a";
}
.icon-github:before {
  content: "\f09b";
}
.icon-unlock:before {
  content: "\f09c";
}
.icon-credit-card:before {
  content: "\f09d";
}
.icon-rss:before {
  content: "\f09e";
}
.icon-hdd:before {
  content: "\f0a0";
}
.icon-bullhorn:before {
  content: "\f0a1";
}
.icon-bell:before {
  content: "\f0a2";
}
.icon-certificate:before {
  content: "\f0a3";
}
.icon-hand-right:before {
  content: "\f0a4";
}
.icon-hand-left:before {
  content: "\f0a5";
}
.icon-hand-up:before {
  content: "\f0a6";
}
.icon-hand-down:before {
  content: "\f0a7";
}
.icon-circle-arrow-left:before {
  content: "\f0a8";
}
.icon-circle-arrow-right:before {
  content: "\f0a9";
}
.icon-circle-arrow-up:before {
  content: "\f0aa";
}
.icon-circle-arrow-down:before {
  content: "\f0ab";
}
.icon-globe:before {
  content: "\f0ac";
}
.icon-wrench:before {
  content: "\f0ad";
}
.icon-tasks:before {
  content: "\f0ae";
}
.icon-filter:before {
  content: "\f0b0";
}
.icon-briefcase:before {
  content: "\f0b1";
}
.icon-fullscreen:before {
  content: "\f0b2";
}
.icon-group:before {
  content: "\f0c0";
}
.icon-link:before {
  content: "\f0c1";
}
.icon-cloud:before {
  content: "\f0c2";
}
.icon-beaker:before {
  content: "\f0c3";
}
.icon-cut:before {
  content: "\f0c4";
}
.icon-copy:before {
  content: "\f0c5";
}
.icon-paper-clip:before {
  content: "\f0c6";
}
.icon-save:before {
  content: "\f0c7";
}
.icon-sign-blank:before {
  content: "\f0c8";
}
.icon-reorder:before {
  content: "\f0c9";
}
.icon-list-ul:before {
  content: "\f0ca";
}
.icon-list-ol:before {
  content: "\f0cb";
}
.icon-strikethrough:before {
  content: "\f0cc";
}
.icon-underline:before {
  content: "\f0cd";
}
.icon-table:before {
  content: "\f0ce";
}
.icon-magic:before {
  content: "\f0d0";
}
.icon-truck:before {
  content: "\f0d1";
}
.icon-pinterest:before {
  content: "\f0d2";
}
.icon-pinterest-sign:before {
  content: "\f0d3";
}
.icon-google-plus-sign:before {
  content: "\f0d4";
}
.icon-google-plus:before {
  content: "\f0d5";
}
.icon-money:before {
  content: "\f0d6";
}
.icon-caret-down:before {
  content: "\f0d7";
}
.icon-caret-up:before {
  content: "\f0d8";
}
.icon-caret-left:before {
  content: "\f0d9";
}
.icon-caret-right:before {
  content: "\f0da";
}
.icon-columns:before {
  content: "\f0db";
}
.icon-sort:before {
  content: "\f0dc";
}
.icon-sort-down:before {
  content: "\f0dd";
}
.icon-sort-up:before {
  content: "\f0de";
}
.icon-envelope-alt:before {
  content: "\f0e0";
}
.icon-linkedin:before {
  content: "\f0e1";
}
.icon-undo:before {
  content: "\f0e2";
}
.icon-legal:before {
  content: "\f0e3";
}
.icon-dashboard:before {
  content: "\f0e4";
}
.icon-comment-alt:before {
  content: "\f0e5";
}
.icon-comments-alt:before {
  content: "\f0e6";
}
.icon-bolt:before {
  content: "\f0e7";
}
.icon-sitemap:before {
  content: "\f0e8";
}
.icon-umbrella:before {
  content: "\f0e9";
}
.icon-paste:before {
  content: "\f0ea";
}
.icon-lightbulb:before {
  content: "\f0eb";
}
.icon-exchange:before {
  content: "\f0ec";
}
.icon-cloud-download:before {
  content: "\f0ed";
}
.icon-cloud-upload:before {
  content: "\f0ee";
}
.icon-user-md:before {
  content: "\f0f0";
}
.icon-stethoscope:before {
  content: "\f0f1";
}
.icon-suitcase:before {
  content: "\f0f2";
}
.icon-bell-alt:before {
  content: "\f0f3";
}
.icon-coffee:before {
  content: "\f0f4";
}
.icon-food:before {
  content: "\f0f5";
}
.icon-file-alt:before {
  content: "\f0f6";
}
.icon-building:before {
  content: "\f0f7";
}
.icon-hospital:before {
  content: "\f0f8";
}
.icon-ambulance:before {
  content: "\f0f9";
}
.icon-medkit:before {
  content: "\f0fa";
}
.icon-fighter-jet:before {
  content: "\f0fb";
}
.icon-beer:before {
  content: "\f0fc";
}
.icon-h-sign:before {
  content: "\f0fd";
}
.icon-plus-sign-alt:before {
  content: "\f0fe";
}
.icon-double-angle-left:before {
  content: "\f100";
}
.icon-double-angle-right:before {
  content: "\f101";
}
.icon-double-angle-up:before {
  content: "\f102";
}
.icon-double-angle-down:before {
  content: "\f103";
}
.icon-angle-left:before {
  content: "\f104";
}
.icon-angle-right:before {
  content: "\f105";
}
.icon-angle-up:before {
  content: "\f106";
}
.icon-angle-down:before {
  content: "\f107";
}
.icon-desktop:before {
  content: "\f108";
}
.icon-laptop:before {
  content: "\f109";
}
.icon-tablet:before {
  content: "\f10a";
}
.icon-mobile-phone:before {
  content: "\f10b";
}
.icon-circle-blank:before {
  content: "\f10c";
}
.icon-quote-left:before {
  content: "\f10d";
}
.icon-quote-right:before {
  content: "\f10e";
}
.icon-spinner:before {
  content: "\f110";
}
.icon-circle:before {
  content: "\f111";
}
.icon-reply:before {
  content: "\f112";
}
.icon-github-alt:before {
  content: "\f113";
}
.icon-folder-close-alt:before {
  content: "\f114";
}
.icon-folder-open-alt:before {
  content: "\f115";
}


/* source/app.less */

/*
	Put anything you reference with "url(..)" in ../assets/
	This way, you can minify your application, and just remove the "source" folder for production
*/
/* Fonts */
/* ---------------------------------------*/
/* Text Colors */
/* ---------------------------------------*/
/* Background Colors */
/* ---------------------------------------*/
/* Border Radius */
/* ---------------------------------------*/
/* Padding */
/* ---------------------------------------*/
/* Icon Sizes */
/* ---------------------------------------*/
/* Disabled Opacity */
/* ---------------------------------------*/
/* Gradient Overlays */
/* ---------------------------------------*/
/* Images */
/* ---------------------------------------*/
/* onyx-classes.less - combined CSS (less) files for all released Onyx controls
   into single onyx.less file to avoid IE bug that allows
   a maximum of 31 style sheets to be loaded before silently failing */
.onyx {
  color: #333333;
  font-family: 'Helvetica Neue', 'Nimbus Sans L', Arial, sans-serif;
  font-size: 20px;
  cursor: default;
  background-color: #eaeaea;
  /* remove automatic tap highlight color */

  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
/* prevent IE from inheriting line-height for these elements */
.onyx button,
.onyx label,
.onyx input {
  line-height: normal;
}
.onyx-selected {
  background-color: #c4e3fe;
}
/* LESS pre-calculations */
/* Individual Widget CSS */
/* Icon.css */
.onyx-icon,
.onyx-icon-toggle {
  width: 32px;
  height: 32px;
  background-repeat: no-repeat;
  display: inline-block;
  vertical-align: middle;
}
.onyx-icon.onyx-icon-button.active,
.onyx-icon.onyx-icon-button.pressed,
.onyx-icon.onyx-icon-button:active:hover,
.onyx-icon-toggle.active {
  background-position: 0 -32px;
}
.onyx-icon.disabled {
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-icon.disabled:active:hover {
  background-position: 0 0px;
}
/* Button.css */
.onyx-button {
  outline: 0;
  color: #292929;
  font-size: 16px;
  text-align: center;
  white-space: nowrap;
  margin: 0;
  padding: 6px 18px;
  overflow: hidden;
  border-radius: 3px;
  /* for IE8 */

  border: 1px solid #707070;
  border: 1px solid rgba(15, 15, 15, 0.2);
  /*
		The border and the gradient interact in a strange way that
		causes the bottom-border (top if the gradient is aligned top)
		to be lighter than other borders.
		We can fix it by using the darker bottom border below, but
		then there are a few rogue pixels that end up very dark.
	*/

  /* border-bottom: 1px solid rgba(15, 15, 15, 0.5); */

  box-shadow: inset 0px 1px 0px rgba(255, 255, 255, 0.2);
  background: #e1e1e1 url(../lib/onyx/images/gradient.png) repeat-x bottom;
  background-size: contain;
  /**/

  text-overflow: ellipsis;
  /* the following cause arcane problems on IE */

  /*
	min-width: 14px;
	min-height: 20px;
	*/

}
/*
	IE8 can't handle these selectors in tandem:
	.onyx-button.active, .onyx-button:active:not([disabled]) {

	the effect is as if .onyx-button.active doesn't exist
*/
.onyx-button.active,
.onyx-button.pressed {
  background-image: url(../lib/onyx/images/gradient-invert.png);
  background-position: top;
  border-top: 1px solid rgba(15, 15, 15, 0.6);
  box-shadow: inset 0px 1px 0px rgba(0, 0, 0, 0.1);
}
.onyx-button:active:hover:not([disabled]) {
  background-image: url(../lib/onyx/images/gradient-invert.png);
  background-position: top;
  border-top: 1px solid rgba(15, 15, 15, 0.6);
  box-shadow: inset 0px 1px 0px rgba(0, 0, 0, 0.1);
}
.onyx-button[disabled] {
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-button > img {
  padding: 0px 3px;
}
/* Remove the focused inner-border style in Firefox (Windows) */
.onyx-button::-moz-focus-inner {
  border: 0;
}
/* Checkbox.css */
.onyx-checkbox {
  cursor: pointer;
  height: 32px;
  width: 32px;
  background: url(../lib/onyx/images/checkbox.png) no-repeat;
  /* reset for ? */

  margin: 0px;
  /* these entries cause toggle-button and checkbox to line up properly*/

  display: inline-block;
  vertical-align: middle;
}
.onyx-checkbox[checked] {
  background-position: 0px -32px;
}
.onyx-checkbox[disabled] {
  opacity: 0.4;
}
/* Grabber.css */
.onyx-grabber {
  background: url(../lib/onyx/images/grabbutton.png) no-repeat center;
  width: 23px;
  height: 27px;
}
/* Popup.css */
.onyx-popup {
  font-size: 16px;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  padding: 6px;
  color: #ffffff;
  background: #4c4c4c url(../lib/onyx/images/gradient.png) repeat-x 0 bottom;
}
.onyx-popup-decorator {
  position: relative;
}
/* Groupbox.css */
.onyx-groupbox > * {
  display: block;
  /*box-shadow: inset 0px 1px 1px rgba(255,255,255,0.5);*/

  border-color: #aaaaaa;
  border-style: solid;
  border-width: 0 1px 1px 1px;
  /*padding: 10px;*/

  /* reset styles that make 'item' look bad if they happen to be there */

  border-radius: 0;
  margin: 0;
  font-size: 16px;
}
.onyx-groupbox > *:first-child {
  border-top-color: #aaaaaa;
  border-width: 1px;
  border-radius: 4px 4px 0 0;
}
.onyx-groupbox > *:last-child {
  border-radius: 0 0 4px 4px;
}
.onyx-groupbox > *:first-child:last-child {
  border-radius: 4px;
}
.onyx-groupbox-header {
  padding: 2px 10px;
  color: #ffffff;
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
  /**/

  background-color: #4c4c4c;
  border: none;
  background: #4c4c4c url(../lib/onyx/images/gradient.png) repeat-x 0 10px;
}
.onyx-groupbox .onyx-input-decorator {
  display: block;
}
.onyx-groupbox > .onyx-input-decorator {
  border-color: #aaaaaa;
  border-width: 0 1px 1px 1px;
  border-radius: 0;
}
.onyx-groupbox > .onyx-input-decorator:first-child {
  border-width: 1px;
  border-radius: 4px 4px 0 0;
}
.onyx-groupbox > .onyx-input-decorator:last-child {
  border-radius: 0 0 4px 4px;
}
.onyx-groupbox > .onyx-input-decorator:first-child:last-child {
  border-radius: 4px;
}
/* Input.css */
.onyx-input-decorator {
  padding: 6px 8px 10px 8px;
  border-radius: 3px;
  border: 1px solid;
  border-color: rgba(0, 0, 0, 0.1);
  margin: 0;
}
.onyx-input-decorator.onyx-focused {
  box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.3);
  border-color: rgba(0, 0, 0, 0.3);
  background-color: #ffffff;
}
.onyx-input-decorator.onyx-disabled {
  /* FIXME: needed to color a disabled input placeholder. */

  /*-webkit-text-fill-color: #888;*/

  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-input-decorator > input {
  /* reset */

  margin: 0;
  padding: 0;
  border: none;
  outline: none;
  cursor: pointer;
  background-color: transparent;
  background-image: none;
  font-size: 16px;
  box-shadow: none;
  /* FIXME: hack for styling reset on Android */

  /* -webkit-appearance: caret;*/

}
.onyx-input-decorator.onyx-focused > input {
  cursor: text;
}
.onyx-input-decorator.onyx-disabled > input {
  cursor: default;
}
/* Menu.css */
.onyx-menu,
.onyx.onyx-menu {
  min-width: 160px;
  top: 100%;
  left: 0;
  margin-top: 2px;
  padding: 3px 0;
  border-radius: 3px;
}
.onyx-menu.onyx-menu-up {
  top: auto;
  bottom: 100%;
  margin-top: 0;
  margin-bottom: 2px;
}
.onyx-toolbar .onyx-menu {
  margin-top: 11px;
  border-radius: 0 0 3px 3px;
}
.onyx-toolbar .onyx-menu.onyx-menu-up {
  margin-top: 0;
  margin-bottom: 10px;
  border-radius: 3px 3px 0 0;
}
.onyx-menu-item {
  display: block;
  padding: 10px;
}
.onyx-menu-item:hover {
  background: #284152;
}
.onyx-menu-divider,
.onyx-menu-divider:hover {
  margin: 6px 0;
  padding: 0;
  border-bottom: 1px solid #aaa;
}
.onyx-menu-label {
  cursor: default;
  -webkit-user-select: none;
  -moz-user-select: -moz-none;
  user-select: none;
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-menu-label:hover {
  background: none;
}
/* customize a toolbar to support menus */
.onyx-menu-toolbar,
.onyx-toolbar.onyx-menu-toolbar {
  position: relative;
  z-index: 10;
  overflow: visible;
}
/* Picker.css */
.onyx-picker-decorator .onyx-button {
  padding: 10px 18px;
}
.onyx-picker {
  top: 0;
  margin-top: -3px;
  min-width: 0;
  width: 100%;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  color: black;
  background: #e1e1e1;
}
.onyx-picker.onyx-menu-up {
  top: auto;
  bottom: 0;
  margin-top: 3px;
  margin-bottom: -3px;
}
.onyx-picker .onyx-menu-item {
  text-align: center;
}
.onyx-picker .onyx-menu-item:hover {
  background-color: transparent;
}
.onyx-picker .onyx-menu-item.selected,
.onyx-picker .onyx-menu-item.active,
.onyx-picker .onyx-menu-item:active:hover {
  border-top: 1px solid rgba(0, 0, 0, 0.1);
  background-color: #cde7fe;
  box-shadow: inset 0px 0px 3px rgba(0, 0, 0, 0.2);
}
.onyx-picker .onyx-menu-item {
  border-top: 1px solid rgba(255, 255, 255, 0.5);
  border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}
.onyx-picker:not(.onyx-flyweight-picker) .onyx-menu-item:first-child,
.onyx-flyweight-picker :first-child > .onyx-menu-item {
  border-top: none;
}
.onyx-picker:not(.onyx-flyweight-picker) .onyx-menu-item:last-child,
.onyx-flyweight-picker :last-child > .onyx-menu-item {
  border-bottom: none;
}
/* TextArea.css */
.onyx-input-decorator > textarea {
  /* reset */

  margin: 0;
  padding: 0;
  border: none;
  outline: none;
  cursor: pointer;
  background-color: transparent;
  background-image: none;
  font-size: 16px;
  box-shadow: none;
  /* Remove scrollbars and resize handle */

  resize: none;
  overflow: auto;
  /* FIXME: hack for styling reset on Android */

  /* -webkit-appearance: caret;*/

}
.onyx-input-decorator.onyx-focused > textarea {
  cursor: text;
}
.onyx-input-decorator.onyx-disabled > textarea {
  cursor: default;
}
.onyx-textarea {
  /* need >=50px for scrollbar to be usable on mac */

  min-height: 50px;
}
/* RichText.css */
.onyx-input-decorator > .onyx-richtext {
  /* reset */

  margin: 0;
  padding: 0;
  border: none;
  outline: none;
  cursor: pointer;
  background-color: transparent;
  background-image: none;
  font-size: 16px;
  min-height: 20px;
  min-width: 100px;
  box-shadow: none;
  /* FIXME: hack for styling reset on Android */

  /* -webkit-appearance: caret;*/

}
.onyx-input-decorator.onyx-focused > .onyx-richtext {
  cursor: text;
}
.onyx-input-decorator.onyx-disabled > .onyx-richtext {
  cursor: default;
}
/* RadioButton.css */
.onyx-radiobutton {
  padding: 8px 12px;
  margin: 0;
  outline: 0;
  font-size: 16px;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  text-align: center;
  /**/

  background: #e7e7e7 url(../lib/onyx/images/gradient.png) repeat-x bottom;
  /* IE8 */

  border: 1px solid #333333;
  border: 1px solid rgba(15, 15, 15, 0.2);
  /* turn off right-border in a way IE8 ignores, because IE8 does not support :last-child */

  border-right-color: rgba(0, 0, 0, 0);
  box-shadow: inset 1px 1px 0px rgba(255, 255, 255, 0.2);
}
.onyx-radiobutton:first-child {
  border-radius: 3px 0 0 3px;
}
.onyx-radiobutton:last-child {
  border-radius: 0px 3px 3px 0px;
  /* IE8 */

  border-right: 1px solid #333333;
  border-right: 1px solid rgba(15, 15, 15, 0.2);
}
.onyx-radiobutton.active {
  color: #ffffff;
  background: #0091f2 url(../lib/onyx/images/gradient-invert.png) repeat-x top;
  border-top: 1px solid rgba(15, 15, 15, 0.6);
  box-shadow: inset 1px 2px 2px rgba(0, 0, 0, 0.2);
}
/* Scrim.css */
.onyx-scrim {
  z-index: 1;
  /*
		note: by using pointer-events we allow tapping on scrim
		while it is fading out; however, this requires any showing classes
		to set pointer events to auto or scrim will not function as expected.
	*/

  pointer-events: none;
}
.onyx-scrim.onyx-scrim-translucent {
  pointer-events: auto;
  background-color: #000000;
  opacity: 0.65;
  filter: alpha(opacity=65);
}
.onyx-scrim.onyx-scrim-transparent {
  pointer-events: auto;
  background: transparent;
}
/* TabButton.css */
.onyx-radiobutton.onyx-tabbutton {
  padding: 8px 34px;
  font-size: 20px;
  border-radius: 0px;
}
/* ToggleButton.css */
.onyx-toggle-button {
  display: inline-block;
  height: 32px;
  line-height: 32px;
  min-width: 64px;
  vertical-align: middle;
  text-align: center;
  /* */

  border-radius: 3px;
  box-shadow: inset 0px 1px 3px rgba(0, 0, 0, 0.4);
  background: #8bba3d url(../lib/onyx/images/gradient-invert.png) repeat-x bottom;
  background-size: auto 100%;
  /* label */

  color: #ffffff;
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
}
.onyx-toggle-button.off {
  background-color: #b1b1b1 !important;
}
.onyx-toggle-button-knob {
  display: inline-block;
  width: 30px;
  height: 30px;
  margin: 1px;
  border-radius: 3px;
  background: #f6f6f6 url(../lib/onyx/images/gradient.png) repeat-x;
  background-size: auto 100%;
}
.onyx-toggle-button .onyx-toggle-button-knob {
  box-shadow: -1px 0px 4px rgba(0, 0, 0, 0.35), inset 0 -1px 0 rgba(0, 0, 0, 0.4);
  float: right;
}
.onyx-toggle-button.off .onyx-toggle-button-knob {
  box-shadow: 1px 0px 4px rgba(0, 0, 0, 0.35), inset 0 -1px 0 rgba(0, 0, 0, 0.4);
  float: left;
}
.onyx-toggle-button.disabled,
.onyx-icon-button.disabled {
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.onyx-toggle-content {
  min-width: 32px;
  padding: 0 6px;
}
.onyx-toggle-content.empty {
  padding: 0;
}
.onyx-toggle-content.off {
  float: right;
}
.onyx-toggle-content.on {
  float: left;
}
/* Toolbar.css */
.onyx-toolbar {
  /*
		line-height is unreliable for centering, instead
		use vertical-align: middle to align
		elements along a common centerline and use
		padding to fill out the space.
	*/

  padding: 9px 8px 10px 8px;
  border: 1px solid #3A3A3A;
  background: #4c4c4c url(../lib/onyx/images/gradient.png) repeat-x 0 bottom;
  background-size: contain;
  color: #ffffff;
  /**/

  white-space: nowrap;
  overflow-y: visible;
  font-size: 20px;
}
.onyx-toolbar-inline > *,
.enyo-fittable-columns-layout.onyx-toolbar-inline > * {
  display: inline-block;
  vertical-align: middle;
  margin: 4px 6px 5px;
  box-sizing: border-box;
}
.onyx-toolbar .onyx-icon-button {
  margin: 3px 2px 1px;
}
.onyx-toolbar .onyx-button {
  color: #f2f2f2;
  background-color: #555656;
  border-color: rgba(15, 15, 15, 0.5);
  margin-top: 0;
  margin-bottom: 0;
  height: 36px;
}
.onyx-toolbar .onyx-input-decorator {
  margin: 1px 3px;
  box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.1);
  background-color: rgba(0, 0, 0, 0.1);
  padding: 0px 6px 5px 6px;
}
.onyx-toolbar .onyx-input-decorator.onyx-focused {
  box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.3);
  background-color: #ffffff;
}
.onyx-toolbar .onyx-input-decorator .onyx-input {
  color: #e5e5e5;
  font-size: 14px;
}
.onyx-toolbar .onyx-input-decorator .onyx-input:focus {
  color: #000000;
}
.onyx-toolbar .onyx-input-decorator .onyx-input:focus::-webkit-input-placeholder {
  color: #dddddd;
}
/* Tooltip.css */
.onyx-tooltip {
  z-index: 20;
  left: 0;
  padding: 4px 6px;
  margin-top: 4px;
  margin-left: -6px;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.2);
  color: #ffffff;
  background: #216593 url(../lib/onyx/images/gradient.png) repeat-x 0 bottom;
  border-radius: 3px;
  white-space: nowrap;
}
/*move the tooltip over to the right when displaying the right arrow so it aligns better with the decorator*/
.onyx-tooltip.right-arrow {
  left: 30px;
}
/*prep the left & right arrows using before & after - left arrow uses before & right arrow uses after*/
.onyx-tooltip::before {
  content: '';
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  position: absolute;
  top: -6px;
  left: 16px;
}
.onyx-tooltip::after {
  content: '';
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  position: absolute;
  top: -6px;
  margin-left: -12px;
}
/*The following 3 rules handle the left & right arrows when the tooltip is displayed below the activator*/
.onyx-tooltip.below {
  top: 100%;
}
.onyx-tooltip.below.right-arrow::after {
  border-bottom: 6px solid #1D587F;
  top: -6px;
}
.onyx-tooltip.below.left-arrow::before {
  border-bottom: 6px solid #1D587F;
  top: -6px;
}
/*The following 3 rules handle the left & right arrows when the tooltip is displayed above the activator*/
.onyx-tooltip.above {
  top: -100%;
}
.onyx-tooltip.above.right-arrow::after {
  content: '';
  border-top: 6px solid #1D587F;
  top: 100%;
}
.onyx-tooltip.above.left-arrow::before {
  content: '';
  border-top: 6px solid #1D587F;
  top: 100%;
}
/* ProgressBar.css */
.onyx-progress-bar {
  margin: 8px;
  height: 8px;
  border: 1px solid rgba(15, 15, 15, 0.2);
  border-radius: 3px;
  background: #b8b8b8 url(../lib/onyx/images/gradient-invert.png) repeat-x;
  background-size: auto 100%;
}
.onyx-progress-bar-bar {
  height: 100%;
  border-radius: 3px;
  background: #58abef url(../lib/onyx/images/gradient.png) repeat-x;
  background-size: auto 100%;
}
.onyx-progress-bar-bar.striped {
  background-image: -webkit-gradient(linear, 0 100%, 100% 0, color-stop(0.25, rgba(255, 255, 255, 0.15)), color-stop(0.25, transparent), color-stop(0.5, transparent), color-stop(0.5, rgba(255, 255, 255, 0.15)), color-stop(0.75, rgba(255, 255, 255, 0.15)), color-stop(0.75, transparent), to(transparent));
  background-image: -webkit-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -moz-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -ms-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: -o-linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-image: linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-size: 40px 40px;
}
.onyx-progress-bar-bar.striped.animated {
  -webkit-animation: progress-bar-stripes 2s linear infinite;
  -moz-animation: progress-bar-stripes 2s linear infinite;
  -o-animation: progress-bar-stripes 2s linear infinite;
  animation: progress-bar-stripes 2s linear infinite;
}
@-webkit-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
@-moz-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
@-o-keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
@keyframes progress-bar-stripes {
  from {
    background-position: 0 0;
  }
  to {
    background-position: 40px 0;
  }
}
/* ProgressButton.css */
.onyx-progress-button {
  position: relative;
  height: 36px;
  line-height: 36px;
  color: #f1f1f1;
  font-size: 16px;
  text-overflow: ellipsis;
}
.onyx-progress-button-bar {
  height: 36px;
}
.onyx-progress-button-icon {
  display: inline-block;
  position: absolute;
  top: 2px;
  right: 0;
}
.onyx-progress-button-client {
  display: inline-block;
  position: absolute;
  top: 0;
  left: 0;
  right: 36px;
  margin-left: 8px;
}
.onyx-progress-button-client > * {
  display: inline-block;
}
/* Slider.css */
.onyx-slider {
  position: relative;
  margin: 8px 20px;
}
.onyx-slider-taparea {
  position: absolute;
  top: -11px;
  height: 28px;
  width: 100%;
}
.onyx-slider-knob {
  position: relative;
  height: 40px;
  width: 40px;
  background: url(../lib/onyx/images/slider-handle.png) left top no-repeat;
  margin: -23px -20px;
}
.onyx-slider-knob.active,
.onyx-slider-knob.pressed,
.onyx-slider-knob:active:hover {
  background-position: 0 -40px;
}
/* RangeSlider.css */
.onyx-range-slider-knob {
  top: -17px;
}
.onyx-range-slider-label {
  position: relative;
  top: -18px;
  text-align: center;
  white-space: nowrap;
}
/* Item.css */
.onyx-item {
  padding: 14px;
}
.onyx-highlight,
.onyx-highlight.onyx-swipeable-item-content {
  background-color: #dedfdf;
}
.enyo-selected,
.enyo-selected.onyx-swipeable-item-content {
  background-color: #c4e3fe;
}
.onyx-item.onyx-swipeable-item {
  overflow: hidden;
  padding: 0;
}
.onyx-swipeable-item-content {
  background-color: #eaeaea;
  box-sizing: border-box;
  padding: 18px 6px;
  min-height: 40px;
}
/* Spinner.css */
.onyx-spinner {
  width: 59px;
  height: 58px;
  display: inline-block;
  background: url(../lib/onyx/images/spinner-dark.gif) no-repeat 0 0;
}
.onyx-spinner.onyx-light {
  background: url(../lib/onyx/images/spinner-light.gif) no-repeat 0 0;
}
/* MoreToolbar.css */
.onyx-more-toolbar {
  overflow: visible;
  position: relative;
  z-index: 10;
}
.onyx-more-toolbar.active {
  z-index: 11;
}
.onyx-more-menu {
  left: auto;
  right: 0px;
  min-width: 0;
}
.onyx-more-toolbar .onyx-more-menu > * {
  float: right;
  clear: both;
  margin: 5px;
  margin-top: 5px;
  margin-bottom: 5px;
}
.onyx-more-button {
  background-image: url(../lib/onyx/images/more.png);
  width: 32px;
  height: 32px;
}
/* DatePicker.css */
.onyx-datepicker-month {
  min-width: 75px;
}
.onyx-datepicker-day {
  min-width: 60px;
}
.onyx-datepicker-year {
  min-width: 70px;
}
/* TimePicker.css */
.onyx-timepicker-hour {
  min-width: 60px;
}
.onyx-timepicker-minute {
  min-width: 60px;
}
.onyx-timepicker-ampm {
  min-width: 60px;
}
/* ButtonColors.css */
.onyx-button.onyx-blue {
  background-color: #35A8EE;
  color: #F2F2F2;
}
.onyx-button.onyx-affirmative {
  background-color: #91BA07;
  color: #F2F2F2;
}
.onyx-button.onyx-negative {
  background-color: #C51616;
  color: #F2F2F2;
}
.onyx-button.onyx-dark {
  background-color: #555656;
  color: #F2F2F2;
}
.onyx-button.onyx-light {
  background-color: #cacaca;
  color: #2F2F2F;
}
/* ContextualPopup.css */
.onyx-contextual-popup-title {
  font-weight: bold;
  padding: 24px 32px 0px;
}
.onyx-contextual-popup-scroller {
  padding: 24px 32px;
}
.onyx-contextual-popup-action-buttons {
  display: inline-block;
  width: 100%;
  text-align: center;
}
.onyx-contextual-popup-action-button {
  margin-left: 5px;
  margin-right: 5px;
}
.onyx-contextual-popup,
.onyx.onyx-contextual-popup {
  font-size: 16px;
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  padding: 6px;
  color: #ffffff;
  background: #4c4c4c;
}
/*setup the nub*/
.onyx-contextual-popup::after {
  content: '';
  position: absolute;
  top: -10px;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}
/*for popups above activator*/
.onyx-contextual-popup.vertical.above {
  top: auto;
  margin-top: -10px;
  bottom: 100%;
  margin-bottom: 10px;
}
/*for popups below activator*/
.onyx-contextual-popup.vertical.below {
  margin-top: 10px;
}
/*for popups on the left of the activator*/
.onyx-contextual-popup.right.horizontal {
  margin-left: -11px;
}
/*for popups on the right of the activator*/
.onyx-contextual-popup.left.horizontal {
  margin-left: 10px;
}
/*nub positioning*/
/*horizontally centered nub*/
.onyx-contextual-popup.vertical::after {
  position: absolute;
  left: 45%;
  border-bottom: 10px solid #4c4c4c;
  border-top: none;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
}
/*nub near horizontal left*/
.onyx-contextual-popup.vertical.right::after {
  left: 0%;
  margin-left: 20px;
}
/*nub near horizontal right*/
.onyx-contextual-popup.vertical.left::after {
  left: 100%;
  margin-left: -55px;
}
/*downward facing nub*/
.onyx-contextual-popup.vertical.above::after {
  top: 100%;
  border-top: 10px solid #4c4c4c;
  border-bottom: none;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
}
.onyx-contextual-popup.vertical.below.right::after {
  top: 0%;
  margin-top: -10px;
  border-bottom: 10px solid #4c4c4c;
  border-left: 10px solid transparent;
}
.onyx-contextual-popup.vertical.below.left::after {
  top: 0%;
  margin-top: -10px;
  border-right: 10px solid transparent;
}
/*nub positioning for left/right popups*/
/*vertically centered nub for popups on left of activator*/
.onyx-contextual-popup.right::after {
  left: 100%;
  top: 47%;
  margin-right: 20px;
  border-left: 10px solid #4C4C4C;
}
/*nub near vertical top for popups on left of activator*/
.onyx-contextual-popup.right.high::after {
  top: 35px;
  border-left: 10px solid #4C4C4C;
}
/*nub near vertical bottom for popups on left of activator*/
.onyx-contextual-popup.right.low::after {
  top: 100%;
  margin-top: -55px;
  border-left: 10px solid #4C4C4C;
}
/*vertically centered nub for popups on right of activator*/
.onyx-contextual-popup.left::after {
  left: 0%;
  margin-left: -20px;
  top: 45%;
  border-right: 10px solid #4C4C4C;
}
/*nub near vertical top for popups on right of activator*/
.onyx-contextual-popup.left.high::after {
  top: 35px;
  border-right: 10px solid #4C4C4C;
}
/*nub near vertical bottom for popups on right of activator*/
.onyx-contextual-popup.left.low::after {
  top: 100%;
  margin-top: -55px;
  border-right: 10px solid #4C4C4C;
}
/*corners*/
/*vertical top corners*/
/*for popups on the left of the activator*/
.onyx-contextual-popup.vertical.right.corner {
  margin-left: 0px;
}
/*for popups on the right of the activator*/
.onyx-contextual-popup.vertical.left.corner {
  margin-left: 0px;
}
.onyx-contextual-popup.vertical.below.left.corner {
  border-top-right-radius: 0px;
}
.onyx-contextual-popup.vertical.below.right.corner {
  border-top-left-radius: 0px;
}
.onyx-contextual-popup.vertical.below.left.corner::after {
  top: 0%;
  left: 100%;
  margin-top: -10px;
  margin-left: -19px;
  border-right: 10px solid #4c4c4c;
  border-top: 10px solid transparent;
}
.onyx-contextual-popup.vertical.below.right.corner::after {
  top: 0%;
  left: 0%;
  margin-left: -1px;
  border-left: 10px solid #4c4c4c;
  border-top: 10px solid transparent;
}
/*vertical bottom corners*/
.onyx-contextual-popup.left.above.corner {
  border-bottom-right-radius: 0px;
}
.onyx-contextual-popup.right.above.corner {
  border-bottom-left-radius: 0px;
}
.onyx-contextual-popup.vertical.left.above.corner::after {
  top: 100%;
  margin-left: -19px;
  border-right: 10px solid #4C4C4C;
  border-bottom: 10px solid transparent;
  border-top: none;
}
.onyx-contextual-popup.vertical.right.above.corner::after {
  top: 100%;
  left: 0%;
  margin-left: -1px;
  border-left: 10px solid #4c4c4c;
  border-bottom: 10px solid transparent;
  border-top: none;
}
/*horizontal bottom corners*/
.onyx-contextual-popup.left.low.corner {
  border-bottom-left-radius: 0px;
}
.onyx-contextual-popup.right.low.corner {
  border-bottom-right-radius: 0px;
}
.onyx-contextual-popup.left.low.corner::after {
  top: 100%;
  left: 0%;
  margin-top: -19px;
  margin-left: -12px;
  border-bottom: 10px solid #4c4c4c;
  border-right: 10px solid #4c4c4c;
}
.onyx-contextual-popup.right.low.corner::after {
  top: 100%;
  left: 100%;
  margin-top: -19px;
  border-bottom: 10px solid#4c4c4c;
  border-left: none;
}
/*horizontal top corners*/
.onyx-contextual-popup.left.high.corner {
  border-top-left-radius: 0px;
}
.onyx-contextual-popup.right.high.corner {
  border-top-right-radius: 0px;
}
.onyx-contextual-popup.left.high.corner::after {
  top: 0%;
  left: 0%;
  margin-top: -1px;
  margin-left: -12px;
  border-top: 10px solid #4C4C4C;
  border-bottom: none;
}
.onyx-contextual-popup.right.high.corner::after {
  top: 0%;
  left: 100%;
  margin-top: -1px;
  margin-left: -9px;
  border-top: 10px solid #4C4C4C;
  border-bottom: none;
}
/* some default colors */
.onyx-dark {
  background-color: #555656;
}
.onyx-light {
  background-color: #cacaca;
}
.onyx-green {
  background-color: #91BA07;
}
.onyx-red {
  background-color: #C51616;
}
.onyx-blue {
  background-color: #35A8EE;
}
a {
  color: #bb5500;
}
hr,
h2,
p,
span {
  margin: 0;
}
small,
label,
input,
textarea {
  font-size: 12px;
}
p {
  text-indent: 2em;
}
.onyx-groupbox-header {
  padding: 10px;
}
.main-menu {
  background: #4c4c4c url(../lib/onyx/images/gradient.png) repeat-x 0 bottom;
}
.menu-list-item {
  color: white;
  padding: 10px;
  background-color: #353030;
  display: block;
  margin-bottom: 1px;
  margin-left: 2px;
}
.clear-button-style {
  border: none;
  background: none;
  outline: none;
  box-shadow: none;
}
.onyx-button {
  padding: 0 8px;
}
.onyx-popup {
  border-radius: 0;
  background-color: white;
  border: none;
  padding: 10px;
}
.onyx-toolbar {
  padding: 5px 0;
}
.welcome-div {
  background-color: yellow;
  padding: 10px;
}
.time-table-row {
  padding: 5px;
  border-bottom: solid 1px grey;
}
.time-table-row span {
  display: inline-block;
}
.time-table-row > span {
  width: 33%;
}
.time-table-item {
  width: 100%;
  text-align: center;
}
.time-table-item > small {
  padding: 1px;
  font-size: 10px;
  border-radius: 10px;
  color: white;
}
.arrive {
  background-color: grey;
}
.leave {
  background-color: #35A8EE;
}
.group-wrapper {
  padding: 5px;
}
.article-item {
  background: white;
  text-shadow: 0 1px 0 #fff;
  /*
	background-image: -webkit-linear-gradient( #fff,#f1f1f1 );
	background-image: -moz-linear-gradient( #fff,#f1f1f1 );
	background-image: -ms-linear-gradient( #fff,#f1f1f1 );
	background-image: -o-linear-gradient( #fff,#f1f1f1 );
	background-image: linear-gradient( #fff,#f1f1f1 );
	border:groove 1px lightgrey;
	*/

}
.seat-item > span {
  display: inline-block;
}
.seat-item > span > span {
  padding: 15px 0;
  text-align: center;
  display: inline-block;
  background-color: white;
  width: 100%;
}
.info-item span {
  display: inline-block;
}
.info-item > span > span {
  padding: 10px 0px 10px  15px;
  font-weight: bold;
}
.toy-orange {
  color: #bb5500;
}
.odd-comment {
  background-color: #f8f8f3;
}
.enyo-blue {
  color: #35a8ee;
}
.comment-body {
  margin-top: 10px;
  width: 100%;
  padding: 5px 0;
}
.comment-row .onyx-input-decorator {
  padding: 3px 0 ;
}
.comment-row .onyx-input-decorator > input,
.comment-row .onyx-input-decorator > textarea {
  font-size: 12px;
}
.comment-row .onyx-input-decorator > input {
  padding: 3px 5px;
}
.comment-row {
  padding: 5px;
}
.comment-body small {
  font-size: 10px;
  color: lightgrey;
  padding: 3px;
}
.comment-body label {
  padding-right: 3px;
}
.login-wrapper {
  background: #0078d8 url(../assets/light.png) center 0 no-repeat;
  box-shadow: inset 0 -1px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
}
.login-wrapper .onyx-input-decorator {
  padding: 5px;
  box-shadow: inset 0 1px 2px rgba(15, 82, 135, 0.25), 0 0px 10px rgba(255, 255, 255, 0.3);
  border: 1px solid #197CC9;
  width: 236px;
}
.login-row {
  margin-top: 20px;
}
.login-row button {
  width: 248px;
  height: 35px;
  background: -webkit-gradient(linear, left top, left bottom, from(#5dadec), to(#51a4e6));
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 1px 0 rgba(255, 255, 255, 0.1);
  color: #eee;
  border: 1px solid #0971C5;
}
.logo {
  width: 212px;
  height: 212px;
  background: url(../assets/rails.png) center 0 no-repeat;
  background-size: contain;
  margin: 0 auto;
  margin-top: 15px;
}
.manage-row,
.userinfo-row,
.order-row {
  padding: 5px;
  height: 30px;
  clear: both;
  border-bottom: solid 1px #aaaaaa;
}
.manage-row .onyx-input-decorator,
.userinfo-row .onyx-input-decorator {
  padding: 3px;
  border: 1px solid #197CC9;
  width: 80px;
}
.userinfo-row .onyx-input-decorator {
  width: 50%;
}
.manage-row .manage-left,
.userinfo-left,
.order-row-left {
  padding: 5px;
  float: left;
}
.manage-row .manage-right,
.userinfo-right,
.order-row-right {
  float: right;
}
.manage-button,
.order-buy-button {
  width: 88px;
  padding: 4px 0;
}
.manage-groupbox,
.userinfo-groupbox {
  margin: 5px;
}
.manage-widen-button {
  display: inline-block;
  margin: 0 auto;
  padding: 5px;
  color: white;
}
.manage-row-button {
  text-align: center;
  background: #c51616 url(../lib/onyx/images/gradient.png) repeat-x bottom;
  background-size: contain;
  text-overflow: ellipsis;
}
.price-label {
  font-size: 14px;
  padding: 5px;
  color: #C51616;
  margin-right: 5px;
}
.order-popup .onyx-input-decorator {
  width: 200px;
}
.order-popup-buttons {
  margin-top: 10px;
}
.order-popup-buttons button {
  padding: 5px;
  width: 49%;
}
.order-popup-buttons button:first-child {
  float: left;
}
.order-popup-buttons button:last-child {
  float: right;
}
.leave-message {
  background: #4c4c4c url(../lib/onyx/images/gradient.png) repeat-x 0 bottom;
}
.leave-message label {
  color: white;
}
.notice-row {
  color: white;
  width: 100%;
  padding: 5px;
  margin-bottom: 5px;
  border-radius: 5px;
  text-align: center;
}

