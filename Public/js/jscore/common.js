define('ajax/common', function(require, exports, module){
    //var html=require("./common-html");
/*
    html='<div class="clert"><span></span></div>';
    exports.clert = function(str){
        $(".zhezhao").show();
        $(".clert span").html(str);
        $(".alert").show();
    }*/

    exports.clert = function (text, width, height, time) {
        $(".threesecond").remove();
        $(".zhezhao-threesecond").remove();
        $("body").append("<div class='threesecond'></div><div class='zhezhao-threesecond'></div>");
        $(".threesecond").text(text);
        if (width == undefined || height == undefined) {
            $(".threesecond").css({ width: 200, height: 100, lineHeight: "100px" });
        }
        else {
            $(".threesecond").css({ width: width, height: height, lineHeight: height + "px" });
        }

        $(".zhezhao-threesecond").show();
        $(".threesecond").show();
        if (time == undefined || time == '') {
            setTimeout(function () {
                $(".zhezhao-threesecond").hide();
                $(".threesecond").hide();
            }, 2000);
        }
        else {
            setTimeout(function () {
                $(".zhezhao-threesecond").hide();
                $(".threesecond").hide();
            }, time);
        }
    };
    exports.stringFormat=function(){
        if (arguments.length == 0)
            return this;
        var $ = arguments[0];
        if ($ != null && $ != "") {
            for (var i = 1; i < arguments.length; i++) {
                var vas = new RegExp("\\{" + (i - 1) + "\\}", "gm");
                if (arguments[i] != null) {
                    $ = $.replace(vas, arguments[i]);
                }
            }
        }
        return $;
    };
    exports.postDate = function (params, callback) {
        $.ajax({
            type: "POST",
            url: params.url,
            data: params.data,
            dataType: "json",
            timeout: 1200000,
            success: function (data, textStatus, jqXHR) {
                if (data.nologin) {
                    this.clert('没有登录，请重新登录。');
                } else {
                    callback(data, textStatus, jqXHR);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(params.url+" error code:"+textStatus);
            }
        });
    };
    exports.getDate = function (params, callback) {
        $.ajax({
            type: "POST",
            url: params.url,
            data: params.data,
            dataType: "json",
            timeout: 120000,
            success: function (data, textStatus, jqXHR) {
                callback(data, textStatus, jqXHR);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(params.url+" error code:"+textStatus);
            }
        });
    };

});