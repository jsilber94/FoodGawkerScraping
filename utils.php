<?php
include 'scrape.php';

function setupTable() {
    try {
        $user = 'CS1133611';
        $password = 'alverion';
        $dataSourceName = 'mysql:host=waldo2.dawsoncollege.qc.ca;dbname=cs1133611';
        $pdo = new PDO($dataSourceName, $user, $password);

        $sql = 'DROP TABLE FoodGawker';
        $pdo->exec($sql);

        $sql = 'CREATE TABLE FoodGawker(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title TEXT,
            link TEXT,
            description TEXT,
            username TEXT,
            faved INT, 
            gawked INT)';

        $pdo->exec($sql);

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        unset($pdo);
    }
}

function addEntry($title1, $link1, $description1, $username1, $faved1, $gawked1) {
    try {
        $user = 'CS1133611';
        $password = 'alverion';
        $dataSourceName = 'mysql:host=waldo2.dawsoncollege.qc.ca;dbname=cs1133611';
        $pdo = new PDO($dataSourceName, $user, $password);

        $title1 = "'" . "$title1" . "'";
        $link1 = "'" . "$link1" . "'";
        $description1 = str_replace("'", "’", $description1);
        $description1 = "'" . "$description1" . "'";

        $username1 = "'" . "$username1" . "'";
        $faved1 = "'" . "$faved1" . "'";
        $gawked1 = "'" . "$gawked1" . "'";

        $sql = "INSERT INTO FoodGawker (title,link, description, username, faved, gawked) VALUES($title1 ,$link1 , $description1, $username1, $faved1, $gawked1)";

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec($sql);

        echo "Entry created";
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        unset($pdo);
    }
}

function getEntries(){
    $scrapes = [];
    
    try {
        $db_name = 'CS1133611';
        $db_pword = 'alverion';
        $src = 'mysql:host=waldo2.dawsoncollege.qc.ca;dbname=cs1133611';
        $pdo = new PDO($src, $db_name, $db_pword);

        $stmt = $pdo->prepare('SELECT * FROM FoodGawker;');
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Scrape');

        if($stmt->execute()){
            while($row = $stmt->fetch()){
                $scrapes[] = $row;
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        unset($pdo);
    }

    return $scrapes;
}
?>