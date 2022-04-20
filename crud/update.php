<?php
    include "config.php";

    if(isset($_POST['update'])) {
        //initial all the fields
        $userID = $_POST['id'];
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
   
        $sql = "UPDATE `users` SET `firstname`='$first_name',`lastname`='$last_name',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$userID'";
    
        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "Record Updated Successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if(isset($_GET['id'])) {
        $user_id = $_GET['id'];

        $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $userId = $row['id'];
                $first_name = $row['firstname'];
                $last_name = $row['lastname'];
                $email = $row['email'];
                $password = $row['password'];
                $gender = $row['gender'];   
            }
        ?>

        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Update</title>
            </head>
            <body>
                
                <h2>User Update Form</h2>
                <form action="" method="POST">
                    <fieldset>
                        <legend> Personal Information </legend>
                        <input type="hidden" name="id" value="<?php echo $userId; ?>"> <br>
                        First Name: <br>
                        <input type="text" name="firstname" value="<?php echo $first_name; ?>">
                        <br>
                        Last Name: <br>
                        <input type="text" name="lastname" value="<?php echo $last_name; ?>">
                        <br>
                        Email: <br>
                        <input type="email" name="email" value="<?php echo $email; ?>">
                        <br>
                        Password: <br>
                        <input type="password" name="password" value="<?php echo $password; ?>">
                        <br>
                        Gender: <br>
                        <input type="radio" name="gender" value="Male" <?php if($gender == 'Male') {echo 'checked';} ?> >Male
                        <input type="radio" name="gender" value="Female" <?php if($gender == 'Female') {echo 'checked';} ?> >Female
                        <br><br>
                        <input type="submit" name="update" value="update">
                    </fieldset>
                </form>
            </body>
        </html>

        <?php
        }
    }
    //if the 'id' value is not valid, redirect the user back to view.php page
    header("Location: view.php");
?>