<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(document).ready(function() {
    try {
        window.opener.HandlePopupResult('<?php echo $existData['Acccodeheader']['sitecode'];?>','<?php echo ''.+substr($existData['Acccodeheader']['transdate'],6,8);?>','<?php echo $existData['Acccodeheader']['acccode_id'];?>','<?php echo $existData['Acccodeheader']['amount'];?>');
    }
    catch (err) {}
    
    
    <?php if ($action != null){?>
    var url = '<?php echo $this->Html->url($action);?>';
    //return false;
    location.href = url;   
    <?php } else { ?>
    window.close();
    <?php } ?>
    
   
});
</script>