
<?php  include('php_code.php'); 
		if (isset($_GET['edit'])) {
			$id = $_GET['edit'];
			$update = true;
			$record = mysqli_query($db, "SELECT * FROM Example1 WHERE id='$id'");

			if (count(array($record)) == 1) {
				$n = mysqli_fetch_array($record);
				$name = $n['name'];
				$sname = $n['sname'];
				$email = $n['email'];
			}
		}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php $results = mysqli_query($db, "SELECT * FROM Example1"); ?>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Surname</th>
				<th>E-mail</th>
				<th colspan="2">Action </th>
			</tr>
		</thead>
		<?php while ($row = mysqli_fetch_array($results)) 
		{ ?>
			<tr>
				<td><?php echo $row['name'];  ?></td>
				<td><?php echo $row['sname']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td>
					<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
				</td>
				<td>
					<a href="php_code.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>

	<form method="post" action="php_code.php">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Surname</label>
			<input type="text" name="sname" value="<?php echo $sname; ?>">
		</div>
		<div class="input-group">
			<label>E-mail</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #556A2F;" >update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
	</form>
</body>

<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
</html>


