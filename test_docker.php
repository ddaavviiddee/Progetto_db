<?php

$connect = mysqli_connect(
    'db', 
    'php_docker', 
    'password', 
    'php_docker' 
);

$table_name = "Test";

$query = "SELECT * FROM $table_name";

$response = mysqli_query($connect, $query);

echo "<strong>$table_name: </strong>";
while($i = mysqli_fetch_assoc($response))
{
    echo "<p>".$i['Nome']."</p>";
    echo "<p>".$i['Cognome']."</p>";
    echo "<p>".$i['ETA']."</p>";
    echo "<p>".$i['ID']."</p>";
    echo "<hr>";
}
?>


