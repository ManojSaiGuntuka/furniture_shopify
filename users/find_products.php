

 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Date</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    body {
        font-family: "Inter", sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 20px;
        -webkit-text-decoration-line: none;
        text-decoration-line: none;
        letter-spacing: normal;
        text-transform: initial;
        -webkit-text-size-adjust: none;
        color: #272742;
        margin: 0;
        background: #f6f6f9;
        -webkit-font-smoothing: antialiased;
    }

    .flickity-viewport {
        height: 500px !important;
        touch-action: pan-y;
    }

    .carousel-cell {
        width: 22%;

        margin-right: 10px;
    }

    /* cell number */
    .carousel-cell:before {
        display: block;
    }


    .product-card:hover .product-card-actions {
        opacity: 1;
        margin-top: 20px;
        height: 32px;
    }

    .main {
        margin-left: 200px;
        /* Same as the width of the sidenav */
    }

    .product-card {
        transition: top 0.2s, z-index 0.3s;
    }

    .panel {
        background: #fff;
        box-shadow: 0 0 1px rgba(143, 144, 165, 0.7), 0 0 10px rgba(143, 144, 165, 0.2);
        border-radius: 0;
    }

    .panel .panel-header-with-image {
        position: relative;
        padding: 0;
        height: 236px;
        cursor: pointer;
    }

    .product-card__anchor {
        width: 100%;
        height: 100%;
    }

    .panel .panel-header-with-image img {
        border-radius: 0;
        vertical-align: top;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    img {
        border: 0;
    }

    .product-card .product-marked-corner {
        display: none;
    }

    .panel .panel-body {
        padding: 16px 24px;
    }

    .panel>:last-child {
        border-radius: 0;
    }

    .product-card__meta {
        min-height: 141px;
    }

    .product-card .product-card-title {
        width: 100%;
        height: 20px;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .product-card .product-card-link {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        text-decoration: none;
        color: #272742;
    }

    .product-card .product-price-wrapper {
        display: flex;
        align-items: center;
    }

    h4 {
        font-weight: 600;
        font-size: 14px;
        line-height: 20px;
        color: #272742;
    }

    .product-card-price {
        font-weight: 600;
        font-size: 16px;
        line-height: 20px;
        color: #272742;
    }

    .product-card .product-card-subtitle {
        color: #6f6f85;
    }

    .product-card .product-shipping-info {
        position: relative;
        display: flex;
        justify-content: space-between;
        padding-right: 20px;
        cursor: pointer;
    }

    .product-card__reviews {
        margin: 12px 8px 12px 0;
        display: flex;
        align-items: center;
        line-height: 0;
        height: 16px;
        font-size: 12px;
    }

    .product-card__reviews .product-card__reviews-count:first-child {
        margin-left: 0;
    }

    .product-card__reviews .product-card__reviews-count {
        color: #6f6f85;
        margin-left: 4px;
    }

    label {
        font-weight: 600;
        font-size: 12px;
        line-height: 20px;
        letter-spacing: 0.02em;
    }

    .product-card__stat {
        font-weight: normal;
        font-size: 12px;
        line-height: 20px;
        letter-spacing: 0.02em;
        display: flex;
        color: #6f6f85;
        justify-content: space-between;
    }

    .product-card__stat-name {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .product-card__stat-value {
        text-align: right;
    }

    .product-card__stat {
        font-weight: normal;
        font-size: 12px;
        line-height: 20px;
        letter-spacing: 0.02em;
        display: flex;
        color: #6f6f85;
        justify-content: space-between;
    }

    .product-card__stat-name {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .product-card__stat-value {
        text-align: right;
    }

    .product-card .product-card-actions {
        opacity: 0;
        filter: alpha(opacity=0);
        transition: height 0.2s, margin 0.3s, opacity 0.4s;
        overflow: hidden;
        height: 0;
        margin-top: 0;
    }

    .btn.btn-block {
        width: 100%;
        justify-content: center;
    }

    .btn-primary {
        color: #fff;
        background-color: #525bff;
        background-image: none;
        outline: none;
    }

    .btn {
        font-weight: 600;
        font-size: 12px;
        line-height: 20px;
        letter-spacing: -0.02em;
        text-transform: uppercase;
        -webkit-text-decoration-line: none;
        text-decoration-line: none;
        transition: background-color 0.2s ease-in-out;
        padding: 6px 12px;
        position: relative;
        display: inline-flex;
        align-items: center;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        user-select: none;
        border: 0;
        border-radius: 3px;
    }

    .btn .btn-title {
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 250px;
        padding-left: 4px;
        padding-right: 4px;
    }

    .product-collection-carousel__product-cards[data-v-2246a06b] {
        width: 100%;
    }

    .product-collection-carousel__product-cards>ul[data-v-2246a06b] {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 0;
        list-style: none;
        margin: -12px;
    }

    .product-collection-carousel__product-cards>ul>li[data-v-2246a06b] {
        min-width: 200px;
        flex: 1;
        margin: 12px;
        max-width: 270px;
    }
    </style>

    <style>
    .product-search-landing__featured-categories {
        margin-left: 135px;
        width: 80%;
    }

    .featured-categories .panel-body[data-v-57b7f280] {
        padding: 0 !important;
        overflow: visible !important;
        margin: 0 -1px -1px 0;
    }

    .featured-categories ul.categories-list[data-v-57b7f280] {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        flex-wrap: wrap;
    }

    .featured-categories li.featured[data-v-57b7f280] {
        flex: 1 1 200px;
        justify-content: center;
        border-right: 1px solid #e5e5ec;
        border-bottom: 1px solid #e5e5ec;
        transition: all 100ms linear;
    }

    .featured-categories .featured[data-v-57b7f280] {
        display: flex;
    }

    .featured-categories .featured button[data-v-57b7f280] {
        color: #62628d;
        background-color: rgba(0, 0, 0, 0);
        background-image: none;
        outline: none;
        width: 100%;
        margin: 0;
        white-space: pre-wrap;
        border-radius: 0;
        color: #272742;
        text-align: left;
        display: flex;
        align-items: center;
        padding: 12px 24px;
    }

    .featured-categories .featured button>svg[data-v-57b7f280] {
        flex: 0 1 40px;
    }

    .featured-categories .featured button svg[data-v-57b7f280] {
        fill: #62628d;
    }

    .btn svg {
        display: block;
    }

    svg:not(:root) {
        overflow: hidden;
    }

    .icon-lg {
        height: 40px;
        width: 40px;
    }


    .featured-categories .featured button svg[data-v-57b7f280] {
        fill: #62628d;
    }

    .featured-categories .featured button[data-v-57b7f280] {
        color: #62628d;
        background-color: rgba(0, 0, 0, 0);
        background-image: none;
        outline: none;
        width: 100%;
        margin: 0;
        white-space: pre-wrap;
        border-radius: 0;
        color: #272742;
        text-align: left;
        display: flex;
        align-items: center;
        padding: 12px 24px;
    }

    .btn-primary:active,
    .btn-primary.active {
        color: #fff;
        background-color: #160092;
    }

    .btn {
        font-weight: 600;
        font-size: 12px;
        line-height: 20px;
        letter-spacing: -0.02em;
        text-transform: uppercase;
        -webkit-text-decoration-line: none;
        text-decoration-line: none;
        transition: background-color 0.2s ease-in-out;
        padding: 6px 12px;
        position: relative;
        display: inline-flex;
        align-items: center;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        user-select: none;
        border: 0;
        border-radius: 3px;
    }

    .featured-categories .featured button span[data-v-57b7f280] {
        flex: 3;
        display: flex;
        margin-left: 8px;
    }

    .featured-categories__title[data-v-57b7f280] {
        font-weight: 600;
        font-size: 14px;
        line-height: 20px;
        color: #272742;
        text-transform: none;
    }

    .page-layout__body {
        flex: 1;
        display: flex;
        flex-direction: row;
        padding: 0 32px;
        max-width: 100%;
    }

    .page-layout__body-content {
        flex: 7;
        max-width: 100%;
    }



    /* main div */

    .page-layout__content {
        overflow-y: auto;
        overflow-x: hidden;
        background: #f6f6f9;
        -webkit-overflow-scrolling: touch;
        flex: 1;
    }

    .page-layout__content-container {
        max-width: 1176px;
    }

    /* End main */
    </style>
</head>

<body>
    <div class="main">
        <div">
            <header data-v-2246a06b="" class="product-collection-carousel__header">
                <h3 data-v-2246a06b="">Categories</h3>
            </header>

            <div class="page-layout__body-content">
                <div data-v-538e13d8="" class="notification-messages" slot="notification-messages">

                </div>
                <div>
                    <div>
                        <div class="product-search-landing" search-title="Search Products">
                            <div data-v-57b7f280=""
                                class="panel featured-categories product-search-landing__featured-categories">
                                <div data-v-57b7f280="" class="panel-body">
                                    <ul data-v-57b7f280="" class="categories-list">
                                        <li data-v-57b7f280="" class="featured"><button data-v-57b7f280="" type="button"
                                                class="margin btn"><svg data-v-57b7f280="" class="icon-lg">
                                                    <!-- <img src="https://img.icons8.com/wired/64/000000/table.png" /> -->

                                                </svg><span data-v-57b7f280=""
                                                    class="featured-categories__title">Table</span></button></li>
                                        <li data-v-57b7f280="" class="featured"><svg data-v-57b7f280="" class="icon-lg">
                                                <!-- <img src="https://img.icons8.com/pastel-glyph/64/000000/bed--v2.png" /> -->
                                            </svg><button data-v-57b7f280="" type="button" class="margin btn"><span
                                                    data-v-57b7f280=""
                                                    class="featured-categories__title">Bed</span></button></li>
                                        <li data-v-57b7f280="" class="featured"><svg data-v-57b7f280="" class="icon-lg">
                                                <!-- <img src="https://img.icons8.com/ios/50/000000/sofa-with-buttons.png" /> -->
                                            </svg><button data-v-57b7f280="" type="button" class="margin btn"><span
                                                    data-v-57b7f280=""
                                                    class="featured-categories__title">Sofa</span></button></li>

                                        <li data-v-57b7f280="" class="featured"><svg data-v-57b7f280="" class="icon-lg">
                                                <!-- <img src="https://img.icons8.com/carbon-copy/100/000000/-chair.png" /> -->
                                            </svg><button data-v-57b7f280="" type="button" class="margin btn"><span
                                                    data-v-57b7f280=""
                                                    class="featured-categories__title">Chair</span></button></li>

                                    </ul>
                                </div>
                            </div>
                            <div>

                                <header data-v-2246a06b="" class="product-collection-carousel__header">
                                    <h3 data-v-2246a06b="">Clickripple Select</h3>


                                </header>
                                <div class="carousel" data-flickity='{ "groupCells": true }'>

                                    <!-- <nav data-v-2246a06b="" class="product-collection-carousel__left-navigation">
                                            <svg data-v-2246a06b="" class="icon-lg">
                                                <use xlink:href="/images/icons.svg?v=2.10.3#icon-chevron-left"></use>
                                            </svg>
                                        </nav> -->


<?php
            $link = mysqli_connect("localhost", "root", "", "furniture");

            
            $sql = "select * from products";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($result)) {
                
                ?>
    
                                    <div data-v-2246a06b="" data-trekkie-id="product-card"
                                        class="product-card-wrapper carousel-cell" style="">
                                        <div class="panel expanding-panel product-card carousel-cell>">

                                            <div class="panel-header-with-image">

                                                <div class="product-card__anchor"><img src="../images/<?php echo $row["productImage"] ?>" />
                                                    
                                                </div>

                                                <div class="product-marked-corner"><svg
                                                        class="product-marked-corner__icon">
                                                        <use xlink:href="/images/icons.svg?v=2.10.3#icon-selected">
                                                        </use>
                                                    </svg></div>


                                            </div>
                                            <div class="panel-body">
                                                <div class="" style="max-height: none;">
                                                    <div supplier-texts="[object Object]" class="product-card__meta">
                                                        <div class="product-card-meta">
                                                            <div class="product-card-title"><a
                                                                    class="product-card-link">
                                                                    <?php echo $row['productName'] ?>
                                                                </a>

                                                            </div>
                                                        </div>
                                                        <div class="product-price-wrapper">
                                                            <h4><span class="product-card-price">
                                                                    <?php echo $row['productPrice'] ?>
                                                                </span></h4>
                                                        </div> <span class="product-card-subtitle">
                                                            <div>
                                                                <div class="product-shipping-info">
                                                                    Choose shipping country
                                                                </div>


                                                            </div>
                                                        </span>
                                                        <div>
                                                            <div class="product-card__reviews"><label
                                                                    class="product-card__reviews-count">No
                                                                    reviews</label></div>
                                                            <div class="product-card__stat">
                                                                <div class="product-card__stat-name">
                                                                    Imports
                                                                </div>
                                                                <div class="product-card__stat-value">
                                                                    770
                                                                </div>
                                                            </div>
                                                            <div class="product-card__stat">
                                                                <div class="product-card__stat-name">
                                                                    Orders
                                                                </div>
                                                                <div class="product-card__stat-value">
                                                                    0
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-trekkie-id="product-card:add-to-import-list"
                                                        class="product-card-actions">
                                                        <button type="button"
                                                            class="btn btn-primary btn-regular btn-block"
                                                            data-trekkie-id="">


                                                            Add to Import List


                                                        </button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

<?php 
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>



</body>

</html>