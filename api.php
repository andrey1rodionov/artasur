<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

    $billboards = array();
    $i = 0;

    foreach($dbh->query('SELECT * from billboards') as $row) {
        $billboards[$i]['id'] = $row['id'];
        $billboards[$i]['title'] = $row['title'];
        preg_match_all('/[\d.]+/', $row['markCoords'], $billboards[$i]['markCoords']);

        $i++;
    }

    print json_encode($billboards, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

    $dbh = null;

} catch (PDOException $e) {
    print json_encode($e);
    die();
}