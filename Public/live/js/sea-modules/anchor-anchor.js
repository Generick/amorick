define(function(require, exports, module) {
	var cons = require("cons");
	var list = require("./anchor-list");
	var Tools = require('./anchor-tools');
	module.exports = {
		anchors : {},
		init : function() {
			// 关注
			$('#addFav2').on('click', function() {
				if (!UIF.handler.login) {
					UIF.handler.loging();
					return;
				}
				var headInfo = UIF.handler.cache.get(cons.USER_HEADINFOS);
				if (headInfo != null && headInfo.isFollows == 1) {
					Tools.dialog("\u53D6\u6D88\u5173\u6CE8\u5C06\u6E05\u9664\u4EB2\u5BC6\u7B49\u7EA7\uFF01", function(e) {
						UIF.handler.follow({}, function(data) {
							data = jQuery.parseJSON(data);
							if (data.resultStatus != 200)
								return;
							if (data.isFollows == 0) {
								$("#isfollow1").show().siblings("#isfollow0").hide();
							}
						});
					}, function(e) {
					});
				} else {
					UIF.handler.follow({}, function(data) {
						data = jQuery.parseJSON(data);
						if (data.resultStatus != 200)
							return;
						if (data.isFollows == 1) {
							$("#isfollow0").show().siblings("#isfollow1").hide();
						}
					});
				}
			});
		},
		onMessage : function(data) {
			this.anchors = data;
			this.onLoad();
		},
		onLoad : function() {
			this.onHeads();
		},
		onHeads : function() {
			/** 关注人数 */
			if (this.anchors != null && this.anchors.followNumber != null)
				$(".live-info .self-level .level-margin-area .l-xin").text(this.anchors.followNumber);
			/** 房间热度 */
			if (this.anchors != null && this.anchors.heatNumber != null)
				$(".live-info .self-level .level-margin-area .l-fire").text(this.anchors.heatNumber);
			/** 在线人数 */
			if (this.anchors != null && this.anchors.numbers != null)
				$(".live-info .s-else .s-people").text(this.anchors.numbers);
			/** 房间城市 */
			if (this.anchors != null && this.anchors.city != null)
				$(".live-info .self-name .s-else .s-position").text(this.anchors.city);
			/** 主播昵称 */
			if (this.anchors != null && this.anchors.nickname != null)
				$(".live-info .self-name .anchor-info-names").text(decodeURI(this.anchors.nickname));
			if (this.anchors != null && this.anchors.dc != null)
				$(".lhaicha").text("\u5347\u7EA7\u8FD8\u5DEE" + this.anchors.dc + "\u7ECF\u9A8C\u503C");
			if (this.anchors != null && this.anchors.nc != null) {
				$(".lvinner").css("width", this.anchors.nc + "%");
			}
			$(".toggleBox .viewer>span").text(this.anchors.numbers);
			$(".s-name .anchor-level").removeClass().addClass("anchor-level").addClass(this.anchors.il);
			$(".lhaicha").siblings("span").removeClass().addClass("anchor-level-next").addClass("anchor-level").addClass(this.anchors.inl);
			UIF.handler.cache.remove(cons.ANCHOR_HEADINFOS);
			UIF.handler.cache.put(cons.ANCHOR_HEADINFOS, this.anchors);
			if (this.anchors != null && this.anchors.userList != null && this.anchors.userList.length > 0) {
				var userList = this.anchors.userList;
				for (var i = 0; i < userList.length; i++) {
					var user = userList[i];
					list.addUsers(user);
				}
			}
		}
	}
});