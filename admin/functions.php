<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['updatetime']) {
        $newtime = time();

        $insert = $db->query('UPDATE settings SET value = ? WHERE name = ?', $newtime, 'statisticsstart');
    }
}

$row = $db->query('SELECT value FROM settings WHERE name = ?', 'statisticsstart')->fetchArray();
$currentDate = $row['value'];

$statistics = $db->query('SELECT ip,clientname FROM statistics WHERE datetime > ?', $currentDate)->fetchAll();
$uniqueStatistics = $db->query('SELECT ip FROM statistics WHERE datetime > ? GROUP BY ip',
    $currentDate)
    ->fetchAll();

$start_of_day = time() - 86400 + (time() % 86400);
$end_of_day = $start_of_day + 86400;

// get actives by day
$rows = $db->query('SELECT ip, COUNT(ip) AS count FROM statistics WHERE datetime > ? AND datetime < ? GROUP BY ip ORDER BY count DESC LIMIT 1', $start_of_day, $end_of_day)->fetchArray();
$velueIp = $rows['ip'];
$client = $db->query('SELECT * FROM statistics WHERE ip = ?' , $velueIp )->fetchArray();

// //get actives by currentDate in db
$forDateActive = $db->query('SELECT ip, COUNT(ip) AS count FROM statistics WHERE datetime > ? GROUP BY ip ORDER BY count DESC LIMIT 1 ' , $currentDate )->fetchArray();
$velueForDateIp = $forDateActive['ip'];
$clientForDate = $db->query('SELECT * FROM statistics WHERE ip = ?' , $velueForDateIp )->fetchArray();


$activeUserForDBDate = count($clientForDate);
$activeUser = count($client);
$numberOfVisit = count($statistics);
$numberOfUniqueVisit = count($uniqueStatistics);