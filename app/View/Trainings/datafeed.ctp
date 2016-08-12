<?php
//pr($this->Session->read('Auth.User.sitecode'));
class DBConnection{
	function getConnection(){
	  //change to your database server/user name/password
		mysql_connect("localhost","ums","ums@admin11") or
         die("Could not connect: " . mysql_error());
    //change to your database name
		mysql_select_db("ums_main") or 
		     die("Could not select database: " . mysql_error());
	}
}
//include_once("functions.php");
function js2PhpTime($jsdate){
  if(preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $jsdate, $matches)==1){
    $ret = mktime($matches[4], $matches[5], 0, $matches[1], $matches[2], $matches[3]);
    //echo $matches[4] ."-". $matches[5] ."-". 0  ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
  }else if(preg_match('@(\d+)/(\d+)/(\d+)@', $jsdate, $matches)==1){
    $ret = mktime(0, 0, 0, $matches[1], $matches[2], $matches[3]);
    //echo 0 ."-". 0 ."-". 0 ."-". $matches[1] ."-". $matches[2] ."-". $matches[3];
  }
  return $ret;
}

function php2JsTime($phpDate){
    //echo $phpDate;
    //return "/Date(" . $phpDate*1000 . ")/";
    return date("m/d/Y H:i", $phpDate);
}

function php2MySqlTime($phpDate){
    return date("Y-m-d H:i:s", $phpDate);
}

function mySql2PhpTime($sqlDate){
    $arr = date_parse($sqlDate);
    return mktime($arr["hour"],$arr["minute"],$arr["second"],$arr["month"],$arr["day"],$arr["year"]);

}


function addCalendar($st, $et, $sub, $ade,$sitecode,$user_id,$module_id){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "insert into `trainings` (`subject`, `starttime`, `endtime`, `isalldayevent`,`sitecode`,`user_id`,`module_id`) values ('"
      .mysql_real_escape_string($sub)."', '"
      .php2MySqlTime(js2PhpTime($st))."', '"
      .php2MySqlTime(js2PhpTime($et))."', '"
      .mysql_real_escape_string($ade)."', '"
	  .mysql_real_escape_string($sitecode)."', '"
	  .mysql_real_escape_string($user_id)."', '"
	  .mysql_real_escape_string($module_id)."' )";
    //echo($sql);
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'add success';
      $ret['Data'] = mysql_insert_id();
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}


function addDetailedCalendar($st, $et, $sub, $ade,$courseid,$moduleid,$sitecode,$trainer,$traininglocation,$capacity , $color, $tz){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
   $sql = "insert into `trainings` (`starttime`, `endtime`, `subject`,`isalldayevent`, `course_id`,`module_id`,`sitecode`,`trainer`, `traininglocation`, `capacity`,`color`) values ('"
     
      .php2MySqlTime(js2PhpTime($st))."', '"
      .php2MySqlTime(js2PhpTime($et))."', '"
       .mysql_real_escape_string($sub)."', '"
      .mysql_real_escape_string($ade)."', '"
      .mysql_real_escape_string($courseid)."', '"
      .mysql_real_escape_string($moduleid)."', '"
      .mysql_real_escape_string($sitecode)."', '"
      .mysql_real_escape_string($trainer)."', '"
      .mysql_real_escape_string($traininglocation)."', '"
      .mysql_real_escape_string($capacity)."', '"
      .mysql_real_escape_string($color)." ')";
      
    //echo($sql);
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'add success';
      $ret['Data'] = mysql_insert_id();
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}

function listCalendarByRange($sd, $ed ,$sitecode){
  $ret = array();
  $ret['events'] = array();
  $ret["issort"] =true;
  $ret["start"] = php2JsTime($sd);
  $ret["end"] = php2JsTime($ed);
  $ret['error'] = null;
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "select * from `trainings` where `starttime` between '"
      .php2MySqlTime($sd)."' and '". php2MySqlTime($ed)."' and sitecode='".$sitecode."'";
    $handle = mysql_query($sql);
    //echo $sql;
	
    while ($row = mysql_fetch_object($handle)) {
      //$ret['events'][] = $row;
      //$attends = $row->AttendeeNames;
      //if($row->OtherAttendee){
      //  $attends .= $row->OtherAttendee;
      //}
      //echo $row->StartTime;
      $ret['events'][] = array(
        $row->id,
        $row->subject,
        php2JsTime(mySql2PhpTime($row->StartTime)),
        php2JsTime(mySql2PhpTime($row->EndTime)),
        $row->IsAllDayEvent,
        0, //more than one day event
        //$row->InstanceType,
        0,//Recurring event,
        $row->Color,
        1,//editable
       // $row->Trainer, 
        ''//$attends
      );
    }
	}catch(Exception $e){
     $ret['error'] = $e->getMessage();
  }
  return $ret;
}

function listCalendar($day, $type,$sitecode){
  $phpTime = js2PhpTime($day);
  //echo $phpTime . "+" . $type;
  switch($type){
    case "month":
      $st = mktime(0, 0, 0, date("m", $phpTime), 1, date("Y", $phpTime));
      $et = mktime(0, 0, -1, date("m", $phpTime)+1, 1, date("Y", $phpTime));
      break;
    case "week":
      //suppose first day of a week is monday 
      $monday  =  date("d", $phpTime) - date('N', $phpTime) + 1;
      //echo date('N', $phpTime);
      $st = mktime(0,0,0,date("m", $phpTime), $monday, date("Y", $phpTime));
      $et = mktime(0,0,-1,date("m", $phpTime), $monday+7, date("Y", $phpTime));
      break;
    case "day":
      $st = mktime(0, 0, 0, date("m", $phpTime), date("d", $phpTime), date("Y", $phpTime));
      $et = mktime(0, 0, -1, date("m", $phpTime), date("d", $phpTime)+1, date("Y", $phpTime));
      break;
  }
  //echo $st . "--" . $et;
  return listCalendarByRange($st, $et,$sitecode);
}

function updateCalendar($id, $st, $et){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "update `trainings` set"
      . " `starttime`='" . php2MySqlTime(js2PhpTime($st)) . "', "
      . " `endtime`='" . php2MySqlTime(js2PhpTime($et)) . "' "
      . "where `id`=" . $id;
    //echo $sql;
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'Succefully';
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}

function updateDetailedCalendar($id, $st, $et, $sub, $ade, $courseid,$moduleid,$trainer,$traininglocation,$capacity , $color, $tz){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "update `trainings` set"
      . " `starttime`='" . php2MySqlTime(js2PhpTime($st)) . "', "
      . " `endtime`='" . php2MySqlTime(js2PhpTime($et)) . "', "
      . " `subject`='" . mysql_real_escape_string($sub) . "', "
      . " `isalldayevent`='" . mysql_real_escape_string($ade) . "', "
      . " `course_id`='" . mysql_real_escape_string($courseid) . "', "
      . " `module_id`='" . mysql_real_escape_string($moduleid) . "', "
       . " `trainer`='" . mysql_real_escape_string($trainer) . "', "
      . " `traininglocation`='" . mysql_real_escape_string($traininglocation) . "', "
      . " `capacity`='" . mysql_real_escape_string($capacity) . "', "
	  . " `color`='" . mysql_real_escape_string($color) . "' "
     
      . "where `id`=" . $id;
	   
	  
   // echo $sql;
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'Succefully';
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}

function removeCalendar($id){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "delete from `trainings` where `id`=" . $id;
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'Succefully';
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}


header('Content-type:text/javascript;charset=UTF-8');
//$method = $_GET["method"];
//print_r($postdata);
switch ($method) { 
    case "add":
        $ret = addCalendar($postdata["CalendarStartTime"], $postdata["CalendarEndTime"], $postdata["CalendarTitle"], $postdata["IsAllDayEvent"],$this->Session->read('Auth.User.sitecode'),$this->Session->read('Auth.User.id'),$postdata["module_id"]);
        break;
    case "list":
        $ret = listCalendar($postdata["showdate"], $postdata["viewtype"],$this->Session->read('Auth.User.sitecode'));
        break;
    case "update":
        $ret = updateCalendar($postdata["calendarId"], $postdata["CalendarStartTime"], $postdata["CalendarEndTime"]);
        break; 
    case "remove":
        $ret = removeCalendar( $postdata["calendarId"]);
        break;
    case "adddetails":
	
		$course = explode('_',$postdata["Moduleid"]);
        $st = $postdata["stpartdate"] . " " . $postdata["stparttime"];
        $et = $postdata["etpartdate"] . " " . $postdata["etparttime"];
        if($id != null ){
            $ret = updateDetailedCalendar($id, $st, $et, 
                $postdata["Subject"], isset($postdata["IsAllDayEvent"])?1:0, $course[0],  $course[1],
                $postdata["Trainer"],$postdata["Traininglocation"],$postdata["Capacity"],$postdata["colorvalue"], $postdata["timezone"]);
        }else{
            $ret = addDetailedCalendar($st, $et,                    
                $postdata["Subject"], isset($postdata["IsAllDayEvent"])?1:0, $course[0],  $course[1],
                $this->Session->read('Auth.User.sitecode'), $postdata["Trainer"],$postdata["Traininglocation"],$postdata["Capacity"],$postdata["colorvalue"], $postdata["timezone"]);
      }        
        break; 


}
echo json_encode($ret); 


?>