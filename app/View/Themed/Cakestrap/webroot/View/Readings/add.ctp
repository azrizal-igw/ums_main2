
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Html->link(__('List Readings'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Partitions'), array('controller' => 'partitions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partition'), array('controller' => 'partitions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pesttypes'), array('controller' => 'pesttypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pesttype'), array('controller' => 'pesttypes', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="readings form">
		
			<?php echo $this->Form->create('Reading', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Add Reading'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('partition_id', 'partition_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('partition_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('job_id', 'job_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('job_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

		<?php echo $this->Form->input('Pesttype');?>
				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
