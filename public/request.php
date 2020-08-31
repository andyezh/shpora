<?php
require __DIR__ . '/../vendor/autoload.php';

$commands = [
    'left'  => 'СТОП',
    'right' => 'Повтори',
    'up'    => 'Да',
    'down'  => 'Нет',
    'btny'  => 'АКР',
    'btna'  => 'Вопрос',
    'btnx'  => 'ALEX'
];

$options = [
    'cluster' => 'eu',
    'useTLS'  => true
];
$pusher = new Pusher\Pusher(
    'be230afd42b050798aff',
    '7a09f2737900a33401ca',
    '1064331',
    $options
  );

$data = [
    'data'    => (new DateTime())->format('H:i:s'),
    'command' => $commands[$_GET['key']] ?? 'unknown'
];
$pusher->trigger('my-channel', 'my-event', $data);

echo 'sended';
