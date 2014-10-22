<?php
$q = Strval($_GET['q']);

 

   
   $db = pg_connect("host=ec2-54-197-241-96.compute-1.amazonaws.com  dbname=dsid2tcjtl6nq    user=ntgkjqbatkjsbv   password=SnqBM0mgxMKwzuNbuhZKdADzUl") or die("Could not connect:".pg_last_error());
   if(!$db){
      echo "Error : Unable to open database\n";
   } 
   
$sql = "SELECT skills, job_role from career where job_type = '".$q."'";
$result = pg_query($db, $sql);
if(!$result){
      echo pg_last_error($db);
      exit;
}
echo "<p><h3>Job Type : ".$q." </h3></p>"."<br>";	
        
		echo "<table border='0'  class='table table-hover' class='table table-condensed'>
		<tr class='info' >
		<th class='text-center'>Job Role</th>    
		<th class='text-center'>Skills</th>   		 
	    </tr>\n";
		

		while($row = pg_fetch_row($result)){
		echo "\t<tr class='active'>\n";
		echo "<td>" . $row[0] . "</td>";
		echo "<td>" . $row[1] . "</td>";
		echo "\t</tr>\n";
	    }
		echo "</table>\n";
    

 pg_close($db);
?>