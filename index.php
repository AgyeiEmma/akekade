

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>African Diaspora Foods - Authentic Flavors Delivered</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Welcome to African Diaspora Foods</h1>
        <p>Discover authentic African ingredients and products delivered to your doorstep.</p>
        
        <section id="featured-products">
            <h2>Featured Products</h2>
            <!-- Add featured products here -->
        </section>

        <section id="about-us">
            <h2>About Us</h2>
            <p>We specialize in bringing the flavors of Africa to communities abroad and food enthusiasts globally.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 African Diaspora Foods. All rights reserved.</p>
    </footer>

    <script src="js/main.js"></script>
</body>
</html>