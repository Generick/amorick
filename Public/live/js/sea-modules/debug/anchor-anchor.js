define(function(require, exports, module) {
	var cons = require("cons");
	var list = require("./anchor-list");
	module.exports = {
		anchors : {},
		init : function() {
			//关注
			$('#addFav2').on('click', function() {
				if (!UIF.handler.login) {
					UIF.handler.loging();
					return;
				}
				UIF.handler.follow({}, function(data) {
					data = jQuery.parseJSON(data);
					if (data.resultStatus != 200)
						return;
					if (data.isFollows == 0) {
						$("#isfollow1").show().siblings("#isfollow0").hide();
					} else {
						$("#isfollow0").show().siblings("#isfollow1").hide();
					}
				});
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
			/** 更新关注人数 */
			if (this.anchors != null && this.anchors.followNumber != null)
				$(".live-info .self-level .level-margin-area .l-xin").text(this.anchors.followNumber);
			/** 更新房间热度 */
			if (this.anchors != null && this.anchors.heatNumber != null)
				$(".live-info .self-level .level-margin-area .l-fire").text(this.anchors.heatNumber);
			/** 更新房间在线人数 */
			if (this.anchors != null && this.anchors.numbers != null)
				$(".live-info .s-else .s-people").text(this.anchors.numbers);
			/** 更新房间城市 */
			if (this.anchors != null && this.anchors.city != null)
				$(".live-info .self-name .s-else .s-position").text(this.anchors.city);
			/** 更新房间在线人数 */
			if (this.anchors != null && this.anchors.city != null)
				$(".live-info .self-name .s-else .s-position").text(this.anchors.city);
			/** 更新房间在线人数 */
			if (this.anchors != null && this.anchors.city != null)
				$(".live-info .self-name .s-else .s-position").text(this.anchors.city);
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
				var userList = jQuery.parseJSON(this.anchors.userList);
				for (var i = 0; i < userList.length; i++) {
					var user = userList[i];
					list.addUsers(user);
				}
			}
		}
	}
});