<style>
    .ads-popup__container {
        position: fixed;
        top: 0;
        left: 0;
        background-color: red;
        z-index: 1001;
        width: 100%;
    }

    .ads-popup__inner {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%, 10%);
        height: 100vh;
        width: 80%;
        max-width: 700px;
    }

    .ads-popup__inner:before {
        content: " ";
        background: rgba(0, 0, 0, 0.5);
        position: absolute;
        width: 500%;
        height: 250%;
        top: -100%;
        left: -200%;
        z-index: -9;
        -webkit-animation: motion-x 10s forwards ease-out;
        animation: motion-x 10s forwards ease-out;
    }

    .ads-popup__inwrap {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        top: 40%;
        width: 100%;
    }

    .ads-popup__inwrap img {
        max-width: 100%;
        width: 100%;
        max-height: 400px;
    }

    .modalpop__close {
        background-color: #d92129;
        color: #fff;
        position: absolute;
        right: 0;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        font-size: 28px;
        cursor: pointer;
    }


    @keyframes motion-x {

        0%,
        5% {
            opacity: 0;
        }

        10%,
        100% {
            opacity: 1;
        }
    }

    @-webkit-keyframes motion-x {

        0%,
        5% {
            opacity: 0;
        }

        10%,
        100% {
            opacity: 1;
        }
    }

    @media screen and (max-width: 767px) {
        .ads-popup__inner {
            width: 90%;
            max-width: 500px;
        }

        .modalpop__close {
            width: 25px;
            height: 25px;
            font-size: 20px;
        }

    }
</style>

<div class="ads-popup" id="js-iframeremove">
    <div class="ads-popup__container">
        <div class="ads-popup__inner">
            <div class="ads-popup__inwrap">
                <div class="modalpop__close">&times;</div>
                <a href="https://gatinhasmalvadas.com.br" target="_blank">
                    <img src="https://gatinhasmalvadas.com.br/img/ads.png" alt="img">
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    // ========== # MODALPOPUP # ========== \\
    $(".modalpop__close,  .modalpop__overlay").click(function() {
        // $(".modalpop").toggleClass('modalpop--open');
        $(".modalpop").fadeToggle(400);

    });


    
    $('.ads-popup__inner').click(function() {
        $('#js-iframeremove').hide();
    });
</script>