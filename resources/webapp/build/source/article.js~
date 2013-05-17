enyo.kind({
	name: "App.Article",
	kind: "App.Base",
	components:[
		{kind: "Panels", name: "mainPanel",narrowFit: false,  fit:true,  classes: "", arrangerKind: "CarouselArranger", draggable: false, wrap: true, components: [
			{name: "mainContent", kind: "FittableRows", style:"width:100%",components: [
				{kind: "onyx.Toolbar",style: "overflow: hidden;", components: [
					{kind: "onyx.Button", content:"返回", style:"float:left",classes: "onyx-blue icon-home", ontap:"toLifetips"},
					{kind: "onyx.Button", name: "menuIcon",  content: "菜单",style:"float: right;", classes: "icon-reorder onyx-dark", ontap: "showMenu"},
				]},
				{name:"wrapper", style:"background-color: rgb(248, 247, 245);", components: [
					App.noticeComponents,
					{kind:"Scroller", name:"articleScroller", fit:true, strategyKind: "TouchScrollStrategy",components:[
						{tag:"div", name:"articleWrapper", style:"margin:0 10px 10px 10px;", components:[
							{tag:"h2", name:"articleTitle", style:"padding: 10px 5px 0 5px;font-size: 18px;"},
							{tag:"small",name:"pubTime", style:"padding: 0px 5px;", classes:"toy-orange"},
							{tag:"hr",style:"border:none;border-top:dashed 1px lightgrey;height: 0;" },
							{tag:"div", name: "articleContent", allowHtml: true, style:"padding: 5px 5px;font-size: 15px;"}
						]},
						{tag:"div", name:"commentsWrapper", components:[
							{name:"commentRepeater", onSetupItem:"setupComments", kind:"Repeater", components:[
								{name:"commentWrapper", style:"padding: 5px 15px;", components:[
									{tag: "div", components:[
										{tag:"span", name:"commentAuthor", style:"font-size: 14px;font-size: bold;"},
										{tag:"small", content:"评论", style:"margin-left: 5px;"},
										{tag: "small",classes:"toy-orange", style:"margin-left: 5px", name: "commentTime", allowHtml: true}
									]},
									{tag: "div", name:"commentContent",allowHtml: true,style:"padding-top: 5px;font-size: 14px;"}
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
	article: AppData["article"],
	comments: [
			{author: "王小建", content:"说的很对,支持!", createdAt:"2013-05-04 12:23",refer:"pis"},
			{author: "黄小虎", content:"路过,Mark...", createdAt:"2013-05-04 12:23", refer:"820"},
			{author: "王小建", content:"说的很对,支持!", createdAt:"2013-05-04 12:23",refer:"pis"},
			{author: "黄小虎", content:"路过,Mark...", createdAt:"2013-05-04 12:23", refer:"820"}
	],
	create:function(){
		this.inherited(arguments);

		this.$.commentRepeater.setCount(this.comments.length);
	},
	rendered: function() {
		this.inherited(arguments);

		var h = this.$.mainContent.getBounds().height - this.$.articleScroller.getBounds().top;
		this.$.articleScroller.applyStyle("height", h + "px");

		this.$.articleTitle.setContent(this.article["title"]);
		this.$.pubTime.setContent(this.article["created_at"]);
		this.$.articleContent.setContent(this.article["content"]);

	},
	setupComments: function(inSender, inEvent) {
		var index = inEvent.index;
		var comment = this.comments[index];
		var item = inEvent.item;
		item.$.commentAuthor.setContent(comment.author);
		item.$.commentTime.setContent("@" + comment.createdAt);
		item.$.commentContent.setContent('@' + '<span class="enyo-blue">' + comment.refer + ': </span>&nbsp;'+comment.content);
		if (index % 2 == 0) {
			item.$.commentWrapper.applyStyle("background-color", "white");
		}
	}
});
