<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';

$fileName = 'testnames.txt';
$fullNames = load_full_names($fileName);

$firstNames = load_first_names($fullNames);

$lastNames = load_last_names($fullNames);

$mostCommonLast = most_common_last_names($fullNames);

$mostCommonFirst = most_common_first_names($fullNames);

for($i = 0; $i < sizeof($fullNames); $i++) {

    if(ctype_alpha($lastNames[$i].$firstNames[$i])) {
        $validFirstNames[$i] = $firstNames[$i];
        $validLastNames[$i] = $lastNames[$i];
        $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
}

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';
    foreach($fullNames as $fullName) {
        echo "<li>$fullName</li>";
    }
echo "</ul>";

echo '<h2>AllFirst Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " first names</p>";
echo '<ul style="list-style-type:none">';
    foreach($validFirstNames as $validFirstNames) {
        echo "<li>$validFirstNames</li>";
    }
echo "</ul>";

echo '<h2>Last Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " last names</p>";
echo '<ul style="list-style-type:none">';
    foreach($validLastNames as $validLastNames) {
        echo "<li>$validLastNames</li>";
    }
echo "</ul>";

echo '<h2>Most Common Last Names</h2>';
echo "<p>The most common last names are:";
echo '<ul style="list-style-type:none">';
foreach ($mostCommonLast as $lastNames => $count) {
    
    echo "<li>" . $lastNames . ": " . $count . " occurrences</li>";
}
echo "</ul>";

echo '<h2>Most Common First Names</h2>';
echo "<p>The most common first names are:";
echo '<ul style="list-style-type:none">';
foreach ($mostCommonFirst as $firstNames => $count) {
    
    echo "<li>" . $firstNames . ": " . $count . " occurrences</li>";
}
echo "</ul>";

?>