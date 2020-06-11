<?php
include('database.php');
session_start();
?>
<? ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CareerSpot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CareerSpot</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="career.php">Home</a></li>
      
     <?php 
		if(isset($_SESSION['username'])){
			
		
echo  "<li><a href='#' style='text-transform: uppercase;'> ". $_SESSION['username'] . "</a> </li>" ;
echo  "<li><a href='product.php'>My Interest </a> </li>" ;
echo "  <li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span> Log out </a></li>" ;

		}
		?>
    </ul>
    <form class="navbar-form navbar-left" action="search.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
      <button class="btn btn-default" type="submit" name="submits">
      <i class="glyphicon glyphicon-search"></i>
      </button>
      </div>
      </div>
    </form>
  </div>
</nav>

<section class="my-5">
  <div class="py-5">
    <h3 class="text-center this">Career Path</h3>
  </div>
  <div class="container-fluid">
    <div class="row" style="text-align: center;">
    <?php
if(isset($_SESSION['username'])){
	$name = $_SESSION['username'];
$query1 = "select * from user where username = '$name' ";
$res = mysqli_query($connection,$query1);
if(!$res){
	die("error".mysqli_error($connection));
}
while($row1 = mysqli_fetch_assoc($res)){
$u_id = intval($row1['user_id']);		
}
if(isset($_POST['submits'])){
  $search = $_POST['search'];
$query = "select * from fields where course like '%$search%'";
$result= mysqli_query($connection,$query);

if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
  $id = $row['field_id'];
  $level = $row['education_level'];
  $course =  $row['course'];
  $interest = $row['interest'];
  $image=$row['career_image'];
    if($interest == 'interested'){
	
	}
	else{
	
?>
      <div class="col-lg-4 col-md-4 col-12" style="margin-bottom:30px;">
        <div class="card" style="border:2px black solid;padding:10px;">
        <img class="card-img-top" src="mob.jpg" alt="Card image">
         <div class="card-body">
           <h4 class="card-title">
           	<?php
           	echo $level;
           	?>
           </h4>
               <p class="card-text"><?php
           	echo "". $course;
           	?></p>
           <?php echo "<a href='?interested=$id' class='btn btn-success'>Interested</a>" ?>    
           </div>
</div>
      </div> <?php }}}else{ echo "Sorry for the inconvenience, we will work on the query";}}?>
     
 
     
      </div>
    </div>
<?php 
    if(isset($_GET['interested'])){
$id = $_GET['interested'];
$query1 = " Update fields set interest = 'interested' where field_id = $id";
$result1 = mysqli_query($connection,$query1);
$que = "insert into items (field_id,user_id) values ($id,$u_id)";
$re = mysqli_query($connection,$que);
			if(!$re){
die("Query Failed".mysqli_error($connection));
	}
header("Location: search.php");


}}
?>	
</section>
</body>
</html>