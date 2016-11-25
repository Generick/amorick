
<!--宠物部分  开始-->
<div class="PetSwf">
    <div id="PetSwf"></div>
    <div id="petName" style="width:160;position:absolute;z-index:990;top:0;text-align:center;color:#ffffff;">龙儿</div>
    <div id="clickRect" style="width:160;height:160;position:absolute;z-index:991;top:0"></div>
</div>
<style>.PetSwf{position:absolute;width:160px;height:160px; right: 134px;top: 666px;z-index:889;cursor: pointer;}
    .petOpt-tip-warp{
        z-index:991;
        display:none;
        position:relative;
        width : 372px;
        height : 260px;
    }
    .petOpt-tip-warp-top, .petOpt-tip-warp-left, .petOpt-tip-warp-right{
        position : absolute;
        background-color : rgba(25, 25, 23, 0.7);
    }
    .petOpt-tip-warp-top {
        border-radius : 5px 5px 0 0;
        border-top : 1px solid #ccc;
        border-left : 1px solid #ccc;
        border-right : 1px solid #ccc;
        top : 0;
        left : 0;
        width : 112px;
        height : 30px;
        text-align : center;
        color : #FFF;
    }
    .petOpt-tip-warp-top label {
        line-height : 30px;
    }
    .petOpt-tip-warp-left {
        border-radius : 0 0 0 5px;
        border-left : 1px solid #ccc;
        border-bottom : 1px solid #ccc;
        top : 30px;
        left : 0;
        width : 112px;
        height : 230px;
    }
    .petOpt-tip-warp-right {
        border-radius : 0 5px 5px 0;
        border-top : 1px solid #ccc;
        border-bottom : 1px solid #ccc;
        border-right : 1px solid #ccc;
        top : 30px;
        left : 112px;
        width : 260px;
        height : 230px;
    }
    .petOpt-tip-warp-ui{
        position : absolute;
        top : 30px;
        left : 0;
        width : 372px;
        height : 230px;
    }
    .petOpt-tip-warp-buttonContainer{
        position : absolute;
        top : 130px;
        left : 40px;
        width : 300px;
        height : 80px;
    }
    .petOpt-tip-warp-buttonContainer button{
        width : 57px;
    }
    .petImg{
        position : absolute;
        display : block;
        width : 60px;
        height : 60px;
        border-radius : 50%;
        left : 20px;
        top : 28px;
    }
    .pet-level-bar{
        position: relative;
        top : 58px;
        left : 90px;
        width: 250px;
        height : 12px;
        border: 1px solid #B1D632;
    }
    .pet-level-bar div {
        position: relative;
        display: block;
        color: #FFF;
        line-height: 10px;
        background:#090;
        height: 10px;
    }
    .pet-level-bar div span {
        position: absolute;
        text-align: center;
        width: 250px;
    }
    #petOpt-tip-warp-splitters{
        position: relative;
        top : 108px;
        left : 20px;
        width : 332px;
        height:1px;
        border:none;
        border-top:1px solid #FFFFFF;
    }
    #petOpt-tip-warp-petNameInput{
        position: absolute;
        top : 30px;
        left : 90px;
        width : 140px;
        color : #FF0000;
        border : 0px;
        background-color : transparent;
    }
    #petOpt-tip-warp-changeNameBtn{
        position: absolute;
        top : 30px;
        left : 250px;
        display : none;
    }
    .pet-level-levelupNeedDesc{
        position: absolute;
        top : 80px;
        left : 90px;
    }
</style>
<div class="petOpt-tip-warp toggleBox">
    <div class="petOpt-tip-warp-top">
        <label>宠物资料</label>
    </div>
    <div class="petOpt-tip-warp-left"></div>
    <div class="petOpt-tip-warp-right"></div>
    <div class="petOpt-tip-warp-ui">
        <img class="petImg" src="http://images.181show.com/fe1251becda767dd3275c1fc09f1e117" ></img>
        <input id="petOpt-tip-warp-petNameInput" type="text" value="龙儿" readOnly="true"></input>
        <button id="petOpt-tip-warp-changeNameBtn" >确定修改</button>
        <div class="pet-level-bar">
            <div style="width: 33%;">
                <span>33%</span>
            </div>
        </div>
        <span class="pet-level-levelupNeedDesc">还差1000经验值升级到下一级</span>
        <hr id="petOpt-tip-warp-splitters"></hr>
        <table class="petOpt-tip-warp-buttonContainer">
            <tr>
                <td><button>左行走</button></td>
                <td><button>挨打</button></td>
                <td><button>攻击</button></td>
            </tr>
            <tr>
                <td><button>喂食</button></td>
            </tr>
        </table>
    </div>
</div>
<!--宠物部分  结束-->