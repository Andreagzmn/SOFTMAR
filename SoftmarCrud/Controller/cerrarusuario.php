<?php
  session_start();
  session_destroy();
  header("Location: ../View/Index.php");

 ?>