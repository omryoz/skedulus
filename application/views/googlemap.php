
	<style>
            .ui-autocomplete {
                background-color: white;
                width: 300px;
                border: 1px solid #cfcfcf;
                list-style-type: none;
                padding-left: 0px; font-family:Arial, Helvetica, sans-serif; cursor:pointer; font-size:12px;
            }
            .ui-menu-item {padding:3px 0;}
        </style>
<div class="row-fluid">
	 <p><input class="postcode" id="Postcode" name="Postcode" type="text"> 
	 <input type="submit" id="findbutton" value="Find" /></p>
        
        
        
       Lat  <input id="hidLat" name="hidLat" type="text" value="">
       Long <input id="hidLong" name="hidLong" type="text" value=""> 
		<!---<div class="span6">
			<input class="span6" type="text" placeholder="Country" value="Israel">
			<input class="span6 input-margin" type="text" placeholder="City">
			<input class="span6" type="text" placeholder="Street">
			<input class="span6 input-margin" type="text" placeholder="Mobile">
		</div>-->
	</div>
	
	<h5>
		<span class="badge badge-success">5</span> &nbsp;&nbsp;&nbsp;Map your location<br>
		<div>
			<small>Based on the information you provided,
			we have marked your location as close as possible on the map below.You can drop the red icon to set your exact location.
			</small>
			<div id="geomap" style="width:400px; height:400px;">
            <p>Loading Please Wait...</p>
        </div>
		</div>
	</h5>
