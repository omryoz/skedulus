<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Skedulus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<link rel="stylesheet/less" href="less/style.less" />
 
<script src="js/libs/less-1.3.0.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!--<link href='http://fonts.googleapis.com/css?family=Fondamento|Akronim&subset=latin,latin-ext' rel='stylesheet' type='text/css'>-->

<script src="js/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function(){
<!--$('.notification-link').popover('hide')-->
$('.notification-link').popover({ html : true});
var isVisible = false;
var clickedAway = false;

$('.notification-link').popover({
    html: true,
    trigger: 'manual'
}).click(function (e) {
    $(this).popover('show');
    clickedAway = false
    isVisible = true
    e.preventDefault()
});

$(document).click(function (e) {
    if (isVisible & clickedAway) {
        $('.notification-link').popover('hide')
        isVisible = clickedAway = false
    } else {
        clickedAway = true
    }
});


});
</script>
</head>

<body>

