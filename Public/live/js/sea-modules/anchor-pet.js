define(function(require, exports, module) {
	var swf = require("./anchor-swf");
	module.exports = {
		//所有操作菜单
		options : ["左行走", "挨打", "攻击"],
		menuOpt : ["详情", "喂食"],
		init : function() {
			this.initPetOptView();
			this.initPetInteractions();
            this.setVisible();
		},
        setVisible : function(){
            $(".PetSwf").hide();
        },
		
		//初始化宠物操作面板
		initPetOptView : function() {
			var _this = this;
			//宠物操作面板事件
			$(".petOpt-tip-warp button").click(function(event){
				var actionName = event.target.textContent;
				if(-1 != $.inArray(actionName,_this.options)){
					swf.petPlayAction(actionName);
				}else{
					switch(actionName){
						case "详情":

							break;
						case "喂食":
							
							break;
						case "确定修改":
							_this.changePetname();
							break;
					}
				}
			});
			
			//宠物改名
			$(".petOpt-tip-warp input").focus(function(event){
				console.log("onfocus");
			});
			
			//宠物改名
			$(".petOpt-tip-warp input").blur(function(event){
				console.log("onBlur");
			});
			if(this.checkIfAnchor()){
				document.getElementById("petOpt-tip-warp-petNameInput").readOnly = false;
				$("#petOpt-tip-warp-changeNameBtn").show();
			}
		},
		
		//注册宠物点击、移动等事件
		initPetInteractions : function() {
			//宠物点击弹窗
			$(".PetSwf").click(function(e){
				if ($(this).hasClass('noclick')) {
					$(this).removeClass('noclick');
				}
				else {
					var initL = e.pageX;
					var initT = e.pageY;
					$('.petOpt-tip-warp').css({
						'left' : initL + $(".PetSwf")[0].clientHeight * .5 + "px",
						'top' : initT + "px"
					});
					$(".petOpt-tip-warp").show();
				}
			});
			
			//宠物拖动
			$(".PetSwf").draggable({containment:"parent",
				start:function(event,ui){
					$(this).addClass('noclick');
				},
				stop:function(event,ui){
					setTimeout(300, function(){
						if ($(this).hasClass('noclick')) {
							$(this).removeClass('noclick');
						}
					})
					
				}
			});	
		},
		changePetname : function(){
			var petName = document.getElementById("petOpt-tip-warp-petNameInput").value;
			document.getElementById("petName").innerHTML = petName;
		},
		//检测是否是主播
		checkIfAnchor : function(){
			if(UIF.handler.anchorId != UIF.handler.userId){
				return false;
			}
			return true;
		}
	}
});
