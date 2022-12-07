<?php
    $request = json_decode($_REQUEST['request'], true);
    if ($request['op']=="update") {
        $ok = TRUE;
        $action = -1.0;
        foreach ($request['args'] as $key => $value) {
            $ok = $ok && preg_match("/^(-?[0-9]+([.][0-9]+)?)$/",$value);
            if ($ok) {
                //something happens
            }
        }

        if ($ok) {
            $response = array('status' => 'ok', 'op' => 'update', 'day' =>  $request['day'], 'value' => $action);
        } 
        else {
            $response = array('status' => 'fail', 'message' => 'not all values are numbers');
        }
    }
    else if ($request['op']=="talk") {
        $ok = TRUE;
        $sunday = -1.0;
        $monday = -1.0;
        $tuesday = -1.0;
        $wednesday = -1.0;
        $thursday = -1.0;
        $friday = -1.0;
        $saturday = -1.0;
        foreach ($request['args'] as $key => $value) {
            $ok = $ok && preg_match("/^(-?[0-9]+([.][0-9]+)?)$/",$value);
            if ($ok) {
                //something happens
            }
        }

        if ($ok) {
            $response = array('status' => 'ok',  'op' => 'talk', 'sunValue' =>  $sunday, 'monValue' =>  $monday, 'tuesValue' =>  $tuesday, 'wednesValue' =>  $wednesday, 'thursValue' =>  $thursday, 'friValue' =>  $friday, 'saturValue' =>  $saturday);
        } 
        else {
            $response = array('status' => 'fail', 'message' => 'not all values are numbers');
        }
    }
    else {
        $response = array('status' => 'fail', 'message' => 'unknown op');
    }    
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
?>