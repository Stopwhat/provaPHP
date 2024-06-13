<?php
unset($_SESSION['login']);
unset($_SESSION['password']);
header("Location: login.php");