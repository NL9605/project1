<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6ba0c41bed.js"></script>
    <style>

        /* Main background image container */
        .background-image-main-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 650px;
            margin: 0 auto; /* Center the container */
            max-width: 1280px; /* Max width to create white space */
            overflow: hidden; /* Prevent overflow of the image */
            padding: 30px; /* Add padding to create white space */
        }

        /* Background image style */
        .background-image {
            margin-top: 70px;
            width: 100%; /* Make the background image cover the container */
            height: 100%; /* Make it take full height */
            background-image: url('https://image.hunterfan.com/image/upload/f_auto,q_auto/s/files/1/0259/4629/2284/files/About_us_kitchen_BG.jpg?v=1619606063');
            background-size: cover; /* Ensure the image covers the container */
            background-position: center; /* Center the image */
        }

        /* Inner content box */
        .callout-box-w-background {
            text-align: center;
            background-color: white;
            padding: 67.5px 0;
            position: absolute; /* Position it in the center */
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Adjust for centering */
            z-index: 1; /* Make sure it is above the background */
        }

        h2 {
            font-size: 1.5em;
            font-weight: bold;
            margin-block: 0.83em;
        }
        h1{
            margin-bottom: 2%;
        }
        .rte p {
            font-size: 15px;
            line-height: 22px;
            margin-bottom: 9px;
        }

        p.top-title {
            color: #2f2f2f;
            font-weight: 600;
            font-size: 17px;
            line-height: 1.1;
        }
        .bgcol2 {
            background-color: #f0f0f0;
            max-width: 1200px; /* Same max-width as the background image */
            margin: -30px auto 0;
            padding: 70px;
            width: 100%;
            box-sizing: border-box;
        }
        .rte .Grid--gutters {
            margin-left: 0;
        }
        .Grid--gutters {
            margin-left: -1em;
        }
        .Grid {
            display: flex;
            flex-flow: row;
            flex-wrap: wrap;
        }
        .rte .Grid--gutters .Grid-cell {
            padding-left: 1rem;
        }
        .Grid--full>.Grid-cell {
            flex: 0 0 100%;
        }
        .Grid--gutters .Grid-cell {
            padding-left: 1em;
        }
        .Grid-cell {
            flex: 1;
        }
        .wrapper {
            max-width: 1280px;
            margin: 0 auto;
        }
        .section-padding-50 {
            padding: 30px 0;
        }
        .text-center, .u-textCenter, .section-intro {
            text-align: center;
        }
        .Grid--330px {
            justify-content: center;
        }

        .Grid--330px .Grid-cell.text-center {
            flex: 0 0 360px;
        }
        /* Responsive styling */
        @media (max-width: 768px) {
            .background-image-main-container {
                max-width: 100%; /* Full width on small screens */
                padding: 0 5%; /* Padding for small screens */
            }
        }
        @media only screen and (max-width: 767px) {
            .rte .section-padding-50 {
                padding: 0;
            }
        }
        @media only screen and (min-width: 200px) and (max-width: 767px) {
            .wrapper {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
        .col-tile-content-centered {
            width: 100%;
            height: 100%;
            position: relative;
        }
        @media only screen and (max-width: 767px) {
            .rte .content-centered {
                position: inherit;
                padding: 2rem 0;
            }
        }
        .rte .content-centered {
            width: 90%;
            height: auto;
            left: 50%;
            top: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }
        .Grid-cell .content-centered {
            transform: translate(-50%, -50%);
            position: relative;
            transform: translate(0);
            left: 0;
            top: 0;
            width: 100%;
        }
        .content-centered {
            width: 90%;
            height: auto;
            left: 50%;
            top: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }
        figure {
            margin: 0;
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 40px;
            margin-inline-end: 40px;
            unicode-bidi: isolate;
        }
        blockquote {
            color: rgba(var(--color-foreground), 1);
            line-height: 1.2;
            border: none;
            padding: 0;
            margin: 0;
        }
        @media only screen and (max-width: 767px) {
            .col-tile-w-image, .m-m-bottom-20 {
                margin-bottom: 20px;
            }
        }
        .col-tile-w-image .tile-image-wrapper {
            margin-bottom: 30px;
        }
        .col-tile-w-image .tile-image-wrapper {
            width: 100%;
            position: relative;
            height: auto;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 580px;
        }
        .col-tile-w-image .tile-image-wrapper .tile-image {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: relative;
        }
        .col-tile-w-image .tile-image-wrapper .tile-image img {
            height: 100% !important;
            width: 100% !important;
            object-fit: cover;
        }
        img {
            height: auto;
            max-width: 100%;
            overflow-clip-margin: content-box;
        }
        @media only screen and (max-width: 767px) {
            .Grid--cols-2 {
                flex-direction: column; /* Stack elements vertically */
            }

            .Grid-cell {
                width: 100%; /* Make each cell take full width */
                padding-left: 0; /* Remove padding for mobile */
                margin-bottom: 20px; /* Add space between elements */
            }

            .col-tile-w-image {
                order: 2; /* Ensure the image appears after the text */
            }

            .col-tile-content-centered {
                order: 1; /* Ensure the blockquote appears first */
            }
        }

    </style>
</head>
<body>
<div class="background-image-main-container">
    <div class="background-image"></div> <!-- Background image div -->
    <div class="callout-box-w-background">
        <p class="top-title">&nbsp;</p>
        <h1>
            <strong>Our Promise</strong>
        </h1>
        <h2 style="color: #354B59; margin-top: 0;">
            Confidence you can feel
        </h2>
        <p style="max-width: 85%; margin: 0 auto;">
            "We help make transforming the spaces you love a better experience through high quality products, solutions, and dedicated support."
        </p>
    </div>
</div>

<div class="Grid Grid--full bgcol2">
    <div class="Grid-cell">
        <div class="wrapper section-padding-50 m-section-padding-bottom-20 m-section-padding-top-0">
            <div class="Grid Gride--gutters Grid--full">
                <div class="Grid-cell">
                    <div class="section-quote text-center">
                        <h2>Innovation for all</h2>
                        <p>
                            "With over 40 years of experience, we've been supplying quality engineered cooling products
                            <br>
                            and assemblies to a wide range of industries and applications"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="Grid Grid--gutters Grid--cols-2">
    <div class="Grid-cell" style="padding-left: 3%;">
        <div class="col-tile-content-centered m-m-bottom-30">
            <div class="content-centered" style="padding-left: 7%;">
                <!-- override text color green -->
                <figure>
                    <blockquote>
                        <p style="color: #537f53; font-size: 32px; font-weight: bold; text-align: left; line-height: 1.2;">"The one that started it all."</p>
                    </blockquote>
                </figure>
                <img style="width: 247px; height: 62px;" src="https://image.hunterfan.com/image/upload/f_auto,q_auto/s/files/1/0259/4629/2284/files/about_us_-_JohnHunterSig.png?v=1619534354" loading="lazy" alt="John Hunter signature">
                <p>Proudly displayed in homes for decades, the one-of-a-kind Hunter Original® brings together all our expertise in a simple, rock-solid package.</p>
            </div>
        </div>
    </div>
    <div class="Grid-cell">
        <div class="col-tile-w-image">
            <div class="tile-image-wrapper tile-image-wrapper80">
                <div class="tile-image"><img style="width: 708px; height: 566px;" src="https://image.hunterfan.com/image/upload/f_auto,q_auto/s/files/1/0259/4629/2284/files/About_us_Original_a7907b9a-8fe4-463f-beca-e22251bae249.jpg?v=1620403428" loading="lazy" alt="Hunter Outdoor Original ceiling fan in matte black finish"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
