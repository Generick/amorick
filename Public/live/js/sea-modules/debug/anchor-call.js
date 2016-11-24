define(function(require, exports, module) {

	var ani = require("./anchor-anchor");
	var uni = require("./anchor-user");
	var gift = require("./anchor-gift");
	var guards = require("./anchor-watch");
	var hall = require("./anchor-hall");
	var chat = require("./anchor-chat");
	var list = require("./anchor-list");
	module.exports = {
		/** 主播信息 */
		anchorsHeadInfo : function(data) {
			UIF.log("接收到主播信息：" + data);
			ani.onMessage(jQuery.parseJSON(data));
			chat.onNotice(jQuery.parseJSON(data));
		},
		/** 任务通知 */
		taskResults : function(data) {
		},
		/** 用户信息 */
		userInfo : function(data) {
			UIF.log("接收到用户信息：" + data);
			var args = jQuery.parseJSON(data)
			uni.parameters(args);
			list.addUsers({nickname : args.nickname,levs: args.levs,splev : args.splev,userId : args.userId});
		},
		/** 送礼扣费 */
		sendGifts : function(data) {
			UIF.log("送礼扣费成功：" + data);
			gift.sendGift(jQuery.parseJSON(data));
			gift.sendRecord(jQuery.parseJSON(data));
		},
		/** 进场特效 */
		userEntersCars : function(data) {
			UIF.log("进场特效：" + data);
			chat.welcome(jQuery.parseJSON(data));
			setTimeout(gift.enterCar(jQuery.parseJSON(data)), 5000);
		},
		/** 推送守护列表 */
		guardList : function(data) {
			UIF.log("获取守护列表成功：" + data);
			guards.getGuardList(jQuery.parseJSON(data));
		},
		/** 送礼本场榜 */
		anchorsLocalNotice : function(data) {
			UIF.log("本场榜：" + data);
			hall.onMessage(jQuery.parseJSON(data));
		},
		/** 公共聊天 */
		chatMSGMessage : function(data) {
			UIF.log("公聊内容：" + data);
			chat.onAllMsg(jQuery.parseJSON(data));
		},
		/** 主播私聊 */
		chatPRVMessage : function(data) {
			UIF.log("私聊内容：" + data);
			chat.onPrvMsg(jQuery.parseJSON(data));
		},
		/** 直播间飞屏 */
		chatFLYMessage : function(data) {
			UIF.log("飞屏内容：" + data);
			chat.onFlyMsg(jQuery.parseJSON(data));
		},
		/** 全站公告 */
		chatAFFMessage : function(data) {
			UIF.log("全站公告：" + data);
			chat.onAffMsg(jQuery.parseJSON(data));
		},
		/** 禁止发言 */
		roomBanned : function(data) {
			UIF.log("禁止发言：" + data);
			chat.banned(jQuery.parseJSON(data));
		},
		/** 踢出房间 */
		roomKickOut : function(data) {
			UIF.log("踢出房间：" + data);
			chat.kickOut(jQuery.parseJSON(data));
		},
		/** 爵位升级 */
		upgrades : function(data) {
			UIF.log("爵位升级：" + data);
			gift.speGift(jQuery.parseJSON(data));
			chat.onAffMsg(jQuery.parseJSON(data));
		},
		/** 互送礼物 */
		sendUsers : function(data) {
			UIF.log("收到礼物：" + data);
			gift.sendRecord(jQuery.parseJSON(data));
		}
	}
})
