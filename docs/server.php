<?php
    $request = json_decode($_REQUEST['request'], true);
    if ($request['op']=="action") {
        $ok = TRUE;
        foreach ($request['args'] as $key => $value) {
            $ok = $ok && preg_match("/^(-?[0-9]+([.][0-9]+)?)$/",$value);
            if ($ok) {
                //something happens
            }
        }

        if ($ok) {
            $response = array('status' => 'ok', 'value' =>  $sum );
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