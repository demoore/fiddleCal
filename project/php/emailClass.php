<?php
/*******
 Sends messages to user email whether it be a password or email
 */

class email{
	private $email;
	private $subject;
	private $message;

	public function __construct($inEmail,$inSubject,$inMessage) {
		$this->email = $inEmail;
		$this->subject = $inSubject;
		$this->message = $inMessage;
		$this->send();
	}
	 
	function send(){
		return mail($this->email, $this->subject,
		$this->message, "From:" . "LallyGus@gmail.com");
	}


}

?>