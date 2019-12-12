
<html>
<head>
<?php



// Passing the input values
$username = $_POST['username'];
$password = $_POST['password'];


$status = true;

if($username == "" || $password == "")
{
    echo "Error! Text field cannot be blank";
    $status = false;
}

?>
<title><?php
if ($status){
    echo "Welcome to BLOOMS";
} else {
    echo "BLOOMS Login";
}
?></title>
</head>


<body>
    <?php
    
    $con = mysqli_connect('localhost', 'root', '', 'florist');

    if (!$con) {
        echo "<p style='color: green;'>Error connecting to database: </p>" .mysqli_error($con);
        exit();
    }

    $query = "select * from users where  username= '".$username."' && password = '".$password."'";
    $sol = mysqli_query($con, $query);
    $numberofrows = mysqli_num_rows($sol);

    if ($numberofrows == 1) {           //if credentials match
        header('Refresh: 2; url=index.html');
        echo "You are Succesfully logged in.";    // redirects to home page of emart
    } else {
        
        header('Refresh: 2; url=login.html');
       echo "Please check your credential for login.";
    }

    ?>
