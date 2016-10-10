<?php
    function CatStrToArray ($strCatId) {
        $strCatId = trim(" ", "");
        $array = explode(";", $strCatId);
        return array_filter($array);
    }

    function validStrCat ($strCatId) {
        foreach ($strCatId as $data) {
            if (!is_numeric($data))
                return FALSE;
        }
        return TRUE;
    }

    function CatArrayToStr ($ArrayCatId) {
        $str = "";
        foreach ($ArrayCatId as $data) {
            $str .= $data;
        }
        return $str;
    }

    function loginExist ($connection, $login) {
        $query = "SELECT `login` FROM `users`;";
        if ($resultat = mysqli_query($connection, $query)) {
            while ($data = mysqli_fetch_assoc($resultat))
            {
                if ($data['login'] == $_POST['login']) {
                    mysqli_free_result($resultat);
                    return TRUE;
                }
            }
            mysqli_free_result($resultat);
        }
        return FALSE;
    }

    function addLog ($login, $case, $info) {
        date_default_timezone_set('UTC');
        $time = date (DATE_RFC2822);
        $time = rtrim($time);
        if ($case == 1) {
            $rajout = $_SESSION['login'] . ": connected (" . $time . ");\n";
        }
        if ($case == 2) {
            $rajout = $_SESSION['login'] . ": add user \"" . $info ."\"(" . $time . ");\n";
        }
        if ($case == 3) {
            $rajout = $_SESSION['login'] . ": del user \"" . $info ."\"(" . $time . ");\n";
        }
        file_put_contents("../private/log", $rajout,  FILE_APPEND);
    }

    function getLog () {
        if (file_exists("../private")) {
            if (file_exists("../private/log")) {
                $content = file_get_contents("../private/log");
            }
        }
        else {
            mkdir("../private");
            $content = "";
        }
        return $content;
    }
?>