<?php if(!isset($admin)) { ?>
<div id="footer">
		 <div class="container" id="foot">
			<div class="row-fluid">
				<div class="span9" align="center">
						<ul class="inline" id="foot_icon">
							<li>
								<a href="#"><center>
								<i class="icon-mobile-phone icon-white icon-3x"></i></center><span><?=(lang('Apps_mobileapp'))?></span></a>
							</li>
							<li class="aboutus">
								<a href="<?php echo base_url(); ?>content/about_us"><center>
								<i class="icon-home icon-white icon-large"></i></center><span><?=(lang('Apps_aboutus'))?></span></a>
							</li>
							<li class="contactus">
								<a href="<?php echo base_url(); ?>content/contact_us"><center>
								<i class="icon-envelope icon-white icon-large"></i></center><span><?=(lang('Apps_contactus'))?></span></a>
							</li>
							
							<li class="privacy">
								<a href="<?php echo base_url(); ?>content/privacy"><center>
								<i class="icon-ban-circle icon-white icon-large"></i></center><span><?=(lang('Apps_privacy'))?></span></a>
							</li>
							
							<li>
								<a href="<?php echo base_url(); ?>content/help"><center>
								<i class="icon-question-sign icon-white icon-large"></i></center><span><?=(lang('Apps_help'))?></span></a>
							</li>
							<?php 
							$status='';
							if(isset($this->session->userdata['id'])){
							$status=$this->common_model->getRow("user_business_details","users_id",$this->session->userdata['id']);
							}
							?>
							<?php if($status!="") { ?>
							 <li>
								
							</li> 
							<?php }else{
							  ?>
							  <li> 
								<a href="<?php echo base_url(); ?>home/businesslist"><center>
								<i class="icon-flag icon-white icon-large"></i></center><span>
								<?=(lang('Apps_businesses'))?>
								<? // echo(lang('Apps_f&p'))?>
								</span></a>
								
							</li> 
							  <?php 
							} ?>
							
						
						</ul>
						</div>
			
					<div class="span2 offset1 likebox">
						<ul class=" unstyled inline pull-right right_foot" >
							<li class=""><a href="#" title="Follow us on Twitter " ><i class="icon-twitter icon-white icon-large twitter"></i></a></li>
							<li class=""><a href="#" title="Find us on Facebook " ><i class="icon-facebook icon-white icon-large facebook"></i></a></li>
						</ul>	
					</div>
			</div>
			<div class="row-fluid">
				<center><small class="Copyright">Copyright &copy; 2013 Skedulus.com </small></center>
			</div>
		 </div>
		 
    </div>
<?php } ?>
	
	 <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-dropdown.js"></script>
    <!--<script src="js/bootstrap-scrollspy.js"></script>-->
    <script src="<?php echo base_url(); ?>js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-tooltip.js"></script>
    <!--<script src="js/bootstrap-popover.js"></script>-->
    <script src="<?php echo base_url(); ?>js/bootstrap-button.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-collapse.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-timepicker.js"></script>
	

<?php if($this->session->userdata('language')=='hebrew'){ ?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker.he.js"></script>
<?php }else{?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
<?php }?>
<!--Mouse over image slider for business_profile scripts Start-->
<script type="text/javascript" src="<?php echo base_url(); ?>js/simplyscroll/jquery.simplyscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>



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
	




  </body>
</html>