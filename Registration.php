<!-- my DB connection for data to save -->
<?php 
define('DB_HOST', 'localhost');
define('DB_NAME', 'php_registerform');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Failed to connect to MySQL: ' . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die('Failed to connect to MySQL: ' . mysql_error()); 

/* // To check if connection is sucesful or not 
if (mysqli_connect_errno($con)) {
	 echo 'Failed to connect to MySQL: ' . mysqli_connect_error(); 
} else {
	 echo 'Successfully connected to your database…'; 
}
*/
function NewUser() {
	 $email = $_POST['email'];
	 $password = $_POST['password'];	
	 $firstname = $_POST['fname'];
	 $middlename = $_POST['mname'];
	 $lastname = $_POST['lname']; 
	 $age = $_POST['age'];
	 $gender = $_POST['gender'];
	 $street = $_POST['street'];
	 $city = $_POST['city'];
	 $postCode = $_POST['postcode'];
	 $province = $_POST['province'];
	 $telephone = $_POST['telephone']; 
	 
	 $query = "INSERT INTO websiteusers (`email`,`Password`,`First Name`, `Middle Name`, `Last Name`, `Age`, `Gender`, `Street Name`, `City`, `Postal Code`, `Province`, `Telephone`)
	  VALUES ('$email','$password','$firstname','$middlename','$lastname','$age','$gender','$street','$city','$postCode','$province','$telephone')"; 
	 $data = mysql_query ($query)or die(mysql_error()); 
	 if($data) {
	 	 echo "Thank you <b> $firstname $lastname </b> for your time and efforts to Register <br/>";
	 	 echo "YOUR REGISTRATION IS COMPLETED...!"; 
	 }else{
	 	echo "Sorry can't Register some problem";
	 } 
} 

function SignUp() {
	if(!empty($_POST['email'])){
	 	$query = mysql_query("SELECT `Email` FROM websiteusers WHERE email = '$_POST[email]'") or die(mysql_error());
		$count=mysql_num_rows($query);
		if($count != 1) {	
			newuser();
		} else {
			$firstname = $_POST['fname'];
			$lastname = $_POST['lname']; 
			$email = $_POST['email'];
			echo "SORRY... <i> $firstname $lastname </i> YOU ARE ALREADY REGISTERED USER as your Email : <b> $email </b> is already registred...! <br/>";
			echo "Dont Try to Trick us buddy.. hehehe ;)"; 
		}
	}
} 
if(isset($_POST['submit'])) {
	 SignUp(); 
} 

?>
