<?php
$insert = false;
if (isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection failed to this databse due to ". mysqli_connect_error());
    }

    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `consent`.`consent` (`name`, `roll`, `phone`, `mail`,
     `age`, `gender`, `desc`, `dt`) VALUES ('$name', '$roll', '$phone'
     , '$mail', '$age', '$gender', '$desc', current_timestamp());";
     if ($con -> query($sql) == true)
     {
         $insert = true;  
     }
     else{
         echo "ERROR: $sql <br> $con->error";
     }

     $con -> close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consent Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="DM College">
    <div class="container">
        <h1>DM College of Engineering Consent Form</h1>
        <p class="Entermsg">Enter your details and submit to confirm your Consent to rejoin the college from January 21, 2021</p>
        <?php
        if ($insert == true)
        {
        echo "<p class= 'submitmsg' >Thanks for submitting and providing consent!!</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name: ">
            <input type="text" name="roll" id="roll" placeholder="Enter Your Roll No: ">
            <input type="text" name="phone" id="phone" placeholder="Enter your Phone: ">
            <input type="text" name="mail" id="mail" placeholder="Enter your e-mail: ">
            <input type="text" name="age" id="age" placeholder="Enter your Age: ">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender: ">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other information">
            </textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>

</html> 