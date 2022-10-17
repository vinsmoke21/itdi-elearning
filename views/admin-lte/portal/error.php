<!--dust particel-->



<div id="particles">
    <div id="webcoderskull" class="desc">
        <h1 style="padding-bottom: 30px;">Ooops page not found!</h1>
        <p ><a href="http://localhost/cportal/itdi-elearning/web/portal/index" style="text-decoration: none;  font-size: 20px;">Back to Home</a></p>
    </div>
</div>

<!--Dust particle end--->
<div class="test">
    <div class="starsec"></div>
    <div class="starthird"></div>
    <div class="starfourth"></div>
    <div class="starfifth"></div>
</div>


<!-- <div class="lamp__wrap">
    <div class="lamp">
        <div class="cable"></div>
        <div class="cover"></div>
        <div class="in-cover">
            <div class="bulb"></div>
        </div>
        <div class="light"></div>
    </div>
</div> -->

<!-- END Lamp -->


<style>
    #webcoderskull {
        position: absolute;
        left: 0;
        top: 30%;
        padding: 0 20px;
        width: 100%;
        text-align: center;

    }

    canvas {
        height: 100vh;
        /* background-color: #16a085; */
    }

    #webcoderskull h1 {
        letter-spacing: 5px;
        padding-top: 100px;
        font-size: 20px;
        text-transform: uppercase;
        font-weight: bold;
        color:#16a085;
    }

</style>


<style>
    body {
        overflow: hidden;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        position: relative;
        background-color: #6e1ec2;
    }

    .scene {
        perspective: 400px;
    }

    .desc p{
     
        text-align: center;
        

    }

    .desc p a {
        margin: 0;
        font-size: 26px;
        color: #009688;
    }

    .desc p a{
        border: 2px solid #1abc9c;
        background: transparent;
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 13px;
        font-family: 34;
        box-shadow: 4px 4px 0 0px rgba(19, 13, 26, 0.5);
        position: relative;
        transition: 0.3s;
        outline: none;
        cursor: pointer;
        border-radius: 0 20px;
        overflow: hidden;
    }

    .desc a:after {
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        height: 0;
        background: #130d1a;
        transition: 0.3s;
        z-index: -1;
    }

    .desc a:hover {
        color: #fff;
        letter-spacing: 2px;
    }

    .desc a:hover:after {
        height: 100%;
    }

    .desc a:active {
        box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.5);
    }
</style>

<style>
    * {
        margin: 0;
        padding: 0;
        -webkit-text-size-adjust: none;
    }

    html,
    body {
        height: 100%;
        overflow: hidden;
    }

    body {
        padding-top: 110px;
        margin: 0;
        background: #181828;
        font-size: 14px;
        line-height: 1;
        /* display: flex; */
    }

    label {
        cursor: pointer;
    }

    a {
        margin: 0;
        padding: 0;
        vertical-align: baseline;
        background: transparent;
        text-decoration: none;
        color: #000;
    }

    input,
    select,
    button,
    textarea {
        margin: 0;
        font-size: 100%;
    }

    input {
        border: 0;
        outline: 0;
        font-size: 100%;
        vertical-align: baseline;
        background: transparent;
    }



    .starsec {
        content: " ";
        position: absolute;
        width: 3px;
        height: 3px;
        background: transparent;
        box-shadow: 571px 173px #00BCD4, 1732px 143px #00BCD4, 1745px 454px #FF5722, 234px 784px #00BCD4, 1793px 1123px #FF9800, 1076px 504px #03A9F4, 633px 601px #FF5722, 350px 630px #FFEB3B, 1164px 782px #00BCD4, 76px 690px #3F51B5, 1825px 701px #CDDC39, 1646px 578px #FFEB3B, 544px 293px #2196F3, 445px 1061px #673AB7, 928px 47px #00BCD4, 168px 1410px #8BC34A, 777px 782px #9C27B0, 1235px 1941px #9C27B0, 104px 1690px #8BC34A, 1167px 1338px #E91E63, 345px 1652px #009688, 1682px 1196px #F44336, 1995px 494px #8BC34A, 428px 798px #FF5722, 340px 1623px #F44336, 605px 349px #9C27B0, 1339px 1344px #673AB7, 1102px 1745px #3F51B5, 1592px 1676px #2196F3, 419px 1024px #FF9800, 630px 1033px #4CAF50, 1995px 1644px #00BCD4, 1092px 712px #9C27B0, 1355px 606px #F44336, 622px 1881px #CDDC39, 1481px 621px #9E9E9E, 19px 1348px #8BC34A, 864px 1780px #E91E63, 442px 1136px #2196F3, 67px 712px #FF5722, 89px 1406px #F44336, 275px 321px #009688, 592px 630px #E91E63, 1012px 1690px #9C27B0, 1749px 23px #673AB7, 94px 1542px #FFEB3B, 1201px 1657px #3F51B5, 1505px 692px #2196F3, 1799px 601px #03A9F4, 656px 811px #00BCD4, 701px 597px #00BCD4, 1202px 46px #FF5722, 890px 569px #FF5722, 1613px 813px #2196F3, 223px 252px #FF9800, 983px 1093px #F44336, 726px 1029px #FFC107, 1764px 778px #CDDC39, 622px 1643px #F44336, 174px 1559px #673AB7, 212px 517px #00BCD4, 340px 505px #FFF, 1700px 39px #FFF, 1768px 516px #F44336, 849px 391px #FF9800, 228px 1824px #FFF, 1119px 1680px #FFC107, 812px 1480px #3F51B5, 1438px 1585px #CDDC39, 137px 1397px #FFF, 1080px 456px #673AB7, 1208px 1437px #03A9F4, 857px 281px #F44336, 1254px 1306px #CDDC39, 987px 990px #4CAF50, 1655px 911px #00BCD4, 1102px 1216px #FF5722, 1807px 1044px #FFF, 660px 435px #03A9F4, 299px 678px #4CAF50, 1193px 115px #FF9800, 918px 290px #CDDC39, 1447px 1422px #FFEB3B, 91px 1273px #9C27B0, 108px 223px #FFEB3B, 146px 754px #00BCD4, 461px 1446px #FF5722, 1004px 391px #673AB7, 1529px 516px #F44336, 1206px 845px #CDDC39, 347px 583px #009688, 1102px 1332px #F44336, 709px 1756px #00BCD4, 1972px 248px #FFF, 1669px 1344px #FF5722, 1132px 406px #F44336, 320px 1076px #CDDC39, 126px 943px #FFEB3B, 263px 604px #FF5722, 1546px 692px #F44336;
        animation: animStar 150s linear infinite;
    }

    .starthird {
        content: " ";
        position: absolute;
        width: 3px;
        height: 3px;
        background: transparent;
        box-shadow: 571px 173px #00BCD4, 1732px 143px #00BCD4, 1745px 454px #FF5722, 234px 784px #00BCD4, 1793px 1123px #FF9800, 1076px 504px #03A9F4, 633px 601px #FF5722, 350px 630px #FFEB3B, 1164px 782px #00BCD4, 76px 690px #3F51B5, 1825px 701px #CDDC39, 1646px 578px #FFEB3B, 544px 293px #2196F3, 445px 1061px #673AB7, 928px 47px #00BCD4, 168px 1410px #8BC34A, 777px 782px #9C27B0, 1235px 1941px #9C27B0, 104px 1690px #8BC34A, 1167px 1338px #E91E63, 345px 1652px #009688, 1682px 1196px #F44336, 1995px 494px #8BC34A, 428px 798px #FF5722, 340px 1623px #F44336, 605px 349px #9C27B0, 1339px 1344px #673AB7, 1102px 1745px #3F51B5, 1592px 1676px #2196F3, 419px 1024px #FF9800, 630px 1033px #4CAF50, 1995px 1644px #00BCD4, 1092px 712px #9C27B0, 1355px 606px #F44336, 622px 1881px #CDDC39, 1481px 621px #9E9E9E, 19px 1348px #8BC34A, 864px 1780px #E91E63, 442px 1136px #2196F3, 67px 712px #FF5722, 89px 1406px #F44336, 275px 321px #009688, 592px 630px #E91E63, 1012px 1690px #9C27B0, 1749px 23px #673AB7, 94px 1542px #FFEB3B, 1201px 1657px #3F51B5, 1505px 692px #2196F3, 1799px 601px #03A9F4, 656px 811px #00BCD4, 701px 597px #00BCD4, 1202px 46px #FF5722, 890px 569px #FF5722, 1613px 813px #2196F3, 223px 252px #FF9800, 983px 1093px #F44336, 726px 1029px #FFC107, 1764px 778px #CDDC39, 622px 1643px #F44336, 174px 1559px #673AB7, 212px 517px #00BCD4, 340px 505px #FFF, 1700px 39px #FFF, 1768px 516px #F44336, 849px 391px #FF9800, 228px 1824px #FFF, 1119px 1680px #FFC107, 812px 1480px #3F51B5, 1438px 1585px #CDDC39, 137px 1397px #FFF, 1080px 456px #673AB7, 1208px 1437px #03A9F4, 857px 281px #F44336, 1254px 1306px #CDDC39, 987px 990px #4CAF50, 1655px 911px #00BCD4, 1102px 1216px #FF5722, 1807px 1044px #FFF, 660px 435px #03A9F4, 299px 678px #4CAF50, 1193px 115px #FF9800, 918px 290px #CDDC39, 1447px 1422px #FFEB3B, 91px 1273px #9C27B0, 108px 223px #FFEB3B, 146px 754px #00BCD4, 461px 1446px #FF5722, 1004px 391px #673AB7, 1529px 516px #F44336, 1206px 845px #CDDC39, 347px 583px #009688, 1102px 1332px #F44336, 709px 1756px #00BCD4, 1972px 248px #FFF, 1669px 1344px #FF5722, 1132px 406px #F44336, 320px 1076px #CDDC39, 126px 943px #FFEB3B, 263px 604px #FF5722, 1546px 692px #F44336;
        animation: animStar 10s linear infinite;
    }

    .starfourth {
        content: " ";
        position: absolute;
        width: 2px;
        height: 2px;
        background: transparent;
        box-shadow: 571px 173px #00BCD4, 1732px 143px #00BCD4, 1745px 454px #FF5722, 234px 784px #00BCD4, 1793px 1123px #FF9800, 1076px 504px #03A9F4, 633px 601px #FF5722, 350px 630px #FFEB3B, 1164px 782px #00BCD4, 76px 690px #3F51B5, 1825px 701px #CDDC39, 1646px 578px #FFEB3B, 544px 293px #2196F3, 445px 1061px #673AB7, 928px 47px #00BCD4, 168px 1410px #8BC34A, 777px 782px #9C27B0, 1235px 1941px #9C27B0, 104px 1690px #8BC34A, 1167px 1338px #E91E63, 345px 1652px #009688, 1682px 1196px #F44336, 1995px 494px #8BC34A, 428px 798px #FF5722, 340px 1623px #F44336, 605px 349px #9C27B0, 1339px 1344px #673AB7, 1102px 1745px #3F51B5, 1592px 1676px #2196F3, 419px 1024px #FF9800, 630px 1033px #4CAF50, 1995px 1644px #00BCD4, 1092px 712px #9C27B0, 1355px 606px #F44336, 622px 1881px #CDDC39, 1481px 621px #9E9E9E, 19px 1348px #8BC34A, 864px 1780px #E91E63, 442px 1136px #2196F3, 67px 712px #FF5722, 89px 1406px #F44336, 275px 321px #009688, 592px 630px #E91E63, 1012px 1690px #9C27B0, 1749px 23px #673AB7, 94px 1542px #FFEB3B, 1201px 1657px #3F51B5, 1505px 692px #2196F3, 1799px 601px #03A9F4, 656px 811px #00BCD4, 701px 597px #00BCD4, 1202px 46px #FF5722, 890px 569px #FF5722, 1613px 813px #2196F3, 223px 252px #FF9800, 983px 1093px #F44336, 726px 1029px #FFC107, 1764px 778px #CDDC39, 622px 1643px #F44336, 174px 1559px #673AB7, 212px 517px #00BCD4, 340px 505px #FFF, 1700px 39px #FFF, 1768px 516px #F44336, 849px 391px #FF9800, 228px 1824px #FFF, 1119px 1680px #FFC107, 812px 1480px #3F51B5, 1438px 1585px #CDDC39, 137px 1397px #FFF, 1080px 456px #673AB7, 1208px 1437px #03A9F4, 857px 281px #F44336, 1254px 1306px #CDDC39, 987px 990px #4CAF50, 1655px 911px #00BCD4, 1102px 1216px #FF5722, 1807px 1044px #FFF, 660px 435px #03A9F4, 299px 678px #4CAF50, 1193px 115px #FF9800, 918px 290px #CDDC39, 1447px 1422px #FFEB3B, 91px 1273px #9C27B0, 108px 223px #FFEB3B, 146px 754px #00BCD4, 461px 1446px #FF5722, 1004px 391px #673AB7, 1529px 516px #F44336, 1206px 845px #CDDC39, 347px 583px #009688, 1102px 1332px #F44336, 709px 1756px #00BCD4, 1972px 248px #FFF, 1669px 1344px #FF5722, 1132px 406px #F44336, 320px 1076px #CDDC39, 126px 943px #FFEB3B, 263px 604px #FF5722, 1546px 692px #F44336;
        animation: animStar 50s linear infinite;
    }

    .starfifth {
        content: " ";
        position: absolute;
        width: 1px;
        height: 1px;
        background: transparent;
        box-shadow: 571px 173px #00BCD4, 1732px 143px #00BCD4, 1745px 454px #FF5722, 234px 784px #00BCD4, 1793px 1123px #FF9800, 1076px 504px #03A9F4, 633px 601px #FF5722, 350px 630px #FFEB3B, 1164px 782px #00BCD4, 76px 690px #3F51B5, 1825px 701px #CDDC39, 1646px 578px #FFEB3B, 544px 293px #2196F3, 445px 1061px #673AB7, 928px 47px #00BCD4, 168px 1410px #8BC34A, 777px 782px #9C27B0, 1235px 1941px #9C27B0, 104px 1690px #8BC34A, 1167px 1338px #E91E63, 345px 1652px #009688, 1682px 1196px #F44336, 1995px 494px #8BC34A, 428px 798px #FF5722, 340px 1623px #F44336, 605px 349px #9C27B0, 1339px 1344px #673AB7, 1102px 1745px #3F51B5, 1592px 1676px #2196F3, 419px 1024px #FF9800, 630px 1033px #4CAF50, 1995px 1644px #00BCD4, 1092px 712px #9C27B0, 1355px 606px #F44336, 622px 1881px #CDDC39, 1481px 621px #9E9E9E, 19px 1348px #8BC34A, 864px 1780px #E91E63, 442px 1136px #2196F3, 67px 712px #FF5722, 89px 1406px #F44336, 275px 321px #009688, 592px 630px #E91E63, 1012px 1690px #9C27B0, 1749px 23px #673AB7, 94px 1542px #FFEB3B, 1201px 1657px #3F51B5, 1505px 692px #2196F3, 1799px 601px #03A9F4, 656px 811px #00BCD4, 701px 597px #00BCD4, 1202px 46px #FF5722, 890px 569px #FF5722, 1613px 813px #2196F3, 223px 252px #FF9800, 983px 1093px #F44336, 726px 1029px #FFC107, 1764px 778px #CDDC39, 622px 1643px #F44336, 174px 1559px #673AB7, 212px 517px #00BCD4, 340px 505px #FFF, 1700px 39px #FFF, 1768px 516px #F44336, 849px 391px #FF9800, 228px 1824px #FFF, 1119px 1680px #FFC107, 812px 1480px #3F51B5, 1438px 1585px #CDDC39, 137px 1397px #FFF, 1080px 456px #673AB7, 1208px 1437px #03A9F4, 857px 281px #F44336, 1254px 1306px #CDDC39, 987px 990px #4CAF50, 1655px 911px #00BCD4, 1102px 1216px #FF5722, 1807px 1044px #FFF, 660px 435px #03A9F4, 299px 678px #4CAF50, 1193px 115px #FF9800, 918px 290px #CDDC39, 1447px 1422px #FFEB3B, 91px 1273px #9C27B0, 108px 223px #FFEB3B, 146px 754px #00BCD4, 461px 1446px #FF5722, 1004px 391px #673AB7, 1529px 516px #F44336, 1206px 845px #CDDC39, 347px 583px #009688, 1102px 1332px #F44336, 709px 1756px #00BCD4, 1972px 248px #FFF, 1669px 1344px #FF5722, 1132px 406px #F44336, 320px 1076px #CDDC39, 126px 943px #FFEB3B, 263px 604px #FF5722, 1546px 692px #F44336;
        animation: animStar 80s linear infinite;
    }

    @keyframes animStar {
        0% {
            transform: translateY(0px);
        }

        100% {
            transform: translateY(-2000px);
        }
    }



    button {
        border: none;
        padding: 0;
        font-size: 0;
        line-height: 0;
        background: none;
        cursor: pointer;
    }

    :focus {
        outline: 0;
    }

    .clearfix:before,
    .clearfix:after {
        content: "\0020";
        display: block;
        height: 0;
        visibility: hidden;
    }

    .clearfix:after {
        clear: both;
    }

    .clearfix {
        zoom: 1;
    }

    /* 1. END BODY */
    /***********************************/

    /***********************************
			/* 2. CONTENT */
    /***********************************/
    /* 2.1. Section error */
    .error {
        min-height: 100vh;
        position: relative;
        padding: 240px 0;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        text-align: center;
        margin-top: 70px;
    }

    .error__overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .error__content {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .error__message {
        text-align: center;
        color: #181828;
    }

    .message__title {
        font-family: 'Montserrat', sans-serif;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 5px;
        font-size: 5.6rem;
        padding-bottom: 40px;
        max-width: 960px;
        margin: 0 auto;
    }

    .message__text {
        font-family: 'Montserrat', sans-serif;
        line-height: 42px;
        font-size: 18px;
        padding: 0 60px;
        max-width: 680px;
        margin: auto;
    }

    .error__nav {
        max-width: 600px;
        margin: 40px auto 0;
        text-align: center;
    }

    .e-nav__form {
        position: relative;
        height: 45px;
        overflow: hidden;
        width: 170px;
        display: inline-block;
        vertical-align: top;
        border: 1px solid #212121;
        padding-left: 10px;
        padding-right: 46px;
    }

    .e-nav__icon {
        position: absolute;
        right: 15px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        color: #212121;
        -webkit-transition: color .25s ease;
        transition: color .25s ease;
    }

    .e-nav__link {
        height: 45px;
        line-height: 45px;
        width: 170px;
        display: inline-block;
        vertical-align: top;
        margin: 0 15px;
        border: 1px solid #181828;
        color: #181828;
        text-decoration: none;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: .1rem;
        position: relative;
        overflow: hidden;
    }

    .e-nav__link:before {
        content: '';
        height: 200px;
        background: #212121;
        position: absolute;
        top: 70px;
        right: 70px;
        width: 260px;
        -webkit-transition: all .3s;
        transition: all .3s;
        -webkit-transform: rotate(50deg);
        transform: rotate(50deg);
    }

    .e-nav__link:after {
        -webkit-transition: all .3s;
        transition: all .3s;
        z-index: 999;
        position: relative;
    }

    .e-nav__link:after {
        content: "Go to Home";
    }

    .e-nav__link:hover:before {
        top: -60px;
        right: -50px;
    }

    .e-nav__link:hover {
        color: #fff;
    }

    .e-nav__link:nth-child(2):hover:after {
        color: #fff;
    }

    /* 2.1. END Section Error */

    /* 2.2. Social style */
    .error__social {
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 20px;
        z-index: 10;
    }

    .e-social__list {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    .e-social__icon {
        padding-bottom: 30px;
    }

    .e-social__icon:last-child {
        padding-bottom: 0;
    }

    .e-social__link {
        color: #fff;
        -webkit-transition: all .25s ease;
        transition: all .25s ease;
        display: block;
    }

    .e-social__link:hover {
        opacity: .7;
    }

    /* 2.2. END Social style */

    /* 2.3. Lamp */
    .lamp {
        position: absolute;
        left: 0px;
        right: 0px;
        top: 0px;
        margin: 0px auto;
        width: 300px;
        display: flex;
        flex-direction: column;
        align-items: center;
        transform-origin: center top;
        animation-timing-function: cubic-bezier(0.6, 0, 0.38, 1);
        animation: move 5.1s infinite;
    }

    @keyframes move {
        0% {
            transform: rotate(40deg);
        }

        50% {
            transform: rotate(-40deg);
        }

        100% {
            transform: rotate(40deg);
        }
    }

    .cable {
        width: 8px;
        height: 100px;
        background-image: linear-gradient(rgb(32 148 218 / 70%), rgb(193 65 25)), linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
    }

    .cover {
        width: 200px;
        height: 80px;
        background: #0bd5e8;
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        position: relative;
        z-index: 200;
    }

    .in-cover {
        width: 100%;
        max-width: 200px;
        height: 20px;
        border-radius: 100%;
        background: #08ffff;
        position: absolute;
        left: 0px;
        right: 0px;
        margin: 0px auto;
        bottom: -9px;
        z-index: 100;
    }

    .in-cover .bulb {
        width: 50px;
        height: 50px;
        background-color: #08fffa;
        border-radius: 50%;
        position: absolute;
        left: 0px;
        right: 0px;
        bottom: -20px;
        margin: 0px auto;
        -webkit-box-shadow: 0 0 15px 7px rgba(0, 255, 255, 0.8), 0 0 40px 25px rgba(0, 255, 255, 0.5), -75px 0 30px 15px rgba(0, 255, 255, 0.2);
        box-shadow: 0 0 25px 7px rgb(127 255 255 / 80%), 0 0 64px 47px rgba(0, 255, 255, 0.5), 0px 0 30px 15px rgba(0, 255, 255, 0.2);
    }


    .light {
        width: 200px;
        height: 10px;
        border-bottom: 900px solid rgb(44 255 255 / 24%);
        border-left: 50px solid transparent;
        border-right: 50px solid transparent;
        position: absolute;
        left: 0px;
        right: 0px;
        top: 170px;
        margin: 0px auto;
        z-index: 1;
        border-radius: 90px 90px 0px 0px;
    }


    .error {
        overflow: hidden;
        max-height: 100vh;
    }
</style>

<script>
    /*!
     * Particleground
     *
     */
    document.addEventListener('DOMContentLoaded', function() {
        particleground(document.getElementById('particles'), {
            dotColor: '#5cbdaa',
            lineColor: '#5cbdaa'
        });
        var intro = document.getElementById('intro');
        intro.style.marginTop = -intro.offsetHeight / 2 + 'px';
    }, false);



    ;
    (function(window, document) {
        "use strict";
        var pluginName = 'particleground';

        function extend(out) {
            out = out || {};
            for (var i = 1; i < arguments.length; i++) {
                var obj = arguments[i];
                if (!obj) continue;
                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        if (typeof obj[key] === 'object')
                            deepExtend(out[key], obj[key]);
                        else
                            out[key] = obj[key];
                    }
                }
            }
            return out;
        };

        var $ = window.jQuery;

        function Plugin(element, options) {
            var canvasSupport = !!document.createElement('canvas').getContext;
            var canvas;
            var ctx;
            var particles = [];
            var raf;
            var mouseX = 0;
            var mouseY = 0;
            var winW;
            var winH;
            var desktop = !navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i);
            var orientationSupport = !!window.DeviceOrientationEvent;
            var tiltX = 0;
            var pointerX;
            var pointerY;
            var tiltY = 0;
            var paused = false;

            options = extend({}, window[pluginName].defaults, options);

            /**
             * Init
             */
            function init() {
                if (!canvasSupport) {
                    return;
                }

                //Create canvas
                canvas = document.createElement('canvas');
                canvas.className = 'pg-canvas';
                canvas.style.display = 'block';
                element.insertBefore(canvas, element.firstChild);
                ctx = canvas.getContext('2d');
                styleCanvas();

                // Create particles
                var numParticles = Math.round((canvas.width * canvas.height) / options.density);
                for (var i = 0; i < numParticles; i++) {
                    var p = new Particle();
                    p.setStackPos(i);
                    particles.push(p);
                };

                window.addEventListener('resize', function() {
                    resizeHandler();
                }, false);

                document.addEventListener('mousemove', function(e) {
                    mouseX = e.pageX;
                    mouseY = e.pageY;
                }, false);

                if (orientationSupport && !desktop) {
                    window.addEventListener('deviceorientation', function() {
                        // Contrain tilt range to [-30,30]
                        tiltY = Math.min(Math.max(-event.beta, -30), 30);
                        tiltX = Math.min(Math.max(-event.gamma, -30), 30);
                    }, true);
                }

                draw();
                hook('onInit');
            }

            /**
             * Style the canvas
             */
            function styleCanvas() {
                canvas.width = element.offsetWidth;
                canvas.height = element.offsetHeight;
                ctx.fillStyle = options.dotColor;
                ctx.strokeStyle = options.lineColor;
                ctx.lineWidth = options.lineWidth;
            }

            /**
             * Draw particles
             */
            function draw() {
                if (!canvasSupport) {
                    return;
                }

                winW = window.innerWidth;
                winH = window.innerHeight;

                // Wipe canvas
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                // Update particle positions
                for (var i = 0; i < particles.length; i++) {
                    particles[i].updatePosition();
                };
                // Draw particles
                for (var i = 0; i < particles.length; i++) {
                    particles[i].draw();
                };

                // Call this function next time screen is redrawn
                if (!paused) {
                    raf = requestAnimationFrame(draw);
                }
            }

            /**
             * Add/remove particles.
             */
            function resizeHandler() {
                // Resize the canvas
                styleCanvas();

                var elWidth = element.offsetWidth;
                var elHeight = element.offsetHeight;

                // Remove particles that are outside the canvas
                for (var i = particles.length - 1; i >= 0; i--) {
                    if (particles[i].position.x > elWidth || particles[i].position.y > elHeight) {
                        particles.splice(i, 1);
                    }
                };

                // Adjust particle density
                var numParticles = Math.round((canvas.width * canvas.height) / options.density);
                if (numParticles > particles.length) {
                    while (numParticles > particles.length) {
                        var p = new Particle();
                        particles.push(p);
                    }
                } else if (numParticles < particles.length) {
                    particles.splice(numParticles);
                }

                // Re-index particles
                for (i = particles.length - 1; i >= 0; i--) {
                    particles[i].setStackPos(i);
                };
            }

            /**
             * Pause particle system
             */
            function pause() {
                paused = true;
            }

            /**
             * Start particle system
             */
            function start() {
                paused = false;
                draw();
            }

            /**
             * Particle
             */
            function Particle() {
                this.stackPos;
                this.active = true;
                this.layer = Math.ceil(Math.random() * 3);
                this.parallaxOffsetX = 0;
                this.parallaxOffsetY = 0;
                // Initial particle position
                this.position = {
                    x: Math.ceil(Math.random() * canvas.width),
                    y: Math.ceil(Math.random() * canvas.height)
                }
                // Random particle speed, within min and max values
                this.speed = {}
                switch (options.directionX) {
                    case 'left':
                        this.speed.x = +(-options.maxSpeedX + (Math.random() * options.maxSpeedX) - options.minSpeedX).toFixed(2);
                        break;
                    case 'right':
                        this.speed.x = +((Math.random() * options.maxSpeedX) + options.minSpeedX).toFixed(2);
                        break;
                    default:
                        this.speed.x = +((-options.maxSpeedX / 2) + (Math.random() * options.maxSpeedX)).toFixed(2);
                        this.speed.x += this.speed.x > 0 ? options.minSpeedX : -options.minSpeedX;
                        break;
                }
                switch (options.directionY) {
                    case 'up':
                        this.speed.y = +(-options.maxSpeedY + (Math.random() * options.maxSpeedY) - options.minSpeedY).toFixed(2);
                        break;
                    case 'down':
                        this.speed.y = +((Math.random() * options.maxSpeedY) + options.minSpeedY).toFixed(2);
                        break;
                    default:
                        this.speed.y = +((-options.maxSpeedY / 2) + (Math.random() * options.maxSpeedY)).toFixed(2);
                        this.speed.x += this.speed.y > 0 ? options.minSpeedY : -options.minSpeedY;
                        break;
                }
            }

            /**
             * Draw particle
             */
            Particle.prototype.draw = function() {
                // Draw circle
                ctx.beginPath();
                ctx.arc(this.position.x + this.parallaxOffsetX, this.position.y + this.parallaxOffsetY, options.particleRadius / 2, 0, Math.PI * 2, true);
                ctx.closePath();
                ctx.fill();

                // Draw lines
                ctx.beginPath();
                // Iterate over all particles which are higher in the stack than this one
                for (var i = particles.length - 1; i > this.stackPos; i--) {
                    var p2 = particles[i];

                    // Pythagorus theorum to get distance between two points
                    var a = this.position.x - p2.position.x
                    var b = this.position.y - p2.position.y
                    var dist = Math.sqrt((a * a) + (b * b)).toFixed(2);

                    // If the two particles are in proximity, join them
                    if (dist < options.proximity) {
                        ctx.moveTo(this.position.x + this.parallaxOffsetX, this.position.y + this.parallaxOffsetY);
                        if (options.curvedLines) {
                            ctx.quadraticCurveTo(Math.max(p2.position.x, p2.position.x), Math.min(p2.position.y, p2.position.y), p2.position.x + p2.parallaxOffsetX, p2.position.y + p2.parallaxOffsetY);
                        } else {
                            ctx.lineTo(p2.position.x + p2.parallaxOffsetX, p2.position.y + p2.parallaxOffsetY);
                        }
                    }
                }
                ctx.stroke();
                ctx.closePath();
            }

            /**
             * update particle position
             */
            Particle.prototype.updatePosition = function() {
                if (options.parallax) {
                    if (orientationSupport && !desktop) {
                        // Map tiltX range [-30,30] to range [0,winW]
                        var ratioX = (winW - 0) / (30 - -30);
                        pointerX = (tiltX - -30) * ratioX + 0;
                        // Map tiltY range [-30,30] to range [0,winH]
                        var ratioY = (winH - 0) / (30 - -30);
                        pointerY = (tiltY - -30) * ratioY + 0;
                    } else {
                        pointerX = mouseX;
                        pointerY = mouseY;
                    }
                    // Calculate parallax offsets
                    this.parallaxTargX = (pointerX - (winW / 2)) / (options.parallaxMultiplier * this.layer);
                    this.parallaxOffsetX += (this.parallaxTargX - this.parallaxOffsetX) / 10; // Easing equation
                    this.parallaxTargY = (pointerY - (winH / 2)) / (options.parallaxMultiplier * this.layer);
                    this.parallaxOffsetY += (this.parallaxTargY - this.parallaxOffsetY) / 10; // Easing equation
                }

                var elWidth = element.offsetWidth;
                var elHeight = element.offsetHeight;

                switch (options.directionX) {
                    case 'left':
                        if (this.position.x + this.speed.x + this.parallaxOffsetX < 0) {
                            this.position.x = elWidth - this.parallaxOffsetX;
                        }
                        break;
                    case 'right':
                        if (this.position.x + this.speed.x + this.parallaxOffsetX > elWidth) {
                            this.position.x = 0 - this.parallaxOffsetX;
                        }
                        break;
                    default:
                        // If particle has reached edge of canvas, reverse its direction
                        if (this.position.x + this.speed.x + this.parallaxOffsetX > elWidth || this.position.x + this.speed.x + this.parallaxOffsetX < 0) {
                            this.speed.x = -this.speed.x;
                        }
                        break;
                }

                switch (options.directionY) {
                    case 'up':
                        if (this.position.y + this.speed.y + this.parallaxOffsetY < 0) {
                            this.position.y = elHeight - this.parallaxOffsetY;
                        }
                        break;
                    case 'down':
                        if (this.position.y + this.speed.y + this.parallaxOffsetY > elHeight) {
                            this.position.y = 0 - this.parallaxOffsetY;
                        }
                        break;
                    default:
                        // If particle has reached edge of canvas, reverse its direction
                        if (this.position.y + this.speed.y + this.parallaxOffsetY > elHeight || this.position.y + this.speed.y + this.parallaxOffsetY < 0) {
                            this.speed.y = -this.speed.y;
                        }
                        break;
                }

                // Move particle
                this.position.x += this.speed.x;
                this.position.y += this.speed.y;
            }

            /**
             * Setter: particle stacking position
             */
            Particle.prototype.setStackPos = function(i) {
                this.stackPos = i;
            }

            function option(key, val) {
                if (val) {
                    options[key] = val;
                } else {
                    return options[key];
                }
            }

            function destroy() {
                console.log('destroy');
                canvas.parentNode.removeChild(canvas);
                hook('onDestroy');
                if ($) {
                    $(element).removeData('plugin_' + pluginName);
                }
            }

            function hook(hookName) {
                if (options[hookName] !== undefined) {
                    options[hookName].call(element);
                }
            }

            init();

            return {
                option: option,
                destroy: destroy,
                start: start,
                pause: pause
            };
        }

        window[pluginName] = function(elem, options) {
            return new Plugin(elem, options);
        };

        window[pluginName].defaults = {
            minSpeedX: 0.1,
            maxSpeedX: 0.7,
            minSpeedY: 0.1,
            maxSpeedY: 0.7,
            directionX: 'center', // 'center', 'left' or 'right'. 'center' = dots bounce off edges
            directionY: 'center', // 'center', 'up' or 'down'. 'center' = dots bounce off edges
            density: 10000, // How many particles will be generated: one particle every n pixels
            dotColor: '#666666',
            lineColor: '#666666',
            particleRadius: 7, // Dot size
            lineWidth: 1,
            curvedLines: false,
            proximity: 100, // How close two dots need to be before they join
            parallax: true,
            parallaxMultiplier: 5, // The lower the number, the more extreme the parallax effect
            onInit: function() {},
            onDestroy: function() {}
        };

        // nothing wrong with hooking into jQuery if it's there...
        if ($) {
            $.fn[pluginName] = function(options) {
                if (typeof arguments[0] === 'string') {
                    var methodName = arguments[0];
                    var args = Array.prototype.slice.call(arguments, 1);
                    var returnVal;
                    this.each(function() {
                        if ($.data(this, 'plugin_' + pluginName) && typeof $.data(this, 'plugin_' + pluginName)[methodName] === 'function') {
                            returnVal = $.data(this, 'plugin_' + pluginName)[methodName].apply(this, args);
                        }
                    });
                    if (returnVal !== undefined) {
                        return returnVal;
                    } else {
                        return this;
                    }
                } else if (typeof options === "object" || !options) {
                    return this.each(function() {
                        if (!$.data(this, 'plugin_' + pluginName)) {
                            $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
                        }
                    });
                }
            };
        }

    })(window, document);

    (function() {
        var lastTime = 0;
        var vendors = ['ms', 'moz', 'webkit', 'o'];
        for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
            window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
            window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] ||
                window[vendors[x] + 'CancelRequestAnimationFrame'];
        }

        if (!window.requestAnimationFrame)
            window.requestAnimationFrame = function(callback, element) {
                var currTime = new Date().getTime();
                var timeToCall = Math.max(0, 16 - (currTime - lastTime));
                var id = window.setTimeout(function() {
                        callback(currTime + timeToCall);
                    },
                    timeToCall);
                lastTime = currTime + timeToCall;
                return id;
            };

        if (!window.cancelAnimationFrame)
            window.cancelAnimationFrame = function(id) {
                clearTimeout(id);
            };
    }());
</script>