<?php 
	// $ip     = $_SERVER['REMOTE_ADDR']; // means we got user's IP address 
	// $json   = file_get_contents( 'http://smart-ip.net/geoip-json/' . $ip); // this one service we gonna use to obtain timezone by IP
	//maybe it's good to add some checks (if/else you've got an answer and if json could be decoded, etc.)
	// $ipData = json_decode( $json, true);

	// if ($ipData['timezone']) {
		// $tz = new DateTimeZone( $ipData['timezone']);
		// $now = new DateTime( 'now', $tz); // DateTime object corellated to user's timezone
	// } else {
	  // we can't determine a timezone - do something else...
	// }
	
	//$date = date('Y-m-d H:i:s');
	//echo $date;
?>
<script>
// var date = "September 21, 2011 00:00:00";
// var targetTime = new Date(date);
// var timeZoneFromDB = -7.00; //time zone value from database
//get the timezone offset from local time in minutes
// var tzDifference = timeZoneFromDB * 60 + targetTime.getTimezoneOffset();
// alert(tzDifference);
//convert the offset to milliseconds, add to targetTime, and make a new Date
// var offsetTime = new Date(targetTime.getTime() + tzDifference * 60 * 1000);




// var current_date = new Date( );
    // var gmt_offset = current_date.getTimezoneOffset( ) / 60;
    // alert(gmt_offset);
//$('#offset').html( get_time_zone_offset( ) );





// var today = new Date();  
// var localoffset = -(today.getTimezoneOffset()/60);
// var destoffset = -4;

// var offset = destoffset-localoffset;
// var d = new Date( new Date().getTime() + offset * 3600 * 1000)
// alert(d);


// var now = new Date("2013-05-10 18:24:03");
// var hrs = now.getHours();
// hrs += -5.5;
// var res=now.setHours(hrs);

// alert(now);

// $time_in_12_hour_format  = DATE("g:i a", STRTOTIME("13:30"));

// var d = new Date("2013-05-10 06:24:03");
// d.getHours(); // => 9
// d.getMinutes(); // =>  30
// d.getSeconds(); // => 51
// time= d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
// alert(time);


var date = "2013-05-10 07:45:00";

var targetTime = new Date(date);
//alert(targetTime);
alert(targetTime.getTimezoneOffset());
var timeZoneFromDB = 5.50; //time zone value from database
//get the timezone offset from local time in minutes
var tzDifference = timeZoneFromDB * 60 + targetTime.getTimezoneOffset();


//convert the offset to milliseconds, add to targetTime, and make a new Date
var offsetTime = new Date(targetTime.getTime() + tzDifference * 60 * 1000);
alert(offsetTime);

</script>




