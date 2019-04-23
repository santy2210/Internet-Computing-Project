<?php
    #-------------------------------------------------------------------------------
    #           Santiago Rivera
    #               Hw - 4
    #              4/13/2019
    #-------------------------------------------------------------------------------

    $dsn = 'mysql:host=localhost;dbname=FinalProject';
    $username = 'super';
    $password = 'super';

    $Email = $_POST['Email']; #to get the actual Email
    $pass = $_POST['pass'];

    try {
        $db = new PDO($dsn, $username, $password);
        #echo "PDO object created right";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p> An error ocurred while connecting to the database: $error_message </p>";
    }

?>

<?php
    #$query = "SELECT * FROM userr WHERE Email like" ."'".$Email."'";
    $query = "SELECT * FROM userr WHERE Email like :Email";
    $statement = $db->prepare($query);
    $statement->bindValue(':Email', $Email);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();

    #echo $Email;
    #echo $user['email'];
    $User_Email = $user['Email'];
    $User_Password = $user['Pass'];
    $Name = $user['F_Name'];
    $Last_Name = $user['L_Name'];
    $User_Type = $user['Type'];

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
	<meta charset="utf-8">
	<title>Validate</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	
</head>
<body>
	<div class="top">
		<table align="center">
			<tr>
			<td align="center" width="400"><img src="Images/santilogo2.png" width="350" height="100"></td>
			<td width="800" align="center" >
				<h1>Sports Supply</h1>
			</td>	
			<td >
				<h2>Phone: (555)555-5555</h2> 
				<h2>Adress: 2 Central Ave, New Jersey.</h2>
			</td></tr>
		</table>
	</div>
	
 <?php
    if ( password_verify($pass,$User_Password) && $Email==$User_Email ) { ?>
        <?php
        session_start(); 
        $_SESSION['is_valid_user'] = true;
        $_SESSION['userEmail'] = $User_Email;
        $_SESSION['userType'] = $User_Type; 
        ?>
        <center><h2>Good job! <?php echo $Name." ".$Last_Name; ?>, Successfully login!!</h2><center>
<?php }
    else {
        header("Location:.?error=1");
    } ?>
             
        <center><h2><a href="products.php">Start Shopping</a></h2><center>
   

</body>
</html>