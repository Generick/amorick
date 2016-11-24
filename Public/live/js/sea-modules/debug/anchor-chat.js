define(function(require, exports, module) {
	var cons = require("cons");
	var Tools = require('./anchor-tools');
	var Face = require('./anchor-face');
	var screen = require('flyScreen');
	var toproom = require('toproom');

	module.exports = {
		/** 发送内容 */
		init : function() {
			$('#msgContent').keypress(function(e) {
				if (e.which == 13) {
					e.preventDefault();
					if (!$("#sendChatBtn").attr('disabled') && $("#sendChatBtn").is(":visible")) {
						$("#sendChatBtn").click();
					}
				}
			})
			// 送礼
			$("#sendChatBtn").click(function() {
				if (!UIF.handler.login) {
					UIF.handler.loging();
					return;
				}
				var msg = $("#msgContent").val();
				if (msg == "") {
					try {
						$("#msgContent").focusInput();
						$("#msgContent").focus()
					} catch (e) {
					}
					return;
				}
				if (msg.length > 50) {
					Tools.dialog("\u60A8\u7684\u804A\u5929\u5185\u5BB9\u8FC7\u957F\uFF0C\u8BF7\u786E\u4FDD\u4E0D\u8D85\u8FC715\u4E2A\u6C49\u5B57!");
					return;
				}
				
				var headimg = UIF.handler.cache.get(cons.USER_HEADIMAG);
				switch (UIF.handler.sendTsg) {
				case "ALL":
					var splev = 0,btime = 0;
					var bool = false;
					var head = UIF.handler.cache.get(cons.USER_HEADINFOS);
					var stime = UIF.handler.cache.get(cons.LOCAL_TIMESENDMSG);
					if(head != null && head.splev != null && head.splev.length > 0){
						splev = head.splev;
					}
					if(splev <= 6){
						btime = 5 * 1000;
					}
					if(splev >= 6 && splev<= 11){
						btime = 3 * 1000;
					}
					if(splev >= 11){
						btime = 1 * 1000;
					}
					if(stime != null){
						var times = new Date().getTime();
						if((times - stime) >= btime){
							bool = true;
							stime = new Date().getTime();
						}
					}else{
						bool = true;
						stime = new Date().getTime();
					}
					UIF.handler.cache.put(cons.LOCAL_TIMESENDMSG,stime);
					if(bool){
						UIF.handler.sendChatALL({nickname : UIF.currentUserNickname,message : msg,levs : headimg}, function(data) {});
					}else{
						Tools.dialog("\u53D1\u9001\u6D88\u606F\u592A\u9891\u7E41,\u8BF7\u7A0D\u540E\u518D\u53D1\u9001!")
						return;
					}
					break;
				case "FLY":
					var dbools = UIF.handler.cache.get(cons.USER_SENDDANMU);
					if (!dbools) {
						Tools.dialog("\u5F39\u5E55200\u86AA\u5E01\u6BCF\u6761!", function(e) {
							UIF.handler.cache.put(cons.USER_SENDDANMU, true);
							UIF.handler.sendChatFLY({
								nickname : UIF.currentUserNickname,
								message : msg,
								levs : headimg
							}, function(data) {
								if (data.resultStatus == 100) {
									Tools.dialog(data.resultMessage);
								}
							});
						}, function(e) {
						});
					}
					if (dbools) {
						UIF.handler.sendChatFLY({
							nickname : UIF.currentUserNickname,
							message : msg,
							levs : headimg
						}, function(data) {
							if (data.resultStatus == 100) {
								Tools.dialog(data.resultMessage);
							}
						});
					}
					break;
				case "GLO":
					var nbools = UIF.handler.cache.get(cons.USER_SENDNICE);
					if (!nbools) {
						Tools.dialog("\u5168\u7AD9\u516C\u544A5000\u86AA\u5E01\u6BCF\u6761!", function(e) {
							UIF.handler.cache.put(cons.USER_SENDNICE, true);
							UIF.handler.sendChatGLO({
								nickname : UIF.currentUserNickname,
								message : msg,
								levs : headimg
							}, function(data) {
								if (data.resultStatus == 100) {
									Tools.dialog(data.resultMessage);
								}
							});
						}, function(e) {
						});
					}
					if (nbools) {
						UIF.handler.sendChatGLO({
							nickname : UIF.currentUserNickname,
							message : msg,
							levs : headimg
						}, function(data) {
							if (data.resultStatus == 100) {
								Tools.dialog(data.resultMessage);
							}
						});
					}
					break;
				default:
					var bool = false;
					var head = UIF.handler.cache.get(cons.USER_HEADINFOS);
					if(head.roles != null && head.roles.length > 0){
						if(head.roles.indexOf("prvchat") > 0){
							bool = true;
							UIF.handler.sendChatPRV({
								nickname : UIF.currentUserNickname,
								message : msg,
								levs : headimg
							}, function(data) {
							});
						}
					}
					if(!bool){
						Tools.dialog("\u5411\u4E3B\u64AD\u53D1\u9001\u79C1\u804A\u6D88\u606F,\u9700\u8981\u7235\u4F4D\u8FBE\u52306\u7EA7\u4EE5\u4E0A!")
						return;
					}
					break;
				}
				$("#msgContent").val("");
			});
			// 弹框
			$("#pubChatList").on("click", 'li .u', function(e) {
				var clazz = $(this).attr("rel");
				var userId = clazz.split(" ")[0];
				var nickname = clazz.split(" ")[1];
				var spimg = clazz.split(" ")[2] + " " + clazz.split(" ")[3];
				var initL = e.pageX;
				var initT = e.pageY;
				var aa = $('.chat-area');
				var clientLeft = aa[0].offsetLeft;
				if (spimg != null && spimg.indexOf("undefined") == -1) {
					$(".levelss").html("<span class='" + spimg + "'></span>");
					$(".chat-tip-name").css('margin-left', '15px');
					$(".levelss").show();
				} else {
					$(".levelss").hide();
					$(".chat-tip-name").css('margin-left', '0px');
				}
				$(".chat-tip-id").html("ID：" + userId);
				$(".chat-tip-id").attr("tid", userId);
				$(".chat-tip-name").text(nickname);
				$('.chat-tip-warp').css({
					'left' : clientLeft + 20,
					'top' : initT + 20 + "px"
				});
				$('.chat-tip-img img').attr("src", "/apis/avatar.php?uid=" + userId);
				$(".chat-tip-warp").show();
			})
			
			// 禁言
			$(".toggleBox").on("click", '.chat-tip-bottom .jinyan', function(e) {
				if (!UIF.handler.login) {
					UIF.handler.loging();
					return;
				}
				var userId = $(".toggleBox .chat-tip-id").attr("tid");
				if (userId == UIF.handler.userId) {
					Tools.dialog('\u4E0D\u80FD\u81EA\u6211\u7981\u8A00!');
					return;
				}
				UIF.handler.blacks({
					toIds : userId,
					drives : "banned"
				}, function(data) {
					var ds = jQuery.parseJSON(data);
					if (ds.resultStatus == 200) {
						Tools.dialog('\u7981\u8A00\u6210\u529F!');
					} else {
						Tools.dialog('\u7981\u8A00\u5931\u8D25,' + ds.resultMessage);
					}
				});
			})

			// 踢出
			$(".toggleBox").on("click", '.chat-tip-bottom .kick', function(e) {
				if (!UIF.handler.login) {
					UIF.handler.loging();
					return;
				}
				var userId = $(".toggleBox .chat-tip-id").attr("tid");
				if (userId == UIF.handler.userId) {
					Tools.dialog('\u4E0D\u80FD\u81EA\u6211\u8E22\u51FA!');
					return;
				}
				UIF.handler.blacks({
					toIds : userId,
					drives : "kickout"
				}, function(data) {
					var ds = jQuery.parseJSON(data);
					if (ds.resultStatus == 200) {
						Tools.dialog('\u8E22\u51FA\u6210\u529F!');
					} else {
						Tools.dialog('\u8E22\u51FA\u5931\u8D25,' + ds.resultMessage);
					}
				});
			});
			
			//增送礼物
			$(".toggleBox").on("click", '.send-h-gift', function(e) {
				if (!UIF.handler.login) {
					UIF.handler.loging();
					return;
				}
				var userId = $(".toggleBox .chat-tip-id").attr("tid");
				if (userId == UIF.handler.userId) {
					Tools.dialog('\u4E0D\u80FD\u81EA\u6211\u589E\u9001\u793C\u7269!');
					return;
				}
				if (UIF.handler.newSendGiftID == 0) {
					Tools.dialog("\u8BF7\u5728\u793C\u7269\u680F\u4E2D\u9009\u62E9\u8981\u9001\u51FA\u7684\u793C\u7269!");
					return;
				}
				var sendGiftNum = $.trim($("#sendGiftNum").val());
				if (sendGiftNum <= 0 || !$.isNumeric(sendGiftNum)) {
					Tools.dialog("\u8BF7\u6B63\u786E\u586B\u5199\u793C\u7269\u6570\u91CF");
					return;
				}
				var name = $(".toggleBox .chat-tip-name").text();
				var giftName = $("#gift"+UIF.handler.newSendGiftID+" >span").text();
				Tools.dialog("\u8D60\u9001"+name+sendGiftNum+giftName, function(e) {
					UIF.handler.sendUserGift({toUser : userId,giftId : UIF.handler.newSendGiftID,number : sendGiftNum},function(data){
						Tools.dialog("\u8D60\u9001\u6210\u529F!");
					});
				}, function(e) {});
			});
			
			// 选择全站
			$(".son_ul li").on("click", function() {
				UIF.handler.sendTsg = this.id;
				$("#dstUserV").html($(this).text());
				$(".switchChat").html($(this).html());
				$(".son_ul").hide();
			});
			$(".cfchange").click(function() {
				$(".son_ul").show();
				return false;
			});
			// 面板选择
			$(".chat-header .chat_right").click(function() {
				$(".chat-header .chat_right").removeClass("issel");
				$(this).addClass("issel");
				var a = $(this).attr("ct");
				var i = a.charAt(a.length - 1, 1);
				$(".chat-header").siblings("div").hide();
                $(".ui-resizable-handle").show();
				$(".chs" + i).show();
			});
		},
		/** 爵位图片 */
		spimg : function(data) {
			var spimg = "";
			if (data != null && data.length > 0) {
				for (var i = 0; i < data.length; i++) {
					var $img = data[i];
					if ($img != null && $img != "" && $img.indexOf("pic_consumelevel") > 0) {
						spimg = $img;
						break;
					}
				}
			}
			return spimg;
		},
		/** 用户头衔 */
		headimg : function(data) {
			var heads = "";
			if(data != null && data.length > 0){
				var img = '<span class="{0}"></span>';
				var $data = jQuery.parseJSON(data);
				if ($data != null && $data.length > 0) {
					for (var i = 0; i < $data.length; i++) {
						var $img = $data[i];
						if ($img != null && $img != "")
							heads += Tools.stringFormat(img, $img);
					}
				}
			}
			return heads;
		},
		/** 进入直播间 */
		welcome : function(data) {
			if(data.userId != null && data.nickname != null){
				var htmls = '<li class="fontred"><div><span>\u6B22\u8FCE &nbsp;&nbsp;</span>{0}<a href="javascript:;" class="u" rel="{1} {2} {3}">{4}</a><span>\u8FDB\u5165\u623F\u95F4</span></div></li>';
				htmls = Tools.stringFormat(htmls, this.headimg(data.levs), data.userId, data.nickname, this.spimg(data.levs), data.nickname);
				$("#pubChatList").append(htmls);
			}
		},
		/** 公共聊天 */
		onAllMsg : function(data) {
			var htmls = '<li class="fontred"><div><span class="gr-time">' + Tools.dateFormat(new Date(), "HH:mm")
					+ '&nbsp;&nbsp;</span>{0}<a href="javascript:;" class="u" rel="{1} {2} {3}">{4}</a><span>：{5}</span></div></li>';
			words = Face.faceReplaceImg(data.message);
			htmls = Tools.stringFormat(htmls, this.headimg(data.levs), data.userId, data.nickname, this.spimg(data.levs), data.nickname, words);
			$("#pubChatList").append(htmls);
            $("#nano-pubChatList").nanoScroller({ scroll: 'bottom' });
		},
		/** 主播私聊 */
		onPrvMsg : function(data) {
			var msg = '<li class="fontred"><div><span class="gr-time">' + Tools.dateFormat(new Date(), "HH:mm")
					+ '&nbsp;&nbsp;</span>{0}<a href="javascript:;" class="u" rel="{1} {2} {3}">{4}</a><span>{5}：{6}</span></div></li>';
			var head = UIF.handler.cache.get(cons.USER_HEADINFOS);
			var action = Tools.stringFormat("{0}", (head != null && head.userId == data.userId) ? "" : "\u5BF9\u4F60\u8BF4");
			words = Face.faceReplaceImg(data.message);
			msg = Tools.stringFormat(msg, this.headimg(data.levs), data.userId, data.nickname, this.spimg(data.levs), data.nickname, action, words);
			$("#priChatList").append(msg);
		},
		/** 主播公告 */
		onNotice : function(data) {
			var msg = '<li class="fontred"><div><span class="gr-time">{0}</span></div></li>';
			var notice = (data != null && data.notice != null) ? data.notice : "";
			if(notice != null && notice.length > 0)
				$("#priChatList").html(Tools.stringFormat(msg,notice));
		},
		/** 房间弹幕 */
		onFlyMsg : function(data) {
			var msg = data.nickname + "\u8BF4：" + data.message;
			screen.fly(msg);
		},
		/** 全站公告 */
		onAffMsg : function(data) {
			if(data.actions != null && data.actions == "upgrade"){
				var msg =  "\u606D\u559C" + data.nickname+"\u5347\u7EA7\u4E3A<span class='gr-sender sprite consumelevel-pic_consumelevel_"+data.splev+"'></span>";
				toproom.sayMsg(Tools.dateFormat(new Date(), "HH:mm"),{"roomid" : data.roomNumber,"src_nickname" : data.nickname,"src_lucknumber" : UIF.currentUserNickname},Face.replace_face(msg));
			}else{
				var msg = data.nickname + "\u8BF4：" + data.message;
				toproom.sayMsg(Tools.dateFormat(new Date(), "HH:mm"), {
					"roomid" : data.roomNumber,
					"src_nickname" : data.nickname,
					"src_lucknumber" : UIF.currentUserNickname
				}, Face.replace_face(msg));
			}
		},
		/** 禁止说话 */
		banned : function(data) {
			$("#sendChatBtn").attr("disabled", true);
			$("#msgContent").attr("disabled", true);
		},
		/** 踢出房间 */
		kickOut : function(data) {
			self.location = "/html/block.html";
		}
	}
});

define("flyScreen", [], function(require, exports, module) {
	var Tools = require('./anchor-tools');
	var Face = require('./anchor-face');
	module.exports = {
		flyRoad : [ 0, 0, 0, 0, 0, 0, 0, 0 ],
		fly : function(msg) {
			var base = this;
			var tmp_color = [ '#fff', '#f00', '#0f0', '#0ff' ];// 颜色随机
			var t = Tools.rand(0, tmp_color.length);
			var flyer = $('<marquee loop=1 scrollAmount=6 behavior="scroll" class="flyScreen"><table class="flycn"><tr><td style="color:' + tmp_color[t] + '">'
					+ Face.replace_face(msg) + '</td></tr></table></marquee>');
			var rId = 0, blk = true;
			for (var i = 0; i < 8; i++) {
				if (0 == base.flyRoad[i]) {
					base.flyRoad[i] = 1;
					rId = i;
					blk = false;
					break;
				}
			}
			if (blk) {
				rId = parseInt(Math.random() * 8);
				base.flyRoad[rId] = 1;
			}
			var top = rId * 50 + 60;
			flyer.css('top', top);
			$('body').append(flyer);
			var w = $(window).width() + flyer.children('.flycn').width();
			var t = w / 0.065;
			var tm = UIF.handler.ie6 ? t - 10000 : t;
			setTimeout(function() {
				flyer.remove();
				base.flyRoad[rId] = 0;
			}, tm);
		}
	}
});

define("toproom", [], function(require, exports, module) {
	var Face = require('./anchor-face');
	module.exports = {
		sayMsg : function(time, obj, content) {
			content = content || obj.msginfo[0].content;
			var list = $('<li class="bcItem"><img src="/skin/desert/images/zij.gif" alt="\u516C\u544A"/><span class="tipTime">' + time + '</span><a href="/' + obj.roomid
					+ '.html" target="_blank">' + this.formatLuckNum(obj.src_lucknumber) + '<span class="tipWords">' + Face.faceReplaceImg(content) + '</span></a></li>');
			var ul = $('#bclist'), bc = $('#broadcast');
			ul.append(list);
			bc.show();
			var _w = $('#bcCon').width();
			list.css('marginLeft', _w);
			list.animate({
				'marginLeft' : 0
			}, 3000);
			if ($("#bclist li").length > 1) {
				ul.children("li").first().remove();
			}
			setTimeout(function() {
				list.fadeOut(function() {
					$(this).remove();
					if ('' == ul.html()) {
						bc.hide();
					}
				})
			}, 105000);
		},
		formatLuckNum : function(n) {
			if (+n) {
				return '<span class="fluck">(' + n + ')</span>';
			} else {
				return '';
			}
		}
	}
});
