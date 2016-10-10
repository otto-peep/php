<?php
    function connectDB() {
        $hostname = 'localhost';
        $username = 'login';
        $password = 'pass';
        $dbname = 'FT_MINISHOP';

        if (!$result = mysqli_connect($hostname, $username, $password, $dbname))
            return $result;
//        mysqli_select_db($dbname);
        return $result;
    }
?>