<?php include('server.php');

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;


	$Record =  mysqli_query($conn,"SELECT * FROM info WHERE Id=$id");

	if ($Record) {
		$Db_Data = mysqli_fetch_array($Record);
		$Name = $Db_Data['Name'];
		$Address = $Db_Data['Address'];
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: Create, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Address</th>
			<th colspan="2" >Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT Id, Name, Address FROM info";
	$result = $conn->query($sql);
	$no = 0;
	if ($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			$no++;
		echo'<tr>';	
		echo '<td>'.$no.'</td>';
		// echo '<td>'.$row['Id'].'</td>';
		echo '<td>'. $row['Name'].'</td>';
		echo '<td>'. $row['Address'].'</td>';
		echo '<td><a href="index.php?edit='.$row['Id'].'">Edit</a></td>';
		echo '<td><a href="phpCode.php?del='.$row['Id'].'">Delete</a></td>';
		echo '</tr>';
		}
	} else {
		// echo "0 results";
	}
	?>
	
			
		
	</tbody>
</table>
	<form method="post" action="phpCode.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $Name; ?>" required>
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $Address; ?>" required>
		</div>
		<div class="input-group">
			<?php if(isset($_GET['edit'])){
				echo '<button class="btn" type="submit" name="update" >Update</button>';
			}else{
				echo '<button class="btn" type="submit" name="save" >Save</button>';
			}
			?>
			
		</div>
	</form>
</body>
</html>