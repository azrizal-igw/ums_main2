<h2>Site List</h2>
<p>
  <?php
  echo $this->Paginator->counter(array(
  'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
  ));
  ?>  </p>

  <div class="paging">
  <?php
    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
  ?>
 </div>
 <p><?php echo $this->Form->create('Site', array('url' => array('page' => 1),'inputDefaults' => array('label' => false))); ?>
<table>
<tr>
<th width="30px">#</th>
<th><?php echo $this->Form->input('name',array('class'=>'search-field','placeholder'=>'Site Name')); ?></th>
<th><?php echo $this->Form->input('phase_id',array('class'=>'search-field','empty'=>'-: Select Phase :-')); ?></th>
<th><?php echo $this->Form->input('region_id',array('class'=>'search-field','empty'=>'-: Select Region :-')); ?></th>
<th><?php echo $this->Form->input('manager',array('class'=>'search-field','placeholder'=>'Staff Name')); ?></th>
<th>Account</th>
</tr>
  <?php $count = $this->Paginator->counter(array('format' => ('{:start}')));?>
  <?php foreach ($site as $sites): ?>
<tr>
<td><?php echo $count++; ?></td>
<td><?php echo $sites['Site']['name'];?></td>
<td><?php if(isset( $sites['Site']['phase_id'])){ echo $phases[$sites['Site']['phase_id']];}?></td>
<td><?php if(isset( $sites['Site']['region_id'])){ echo $regions[$sites['Site']['region_id']];}?></td>
<td>
    <?php 
    foreach ($sites['User'] as $value):
      echo $value['name'];?> </br>
    <?php
    endforeach;?>
  </td>
<td><?php echo $this->html->link(_('Yearly'),array('controller' => 'Accbalances', 'action' => 'listyear',2014,$sites['Site']['id']));?></td>
</tr>

<?php endforeach; ?>
</table>
<?php echo $this->Form->end();?>
  <div class="paging">
  <?php
    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
  ?>
</div>
<script id="ajax" type="text/javascript">

/* On change search form */
$('.search-field').change(function(){
    $('#SiteListsiteForm').submit();
})
/* End search*/

</script>