<?php
$Gadgets = new Gadgets();
$Gadgets->layout_page = 'user/dashboard';
$Gadgets->owner_guid = ossn_loggedin_user()->guid;
$layout = $Gadgets->getLayout();
$layout = $Gadgets->parseLayout($layout->description);
?>
<script>
$(document).ready(function() {
	Ossn.add_hook('gadget', 'sections', function() {
		return '#gadgets-left, #gadgets-middle, #gadgets-right';
	});
	Ossn.add_hook('gadget', 'insert', function() {
		return '#gadgets-middle';
	});
	Ossn.add_hook('gadget', 'save', function() {
		return {
			'name' : 'user/dashboard',
			'layout': {
				'left': ossn_gadgets_get_order('#gadgets-left'),
				'middle': ossn_gadgets_get_order('#gadgets-middle'),
				'right': ossn_gadgets_get_order('#gadgets-right'),
			}
		};
	});
	gadgets_sortable();
	<?php if($layout){ ?>
		<?php foreach($layout['left'] as $left){ ?>
				gadget_emulate_add('<?php echo $left;?>', '#gadgets-left');
		<?php } ?>
		<?php foreach($layout['middle'] as $middle){ ?>
				gadget_emulate_add('<?php echo $middle;?>', '#gadgets-middle');
		<?php } ?>	
		<?php foreach($layout['right'] as $right){ ?>
				gadget_emulate_add('<?php echo $right;?>', '#gadgets-right');
		<?php } ?>			
	<?php 
	}
	?>
});
</script>	
<div class="col-md-11">
	<div class="ossn-gadget-editor">
    	<span class="gadget-save right">
			<a class="btn btn-success btn-sm right" id="gadget-save-layout"><?php echo ossn_print('save');?></a>
         </span>   
		<div class="gadget-page-title"><?php echo ossn_print('dashboard:layout');?></div>
		<p><?php echo ossn_print('ossngadget:guide');?></p>
		<div class="row">
			<div class="col-md-9">
				<div class="ossn-gadget-editor-container">
					<div class="row g-0">
						<div class="col-md-3">
							<div class="ossn-gadget-layout">
								<div class="ossn-gadget-editor-head">
									<span class="ossn-gadget-editor-title"><?php echo ossn_print('dashboard:left');?></span>
								</div>
								<ul id="gadgets-left" class="gadget-sortable">
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<div class="ossn-gadget-layout">
								<div class="ossn-gadget-editor-head"><span class="ossn-gadget-editor-title"><?php echo ossn_print('dashboard:middle');?></span></div>
								<ul id="gadgets-middle" class="gadget-sortable">
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ossn-gadget-layout">
								<div class="ossn-gadget-editor-head"><span class="ossn-gadget-editor-title"><?php echo ossn_print('dashboard:right');?></span></div>
								<ul id="gadgets-right" class="gadget-sortable">
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<?php echo ossn_plugin_view('gadgets/available');?>
			</div>
		</div>
	</div>
</div>