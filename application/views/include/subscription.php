<?php
require_once( "recurly/lib/recurly.php" );
?>
	<?php 
	$account = Recurly_Account::get($this->session->userdata['id']);
	$billing_info = Recurly_BillingInfo::get($this->session->userdata['id']);
	$subscriptions = Recurly_SubscriptionList::getForAccount($this->session->userdata['id']);
	foreach ($subscriptions as $subscription) {
    $uuid=$subscription->uuid;
   }
	
	$subscription = Recurly_Subscription::get($uuid);
	$subscription->plan_code = $_POST['planid'];
	if($_POST['status']=='subscribenow'){
		$subscription->updateImmediately(); 
	}else{
		$subscription->updateAtRenewal(); 
	}
	echo 1;
	exit;
	
	$signature = Recurly_js::sign(array(
	  'account'=>array(
		'account_code'=>$this->session->userdata['id'],
	  ),
	  'subscription' => array(
		'plan_code' => $subscription_id,
	  ),
  ));
	?>

  </head>
</html>

