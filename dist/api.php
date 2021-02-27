<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

    $billboards = array();
    $i = 0;

    foreach($dbh->query('SELECT * from billboards') as $row) {
        $billboards[$i]['id'] = $row['id'];
        $billboards[$i]['title'] = $row['title'];
        $billboards[$i]['markCoords'] = $row['markCoords'];
        
        $i++;
    }
    
    echo json_encode($billboards);
    
    $i = 
    $billboards = 
    $dbh = null;

} catch (PDOException $e) {
    echo json_encode($e);
    die();
}