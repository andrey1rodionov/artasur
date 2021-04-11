<?php

$data = file_get_contents("php://input");

$fp = fopen('api_values.txt', 'a');
fwrite($fp, $data);
fclose($fp);

switch ($data['action']) {
    case 'all':
        getAll();
        break;

    case 'get':
        getById($data['data']);
        break;

    case 'insert':
        insert($data['data']['title'], $data['data']['url']);
        break;

    case 'update':
        update($data['data']['id'], $data['data']['title'], $data['data']['url']);
        break;

    case 'delete':
        delete($data['data']['id']);
        break;
    
    default:
        header("HTTP/1.1 500 Internal Server Error", true, 500);
        break;
}

function getAll() {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

        $billboards = array();
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
        header("HTTP/1.1 500 Internal Server Error", true, 500);
        return true;
    }

    header("HTTP/1.1 200 OK", true, 200);
    return true;
}

function getById($id) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

        $sql = 'SELECT * from billboards WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $billboard = array();
        $billboards['id'] = $row['id'];
        $billboards['title'] = $row['title'];

        $matches = array();
        preg_match_all('/[\d.]+/', $row['markCoords'], $matches);
        $billboards['markCoords'] = $matches[0];

        preg_match_all('/[\d.]+/', $row['markDirection'], $matches);
        $billboards['markDirection'] = $matches[0];

        preg_match_all('/[\d.]+/', $row['markSpan'], $matches);
        $billboards['markSpan'] = $matches[0];

        print json_encode($billboard, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

        $dbh = null;

    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error", true, 500);
        return true;
    }

    header("HTTP/1.1 200 OK", true, 200);
    return true;
}

die();