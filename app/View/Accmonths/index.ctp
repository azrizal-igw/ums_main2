<style>
.stylish-lists .upper-alpha {
    list-style: outside none upper-alpha;
}
.stylish-lists .lower-alpha {
    list-style: outside none lower-alpha;
}
.stylish-lists .roman-list {
    list-style: outside none upper-roman;
}
.stylish-lists .decimal-leading-zero {
    list-style: outside none decimal-leading-zero;
}
.stylish-lists ul, .stylish-lists ol {
    list-style: outside none disc;
    margin: 0 0 10px 25px;
    padding: 0;
}
.stylish-lists ul ul, .stylish-lists ul ol {
    margin-bottom: 0;
}
.stylish-lists ol ol, .stylish-lists ol ul {
    margin-bottom: 0;
}
.stylish-lists li {
    line-height: 20px;
}
.stylish-lists ul.unstyled, .stylish-lists ol.unstyled, .stylish-lists ul.inline, .stylish-lists ol.inline {
    list-style: outside none none;
    margin-left: 0;
}
.stylish-lists ul.inline > li, .stylish-lists ol.inline > li {
    display: inline-block;
    padding-left: 5px;
    padding-right: 5px;
}
.stylish-lists dl {
    margin-bottom: 20px;
}
.stylish-lists dt, .stylish-lists dd {
    line-height: 20px;
}
.stylish-lists dt {
    font-weight: bold;
}
.stylish-lists dd {
    margin-left: 20px;
}
.stylish-lists .dl-horizontal {
}
.stylish-lists .dl-horizontal::before {
    content: "";
    display: table;
    line-height: 0;
}
.stylish-lists .dl-horizontal::after {
    clear: both;
    content: "";
    display: table;
    line-height: 0;
}
.stylish-lists .dl-horizontal dt {
    clear: left;
    float: left;
    overflow: hidden;
    text-align: right;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 160px;
}
.stylish-lists .dl-horizontal dd {
    margin-left: 180px;
}
</style>

    <?php //echo $content_for_layout; ?>
	<h2><?php echo 'List of Reports' ?></h2>





	<?php echo $this->Form->create('AccMonth', array('inputDefaults' => array('label' => false))); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
	 <th></th>
	 <th></th>
	 <th></th>
	</tr>
	<tr>
	<td>


<?php if (in_array($this->Session->read('Auth.User.group_id'), array(1,2,3,7))) { ?>
<?php echo $this->Session->read('Site.name');?>&nbsp;&nbsp;
<?php echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'accmonths'));}?><br/><br/>


		<?php 
			echo $this->Form->input('Year',array('class'=>'search-field','type'=>'date','dateFormat' => 'Y','minYear' => '2012', 'maxYear' => date('Y') , 'placeholder'=>'Year', 'label' => 'Year'));
			echo $this->Form->input('Month',array('class'=>'search-field','type'=>'date','dateFormat' => 'M','placeholder'=>'Month','label' => 'Month')); 
			echo $this->Form->hidden('group_id', array('value' => $this->Session->read('Auth.User.group_id'))); 
		?>
   </td>
		<td>
		<div class="stylish-lists">
		<ul>
		<li><?php echo $this->Html->link(__('Monthly Report 1'), array('controller'=>'accmonths','action' => 'jaspermonthlyreport1', $this->Session->read('Site.sitecode'), date('Y'), date('m')), array('id'=>'link1')); ?></li>
		<li><?php echo $this->Html->link(__('BSN Monthly Report'), array('controller'=>'accmonths','action' => 'jaspermonthlyreport1', $this->Session->read('Site.sitecode'), date('Y'), date('m'), 'bsn_monthly'), array('class'=>'link3')); ?></li>
		<li><?php echo $this->Html->link(__('CELCOM Monthly Report'), array('controller'=>'accmonths','action' => 'jaspermonthlyreport1', $this->Session->read('Site.sitecode'), date('Y'), date('m'), 'cel_monthly'), array('class'=>'link3')); ?></li>
		<li><?php echo $this->Html->link(__('ALTEL Monthly Report'), array('controller'=>'accmonths','action' => 'jaspermonthlyreport1', $this->Session->read('Site.sitecode'), date('Y'), date('m'), 'altel_monthly'), array('class'=>'link3')); ?></li>




<?php
	if ($this->Session->read('Site.sitecode') != '') {
		$sitecode = $this->Session->read('Site.sitecode');
	}
	else {
		$sitecode = 'all';
	}

?>

	<?php if (in_array($this->Session->read('Auth.User.group_id'), array(1,2,3,7))) { ?>
		<li><?php echo $this->Html->link(__('Celcom HQ Report'), array('controller'=>'accmonths','action' => 'jaspermonthlyreport1', $sitecode, date('Y'), date('n'), 'celcom_hq'), array('class'=>'link3')); ?></li>	
		<li><?php echo $this->Html->link(__('BSN HQ Report'), array('controller'=>'accmonths','action' => 'jaspermonthlyreport1', $sitecode, date('Y'), date('n'), 'bsn_hq'), array('class'=>'link3')); ?></li>	
	<?php } ?>






		</ul>
		</div>
		</td>
	</tr>
	</table>




<?php echo $this->Form->end();?>

<script type="text/javascript">

$('#AccMonthYearYear, #AccMonthMonthMonth').change(function() {
	$('.link3').each(function() {
		var str = $(this).attr('href');
		$(this).attr('href', 
			'accmonths/jaspermonthlyreport1/' + 
			'<?php echo $sitecode ?>/' + 
			$('#AccMonthYearYear').val() + '/' + 
			$('#AccMonthMonthMonth').val() + 
			str.substr(str.lastIndexOf('/'))
		);	
	});
});

$('#AccMonthYearYear').change(function(){
	if ($('#AccMonthYearYear').val() != "") {
		var year = $('#AccMonthYearYear').val();
	}
	$('#link1').attr('href', 'accmonths/jaspermonthlyreport1/' + '<?php echo $sitecode; ?>/' + year + '/' + $('#AccMonthMonthMonth').val());
});

$('#AccMonthMonthMonth').change(function(){
	if ($('#AccMonthMonthMonth').val() != "") {
		var month = $('#AccMonthMonthMonth').val();
	}	
	$('#link1').attr('href', 'accmonths/jaspermonthlyreport1/' + '<?php echo $sitecode; ?>/' + $('#AccMonthYearYear').val() + '/' + month);
});

</script>




