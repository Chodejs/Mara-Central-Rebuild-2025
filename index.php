<?php
    // Include the header partial, which contains the top of the HTML and the navigation
    include('partials/header.php');

    // Define the directory where our page content is stored
    $pages_dir = 'pages';

    // A simple router to determine which page to display
    if (!empty($_GET['p'])) {
        $pages = scandir($pages_dir, 0);
        unset($pages[0], $pages[1]); // remove . and .. from the directory scan

        $p = $_GET['p'];

        // Check if the requested page exists, and if so, include it
        if (in_array($p . '.php', $pages)) {
            include($pages_dir . '/' . $p . '.php');
        } else {
            // If the page doesn't exist, show a simple 404 error message
            echo '<main class="flex-grow"><div class="container mx-auto px-6 py-20 text-center"><h1 class="text-4xl font-bold">404 - Page Not Found</h1><p class="text-gray-400 mt-4">Sorry, the page you are looking for does not exist.</p></div></main>';
        }
    } else {
        // If no page is specified in the URL, default to the home page
        include($pages_dir . '/home.php');
    }

    // Include the footer partial, which contains the bottom of the HTML
    include('partials/footer.php');
?>
