/**
 * \u529F\u80FD\uFF1A\u5B88\u62A4
 * */
define(function(require, exports, module) {
	var Tools = require('./anchor-tools');
	module.exports = {
		sfbox : $(".start-watch"),
		changeTimeBtn : $(".sftext"),
		timeList : $(".sf-times"),
		startWatchBtn : $("#watchButton"),
		clz : $(".start-watch .clz"),
		sta : $(".kais"),
		price : 88800,
		contoiner : $(".guard-main"),
		init : function() {
			this.sfbox = $(".start-watch");
			this.changeTimeBtn = $(".sftext");
			this.timeList = $(".sf-times");
			this.startWatchBtn = $("#watchButton");
			this.clz = $(".start-watch .clz");
			this.sta = $(".kais");
			this.getGuardList();
			this.changeEvent();
			this.startWatch();
		},
		getGuardList : function(data) {
			htm = "";
			var n=0;
            if (data != null) {
				$.each(data, function() {
                    n++;
					var _self = $(this);
					_self[0].grds = _self[0].grds;
					htm += '<li><div class="guardYou"><div class="gback glv1"><img src="/apis/avatar.php?uid=' + _self[0].userId +'" class="img2"/>\
		                        <span class="img3">' + _self[0].days + '<br />\u5929</span>\
		                        <img src="/static_data/images_css/guardbox/' + _self[0].levelImage + '" class="img1"/>\
		                        </div>\
		                        <div class="gname"><a href="#"  title="' + _self[0].name + '">'+ _self[0].name + '</a></div></div></li>';
				})
			}
            $(".gdnum").text(n+"/32");
			$(".guard-main ul").html(htm);
		},
		changeEvent : function() {
			var base = this;
			base.changeTimeBtn.on("mouseover", function() {
				base.timeList.show();
			})
			base.timeList.find("li").on("click", function() {
				var mon = $(this).attr("dv");
				var _price = mon * base.price;
				base.changeTimeBtn.text(mon);
				base.changeTimeBtn.text(mon);
				$(".sfpeice").text("\u603B\u4EF7\u683C\uFF1A" + _price + "\u9017\u5E01");
				base.clzTimelist();
			})
			base.timeList.on("mouseleave", function() {
				$(this).hide()
			})
			base.clz.on("click", function() {
				base.sfbox.hide();
			})
			base.sta.on("click", function() {
				if (!UIF.handler.login) {
					UIF.handler.loging();
					return;
				}
				base.sfbox.show();
			})
			base.contoiner.on("mouseover", 'li .img1', function(ext) {
				$(this).siblings(".img3").slideToggle(100);
			}).on("mouseleave", 'li .img1', function(ext) {
				$(this).siblings(".img3").hide();
			})
		},
		startWatch : function() {
			var base = this;
			base.startWatchBtn.on("click", function() {
				UIF.handler.sendAddGuard({guardDT : base.changeTimeBtn.text()}, function(data) {
					Tools.dialog("\u5F00\u901A\u6210\u529F");
					base.sfbox.hide();
				});
			})
		},
		refreshGuardList : function(data) {
			this.getGuardList(data);
		},
		clzTimelist : function() {
			this.timeList.hide();
		}
	}
})
