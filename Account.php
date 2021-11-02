<?php
require_once("ConnectionManager.php");
// test

class Account {

  private $username;
  private $password;
  private $email; 
  private $first_name;
  private $last_name;
  private $question;
  private $answer;
  private $gender;
  private $birthday;
  private $profile_image;
  private $bio;

  public function __construct($username, $password, $email, $first_name, $last_name , $question ,$answer ,$gender,$birthday,$profile_image,$bio) {
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->question = $question;
    $this->answer = $answer;
    $this->gender =$gender;
    $this->birthday = $birthday;
    $this->profile_image = $profile_image;
    $this->bio=$bio;
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
  public function getQuestion(){
    return $this->question;
  }
  public function getAnswer(){
    return $this->answer;
  }

  public function getGender(){
    return $this->gender;
  }
  public function getBirthday(){
    return $this->birthday;
  }
  public function getProfile_image(){
    return $this->profile_image;
  }
  public function getBio(){
    return $this->bio;
  }
}

class wishlist{
  private $username;
  private $restaurant_name;
  private $ratings;
  private $restaurant_address;
  private $restaurant_category;
  private $restaurant_comment;
  private $restaurant_description;
  private $your_experience;
  private $food_experience;
  private $customer_service;
  private $cleanliness;
  
  public function __construct($username,$restaurant_name,$ratings,$restaurant_address,$restaurant_category,$restaurant_comment,$restaurant_description,$your_experience,$food_experience,$customer_service,$cleanliness)
  {
    $this->username = $username;
    $this->restaurant_name = $restaurant_name;
    $this->ratings = $ratings;
    $this->restaurant_address = $restaurant_address;
    $this->restaurant_categoryt = $restaurant_category;
    $this->restaurant_comment = $restaurant_comment;
    $this->restaurant_description = $restaurant_description;
    $this->your_experience = $your_experience;
    $this->food_experience = $food_experience;
    $this->customer_service =$customer_service;
    $this->cleanliness = $cleanliness;
  }
  public function getUsername(){
    return $this->username;
  }
  public function getRestaurant_name(){
    return $this->restaurant_name;
  }
  public function getRatings(){
    return $this->ratings;
  }
  public function getRestaurant_address(){
    return $this->restaurant_address;
  }
  public function getRestaurant_category(){
    return $this->restaurant_category;
  }
  public function getYour_experience(){
    return $this->your_experience;
  }
  public function getFood_experience(){
    return $this->food_experience;
  }
  public function getCustomer_service(){
    return $this->customer_service;
  }
  public function getRestaurant_comment(){
    return $this->restaurant_comment;
  }

  public function getRestaurant_description() {
    return $this->restaurant_description;
  }
  
  public function getCleanliness(){
    return $this->cleanliness;
  }
}


?>
