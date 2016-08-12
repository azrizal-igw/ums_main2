
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Source'), array('action' => 'edit', $source['Source']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Source'), array('action' => 'delete', $source['Source']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $source['Source']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sources'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Source'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="sources view">

			<h2><?php  echo __('Source'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($source['Source']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Model'); ?></strong></td>
		<td>
			<?php echo h($source['Source']['model']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Foreign Key'); ?></strong></td>
		<td>
			<?php echo h($source['Source']['foreign_key']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Type'); ?></strong></td>
		<td>
			<?php echo h($source['Source']['type']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Path'); ?></strong></td>
		<td>
			<?php echo h($source['Source']['path']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
