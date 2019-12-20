<?php
require __DIR__ . '/../vendor/autoload.php';

$commands = [
    'KeyQ' => 'СТОП',
    'KeyW' => 'Повтори',
    'KeyE' => 'Да',
    'KeyR' => 'Нет',
    'KeyT' => 'АКР',
    'KeyY' => 'Вопрос'
];

$options = [
    'cluster' => 'eu',
    'useTLS'  => true
];
$pusher  = new Pusher\Pusher(
    'e11427fbe1304bcdb59a',
    '3fdd69abde0541675d0d',
    '921087',
    $options
);

$data = [
    'data'    => (new DateTime())->format('H:i:s'),
    'command' => $commands[$_GET['key']]
];
$pusher->trigger('my-channel', 'my-event', $data);

echo 'sended';
