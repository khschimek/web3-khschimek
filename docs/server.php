<?php
    require_once('connect.php');
    $request = json_decode($_REQUEST['request'], true);
    $stmt = $pdo->query("SELECT * FROM new_table");
    $array = array();
    while ($list = $stmt->fetch()) {
        array_push($array,$list['walked']);
    }

    if ($request['op']=="update") {
        $action = (-1.0)*$array[$request['day']-1];
        $data = ['walked'=>$action, 'id'=>$request['day']];
        $update = "UPDATE new_table SET walked=:walked Where id=:id";
        $pdo->prepare($update)->execute($data);
        $response = array('status' => 'ok', 'op' => 'update', 'day' =>  $request['day'], 'value' => $action);
    }

    else if ($request['op']=="talk") {
        $response = array('status' => 'ok',  'op' => 'talk', 'sunValue' =>  $array[0], 'monValue' =>  $array[1], 'tuesValue' =>  $array[2], 'wednesValue' =>  $array[3], 'thursValue' =>  $array[4], 'friValue' =>  $array[5], 'saturValue' =>  $array[6]);
    }

    else {
        $response = array('status' => 'fail', 'message' => 'unknown op');
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
?>