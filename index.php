<?php
echo '  <!DOCTYPE html>
        <html>
            <head>
                <title>Food Scraper</title>
                <link rel="stylesheet" href="styles.css">
            </head>
        <body>';



include 'utils.php';

$scrapes = getEntries();

echo '<h1>Food Scraper</h1>';

echo '<div id="scrapes">';
    foreach ($scrapes as $scrape) {
        $scrape->toHTML();
    }
echo '</div>';



echo '  </body>
        </html>';
?>