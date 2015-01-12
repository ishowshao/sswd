<?php
/**
 * @author ishowshao
 */
$json = file_get_contents('php://input');
$jsonObj = json_decode($json, true);
file_put_contents('hook.json', print_r($jsonObj, true), FILE_APPEND);
