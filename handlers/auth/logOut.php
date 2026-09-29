<?php

session_start();

session_unset();

header("Location: ../../views/auth/login.php");