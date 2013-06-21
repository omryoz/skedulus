<footer id="footer">
		 <div class="container" id="foot">
			<div class="row-fluid">
				<div class="span9" align="center">
						<ul class="inline" id="foot_icon">
							<li>
								<a href="#"><center>
								<i class="icon-mobile-phone icon-white icon-3x"></i></center><span>Mobile Apps</span></a>
							</li>
							<li class="aboutus">
								<a href="#"><center>
								<i class="icon-home icon-white icon-large"></i></center><span>About Us</span></a>
							</li>
							<li class="contactus">
								<a href="#"><center>
								<i class="icon-envelope icon-white icon-large"></i></center><span>Contact Us</span></a>
							</li>
							
							<li class="privacy">
								<a href="#"><center>
								<i class="icon-ban-circle icon-white icon-large"></i></center><span>Privacy</span></a>
							</li>
							
							<li>
								<a href="#"><center>
								<i class="icon-question-sign icon-white icon-large"></i></center><span>Help</span></a>
							</li>
							<?php if($this->session->userdata('role')=="manager") { ?>
							 <li>
								
							</li> 
							<?php }else{
							  ?>
							  <li> 
								<a href="<?php echo base_url(); ?>business_registration"><center>
								<i class="icon-flag icon-white icon-large"></i></center><span>Features & pricing</span></a>
							</li> 
							  <?php 
							} ?>
							
							<?php /*?><li>
							<?php if(isset($this->session->userdata['business_id'])) {?>
								<a href="<?php echo base_url(); ?>overview">
								<center><i class="icon-user icon-white icon-large"></i></center>
								<span>Business Owner</span></a>
								<?php } else{?>
								<a href="<?php echo base_url(); ?>home/businesslogin">
								<center><i class="icon-user icon-white icon-large"></i></center>
								<span>Business Owner</span></a>
								<?php } ?>
							</li><?php */?>
							
							<!--<li>
								<a href="#"><center>
								<i class="icon-twitter icon-white icon-large"></i></center><span>Twitter</span></a>
							</li>
							<li>
								<a href="#"><center>
								<i class="icon-facebook icon-white icon-large"></i></center><span>Facebook</span></a>
							</li>-->
						</ul>
						</div>
				<!--<div class="span2">
						<ul class="icon unstyled inline pull-right" >
							<li class="twitter"><a href="#" title="Follow us on Twitter "  class="img"></a></li>
							<li class="facebook"><a href="#" title="Find us on Facebook "  class="img"></a></li>
						</ul>	
				</div>-->
					<div class="span2 offset1 likebox">
						<ul class=" unstyled inline pull-right right_foot" >
							<li class=""><a href="#" title="Follow us on Twitter " ><i class="icon-twitter icon-white icon-large twitter"></i></a></li>
							<li class=""><a href="#" title="Find us on Facebook " ><i class="icon-facebook icon-white icon-large facebook"></i></a></li>
						</ul>	
					</div>
			</div>
			<div class="row-fluid">
				<center><small class="Copyright">Copyright © 2013 Skedulus.com </small></center>
			</div>
		 </div>
		 
    </footer>

	
	 <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>js/bootstrap-transition.js"></script>
    <!--<script src="js/bootstrap-alert.js"></script>-->
    <script src="<?php echo base_url(); ?>js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-dropdown.js"></script>
    <!--<script src="js/bootstrap-scrollspy.js"></script>-->
    <script src="<?php echo base_url(); ?>js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-tooltip.js"></script>
    <!--<script src="js/bootstrap-popover.js"></script>-->
    <script src="<?php echo base_url(); ?>js/bootstrap-button.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-collapse.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-timepicker.js"></script>
  <!--  <script src="js/bootstrap-carousel.js"></script>-->
  <!--  <script src="js/bootstrap-typeahead.js"></script>-->
<!--	<script src="js/modernizr.custom.88281.js"></script>.-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<!--Mouse over image slider for business_profile scripts Start-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/simplyscroll/jquery.simplyscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>
<!---<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.tn3lite.min.js"></script>--->
	
<!--Mouse over image slider for business_profile scripts end-->

<!---Script for google map--->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script> 
<script src="<?php echo base_url(); ?>js/googlemap.js"></script>



<!--<script>
	/*$('.info').popover('hide')*/
	$('.info').popover({html:true});
</script>-->	


  </body>
</html>