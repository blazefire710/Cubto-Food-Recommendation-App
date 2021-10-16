<?php 


class AccountDAO {

    // This method checks to see if an account with $username exists in the database 'account' table.
    // If it exists, it returns an Account object.
    // Else, it returns null.
    public function signup($user_id, $username, $password, $email, $first_name, $last_name, $question, $answer) {
      // skeleton SQL
      $sql = "insert into User(user_id,username,password,email,first_name, last_name, question, answer) 
      values (:user_id, :username, :password, :email, :first_name, :last_name, :question, :answer);";
  
      $servername = 'localhost';
      $username = 'root';
      $password = '';
      $dbname = 'cubto';
        
        // Create connection
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);     
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->bindParam(':password', $password, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
      $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
      $stmt->bindParam(':question', $question, PDO::PARAM_STR);
      $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);

      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
  
      $stmt = null;
      $conn = null;
  
      return null;
    }
  
  }
  
?>
