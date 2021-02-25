<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

    $billboards = array();
    $i = 0;

    foreach($dbh->query('SELECT * from billsboards') as $row) {
        $billboards[$i]['id'] = $row['id'];
        $billboards[$i]['title'] = $row['title'];
        $billboards[$i]['markCoords'] = $row['markCoords'];
        
        $i++;
    }
    
    print json_encode($billboards);
    
    $dbh = null;

} catch (PDOException $e) {
    print json_encode($e);
    die();
}