<?php

$ws = new Swoole\WebSocket\Server('0.0.0.0', 8889);
$ws->on('open', function ($ws, $request) {
    $ws->push($request->fd, "welcome \n");
});

$ws->on('message', function ($ws, $request) {
    echo "Message: $request->data";
    $ws->push($request->fd,$request->data ."?");
});

$ws->on('close', function ($ws, $request) {
    echo "close\n";
});
$ws->start();