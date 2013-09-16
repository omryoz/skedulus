		
		<div class="row-fluid">
		<h3><?=(lang('Apps_selectadaterange'))?></h3>
		<div class="span3 ">
			
			
			<table class="table">
        <thead>
          <tr>
            <th><?=(lang('Apps_start'))?><?=(lang('Apps_date'))?>: <input type="text" class="span12 date_pick" value="" id="dpd1"></th>
            <th><?=(lang('Apps_end'))?><?=(lang('Apps_date'))?> : <input type="text" class="span12 date_pick" value="" id="dpd2"></th>
          </tr>
        </thead>
      </table>
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
