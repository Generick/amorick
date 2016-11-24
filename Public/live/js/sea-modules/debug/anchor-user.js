define(function(require, exports, module) {
	var cons = require("cons");
	var gift = require("./anchor-gift");
	var Tools = require('./anchor-tools');
	module.exports = {
		data : {},
		parameters : function(data) {
			this.data = data;
			this.init();
		},
		init : function() {
			var base = this;
			$("#sendChatBtn").removeAttr("disabled");
			$("#msgContent").removeAttr("disabled");
			base.container = $(".nav-left .nl-login .main-title .infoBox");
			base.container2 = $(".newGifts .portraits");
			base.container.find(".kb").text(Tools.nreplace(base.data.coins));
			base.container.find(".mtname").text(base.data.nickname);
			base.container.find(".mt-inner").width(base.data.sppes + "%");
			base.container.find(".mtlevel").html('<span class="sprite consumelevel-pic_consumelevel_'+base.data.splev+'"></span>');
			if(base.data.actlev != null && base.data.actlev != "")
				base.container2.find(".circleLevel").addClass("sprite activelevel-pic_activelevel_"+base.data.actlev);
			if (UIF.radials != undefined && UIF.radials != null) {
				UIF.radials.value(Number(base.data.actpes));
			}
			if (base.data.packs != null && base.data.packs.length > 0) {
				base.packs = jQuery.parseJSON(base.data.packs);
				for (var i = 0; i < base.packs.length; i++) {
					if (base.packs[i].num > 0) {
						$("#giftList28 ." + base.packs[i].giftId).removeClass("hideli");
					}
					$("#giftList28 ." + base.packs[i].giftId).attr("giftNum", base.packs[i].num);
				}
			}
			if (base.data.roles != null && base.data.roles.length > 0) {
				if (base.data.roles.indexOf("banned") > 0) {
					$("#sendChatBtn").attr("disabled", true);
					$("#msgContent").attr("disabled", true);
				}
			}
			if (base.data.isAnchor) {
				$("#setting").show();
			} else {
				$(".self-care").show();
			}
			if (base.data.isFollows) {
				$(".followout").show();
				$(".followme").hide();
			}
			if (base.data.levs != null && base.data.levs.length > 0) {
				UIF.handler.cache.remove(cons.USER_HEADIMAG);
				UIF.handler.cache.put(cons.USER_HEADIMAG, base.data.levs);
			}
			if (base.data.roles != null && base.data.roles.length > 0) {
				UIF.handler.cache.remove(cons.USER_HEADROLES);
				UIF.handler.cache.put(cons.USER_HEADROLES, base.data.roles);
			}
			var headInfo = UIF.handler.cache.get(cons.USER_HEADINFOS);
			var anchInfo = UIF.handler.cache.get(cons.ANCHOR_HEADINFOS);
			if(headInfo != null){
				if(headInfo.actlev != null && base.data.actlev != null && base.data.actlev > headInfo.actlev){
					gift.actGift({himage : base.data.himage,actlev : base.data.actlev});
				}
				if(headInfo.cohesion != null && base.data.cohesion != null && base.data.cohesion > headInfo.cohesion){
					gift.cohGift({himage : base.data.himage,cohlevel : base.data.cohesion,anhimg : anchInfo.avatar});
				}
				if(headInfo.splev != null && base.data.splev != null && base.data.splev >= 6 && base.data.splev > headInfo.splev){
					UIF.handler.upgrade({nickname : base.data.nickname,splev : base.data.splev,actions : "upgrade"},function(data){});
				}
			}
			UIF.handler.cache.remove(cons.USER_HEADINFOS);
			UIF.handler.cache.put(cons.USER_HEADINFOS, base.data);
		}
	}
});
