enyo.kind({
	name: "App.Traininfo",
	kind: "App.Base",
	components:[
		{kind: "Panels", name: "mainPanel",narrowFit: false,  fit:true,  classes: "", arrangerKind: "CarouselArranger", draggable: false, wrap: true, components: [
			{name: "mainContent", kind: "FittableRows", style:"width:100%",components: [
				{kind: "onyx.Toolbar",style: "overflow: hidden;", components: [
					{kind: "onyx.Button", content:"返回", style:"float:left",classes: "onyx-blue icon-home",ontap:"toManage"},
					{kind: "onyx.Button", name: "menu_icon",  content: "菜单",style:"float: right;", classes: "icon-reorder onyx-dark", ontap: "showMenu"},
				]},
				{name:"wrapper",  kind:"FittableRows", fit:true, style :"padding: 5px;",components: [
					App.noticeComponents,
					{name:"infoScroller", kind:"Scroller", fit:true, components:[
						{kind:"onyx.Groupbox", components:[
							{kind:"onyx.GroupboxHeader",content:"主要信息"},
							{name:"mainRepeater",kind:"Repeater",onSetupItem:"setMainInfo",components:[
								{tag:"div", classes:"info-item", style:"border-bottom: solid 1px grey;height: 40px",components:[
									{tag:"span",style:"width: 30%;height: 100%;border-right: solid 1px grey;",components:[
										{tag:"span",name:"infoField", style:""}
									]},
									{tag:"span",style:"width: 60%",components:[
										{tag:"span",name:"infoValue"}
									]}
								]}
							]}
						]},
						{kind:"onyx.Groupbox", style:"margin-top: 5px;",components:[
							{kind:"onyx.GroupboxHeader",content:"额外信息"},
							{name:"extraRepeater",kind:"Repeater",onSetupItem:"setExtraInfo",components:[
								{tag:"div", classes:"info-item", style:"border-bottom: solid 1px grey; height: 40px",components:[
									{tag:"span",style:"width: 30%;height: 100%;border-right: solid 1px grey;",components:[
										{tag:"span",name:"infoField"}
									]},
									{tag:"span",style:"width: 60%;",components:[
										{tag:"span",name:"infoValue"}
									]}
								]}
							]}
						]}
					]},
				]}
				//{tag: "div", content: "@copyright dinsy&powerm", style:"font-size: 10px; color: lightgrey; text-align: center"}
			]},
			App.menuComponents
		]}
	],
	trainInfo:{
		mainInfo: [
			["id",  AppData["train_info"] && AppData["train_info"]["train_id"]],
			["车次",  AppData["train_info"] && AppData["train_info"]["serial"]],
		],
		extraInfo:AppData["train_info"] && AppData["train_info"]["extra_info"]
	},
	create:function(){
		this.inherited(arguments);
		this.$.mainRepeater.setCount(this.trainInfo.mainInfo.length);
		this.$.extraRepeater.setCount(this.trainInfo.extraInfo.length);
	},
	rendered: function() {
		this.inherited(arguments);

		//var h = this.$.mainContent.getBounds().height - this.$.infoScroller.getBounds().top;
		//this.$.infoScroller.applyStyle("height", h + "px");
	},
	setMainInfo: function(inSender, inEvent){
		var index = inEvent.index;
		var item = inEvent.item;
		var mainInfo = this.trainInfo.mainInfo[index];
		item.$.infoField.setContent(mainInfo[0]);
		item.$.infoValue.setContent(mainInfo[1]);
	},
	setExtraInfo: function(inSender, inEvent){
		var index = inEvent.index;
		var item = inEvent.item;
		var extraInfo = this.trainInfo.extraInfo[index];
		item.$.infoField.setContent(extraInfo[0]);
		item.$.infoValue.setContent(extraInfo[1]);
	}
});
