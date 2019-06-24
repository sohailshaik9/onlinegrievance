<?php
require_once("dbcredentials.php");
require_once("logs.php");

/**
 * Developed by ,
 */
class Grievance extends DBCredentials
{
	private $classname = "Grievance";
	private $logs = "";
	private $myconn = "";
	private $myerr = 0;

	public function __construct()
	{
		$this->logs = new Logs();
		$this->myconn = new mysqli($this->getHost(),$this->getUser(),$this->getPass(),$this->getDb());

		if (mysqli_connect_errno()) {
			$this->myerr = mysqli_connect_errno();
		}
	}


	public function addGrievance($rollno,$complaint,$yearofstudy,$program,$gtype){
		$myname = $this->classname." - addGrievance - ";
		$res = array();
		$res['status'] = 0;
		$status="new";
		$t=time();
		$month=date('m');
		$raisedon = date("d-m-Y H:i:s",$t);
		if($this->myerr==0 && !empty($this->myconn)){
				
				  $sqlqry = "SELECT MAX( slno ) FROM `complaints`";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				if($stmt->execute()){
					$stmt->bind_result($max);
					while($stmt->fetch()){
						$slnomax=$max;
						$slnomax++;
					}
			
		}
			}
		}

		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}
		$no=str_pad($slnomax, 5, '0', STR_PAD_LEFT);
		$grievanceid="grievance".$no;







		if($this->myerr==0 && !empty($this->myconn)){
			
		  $sqlqry = "INSERT INTO `complaints`(`rollno`,`complaint`,`yearofstudy`,`program`,`gtype`,`raisedon`,`status`,`grievanceid`,`month`) VALUES (?,?,?,?,?,?,?,?,?)";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ssssssssi",$rollno,$complaint,$yearofstudy,$program,$gtype,$raisedon,$status,$grievanceid,$month);
				if($stmt->execute()){
					if($this->myconn->affected_rows){
					  $res['status'] = 1;
					  $res['rows_affected'] = $this->myconn->affected_rows;
					}
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}




	public function getgrievancebyid($rollno){
		$res = array();
		$res['xstatus'] = 0;
		//$dt=date('Ymd');
        $myname = $this->classname." - getgrievancebyid - ";
		if($this->myerr==0 && !empty($this->myconn)){
			  $sqlqry = "SELECT `complaint`,`raisedon`,`status`,`grievanceid` FROM `complaints` WHERE `rollno`=?";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("s",$rollno);
				if($stmt->execute()){
					$stmt->bind_result($complaint,$raisedon,$status,$grievanceid);
					$i=0;
					while($stmt->fetch()){
						$res['xstatus'] = 1;
						$res[$i]['complaint']=$complaint;
						$res[$i]['raisedon'] = $raisedon;
					    $res[$i]['status'] = $status;
					      $res[$i]['gid'] = $grievanceid;
						
						$i++;
					}
					$res['ival']=$i;
				}
				else{
					$this->logs->errLog($myname."Statement not executed".$this->myconn->error);
				}
			}
			else{
				$this->logs->errLog($myname."Not prepared");
			}
		}
		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}

		return $res;
	}
	
	
	
	
	
	

	public function __destruct(){
		if(!empty($this->myconn)){
		  $this->myconn->close();
		}
	}

}

 ?>
