enyo.kind({
	name: "App.Lifetips",
	kind: "App.Base",
	components:[
		{kind: "Panels", name: "mainPanel",narrowFit: false,  fit:true,  classes: "", arrangerKind: "CarouselArranger", draggable: false, wrap: true, components: [
			{name: "mainContent", kind: "FittableRows", style:"width:100%",components: [
				{kind: "onyx.Toolbar",style: "overflow: hidden;", components: [
					{kind: "onyx.Button", content:"返回", style:"float:left",classes: "onyx-blue icon-home", ontap:"toHome"},
					{kind: "onyx.Button", name: "menu_icon",  content: "菜单",style:"float: right;", classes: "icon-reorder onyx-dark", ontap: "showMenu"},
				]},
				{name:"wrapper",kind:"FittableRows",style:"padding: 0 5px 2px 5px;background-color: rgb(245, 245, 245);", fit: true,components: [
					App.noticeComponents,
					{name:"articleList", kind:"List", fit:true, style:"",fixedHeight:true,noSelect:true,onSetupItem:"setupArticleItem",classes:"enyo-unselectable",components:[
						{name:"articleItem", classes:"article-item",ontap:"toArticle",style:"padding: 5px; clear: both;height: 70px;margin-top: 5px;border-radius: 0px;overflow:hidden",components: [
							{tag: "img", name:"articleImage",style:"padding:5px;width:60px; height:60px;border:none;float: left;margin-right: 5px",ontap:"toArticle",},
							{tag:"div",name:"wordWrapper",style:"padding: 5px;overflow:hidden", ontap:"toArticle",components:[
								{tag:"div", name:"articleTitle",classes:"", ontap:"toArticle",style:"font-size: 14px;height:14px;color:grey;overflow: hidden;"},//text-shadow: 0 1px 0 #fff;color: rgb(47, 62, 70);
								{tag:"div", name:"articleOverview",ontap:"toArticle",style:"font-size: 12px;height: 22px;color: #2f3e46;padding: 5px 5px 5px 0;overflow: hidden;"}
							]}
						]}
					]}
				]}
				//{tag: "div", content: "@copyright dinsy&powerm", style:"font-size: 10px; color: lightgrey; text-align: center"}
			]},
			App.menuComponents
		]}
	],
	articles:AppData["lifetips"],
	create:function(){
		this.inherited(arguments);
		this.$.articleList.setCount(this.articles.length);
	},
	rendered: function() {
		this.inherited(arguments);

		var h = this.$.mainContent.getBounds().height - this.$.wrapper.getBounds().top;
		this.$.wrapper.applyStyle("height", h + "px");

	},
	toArticle: function(inSender, inEvent){
		inSender.disabled = true;
		var index = inEvent.index;
		articleId = this.articles[index]["article_id"];
		redirectTo("/mobile/webpage/article/" + articleId);
	},
	setupArticleItem: function(inSender, inEvent) {
		var index = inEvent.index;
		var article = this.articles[index];
		this.$.articleImage.setSrc("/resources/webapp/assets/1.jpg");
		this.$.articleTitle.setContent(article["title"]);
		this.$.articleOverview.setContent(article["content"].slice(0, 100));
	}
});
