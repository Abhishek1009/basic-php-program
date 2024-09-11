<?php
include 'includes/header.php';
?>

<?php
include 'includes/nav.php';
?>



	<div class="jumbotron">
		<h1 class="text-center"><?php echo "Home Page"; ?> </h1>
	</div>

<?php 
$result=mysqli_query($conn,"select * from users");
while($row = mysqli_fetch_assoc($result))
{
echo $row['username'];}


?>





	
<?php
include 'includes/footer.php';
?>