<?php
include "config.php";

if(isset($_POST['submit'])){
    // Check if all required fields are set
    if(isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['gender'])){
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        // Prepare the SQL statement
        $sql = "INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$first_name', '$last_name', '$email', '$password', '$gender')";

        // Execute the query
        if($conn->query($sql) === TRUE){
            echo "New record created successfully";
        } else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <body>
        <h2>Registration form</h2>
        <form action="" method="POST">
            <fieldset>
                <legend>Personal Information:</legend>
                First Name:<br>
                <input type="text" name="firstname"><br>
                Last Name:<br>
                <input type="text" name="lastname"><br>
                Email:<br>
                <input type="email" name="email"><br>
                Password:<br>
                <input type="password" name="password"><br>
                Gender:<br>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female<br><br>
                <input type="submit" name="submit" value="Submit">
            </fieldset>
        </form>
    </body>
</html>
