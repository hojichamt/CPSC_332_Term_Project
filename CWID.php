<html>
<body>

<?php

include "Connect.php";

$keywordfromform_Student_CWID= $_POST["CWID"];
echo "Searching For SSN: ". $keywordfromform_Student_CWID;

 
//Search database for Course and Section

$sql = "SELECT Section.Course_Num, Enrollment_Records.Grade, Enrollment_Records.Student_CWID
FROM Section
INNER JOIN Enrollment_Records 
ON Section.Section_Num = Enrollment_Records.Section_Num
WHERE Enrollment_Records.Student_CWID LIKE '%".$keywordfromform_Student_CWID."%' ";

$result = $mysqli->query($sql);

if ($keywordfromform_Student_CWID == NULL) {
  
	echo "<h2> Please enter a CWID </h2>";

	} else if ($result->num_rows > 0) {
	  
		echo "<h2> Showing Student Information </h2>";
		// output data of each row
		echo "<table border='1'>
			<tr>
			<th>CWID</th>
			<th>Course Title</th>
			<th>Grade</th>
			</tr>";

		while($row = $result->fetch_assoc()) {

			echo "<tr>";
			echo "<td>" . $row['Student_CWID'] . "</td>";
			echo "<td>" . $row['Course_Num'] . "</td>";
			echo "<td>" . $row['Grade'] . "</td>";
			echo "</tr>";

		}
		
} 
else {
	
  echo "<h2> Cannot Find CWID </h2>";
  
}
?>

</body>
</html>