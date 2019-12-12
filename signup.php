<?php
if(isset($_POST['register'])){
 
    $password = $_POST['password'];
    $username = $_POST['username'];

        $connect = mysqli_connect('localhost','root','','florist');
       
        if (!$connect) {
            echo "<p style='color: red;'>Error connecting to database: </p>" .mysqli_error($connect);
            exit();
        }else{

        // $query = "select username from users where username = '".$username."'";
        // $sol = mysqli_query($connect, $query);
        // $numberofrows = mysqli_num_rows($sol);
        // if ($numberofrows !== 0) {
        //     echo "User already exists. Try again";
        //     header('Refresh: 2; url=register.html');
    
        // } else {
        //     //new registration
            
            $insert = "insert into users(username, password) values ('".$username."','".$password."')";
           
           if( mysqli_query($connect, $insert)){
            echo "Registered Successfully";
            header('Refresh:2; url =login.html');

    }else{
        echo "failed";
    }
    }
}
?>
