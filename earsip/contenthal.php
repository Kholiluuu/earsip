<?php
@$haladmin = $_GET['haladmin'];
if($haladmin =="inputhal")
{
    include "modul/input/inputhal.php";
}
    elseif($haladmin =="arsiphal"){

       include "modul/arsip/arsiphal.php";
    }
    else{
        include "modul/home.php";
    }

?>