<?php
require_once "./WebSocketServer.php";
require_once "./Config.php";
require_once "./config/socket.php";

$server = new App\WebSocket\WebSocketServer();

$server->run();
