
<!DOCTYPE html>
<html>
<head>
	<title>REPORT GENERATE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
	<div id="from">
		<form action="GenerateProcess.php" method="POST">
	<label>University Name</label>
	<select  name="Uname">
  <option value="iub">IUB</option>
  <option value="nsu">NSU</option>
  <option value="brack">BRACK</option>
  <option value="aiub">AIUB</option>
  <option value="iubat">IUBAT</option>
</select>
	<label>Period From</label>
	<select name="Pfrom">
  <option value="2013">2013</option>
  <option value="2014">2014</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
</select>
	<br></br>
	<label>Period To</label>
	<select name= "Pto" >
  <option value="2013">2013</option>
  <option value="2014">2014</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
</select>

<p>
	<input name="generate" type="submit" value="GENERATE REPORT"/>
</p>

</form>

</div>

</body>
</html>