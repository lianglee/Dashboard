<?php
$Gadgets = new Gadgets();
$Gadgets->layout_page = 'user/dashboard';
$Gadgets->owner_guid = ossn_loggedin_user()->guid;
$layout = $Gadgets->getLayout();
$layout = $Gadgets->parseLayout($layout->description);
?>
<div class="col-md-11">
	<a class="btn btn-success btn-sm" href="<?php echo ossn_site_url('dashboard/editor');?>"><i class="fa fa-pencil-alt"></i><?php echo ossn_print('ossngadget:edit');?></a>
	<div class="row margin-top-10">
 		<div class="col-md-3">	
	<?php
		if(isset($layout['left'])){
			foreach($layout['left'] as $left){
					echo ossn_view_gadget($left);		
			}
		}
	?>
		</div>
		<div class="col-md-6">
	<?php
		if(isset($layout['middle'])){
			foreach($layout['middle'] as $middle){
					echo ossn_view_gadget($middle);		
			}
		}
	?>
		</div>
		<div class="col-md-3">
	<?php
		if(isset($layout['right'])){
			foreach($layout['right'] as $right){
					echo ossn_view_gadget($right);		
			}
		}
	?>
		</div>
   
    </div>
</div>