<?php
$apiKey = "rzp_test_dLnxh91UDe5VJx";
?>
<html>
    <body style="background-color:rgb(67, 23, 109);">

</body>
    </html>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<form action="" method="POST">
    <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo $apiKey; ?>"
            data-amount="1000" 
            data-currency="INR"
            data-id="<?php echo 'OID' . rand(10, 100) . 'END'; ?>"
            data-name="Mahesh More"
            data-description="E-commerce web" 
            data-image="M.jpeg" 
            data-prefill.name="Mahesh More"
            data-prefill.email="moremk2019@gmail.com"
            data-prefill.contact="9322974643"
            data-theme.color="brown">
    </script>
     <input type="submit" id="id1" style="display: none;">

</form>
<script>
     document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("id1").click();
  });
     document.getElementById("id1").addEventListener("click", function() {
    automaticClick();
  });
    </script>

