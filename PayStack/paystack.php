<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button{
            background-color: red;
            width: 20em;
            height: 10em;
        }
    </style>
</head>
<body>
    <button > <a href="https://paystack.com/pay/u7j34sehzk">Click to pay</a></button>
</body>
</html> -->


<?php
$host="localhost";
$user="root";
$password="freshmololuwa";
$db="smart";
$port="3307";



$data= mysqli_connect($host,$user,$password,$db,$port);
if(!$data)
{
    die(mysqli_error($data));
}

// include "includes/session.php";
  
function receiptID () {
  $u = array_merge(range('A', 'Z'));
  $l = array_merge(range('a', 'z'));
  $bool = true;
  while ($bool) {

    $len = 10;
    $uid = "NCS-";
    for ($i=0; $i < $len; $i++) {
      $rand = mt_rand(0, 25);
      $uid = $uid.$u[$rand];
      $rand = mt_rand(0, 25);
      $uid = $uid.$l[$i];
    }

    $file = fopen("stdID.NCS", "a+");
    while (!feof($file)) {
      $prev = fgets($file);
      if (!$prev == $uid) {
        $bool=!$bool;
        fwrite($file, $uid."\n");
      }
    }

    fclose($file);
  }
  return $uid;
}
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "includes/validate.php";

    if (empty($lev_err) && empty($email_err)) {
      $bool = false;
      ?>
      <script>
        function payWithPaystack(){
          var handler = PaystackPop.setup({
            key: 'your_screte_key,
            email: '<?=$email[0]?>',
            amount: 10000,
            metadata: {
              custom_fields: [
                  {
                      display_name: "Matic Number",
                      variable_name: "matic_number",
                      value: "<?=$_SESSION['matric']?>"
                  }
              ]
            },
            callback: function(response){
                <?php
                  $insert = "INSERT INTO payed VALUES('', '100', now(), '".$_SESSION['matric']."', '".receiptID()."', '".$lev."', '".$email[0]."')";
                  $query = mysqli_query($con, $insert);
                  if ($query) {
                    $stat = "";
                    if ($lev == 'ND 1' || $lev == 'HND 1') {
                      $stat = "status1";
                    }
                    else if ($lev == 'ND 2' || $lev == 'HND 2') {
                      $stat = "status2";
                    }
                    $update = "UPDATE students SET ".$stat." = '1' WHERE matric = '".$_SESSION['matric']."'";
                    $query = mysqli_query($con, $update);
                    ?>
                      alert('Transaction Successful <?=$stat?>');
                    <?php
                  }
                ?>
            },
            onClose: function(){
                alert('window closed');
            }
          });
          handler.openIframe();
        }
      </script>
      <?php
    }else {
      echo "Invalid/Incomplete Details";
    }
  }
?>
