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
	 $password = $_POST['pass'];	
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
	  
	 $query = "INSERT INTO websiteusers ('email',`Password`,`First Name`, `Middle Name`, `Last Name`, `Age`, `sex`, `Street Name`, `City`, `Postal Code`, `Province`, `Telephone`, `Email`, `userID`)
	  VALUES ('$email','$password','$firstname','$middlename','$lastname','$age','$gender','$street','$city','$postCode','$province','$telephone',NULL)"; 
	 $data = mysql_query ($query)or die(mysql_error()); 
	 if($data) {
	 	 echo "Thank you for your time and efforts to Register \n YOUR REGISTRATION IS COMPLETED...!"; 
	 } 
} 

function SignUp() {
	 if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
	 { $query = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error()); 
	 if(!$row = mysql_fetch_array($query) or die(mysql_error())) {
	 	 newuser(); 
	 } else {
	 	 echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; } 
	 } 
} 
if(isset($_POST['submit'])) {
	 SignUp(); 
} 

?>
