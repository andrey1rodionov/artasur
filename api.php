<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

    $billboards;
    $i = 0;

    foreach($dbh->query('SELECT * from billboards') as $row) {
        $billboards[$i]['id'] = $row['id'];
        $billboards[$i]['title'] = $row['title'];

        $matches = array();
        preg_match_all('/[\d.]+/', $row['markCoords'], $matches);
        $billboards[$i]['markCoords'] = $matches[0];

        // preg_match_all('/[\d.]+/', $row['markDirection'], $matches);
        $billboards[$i]['markDirection'] = $matches[0];

        // preg_match_all('/[\d.]+/', $row['markSpan'], $matches);
        $billboards[$i]['markSpan'] = array(0,0);

        $i++;
    }

    print json_encode($billboards, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

    $dbh = null;

} catch (PDOException $e) {
    print json_encode($e);
    die();
}