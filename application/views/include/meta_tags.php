<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Skedulus</title>
 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<link rel="stylesheet/less" href="<?php echo base_url(); ?>less/style.less" />
 <!---links for getting DOB drop down values --->
<script>var baseUrl='<?php echo base_url();?>'</script>
<script src="<?php echo base_url(); ?>js/dates/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/dates/core.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/libs/less-1.3.0.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.min.js" type="text/javascript" ></script>


<!--<link href='http://fonts.googleapis.com/css?family=Fondamento|Akronim&subset=latin,latin-ext' rel='stylesheet' type='text/css'>-->

<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
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

<body class="ie6 ie7 ie8 <?=(lang('Apps_lang'))?>">

<?php if((lang('Apps_lang'))!=''): ?> 
<script type="text/javascript">
                       var stylesheetFile = '<?=base_url()?>less/hebrew.less';
                       var link  = document.createElement('link');
                       link.rel  = "stylesheet";
                       link.type = "text/less";
                       link.href = stylesheetFile;
                       less.sheets.push(link);
                       less.refresh();
</script>
<?php endif; ?>

