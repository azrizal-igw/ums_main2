
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Attachment'), array('action' => 'edit', $attachment['Attachment']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attachment'), array('action' => 'delete', $attachment['Attachment']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="attachments view">

			<h2><?php  echo __('Attachment'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Foreign Key'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['foreign_key']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Model'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['model']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Filetype'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['filetype']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Url'); ?></strong></td>
		<td>
			<?php echo h($attachment['Attachment']['url']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
