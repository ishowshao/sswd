<?php
/**
 * @author ishowshao
 */
if (isset($_SERVER['HTTP_USER_AGENT']) && strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 6)) === 'github') {
    $json = file_get_contents('php://input');
    $jsonObj = json_decode($json, true);
    file_put_contents('hook.json', print_r($jsonObj, true));
    file_put_contents('hook.json', print_r($_SERVER, true), FILE_APPEND);
}