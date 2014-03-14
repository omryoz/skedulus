<?php
//require_once('/lib/recurly.php');
require_once( "recurly/lib/recurly.php" );
// Required for the API
?>
<?php
 
$signature = Recurly_js::sign(array(
  'account'=>array(
    'account_code'=>$this->session->userdata['id'],
  ),
  'subscription' => array(
    'plan_code' => $subscription_id,
  )
));
	?>
    <script>
	//var base_url='http://localhost/skedulus';
	  Recurly.config({
     subdomain: 'skedulus',
     currency: 'USD'
    });

  Recurly.buildSubscriptionForm({
    target: '#recurly-subscribe',
    // Signature must be generated server-side with a utility method provided
    // in client libraries.
	
    signature: '<?php echo $signature;?>',
    successURL: base_url+'/home',
    planCode: '<?php echo $subscription_id;?>',
	 account: {
      firstName: '<?php print_r($status->first_name);?>',
      lastName: '<?php print_r($status->last_name);?>',
      email: '<?php print_r($status->email);?>',
      phone: '<?php print_r($status->phone_number);?>',
    },
	 billingInfo: {
      firstName: '<?php print_r($status->first_name);?>',
      lastName: '<?php print_r($status->last_name);?>',
      address1: '',
      address2: '',
      city: '',
      zip: '',
      state: '',
      country: '',
      cardNumber: '',
      CVV: ''
    },
     distinguishContactFromBillingInfo: true,
     acceptPaypal: false,
   
  });

    </script>
</head>
  <body>
    <h1>Skedulus subscription form</h1>
    <div id="recurly-subscribe"></div>
  </body>
</html>