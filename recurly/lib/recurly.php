<?php

// Require all Recurly classes
require_once(dirname(__FILE__) . '/recurly/base.php');
require_once(dirname(__FILE__) . '/recurly/client.php');
require_once(dirname(__FILE__) . '/recurly/currency.php');
require_once(dirname(__FILE__) . '/recurly/currency_list.php');
require_once(dirname(__FILE__) . '/recurly/error_list.php');
require_once(dirname(__FILE__) . '/recurly/errors.php');
require_once(dirname(__FILE__) . '/recurly/link.php');
require_once(dirname(__FILE__) . '/recurly/pager.php');
require_once(dirname(__FILE__) . '/recurly/response.php');
require_once(dirname(__FILE__) . '/recurly/resource.php');
require_once(dirname(__FILE__) . '/recurly/stub.php');

require_once(dirname(__FILE__) . '/recurly/address.php');
require_once(dirname(__FILE__) . '/recurly/account.php');
require_once(dirname(__FILE__) . '/recurly/account_list.php');
require_once(dirname(__FILE__) . '/recurly/addon.php');
require_once(dirname(__FILE__) . '/recurly/addon_list.php');
require_once(dirname(__FILE__) . '/recurly/adjustment.php');
require_once(dirname(__FILE__) . '/recurly/adjustment_list.php');
require_once(dirname(__FILE__) . '/recurly/billing_info.php');
require_once(dirname(__FILE__) . '/recurly/coupon.php');
require_once(dirname(__FILE__) . '/recurly/coupon_list.php');
require_once(dirname(__FILE__) . '/recurly/invoice.php');
require_once(dirname(__FILE__) . '/recurly/invoice_list.php');
require_once(dirname(__FILE__) . '/recurly/note.php');
require_once(dirname(__FILE__) . '/recurly/note_list.php');
require_once(dirname(__FILE__) . '/recurly/plan.php');
require_once(dirname(__FILE__) . '/recurly/plan_list.php');
require_once(dirname(__FILE__) . '/recurly/redemption.php');
require_once(dirname(__FILE__) . '/recurly/subscription.php');
require_once(dirname(__FILE__) . '/recurly/subscription_list.php');
require_once(dirname(__FILE__) . '/recurly/subscription_addon.php');
require_once(dirname(__FILE__) . '/recurly/transaction.php');
require_once(dirname(__FILE__) . '/recurly/transaction_error.php');
require_once(dirname(__FILE__) . '/recurly/transaction_list.php');

require_once(dirname(__FILE__) . '/recurly/push_notification.php');
require_once(dirname(__FILE__) . '/recurly/recurly_js.php');
require_once(dirname(__FILE__) . '/recurly/util/hmac_hash.php');
?>
<html>
  <head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>recurly/themes/default/examples.css" type="text/css" />
    <link href="<?php echo base_url(); ?>recurly/themes/default/recurly.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url(); ?>recurly/build/recurly.js"></script>
	<script>
	//var base_url='http://dev.eulogik.com/skedulus';
	var base_url='http://localhost/skedulus/';
	</script>
	<?php 
	Recurly_Client::$subdomain = 'skedulus';
    Recurly_Client::$apiKey = '82327807620f4794b94ec1150f399f45';
    Recurly_js::$privateKey = '0f368d389ff444e58d4bdf33f06c461d';
 
	?>