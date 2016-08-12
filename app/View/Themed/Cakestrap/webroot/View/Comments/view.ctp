
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Comment'), array('action' => 'edit', $comment['Comment']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comment'), array('action' => 'delete', $comment['Comment']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $comment['Comment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="comments view">

			<h2><?php  echo __('Comment'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($comment['Comment']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Foreign Key'); ?></strong></td>
		<td>
			<?php echo h($comment['Comment']['foreign_key']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Model'); ?></strong></td>
		<td>
			<?php echo h($comment['Comment']['model']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Comment'); ?></strong></td>
		<td>
			<?php echo h($comment['Comment']['comment']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
