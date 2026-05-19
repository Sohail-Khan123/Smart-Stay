<?php

    $location  = $_GET['location']  ?? '';
    $startDate = $_GET['startDate'] ?? '';
    $endDate   = $_GET['endDate']   ?? '';
    $people    = $_GET['people']    ?? '';

    require_once("db_config.php");
    
    $query = "select * from hotels where city = ? ";

    $result = $con->execute_query($query,[$location]);
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<title>Responsive Hotel Listing</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
<link rel="stylesheet" href="styles/style.css">
<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:Arial, Helvetica, sans-serif;
    }

    body{
        background:#f3f3f3;
        padding:20px;
    }

    body .content{
        height: 300px;
        margin-bottom: 0px;
    }
    body .content .img {
    position: absolute;
    width: 100%;
    height: 95%;
    border-radius: 20px;
    object-fit: cover;
    object-position: center;
    z-index: -1;
    }
    body .content h1{
        width: 100%;
    }
    
    body .content p{
        width: 100%;
        font-weight: bold;
    }

    /* MAIN CONTAINER */

    .main-container{
        max-width:1250px;
        margin:auto;
        margin-top: 30px;
        margin-bottom: 30px;
        display:flex;
        gap:30px;
        align-items:flex-start;
    }

    /* =========================
    FILTER SIDEBAR
    ========================= */

    .filter-section{
        width:180px;
        min-width:180px;
    }

    .filter-box{
        margin-bottom:35px;
    }

    .filter-box h3{
        font-size:18px;
        margin-bottom:18px;
        color:#111;
    }

    .filter-box label{
        display:flex;
        align-items:center;
        gap:12px;
        margin-bottom:16px;
        font-size:16px;
        color:#555;
        cursor:pointer;
    }

    .filter-box input{
        width:16px;
        height:16px;
    }

    /* =========================
    HOTEL SECTION
    ========================= */

    .hotel-section{
        flex:1;
    }

    .hotel-card{
        background:#fff;
        border-radius:14px;
        padding:15px;
        margin-bottom: 20px;
        display:flex;
        justify-content:space-between;
        gap:25px;
        box-shadow:0 2px 10px rgba(0,0,0,0.08);
        
    }

    /* LEFT SIDE */

    .hotel-left{
        width:180px;
    }

    .main-img{
        width:100%;
        height:130px;
        object-fit:cover;
        border-radius:10px;
    }

    .small-images{
        display:flex;
        width:100%;
        gap:10px;
        margin-top:10px;
    }

    .small-images img{
        width:85px;
        height:50px;
        object-fit:cover;
        border-radius:8px;
    }

    /* CENTER */

    .hotel-center{

        display: flex;
        flex-direction: column;
        align-items: left;
        justify-content: space-between;
        min-width:400px;
    }

    .hotel-center h2{
        font-size:22px;
        margin-bottom:8px;
        color:#111;
    }

    .stars{
        margin-bottom:8px;
        color:#000;
        font-size:15px;
    }

    .hotel-center p{
        font-size:14px;
        color:#666;
        margin-bottom:18px;
        line-height:1.5;
    }

    .tags{
        display:flex;
        flex-wrap:wrap;
        gap:10px;
        margin-bottom:16px;
    }

    .tags span{
        background:#f1f1f1;
        padding:7px 14px;
        border-radius:6px;
        font-size:12px;
    }

    .location{
        color:#333;
        font-size:14px;
    }

    .location i{
        margin-right:8px;
    }

    /* RIGHT SIDE */

    .hotel-right{
        width:140px;
        text-align:center;
        display:flex;
        flex-direction:column;
        justify-content:space-around;
        gap:2px;
    }

    .hotel-right h3{
        font-size:14px;
        color:blue;
    }
    .hotel-right h2{
        font-size:14px;
        color:red;
    }

    .hotel-right h5{
        font-size:14px;
        color:green;
    }

    .hotel-right h4{
        font-size:14px;
        color:#111;
    }

    .hotel-right a{

        width: 100%;
        color:purple;
        font-size:18px;
        text-decoration:none;
        border: 1px solid black;
        border-radius: 100px;
        margin-right: 20px;
        padding: 3px 6px;
    }
    .hotel-right a:hover{
        background-color: black;
        color: white;
    }

    /* =========================
    RESPONSIVE
    ========================= */

    @media(max-width:1100px){

        .main-container{
            flex-direction:column;
        }

        .filter-section{
            width:100%;
            background:#fff;
            padding:20px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
        }

    }

    @media(max-width:850px){

        .hotel-card{
            flex-direction:column;
        }

        .hotel-left{
            width:100%;
        }

        .main-img{
            height:220px;
        }

        .hotel-right{
            width:100%;
            text-align:left;
        }

    }

    @media(max-width:500px){

        body{
            padding:12px;
        }

        .hotel-card{
            padding:15px;
        }

        .hotel-center h2{
            font-size:26px;
        }

        .hotel-right h3{
            font-size:22px;
        }

        .hotel-right h2{
            font-size:24px;
        }

        .hotel-right h4{
            font-size:22px;
        }

        .hotel-right a{
            font-size:22px;
        }

        .filter-box h3{
            font-size:22px;
        }

        .filter-box label{
            font-size:16px;
        }
    }

</style>
</head>

<body>
<?php include("navbar.php"); ?>
    <div class="content">
        <img class="img" src="images/tour.jpg" alt="Background image">  
        <h1>Discover your next journey with us</h1>
        <p>We Help you plan your entire trip for you and your family.You can book a stay or your entire journey here.</p>
    </div>
    <div class="main-container">

        <!-- FILTERS -->

        <div class="filter-section">

            <div class="filter-box">
                <h3>Room Amenities</h3>

                <label><input type="checkbox"> Parking</label>
                <label><input type="checkbox"> Parking</label>
                <label><input type="checkbox"> Parking</label>
            </div>

            <div class="filter-box">
                <h3>Price per night</h3>

                <label><input type="checkbox"> Under 1000 Rs</label>
                <label><input type="checkbox"> Under 2000 Rs</label>
                <label><input type="checkbox"> Under 3000 Rs</label>
                <label><input type="checkbox"> Under 4000 Rs</label>
                <label><input type="checkbox"> Under 5000 Rs</label>
            </div>

            <div class="filter-box">
                <h3>Star rating</h3>

                <label><input type="checkbox"> 5 Star</label>
                <label><input type="checkbox"> 4 Star</label>
                <label><input type="checkbox"> 3 Star</label>
                <label><input type="checkbox"> 2 Star</label>
                <label><input type="checkbox"> 1 Star</label>
            </div>

        </div>


        <!-- HOTEL CARD -->

        <div class="hotel-section">
            <?php
                while($row = $result->fetch_assoc()){
                    $services = $row["services"];
                    $services_array = explode(", ",$services);
            ?>
                <div class="hotel-card">

                    <!-- LEFT -->

                    <div class="hotel-left">

                        <img src="<?php echo $row["poster"] ?>" class="main-img">

                        <div class="small-images">
                            <img src="<?php echo $row["room_andHotelImages"]?>" >
                            <img src="<?php echo $row["poster"]?>" >
                        </div>

                    </div>

                    <!-- CENTER -->

                    <div class="hotel-center">

                        <h2><?php echo $row['name']; ?></h2>

                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>

                        <p>
                            <?php echo $row["description"]; ?>
                        </p>
                        <div class="tags">
                            <?php foreach($services_array as $service){?>
                                <span><?php echo $service ?></span>
                            <?php } ?>
                        </div>

                        <div class="location">
                            <i class="fa-solid fa-location-dot"></i>
                            <?php echo $row['location']; ?>
                        </div>

                    </div>

                    <!-- RIGHT -->

                    <div class="hotel-right">

                        <h3>Very Good <?php echo $row["rate"] ?></h3>

                        <h2><?php echo $row["rooms"] ?>Rooms Left</h2>

                        <h5><?php echo $row["mrp"] ?> Rs / Night</h5>

                        <h4><?php echo $row["discount"] ?>% Discount</h4>

                        <a href="book.php?id=<?php echo $row["id"]?>&start=<?php echo $startDate ?>&end=<?php echo $endDate ?>&people=<?php echo $people ?>">Book Now</a>

                    </div>
                </div>
            <?php } ?>
            
        </div>

    </div>

<?php include("footer.php"); ?>
