<?php
require_once("dbcredentials.php");
require_once("logs.php");

/**
 * Developed by ,
 */
class login extends DBCredentials
{
	private $classname = "login";
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

	

	
	
	public function checkLogin($rollno){
		$myname = $this->classname." - checkLogin - ";
		$res = array();
		$res['status'] = 0;

		if($this->myerr==0 && !empty($this->myconn)){
			
		  $sqlqry = "SELECT pwd FROM details WHERE rollno=?";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("s",$rollno);
				if($stmt->execute()){
					$stmt->bind_result($pwd);
					
					while($stmt->fetch()){
						$res['status']=1;
						$res['pwd']=$pwd;
					
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
