<?php

 class database  {



     public function getAllUsers(){
         $db=mysqli_connect("localhost","root","","ett_laderas");

         $sql = "select *from users ";
        return mysqli_query($db,$sql);
     }

     public function changePass($res,$nres,$uss)
    {
        $db=mysqli_connect("localhost","root","","ett_laderas");

        $result = $this->getAllUsers();
        $encontrado = false;

        while (($fila = mysqli_fetch_array($result)) != NULL && !$encontrado ) {

            if ($uss == $fila['iduser'] && $res == $fila['password'] && $nres!=null) {
                $encontrado = true;
                mysqli_query($db, "update users set users.password='$nres' where users.iduser='$uss'");
                include 'succsess.html';
                include 'profile.php';
                header("refresh: 2; url=http://localhost/ett%20laderas/code/profile.php");

            } else {
                include 'alert.html';
                include 'profile.php';
                header("refresh: 2; url=http://localhost/ett%20laderas/code/profile.php");


            }

        }


    }

    public function findEmployee($name)
    {
        $result = $this->getAllUsers();


        while (($fila = mysqli_fetch_array($result)) != NULL) {

            if ($name == $fila['name'] or $name == $fila['surname']) {

                $array[] = $fila;
            }
        }

    }



}
















/*if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'insert':
            insert();
            break;
        case 'select':
            select();
            break;
    }
}
*/
?>