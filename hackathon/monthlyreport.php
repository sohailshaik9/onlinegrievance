<<?php
require_once("dbcredentials.php");
require_once("logs.php");

/**
 * Developed by ,
 */
class Viewgrievance extends DBCredentials
{
	private $classname = "Viewgrievance";
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

	

	public function viewgrievance(){
		$myname = $this->classname." - viewGrievance - ";
		$res = array();
		$res['status'] = 0;
		$status="new";
		if($this->myerr==0 && !empty($this->myconn)){
				
				  $sqlqry = "SELECT `grievanceid`,`gtype`,`complaint` FROM `complaints` WHERE status='new'";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				if($stmt->execute()){
					$i=-1;
					$stmt->bind_result($grievanceid,$gtype,$complaint);
					while($row=$stmt->fetch()){
						$i++;
						$result[$i]['grievanceid']=$row['grievanceid'];
					    $result[$i]['gtype']=$row['gtype'];
                        $result[$i]['complaint']=$row['complaint'];

					}	
		}
		else{
			$this->logs->errLog($myname."Statementnot executed");

		}
			}
			else{
				$this->logs->errLog($myname."Prepared Statement ERROR");

			}
		}

		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}
		return $result;
	}
		
	
public function getmonthlystatus()
{
	$myname = $this->classname." - viewGrievance - ";
		$res = array();
		$res['status'] = 0;
		$currmonth=date('m');
		if($this->myerr==0 && !empty($this->myconn)){
				
				  $sqlqry = "SELECT `grievanceid`,`gtype`,`complaint`,`status` FROM `complaints` WHERE month=?;";
			if ($stmt = $this->myconn->prepare($sqlqry)) {
				$stmt->bind_param("i",$currmonth);
				if($stmt->execute()){
					$i=-1;
					$stmt->bind_result($grievanceid,$gtype,$complaint,$status);
					while($row=$stmt->fetch()){
						$i++;
						$result[$i]['grievanceid']=$grievanceid;
					    $result[$i]['gtype']=$gtype;
                        $result[$i]['complaint']=$complaint;
                         $result[$i]['status']=$status;

					}	
		}
		else{
			$this->logs->errLog($myname."Statementnot executed");

		}
			}
			else{
				$this->logs->errLog($myname."Prepared Statement ERROR");

			}
		}

		else{
			$this->logs->errLog($myname."Mysqli Error or else");
		}
		
		return $result;
}
	
	
	

	public function __destruct(){
		if(!empty($this->myconn)){
		  $this->myconn->close();
		}
	}

}

 ?>
