<?php

function load_full_names($fileName)
{
    $lineNumber = 0;

    $FH = fopen("$fileName", "r");

    $nextName = fgets($FH);

    while (!feof($FH)) {
        if ($lineNumber % 2 == 0) {
            $fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));
        }

        $lineNumber++;

        $nextName = fgets($FH);
    }
    return $fullNames;
}

function load_first_names($fullNames)
{
    foreach ($fullNames as $fullName) {
        $startHere = strpos($fullName, ",") + 1;
        $firstNames[] = trim(substr($fullName, $startHere));
    }
    return $firstNames;
}

function load_last_names($fullNames) {
    foreach($fullNames as $fullName) {
        $stopHere = strpos($fullName, ",");
        $lastNames[] = substr($fullName, 0, $stopHere);
    }
    return $lastNames;    
}

function most_common_last_names($fullNames, $topN = 10) {
    $lastNames = load_last_names($fullNames);
    $lastNameCount = array_count_values($lastNames);
    arsort($lastNameCount);
    return array_slice($lastNameCount, 0, $topN, true);
} 

function most_common_first_names($fullNames, $topN = 10) {
    $firstNames = load_first_names($fullNames);
    $firstNameCount = array_count_values($firstNames);
    arsort($firstNameCount);
    return array_slice($firstNameCount, 0, $topN, true);
}

