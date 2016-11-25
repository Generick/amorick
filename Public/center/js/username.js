define('ajax/username', function(require, exports, module){
    exports.check = function(){
        nickname= $("#nickname").val();
        $.ajax({
            type: "POST",
            cache: false,
            url: "/ajax/refactorUserInfo.php?action=editName&nickname="+nickname,
            data:JSON.stringify(""),
            contentType:"application/json; charset=utf-8",
            success:function(data){
                data=JSON.parse(data);
                 if(data.resultStatus == 200){
                     //alert("修改成功!");
                     $(".center-name").text(nickname);
                     $(".a-myname").show();
                     $(".c-myname").hide();
                }else{
                     alert(data.errorMessage);
                }
            }
        });
    };
    $(".center-edit").click(function(){
        $(".a-myname").hide();
        $(".c-myname").show();
    });
    $(".c-myname #cancel").on("click",function(){

        $(".a-myname").show();
        $(".c-myname").hide();
    })
    $(".c-funds-dh").on("click",function(){
        $(".zhezhao").show();
        $(".duikdou").show();
    })

});
