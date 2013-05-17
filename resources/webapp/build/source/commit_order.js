enyo.kind({
	name: "App",
	kind: "App.Base",
	components:[
		{kind: "Panels", name: "mainPanel",narrowFit: false,  fit:true,  classes: "", arrangerKind: "CarouselArranger", draggable: false, wrap: true, components: [
			{name: "mainContent", kind: "FittableRows", style:"width:100%",components: [
				{kind: "onyx.Toolbar",style: "overflow: hidden;", components: [
					{kind: "onyx.Button", content:"首页", style:"float:left",classes: "onyx-blue icon-home"},
					{kind: "onyx.Button", name: "menu_icon",  content: "菜单",style:"float: right;", classes: "icon-reorder onyx-dark", ontap: "showMenu"},
				]},
				{name:"wrapper", components: [ 
				]},
				{tag: "div", content: "@copyright dinsy&powerm", style:"font-size: 10px; color: lightgrey; text-align: center"}
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
	},
});
