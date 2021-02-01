
<?php

$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'ugc';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	if(isset($_POST['subInfo'])) 
	{

		$uname = $_POST['uname'];
		$year = $_POST['year'];
		$EstablishY = $_POST['Eyear'];
		$Address = $_POST['address'];
		$phonNo = $_POST['phn'];
		$Fax = $_POST['fax'];
		$Email = $_POST['mail'];
		$Website = $_POST['site'];

		$land = $_POST['land'];
		$PSO = $_POST['PSO'];
		$PSR = $_POST['PSR'];
		$dorm = $_POST['dorm'];
		$noOfSch = $_POST['noOfSch'];
		$dep = $_POST['dep'];
		$course =$_POST['course'];
		$institute = $_POST['institute'];

		$Tstudent = $_POST['Tstudent'];
		//var_dump($Tstudent,$uname,$year)
		$Mstudent = $_POST['Mstudent'];
		$Fstudent = $_POST['Fstudent'];
		$Ugp = $_POST['Ugp'];
		$Ugs = $_POST['Ugs'];
		$Ugh = $_POST['Ugh'];
		$Gstud = $_POST['Gstud'];
		$Tfs = $_POST['Tfs'];
		$Ffs = $_POST['Ffs'];
		$Ps =$_POST['Ps'];

		$Tf = $_POST['Tf'];
		$Mf = $_POST['Mf'];
		$Ff = $_POST['Ff'];
		$Tfa = $_POST['Tfa'];
		$Tgp = $_POST['Tgp'];
		$professor = $_POST['professor'];
		$Assisp = $_POST['Assisp'];
		$Assop = $_POST['Assop'];
		$lecturer = $_POST['lecturer'];

		$officers= $_POST['officers'];
		$stuff = $_POST['stuff'];

		$Tb = $_POST['Tb'];
		$bookAcqu = $_POST['bookAcqu'];

		$R_J = $_POST['R_J'];
		$Rpc = $_POST['Rpc'];
		$PJf = $_POST['PJf'];
		$PJl = $_POST['PJl'];
		$PJp = $_POST['PJp'];
		$field = $_POST['field'];

		$TotalexOwn = $_POST['TotalexOwn'];
		$exResearch = $_POST['exResearch'];
		$exSalary = $_POST['exSalary'];
		$exScho = $_POST['exScho'];
		$exElec = $_POST['exElec'];
		$exinfrus = $_POST['exinfrus'];
		$exmedi = $_POST['exmedi'];
		$exOth = $_POST['exOth'];
		$extrans = $_POST['extrans'];

		$TincomeOwn = $_POST['TincomeOwn'];
		$TincomeFore = $_POST['TincomeFore'];
	if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		else{
		mysqli_select_db($mysqli, $db );
		$sql1 =   "INSERT INTO universityinfo (university_name, year, established_year, address, phon_no, fax, email, web_address) VALUES('$uname','$year','$EstablishY','$Address','$phonNo','$Fax','$Email','$Website')";

		$sql2 =   "INSERT INTO university_phycial_info (university_name, year, land, Physical_Stracture_owned, Physical_Stracture_rented, Dormatory, No_Of_school, Department, Course ,Institute) VALUES('$uname','$year','$land','$PSO','$PSR','$dorm','$noOfSch','$dep','course','institute')";

		$sql3 =   "INSERT INTO student (university_name, year, total_student, male_student, female_student, undergraduate_pass, undergraduate_studying, undergraduate_hons, graduate ,total_foreign_student,Freefom_Fighter_Student, Proverty_Student) VALUES ('$uname','$year','$Tstudent','$Mstudent','$Fstudent','$Ugp','$Ugs','$Ugh','$Gstud','$Tfs','$Ffs','$Ps')";
		if(!$sql3) {
    echo mysql_error();
}

		$sql4 =   "INSERT INTO faculty (university_name, year, Total_Faculty, Male_Faculty, Female_Faculty, Total_Faculty_Adjunct, Total_Faculty_grad_Phd, Professor, Assistant_Professor, Associate_Professor, lecturer) VALUES('$uname','$year','$Tf','$Mf','$Ff','$Tfa',$Tgp','$professor','$Assisp','$Assop','$lecturer')";

		$sql5 =   "INSERT INTO employee (university_name, year, Officer , stuff) VALUES('$uname','$year','$officers','$stuff')";

		$sql6 =   "INSERT INTO library (university_name, year, Total_Book, Book_acquistion) VALUES('$uname','$year','$Tb','$bookAcqu')";

		$sql7 =   "INSERT INTO research (university_name, year, Research_Journal, Research_Project_completed, Published_Journal_foreign, Published_Journal_local, Published_Journal_peer_review, Field) VALUES('$uname','$year','$R_J','$Rpc','$PJf','$PJl','$PJp','$field')";

		$sql8 =   "INSERT INTO university_expense (university_name, year, Total_Expense_own, Expense_research, Expense_salary, Expense_schlorship, Expense_electricity, Expense_infrustructure_maintainence, Expense_medical, Expense_others, Expense_Transtort) VALUES('$uname','$year','$TotalexOwn','$exResearch','$exSalary','$exScho','$exElec','$exinfrus', '$exmedi', '$exOth', '$extrans')";

		$sql9 =   "INSERT INTO university_income (university_name, year, Total_income_own, Total_income_foreign ) VALUES('$uname','$year','$TincomeOwn','$TincomeFore')";

		mysqli_query($mysqli, $sql1);
		mysqli_query($mysqli, $sql2);
		mysqli_query($mysqli, $sql3);
		mysqli_query($mysqli, $sql4);
		mysqli_query($mysqli, $sql5);
		mysqli_query($mysqli, $sql6);
		mysqli_query($mysqli, $sql7);
		mysqli_query($mysqli, $sql8);
		mysqli_query($mysqli, $sql9);



		}


	echo "Record Added Successfully!!!!!";
	

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Submit Information</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Please submit catagorized info</h1>
    <div id="form">
    <form action="submitInformation.php" method="POST">
    	<h2>University Info</h2>
    	<p>
				<label>University Name:</label>
				<input type="text" name="uname" required>
			</p>
			<p>
				<label>Year:</label>
				<input type="text" name="year" required>
			</p>
			<p>
				<label>Established year:</label>
				<input type="text"  name="Eyear">
			</p>
			<p>
				<label>Address:</label>
				<input type="text"  name="address">
			</p>
			<p>
				<label>phon number:</label>
				<input type="text"  name="phn">
			</p>
			<p>
				<label>Fax:</label>
				<input type="text"  name="fax">
			</p>
			<p>
				<label>Email:</label>
				<input type="Email"  name="mail">
			</p>
			<p>
				<label>Website Address:</label>
				<input type="text"  name="site">
			</p>

			<h2>University Phycial Info</h2>

			<p>
				<label>Land:</label>
				<input type="number"  name="land" >
			</p>
			<p>
				<label>Physical Stracture(owned):</label>
				<input type="text"  name="PSO" >
			</p>
			<p>
				<label>Physical Stracture(rented):</label>
				<input type="text"  name="PSR" >
			</p>
			<p>
				<label>Dormatory:</label>
				<input type="number"  name="dorm">
			</p>
			<p>
				<label>No. Of school:</label>
				<input type="number"  name="noOfSch">
			</p>
			<p>
				<label>Department:</label>
				<input type="number"  name="dep">
			</p>
			<p>
				<label>Course:</label>
				<input type="number"  name="course">
			</p>
			<p>
				<label>Institute:</label>
				<input type="number" name="institute">
			</p>


    	<h2>Student Info</h2>
    	<p>
				<label>Total Student:</label>
				<input type="number" name="Tstudent">
			</p>
			<p>
				<label>Male Student:</label>
				<input type="number" name="Mstudent">
			</p>
			<p>
				<label>Female Student:</label>
				<input type="number" name="Fstudent">
			</p>
			<p>
				<label>Undergraduate(pass):</label>
				<input type="number" name="Ugp">
			</p>
			<p>
				<label>Undergraduate(studying):</label>
				<input type="number" name="Ugs">
			</p>
			<p>
				<label>Undergraduate(hons):</label>
				<input type="number" name="Ugh" >
			</p>
			<p>
				<label>Graduate:</label>
				<input type="number" name="Gstud">
			</p>
			<p>
				<label>Total Foreign Student:</label>
				<input type="number" name="Tfs" >
			</p>
			<p>
				<label>Freedom Fighter's Student:</label>
				<input type="number" name="Ffs">
			</p>
			<p>
				<label>Proverty Student:</label>
				<input type="number" name="Ps">
			</p>

			<h2>Faculty Info</h2>

			<p>
				<label>Total Faculty:</label>
				<input type="number" name="Tf" >
			</p>
			<p>
				<label>Male Faculty:</label>
				<input type="number" name="Mf">
			</p>
			<p>
				<label>Female Faculty:</label>
				<input type="number" name="Ff">
			</p>
			<p>
				<label>Total Faculty(Adjunct):</label>
				<input type="number" name="Tfa" >
			</p>
			<p>
				<label>Total Faculty(grad & phd):</label>
				<input type="number" name="Tgp" >
			</p>
			<p>
				<label>Professors:</label>
				<input type="number" name="professor">
			</p>
			<p>
				<label>Assistant Professor:</label>
				<input type="number" name="Assisp" >
			</p>
			<p>
				<label>Associate Professor:</label>
				<input type="number" name="Assop" >
			</p>
			<p>
				<label>Lecturer:</label>
				<input type="number" name="lecturer" >
			</p>

			<h2>Employee Info</h2>

			<p>
				<label>Officers no:</label>
				<input type="number" name="officers" >
			</p>
			<p>
				<label>Stuff no:</label>
				<input type="number" name="stuff">
			</p>

			<h2>Library Info</h2>

			<p>
				<label>Total book:</label>
				<input type="number" name="Tb">
			</p>

			<p>
				<label>Book(acquisition):</label>
				<input type="number" name="bookAcqu">
			</p>

			<h2>Research Info</h2>

			<p>
				<label>noOf Conducted Research Projects:</label>
				<input type="number" name="R_J">
			</p>
			<p>
				<label>Research Project(completed):</label>
				<input type="number" name="Rpc">
			</p>
			<p>
				<label>Published Journal(foreign):</label>
				<input type="number" name="PJf">
			</p>
			<p>
				<label>Published Journal(local):</label>
				<input type="number" name="PJl">
			</p>
			<p>
				<label>Published Journal(peer review):</label>
				<input type="number" name="PJp">
			</p>
			<p>
				<label>Field:</label>
				<input type="number" name="field">
			</p>

			<h2>University Expense</h2>

			<p>
				<label>Total Expense(own):</label>
				<input type="number" name="TotalexOwn">
			</p>
			<p>
				<label>Expense(research):</label>
				<input type="number" name="exResearch">
			</p>
			<p>
				<label>Expense(salary):</label>
				<input type="number" name="exSalary">
			</p>
			<p>
				<label>Expense(scholarship):</label>
				<input type="number" name="exScho">
			</p>
			<p>
				<label>Expense(electricity):</label>
				<input type="number" name="exElec">
			</p>
			<p>
				<label>Expense(infrustructure maintain):</label>
				<input type="number" name="exinfrus">
			</p>
			<p>
				<label>Expense(medical):</label>
				<input type="number" name="exmedi">
			</p>
			<p>
				<label>Expense(others):</label>
				<input type="number" name="exOth">
			</p>
			<p>
				<label>Expense(Transport):</label>
				<input type="number" name="extrans">
			</p>

			<h2>University Income</h2>

			<p>
				<label>Total Income(own):</label>
				<input type="number" name="TincomeOwn">
			</p>
			<p>
				<label>Total Income(foreign):</label>
				<input type="number" name="TincomeFore">
			</p>

			<input name="subInfo" type="submit" id= "button" value="SUBMIT"></input>
			<p>
			<input name="back" type="reset" id= "button" value="RESET"></input>
		</p>


			



 </form>











</div>

</body>
</html>