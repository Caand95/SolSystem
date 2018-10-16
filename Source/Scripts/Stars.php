<section class="stars-background">
    <div class="stars"></div>
    <div class="twinkling"></div>
    <style>
        .stars-background {
            z-index: -20;
            position: absolute;
            width: 100%;
            top: 0%;
            height: 100%;
            left: 0%;
        }

        * {
            margin: 0;
            padding: 0;
        }

        @keyframes move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        @-webkit-keyframes move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        @-moz-keyframes move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        @-ms-keyframes move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        .stars,
        .twinkling {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            display: block;
        }

        .stars {
            background: #000 url(http://www.script-tutorials.com/demos/360/images/stars.png) repeat top center;
            z-index: 0;
        }

        .twinkling {
            background: transparent url(http://www.script-tutorials.com/demos/360/images/twinkling.png) repeat top center;
            z-index: 1;

            -moz-animation: move-twink-back 200s linear infinite;
            -ms-animation: move-twink-back 200s linear infinite;
            -o-animation: move-twink-back 200s linear infinite;
            -webkit-animation: move-twink-back 200s linear infinite;
            animation: move-twink-back 200s linear infinite;
        }

    </style>
</section>
