define(function(require, exports, module) {
	require('swfobject');
	var cons = require("cons");
	module.exports = {
		init : function() {
            swfobject.embedSWF("/js/sea-modules/swf/MultyGiftNotice.swf?20140218", "MultyGiftNoticeSwf", "640", "360", "10.0", "", {
                mtadd : UIF.handler.flash
            }, {
                wmode : "transparent",
                allowScriptAccess : "always"
            });
            swfobject.embedSWF("/js/sea-modules/swf/CustomGift.swf?20140218", "CustomGiftSwf", "640", "360", "10.0", "", {
                mtadd : UIF.handler.flash
            }, {
                wmode : "transparent",
                allowScriptAccess : "always"
            });
            swfobject.embedSWF("/js/sea-modules/swf/LevelUpPlayer.swf?20140218", "LevelUpPlayerSwf", "640", "360", "10.0", "", {
                mtadd : UIF.handler.flash
            }, {
                wmode : "transparent",
                allowScriptAccess : "always"
            });
            swfobject.embedSWF("/js/sea-modules/swf/EffectPlayer.swf?v=102403", "EffectPlayerSwf", 940, 500, "10.0", "", {
                mtadd : UIF.handler.flash
            }, {
                wmode : "transparent",
                allowScriptAccess : "always"
            });
		},
		close : function(data) {
			try {
				$("#" + data.elements).css("z-index", "0");
				$("#" + data.elements).css("pointer-events", "none");
				swfobject.getObjectById(data.elements).style.visibility = 'hidden';
			} catch (e) {
				setTimeout(function(){},5 * 1000);
			}
		},
		filDescribe : "\u8C6A\u534E\u793C\u7269",
		fil : function(data) {
			if (UIF.handler.effect) {
				try {
					$("#EffectPlayerSwf").css("z-index", "3000");
					swfobject.getObjectById("EffectPlayerSwf").style.visibility = 'visible';
					var url = UIF.cdn_domain+"/files/showGift/" + data.giftId + ".swf";
					swfobject.getObjectById('EffectPlayerSwf').jsNewGift(url, data.number, data.car, data.nickname, data.carName);
				} catch (e) {
					UIF.log(e);
				}
			}
		},
		figDescribe : "\u6570\u7EC4\u793C\u7269",
		fig : function(data) {
			if (UIF.handler.effect) {
				try {
					$("#EffectPlayerSwf").css("z-index", "3000");
					swfobject.getObjectById("EffectPlayerSwf").style.visibility = 'visible';
					swfobject.getObjectById("EffectPlayerSwf").jsRun(UIF.cdn_domain+"/files/showGift/" + data.image, data.shape);
				} catch (e) {
					UIF.log(e);
				}
			}
		},
		cusDescribe : "\u968F\u673A\u793C\u7269",
		cus : function(data) {
			if (UIF.handler.effect) {
				try {
					$("#CustomGiftSwf").css("z-index", "3000");
					swfobject.getObjectById("CustomGiftSwf").style.visibility = 'visible';
					swfobject.getObjectById("CustomGiftSwf").jsRun(UIF.cdn_domain+"/files/showGift/" + data.image + ".png", data.number);
				} catch (e) {
					UIF.log(e);
				}
			}
		},
		mulDescribe : "\u8FDE\u9001\u793C\u7269",
		mul : function(data){
			if (UIF.handler.effect) {
				try {
					$("#MultyGiftNoticeSwf").css("z-index", "3000");
					swfobject.getObjectById("MultyGiftNoticeSwf").style.visibility = 'visible';
					swfobject.getObjectById("MultyGiftNoticeSwf").showMultyGift(data.uid,data.user,data.number,data.sendNum,data.headImg,UIF.cdn_domain+"/files/showGift/" + data.giftImg + ".png");
				} catch (e) {
					UIF.log(e);
				}
			}
		},
		actDescribe : "\u6D3B\u8DC3\u5347\u7EA7",
		act : function(data){
			if (UIF.handler.effect) {
				try {
					$("#LevelUpPlayerSwf").css("z-index", "3000");
					$("#LevelUpPlayerSwf").css("pointer-events", "auto");
					swfobject.getObjectById("LevelUpPlayerSwf").style.visibility = 'visible';
					swfobject.getObjectById("LevelUpPlayerSwf").showActivityLevelup(data.headImg,data.actlevel);
				} catch (e) {
					UIF.log(e);
				}
			}
		},
		cohDescribe : "\u4EB2\u5BC6\u5347\u7EA7",
		coh : function(data){
			if (UIF.handler.effect) {
				try {
					$("#LevelUpPlayerSwf").css("z-index", "3000");
					$("#LevelUpPlayerSwf").css("pointer-events", "auto");
					swfobject.getObjectById("LevelUpPlayerSwf").style.visibility = 'visible';
					swfobject.getObjectById("LevelUpPlayerSwf").showIntimacyLevelup(data.headImg,data.cohlevel,data.anhimg);
				} catch (e) {
					UIF.log(e);
				}
			}
		},
		speDescribe : "\u7235\u4F4D\u5347\u7EA7",
		spe : function(data){
			if (UIF.handler.effect) {
				try {
					$("#LevelUpPlayerSwf").css("z-index", "3000");
					$("#LevelUpPlayerSwf").css("pointer-events", "auto");
					swfobject.getObjectById("LevelUpPlayerSwf").style.visibility = 'visible';
					swfobject.getObjectById("LevelUpPlayerSwf").showUserLevelup(data.nickname,data.speimg);
				} catch (e) {
					UIF.log(e);
				}
			}
		}
	}
})