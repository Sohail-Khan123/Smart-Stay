<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Summary Card</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="styles/style.css"/>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }
/* 
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        } */
        
        /* body header{
            width: 100%;
            height: 10%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        body header ul{
            list-style: none;
            display: flex;
        }
        body header ul li{
            padding: 10px;
        }
        body header ul li:nth-last-child(1){
            border-radius: 20px;
            background-color: black;
        }
        body header ul li:nth-last-child(1) a{
            color: white;
        }
        body header ul li a{
            text-decoration: none;
            color: rgb(43, 40, 40);
            font-weight: 500;
            transition: .3s linear;
        }
        body header ul li a:hover{
            color: gray;
            font-weight: bold;
            font-size: 18px; */
        /* } */

        /* MAIN CARD CONTAINER */
        .summary-card {
            background-color: white;
            width: 100%;
            max-width: 100%;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.05);
            margin: 30px 0px;
        }

        /* TOP SECTION: HOTEL DETAILS & MAP */
        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            gap: 20px;
        }

        .hotel-info-block {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .hotel-thumbnail {
            width: 130px;
            height: 85px;
            object-fit: cover;
            border-radius: 12px;
        }

        .hotel-text h2 {
            font-size: 18px;
            font-weight: 700;
            color: #111;
            margin-bottom: 4px;
        }

        .rating-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 6px;
        }

        .stars {
            color: #ff9900;
            font-size: 13px;
        }

        .badge-couple {
            background-color: #ffffff;
            color: #777;
            border: 1px solid #cbd5e1;
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 500;
        }

        .hotel-address {
            font-size: 13px;
            color: #334155;
            font-weight: 600;
        }

        /* GOOGLE MAP WRAPPER */
        .map-embed-wrapper {
            width: 200px;
            height: 85px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            position: relative;
            background: #e5e7eb;
        }

        .map-embed-wrapper iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* HORIZONTAL DIVIDER */
        .divider {
            height: 1px;
            background-color: #e2e8f0;
            width: 100%;
            margin-bottom: 22px;
        }

        /* BOTTOM SECTION: CHECK-IN INFO SYSTEM */
        .card-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .info-col {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-col .label {
            font-size: 11px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .info-col .value {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
        }

        .info-col .sub-value {
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
        }

        /* Center Badge/Pill spacing metrics */
        .pill-count {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .stay-summary-text {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
        }

        /* Price column positioning */
        .price-block {
            text-align: left;
        }

        .price-block .final-price {
            font-size: 16px;
            font-weight: 700;
            color: #000;
        }

        .price-block .mrp-discount {
            font-size: 12px;
            color: #475569;
            font-weight: 500;
        }

        .price-block .mrp-strike {
            text-decoration: line-through;
            color: #64748b;
        }

        .price-block .discount-badge {
            color: #ffffff;
            background-color: #2563eb;
            padding: 1px 6px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 11px;
            margin-left: 2px;
            display: inline-block;
        }

        /* RESPONSIVE CSS CONSTRAINTS */
        @media (max-width: 768px) {
            .card-top {
                flex-direction: column;
                align-items: flex-start;
            }
            .map-embed-wrapper {
                width: 100%;
                height: 120px;
            }
            .card-bottom {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }
            .pill-count {
                grid-column: span 2;
                width: max-content;
                margin: auto;
            }
            .stay-summary-text {
                grid-column: span 2;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .hotel-info-block {
                flex-direction: column;
                align-items: flex-start;
            }
            .hotel-thumbnail {
                width: 100%;
                height: 140px;
            }
            .card-bottom {
                grid-template-columns: 1fr;
            }
            .pill-count, .stay-summary-text {
                grid-column: span 1;
                text-align: left;
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <?php include("navbar.php") ?>

    <!-- <header>
        <h3>Smart stay</h3>
        <ul>
            <li><a href="#">Discover</a></li>
            <li><a href="#">Community</a></li>
            <li><a href="#">Special Deals</a></li>
            <li><a href="#">About Us</a></li>
            <?php if(!isset($_SESSION["u_id"])){?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php } else{?>
                <li>Hello <?php echo $_SESSION["u_id"] ?></li>
                <li><a href="logout.php">Logout</a></li>
            <?php }
            ?>
        </ul>
    </header> -->


<!-- <?php include("navbar.php") ?> -->
    <div class="summary-card">
        <div class="card-top">
            <div class="hotel-info-block">
                <img class="hotel-thumbnail" src="images/Delhi.avif" alt="Hotel Thumbnail">
                <div class="hotel-text">
                    <h2>Hotel Amber Palace</h2>
                    <div class="rating-row">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <span class="badge-couple">Couple Friendly</span>
                    </div>
                    <div class="hotel-address">Amber Road, Jaipur</div>
                </div>
            </div>
            
            <div class="map-embed-wrapper">
                <iframe 
                    src="https://maps.google.com/maps?q=Amber%20Road,%20Jaipur&t=&z=13&ie=UTF-8&iwloc=&output=embed" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>

        <div class="divider"></div>

        <div class="card-bottom">
            <div class="info-col">
                <span class="label">Check In</span>
                <span class="value">Sat 22 Mar 2025</span>
                <span class="sub-value">12 PM</span>
            </div>

            <div class="pill-count">2 Night</div>

            <div class="info-col">
                <span class="label">Check Out</span>
                <span class="value">Mon 24 Mar 2025</span>
                <span class="sub-value">11 AM</span>
            </div>

            <div class="stay-summary-text">
                2 Night &nbsp;|&nbsp; 2 Adult &nbsp;|&nbsp; 1 Room
            </div>

            <div class="info-col price-block">
                <span class="label">Price</span>
                <span class="final-price">22200 Rs</span>
                <span class="mrp-discount">
                    MRP <span class="mrp-strike">24000</span> 
                    <span class="discount-badge">15% Discount</span>
                </span>
            </div>
        </div>
    </div>

<?php include("footer.php") ?>
