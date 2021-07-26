<?php 
   foreach ($data["users"] as $user) {
     echo $user->userId . " ". $user->userName. " ".$user->password;
     echo "<br/>";
   }
?>