<?php echo $this->Form->create('Acctransaction',array('id'=>'entryForm','alt'=>'edit'));?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id',array('type'=>'hidden','default'=>$this->data['Acccode']['parent_id']));
		echo $this->Form->input('drcr',array('type'=>'hidden'));




		echo $this->Form->input('amount');




        echo $this->Form->input('sitecode',array('type'=>'hidden'));
        echo $this->Form->input('transdate',array('type'=>'hidden'));




		echo $this->Form->input('desc');




		if (!empty($this->data['Uploadfile']['file'])) {
			$base = Router::url('/', true);
			echo '<div class="input text">';
			echo $this->Html->link('Attachment', $base.'img/account/'.$this->data['Uploadfile']['file'], array('target' => '_blank'));
			echo '</div>';
		}
		else {
			echo $this->Form->input('file',array('type' => 'file','label'=>false));
		}




	?>

<?php echo $this->Form->end();?>

<div id="aeLoading"></div>

