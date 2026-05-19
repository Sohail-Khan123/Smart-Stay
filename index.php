<?php
session_start();

// If the user does NOT have a session ID, kick them out to the login page immediately
// if (!isset($_SESSION["u_id"])) {
//     header("Location: login.php");
//     exit;
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Stay</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <?php include("navbar.php");?>

    <div class="content">
        <img class="img" src="images/tour.jpg" alt="Background image">  
        <h1>Discover your next journey with us</h1>
        <p>We Help you plan your entire trip for you and your family.You can book a stay or your entire journey here.</p>
        <button>Start search here</button>

        <div class="search_box" >
            <form action="results.php" method="GET">
                <div class="card">
                    <h4>Location</h4>
                    <input type="text" placeholder="Enter Location" name="location" id="location">
                </div>
                <div class="card">
                    <h4>Check in</h4>
                    <input type="date" name="startDate" id="startDate">
                </div>
                <div class="card">
                    <h4>Check out</h4>
                    <input type="date" name="endDate" id="endDate">
                </div>
                <div class="card">
                    <h4>People</h4>
                    <input type="text" placeholder="Number of Persons?" name="people" id="people">
                </div>
                <button type="submit">Explore now</button>
            </form>
        </div>
        <div class="travel">
            <h3>Countries to Travel</h3><br>
            <div class="cards">
                <div class="card">
                    <h4>Pakistan</h4>
                    <img src="images/licensed-image.jpg" alt="Pakistan">
                    <div class="detail">
                        <button>
                            Read More
                        </button>
                        <h5>Islamabad  <br> <span>$200</span></h5>
                    </div>
                </div>
                <div class="card">
                    <h4>United State</h4>
                    <img src="images/us.jpg" alt="Pakistan">
                    <div class="detail">
                        <button>
                            Read More
                        </button>
                        <h5>United State  <br> <span>$900</span></h5>
                    </div>
                </div>
                <div class="card">
                    <h4>Egypt</h4>
                    <img src="images/egypt.jpg" alt="Pakistan">
                    <div class="detail">
                        <button>
                            Read More
                        </button>
                        <h5>Egypt  <br> <span>$400</span></h5>
                    </div>
                </div>
                <div class="card">
                    <h4>Dubai</h4>
                    <img src="images/dubai.webp" alt="Pakistan">
                    <div class="detail">
                        <button>
                            Read More
                        </button>
                        <h5>Dubai  <br> <span>$500</span></h5>
                    </div>
                </div>               
            </div>
        </div>
    </div>
    
    
   
    <section class="packages-section">
        <div class="section-title text-center">
            <h2>Best tour Package offers for You</h2>
            <p>choose your next destination</p>
        </div>
        <div class="packages-grid">
            <div class="package-card">
                <div class="badge green">Lotus-Delhi</div>
                <div class="img-container">
                    <img src="images/Delhi.avif" alt="Delhi">
                    <div class="img-overlay">Included: Air ticket, Hotel, Breakfast, Tours, Airport Transfer</div>
                </div>
                <div class="package-details">
                    <div class="stats">
                        <span><i class="fas fa-heart text-red"></i> 86415</span>
                        <span><i class="fas fa-comment text-blue"></i> 4586</span>
                    </div>
                    <div class="package-bottom">
                        <div class="price-info">
                            <a href="#" class="more-info">More Info</a>
                            <span class="price">$2648</span>
                        </div>
                        <div class="duration-circle">5 Days<br>India</div>
                    </div>
                </div>
            </div>
            <div class="package-card">
                <div class="badge green">Burj Khalifa-DXB</div>
                <div class="img-container">
                    <img src="images/Burj Khalifa.avif" alt="Dubai">
                    <div class="img-overlay">Included: Air ticket, Hotel, Breakfast, Tours, Airport Transfer</div>
                </div>
                <div class="package-details">
                    <div class="stats">
                        <span><i class="fas fa-heart text-red"></i> 86415</span>
                        <span><i class="fas fa-comment text-blue"></i> 4586</span>
                    </div>
                    <div class="package-bottom">
                        <div class="price-info">
                            <a href="#" class="more-info">More Info</a>
                            <span class="price">$2648</span>
                        </div>
                        <div class="duration-circle">5 Days<br>Dubai</div>
                    </div>
                </div>
            </div>
            <div class="package-card">
                <div class="badge green">Pyramids-Egypt</div>
                <div class="img-container">
                    <img src="images/egypt.jpg" alt="Egypt">
                    <div class="img-overlay">Included: Air ticket, Hotel, Breakfast, Tours, Airport Transfer</div>
                </div>
                <div class="package-details">
                    <div class="stats">
                        <span><i class="fas fa-heart text-red"></i> 86415</span>
                        <span><i class="fas fa-comment text-blue"></i> 4586</span>
                    </div>
                    <div class="package-bottom">
                        <div class="price-info">
                            <a href="#" class="more-info">More Info</a>
                            <span class="price">$2648</span>
                        </div>
                        <div class="duration-circle">7 Days<br>Egypt</div>
                    </div>
                </div>
            </div>
            <div class="package-card">
                <div class="badge green">Mountain-Vietnam</div>
                <div class="img-container">
                    <img src="images/vietnam.avif" alt="Vietnam">
                    <div class="img-overlay">Included: Air ticket, Hotel, Breakfast, Tours, Airport Transfer</div>
                </div>
                <div class="package-details">
                    <div class="stats">
                        <span><i class="fas fa-heart text-red"></i> 86415</span>
                        <span><i class="fas fa-comment text-blue"></i> 4586</span>
                    </div>
                    <div class="package-bottom">
                        <div class="price-info">
                            <a href="#" class="more-info">More Info</a>
                            <span class="price">$2648</span>
                        </div>
                        <div class="duration-circle">7 Days<br>Vietnam</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-destination">
        <div class="dest-content">
            <h2>Our Destination</h2>
            <p class="subtitle">choose your next Destination</p>
            <ul class="country-list">
                <li>India</li>
                <li>Dubai</li>
                <li>USA</li>
                <li>Vietnam</li>
                <li>Russia</li>
                <li>Brazil</li>
            </ul>
            <p class="included-text">Included: Air ticket, Hotel, Breakfast, <br> Tours, Airport transfer</p>
            <a href="#" class="btn btn-black">MORE INFO</a>
        </div>
        <div class="dest-image">
            <img src="images/info.avif" alt="Airplane">
            
            <div class="tooltip tooltip-pak">
                <img src="images/pak.png" alt="Pakistan"> Pakistan
                <div class="tooltip-stats">
                    <span><i class="fas fa-heart text-red"></i> 86415</span>
                    <span><i class="fas fa-comment text-blue"></i> 4586</span>
                </div>
            </div>
            <div class="tooltip tooltip-usa">
                <img src="images/us.png" alt="USA"> United State
                <div class="tooltip-stats">
                    <span><i class="fas fa-heart text-red"></i> 86415</span>
                    <span><i class="fas fa-comment text-blue"></i> 4586</span>
                </div>
            </div>
        </div>
    </section>

<?php include("footer.php") ?>