<?php 
//   
require_once("Account.php");

class AccountDAO {

    // This method checks to see if an account with $username exists in the database 'account' table.
    // If it exists, it returns an Account object.
    // Else, it returns null.
    public function signup($username, $password, $email, $first_name, $last_name, $question, $answer,$gender,$birthday,$profile_image, $bio) {
      // skeleton SQL
      $sql = "insert into User(username,password,email,first_name, last_name, question, answer, gender,birthday, profile_image, bio) 
      values ( :username, :password, :email, :first_name, :last_name, :question, :answer , :gender , :birthday , :profile_image , :bio);";
  
      $servername = 'localhost';
      $root = 'root';
      $db_pw = '';
      $dbname = 'cubto';
        
        // Create connection
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);     
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $password_hashed = password_hash($password, PASSWORD_DEFAULT);
  
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->bindParam(':password', $password_hashed, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
      $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
      $stmt->bindParam(':question', $question, PDO::PARAM_STR);
      $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
      $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
      $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
      $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
      $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);


      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
  
      $stmt = null;
      $conn = null;
  
      return null;
    }


    public function verify_account($username,$password_from_input) {
      
      $sql = "SELECT * FROM user where username = :username";
  
      $servername = 'localhost';
      $root = 'root';
      $db_pw = '';
      $dbname = 'cubto';
        // Create connection
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);     
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);

      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      
      if ($stmt->execute()) {
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          $user = new Account($row['user_id'],$row['username'],$row['password'],$row['email'],$row['first_name'],$row['last_name'],$row['question'],$row['answer'],$row['gender'],$row['birthday'],$row['profile_image'],$row['bio']);
        }

        if (isset($user)){
          $password_from_system = $user->getpassword();
          if (password_verify($password_from_input,$password_from_system)) {
            return true;}

          else{
            return false;}
        }
      }
      else{
        return false;
      }
      $stmt = null;
      $conn = null;
  
      return false;
    }

  public function retrieve_all($username){
    $sql = "SELECT * FROM user where username = :username";
  
    $servername = 'localhost';
    $root = 'root';
    $db_pw = '';
    $dbname = 'cubto';
      // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    if ($stmt->execute()) {
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      $user = new Account($row['user_id'],$row['username'],$row['password'],$row['email'],$row['first_name'],$row['last_name'],$row['question'],$row['answer'],$row['gender'],$row['birthday'],$row['profile_image'],$row['bio']);
    };
    $user_name = $user->getusername();
    $password =$user->getpassword();
    $email = $user->getemail();
    $first_name = $user->getfirst_name();
    $last_name = $user->getlast_name();
    $question = $user-> getQuestion();
    $answer = $user -> getAnswer();
    $gender = $user->getGender();
    $birthday = $user -> getBirthday();
    $profile_image = $user -> getProfile_image();
    $bio = $user -> getBio();


    $stmt = null;
    $conn = null;
    
    return [$user_name,$password,$email,$first_name,$last_name,$question,$answer,$gender,$birthday,$profile_image,$bio];
  }
  
  }


}
  
?>
