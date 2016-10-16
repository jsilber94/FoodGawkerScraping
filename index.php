<?php
// Button Logic
if($_GET){
    if(isset($_GET['index'])){
        header('Location: index.php');
        exit;
    }elseif(isset($_GET['top'])){
        header('Location: index.php');
        exit;
    }
    elseif(isset($_GET['gawker'])){
        header('Location: http://foodgawker.com/');
        exit;
    }
}

// Display main header
include_once 'main_header.php';

// Display top gawkers as default
if(isset($_GET['search']) || isset($_GET['lookup'])){
  include_once 'search_entries.php';
}else{
  include_once 'top_entries.php';
}

// Close html with footer
include_once 'main_footer.php';
