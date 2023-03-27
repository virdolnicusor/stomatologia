<?php

class UsersModel extends DBModel
{
    protected $userName;
    protected $userEmail;
    protected $userPass;

    public function __construct($uName='N', $uEmail='E', $uPass='P'){
        $this->userName = $uName;
        $this->userEmail = $uEmail;
        $this->userPass = $uPass;
    }

    public function getDetails(){
        return $this->userName . ' are emailul '.
                $this->userEmail. ' și parola '.
                $this->userPass;
    }

    public function getUsers(){
        $q = "SELECT * FROM	`users_stomatologie`";
		$result = $this->db()->query($q);
		return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function delUser($id){
        $q = "DELETE FROM `users_stomatologie` WHERE `id` = $id;";
		$result = $this->db()->query($q);
		if($result) return true;
        else return false;
    }

    public function addUser($uName, $uPass, $uEmail = 'generic@email.ro'){
        $hashdPass = password_hash($uPass, PASSWORD_DEFAULT);
        $q = "INSERT INTO `users_stomatologie`
                (`userName`, `userEmail`, `userPass`, `hashedPass`)
                VALUES (?, ?, ?, ?);";
            $myPrep = $this->db()->prepare($q);
               $myPrep->bind_param("ssss", $uName, $uEmail, $uPass, $hashdPass);
        if($myPrep->execute()) {
            return true;
        }
        else {
            return false;
        }
          }

    public function modUser($id, $uName='NumeGeneric', $uPass='PassGeneric', $uEmail = 'generic@email.ro'){
        $hashdPass = password_hash($uPass, PASSWORD_DEFAULT);
        $q = "UPDATE `users_stomatologie` SET
                `userName`=?,`userEmail`=?,`userPass`=?,`hashedPass`= ?
            WHERE `id` = $id";
            $myPrep = $this->db()->prepare($q);
               $myPrep->bind_param("ssss", $uName, $uEmail, $uPass, $hashdPass);
        $myPrep->execute();
        $myPrep->close();
    }

    public function isAuth($uName, $uPass){
      
        $q = "SELECT * FROM `users_stomatologie` WHERE `userName` = ?";
        $myPrep = $this->db()->prepare($q);
        $myPrep->bind_param("s", $uName);
        $myPrep->execute();
        $result = $myPrep->get_result()->fetch_assoc();
        $myPrep->close();
        if(! $result) return false; 
        if(password_verify($uPass, $result['hashedPass'])){
            return true;
        }
        else {
            return false;
        }
       
    }

    public function displayData(){

        $dataArray = $this->getUsers();

        $table = '';

        if(is_array($dataArray)){
            $table .= '<table class="table table-striped"><tr>';
         
            foreach(array_keys($dataArray[0]) as $field){
                $table .= "<th>$field</th>";
            }
            $table .= '</tr>';
         
            foreach($dataArray as $user){
                $table .= '<tr>';
                foreach($user as $field=>$value){
                    $table .= "<td>$value</td>";
                }
                $table .= '</tr>';
            }
            $table .= '</table>';
        }
        return $table;  
    }
}