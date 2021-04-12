<?php

// createUrl();

$data = file_get_contents("php://input");

$fp = fopen('api_values.txt', 'a');
fwrite($fp, $data);
fclose($fp);

$data = json_decode($data, true);

$action = '';

if(isset($data['action']))
    $action = $data['action'];
else
    $action = $_GET['action'];

switch ($action) {
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
        delete($data['data']);
        break;
    
    default:
        header("HTTP/1.1 500 Internal Server Error", true, 500);
        break;
}

// function createUrl() {
//     $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

//     foreach($dbh->query('SELECT * FROM billboards') as $row) {
        
//         $url = 'https://yandex.by/maps/157/minsk/geo/2171251432/?l=stv%2Csta&ll=27.677485%2C53.942090&panorama%5Bdirection%5D=196.068888%2C1.000000&panorama%5Bfull%5D=true&panorama%5Bpoint%5D=27.675213%2C53.936054&panorama%5Bspan%5D=118.736777%2C60.000000&tab=panorama&z=13.74';

//         $params = array();
//         $url = parse_url($url);
//         parse_str($url['query'], $params);
        
//         preg_match_all('/[\d.]+/', $row['markCoords'], $matches);
//         $params['panorama']['point'] = $matches[0][1].','.$matches[0][0];
//         preg_match_all('/[\d.]+/', $row['markDirection'], $matches);
//         $params['panorama']['direction'] = $matches[0][0].','.$matches[0][1];
//         preg_match_all('/[\d.]+/', $row['markSpan'], $matches);
//         $params['panorama']['span'] = $matches[0][0].','.$matches[0][1];

//         $new_url = 'https://yandex.by/maps/157/minsk/geo/2171251432/?'.http_build_query($params);
        
//         update($row['id'],$row['title'],$new_url);
//     }
    
// }

function getAll() {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

        $billboards;
        $i = 0;

        foreach($dbh->query('SELECT id, title, markCoords, markDirection, markSpan from billboards') as $row) {
            $billboards[$i]['id'] = $row['id'];
            $billboards[$i]['title'] = $row['title'];

            $matches = array();
            preg_match_all('/[\d.]+/', $row['markCoords'], $matches);
            $billboards[$i]['markCoords'] = $matches[0];

            preg_match_all('/[\d.]+/', $row['markDirection'], $matches);
            $billboards[$i]['markDirection'] = $matches[0];
    
            preg_match_all('/[\d.]+/', $row['markSpan'], $matches);
            $billboards[$i]['markSpan'] = $matches[0];

            $i++;
        }

        print json_encode($billboards, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

        $dbh = null;

    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error", true, 500);
        return true;
    }

    return true;
}

function getById($id) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

        $sql = 'SELECT * from billboards WHERE id = :id';

        $result = $dbh->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        if($result->rowCount() <= 0) {
            header("HTTP/1.1 500 Internal Server Error", true, 500);
            return false;
        }

        $row = $result->fetch();

        $billboard = array();
        $billboard['id'] = $row['id'];
        $billboard['title'] = $row['title'];
        $billboard['url'] = $row['url'];

        $matches = array();
        preg_match_all('/[\d.]+/', $row['markCoords'], $matches);
        $billboard['markCoords'] = $matches[0];

        preg_match_all('/[\d.]+/', $row['markDirection'], $matches);
        $billboard['markDirection'] = $matches[0];

        preg_match_all('/[\d.]+/', $row['markSpan'], $matches);
        $billboard['markSpan'] = $matches[0];

        print json_encode($billboard, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

        $dbh = null;

    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error", true, 500);
        return true;
    }

    return true;
}

function getDataFromUrl($url) {
    $url_params = array();
    parse_str($url, $url_params);

    $url_params['panorama']['point'] = explode(',', $url_params['panorama']['point']);

    $result = array();
    $result['coords'] = '['.$url_params['panorama']['point'][1].','.$url_params['panorama']['point'][0].']';
    $result['direction'] = '['.$url_params['panorama']['direction'].']';
    $result['span'] = '['.$url_params['panorama']['span'].']';

    return $result;
}

function insert($title, $url) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

        $sql = 'INSERT INTO billboards VALUES (default, :title, :url, :coords, :direction, :span)';

        $data = getDataFromUrl($url);

        $result = $dbh->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':coords', $data['coords'], PDO::PARAM_STR);
        $result->bindParam(':direction', $data['direction'], PDO::PARAM_STR);
        $result->bindParam(':span', $data['span'], PDO::PARAM_STR);
        $result->execute();

        $dbh = null;

    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error", true, 500);
        return true;
    }

    return true;
}

function update($id, $title, $url) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

        $sql = 'UPDATE billboards SET title = :title, url = :url, markCoords = :coords, markDirection = :direction, markSpan = :span WHERE id = :id';

        $data = getDataFromUrl($url);

        $result = $dbh->prepare($sql);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':url', $url, PDO::PARAM_STR);
        $result->bindParam(':coords', $data['coords'], PDO::PARAM_STR);
        $result->bindParam(':direction', $data['direction'], PDO::PARAM_STR);
        $result->bindParam(':span', $data['span'], PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $dbh = null;

    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error", true, 500);
        return true;
    }

    return true;
}

function delete($id) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=artasurb_db', 'artasurb_db_user', 'db_pass');

        $sql = 'DELETE FROM billboards WHERE id = :id';
        
        $result = $dbh->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        $dbh = null;

    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error", true, 500);
        return true;
    }

    return true;
}

die();