<?php

/** @var PDO $pdo */
require_once './pdo_ini.php';

$query = "SELECT a.name, a.code, s.name AS 'state_name', c.name AS 'city_name',  a.address, a.timezone
FROM airports a
LEFT JOIN states s ON a.state_id = s.id
LEFT JOIN cities c ON a.city_id = c.id";

$uniqueFirstLetters = FirstLetters($pdo);
function FirstLetters($pdo)
{
    $sth = $pdo->prepare('SELECT DISTINCT LEFT(name, 1) AS letter FROM airports ORDER BY LEFT(name, 1)');
    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute();
    $items = $sth->fetchAll();
    foreach ($items as $item) {
        $letters[] = $item['letter'];
    }

    return $letters;

}

if (!empty($_GET['firstletter']) || !empty($_GET['filter_by_state'])) {
    $query .= ' WHERE ';
}

if (!empty($_GET['firstletter'])) {
    $query .= 'a.name LIKE ' . "'" . $_GET['firstletter'] . "%'";
}

if (isset($_GET['filter_by_state'])) {

    $query .= 's.name = ' . " '" . $_GET['filter_by_state'] . "'";
}

if (isset($_GET['sort'])) {
    $query .= " ORDER BY {$_GET['sort']}";
}

$sth = $pdo->prepare($query);
$sth->setFetchMode(PDO::FETCH_ASSOC);
$sth->execute();
$query = $sth->fetchAll();
$limit = 20;
$pages = ceil(count($query) / $limit);
$page = $_GET['page'] ?? 1;
$query = array_slice($query, ($page - 1) * $limit, $limit);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Airports</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">

    <h1 class="mt-5">US Airports</h1>

    <div class="alert alert-dark">
        Filter by first letter:

        <?php foreach ($uniqueFirstLetters as $letter): ?>
            <a href="<?= '/?' . http_build_query(array_merge($_GET, ['page' => 1, 'firstletter' => $letter])) ?>"><?= $letter ?></a>
        <?php endforeach; ?>

        <a href="/" class="float-right">Reset all filters</a>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col"><a href="?<?= http_build_query(array_merge($_GET, ['sort' => 'name'])) ?>">Name</a></th>
            <th scope="col"><a href="?<?= http_build_query(array_merge($_GET, ['sort' => 'code'])) ?>">code</a></th>
            <th scope="col"><a href="?<?= http_build_query(array_merge($_GET, ['sort' => 'state_name'])) ?>">State</a>
            </th>
            <th scope="col"><a href="?<?= http_build_query(array_merge($_GET, ['sort' => 'city_name'])) ?>">City</a>
            </th>
            <th scope="col"><a href="?<?= http_build_query(array_merge($_GET, ['sort' => 'address'])) ?>">Address</a>
            </th>
            <th scope="col">Timezone</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($query as $airport): ?>
            <tr>
                <td><?= $airport['name'] ?></td>
                <td><?= $airport['code'] ?></td>
                <td>
                    <a href="?<?= http_build_query(array_merge($_GET, ['page' => 1, 'filter_by_state' => $airport['state_name']])) ?>">
                        <?= $airport['state_name'] ?>
                    </a>
                </td>
                <td><?= $airport['city_name'] ?></td>
                <td><?= $airport['address'] ?></td>
                <td><?= $airport['timezone'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    <nav aria-label="Navigation">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $pages; $i++) : ?>
                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                    <a class="page-link"
                       href="/?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>


</main>
</html>
