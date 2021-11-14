<?php 
//   
//Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


require_once("Account.php");

class AccountDAO {

    // This method checks to see if an account with $username exists in the database 'account' table.
    // If it exists, it returns an Account object.
    // Else, it returns null.
    public function signup($username, $password, $email, $first_name, $last_name, $question, $answer,$gender,$birthday,$profile_image, $bio) {
      // skeleton SQL
      $sql = "insert into User(username,password,email,first_name, last_name, question, answer, gender,birthday, profile_image, bio) 
      values ( :username, :password, :email, :first_name, :last_name, :question, :answer , :gender , :birthday , :profile_image , :bio);";
  
      $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
      // $servername = 'localhost';
      $servername = $cleardb_url["host"];
      $root = $cleardb_url["user"];
      $db_pw = $cleardb_url["pass"];
      // $dbname = 'cubto';
      $dbname = substr($cleardb_url["path"],1);
      $active_group = 'default';
      $query_builder = TRUE;
        
        // Create connection
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);  
      // $conn = mysqli_connect($servername, $root, $db_pw, $dbname);   
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
  
      $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
      // $servername = 'localhost';
      $servername = $cleardb_url["host"];
      $root = $cleardb_url["user"];
      $db_pw = $cleardb_url["pass"];
      // $dbname = 'cubto';
      $dbname = substr($cleardb_url["path"],1);
      $active_group = 'default';
      $query_builder = TRUE;

        // Create connection
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);     
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);

      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      
      if ($stmt->execute()) {
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          $user = new Account($row['username'],$row['password'],$row['email'],$row['first_name'],$row['last_name'],$row['question'],$row['answer'],$row['gender'],$row['birthday'],$row['profile_image'],$row['bio']);
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
  
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $servername = 'localhost';
    $servername = $cleardb_url["host"];
    $root = $cleardb_url["user"];
    $db_pw = $cleardb_url["pass"];
    // $dbname = 'cubto';
    $dbname = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;

      // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

  if ($stmt->execute()) {
      while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $user = new Account($row['username'],$row['password'],$row['email'],$row['first_name'],$row['last_name'],$row['question'],$row['answer'],$row['gender'],$row['birthday'],$row['profile_image'],$row['bio']);
      };
      $user_name = $user->getusername();
      $answer = $user -> getAnswer();
      $gender = $user->getGender();
      $birthday = $user -> getBirthday();
      $profile_image = $user -> getProfile_image();
      $bio = $user -> getBio();
      
      $password = $user -> getpassword();
      $email = $user -> getemail();
      $first_name = $user -> getfirst_name();
      $last_name = $user -> getlast_name();
      $question = $user -> getQuestion();


      $stmt = null;
      $conn = null;
      
      return [$user_name,$password,$email,$first_name,$last_name,$question,$answer,$gender,$birthday,$profile_image,$bio];
      }
  }
  public function existing_account($username){

    $sql = "select * from user where username= :username";
    // $servername = 'localhost';
    // $root = 'root';
    // $db_pw = '';
    // $dbname = 'cubto';

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $servername = 'localhost';
    $servername = $cleardb_url["host"];
    $root = $cleardb_url["user"];
    $db_pw = $cleardb_url["pass"];
    // $dbname = 'cubto';
    $dbname = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
      
      // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);  
    // $conn = mysqli_connect($servername, $root, $db_pw, $dbname);   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      $stmt =null;
      $conn = null;
      return true;
    }
    else{
      $stmt = null;
      $conn = null;
      return false;
    }
  }

  public function existing_wishlist($username, $restaurant_name){

    $sql = "select * from wishlist where username= :username and restaurant_name= :restaurant_name";// change this sql to find the particular 

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $servername = 'localhost';
    $servername = $cleardb_url["host"];
    $root = $cleardb_url["user"];
    $db_pw = $cleardb_url["pass"];
    // $dbname = 'cubto';
    $dbname = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;

    // $servername = 'localhost';
    // $root = 'root';
    // $db_pw = '';
    // $dbname = 'cubto';
      // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':restaurant_name', $restaurant_name, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      $stmt =null;
      $conn = null;
      return true;
    }
    else{
      $stmt = null;
      $conn = null;
      return false;
    }
  }

  public function verify_qna($username, $user_question, $user_answer){

    $sql = "SELECT * FROM user where username = :username";

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $servername = 'localhost';
    $servername = $cleardb_url["host"];
    $root = $cleardb_url["user"];
    $db_pw = $cleardb_url["pass"];
    // $dbname = 'cubto';
    $dbname = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;

    // $servername = 'localhost';
    // $root = 'root';
    // $db_pw = '';
    // $dbname = 'cubto';
      // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    if ($stmt->execute()) {
      while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $user = new Account($row['username'],$row['password'],$row['email'],$row['first_name'],$row['last_name'],$row['question'],$row['answer'],$row['gender'],$row['birthday'],$row['profile_image'],$row['bio']);
    };
  }
    
  if(isset($user)){
    $database_question = $user->getQuestion();
    $database_answer = $user -> getAnswer();
    
    if($database_question == $user_question && $database_answer == $user_answer){
      $stmt =null;
      $conn = null;
      return true;
    }
    else{
      $stmt =null;
      $conn = null;
      return false;
    }
  }
  else {
    $stmt =null;
    $conn = null;
    return false;
  }

  }

  public function retrieve_all_wishlist($username) {
    $sql = "SELECT * FROM wishlist where username = :username";

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $servername = 'localhost';
    $servername = $cleardb_url["host"];
    $root = $cleardb_url["user"];
    $db_pw = $cleardb_url["pass"];
    // $dbname = 'cubto';
    $dbname = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;

    // $servername = 'localhost';
    // $root = 'root';
    // $db_pw = '';
    // $dbname = 'cubto';
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $result = [];

    while ($row = $stmt->fetch()) {
      $restaurant_name = $row['restaurant_name'];
      $ratings = $row['ratings'];
      $address = $row['restaurant_address'];
      $description = $row['restaurant_description'];
      $restaurant_image = $row['restaurant_image'];

      $result[] = [$restaurant_name, $ratings, $address, $description, $restaurant_image];
    }

    return $result;
  }

  public function add_to_wishlist($username, $restaurant_name, $ratings, $restaurant_address, $restaurant_description, $restaurant_image) {
    // skeleton SQL
    $restaurant_type = "";
    $sql = "insert into wishlist(username,restaurant_name,ratings,restaurant_address, restaurant_description, restaurant_image) 
    values (:username,:restaurant_name,:ratings,:restaurant_address, :restaurant_description, :restaurant_image);";

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $servername = 'localhost';
    $servername = $cleardb_url["host"];
    $root = $cleardb_url["user"];
    $db_pw = $cleardb_url["pass"];
    // $dbname = 'cubto';
    $dbname = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;

    // $servername = 'localhost';
    // $root = 'root';
    // $db_pw = '';
    // $dbname = 'cubto';
      
      // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':restaurant_name', $restaurant_name, PDO::PARAM_STR);
    $stmt->bindParam(':ratings', $ratings, PDO::PARAM_STR);
    $stmt->bindParam(':restaurant_address', $restaurant_address, PDO::PARAM_STR);
    $stmt->bindParam(':restaurant_description', $restaurant_description, PDO::PARAM_STR);
    $stmt->bindParam(':restaurant_image', $restaurant_image, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $stmt = null;
    $conn = null;

    return null;
  }

  public function delete_wishlist($username, $restaurant_name){

    $sql = "delete from wishlist where username= :username and restaurant_name= :restaurant_name";

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $servername = 'localhost';
    $servername = $cleardb_url["host"];
    $root = $cleardb_url["user"];
    $db_pw = $cleardb_url["pass"];
    // $dbname = 'cubto';
    $dbname = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;

    // $servername = 'localhost';
    // $root = 'root';
    // $db_pw = '';
    // $dbname = 'cubto';
      // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':restaurant_name', $restaurant_name, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    // if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    //   $stmt =null;
    //   $conn = null;
    //   return true;
    // }
    // else{
    //   $stmt = null;
    //   $conn = null;
    //   return false;
    // }
  }

  public function change_password($username,$password_input){
    $sql = "update User set password= :password where username = :username";

    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $servername = 'localhost';
    $servername = $cleardb_url["host"];
    $root = $cleardb_url["user"];
    $db_pw = $cleardb_url["pass"];
    // $dbname = 'cubto';
    $dbname = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;

    // $servername = 'localhost';
    // $root = 'root';
    // $db_pw = '';
    // $dbname = 'cubto';
      // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql);

    $password_hashed = password_hash($password_input,PASSWORD_DEFAULT);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password_hashed, PDO::PARAM_STR);

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    if($stmt->execute()){
      $stmt =null;
      $conn = null;
      return true;
    }
    else{
      $stmt =null;
      $conn = null;
      return false;
    }

  }

  public function update_account($username,$email,$gender,$bio,$first_name,$last_name,$profile_image,$birthday){
    if($profile_image == ""){
      $sql = "update User set email= :email, gender = :gender, bio = :bio, first_name = :first_name, last_name= :last_name, birthday= :birthday where username = :username";
      
      $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
      // $servername = 'localhost';
      $servername = $cleardb_url["host"];
      $root = $cleardb_url["user"];
      $db_pw = $cleardb_url["pass"];
      // $dbname = 'cubto';
      $dbname = substr($cleardb_url["path"],1);
      $active_group = 'default';
      $query_builder = TRUE;

      // $servername = 'localhost';
      // $root = 'root';
      // $db_pw = '';
      // $dbname = 'cubto';
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare($sql);

      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
      $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
      $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
      $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
      $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);

      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();

      if($stmt->execute()){
        $stmt =null;
        $conn = null;
        return true;
      }
      else{
        $stmt =null;
        $conn = null;
        return false;
      }

      
  }
    else {
      $sql = "update User set email= :email, gender = :gender, bio = :bio, first_name = :first_name, last_name= :last_name, birthday= :birthday, profile_image = :profile_image where username = :username";
      
      $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
      // $servername = 'localhost';
      $servername = $cleardb_url["host"];
      $root = $cleardb_url["user"];
      $db_pw = $cleardb_url["pass"];
      // $dbname = 'cubto';
      $dbname = substr($cleardb_url["path"],1);
      $active_group = 'default';
      $query_builder = TRUE;

      // $servername = 'localhost';
      // $root = 'root';
      // $db_pw = '';
      // $dbname = 'cubto';
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $root, $db_pw);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare($sql);

      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
      $stmt->bindParam(':bio', $bio, PDO::PARAM_STR);
      $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
      $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
      $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
      $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
      $stmt->bindParam(':username', $username, PDO::PARAM_STR);

      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();

      if($stmt->execute()){
        $stmt =null;
        $conn = null;
        return true;
      }
      else{
        $stmt =null;
        $conn = null;
        return false;
      }
    }

  }

}


  
?>