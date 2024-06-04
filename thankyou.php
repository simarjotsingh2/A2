<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thankyou.css">
    <title>Thanks for your order!</title>
</head>
<body>

<?php 

$fullName = filter_input(INPUT_POST, "fullname");
$city = filter_input(INPUT_POST, "city");
$address = filter_input(INPUT_POST, "address");
$postalCode = filter_input(INPUT_POST, "postal");
$province = filter_input(INPUT_POST, "province");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

 

$qtyyy1 = filter_input(INPUT_POST, 'qty1', FILTER_VALIDATE_INT); 
$qtyyy2 = filter_input(INPUT_POST, 'qty2', FILTER_VALIDATE_INT); 
$qtyyy3 = filter_input(INPUT_POST, 'qty3', FILTER_VALIDATE_INT); 
$qtyyy4 = filter_input(INPUT_POST, 'qty4', FILTER_VALIDATE_INT); 
$qtyyy5 = filter_input(INPUT_POST, 'qty5', FILTER_VALIDATE_INT);


$fields = [
    $qtyyy1 => ['productName' => 'Macbook', 'price' => 2200.58],
    $qtyyy2 => ['productName' => 'Razer', 'price' => 98.99],
    $qtyyy3 => ['productName' => 'WD HDD', 'price' => 190.35],
    $qtyyy4 => ['productName' => 'Nexus 7', 'price' => 310.40],
    $qtyyy5 => ['productName' => 'DD-45', 'price' => 144.20],
];

$regexCard = '/^\d{10}$/'; 
$creditCardNumber = filter_input(INPUT_POST, 'cardnumber', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$regexCard)));


$regexPostal = '/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/'; 
$postalCode = filter_input(INPUT_POST, 'postal', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>$regexPostal))); 

?>

<?php $sum = 0;

if ($qtyyy1 >= 0 && $qtyyy2 >= 0 && $qtyyy3 >= 0 && $qtyyy4 >= 0 && $qtyyy5 >= 0) {
    foreach ($fields as $qtyyy => $details) {
        $sum += $qtyyy * $details['price'];
    }
}

?>

    <div class="Bill">
        <?php if($fullName): ?>
            <h2><?= "Thanks for your order $fullName." ?></h2>
        <?php else: ?>
            <h2>Invalid full name.</h2>
        <?php endif ?>

        <h3><?= "Bill of your Order" ?></h3>

        <table>
            <tbody>
                <tr>
                    <td colspan="4">
                        <h3>Address</hr></td>
                </tr>
                <tr>
                    <td class ="address"><span class="highlight">Address:</span></td>
                    <?php if($address): ?>
                        <td><?= $address ?></td>
                    <?php else: ?>
                        <td>Invalid address.</td>
                    <?php endif ?>
                
                
                    <td class ="address"><span class="highlight">City:</span></td> 
                    <?php if($city): ?>
                        <td><?= $city ?></td>
                    <?php else: ?>
                        <td>Invalid city.</td>
                    <?php endif ?>
                    </tr>
                <tr>
                <td class ="address"><span class="highlight">Province:</span></td>
                    <?php if($province): ?>
                        <td><?= $province ?></td>
                    <?php else: ?>
                        <td>Invalid province.</td>
                    <?php endif ?>
                
                    <td class ="address"><span class="highlight">Postal Code:</span></td>
                    <?php if($postalCode): ?>
                        <td><?= $postalCode ?></td>
                    <?php else: ?>
                        <td>Invalid postal code.</td>
                    <?php endif ?>
                </tr>
                <tr>
                    <td colspan ="2" class="highlight">
                        <span class="bold">Email:</span></td>
                    <?php if($email): ?>
                        <td colspan ="2"><?= $email ?></td>
                    <?php else: ?>
                        <td>Invalid email.</td>
                    <?php endif ?>
                </tr>
            </tbody>
        </table>
        <table>     
        <tbody>
            <tr>    
           <td colspan="3">
            <h3> Order Information <h3>
           <td>
            </tr>
                <tr>
                   <td> <span class ="bold">Quantity</span></td>
                   <td> <span class ="bold">Item Name</span></td>
                   <td> <span class ="bold"></span></td>
                </tr>
                <?php
              if ($qtyyy1) {
                  echo "<tr>";
                  echo "<td>$qtyyy1</td>";
                  echo "<td>Macbook</td>";
                  echo "<td>2200.58</td>";
                  echo "</tr>";
              }
          ?>
          
          <?php
              if ($qtyyy2) {
                  echo "<tr>";
                  echo "<td>$qtyyy2</td>";
                  echo "<td>Razer</td>";
                  echo "<td>98.99</td>";
                  echo "</tr>";
              }
          ?>
          
          <?php
              if ($qtyyy3) {
                  echo "<tr>";
                  echo "<td>$qtyyy3</td>";
                  echo "<td>WD HDD</td>";
                  echo "<td>190.35</td>";
                  echo "</tr>";
              }
          ?>
          
          <?php
              if ($qtyyy4) {
                  echo "<tr>";
                  echo "<td>$qtyyy4</td>";
                  echo "<td>Nexus 7</td>";
                  echo "<td>310.40</td>";
                  echo "</tr>";
              }
          ?>
          
          <?php
              if ($qtyyy5) {
                  echo "<tr>";
                  echo "<td>$qtyyy5</td>";
                  echo "<td>DD-45</td>";
                  echo "<td>144.20</td>";
                  echo "</tr>";
              }
          ?>
          
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Total</td>
                    <td><?= '$' . $sum ?></td>
                </tr>
            </tfoot>
        </table>

 <p>Thank you please visit again! &#128513</p>

    </div>

</body>
</html>
