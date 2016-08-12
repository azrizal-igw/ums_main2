
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<?php echo $this->element('menu/left_menu'); ?>
			<!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="partitions index">
		
			<h4>Reading <?php echo date('d M Y'); ?>&nbsp;<a  href="#"><i class="icon-pencil"></i></a></h4>
			
			<table class="table table-striped table-bordered">
				<thead>
				<tr>
											<th rowspan="2">#</th>
											<th rowspan="2">Code</th>
											<th rowspan="2">Chemical</th>
											<th colspan="3">Pest Type</th>
				</tr>
				<tr>
					<?php foreach($pests as $pest){?>
											<th ><?php echo $pest;?></th>
					<?php } ?>
				</tr>
				</thead>
				<?php
				$count =1;
				foreach ($partitions as $partition): ?>
	<tr>
		<td><?php echo $count++; ?>&nbsp;</td>
		<td><a href data-toggle="modal" data-target="#myModal"><?php echo h($partition['Partition']['name']); ?></a>&nbsp;</td>
		<td>&nbsp;</td>
		<?php foreach($pests as $pest){?>
											<th ></th>
					<?php } ?>
		
	</tr>
<?php endforeach; ?>
			</table>
			
			
			
		</div><!-- .index -->
	
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h3 id="myModalLabel">Reading</h3>
</div>
<div class="modal-body">
<table>
<?php foreach($pests as $pest){?>
											<tr><td><?php echo $pest;?> </td><td><input type="text"></input></td></tr>
					<?php } ?>
					</table>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary">Save changes</button>
</div>
</div>