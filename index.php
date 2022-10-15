<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $passward = "";

    $con = mysqli_connect($server, $username, $passward);

    if (!$con) {
        die("connection is faild" . mysqli_connect_error());
    }
    // echo "succesfully run";
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $passward = $_POST['passward'];
    $detail = $_POST['detail'];

    $sql = "INSERT INTO `registration`.`form` ( `name`, `gender`, `email`, `passward`, `detail`, `dt`) VALUES ( '$name', '$gender', '$email', '$passward', '$detail', current_timestamp());";
    // echo $sql;

    if ($con->query($sql) == true) {
         $insert = true;
    } 
    else {
        echo "Error : $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION FORM</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <img class="img" src="sait.jpg" alt="REGISTRATION">
    <div class="container">
        <h1>REGISTRATION FORM</h1>
        <?php
        if($insert == true){
             echo "<h2>thank for registration </h2>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="ENTER YOUR NAME">
            <input type="text" name="gender" id="gender" placeholder="ENTER YOUR GENDER">
            <input type="text" name="email" id="email" placeholder="ENTER YOUR E-MAIL">
            <input type="passward" name="passward" id="passward" placeholder="ENTER YOUR PASSWARD ">
            <textarea name="detail" id="" cols="30" rows="10" placeholder="ENTER YOUR SOMETHINK">

            </textarea>
            <br>
            <button class="btn">submit</button>
        </form>
    </div>
</body>

</html>