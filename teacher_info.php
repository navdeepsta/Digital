<?php
$q = Strval($_GET['q']);



   $db = pg_connect("host=ec2-54-197-241-96.compute-1.amazonaws.com  dbname=dsid2tcjtl6nq    user=ntgkjqbatkjsbv   password=SnqBM0mgxMKwzuNbuhZKdADzUl") or die("Could not connect:".pg_last_error());
   if(!$db){
      echo "Error : Unable to open database\n";
    }
   
$sql="SELECT * FROM program_links WHERE type = '".$q."'"."order by rating desc";
$result = pg_query($db, $sql);

echo "<ul class='nav nav-tabs nav-stacked'>";
while($row = pg_fetch_row($result))
  {
    echo "<li>"."<a href='".$row[4]."'>". $row[0] ."</li>";
  }
echo "</ul>";
 pg_close($db);
?>