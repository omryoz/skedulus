<?php include('header_login.php')?>

<div class="content container">
	<div class="row-fluid ">
		<?php include('dash_navbar.php')?>
		<div class="row-fluid">
			<h3>Photo List
				<a href="#gallery"  class="btn pull-right btn-success" data-toggle="modal">+add</a>
			</h3>
			
				<ul class="unstyled photo_gallery thumbnails">
					<li class="span3  thumb-image">
						<div class="thumbnail">
						<a href="#" class="btn icon btn-mini"><i class="icon-edit" title="edit or remove"></i></a>
						<a href="#">
							<img src="images/2.jpg" >
						</a>
							<h5 >
								<center><a href="#">Photo Name</a></center>
							</h5>
						</div>
					</li>
					<li class="span3  thumb-image">
						<div class="thumbnail">
						<a href="#" class="btn icon btn-mini"><i class="icon-edit" title="edit or remove"></i></a>
						<a href="#">
							<img src="images/3.jpg" >
						</a>
							<h5 >
								<center><a href="#">Photo Name</a></center>
							</h5>
						</div>
					</li>
					<li class="span3  thumb-image">
						<div class="thumbnail">
						<a href="#" class="btn icon btn-mini"><i class="icon-edit" title="edit or remove"></i></a>
						<a href="#">
							<img src="images/4.jpg" >
						</a>
							<h5 >
								<center><a href="#">Photo Name</a></center>
							</h5>
						</div>
					</li>
					<li class="span3  thumb-image">
						<div class="thumbnail">
						<a href="#" class="btn icon btn-mini"><i class="icon-edit" title="edit or remove"></i></a>
						<a href="#">
							<img src="images/5.jpg" >
						</a>
							<h5 >
								<center><a href="#">Photo Name</a></center>
							</h5>
						</div>
					</li>
				</ul>
				<ul class="unstyled photo_gallery thumbnails">
					<li class="span3  thumb-image">
						<div class="thumbnail">
						<a href="#" class="btn icon btn-mini"><i class="icon-edit" title="edit or remove"></i></a>
						<a href="#">
							<img src="images/6.jpg" >
						</a>
							<h5 >
								<center><a href="#">Photo Name</a></center>
							</h5>
						</div>
					</li>
					<li class="span3  thumb-image">
						<div class="thumbnail">
						<a href="#" class="btn icon btn-mini"><i class="icon-edit" title="edit or remove"></i></a>
						<a href="#">
							<img src="images/7.jpg" >
						</a>
							<h5 >
								<center><a href="#">Photo Name</a></center>
							</h5>
						</div>
					</li>
					<li class="span3  thumb-image">
						<div class="thumbnail">
						<a href="#" class="btn icon btn-mini"><i class="icon-edit" title="edit or remove"></i></a>
						<a href="#">
							<img src="images/8.jpg" >
						</a>
							<h5>
								<center><a href="#">Photo Name</a></center>
							</h5>
						</div>
					</li>
					<li class="span3  thumb-image">
						<div class="thumbnail">
						<a href="#" class="btn icon btn-mini"><i class="icon-edit" title="edit or remove"></i></a>
						<a href="#">
							<img src="images/9.jpg" >
						</a>
							<h5 >
								<center><a href="#">Photo Name</a></center>
							</h5>
						</div>
					</li>
				</ul>
		</div>
	
		<div id="gallery" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 ><h4 >Add Photo</h4></h3>
	  </div>
	  <div class="modal-body">
		<form class="bs-docs-example form-horizontal ">
				<div class="control-group">
				  <label class="control-label" for="firstname">Photo Name :</label>
				  <div class="controls">
					<input class="input-large radi" type="text" >
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="lastname">Upload Photo :</label>
				  <div class="controls">
					<input class="input-large radi" type="file" >
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="firstname">Description :</label>
				  <div class="controls">
					<textarea class="input-large radi" rows="3" placeholder="Description" ></textarea>
				  </div>
				</div>
	  <div class="control-group">
		<label class="control-label" for="inputPassword">Order :</label>
		<div class="controls">
		  <input class="input-large radi" type="text" >
		</div>
	  </div>          
	  </form>
	  </div>
	  <div class="modal-footer">
		<button class="btn btn-success">Save </button>
	  </div>
	</div>
	
		
		
 	</div>
</div>


<?php include('footer.php')?>
