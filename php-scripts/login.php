<?php

/**
 * Class login
 * handles the user's login and logout process
 */
include("config/db.php");

// create/read session, absolutely necessary
session_start();
dologinWithPostData();
    
    /**
     * log in with post data
     */
    
    function dologinWithPostData()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        foreach($request as $data){
            $data = mysqli_real_escape_string($data);
        }
        @$user = $request->user;
        @$pass = $request->pass;
        // check login form contents
        if (empty($user)) {
            echo "Please enter a username";
        } elseif (empty($pass)) {
            echo "Please enter a password";
        } elseif (!empty($user) && !empty($pass)) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)

            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT userid, password
                        FROM login
                        WHERE userid = '$user';";
                $result_of_login_check = $conn->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if ($pass == $result_row->password) {

                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['user_name'] = $result_row->userid;
                        $_SESSION['user_login_status'] = 1;
                        echo "success";

                    } else {
                        echo "Wrong password. Try again.";
                    }
                } else {
                    echo "This user doesn't exist";
                }
        }
    }
    

    /**
     * perform the logout
     
    function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     

    function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
 */
?>
