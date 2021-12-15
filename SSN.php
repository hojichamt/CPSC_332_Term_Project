<html>
<body>

<?php

include "Connect.php";

$keywordfromform_Prof_SSN= $_POST["SSN"];
echo "Searching For SSN: ". $keywordfromform_Prof_SSN;
 
//Search database for Professor

$sql = "SELECT Section.Prof_SSN, Professor_Interface.Prof_Name, Professor_Interface.Title, 
Section.Classroom, Section.Meeting_Days, Section.Beginning_Time, Section.Ending_Time 
FROM Section 
INNER JOIN Professor_Interface 
ON Section.Prof_SSN = Professor_Interface.Prof_SSN 
WHERE Section.Prof_SSN LIKE '%".$keywordfromform_Prof_SSN."%' ";

$result = $mysqli->query($sql);

if ($keywordfromform_Prof_SSN == NULL) {

	echo "<h2> Please Enter an SSN</h2>";

	} else if ($result->num_rows > 0) {
	
		echo "<h2> Showing Professor Information </h2>";
		// output data of each row
		echo "<table border='1'>
			<tr>
			<th>SSN</th>
			<th>Title</th>
			<th>Name</th>
			<th>Classroom</th>
			<th>Meeting Days</th>
			<th>Beginning Time</th>
			<th>Ending Time</th>
			</tr>";

		while($row = $result->fetch_assoc()) {

			echo "<tr>";
			echo "<td>" . $row['Prof_SSN'] . "</td>";
			echo "<td>" . $row['Title'] . "</td>";
			echo "<td>" . $row['Prof_Name'] . "</td>";
			echo "<td>" . $row['Classroom'] . "</td>";
			echo "<td>" . $row['Meeting_Days'] . "</td>";
			echo "<td>" . $row['Beginning_Time'] . "</td>";
			echo "<td>" . $row['Ending_Time'] . "</td>";
			echo "</tr>";

		}
  
}
 
else {
	
	echo "<h2>Cannot find SSN </h2>";
  
}

?>

</body>
</html>