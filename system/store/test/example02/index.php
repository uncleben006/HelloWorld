<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta name="author" content="Darko Bunic"/>
		<meta name="description" content="Maintain vertical scroll position (example1)"/>
		<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../redips-scroll.js"></script>
		<title>Example 2: Append scroll parameter to the URL</title>
	</head>
	<body>
		<?php for ($i = 0; $i < 4; $i++): ?>
		<table>
			<colgroup><col width="100"/><col width="100"/></colgroup>
			<tr><td>1</td><td>-</td></tr>
			<tr><td>2</td><td><a href="#" onclick="my_scroll('save.php?id=1&value=2'); return false">save</a></td></tr>
			<tr><td>3</td><td>-</td></tr>
			<tr><td>4</td><td><a href="#" onclick="alert(my_scroll()); return false">alert</a></td></tr>
			<tr><td>5</td><td>-</td></tr>
			<tr><td>6</td><td><a href="#" onclick="my_scroll('save.php?id=2&value=6'); return false">save</a></td></tr>
			<tr><td>7</td><td>-</td></tr>
			<tr><td>8</td><td><a href="#" onclick="alert(my_scroll()); return false">alert</a></td></tr>
			<tr><td>9</td><td>-</td></tr>
			<tr><td>10</td><td><a href="#" onclick="my_scroll('save.php?id=3&value=10'); return false">save</a></td></tr>
		</table>
		<?php endfor ?>
	</body>
</html>