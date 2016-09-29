<?php

function setupTable() {

    try {
        $user = 'CS1133611';
        $password = 'alverion';
        $dataSourceName = 'mysql:host=waldo2.dawsoncollege.qc.ca;dbname=cs1133611';
        $pdo = new PDO($dataSourceName, $user, $password);


        $sql = 'DROP TABLE FoodGawker';
        $pdo->exec($sql);
        echo 'Table Dropped';


        $sql = 'CREATE TABLE FoodGawker(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(20),
            description VARCHAR(20),
            username VARCHAR(20),
            faved INT, 
            gawked INT)';

        $pdo->exec($sql);

        echo 'Table Created';
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        unset($pdo);
    }
}

function addEntry($title, $description, $username, $faved, $gawked) {
    try {
        $user = 'CS1133611';
        $password = 'alverion';
        $dataSourceName = 'mysql:host=waldo2.dawsoncollege.qc.ca;dbname=cs1133611';
        $pdo = new PDO($dataSourceName, $user, $password);


        $sql = "INSERT INTO FoodGawker (title, description, username, faved, gawked) VALUES($title, $description, $username, $faved, $gawked)";

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec($sql);
        
        
        echo "Entry created";
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        unset($pdo);
    }
}
