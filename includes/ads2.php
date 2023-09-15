<style>
    .ms-popup-overlay {
        position: fixed;
        top: 100px;
        width: 100vw;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        align-content: flex-start;
        justify-content: center;
        -webkit-box-pack: center;
    }

    .ms-popup-banner {
        max-width: 888px;
        width: 100%;
        height: 120px;
        padding: 20px 30px;
        position: fixed;
        display: flex;
        bottom: 0px;
        flex-direction: row;
        background-color: #c1c1c1;
        background-repeat: no-repeat;
        background-origin: padded-box;
    }

    .ms-popup-banner-content {
        font-family: "Open Sans";
        font-size: 20px;
        font-weight: normal;
        color: #4a4a4a;
        padding: 0px 25px;

    }

    .ms-popup-banner-content-text {
        display: flex;
        flex-direction: row
    }

    .ms-popup-banner-content-logos {
        display: flex;
        flex-direction: row;
    }

    .ms-popup-banner-content p {
        margin: 0px;
        margin-bottom: 20px;
    }

    .ms-popup-banner-content b {
        font-weight: 600;
    }

    .ms-popup-banner-content a {
        margin-right: 30px;
    }

    .ms-popup-banner-close {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>
<script>
    const fechaPopUpBottom = () => {
        const popupOverlay = document.querySelector('.ms-popup-overlay');

        if (popupOverlay) {
            popupOverlay.style.display = 'none';
        }
    }
</script>

<section class="ms-popup-overlay">
    <section class="ms-popup-banner">

        <button onclick="fechaPopUpBottom()" class="ms-popup-banner-close"><i class="fa-solid fa-x"></i></button>
        <div class="ms-popup-banner-logo">
            <img src="data:image/png;base64,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" alt="mediashare logo" />
        </div>
        <div class="ms-popup-banner-content">
            <p>Trabalho feito por <b>Gatinhas Malvadas</b> asdasdsadsads</p>
            <div class="ms-popup-banner-content-logos">
                <a href="">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAAAjCAYAAABb2B7bAAAAAXNSR0IArs4c6QAADU9JREFUeAHtnAewFcUShvsCZhCzD0UJhlIwZzGjFmAotYyYFTBTpaWWWa+YhUJFUbFAzFnBhAkVc86CWTCCOQAqKMz7v5bZt2c5556ze1FL3u2qvXt2pqcndJjunoE6mwUhhLp1112397Rp03qpqJOeVrGu6f2vWoHJGu04PUPffvvtYXV1dSEZ/aqrrtpGH6P1UNj0zD1rAE//o0czkibr1cTkuYe5WUWFt3W2zjrr9IHfTc9cvQZ9mv3xxx/syX8pzDPPPH8p/SbiVVegVzOZ7s5V0QogtGjRwg4++GB76qmnrGfPngUomC2//PK2//7722GHHWbdu3e3eeedtxCdSo1WXHFFO+200ypVVy3v1q2b9e7duypeXoQOHTpYfX193mYN4XduptqWDWEUqVtooYXspptusmHDhtmmm25qP//8cxEytuuuu9pRRx1lCM2+++5rd999ty2yyCKFaJVrtNRSS9lOO+1UrqqmspVXXtk233zzmnCrIW233Xa28847O9qSSy5pO+64Y7Umeepbwug5DqeffrrtvvvuTvfzzz93rS7SSfPmze3FF1+0yy67zBkNw/fbbz8nhZW44YYb7JprrrGVVlrJBeCiiy4y2uy9995uTRRa2IUXXmitW7e2I4880rXkzjvvtOOOO85pzJw503777Tf/vfjii9sll1ziNKmHzsILL2znnnuuXX311XbIIYc4HlblrLPOckGGGVOmTPHy9J9evXo5naFDh7pVou7kk0/2/keOHOljS+O3adPGLrjgAqcLzalTp9r8889vF198sTHeFVZYwdFXW201GzJkiA0fPtzWW2+9NImqv+c4o9u2bWuHHnpo0jGm8bvvvku+8/zQtuLaHNvA9I4dOxqaxMKdccYZ9uqrr9oVV1xhP/30k62//vq2xhpruCXYY489bPXVV/cFwaJstdVWttxyy9mZZ55phx9+uDNA/kkkbWeffbbxfdJJJ9lee+1lu+yyizPxxhtvtEcffdT7w5pQt9lmm9mpp55qX3/9tWX9jy222MKF6pRTTrHPPvvMhYdOtt9+e2vWrJn179/f+1hsscWSvr/99ltXBvphq4Nmy5YtXYi/+eYbO+aYYxx34MCB9uyzz9rTTz9t/IZe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" alt="apple store logo" />
                </a>
                <a href=""> <img src="data:image/png;base64,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" alt="google play store logo" /></a>
            </div>
        </div>
    </section>
</section>