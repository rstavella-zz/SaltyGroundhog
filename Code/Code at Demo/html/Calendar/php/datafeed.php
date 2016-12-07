<?php
include_once("dbconfig.php");
include_once("functions.php");

function addCalendar($st, $et, $sub){
  $ret = array();
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "INSERT INTO appointments (subject, starttime, endtime) values ('"
      .pg_escape_string($sub)."', '"
      .php2MySqlTime(js2PhpTime($st))."', '"
      .php2MySqlTime(js2PhpTime($et))."' )";
    //echo($sql);
		if(pg_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = pg_last_error()();
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


function addDetailedCalendar($st, $et, $sub, $dscr, $loc, $color, $tz){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "insert into appointments (subject, starttime, endtime, description, location, color) values ('"
      .pg_escape_string($sub)."', '"
      .php2MySqlTime(js2PhpTime($st))."', '"
      .php2MySqlTime(js2PhpTime($et))."', '"
      .pg_escape_string($dscr)."', '"
      .pg_escape_string($loc)."', '"
      .pg_escape_string($color)."' )";
    //echo($sql);
		if(pg_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] =  pg_last_error()();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'add success';
      $ret['Data'] = pg_last_oid();
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}

function listCalendarByRange($sd, $ed){
  $ret = array();
  $ret['events'] = array();
  $ret["issort"] =true;
  $ret["start"] = php2JsTime($sd);
  $ret["end"] = php2JsTime($ed);
  $ret['error'] = null;
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "select * from apointments where starttime between '"
      .php2MySqlTime($sd)."' and '". php2MySqlTime($ed)."' ORDER BY starttime ASC";
    $handle = pg_query($sql);
    //echo $sql;
    while ($row = pg_fetch_object($handle)) {
      //$ret['events'][] = $row;
      //$attends = $row->AttendeeNames;
      //if($row->OtherAttendee){
      //  $attends .= $row->OtherAttendee;
      //}
      //echo $row->StartTime;
      $ret['events'][] = array(
        $row->Id,
        $row->Subject,
        php2JsTime(mySql2PhpTime($row->StartTime)),
        php2JsTime(mySql2PhpTime($row->EndTime)),
        (date("Y-m-d",mySql2PhpTime($row->EndTime))>date("Y-m-d",mySql2PhpTime($row->StartTime))?1:0), //more than one day event
        //$row->InstanceType,
        0,//Recurring event,
        $row->Color,
        1,//editable
        $row->Location, 
        ''//$attends
      );
    }
	}catch(Exception $e){
     $ret['error'] = $e->getMessage();
  }
  return $ret;
}

function listCalendar($day, $type){
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
  return listCalendarByRange($st, $et);
}

function updateCalendar($id, $st, $et){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "update appointments set"
      . " starttime='" . php2MySqlTime(js2PhpTime($st)) . "', "
      . " endtime='" . php2MySqlTime(js2PhpTime($et)) . "' "
      . "where id=" . $id;
    //echo $sql;
		if(pg_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] =  pg_last_error()();
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

function updateDetailedCalendar($id, $st, $et, $sub, $dscr, $loc, $color, $tz){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "update appointments set"
      . " starttime='" . php2MySqlTime(js2PhpTime($st)) . "', "
      . " endtime='" . php2MySqlTime(js2PhpTime($et)) . "', "
      . " subject='" . pg_escape_string($sub) . "', "
      . " description='" . pg_escape_string($dscr) . "', "
      . " location='" . pg_escape_string($loc) . "', "
      . " color='" . pg_escape_string($color) . "' "
      . "where id=" . $id;
    //echo $sql;
		if(pg_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] =  pg_last_error()();
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
    $sql = "delete from appointments where id=" . $id;
		if(pg_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] =  pg_last_error()();
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
$method = $_GET["method"];
switch ($method) {
    case "add":
        $ret = addCalendar($_POST["CalendarStartTime"], $_POST["CalendarEndTime"], $_POST["CalendarTitle"]);
        break;
    case "list":
        $ret = listCalendar($_POST["showdate"], $_POST["viewtype"]);
        break;
    case "update":
        $ret = updateCalendar($_POST["calendarId"], $_POST["CalendarStartTime"], $_POST["CalendarEndTime"]);
        break; 
    case "remove":
        $ret = removeCalendar( $_POST["calendarId"]);
        break;
    case "adddetails":
        $st = $_POST["stpartdate"] . " " . $_POST["stparttime"];
        $et = $_POST["etpartdate"] . " " . $_POST["etparttime"];
        if(isset($_GET["id"])){
            $ret = updateDetailedCalendar($_GET["id"], $st, $et, 
                $_POST["Subject"], $_POST["Description"], 
                $_POST["Location"], $_POST["colorvalue"], $_POST["timezone"]);
        }else{
            $ret = addDetailedCalendar($st, $et,                    
                $_POST["Subject"] $_POST["Description"], 
                $_POST["Location"], $_POST["colorvalue"], $_POST["timezone"]);
        }        
        break; 


}
echo json_encode($ret); 



?>
