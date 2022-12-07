<?php
    $request = json_decode($_REQUEST['request'], true);
    
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response);
?>