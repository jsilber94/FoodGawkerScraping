<?php
class Scrape{
    public $title = "";
    public $link = "";
    public $description = "";
    public $username = "";
    public $faved = 0;
    public $gawked = 0;

    function __construct($in_title = "", $in_link = "", $in_description = "", $in_username = "", $in_faved = 0, $in_gawked = 0){
        $this->title = $in_title;
        $this->link = $in_link;
        $this->description = $in_description;
        $this->username = $in_username;
        $this->faved = $in_faved;
        $this->gawked = $in_gawked;
    }

    function addDBEntry(){
        try {
            $db_name = 'CS1133611';
            $db_pword = 'alverion';
            $src = 'mysql:host=waldo2.dawsoncollege.qc.ca;dbname=cs1133611';
            $pdo = new PDO($src, $db_name, $db_pword);

            $title = "'"."$this->title"."'";
            $link = "'"."$this->link"."'";

            $description = str_replace("'", "’", $this->description);
            $description = "'"."$description"."'";

            $username = "'"."$this->username"."'";
            $faved = "'"."$this->faved"."'";
            $gawked = "'"."$this->gawked"."'";

            $sql = "INSERT INTO FoodGawker (title,link, description, username, faved, gawked) VALUES(
                $title, 
                $link, 
                $description, 
                $username, 
                $faved, 
                $gawked)";

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec($sql);

            $this->echo();
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            unset($pdo);
        }
    }

    function echo(){
        echo 'Adding Entry:';
        echo '\r\n';
        echo $this->title;
        echo '\r\n';
        echo $this->link;
        echo '\r\n';
        echo $this->description;
        echo '\r\n';
        echo $this->username;
        echo '\r\n';
        echo $this->faved;
        echo '\r\n';
        echo $this->gawked;
        echo '\r\n';
        echo '\r\n';
    }

    function toHTML(){
        echo '<div class="scrape">';
        
            echo '<div class="scrape_header">';
                echo "<div class='left'><a href=$this->link>$this->title</a></div>";
                echo "<div class='right'>$this->username</div>";
            echo '</div>';

            echo "<div class='scrape_body'>$this->description</div>";
            
            echo '<div class="scrape_footer">';
                echo "<div class='left'>$this->faved</div>";
                echo "<div class='right'>$this->gawked</div>";
            echo '</div>';

        echo '</div>';
    }
}
?>