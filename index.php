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


echo '<div id="header">';
echo 'Gawks N\' Scrapes';
echo '</div>';

echo '<div id="nav">';
echo '<button type="button">Top Gawks</button>';
echo '<button type="button">Search</button>';
echo '</div>';

echo '<div id="scrapes">';
    foreach ($scrapes as $scrape) {
        $scrape->toHTML();
    }
echo '</div>';



echo '  </body>
        </html>';
?>