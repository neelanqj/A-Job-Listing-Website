<?php
//include '../../src/library/custom/validator.php';

class JobService
{
	protected $_email;    // using protected so they can be accessed
    protected $_password; // and overidden if necessary
	protected $_ipaddress;
	protected $_passcode;
	protected $_sessionid;
	
    protected $_db;       // stores the database handler
	protected $_jbid;

	// Login Credentials
    public function __construct(PDO $db, $email, $password, $sessionid, $ipaddress, $passcode) 
    {
		//echo "Class Userservice.<br/>";
		$this->_db = $db;
		$this->_jbid = 0;
		
		$this->_email = $email;
		$this->_password = $password;
		$this->_sessionid = $sessionid;
		$this->_ipaddress = $ipaddress;
		$this->_passcode = $passcode;
    }
	
	// User Signup
	public function createJob(
							   $company
							   , $title
							   , $country
							   , $region
							   , $city
							   , $address1
							   , $address2
							   , $postalcode
							   , $contactname
							   , $contactphonenumber
							   , $contactemail
							   , $hidecontactemail
							   , $hidecontactphonenumber
							   , $expirationdate
							   , $description
							   , $category
							   , $education
							   , $careerlvl
							   , $minsalary
							   , $maxsalary) 
	 {
		if ( !empty($company)
			&& !empty($title) 
			&& !empty($contactname) 
			&& !empty($contactemail) 
			&& !empty($country)
			&& !empty($city)
			&& !empty($description)) {
		
				$stmt = $this->_db->prepare("CALL JB_JOB (?,?,?,?,?,'CREATEJOB',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'','',null)");
		
				$stmt->bindValue(1, $this->_email, PDO::PARAM_STR);
				$stmt->bindValue(2, $this->_password, PDO::PARAM_STR);
				$stmt->bindValue(3, $this->_sessionid, PDO::PARAM_STR);
				$stmt->bindValue(4, $this->_passcode, PDO::PARAM_STR);
				$stmt->bindValue(5, $this->_ipaddress, PDO::PARAM_STR);
				$stmt->bindValue(6, $company, PDO::PARAM_STR);
				$stmt->bindValue(7, $title, PDO::PARAM_STR);
				$stmt->bindValue(8, $country, PDO::PARAM_STR);
				$stmt->bindValue(9, $region, PDO::PARAM_STR);
				$stmt->bindValue(10, $city, PDO::PARAM_STR);
				$stmt->bindValue(11, $address1, PDO::PARAM_STR);
				$stmt->bindValue(12, $address2, PDO::PARAM_STR);
				$stmt->bindValue(13, $postalcode, PDO::PARAM_STR);
				$stmt->bindValue(14, $contactname, PDO::PARAM_STR);
				$stmt->bindValue(15, $contactphonenumber, PDO::PARAM_STR);
				$stmt->bindValue(16, $contactemail, PDO::PARAM_STR);
				$stmt->bindValue(17, is_null($hidecontactemail)?false:$hidecontactemail, PDO::PARAM_BOOL);
				$stmt->bindValue(18, is_null($hidecontactphonenumber)?false:$hidecontactphonenumber, PDO::PARAM_BOOL);
				$stmt->bindValue(19, $expirationdate, PDO::PARAM_STR);
				$stmt->bindValue(20, $description, PDO::PARAM_STR);
				$stmt->bindValue(21, $category, PDO::PARAM_STR);
				$stmt->bindValue(22, $education, PDO::PARAM_STR);
				$stmt->bindValue(23, $careerlvl, PDO::PARAM_STR);
				$stmt->bindValue(24, $minsalary, PDO::PARAM_STR);
				$stmt->bindValue(25, $maxsalary, PDO::PARAM_STR);
				$stmt->execute();

				$this->_jbid = $stmt->fetch()['jbid'];
				// echo json_encode($stmt->fetchAll());
				echo '[{"success":"1"}]';
				return true;
		} else {
				echo '[{"success":"0"}]';
				return false;
		}
	}
	
	public function removeJob ($userID, $jobID) {
		$stmt = $this->_db->prepare("CALL JB_JOB (?,?,?,?,?,'REMOVEJOB','','','','','','','','','','','','','','','','','','','0','0',?,'',?)");
		
		$stmt->bindValue(1, $this->_email, PDO::PARAM_STR);
		$stmt->bindValue(2, $this->_password, PDO::PARAM_STR);
		$stmt->bindValue(3, $this->_sessionid, PDO::PARAM_STR);
		$stmt->bindValue(4, $this->_passcode, PDO::PARAM_STR);
		$stmt->bindValue(5, $this->_ipaddress, PDO::PARAM_STR);
		$stmt->bindValue(6, $userID, PDO::PARAM_STR);
		$stmt->bindValue(7, $jobID, PDO::PARAM_STR);
		$stmt->execute();

		print json_encode($stmt->fetchAll());
	}
	
		// User Signup
	public function addSkill(
							   $name
							   , $experience
							   , $mandatory
							   ) 
	 {
		$stmt = $this->_db->prepare("CALL JB_JOB_SKILL ('ADDSKILL',?,?,?,?)");
		$stmt->bindValue(1, $this->_jbid, PDO::PARAM_INT);
		$stmt->bindValue(2, $name, PDO::PARAM_STR);
		$stmt->bindValue(3, $experience, PDO::PARAM_INT);
		$stmt->bindValue(4, $mandatory, PDO::PARAM_BOOL);
		$stmt->execute();
	 }
	 
	// User Signup
	public function listSkills(
							   $session
							   , $experience
							   , $mandatory
							   ) 
	 {
		$stmt = $this->_db->prepare("CALL JB_JOB_SKILL ('LISTSKILL',?,?,?,?)");
		$stmt->bindValue(1, $this->_jbid, PDO::PARAM_INT);
		$stmt->bindValue(2, $name, PDO::PARAM_STR);
		$stmt->bindValue(3, $experience, PDO::PARAM_INT);
		$stmt->bindValue(4, $mandatory, PDO::PARAM_BOOL);
		$stmt->execute();
	 }
	 
	 public function search($skills, $location, $filter, $pagenum, $perpage)
	 {
		$stmt = $this->_db->prepare("CALL JB_JOB_SEARCH ('SEARCH',?,?,?,?,?)");
		$stmt->bindValue(1, $filter, PDO::PARAM_STR);
		$stmt->bindValue(2, $skills, PDO::PARAM_STR);
		$stmt->bindValue(3, $location, PDO::PARAM_STR);
		$stmt->bindValue(4, $pagenum, PDO::PARAM_INT);
		$stmt->bindValue(5, $perpage, PDO::PARAM_INT);
		$stmt->execute();
		
		print json_encode($stmt->fetchAll());
	 }
	 
	 public function searchCount($skills, $location, $filter, $pagenum, $perpage)
	 {
		$stmt = $this->_db->prepare("CALL JB_JOB_SEARCH ('COUNT',?,?,?,?,?)");
		$stmt->bindValue(1, $filter, PDO::PARAM_STR);
		$stmt->bindValue(2, $skills, PDO::PARAM_STR);
		$stmt->bindValue(3, $location, PDO::PARAM_STR);
		$stmt->bindValue(4, $pagenum, PDO::PARAM_INT);
		$stmt->bindValue(5, $perpage, PDO::PARAM_INT);
		$stmt->execute();
		
		print json_encode($stmt->fetchAll());
	 }
	 
	 public function getProfile($jbid)
	 {
		$stmt = $this->_db->prepare("CALL JB_JOB ('<emailaddress>' ,'<password>' ,'<sessionid>','<passcode>','<ipaddress>'													 										,'JOBDETAILS','','','','','','','','','','','',false,false,'','','','','','','','','',?)");

		$stmt->bindValue(1, $jbid, PDO::PARAM_INT);
		$stmt->execute();

		print json_encode($stmt->fetchAll());
	 }
	 
	 public function getJobSkills($jbid) {
		$stmt = $this->_db->prepare("CALL JB_JOB_SKILL ('LISTSKILLS',?,'','','')");
		$stmt->bindValue(1, $jbid, PDO::PARAM_INT);
		$stmt->execute();
		
		print json_encode($stmt->fetchAll());
	 }
	 
	 
	 public function myJobList($uid) {
		$stmt = $this->_db->prepare("CALL JB_JOB (?, '<password>',?,?,?,'MYPOSTEDJOBLIST','','','',
												  '','','','','','','','',false,false,'','','','','','','',?,'','')");

		$stmt->bindValue(1, $this->_email, PDO::PARAM_STR);
		$stmt->bindValue(2, $this->_sessionid, PDO::PARAM_STR);
		$stmt->bindValue(3, $this->_passcode, PDO::PARAM_STR);
		$stmt->bindValue(4, $this->_ipaddress, PDO::PARAM_STR);
		$stmt->bindValue(5, $uid, PDO::PARAM_INT);
		$stmt->execute();

		print json_encode($stmt->fetchAll());
	 }	 
	 
	  public function myApplyList($uid) {
		$stmt = $this->_db->prepare("CALL JB_USER_EMPLOYER (?,?,?,?,'JOBLIST',?,'','','')");

		$stmt->bindValue(1, $this->_email, PDO::PARAM_STR);
		$stmt->bindValue(2, $this->_sessionid, PDO::PARAM_STR);
		$stmt->bindValue(3, $this->_passcode, PDO::PARAM_STR);
		$stmt->bindValue(4, $this->_ipaddress, PDO::PARAM_STR);
		$stmt->bindValue(5, $uid, PDO::PARAM_INT);
		
		$stmt->execute();

		print json_encode($stmt->fetchAll());
	 }	 
	 
	 public function listJobApplicants($jobID) {
		$stmt = $this->_db->prepare("CALL JB_JOB (?, '<password>',?,?,?,'JOBAPPLICATIONS','','','',
							  '','','','','','','','',false,false,'','','','','','','','','',?)");

		$stmt->bindValue(1, $this->_email, PDO::PARAM_STR);
		$stmt->bindValue(2, $this->_sessionid, PDO::PARAM_STR);
		$stmt->bindValue(3, $this->_passcode, PDO::PARAM_STR);
		$stmt->bindValue(4, $this->_ipaddress, PDO::PARAM_STR);
		$stmt->bindValue(5, $jobID, PDO::PARAM_INT);
		$stmt->execute();

		print json_encode($stmt->fetchAll());
	 }
	 
	 public function jobApplicationInfo($jaID) {
		$stmt = $this->_db->prepare("CALL JB_JOB (?, '<password>',?,?,?,'JOBAPPLICATIONINFO','','','','','','','','','','','',false,false,'','','','','','','','','',?)");

		$stmt->bindValue(1, $this->_email, PDO::PARAM_STR);
		$stmt->bindValue(2, $this->_sessionid, PDO::PARAM_STR);
		$stmt->bindValue(3, $this->_passcode, PDO::PARAM_STR);
		$stmt->bindValue(4, $this->_ipaddress, PDO::PARAM_STR);
		$stmt->bindValue(5, $jaID, PDO::PARAM_INT);
		$stmt->execute();

		print json_encode($stmt->fetchAll());
	 }
	 
	 public function applyJob($uid, $resume, $coverletter, $jid) {
		$stmt = $this->_db->prepare("CALL JB_USER_EMPLOYER (?,?,?,?,'APPLYJOB',?,?,?,?,@contactemailout)");

		$stmt->bindValue(1, $this->_email, PDO::PARAM_STR);
		$stmt->bindValue(2, $this->_sessionid, PDO::PARAM_STR);
		$stmt->bindValue(3, $this->_passcode, PDO::PARAM_STR);
		$stmt->bindValue(4, $this->_ipaddress, PDO::PARAM_STR);
		$stmt->bindValue(5, $uid, PDO::PARAM_INT);
		$stmt->bindValue(6, $jid, PDO::PARAM_INT);
		$stmt->bindValue(7, $resume, PDO::PARAM_STR);
		$stmt->bindValue(8, $coverletter, PDO::PARAM_STR);		
		
		$stmt->execute();
                print json_encode($stmt->fetchAll());

                $stmt->closeCursor();
                $contactemail = $this->_db->query("select @contactemailout")->fetch(PDO::FETCH_ASSOC);

                $this->sendEmail($contactemail["@contactemailout"].",".$this->_email, "application@juggerjobs.com", 'Jugger Jobs, Job Application '.$jid, 'test'.$coverletter.'


'.$resume, 'From: webmaster@juggerjobs.com' . '\r\n' . 'Reply-To: noreply@juggerjobs.com' . '\r\n');
		
		
		 
	 }

	public function sendEmail($to, $from, $subject, $comment) {
		// this is what will happen if the forum has been submitted.
		$header = "From: $from";
		$message = "$comment";
		
		if($subject){
			 if($from){
				 if($comment){
					 mail($to, $subject, $message, $header);
					 return true;
				 }else{
					 echo "<div class='text-center'><br/><br/><br/>Please enter a comment.</div>";
				 }
			 }else{
				 echo "<div class='text-center'><br/><br/><br/>Please enter an email.</div>";
			 }
		 } else {
			 echo "<div class='text-center'><br/><br/><br/>Please enter a name.</div>";
		 }
		 return 0;
	}
}
?>