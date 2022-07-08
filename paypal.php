<?php
require_once('ZzZ/zzz.main.php');
require_once('ZzZ/zzz.functions.php');
$row = PFSL($stats=0);

?><!DOCTYPE html>
<html>
<head>
<title>the SilenT</title>
<style>
body{
color:#FFFFFF;
background-color:#000000;
border:none;
margin:none;
font-family:Arial,Tahoma,Verdana;
font-size:18px;
margin-left: 38px;
}

a {
color:#FFF888;
text-decoration:none;
font-size:38px;
}

a:hover{
color:#ffffff;
font-size:38px;
  -webkit-animation: fade 5s 0.1s infinite;
          animation: fade 5s 0.1s infinite;
}
</style>
</head><body>Thank you for your time, support and interest.<br>
<?php

//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL
$server='lolxa';
$item_number='Game:heroes,Server:'.$server.',Charname:'.$row->account;
$paypal_email = 'paypal@thesilent.com';
$paypal_amount = 5;
?>

<!-- Set up a container element for the button -->
<div id="paypal-button-container"></div>

<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=Aa-6HSo0Q0kpuRAJtqTDhwZwO-LALWdawHX2Uz0Oj7PtuALt10_SPXnVo_1IrMtPHchJ3MRbM7lZYJ-Q"></script>

<script>
// Render the PayPal button into #paypal-button-container
paypal.Buttons({
// Set up the transaction
createOrder: function(data, actions) {
	return actions.order.create({
		purchase_units: [{
			reference_id: "HeroeS",
			description: "<?php print $item_number;?>",
			custom_id: "<?php print $row->account;?>",


			amount: { 
				value: '<?php print $paypal_amount;?>'} 
			}],
			application_context: {
				shipping_preference: "NO_SHIPPING",
				brand_name: "Heroes"
				},
		});
	},

// Finalize the transaction
onApprove: function(data, actions) {
	return actions.order.capture().then(function(details) {
	// Show a success message to the buyer
	//alert('Transaction completed by ' + details.payer.name.given_name + '!');
	window.location.replace("https://thesilent.com/thanks.php?" + details.payer.name.given_name);
	});
}
}).render('#paypal-button-container');
</script>
<?php
//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL//PAYPAL

?></body></html>