		<h3><?=(lang('Apps_selectadaterange'))?></h3>
		<div class="row-fluid">
		
		<div class="span10 ">
			
			
			<!-- <table class="table">
        <thead>
          <tr>
            <th><?=(lang('Apps_startdate'))?>: <input type="text" class="span12 date_pick" value="" id="dpd1"></th>
            <th><?=(lang('Apps_enddate'))?> : <input type="text" class="span12 date_pick" value="" id="dpd2"></th>
          </tr>
        </thead>
      </table> -->
	  
	  <ul class="unstyled inline">
	  <li> <b><?=(lang('Apps_startdate'))?>:</b> <input type="text" class="input-small date_pick" value="" id="dpd1"></li>
	    <li> <b><?=(lang('Apps_enddate'))?> :</b> <input type="text" class="input-small date_pick" value="" id="dpd2"></li>
	  </ul>
	  
			</div>
		</div>	
			
		<div class="row-fluid">
			<?php include('include/graphbar.htm')?>
			</div>
			<div class="row-fluid">
			<?php include('include/graphline.htm')?>
			</div>
	
		
 	</div>
</div>
