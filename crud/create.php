<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup</title>
    </head>

    <body>
        <h2>Sign-up Form</h2>

        <form action="" method="POST">
            <fieldset>
                <legend>Personal Information</legend>
                First Name: <br>
                <input type="text" name="firstname">
                <br>
                Last Name: <br>
                <input type="text" name="lastname">
                <br>
                Email: <br>
                <input type="text" name="email">
                <br>
                Password: <br>
                <input type="password" name="password">
                <br>
                Gender: <br>
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
                <br><br>
                <input type="submit" name="submit" value="submit">
                
            </fieldset>
        </form>   
    </body>
</html>

<?php
    include "config.php";

    //check if the submit button has been pressed
    if(isset($_POST['submit'])) {
        //initial all the fields
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        //create the insert statement for the database
        $sql = "INSERT INTO `users` (`firstname`,`lastname`,`email`,`password`,`gender`) VALUES ('$first_name','$last_name','$email','$password','$gender')";

        //execute the query
        $result = $conn->query($sql);

        //check for success
        if($result == TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        //close the connection
        $conn->close();
    }
?>