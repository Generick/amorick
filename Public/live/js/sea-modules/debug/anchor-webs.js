define(function(require, exports, module) {
	require('jquery');
	require('socket');
	var Map = require('map');
	var cons = require("cons");
	var Tools = require('./anchor-tools');
	var wcall = require('./anchor-call');
	var gift = require("./anchor-gift");
	var guards = require("./anchor-watch");
	var hall = require("./anchor-hall");
	var chat = require("./anchor-chat");
	var login = require("./anchor-login");
	var task = require("./anchor-task");
	var anchor = require("./anchor-anchor");
	var song = require("./anchor-songs");
	var setting = require("./anchor-setting");
	var swf = require("./anchor-swf");
	var list = require("./anchor-list");
	var face = require("./anchor-face");

	var Webs = function(url) {
		this.flash = null;
		this.token = null;
		this.userId = null;
		this.login = false;
		this.effect = true;
		this.intervals = null;
		this.sendTsg = "ALL";
		this.map = new Map();
		this.cache = new Map();
		this.queue = new Map();
		this.events = new Map();
        this.userList = new Map();
		this.roomNumber = null;
		this.newSendGiftID = "";
		this.url = url || UIF.cdn_domain;
		this.isIE = !!window.ActiveXObject;
		this.ie6 = this.isIE && !window.XMLHttpRequest;
		this.ie8 = this.isIE && !!document.documentMode;
		this.ie7 = this.isIE && !this.ie6 && !this.ie8;
	}

	Webs.prototype = {
		init : function() {
			swf.init();
			face.init();
			list.init();
			hall.init();
			chat.init();
			gift.init();
			login.init();
			guards.init();
			anchor.init();
			song.init();
			setting.init();
			window.onkeydown = function(event) {
				var keyCode;
				if (!event)
					event = window.event;
				if (document.all) {
					keyCode = event.keyCode;
				} else {
					keyCode = event.which;
				}
				if (keyCode == 116) {
					var resTime = Tools.getCookie(cons.LOCAL_TIMEREFRESH);
					if (resTime != null) {
						var btim = new Date().getTime();
						if (btim - resTime < (30 * 1000)) {
							event.keyCode = 0;
							event.returnValue = false;
						} else {
							resTime = new Date().getTime();
						}
					}
					Tools.setCookie(cons.LOCAL_TIMEREFRESH, resTime, 24 * 60 * 60);
				}
			};
			this.cache.put("userInfo", false);
			this.cache.put("anchorInfo", false);
		},
		loading : function(userId, token, room) {
			var base = this;
			base.token = token;
			base.userId = userId;
			base.roomNumber = room;
			base.nblacks();
			var url = "/rest/checkToken/checkTokenRoles.mt";
			var params = Tools.stringFormat("token={0}&userId={1}&roomNumber={2}", base.token, base.userId, base.roomNumber);
			$.ajax({
				type : "POST",
				url : url,
				data : params,
				cache : false,
				async : false
			}).done(function(data) {
				if (data.resultStatus == 200) {
					var anb = false, a = false, o = false, c = false;
					if (data.data != null && data.data.length > 0) {
						data.data.forEach(function(e) {
							switch (e.msgid) {
							case "ANCHORS_HANDINFO":
								anb = true;
								break;
							case "USERS_HANDINFO":
								var args = jQuery.parseJSON(e.args);
								if (args.isAnchor == 1 && args.roomNumber == base.roomNumber) {
									a = true;
								}
								if (args.onlines == 0) {
									o = true;
								}
								break;
							case "FLASH_CONFIG":
								var args = jQuery.parseJSON(e.args);
								base.flash = args.flash;
								break;
							default:
								break;
							}
						});
					}
					if (a) {
						if (o) {
							c = true;
						}
					} else {
						c = true;
					}
					if (anb && c) {
						if (base.userId != null && base.userId > 0)
							base.login = true;
						base.doit();
						if (data.data != null && data.data.length > 0) {
							data.data.forEach(function(e) {
								var call = base.events.get(e.msgid);
								if (call != null) {
									call(e.args);
								}
							});
						}
					} else {
						self.location = "/html/noroom.html";
					}
				} else {
					self.location = "/html/endShow.html";
				}
			});
		},
		doit : function() {
			this.init();
			this.addEventListeners();
			this.connect();
			this.sendWelcome({}, function(data) {
			});
			this.sendTaskInit({}, function(data) {
			});
		},
		nblacks : function() {
			if (this.userId != null && this.token != null && this.userId.length > 0 && this.token.length > 0) {
				var url = "/rest/checkToken/nbalcks.mt";
				var params = Tools.stringFormat("userId={0}&roomNumber={1}", this.userId, this.roomNumber);
				$.ajax({
					type : "POST",
					url : url,
					data : params,
					cache : false,
					async : false
				}).done(function(data) {
					if (data.resultStatus == 200) {
						self.location = "/html/block.html";
					}
				});
			}
			return false;
		},
		standby : function(data) {

		},
		close : function(data) {
			swf.close(data);
		},
		loging : function() {
			login.showLoing();
		},
		connect : function() {
			var base = this;
			var sbool = UIF.handler.cache.get(cons.USER_SOCKETIO);
			if (!sbool) {
				base.sock = io.connect(base.url + "/" + base.roomNumber);
				base.sock.on("connect", function(data) {
					if (data != null)
						console.log("connect : " + data);
					if (base.queue.size > 0) {
						var msgid = new Array();
						for (var i = 0; i < base.queue.size; i++) {
							var msg = base.queue.element(0);
							msgid.push(msg.key);
							base.sock.emit("msg", msg.value);
						}
						for (var i = 0; i < msgid.length; i++) {
							var id = msgid[i];
							base.queue.remove(id);
						}
					}
				});
				base.sock.on("msg", function(data) {
					var length = data.args.length;
					if (data.length == length) {
						var call = base.map.get(data.msgid);
						if (call != null) {
							base.map.remove(data.msgid);
							call(data.args);
						}
						var call = base.events.get(data.msgid);
						if (call != null) {
							call(data.args);
						}
					}
				});
				UIF.handler.cache.put(cons.USER_SOCKETIO, true);
			}
		},
		disconnect : function() {
			var base = this;
			if (base.sock != null)
				base.sock.disconnect();
			base.sock = null;
		},
		addEventListeners : function() {
			this.events.put("GUARD_LIST", wcall.guardList);// 更新守护列表
			this.events.put("ANCHORS_HANDINFO", wcall.anchorsHeadInfo);// 主播信息
			this.events.put("ANCHORS_LOCALNOTICE", wcall.anchorsLocalNotice);// 主播本场榜
			this.events.put("TASK_RESULTS", wcall.taskResults);// 任务完成通知
			this.events.put("USERS_HANDINFO", wcall.userInfo);// 
			this.events.put("USERS_SENDGIFTS", wcall.sendGifts);// 赠送礼物
			this.events.put("USERS_SENDUSERS", wcall.sendUsers);// 赠送礼物
			this.events.put("USERS_ROOMBANNED", wcall.roomBanned);// 禁止发言
			this.events.put("USERS_ROOMKICKOUT", wcall.roomKickOut);// 踢出房间
			this.events.put("USERS_ENTERSCARS", wcall.userEntersCars);// 进场特效
			this.events.put("USERS_SPEUPGRADES", wcall.upgrades);// 爵位升级
			this.events.put("CHATMSG_MESSAGE", wcall.chatMSGMessage);// 公共聊天内容
			this.events.put("CHATPRV_MESSAGE", wcall.chatPRVMessage);// 主播私聊内容
			this.events.put("CHATFLY_MESSAGE", wcall.chatFLYMessage);// 直播间飞屏内容
			this.events.put("CHATAFF_MESSAGE", wcall.chatAFFMessage);// 全站公告内容
		},
		sendMsg : function(msg, call, tags) {
			var base = this;
			msg["token"] = base.token;
			msg["userId"] = base.userId;
			msg["roomNumber"] = base.roomNumber;
			var $msg = {
				events : "msg",
				tags : tags,
				msgid : Tools.uuid(),
				args : encodeURIComponent(JSON.stringify(msg))
			}
			base.map.put($msg.msgid, call);
			if (base.sock != null && base.sock.emit != null) {
				base.sock.emit("msg", $msg);
			} else {
				base.queue.put($msg.msgid, $msg);
			}
		},
		sendWelcome : function(msg, call) {
			this.sendMsg(msg, call, "welcome");
		},
		sendTaskInit : function(msg, call) {
			this.sendMsg(msg, call, "taskinit");
		},
		sendTasking : function(msg, call) {
			/** 进行时任务 */
			this.sendMsg(msg, call, "tasking");
		},
		follow : function(msg, call) {
			/** 添加取消关注 */
			this.sendMsg(msg, call, "follow");
		},
		anchorInfo : function(msg, call) {
			/** 更新主播信息 */
			this.sendMsg(msg, call, "anchorInfo");
		},
		userInfo : function(msg, call) {
			/** 用户信息 */
			this.sendMsg(msg, call, "userInfo");
		},
		sendTaskGroups : function(msg, call) {
			/** 读取任务组 */
			this.sendMsg(msg, call, "taskGroups");
		},
		taskDetails : function(msg, call) {
			/** 读取任务详细 */
			msg["flag"] = "dosev";
			this.sendMsg(msg, call, "tasking");
		},
		signin : function(msg, call) {
			/** 每日签到任务 */
			msg["flag"] = "claim";
			this.sendMsg(msg, call, "tasking");
		},
		claimeLookLive : function(msg, call) {
			/** 直播任务奖励 */
			msg["flag"] = "claim";
			this.sendMsg(msg, call, "tasking");
		},
		deduction : function(msg, call) {
			/** 送礼扣费 */
			this.sendMsg(msg, call, "deduction");
		},
		saveSongs : function(msg, call) {
			/** 存储点歌列表 */
			this.sendMsg(msg, call, "songsList");
		},
		delSongs : function(msg, call) {
			/** 删除点歌列表歌曲 */
			this.sendMsg(msg, call, "delSongs");
		},
		songsListDetails : function(msg, call) {
			this.sendMsg(msg, call, "songsDetails");
		},
		userOnline : function(msg, call) {
			/** 房间内在线用户 */
			this.sendMsg(msg, call, "userOnline");
		},
		sendGuard : function(msg, call) {
			/** 房间守护列表 */
			this.sendMsg(msg, call, "guard");
		},
		sendAddGuard : function(msg, call) {
			/** 添加房间守护 */
			this.sendMsg(msg, call, "addGuard");
		},
		sendChatALL : function(msg, call) {
			/** 发送聊天内容 */
			this.sendMsg(msg, call, "chatmsg");
		},
		sendChatFLY : function(msg, call) {
			/** 发送直播间飞屏 */
			this.sendMsg(msg, call, "chatfly");
		},
		sendChatGLO : function(msg, call) {
			/** 发送全站公告 */
			this.sendMsg(msg, call, "chataff");
		},
		sendChatPRV : function(msg, call) {
			/** 发送对谁聊天 */
			this.sendMsg(msg, call, "chatprv");
		},
		weekNotice : function(msg, call) {
			/** 获取本周榜 */
			this.sendMsg(msg, call, "weekNotice");
		},
		weekNotice : function(msg, call) {
			/** 获取周榜 */
			this.sendMsg(msg, call, "weekNotice");
		},
		cohesion : function(msg, call) {
			/** 获取亲密榜 */
			this.sendMsg(msg, call, "cohesion");
		},
		sendNotice : function(msg, call) {
			/** 主播设置公告 */
			this.sendMsg(msg, call, "notice");
		},
		getNotice : function(msg, call) {
			/** 主播设置公告时 先获取公告 */
			this.sendMsg(msg, call, "editNotice");
		},
		getRoomMan : function(msg, call) {
			/** 主播设置管理 先获取管理列表 */
			this.sendMsg(msg, call, "roomMan");
		},
		getUser : function(msg, call) {
			/** 主播设置管理 先查找管理列表 */
			this.sendMsg(msg, call, "editUser");
		},
		roomManagers : function(msg, call) {
			/** 主播添加管理 */
			this.sendMsg(msg, call, "addRoomMan");
		},
		chooseSong : function(msg, call) {
			/** 用户点歌 */
			this.sendMsg(msg, call, "chooseSong");
		},
		blacks : function(msg, call) {
			/** 权限业务 */
			this.sendMsg(msg, call, "blacks");
		},
		upgrade : function(msg, call) {
			/** 爵位升级 */
			this.sendMsg(msg, call, "upgrades");
		},
		sendUserGift : function(msg,call){
			/**增送用户礼物*/
			this.sendMsg(msg,call,"sendUserGift");
		}
	}
	module.exports = Webs;
});
define("map", [], function(require, exports, module) {
	var Map = function() {
		this.elements = new Array();
	}
	Map.prototype = {
		size : function() {
			return this.elements.length;
		},
		isEmpty : function() {
			return (this.elements.length < 1);
		},
		clear : function() {
			this.elements = new Array();
		},
		put : function($key, $value) {
			if (this.containsKey($key)) {
				this.remove($key);
			}
			this.elements.push({
				key : $key,
				value : $value
			});
		},
		remove : function($key) {
			try {
				for (var i = 0; this.elements.length; i++) {
					if (this.elements[i].key == $key) {
						this.elements.splice(i, 1);
						return true;
					}
				}
			} catch (e) {
				return false;
			}
			return false;
		},
		get : function($key) {
			try {
				for (var i = 0; this.elements.length; i++) {
					if (this.elements[i].key == $key) {
						return this.elements[i].value;
					}
				}
			} catch (e) {
				return null;
			}
		},
		element : function(index) {
			if (index < 0 || index >= this.elements.length) {
				return null;
			}
			return this.elements[index];
		},
		containsKey : function($key) {
			try {
				for (i = 0; i < this.elements.length; i++) {
					if (this.elements[i].key == $key) {
						return true;
					}
				}
			} catch (e) {
				return false;
			}
			return false;
		},
		containsValue : function($value) {
			try {
				for (i = 0; i < this.elements.length; i++) {
					if (this.elements[i].value == $value) {
						return true;
					}
				}
			} catch (e) {
				return false;
			}
			return false;
		},
		values : function() {
			var arr = new Array();
			for (i = 0; i < this.elements.length; i++) {
				arr.push(this.elements[i].value);
			}
			return arr;
		},
		keys : function() {
			var arr = new Array();
			for (i = 0; i < this.elements.length; i++) {
				arr.push(this.elements[i].key);
			}
			return arr;
		}
	}
	module.exports = Map;
});

define("cons", [], function(require, exports, module) {
	module.exports = {
		USER_SOCKETIO : "user_socketio",
		USER_HEADIMAG : "user_headimag",
		USER_HEADROLES : "user_headroles",
		USER_HEADINFOS : "user_headinfos",
		USER_SENDDANMU : "user_sendDanmu",
		USER_SENDNICE : "user_sendNice",
		GIFT_ENTERCARS : "gift_enterCars",
		GIFT_TRANSTIME : "gift_transTime",
		GIFT_TIMENUMBERS : "gift_timeNumbers",
		GIFT_TIMEUUIDS : "gift_timeuuids",
		GIFT_TIMEGIFTIDS : "gift_timeGiftIds",
		ANCHOR_HEADINFOS : "anchor_headinfos",
		GIFT_TIMEGNUMBERS : "gift_timeGNumbers",
		LOCAL_TIMEREFRESH : "loacl_timeRefresh",
		LOCAL_TIMESENDMSG : "loacl_timeSendMsg"
	}
});