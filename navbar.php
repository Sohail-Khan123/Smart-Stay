

<header>
    <h3>Smart stay</h3>
    <ul>
        <li><a href="index.php">Discover</a></li>
        <li><a href="#">Community</a></li>
        <li><a href="#">Special Deals</a></li>
        <li><a href="#">About Us</a></li>
        <?php if(isset($_SESSION["u_id"])){?>
            <li>Hello <?php echo $_SESSION["u_id"] ?></li>
            <li><a href="logout.php">Logout</a></li>
        <?php } else{?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php }
        ?>
    </ul>
</header>

