<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Credit Card Validation</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="checkoutAssets/css/styles.css">
  <link rel="stylesheet" type="text/css" href="checkoutAssets/css/demo.css">
  <link rel="icon" href="https://www.flaticon.com/svg/static/icons/svg/2598/2598297.svg" type="image/x-icon">
</head>
<?php
session_start();
if($_SESSION['first_name']==''){
  die("<img id='checkoutFailedImg' src='https://www.flaticon.com/svg/static/icons/svg/2598/2598297.svg'><h1 id='checkoutFailed'>(Complete Your Account Details First)<a href='home.php'>Back to Home</a></h2>");
}
?>
<body>
  <div class="container-fluid">
    <div class="creditCardForm">
      <div class="heading">
        <h1><?php  echo $_SESSION['first_name']." ".$_SESSION['last_name']." - Confirm Purchase"?></h1>
      </div>
      <div class="payment">
        <form action="addTicketRequest.php" method="post">
          <div class="form-group owner">
            <label for="owner">Owner</label>
            <input type="text" class="form-control" id="owner" name="ownerInput">
          </div>
          <div class="form-group CVV">
            <label for="cvv">CVV</label>
            <input type="text" class="form-control" id="cvv" name="cvvInput">
          </div>
          <div class="form-group" id="card-number-field">
            <label for="cardNumber">Card Number</label>
            <input type="text" class="form-control" id="cardNumber" name="cardNumberInput">
          </div>
          <div class="form-group" id="expiration-date">
            <label>Expiration Date</label>
            <select name="expirationMonthInput">
              <option value="01">January</option>
              <option value="02">February </option>
              <option value="03">March</option>
              <option value="04">April</option>
              <option value="05">May</option>
              <option value="06">June</option>
              <option value="07">July</option>
              <option value="08">August</option>
              <option value="09">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
            <select name="expirationYearInput">
              <option value="16"> 2016</option>
              <option value="17"> 2017</option>
              <option value="18"> 2018</option>
              <option value="19"> 2019</option>
              <option value="20"> 2020</option>
              <option value="21"> 2021</option>
            </select>
          </div>
          <div class="form-group" id="credit_cards">
            <img src="checkoutAssets/images/visa.jpg" id="visa">
            <img src="checkoutAssets/images/mastercard.jpg" id="mastercard">
            <img src="checkoutAssets/images/amex.jpg" id="amex">
          </div>
          <div class="form-group" id="pay-now">
            <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm</button>
          </div>
        </form>
      </div>
    </div>

    
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="checkoutAssets/js/jquery.payform.min.js" charset="utf-8"></script>
  <script src="checkoutAssets/js/script.js"></script>

</body>

</html>