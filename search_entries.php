<?php

echo '<div id="search">';
echo '<form method="GET" action="">';
echo '<input type="search" name="pattern">';
echo '<button class="search" type="submit" name="lookup" value="lookup">&#x1f50d;</button>';
echo '</form>';
echo '</div>';

echo '<div class="search" id="scrapes">';

if(isset($_GET['pattern']) && isset($_GET['lookup'])){
    $pattern = htmlentities($_GET['pattern']);

    include 'utils.php';
    $scrapes = getSearchEntries($pattern);

        foreach ($scrapes as $scrape) {
            $scrape->toHTML();
        }

}

echo '</div>';
