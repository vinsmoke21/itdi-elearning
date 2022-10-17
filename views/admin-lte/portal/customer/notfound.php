
<body style="display: flex;">
    
</body>
<div class="scene">
    <div class="box">
        <div class="box__face front">4</div>
        <div class="box__face back">0</div>
        <div class="box__face right">4</div>
        <div class="box__face left">0</div>
        <div class="box__face top">0</div>
        <div class="box__face bottom">0</div>
    </div>
    <div class="shadow"></div>
</div>

<style>
    /* body {
        background-color: #6e1ec2;
        overflow: hidden;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        position: relative; 
        display: flex;

    } */



    .scene {
        perspective: 400px;

    }

    .box {
        position: relative;
        width: 200px;
        height: 200px;
        transform-style: preserve-3d;
        transform: translateZ(-100px);
        transition: 0.3s;
        animation-name: rotateAnimation;
        animation-duration: 4s;
        animation-iteration-count: infinite;
    }

    .box__face {
        position: absolute;
        width: 200px;
        height: 200px;
        font-size: 120px;
        line-height: 200px;
        text-align: center;
        color: #fff;
        border: 1px solid #181828;
    }

    .box__face.front {
        transform: rotateY(0deg) translateZ(100px);
        background: #20162b;
    }

    .box__face.back {
        transform: rotateY(90deg) translateZ(100px);
        background: #130d1a;
    }

    .box__face.right {
        transform: rotateY(180deg) translateZ(100px);
        background: #070509;
    }

    .box__face.left {
        transform: rotateY(-90deg) translateZ(100px);
        background: #000;
    }

    .box__face.top {
        transform: rotateX(90deg) translateZ(100px);
        background: #130d1a;
    }

    .box__face.bottom {
        transform: rotateX(-90deg) translateZ(100px);
        background: #000;
    }

    @keyframes rotateAnimation {
        25% {
            transform: translateZ(-100px) rotateY(-90deg);
        }

        50% {
            transform: translateZ(-100px) rotateY(-180deg);
        }

        75% {
            transform: translateZ(-100px) rotateX(-90deg);
        }

        85% {
            transform: translateZ(-100px) rotateX(-90deg);
        }
    }

    .shadow {
        position: absolute;
        z-index: -1;
        left: -50px;
        top: calc(100% - 20px);
        width: calc(100% + 100px);
        height: 30px;
        border-radius: 50%;
        background: #000;
        filter: blur(20px);
    }

    .desc {
        margin-top: 60px;
        text-align: center;

    }

    .desc h2 {
        margin: 0;
        font-size: 26px;
    }

    .desc button {
        border: 2px solid #130d1a;
        background: transparent;
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 13px;
        font-family: "
Days One"
, sans-serif;
        box-shadow: 4px 4px 0 0px rgba(19, 13, 26, 0.5);
        position: relative;
        transition: 0.3s;
        outline: none;
        cursor: pointer;
        border-radius: 0 20px;
        overflow: hidden;
    }

    .desc button:after {
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        height: 0;
        content: "
"
;
        background: #130d1a;
        transition: 0.3s;
        z-index: -1;
    }

    .desc button:hover {
        color: #fff;
        letter-spacing: 2px;
    }

    .desc button:hover:after {
        height: 100%;
    }

    .desc button:active {
        box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.5);
    }
</style>