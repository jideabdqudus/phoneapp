<?php include 'process.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>My Contacts</title>
	<link href="assets/css/bootstrap.min.css" type =text/css rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale=1">
</head>
<body>

<div class="container">
	<div class="container">



    <div class="onejumbo">
      <div class="container text-center">
       <h3 style="font-size:50px; text-decoration: underline;">Contacts</h3>
      </div>
    </div>
	 <h5><span class="label label-default">Available contacts are listed here:</span></h5><br>

	 <?php
	  $mysqli= mysqli_connect('localhost', 'root', '', 'phonebook');
	  $result = "SELECT * FROM `contacts`";
	  $query = mysqli_query($mysqli,$result);

	  if (isset($_SESSION['message'])):?>
	  	<div class="alert alert-<?=$_SESSION['msg_type']?>">
	  		<?php echo $_SESSION['message'];?>
	  	<?php endif ?>
	  	</div>
	 

	 <div class="row container justify-content-center">
	 	<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Email Address</th>
					<th>Social Media</th>
					<th>Expressions</th>
					<th colspan='2'>Action</th>
				</tr>
			</thead>
			<?php while($row = mysqli_fetch_assoc($query)): ?>
				<tr>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['number']?></td>
					<td><?php echo $row['mail']?></td>
					<td><?php echo $row['socials']?></td>
					<td><?php echo $row['extra']?></td>
					<td>
						<a href="contact.php?edit=<?php echo $row['id']; ?>" class = "btn btn-info" id="edit">Edit</a>
						<a href="process.php?delete=<?php echo $row ['id'];?>" class = "btn btn-danger" id="danger">Delete</a>
					</td>
				</tr>
			<?php endwhile ?>		 		
	 	</table>

	 </div>





	 	<div class="row justify-content-center container">
		 	<form method="POST" action="process.php">
		 	<input type="hidden" name="id" value="<?php echo $id ?>">
		 		<div class="form-group">
		 		<label>Name</label>
		 		<input type="text" name="name" placeholder="Full Name" class="form-control" value ="<?php echo $name; ?>" >
		 		</div>
		 		<div class="form-group">
		 		<label>Phone Number</label>
		 		<input value = "<?php echo $number; ?>" class="form-control" type="number" name="number" placeholder="Phone Number">
		 		</div>
		 		<div class="form-group">
		 		<label>Mail Address</label>
		 		<input type="text" value ="<?php echo $mail; ?>" class="form-control" name="mail" placeholder="E-mail"> 
		 		</div>
				<div class="form-group">
		 		<label>Social Media</label>
		 		<input type="text" value ="<?php echo $socials; ?>" class="form-control" name="socials" placeholder="Social-Media"> 
		 		</div>		 		
		 		<div class="form-group">
		 		<label>Expressions</label>
		 		<input type="text" name="extra" class="form-control" value ="<?php echo $extra; ?>" placeholder="Write here">
		 		</div>
		 		<div class="form-group">
		 		<?php if($update ==true):?>
		 		<button type="submit" name = "update">Update</button>
				<?php else:?>
		 		<input type="submit" name="save">
		 		<?php endif ?>
		 		</div> 				 		
		 	</form>	 
		</div>
</div>
</div>
	<script type="text/javascript" src="assets/JQuery/jquery.min.js"></script>
    <script type = "text/javascript" src="assets/bootstrap.min.js"></script>
</body>
</html>