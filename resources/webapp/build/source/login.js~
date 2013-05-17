enyo.kind({
	name: "App.Login",
	kind: "App.Base",
	components:[
		{kind: "Panels", name: "mainPanel",narrowFit: false,  fit:true,  classes: "", arrangerKind: "CarouselArranger", draggable: false, wrap: true, components: [
			{name: "mainContent", kind: "FittableRows", style:"width:100%",components: [
				{kind: "onyx.Toolbar",name:"mainToolbar", style: "overflow: hidden;", components: [
					{kind: "onyx.Button", content:"首页", style:"float:left",classes: "onyx-blue icon-home", ontap: "toHome"},
					{kind: "onyx.Button", name: "menu_icon",  content: "菜单",style:"float: right;", classes: "icon-reorder onyx-dark", ontap: "showMenu"},
				]},
				{name:"wrapper", kind: "FittableRows", classes:"login-wrapper", style:"width: 100%; height: 100%", components: [
					App.noticeComponents,
					{kind:"enyo.Scroller", strategyKind:"TouchScrollStrategy", style:"height: 100%", components:[
						{tag:"div", style:"width: 248px; margin: 0 auto;text-align: left", components:[
							{tag: "div", classes: "logo"},
							{tag:"div", classes:"login-row", components:[
								{kind: "onyx.InputDecorator", alwaysLooksFocused:true,components: [
									{kind: "onyx.Input",name:"userName", style:"width: 100%;",classes:"my-input-decorator", placeholder:"用户名", }
								]},
							]},
							{tag:"div", classes:"login-row",components:[
								{kind: "onyx.InputDecorator", alwaysLooksFocused:true,components: [
									{kind: "onyx.Input", name:"password", style:"width: 100%;",classes:"my-input-decorator", placeholder:"密码" }
								]},
							]},
							{tag:"div", classes:"login-row",components:[
								{kind:"onyx.Button", content:"登录", ontap: "login"}
							]},
							{tag:"div", classes:"login-row", style:"", components:[
								{tag:"span", style: "float: left", components:[
									{kind:"onyx.Checkbox", onchange:""},
									{tag:"span", style:"color: white; font-size: 14px;display: inline-block; padding: 5px;", content:"保存密码"},
								]},
								{tag:"a",style:"color: white; font-size: 14px;display: block; padding: 7px;float: right", classes:"login-bottom", content:"忘记密码?"}
							]}
						]}
					]}
				]}
				//{tag: "div", content: "@copyright dinsy&powerm", style:"font-size: 10px; color: lightgrey; text-align: center"}
			]},
			App.menuComponents
		]}
	],
	create:function(){
		this.inherited(arguments);
	},
	rendered: function() {
		this.inherited(arguments);

		this.panelWidth = this.$.mainPanel.getBounds().width;

		var h = this.$.mainContent.getBounds().height - this.$.mainToolbar.getBounds().height;
		this.$.wrapper.applyStyle("height", h + "px");
	},
	login: function(inSender, inEvent){
		inSender.disabled = true;
		console.log("login...");
		_this = this;
		var postData = {
			name: _this.$.userName.getValue(),
			password: _this.$.password.getValue()
		};
		postData[AppData["csrf_token_name"]] = AppData["csrf_hash"];
		console.log(postData);
		var ajax = new enyo.Ajax({
			url: "/webapp/process_login",
			method: "POST",
			sync: true,
			postBody:postData
		});
		ajax.response(this, "processResponse");
		ajax.error(this, "processError");
		ajax.go();
	},
	processResponse: function(inSender, inResponse){
		if (inResponse.code == 0) {
			redirectTo(getUrlParams().url || "/mobile/");
		} else {
			console.log("error login");
		}
	},
	processError: function(inSender, inResponse) {
		console.log("login error, please retry.");
	}
});
