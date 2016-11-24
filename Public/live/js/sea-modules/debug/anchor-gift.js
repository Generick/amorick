define(function(require, exports, module) {
	var cons = require("cons");
	var swf = require('./anchor-swf');
	var Tools = require('./anchor-tools');
	module.exports = {
		oWidth : 0,
		init : function() {
			$("#sendGiftBtn").click(function() {
				if (!UIF.handler.login) {
					UIF.handler.loging();
					return;
				}
				sendGiftNum = $.trim($("#sendGiftNum").val());
				if (sendGiftNum == "") {
					sendGiftNum = 0;
				}
				if (UIF.handler.newSendGiftID == 0) {
					Tools.dialog("\u8BF7\u9009\u62E9\u793C\u7269");
					return;
				}
				if (sendGiftNum <= 0 || !$.isNumeric(sendGiftNum)) {
					Tools.dialog("\u8BF7\u6B63\u786E\u586B\u5199\u793C\u7269\u6570\u91CF");
					return;
				}
				var gid = UIF.handler.cache.get(cons.GIFT_TIMEGIFTIDS);
				var uid = UIF.handler.cache.get(cons.GIFT_TIMEUUIDS);
				var times = UIF.handler.cache.get(cons.GIFT_TRANSTIME);
				var gnu = UIF.handler.cache.get(cons.GIFT_TIMEGNUMBERS);
				var timeNumber = UIF.handler.cache.get(cons.GIFT_TIMENUMBERS);
				if(gid != null && uid != null && times != null && timeNumber != null && gnu != null && gid == UIF.handler.newSendGiftID && gnu == sendGiftNum){
					var date = new Date().getTime();
					var diff = date - times;
					if(diff <= (5 * 1000)){
						timeNumber++;
						if(timeNumber == 1)
							timeNumber++;
						times = new Date().getTime();
					}else{
						timeNumber = 0;
						uid = Tools.uuid();
						times = new Date().getTime();
					}
				}else{
					timeNumber = 0;
					gnu = sendGiftNum;
					uid = Tools.uuid();
					gid = UIF.handler.newSendGiftID;
					times = new Date().getTime();
				}
				UIF.handler.cache.put(cons.GIFT_TIMEUUIDS,uid);
				UIF.handler.cache.put(cons.GIFT_TRANSTIME,times);
				UIF.handler.cache.put(cons.GIFT_TIMEGIFTIDS,gid);
				UIF.handler.cache.put(cons.GIFT_TIMEGNUMBERS,gnu);
				UIF.handler.cache.put(cons.GIFT_TIMENUMBERS,timeNumber);
				UIF.handler.deduction({uid : uid,sendNum : timeNumber, giftId : UIF.handler.newSendGiftID,number : sendGiftNum}, function(data) {
					var fs = jQuery.parseJSON(data);
                    if(fs.resultMessage=="\u4F59\u989D\u4E0D\u8DB3"){
                        var yeless='<div class="less-money">\
                            <div class="less-box">\
                        <div class="less-header">\u6E29\u99A8\u63D0\u793A</div>\
                        <div class="less-close">×</div>\
                            <div class="hsr"></div>\
                            <div class="less-text">\u60A8\u7684<span>\u4F59\u989D</span>\u4E0D\u8DB3\uFF0C\u65E0\u6CD5\u8D2D\u4E70</div>\
                            <div class="less-butt">\
                                <div class="less-charge butt"><a href="/pay.php">\u5145\u503C</a></div>\
                                <div class="less-cancel butt">\u53D6\u6D88</div>\
                            </div>\
                        </div>\
                        </div>';
                        $('body').append(yeless);
                        $(".less-money").css({"left":$(".newGifts").offset().left+400,"top":$(".newGifts").offset().top-105});
                        $(".less-money").show();
                        return;
                    }
					Tools.dialog(fs.resultMessage);
				});
			});
            //\u4F59\u989D\u4E0D\u8DB3
            $("body").on("click",".less-close,.less-cancel",function(){
                $(".less-money").hide();
            })

           /* $(".less-close,.less-cancel").on("click",function(){
                $(".less-money").hide();
            });*/

            //\u793C\u7269\uFF0C\u9F20\u6807\u8DDF\u968F
            $(".giftLists  li").mouseover(function(){
                $('.gift-tip-popup').find(".gift-tip-info").html('<div class="gift-tip-pic"><img alt="'+$(this).find(".gfname").html()+'" src="'+$(this).find("img").attr("src")+'" class="'+$(this).find("img").attr("class")+'"/></div>\
                		<div class="gift-tip-detail"><p  class="gp1">'+$(this).find(".gfname").html()+'</p><p class="gp2">\u4EF7\u503C<i>'+$(this).find("img").attr("rel")+'</i></p></div>');
                if($(this).attr("giftnum")!=null){
                    p3='<p  class="gp3">\u6570\u91CF\uFF1A'+$(this).attr("giftnum")+'</p>';
                    $(".gift-tip-detail").append(p3);
                }
                $('.gift-tip-popup').show();
            }).mouseout(function(){
                $('.gift-tip-popup').hide();
            }).mousemove(function(e){
                var initL=e.pageX;
                var initT=e.pageY;
                $('.gift-tip-popup').css({'left':initL+40+"px",'top':initT-120+"px"});
            });
            
			var len = $(".xGiftList li").length;
			/** \u5207\u6362\u793C\u7269 */
			$(".giftHeader span").click(function() {
				$("#stdSps").hide();
				$(this).addClass("haselect");
				$(this).siblings().removeClass("haselect");
				$(".giftLists li").find("div").removeClass("intro");
				$(".giftLists ul").removeClass("xGiftList");
				$("#giftList" + $(this).attr("rel")).addClass("xGiftList");
				UIF.handler.newSendGiftID = "";
				len = $(".xGiftList li").length;
				this.oWidth = len * (Math.ceil($(".xGiftList  li").width()) + 6)+5;
                this.oWidth=this.oWidth<384?384:this.oWidth;
                $(".xGiftList").css({
					width : this.oWidth
				});
			});
			/** \u793C\u7269\u9009\u4E2D */
			$(".visualGiftList").on("mouseover", 'li div', function(ext) {
				var gridimage = $(this).find('img');
				src = gridimage[0].src;
				gridimage.attr("src", src);
			}).on("mousedown", 'li div', function(ext) {
				if ($(this).find('img').attr("types") == "0") {
					$("#giftShapeBtns").show();
				} else {
					$("#sendGiftNum").val(1);
					$("#giftShapeBtns").hide();
				}
				$(this).addClass("intro");
				gridimage = $(this).find('img');
				$(this).parent().siblings().find("div").removeAttr("choose").removeClass("intro");
				UIF.handler.newSendGiftID = $(this).attr('id').replace("gift", "");
			}).on("mouseout", 'li div', function(ext) {
				var gridimage = $(this).find('img');
				if (!gridimage.hasClass("intro")) {
				}
			});
			/** \u793C\u7269\u6EDA\u52A8 */
			var currentIndex = 0;
			var maxIndex = 0;
			var viewWidth = 0;
			var marginLeft = 0;
			this.oWidth = len * (Math.ceil($(".xGiftList  li").width()) + 8);
			viewWidth = 6 * ($(".xGiftList  li").width() + 6);
			maxIndex = Math.floor(len / 6);
			$(".xGiftList").css({
				width : this.oWidth
			});
			$(".toRight").on("click", function() {
				if (!(len > 6) || (currentIndex - maxIndex) > -1) {
					return;
				}
				marginLeft = parseInt($(".xGiftList").css('marginLeft'));
				$(".xGiftList").animate({
					"margin-left" : marginLeft - viewWidth
				}, 300);
				currentIndex++;
			})
			$(".toLeft").on("click", function() {
				if (currentIndex < 1) {
					return;
				}
				marginLeft = parseInt($(".xGiftList").css('marginLeft'));
				$(".xGiftList").animate({
					"margin-left" : marginLeft + viewWidth
				}, 300);
				currentIndex--;
			})
		},
		filGift : function(data) {
			swf.fil({
				giftId : data.giftId,
				number : data.number,
				car : 0
			});
		},
		figGift : function(data) {
			var giftName = "";
			var giftShowType = "A"
			if ((data.par != undefined) && (data.par != "")) {
				var showTypeObj = JSON.parse(data.par);
				giftShowType = showTypeObj[data.number];
			}
			var imageName = data.giftId;
			switch (giftShowType) {
			case "A":
				giftName = "giftShape_" + data.number;
				imageName = imageName + ".png";
				break;
			case "B":
				giftName = "giftShape_" + data.number + "_3d";
				imageName = imageName + ".png";
				break;
			case "C":
				giftName = "giftShape_" + data.number + "_puzzle";
				imageName = "big" + imageName + ".swf";
				break;
			}
			swf.fig({
				image : imageName,
				shape : giftName
			});
		},
		customGift : function(data) {
			swf.cus({
				image : data.giftId,
				number : data.number
			});
		},
		sendGift : function(data) {
			var giftNumber = [ 10, 66, 99, 188, 520, 1314 ];
			if ($.inArray(data.number, giftNumber) == -1 && data.giftType == 0) {
				data.giftType = "-1";
			}
			switch (data.giftType) {
			case "1":
				this.filGift(data);
				break;
			case "0":
				this.figGift(data);
				break;
			case "-1":
				this.customGift(data);
				break;
			default:
				break;
			}
			if(data != null && data.par != null && data.par != ""){
				var multys = JSON.parse(data.par);
				if(multys != null && multys["join"] != null){
					if(data.number >= multys["join"]){
						this.multyGift(data);
					}
				}
			}
		},
		multyGift : function(data){
			if(data.sendNum > 0){
				swf.mul({
					uid : data.uid,
					user : data.user,
					number : data.number,
					sendNum : data.sendNum,
					headImg : UIF.cdn_img +"/"+data.himage,
					giftImg : data.giftId
				});
			}
		},
		actGift : function(data){
			swf.act({headImg : UIF.cdn_img +"/"+data.himage,actlevel : data.actlev});
		},
		cohGift : function(data){
			swf.coh({headImg : UIF.cdn_img +"/"+data.himage,cohlevel : data.cohlevel,anhimg : UIF.cdn_img +"/"+ data.anhimg});
		},
		speGift : function(data){
			swf.spe({nickname : data.nickname,speimg : UIF.cdn_domain+"/static_data/images_css/upgrades/pic_consumelevel_"+data.splev+".png"});
		},
		enterCar : function(data) {
			if (data.enterCar != null) {
				var enter = jQuery.parseJSON(data.enterCar);
				var carName = "";
				if (enter.carName == undefined || enter.carName == "") {
					carName = "\u8C6A\u8F66";
				} else {
					carName = enter.carName;
				}
				if(data.nickname == UIF.currentUserNickname){
					setTimeout(function(){
						swf.fil({giftId : enter.giftId,number : enter.number,car : 1,nickname : data.nickname,carName : carName});
					},3 * 1000);
				}else{
					swf.fil({giftId : enter.giftId,number : enter.number,car : 1,nickname : data.nickname,carName : carName});
				}
			}
		},
		interval : false,
		giftQueue : new Array(),
		sendRecord : function(data) {




			var base = this;
			var ls = '<span class="gr-ulevel {0}"></span>';
			var path = UIF.cdn_img + "/" + data.samllimg + "?p=0";
			var html = '<li>\
						<div>\
						<span class="gr-time">'+ Tools.dateFormat(new Date(), "HH:mm")+ '</span>{0}\
						<span class="gr-sender">{1}</span>\
						<span class="gr-song">\u9001</span>{2}\
						<img src="{3}" />\
						<span class="color-green">{4}</span>\
						</div>\
						</li>';
			if (data != null && data.number != "" && data.number > 0) {
				var ns = new Array();
				for (var n = 0; n < data.number; n++) {
					ns.push(n);
				}
				if (data.number > 300) {
					var $ns = new Array();
					$ns = ns.slice(0, 150);
					for (var n = data.number - 150; n < data.number; n++) {
						$ns.push(n);
					}
					ns = $ns;
				}
				var $p="";$n="";$h="";
				for (var i = 0; i < ns.length; i++) {
					$p = Tools.stringFormat(path, data.giftId);
					$n = data.number == 1 ? "" : "X" + (ns[i] + 1);
					var $t = "";$touser="";
					if(data.spender != null && data.spender != "" && data.spender.indexOf("pic_consumelevel_0") < 0){
						$t += Tools.stringFormat(ls,data.spender);
					}
					if(data.guards != null && data.guards != "")
						$t += Tools.stringFormat(ls,data.guards);
					if(data.toUserName != null && data.toUserName != "")
						$touser += data.toUserName;
					$h = Tools.stringFormat(html, $t,data.user,$touser,$p, $n);
					base.giftQueue.push($h);
				}
				var sh;
				if (!base.interval) {
					sh = setInterval(as, 50);
					base.interval = true;
				}
				function as() {
					var hs = base.giftQueue[0];
					base.giftQueue.splice(0, 1);
					$("#movelist1").append(hs);
					$("#nano-sendGiftList").nanoScroller();
					$("#nano-sendGiftList").nanoScroller({
						scroll : 'bottom'
					});
					var tmpli = $("#movelist1 li").length;
					if (tmpli > 50) {
						$("#movelist1 li:lt(" + (tmpli - 50) + ")").remove();
					}
					if (base.giftQueue.length == 0) {
						clearInterval(sh);
						base.interval = false;
					}
				}
			}
		}
	}
})