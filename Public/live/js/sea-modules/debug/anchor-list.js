define(function(require, exports, module) {
	var cons = require("cons");
	var Tools = require('./anchor-tools');
	module.exports = {
		init : function(data) {
			var base = this;
			$(".aud").click(function(){
				$(".audience").css({opacity: 0,display: "block"}).animate({left:70,opacity:1},500,"swing",function(e){
					$(this).addClass("bg-show");
					base.flushUsers();
					if(UIF.handler.intervals == null)
						UIF.handler.intervals = setInterval(function(){base.flushUsers();},2 * 60 * 100);
				});
			});
			$(".viewer").on("click",function(){
				if($(this).hasClass("on")){
					base.flushUsers();
					return !1;
				}
				$(".manager").removeClass("on"),$(this).addClass("on"),$(".viewer-list").show(),$(".manager-list").hide();
			});
			$(".manager").on("click",function(){
				base.flushManagers();
				if($(this).hasClass("on")){
					return !1;
				}
				$(".viewer").removeClass("on"),$(this).addClass("on"),$(".manager-list").show(),$(".viewer-list").hide();
			});
		},
		addUsers : function(data){
			if(!UIF.handler.userList.containsKey(data.userId)){
				UIF.handler.userList.put(data.userId,data);
			}
		},
		flushUsers : function() {
			var base = this;
			var lis = '<li data-cardid="{0}" class="anchor">\
							<span class="ICON-noble-level ICON-nl-13"></span>\
							<i class="ICON-medal">{1}</i>\
							<span class="name" title="{2}">{3}</span>\
					  </li>';
			var hs = "";
			var values = UIF.handler.userList.values();
			for(var i=0;i<values.length;i++){
				for(var j=0;j<values.length;j++){
					if(parseInt(values[i].splev) > parseInt(values[j].splev)){
						var t = values[i];
						values[i] = values[j];
						values[j] = t;
					}
				}
			}
			values.forEach(function(e){
				var filter = e.levs;
				if(filter != null && filter.indexOf("pic_liverlevel") > 0){
					hs += Tools.stringFormat(lis,e.userId,base.headimg(e.levs),e.nickname,e.nickname);
				}
			});
			values.forEach(function(e){
				var filter = e.levs;
				if(filter != null && filter.indexOf("pic_liverlevel") < 0 && filter.indexOf("pic_guanli") < 0){
					hs += Tools.stringFormat(lis,e.userId,base.headimg(e.levs),e.nickname,e.nickname);
				}
			});
			$(".usersList").html(hs);
		},
		flushManagers : function(){
			var base = this;
			var lim = '<li data-cardid="{0}" class="anchor">\
						<span class=""></span>\
						<i class="ICON-medal">{1}</i>\
						<span class="name" title="{2}">{3}</span>\
					</li>';
			var hs = "";
			var values = UIF.handler.userList.values();
			for(var i=0;i<values.length;i++){
				for(var j=0;j<values.length;j++){
					if(values[i].splev < values[j].splev){
						var t = values[j];
						values[j] = values[j];
						values[j] = t;
					}
				}
			}
			var count = 0;
			values.forEach(function(e){
				var filter = e.levs;
				if(filter != null && filter.indexOf("pic_guanli") > 0){
					hs += Tools.stringFormat(lim,e.userId,base.headimg(e.levs),e.nickname,e.nickname);
					count = count + 1;
				}
			});
			$(".managerList").html(hs);
			$(".manager>span").text(count);
		},
		headimg : function(data) {
			var heads = "";
			var img = '<span class="{0}"></span>';
			var $data = jQuery.parseJSON(data);
			if ($data != null && $data.length > 0) {
				for (var i = 0; i < $data.length; i++) {
					var $img = $data[i];
					if ($img != null && $img != "" && ($img.indexOf("pic_consumelevel") > 0 || $img.indexOf("pic_activelevel") > 0 
							|| $img.indexOf("pic_relationlevel") > 0 || $img.indexOf("pic_liverlevel") > 0 || $img.indexOf("pic_guanli") > 0))
						heads += Tools.stringFormat(img, $img);
				}
			}
			return heads;
		}
	}
});