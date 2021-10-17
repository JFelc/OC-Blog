<?php
require 'vendor/autoload.php';
Sentry\init(['dsn' => 'https://b6356c6b09f748bea81123e66343b99f@o1003778.ingest.sentry.io/5964378' ]);
session_start();
\Sentry\captureLastError();
require_once "controller/controller.php";
if(isset($_SERVER["REDIRECT_URL"]) && isset($_SERVER["QUERY_STRING"]))
{
    new Controller($_SERVER["REDIRECT_URL"],$_SERVER["QUERY_STRING"]);
}
?>