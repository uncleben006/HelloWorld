<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta name="author" content="Darko Bunic"/>
		<meta name="description" content="Maintain vertical scroll position (example1)"/>
		<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../redips-scroll.js"></script>
		<script type="text/javascript" src="script.js"></script>
		<title>Example 3: Scroll position and form</title>
	</head>
	<body>
		<!-- create vertical space -->
		<?php for ($i = 0; $i < 3; $i++): ?>
		<table>
			<colgroup><col width="100"/><col width="100"/></colgroup>
			<tr><td>1</td><td>-</td></tr>
			<tr><td>2</td><td>-</td></tr>
			<tr><td>3</td><td>-</td></tr>
			<tr><td>4</td><td>-</td></tr>
			<tr><td>5</td><td>-</td></tr>
			<tr><td>6</td><td>-</td></tr>
			<tr><td>7</td><td>-</td></tr>
			<tr><td>8</td><td>-</td></tr>
			<tr><td>9</td><td>-</td></tr>
			<tr><td>10</td><td>-</td></tr>
		</table>
		<?php endfor ?>

		<!-- main form -->
		<form method="get" action="save.php">
			<!-- scroll parameter (it will be set in myFormSubmit() from script.js) -->
			<input type="hidden" name="scroll"/>
			<!-- table with form elements -->
			<table>
				<colgroup>
					<col width="100"/>
					<col width="100"/>
				</colgroup>
				<tr>
					<td>Input1</td>
					<td><input type="text" name="p1"/></td>
				</tr>
				<tr>
					<td>Input2</td>
					<td><input type="text" name="p2"/></td>
				</tr>
				<tr>
					<td>Input3</td>
					<td><input type="text" name="p3"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="button" value="Submit" onclick="myFormSubmit()"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>