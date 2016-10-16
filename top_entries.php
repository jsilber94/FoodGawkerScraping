<?php
include 'utils.php';
$scrapes = getTopEntries();

echo '<div id="scrapes">';
    foreach ($scrapes as $scrape) {
        $scrape->toHTML();
    }
echo '</div>';
