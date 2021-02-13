<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param array $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports): array
{
    $leters = array();
    foreach ($airports as $i) {
        array_push($leters, substr($i['name'], 0, 1));
    }
    asort($leters);
    return array_unique($leters);
}

function SortbyKey($key): Closure
{
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };

}


function filterByState(array $airports, $state): array
{
    return array_values(array_filter($airports, function ($airports) use ($state) {
        return strtolower($airports['state']) == strtolower($state);
    }));
}

