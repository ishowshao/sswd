<?php
/**
 * @author ishowshao
 */
file_put_contents('hook.json', print_r($_POST, true), FILE_APPEND);
file_put_contents('hook.json', print_r($_REQUEST, true), FILE_APPEND);
file_put_contents('hook.json', file_get_contents('php://input'), FILE_APPEND);
