<?php
require "vendor/autoload.php";

$loop = React\EventLoop\Factory::create();

$server = new React\Http\Server($loop, function (Psr\Http\Message\ServerRequestInterface $request) {
    return new React\Http\Message\Response(
        200,
        array('Content-Type' => 'text/plain'),
        "Hello World!\n"
    );
});

$socket = new React\Socket\Server('0.0.0.0:8080', $loop);

$server->listen($socket);

echo "Server running at http://0.0.0.0:8080\n";

$loop->run();