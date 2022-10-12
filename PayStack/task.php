<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        Name: <input type="text" name="firstName" required/><br/><br/>
        Email: <input id="email" name="email" type="email" required/><br/><br/>
        Date of Birth: <input type="date" name="d" required/><br/><br/>
        Gender: <input id="Gender" name="Gender" type="text" required/><br/><br/>
        Country: <input id="Country" name="Country" type="text" required/><br/><br/>
        <button type="button" onclick="checkpassword()">Submit</button>
    </form>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $prono=$_POST['prono'];
    $proname=$_POST['proname'];
    $category=$_POST['category'];
    $supplier=$_POST['supplier'];
    $costprice=$_POST['costprice'];
    $Quantity=$_POST['quantity'];
    $date=$_POST['date'];
}

?>

