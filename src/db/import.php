<?php
/**
 * TODO
 *  Open web/airports.php file
 *  Go through all airports in a loop and INSERT airports/cities/states to equivalent DB tables
 *  (make sure, that you do not INSERT the same values to the cities and states i.e. name should be unique i.e. before INSERTing check if record exists)
 */

/** @var \PDO $pdo */
require_once './pdo_ini.php';
//$db = parse_ini_file("src/db/pdo_ini.php");


foreach (require_once('../web/airports.php') as $item) {
    // Cities
    // To check if city with this name exists in the DB we need to SELECT it first
    $sth = $pdo->prepare('SELECT id FROM cities WHERE name = :name');
    $sth->setFetchMode(\PDO::FETCH_ASSOC);
    $sth->execute(['name' => $item['city']]);
    $city = $sth->fetch();

    // If result is empty - we need to INSERT city
    if (!$city) {
        $sth = $pdo->prepare('INSERT INTO cities (name) VALUES (:name)');
        $sth->execute(['name' => $item['city']]);

        // We will use this variable to INSERT airport
        $cityId = $pdo->lastInsertId();
    } else {
        // We will use this variable to INSERT airport
        $cityId = $city['id'];
    }

    // TODO States
    // States
    // To check if city with this name exists in the DB we need to SELECT it first
    $sthStates = $pdo->prepare('SELECT id FROM states WHERE name = :name');
    $sthStates->setFetchMode(\PDO::FETCH_ASSOC);
    $sthStates->execute(['name' => $item['state']]);
    $state = $sthStates->fetch();

    // If result is empty - we need to INSERT city
    if (!$state) {
        $sthStates = $pdo->prepare('INSERT INTO states (name) VALUES (:name)');
        $sthStates->execute(['name' => $item['state']]);

        // We will use this variable to INSERT airport
        $stateId = $pdo->lastInsertId();
    } else {
        // We will use this variable to INSERT airport
        $stateId = $state['id'];
    }

    // TODO Airports
// States
    // To check if city with this name exists in the DB we need to SELECT it first
    $sthAiroports = $pdo->prepare('SELECT id FROM airports WHERE name = :name');
    $sthAiroports->setFetchMode(\PDO::FETCH_ASSOC);
    $sthAiroports->execute(['name' => $item['name']]);
    $airoports = $sthAiroports->fetch();

    // If result is empty - we need to INSERT city
    if (!$airoports) {
        $sthAiroports = $pdo->prepare(
            'INSERT INTO airports (name,state_id,city_id,code,address,timezone) VALUES (:name,:state_id,:city_id,:code,:address,:timezone)'
        );
        $answer = $sthAiroports->execute(
            [
                'name' => $item['name'],
                'state_id' => $stateId,
                'city_id' => $cityId,
                "code" => $item['code'],
                "address" => $item['address'],
                "timezone" => $item['timezone']
            ]
        );
        // We will use this variable to INSERT airport
        $sthAiroports = $pdo->lastInsertId();
    } else {
        // We will use this variable to INSERT airport
        $sthAiroports = $airoports['id'];
    }
}