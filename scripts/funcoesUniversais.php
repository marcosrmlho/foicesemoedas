<?php
function getQueryParameters() {
    $queriesString = explode("&", $_SERVER['QUERY_STRING']);
    $queryResults = [];
    foreach ($queriesString as $query) {
        $query = trim($query);
        $queryResult = explode('=', $query);

        if ($queryResult != NULL && array_key_exists("0",$queryResult) && $queryResult[0] != NULL && array_key_exists("1",$queryResult) && $queryResult[1] != NULL){
            $queryResults[$queryResult[0]] = $queryResult[1];
        }
    }
    return $queryResults;
}

$queryParameters = getQueryParameters();

?>