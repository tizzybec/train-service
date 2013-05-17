enyo.kind({
	name: "App.Message",
	kind: "App.Base",
	components:[
		{kind: "Panels", name: "mainPanel",narrowFit: false,  fit:true,  classes: "", arrangerKind: "CarouselArranger", draggable: false, wrap: true, components: [
			{name: "mainContent", kind: "FittableRows", style:"width:100%",components: [
				{kind: "onyx.Toolbar", name:"mainToolbar", style: "overflow: hidden;", components: [
					{kind: "onyx.Button", content:"返回", style:"float:left",classes: "onyx-blue icon-home", ontap:"toMessage"},
					{kind: "onyx.Button", name: "menuIcon",  content: "菜单",style:"float: right;", classes: "icon-reorder onyx-dark", ontap: "showMenu"},
				]},
		  /*
				{tag:"div", name:"meassageBar", style:"color:rgb(41, 39, 39); opacity: 0.9; position: absolute;left: 0; z-index: 99; display:block;width: 100%", classes:"", ontap:"",components:[
					{kind:"onyx.Toolbar", name:"",style:"padding: 5px 8px", classes:"", fit: true,components:[
						{kind: "onyx.InputDecorator", alwaysLooksFocused:true,components: [
							{kind: "onyx.Input", name:"messageInput",value: "", style:"" }
						]},
						{kind:"onyx.Button", style:"height:32px;background: #e1e1e1;color: #292929", content:"评论"}
					]}
				]},
		  */
				{name:"wrapper", kind:"FittableRows", fit:true, components: [
					App.noticeComponents,
					{kind:"Scroller", name:"messageScroller", fit:true, strategyKind: "TouchScrollStrategy",components:[
						{tag:"div", name:"messageWrapper", style:"padding: 0 5px;",components:[
							{tag:"div", components:[
								{tag:"span", name: "messageAuthor",style:"font-size: 14px;"},
								{tag:"small", name: "msgCreatedAt", style:"margin-left: 5px;", classes:"toy-orange"},
							]},
							{tag: "div", name:"contentWrapper", style:"padding: 0;", components:[
								{tag:"div",style:"width:0; height:0;border:5px solid #b50; border-color:transparent transparent #b50 transparent;margin:-2px 0 -1px 5px;"},
								/*
								{tag:"div", style:"width: 22px;margin:0 0 0px 5px;position: absolute;",components:[
									{tag:"span", content:"◆",style:"color: #b50;display: block;font-family: SimSun;font-size:12px"},
									{tag:"span",content:"◆",style:"color: white;margin-top: -16px;display: block;font-family: SimSun;font-size:12px"}
								]},
		  */
								{tag:"div", name:"messageContent",allowHtml: true, style:"border: solid 1px #b50; min-height: 50px;padding: 5px 2px;font-size: 14px;"}
							]}
						]},
						{tag:"div", name:"commentsWrapper",  style:"margin-top: 15px;", components:[
							{name:"commentRepeater", onSetupItem:"setupComments", kind:"Repeater", components:[
								{name:"commentWrapper", style:"padding: 5px;", components:[
									{tag: "div", components:[
										{tag:"span", name:"commentAuthor", style:"font-size: 14px;font-size: bold;"},
										{tag:"small", content:"评论", style:"margin-left: 5px;"},
										{tag: "small",classes:"toy-orange", style:"margin-left: 5px", name: "commentTime", allowHtml: true}
									]},
									{tag: "div", name:"commentContent",allowHtml: true,style:"padding-top: 5px;font-size: 14px;"}
								]}
							]}
						]},
						{name:"commentBody",style:"position: relative", classes:"comment-body odd-comment",  components:[
							{tag:"div", classes:"comment-row", components:[
								{tag: "label", content:"称呼"},
								{kind: "onyx.InputDecorator", style:"width: 30%;",alwaysLooksFocused:true,components: [
									{kind: "onyx.Input", name:"userName", style:"width: 100%;",classes:"my-input-decorator",onfocus:"beginEdit",onblur:"endEdit", placeholder:"您的名号", }
								]},
							]},
							{tag:"div", classes:"comment-row",components:[
								{tag: "label", content:"邮箱"},
								{kind: "onyx.InputDecorator", style:"width: 30%;",alwaysLooksFocused:true,components: [
									{kind: "onyx.Input", name:"userEmail", style:"width: 100%;",classes:"my-input-decorator",onfocus:"beginEdit",onblur:"endEdit", placeholder:"您的邮箱" }
								]},
								{tag: "small", content:"(非必填)"},
							]},
							{tag:"div", classes:"comment-row", style:"padding: 0 5px;", components:[
								{kind: "onyx.InputDecorator", style:"width: 100%;", alwaysLooksFocused:true,components: [
									{kind: "onyx.TextArea", name:"commentTextarea", style:"width: 85%;",onfocus:"beginEdit",onblur:"endEdit",placeholder:"您的评论.", },
									{kind:"onyx.Button", style:"width: 14%;height: 100%;min-height: 45px;padding: 0;", classes:"onyx-affirmative", content:"评论", ontap:"submitComment"},
									{tag: "span", style:"display:inline-block; width: %1"}
								]}
							]}
						]}
					]}
				]}
				//{tag: "div", content: "@copyright dinsy&powerm", style:"font-size: 10px; color: lightgrey; text-align: center"}
			]},
			App.menuComponents
		]}
	],
	message:AppData["message"],
	create:function(){
		this.inherited(arguments);
		this.$.commentRepeater.setCount(this.message.comments.length);
	},
	rendered: function() {
		this.inherited(arguments);

		//var h = this.$.mainContent.getBounds().height - this.$.mainToolbar.getBounds().height /*-  46 */;
		//this.$.messageScroller.applyStyle("height", h + "px");

		/*
		var mh = this.$.mainPanel.getBounds().height;
		this.$.messageInput.applyStyle("width", this.$.mainContent.getBounds().width - 47 - 50 + "px");
		this.$.meassageBar.applyStyle("top",  (mh -this.$.meassageBar.getBounds().height) + "px");
*/
		var m = this.message.message;
		this.$.messageAuthor.setContent(m["name"]);
		this.$.msgCreatedAt.setContent("@"+m["created_at"]);
		this.$.messageContent.setContent(m["content"]);

		window.c = this.$.commentTextarea;

	},
	setupComments: function(inSender, inEvent) {
		var index = inEvent.index;
		var comment = this.message.comments[index];
		var item = inEvent.item;
		item.$.commentAuthor.setContent(comment["name"]);
		item.$.commentTime.setContent("@" + comment["created_at"]);
		item.$.commentContent.setContent('@' + '<span class="enyo-blue">' + comment["refer_to"] + ': </span>&nbsp;'+comment["content"]);
		if (index % 2 == 0) {
			item.$.commentWrapper.addClass("odd-comment");
		}
	},
	submitComment: function(inSender, inEvent) {
		var name = this.$.userName.getValue();
		var email = this.$.userEmail.getValue();
		var content = this.$.commentTextarea.getValue();
		if ( ! name || ! content ) {
			console.log("name or content is empty!");
			return;
		}
		var postData = {
			comment_info: JSON.stringify({
				message_id: parseInt(this.message.message["message_id"]),
				name: name,
				content: content
			})
		};
		postData[AppData["csrf_token_name"]] = AppData["csrf_hash"];
		//console.log(postData);
		var ajax = new enyo.Ajax({
			url: "/webapp/submit_msg_comment",
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
			console.log("submit comment failed.");
		}
	},
	processError: function(inSender, inResponse) {
		console.log("error submit comment");
	}
});
