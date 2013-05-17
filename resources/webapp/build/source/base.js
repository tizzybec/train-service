function redirectTo(url)
{
	window.location.href = url;
}

function getUrlParams(){
	var s = location.search.split(/[?&]/);
	params = {};
	for (p in s) {
		if (s[p]) {
			var m = s[p].match(/([\w_]+)=(.*)/);
			params[m[1]] = m[2];
		}
	}
	return params;
}

var App = {};

enyo.kind({
	name: "App.Base",
	kind:"FittableRows",
	fit: true,
	handlers:{
		onresize: "resizeWindow",
	},
	resizeWindow: function(inSender, inEvent) {
		this.reflow();
		//if (this.focusObj && this.focusObj.focus) {
		//	this.focusObj.focus();
		//}
	},
	published: {
		animator: function(){},
		panelWidth: 0,
		divide: 2,
		isEditing: false,
		focusObj: {}
	},
	timeout: function(){
		this.$.noticeWrapper && this.$.noticeWrapper.hide();
	},
	create: function(){
		this.inherited(arguments);
		this.$.msgRepeater.setCount(AppData["msg"].length);

		var isNoticeShown = enyo.getCookie("is_notice_shown") ;
		if ( ! isNoticeShown || isNoticeShown != "true") {
			this.$.noticeRepeater.setCount(AppData["notice"].length);
			enyo.setCookie("is_notice_shown", "true" , {"expires": 1});
		} 
	},
	rendered: function() {
		this.inherited(arguments);

		var h = this.$.mainPanel.getBounds().height - this.$.rightMenuToolbar.getBounds().height;
		this.$.menuScroller.applyStyle("height", h + "px");

		this.panelWidth = this.$.mainPanel.getBounds().width;
		this.$.menu.applyStyle("width", this.panelWidth/this.divide + "px");

		this.animator = new enyo.Animator({
			duration: 0,
			startValue:  this.$.mainPanel.getBounds().width/this.divide,
			endValue: 0,
			node: this.$.mainContent.hasNode() && this.$.menu.hasNode(),
			onStep: enyo.bind(this, this.animatorStep),
			onEnd: enyo.bind(this, this.animatorEnd),
			onStop: enyo.bind(this, this.animatorEnd)
		});

		var nw = this.$.noticeWrapper;
		nw.applyStyle("left", (nw.parent.getBounds().width - nw.getBounds().width) / 2 + "px");

		setTimeout(enyo.bind(this, this.timeout), 5000);
	},
	animatorStep: function(data) {
		//console.log( (parseInt(data.value - this.panelWidth/2)));
		this.$.mainContent.applyStyle("left", parseInt(data.value - this.panelWidth/this.divide) + "px") ;
		//this.$.mainContent.addStyles("left:" + (parseInt(data.value - this.panelWidth/2)) + "px") ;
		this.$.menu.applyStyle("left", parseInt(data.value - this.panelWidth/this.divide) + "px");
		//this.$.menu.addStyles("left:"+ parseInt(data.value - this.panelWidth/2)+ "px");
		this.$.mainPanel.reflow();
	},
	animatorEnd: function() {
		this.animator.reverse();
	},
	showMenu: function(inSender, inEvent){
		//this.$.debug.addContent(this.panel_width);
		//this.$.mainContent.setStyle("left: -800px");
		enyo.log("menu clicked");
		this.animator.stop();
		this.animator.play();
	},
	beginEdit: function(inSender, inEvent){
		//this.focusObj = inSender;
		//window.c = inSender;
		//this.isEditing = true;
		//this.reflow();
		//inSender.focus();
		//console.log('begin');
	},
	endEdit: function(inSender, inEvent){
		//this.isEditing = false;
		//console.log('end');
		//this.focusObj = {};
	},
	toOrder: function(inSender, inEvent){
		inSender.disabled = true;
		redirectTo("/mobile/webpage/order");
		return true;
	},
	toHome: function(inSender, inEvent){
		inSender.disabled = true;
		redirectTo("/mobile/webpage/");
		return true;
	},
	toMessage: function(inSender, inEvent){
		inSender.disabled = true;
		redirectTo("/mobile/webpage/messages");
		return true;
	},
	toLifetips: function(inSender, inEvent){
		inSender.disabled = true;
		redirectTo("/mobile/webpage/lifetips");
		return true;
	},
	toManage: function(inSender, inEvent) {
		inSender.disabled = true;
		redirectTo("/mobile/manage");
		return true;
	},
	setupMsgItem: function(inSender, inEvent){
		var index = inEvent.index;
		var item = inEvent.item;
		var msg = AppData["msg"][index];
		item.$.msgContent.setContent(msg);
	},
	setupNoticeItem: function(inSender, inEvent){
		var index = inEvent.index;
		var item = inEvent.item;
		var notice = AppData["notice"][index];
		item.$.msgContent.setContent(notice.content);
	},
	closeMsg: function(inSender, inEvent){
		inSender.parent.hide();
		return true;
	},
	closeNotice: function(inSender, inEvent){
		inSender.parent.hide();
		return true;
	}
});

App.menuComponents =
			{name: "menu", classes:"main-menu", style:"width: 50%", components: [
				{kind: "onyx.Toolbar", name: "rightMenuToolbar", style: "padding-right: 0;height: 36px;", components: [
					{kind: "onyx.Button", name:"returnIcon", style:"float:left;border: none;background:none;outline;box-shadow:none", classes: "icon-angle-left", ontap:"showMenu"},
					{kind: "onyx.Button", name: "menuListIcon",  style:"float: right; border: none;background:none;outline;box-shadow:none;", content: "列表", classes: "icon-th-large"}
				]},
				{kind:"FittableRows", fit: true, components: [
					{kind: "enyo.Scroller", name:"menuScroller", fit: true,  strategyKind: "TouchScrollStrategy", components: [
						{tag: "div", classes: "icon-table menu-list-item", content: "列车时刻表(首页)", ontap: "toHome"},
						{tag: "div", style: "margin-top: 1px;",classes: "icon-food menu-list-item", content: "点餐", ontap: "toOrder"},
						{tag: "div", classes: "icon-edit menu-list-item", content: "留言", ontap: "toMessage"},
						{tag: "div", classes: "icon-lightbulb menu-list-item", content: "生活常识", ontap:"toLifetips"},
						{tag: "div", classes: "icon-cogs menu-list-item", content: "列车管理", ontap: "toManage"}
					]}
				]}
			]};

App.noticeComponents =
					{tag: "div", name:"noticeWrapper", style:"z-index: 100;position: absolute; top: 0; height: 50px; width: 80%;",components:[
						{name: "msg", components:[
							{kind: "Repeater", name: "msgRepeater", onSetupItem:"setupMsgItem", components: [
								{tag: "div", classes: "notice-row", style:"background-color: #68af02;", components:[
									{tag: "label", classes: "icon-quote-left" },
									{tag: "span", name: "msgContent",  classes: "", style: "padding: 5px;"},
									{tag: "label", classes: "icon-quote-right" },
									{tag: "small", classes: "close-button", style:"display: inline-block; float: right;padding: 3px;", content: "关闭",  ontap:"closeMsg"}
								]}
							]}
						]},
						{name: "notice", components:[
							{kind: "Repeater", name: "noticeRepeater", onSetupItem:"setupNoticeItem", components: [
								{tag: "div", classes: "notice-row", style:"background-color: red;", components:[
									{tag: "label", classes: "icon-quote-left" },
									{tag: "span", name: "noticeContent",   classes: "", style: "padding: 5px;"},
									{tag: "label", classes: "icon-quote-right" },
									{tag: "small", classes: "close-button", style:"display: inline-block; float: right;padding: 3px;", content: "关闭", ontap:"closeNotice"}
								]}
							]}
						]}
					]};
 
