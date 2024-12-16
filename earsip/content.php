<?php
@$hal = $_GET['hal'];
if($hal =="arsip")
{
    include "modul/arsip/arsip.php";
}
    else
    {
        include "modul/home.php";
    }

?>