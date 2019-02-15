<?php $this->start('head'); ?>
<?php $this->setSiteTitle('Social Site'); ?>
<?php $this->setSiteIcon('social'); ?>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat);

        html, body {
            height: 100%;
        }

        body {
            background: #030321;
            font-family: Arial;
        }

        svg {
            display: block;
            font: 10.5em 'Montserrat';
            width: 960px;
            height: 300px;
            margin: 0 auto;
        }

        .text-copy {
            fill: none;
            stroke: white;
            stroke-dasharray: 6% 29%;
            stroke-width: 5px;
            stroke-dashoffset: 0%;
            animation: stroke-offset 5.5s infinite linear;
        }

        .text-copy:nth-child(1) {
            stroke: #23a7cb;
            animation-delay: -1s;
        }

        .text-copy:nth-child(2) {
            stroke: #337ab7;
            animation-delay: -2s;
        }

        .text-copy:nth-child(3) {
            stroke: #0e296a;
            animation-delay: -3s;
        }

        .text-copy:nth-child(4) {
            stroke: #00293c;
            animation-delay: -4s;
        }

        .text-copy:nth-child(5) {
            stroke: #495891;
            animation-delay: -5s;
        }

        @keyframes stroke-offset {
            100% {
                stroke-dashoffset: -35%;
            }
        }
    </style>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
    <div class="container">
        <div class="row">
            <svg viewBox="0 0 960 300">
                <symbol id="s-text">
                    <text text-anchor="middle" x="50%" y="80%">Social Site</text>
                </symbol>

                <g class="g-ants">
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                    <use xlink:href="#s-text" class="text-copy"></use>
                </g>
            </svg>
        </div>
    </div>
<?php $this->end(); ?>