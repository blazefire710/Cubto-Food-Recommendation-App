<?php
include("ConnectionManager.php");

class Account {

  private $user_id;            // integer
  private $username;      // string
  private $password;      // string
  private $email; // string
  private $first_name;
  private $last_name;
  private $question;
  private $answer;

  public function __construct($user_id, $username, $password, $email, $first_name , $last_name ,$question ,$answer) {
    $this->user_id = $user_id;
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->question = $question;
    $this->answer = $answer;
  }

  public function getuser_id() {
    return $this -> user_id;
  }
  public function getusername() {
    return $this -> username;
  }
  public function getpassword() {
    return $this -> password;
  }
  public function getemail() {
    return $this -> email;
  }
  public function getfirst_name() {
    return $this -> first_name;
  }
  public function getlast_name() {
    return $this -> last_name;
  }
  public function question(){
    return $this->question;
  }
  public function answer(){
    return $this->answer;
  }
}

?>
