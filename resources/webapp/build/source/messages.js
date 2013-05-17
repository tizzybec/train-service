enyo.kind({
	name: "App.Messages",
	kind: "App.Base",
	components:[
		{kind: "Panels", name: "mainPanel",narrowFit: false,  fit:true,  classes: "", arrangerKind: "CarouselArranger", draggable: false, wrap: true, components: [
			{name: "mainContent", kind: "FittableRows", style:"width:100%",components: [
				{kind: "onyx.Toolbar",name:"mainToolbar",style: "overflow: hidden;", components: [
					{kind: "onyx.Button", content:"返回", style:"float:left",classes: "onyx-blue icon-home", ontap:"toHome"},
					{kind: "onyx.Button", name: "menuButton",  content: "菜单",style:"float: right;", classes: "icon-reorder onyx-dark", ontap: "showMenu"},
					{kind: "onyx.Button", name: "messageButton",  content: "留言",style:"float: right;", classes: "icon-comment reorder onyx-dark", ontap: "showMsgArea"}
				]},
				//{tag:"div", name:"leaveMessage", style:"color:rgb(41, 39, 39); opacity: 0.7; position: absolute;left: 10px; z-index: 99;", classes:"icon-comment icon-3x", ontap:"leaveMessage"},
				/*
				 {tag:"div", name:"meassageBar", style:" color:rgb(41, 39, 39); opacity: 0.9; position: absolute;left: 0; z-index: 99; display:block;width: 100%", classes:"", ontap:"",components:[
					{kind:"onyx.Toolbar", style:"padding: 5px 8px", classes:"", fit: true,components:[
						{kind: "onyx.InputDecorator", alwaysLooksFocused:true,components: [
							{kind: "onyx.Input", name:"messageInput",value: "", style:"" }
						]},
						{kind:"onyx.Button", style:"height:32px;background: #e1e1e1;color: #292929", content:"留言"}
					]}
				]},
				*/
				{name:"commentBody",kind: "onyx.Popup",style:"bottom:0; left: 0;", classes:"comment-body odd-comment leave-message",  components:[
							{tag:"div", classes:"comment-row", components:[
								{tag: "label", content:"称呼"},
								{kind: "onyx.InputDecorator", style:"width: 30%;",alwaysLooksFocused:true,components: [
									{kind: "onyx.Input", name:"userName", style:"width: 100%;",classes:"my-input-decorator",onfocus:"beginEdit",onblur:"endEdit", placeholder:"您的名号", }
								]},
							]},
							{tag:"div", classes:"comment-row",components:[
								{tag: "label", content:"邮箱"},
								{kind: "onyx.InputDecorator", style:"width: 30%;",alwaysLooksFocused:true,components: [
									{kind: "onyx.Input", name:"userEmail", style:"width: 100%;",classes:"my-input-decorator", onfocus:"beginEdit",onblur:"endEdit",placeholder:"您的邮箱" }
								]},
								{tag: "small", content:"(非必填)"},
							]},
							{tag:"div", classes:"comment-row", style:"padding: 0 5px;", components:[
								{kind: "onyx.InputDecorator", style:"width: 100%;", alwaysLooksFocused:true,components: [
									{kind: "onyx.TextArea", name:"commentTextarea", style:"width: 85%;",onfocus:"beginEdit",onblur:"endEdit",placeholder:"您的留言", },
									{kind:"onyx.Button", style:"width: 14%;height: 100%;min-height: 45px;", classes:"onyx-affirmative", content:"留言", ontap:"submitMessage"},
									{tag: "span", style:"display:inline-block; width: %1"}
								]}
							]}
						]},
				{name:"wrapper",kind:"FittableRows",style:"padding: 0 5px;background-color: rgb(245, 245, 245);", fit: true,components: [
					App.noticeComponents,
					{name:"messageList", kind:"List", fit:true,fixedHeight:false,noSelect:true,onSetupItem:"setupArticleItem",classes:"enyo-unselectable",components:[
						{name:"message", classes:"message-item", ontap:"toComment", style:"font-size: 12px;padding: 5px; clear: both;margin-top: 5px;background-color: white;",components: [
							{tag: "div", name:"authorName",style:"padding: 5px; font-size: 14px; font-weight: bold", allowHtml: true,ontap:"toComment",},
							{tag: "hr", style:"width: 50%; margin:0px;border-top: dashed 1px grey;",ontap:"toComment",},
							{tag:"div",name:"messageContent",style:"padding: 10px 5px;font-size: 14px;",ontap:"toComment",},
							{tag:"div",style:"text-align:right;",ontap:"toComment",components:[
								{tag:"span", name:"upNum",style:"margin-right: 10px;", classes:"icon-thumbs-up toy-orange",ontap:"toComment",},
								{tag:"span", name:"commentNum",style:"margin-right: 10px;", classes:"icon-comments enyo-blue",ontap:"toComment",}
							]}
						]}
					]}
				]}
				//{tag: "div", content: "@copyright dinsy&powerm", style:"font-size: 10px; color: lightgrey; text-align: center"}
			]},
			App.menuComponents
		]}
	],
	resizeWindow: function(inSender, inEvent) {
		this.inherited(arguments);
		//this.$.commentBody.reflow();
	},
	messages:AppData["messages"],
	create:function(){
		this.inherited(arguments);
		this.$.messageList.setCount(this.messages.length);
	},
	rendered: function() {
		this.inherited(arguments);

		//var h = this.$.mainContent.getBounds().height - this.$.mainToolbar.getBounds().height;
		//this.$.messageList.applyStyle("height", h + "px");
		
		//this.$.messageInput.applyStyle("width", this.$.mainContent.getBounds().width - 47 - 50 + "px");

		//var mh = this.$.mainPanel.getBounds().height;

		//this.$.meassageBar.applyStyle("top",  (mh -this.$.meassageBar.getBounds().height) + "px");

	},
	toComment: function(inSender, inEvent){
		var index = inEvent.index;
		messageId =  this.messages[index]["message_id"];
		redirectTo("/mobile/webpage/message/" + messageId);
		return true;
	},
	setupArticleItem: function(inSender, inEvent) {
		var index = inEvent.index;
		var message = this.messages[index];
		this.$.authorName.setContent(message["name"] + "<small class='toy-orange' style='font-weight:normal'>&nbsp;&nbsp;@2013-05-01 12:12</small>");
		this.$.messageContent.setContent(message["content"]);
		this.$.upNum.setContent(message["up_num"]);
		this.$.commentNum.setContent(message["comment_num"]);
	},
	showMsgArea: function(inSender, inEvent) {
		//this.$.commentBody.show();
		if (this.$.commentBody.getComputedStyleValue("display") == "none") {
			this.$.commentBody.applyStyle("display", "block");
		} else {
			this.$.commentBody.applyStyle("display", "none");
		}
		return true;
	},
	submitMessage: function(inSender, inEvent) {
		var name = this.$.userName.getValue();
		var email = this.$.userEmail.getValue();
		var content = this.$.commentTextarea.getValue();
		if ( ! name || ! content ) {
			console.log("name or content is empty!");
			return;
		}
		var postData = {
			message_info: JSON.stringify({
				name: name,
				content: content
			})
		};
		postData[AppData["csrf_token_name"]] = AppData["csrf_hash"];
		//console.log(postData);
		var ajax = new enyo.Ajax({
			url: "/webapp/submit_message",
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
			location.reload();
		} else {
			console.log("submit message failed.");
		}
	},
	processError: function(inSender, inResponse) {
		console.log("error message comment");
	}
});
