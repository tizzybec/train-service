enyo.kind({
	name: "App.Order",
	kind: "App.Base",
	components:[
		{kind: "Panels", name: "mainPanel",narrowFit: false,  fit:true,  classes: "", arrangerKind: "CarouselArranger", draggable: false, wrap: true, components: [
			{name: "mainContent", kind: "FittableRows", style:"width:100%",components: [
				{kind: "onyx.Toolbar",style: "overflow: hidden;", components: [
					{kind: "onyx.Button", content:"返回", style:"float:left;",classes: "onyx-blue icon-home", ontap:"toHome"},
					//{tag:"div", name:"orderTitle", content:"点餐", style:"padding:5"},
					{kind: "onyx.Button", name: "comfirmIcon",  content: "确定",style:"float: right;", classes: "onyx-dark  icon-circle-blank", ontap:"showMenu"}
					//{kind: "onyx.Button", name: "menuIcon",  content: "菜单",style:"float: right;", classes: "icon-reorder onyx-dark", ontap: "showMenu"},
				]},
				{name:"wrapper",  kind:"FittableRows", fit:true, classes: "group-wrapper",components:[
					App.noticeComponents,
					{kind: "enyo.Scroller", fit:true, name:"orderScroller",strategyKind: "TouchScrollStrategy", components:[
						{kind: "onyx.Groupbox", classes:"order-groupbox",components:[
							{kind: "onyx.GroupboxHeader", content: "套餐", ontap:"hideCombo"},
							{kind: "Repeater", name:"comboRepeater",onSetupItem:"setupComboItem", components:[
								{name:"comboItem", components: [
									{tag:"div", name: "comboHeader", ontap:"showDetails",classes:"order-row",components:[
										{tag:"span", name:"comboName", classes:"order-row-left"},
										{tag:"div", classes:"order-row-right", components:[
											{tag:"span", name:"comboPrice",classes:"price-label"},
											{kind:"onyx.Button", name:"buyButton", content:"购买",  classes:"order-buy-button onyx-affirmative", ontap:"buyCombo",popup:"itemPopup"}
										]}
									]},
									{tag:"div", name: "comboDetail", classes:"order-row odd-comment", style:"display: none;height: auto; padding: 10px;",allowHtml:true, components:[]}
								]}
							]}
						]},
						{kind: "onyx.Groupbox", classes:"order-groupbox",style:"margin-top: 5px;", components:[
							{kind: "onyx.GroupboxHeader", content: "单品"},
							{kind: "Repeater",  name:"goodsRepeater",style:"",onSetupItem:"setupGoodsItem",components:[
								{name: "goodsItem", ontap:"", classes:"order-row", components:[
									{tag:"span", name:"goodsName", classes:"order-row-left"},
									{tag:"div", classes:"order-row-right", components:[
										{tag:"span", name:"goodsPrice", classes:"price-label"},
										{kind:"onyx.Button", name:"buyButton", content:"购买", classes:"order-buy-button onyx-affirmative", ontap:"buyGoods",popup:"goodsItemPopup"}
									]}
								]},
							]}
						]},
						{name: "itemPopup", kind: "onyx.Popup", classes:"order-popup", centered: true, floating: true,scrim: true, onShow:"showPopup", onHide:"hidePopup",  components:[
							{kind: "onyx.InputDecorator", alwaysLooksFocused:true, components: [
								{kind: "onyx.Input", placeholder: "Enter text here", defaultFocus:true, onchange:""},
							]},
							{tag:"div", classes:"order-popup-buttons",components: [
								{kind: "onyx.Button",classes:"onyx-affirmative", content:"确定",ontap:"changeItemNum"},
								{kind: "onyx.Button",classes:"onyx-negative", content:"删除",ontap:"deleteItem"}
							]}	
						]},
						{name: "goodsItemPopup", classes:"order-popup", kind: "onyx.Popup", centered: true, floating: true, scrim: true,onShow:"showPopup", onHide:"hidePopup",components:[
							{kind: "onyx.InputDecorator", alwaysLooksFocused:true, components: [
								{kind: "onyx.Input", placeholder: "Enter text here", defaultFocus:true, onchange:""},
							]},
							{tag:"div",  classes:"order-popup-buttons", components: [
								{kind: "onyx.Button",classes:"onyx-affirmative", content:"确定",ontap:"changeGoodsItemNum"},
								{kind: "onyx.Button", classes:"onyx-negative", content:"删除",ontap:"deleteGoodsItem"}
							]}
						]},
					]}
				]}
				//{tag: "div", content: "@copyright dinsy&powerm", style:"font-size: 10px; color: lightgrey; text-align: center"}
			]},
			{name: "menu", classes:"main-menu", style:"50%; background: none;",  components: [
				{kind: "onyx.Toolbar", name: "rightMenuToolbar", style: "padding-right: 0;height: 36px;", components: [
					{kind: "onyx.Button", name:"returnIcon", style:"float:left;", classes: "icon-angle-left", content:"返回", ontap:"showMenu"},
					{kind: "onyx.Button", name: "menuListIcon",  style:"float: right;", content: "提交", classes: "icon-shopping-cart", ontap: "confirmOrder"}
				]},
				{kind: "enyo.Scroller", name:"menuScroller", fit: true,  strategyKind: "TouchScrollStrategy", components: [
					{kind: "onyx.Groupbox", classes:"userinfo-groupbox", components:[
							{kind: "onyx.GroupboxHeader", content: "用户信息"},
							{tag:"div", classes:"userinfo-row",  components:[
								{tag:"div",content:"用户称呼", classes:"userinfo-left"},
								{kind: "onyx.InputDecorator",  classes:"userinfo-right",  alwaysLooksFocused:true,components: [
									{kind: "onyx.Input", name:"userNameInput", style:"width: 100%; text-align: right;",classes:"", placeholder:"您的大名" }
								]}
							]},
							{tag:"div", classes:"userinfo-row",  components:[
								{tag:"div",content:"所在车厢", classes:"userinfo-left"},
								{kind: "onyx.InputDecorator",  classes:"userinfo-right",  alwaysLooksFocused:true,components: [
									{kind: "onyx.Input", name:"carriageSerialInput", style:"width: 100%; text-align: right;",classes:"", placeholder:"您所在车厢" }
								]}
							]},
							{tag:"div", classes:"userinfo-row",  components:[
								{tag:"div",content:"车厢座位", classes:"userinfo-left"},
								{kind: "onyx.InputDecorator",  classes:"userinfo-right",  alwaysLooksFocused:true,components: [
									{kind: "onyx.Input", name:"seatNumInput", type:"number", min: "1", style:"width: 100%; text-align: right;",placeholder:"您的座位号"}
								]}
							]},
							{tag:"div", classes:"userinfo-row",  components:[
								{tag:"div",content:"应付总额", classes:"userinfo-left"},
								{kind: "onyx.InputDecorator",  classes:"userinfo-right",  alwaysLooksFocused:true,components: [
									{kind: "onyx.Input", name:"totalPriceInput", style:"width: 100%; text-align: right;color: rgb(197, 22, 22);", value:"￥1", disabled: true }
								]}
							]}
						]}
				]}
			]}
		]}
	],
	showPopup: function(){
		this.isEditing = true;
	},
	hidePopup: function(){
		this.isEditing = false;
	},
	combos:AppData["order"] && AppData["order"]['combos'],
	goods:AppData["order"] && AppData["order"]['goods'],
	published: {
		divide: 1,
		comboIndex: -1,
		goodsIndex: -1,
		userInfo: {},
		goodsInOrder: [],
		comboInOrder: [],
		totalPrice: 0,
		isEditing: false
	},
	create:function(){
		this.inherited(arguments);
		this.$.comboRepeater.setCount(this.combos.length);
		this.$.goodsRepeater.setCount(this.goods.length);
	},
	rendered: function() {
		this.inherited(arguments);

		//var h = this.$.mainContent.getBounds().height - this.$.orderScroller.getBounds().top - 10;
		//this.$.orderScroller.applyStyle("height", h + "px");
		
	},
	setupComboItem: function(inSender, inEvent) {
		var index = inEvent.index;
		var item = inEvent.item;
		var combo = this.combos[index];
		item.$.comboName.setContent(combo["name"]);
		item.$.comboPrice.setContent(combo["price"] + "元");
		var comboDesc = "套餐包含:<br />";
		for (i = 0; i < combo["goods"].length; ++i) {
			comboDesc += combo["goods"][i] + " ";
		}
 		item.$.comboDetail.setContent(comboDesc);
	},
	setupGoodsItem: function(inSender, inEvent) {
		var index = inEvent.index;
		var item = inEvent.item;
		var goods = this.goods[index];
		item.$.goodsName.setContent(goods["name"]);
		item.$.goodsPrice.setContent(goods["price"] + "元");
	},
	showDetails: function(inSender, inEvent) {
		var detailNode = inSender.parent.children[1];
		if (detailNode.getComputedStyleValue('display') == 'none'){
			detailNode.applyStyle('display', 'block');
		} else {
			detailNode.applyStyle('display', 'none');
		}
	},
	buyCombo: function(inSender, inEvent) {
		var index = inEvent.index;
		var priceNode = inSender.parent.children[0];
		var price = priceNode.getContent().match(/([\d]+[.][\d]+元)$/)[1];
		if (inSender.getContent().match(/购买/)) {
			inSender.setContent("编辑");
			priceNode.setContent("1 x " + price);
			this.combos[index].num = 1;
		} else {
			//console.log(this.$[inSender.popup]);
			this.comboIndex = index;
			this.$[inSender.popup].show();
			this.$[inSender.popup].children[0].children[0].setValue(this.combos[index].num);
			//this.$[inSender.popup].children[0].children[0].fucus();
		}
		return true;
	},
	buyGoods: function(inSender, inEvent) {
		var index = inEvent.index;
		var priceNode = inSender.parent.children[0];
		var price = priceNode.getContent().match(/([\d]+[.][\d]+元)$/)[1];
		if (inSender.getContent().match(/购买/)) {
			inSender.setContent("编辑");
			priceNode.setContent("1 x " + price);
			this.goods[index].num = 1;
		} else {
			//console.log(this.$[inSender.popup]);
			this.goodsIndex = index;
			this.$[inSender.popup].show();
			this.$[inSender.popup].children[0].children[0].setValue(this.goods[index].num);
			//this.$[inSender.popup].children[0].children[0].fucus();
		}
		return true;
	},
	changeItemNum: function(inSender, inEvent){
		var index = this.comboIndex;
		var input = inSender.parent.parent.children[0].children[0];
		if  (input.getValue() != '') {
			//console.log(this.combos);
			this.combos[index].num = parseInt(input.getValue());
			var proxyIndex = (index == 0) ? '' : index + 1;
			var priceNode = this.$.comboRepeater.$["ownerProxy"+proxyIndex].$.comboPrice;
			//console.log(priceNode);
			var price = priceNode.getContent().match(/([\d]+[.][\d]+元)$/)[1];
			priceNode.setContent(input.getValue() + " x " + price);
		}
		inSender.parent.parent.hide();
	},
	deleteItem: function(inSender, inEvent) {
		var index = this.comboIndex;
		var proxyIndex = (index == 0) ? '' : index + 1;
		var comboPrice = this.$.comboRepeater.$["ownerProxy"+proxyIndex].$.comboPrice;
		var buyButton = this.$.comboRepeater.$["ownerProxy"+proxyIndex].$.buyButton;
		comboPrice.setContent(this.combos[index].price + "元");
		buyButton.setContent("购买");
		this.combos[index].num = 0;
		inSender.parent.parent.hide();
	},
	changeGoodsItemNum: function(inSender, inEvent){
		var index = this.goodsIndex;
		var input = inSender.parent.parent.children[0].children[0];
		if  (input.getValue() != '') {
			//console.log(this.combos);
			this.goods[index].num = parseInt(input.getValue());
			var proxyIndex = (index == 0) ? '' : index + 1;
			var priceNode = this.$.goodsRepeater.$["ownerProxy"+proxyIndex].$.goodsPrice;
			//console.log(priceNode);
			var price = priceNode.getContent().match(/([\d]+[.][\d]+元)$/)[1];
			priceNode.setContent(input.getValue() + " x " + price);
		}
		inSender.parent.parent.hide();
	},
	deleteGoodsItem: function(inSender, inEvent) {
		var index = this.goodsIndex;
		var proxyIndex = (index == 0) ? '' : index + 1;
		var goodsPrice = this.$.goodsRepeater.$["ownerProxy"+proxyIndex].$.goodsPrice;
		var buyButton = this.$.goodsRepeater.$["ownerProxy"+proxyIndex].$.buyButton;
		goodsPrice.setContent(this.goods[index].price + "元");
		buyButton.setContent("购买");
		this.goods[index].num = 0;
		inSender.parent.parent.hide();
	},
	hideCombo: function(inSender, inEvent) {
		var comboNode = inSender.parent.children[1];
		if (comboNode.getComputedStyleValue('display') == 'none'){
			comboNode.applyStyle('display', 'block');
		} else {
			comboNode.applyStyle('display', 'none');
		}
	},
	fillUserInfo: function(inSender, inEvent) {
	var c  = this.$.wrapper.createComponent(
			{style:"height: 100%", components:[
				{tag:"div", content:"test"}
			]},
			{owner: this.$.wrapper}
		);
		c.render();
		//inSender.setProperty("disabled", true);
	},
	_totalPrice: function() {
		this.comboInOrder = this.goodsInOrder = [];
		var sum = 0;
		for (c in this.combos) {
			if (this.combos[c].num) {
				sum += (this.combos[c].num || 0) * parseFloat(this.combos[c].price);
				this.comboInOrder.push([parseInt(this.combos[c].combo_id), this.combos[c].num]);
			}
		}
		for (g in this.goods) {
			if (this.goods[g].num) {
				sum += (this.goods[g].num || 0) * parseFloat(this.goods[g].price);
				this.goodsInOrder.push([parseInt(this.goods[g].goods_id), this.goods[g].num]);
			}
		}
		this.totalPrice = sum;
		return sum;
	},
	showMenu: function(inSender, inEvent) {
		this.inherited(arguments);
		this.$.totalPriceInput.setValue("￥" + this._totalPrice());
		//console.log(this._totalPrice());
	},
	confirmOrder: function(inSender, inEvent){
		if (this.totalPrice <= 0) {
			console.log("no item selected:)");
			return;
		}
		var validateField = ["userNameInput", "carriageSerialInput", "seatNumInput"];
		for (i in validateField) {
			if ( ! this.$[validateField[i]].getValue() ) {
				console.log("lack necessary infomation");
				return;
			}
		}
		
		var postData = {
				order:JSON.stringify({
					custom: this.$.userNameInput.getValue(),
					address: this.$.carriageSerialInput.getValue() + "," +this.$.seatNumInput.getValue() ,
					total_price: this.totalPrice
				}),
				goods: JSON.stringify(this.goodsInOrder),
				combos: JSON.stringify(this.comboInOrder)
		};
		postData[AppData["csrf_token_name"]] = AppData["csrf_hash"]
		var ajax = new enyo.Ajax({
			url: "/webapp/submit_order",
			postBody: postData,
			sync: true,
			method: "POST"
		});
		ajax.response(this, "processSubmit");
		ajax.error(this, "errorSubmit");
		ajax.go();
		inSender.disabled = true;
	},
	processSubmit: function(inSender, inResponse) {
		if (inResponse.code == 0) {
			location.reload();
			console.log("submit order succed!");
		}
		this.$.menuListIcon.disabled = false;
	},
	errorSubmit: function(inSender, inResponse) {
		this.$.menuListIcon.disabled = false;
	}
});
