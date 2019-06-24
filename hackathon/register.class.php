<?php
require_once("dbcredentials.php");
require_once("logs.php");

/**
 * Developed by ,
 */
class Register extends DBCredentials
{
	private $classname = "Register";
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

	

	public function addDetails($rollno,$name,$mail,$pwd){
		$myname = $this->classname." - addDetails - ";
		$res = array();
		$res['status'] = 0;

		if($this->myerr==0 && !empty($this->myconn)){
			
		  $sqlqry = "INSERT INTO `details`(`rollno`,`name`,`mail`,`pwd`) VALUES (?,?,?,?)";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("ssss",$rollno,$name,$mail,$pwd);
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
	
	
	public function checkRegister($rollno){
		$myname = $this->classname." - checkRegister - ";
		$res = array();
		$res['status'] = 0;

		if($this->myerr==0 && !empty($this->myconn)){
			
		  $sqlqry = "SELECT name FROM details WHERE rollno=?";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("s",$rollno);
				if($stmt->execute()){
					$stmt->bind_result($name);
					
					while($stmt->fetch()){
						$res['status'] = 1;
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
	

	
	
	

	public function __destruct(){
		if(!empty($this->myconn)){
		  $this->myconn->close();
		}
	}

}

 ?>
