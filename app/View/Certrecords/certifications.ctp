<div class="certrecords form">
<?php echo $this->Form->create('Certification');?>
  <fieldset>
  <legend><?php echo __('Trainees Eligible for Certificate'); ?></legend>
  <?php
    echo $this->Form->input('course_id',array('options' => $courses, 'empty' => '- Select -'));
    echo $this->Form->input('location_id',array('options' => $sites, 'empty' => '- Select -'));
    echo $this->Form->input('mob', array(
        'type' => 'date',
        'dateFormat' => 'M',
        'label' => 'Month',
        'empty' => '- Select -',
        'default' => date('M')            
    ));
    echo $this->Form->input('year', array(
        'type' => 'date',
        'dateFormat' => 'Y',
        'minYear' => date('Y') - 2,
        'maxYear' => date('Y') + 1,
        'label' => 'Year',
        'empty' => '- Select -',
        'default' => date('Y')
    ));
    echo $this->Form->submit('Search', array('name' => 'search'));
  ?>
  <br>
  <table>
  <tr>
    <th>No</th>
    <th>Trainee IC</th>
    <th>Name</th>
    <th>Cert Number</th>
    <th>Location</th>
    <th>Category</th>
    <th>Date of Certificate</th>
  </tr> 

  <tr> 
    <td>1</td>
    <td>9999</td>
    <td>My Name</td>
    <td>0000</td>
    <td>KL</td>
    <td>Cat 1</td>
    <td>31/12/2014</td>
  </tr>
  </table>



    <?php 
    echo $this->Form->submit('Generate Certification', array('name' => 'gencert', 'action' => 'generatecert')); 
  ?>
  </fieldset>
<?php echo $this->Form->end(); ?>
</div>