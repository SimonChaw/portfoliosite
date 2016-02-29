<?php



 $filename = $_FILES['file']['name'];
  $contacts = $_POST['contact'];
  foreach($contacts as $contact) {
    echo "Name: " + $contact['name'] + "\n";
    echo "E-mail: " + $contact['email'] + "\n";
  }
  $destination = '../assets/img/users/' . $filename;
  move_uploaded_file( $_FILES['file']['tmp_name'] , $destination );


?>