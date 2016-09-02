<?php

	require_once 'link.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB->prepare('SELECT pic FROM game WHERE no =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB->prepare('DELETE FROM game WHERE no =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("location: game.php"); 
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<style type="text/css">
		.frame{
			width: 720px;
			margin-right: auto;
			margin-left: auto;
			padding-top: 20px;
		}
		input[type="text"],input[type="password"]{
			border-color:#bdc5d0;
		}
		div{
			margin-top: 5px;
		}
		table{
			height: 80px;
		}
		
	</style>

</head>
<body>
	<div class="frame">

		<div>
	    	<a href="addnew.php"><button>add new</button></a>
	    </div>
	
		<?php
			
			$stmt = $DB->prepare('SELECT * FROM game ORDER BY no DESC');
			$stmt->execute();
			
			if($stmt->rowCount() > 0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					?>
					<div style="float:left">
						
						
						<table>
							<tr>
								<td>
									<img src="images/<?php echo $row['pic']; ?>" class="img-rounded" width="250px" height="250px" />
								</td>
							</tr>
							<tr>
								<td>遊戲名稱:</td>
								<td><?php echo $row['game']; ?></td>
							</tr>
							<tr>
								<td>遊戲型態:</td>
								<td><?php echo $row['type']; ?></td>
							</tr>
							<tr>
								<td>參與人數:</td>
								<td><?php echo $row['participant']; ?></td>
							</tr>
							<tr>
								<td>遊戲難度:</td>
								<td><?php echo $row['difficulty']; ?></td>
							</tr>
							<tr>
								<td>適合年齡:</td>
								<td><?php echo $row['age']; ?></td>
							</tr>
						</table>


						<a href="editform.php?edit_id=<?php echo $row['no']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><button>Edit</button></a> 
						<a href="?delete_id=<?php echo $row['no']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><button>Delete</button></a>
						</span>
						</p>
					</div>       
					<?php
				}
			}
			else
			{
				?>
		        <div class="col-xs-12">
		        	<div class="alert alert-warning">
		            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
		            </div>
		        </div>
		        <?php
			}
			
		?>

	</div>
</body>
</html>