<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');
require_once 'conexion.php';
function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['search']);
  $query = "SELECT * FROM bien WHERE codunicoinfor LIKE '%$search%' ";
  $res = $mysqli->query($query);
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    echo "<p><a>$row[codbieninv]</a></p>
    <p><a>$row[codunicoinfor]</a></p>
    <p><a>$row[codmarca]</a></p>
    <p><a>$row[codmodelo]</a></p>";
  }
}

search();