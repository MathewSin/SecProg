<?php
    session_start();
    $is_login = false;

    var_dump($is_login == 0);
    var_dump($is_login === 0);

    $usernames = [
      "admin",
      "dalgona",
      "parg29",
      "matchalover",
      "aseng",
      "subwayodading"
    ];

    $passwords = [
        "admin",
        "tidakbikinkembung",
        "supershy",
        "greentea",
        "sepuh",
        "$ugwey"
    ];

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];

        // var_dump($username);
        // var_dump($password);

        for ($i = 0; $i < count($usernames); $i++) {
            if ($username === $usernames[$i] && $password === $passwords[$i]) {
                $is_login = true;
                break;
            }
        }

        if ($is_login) {
            echo "Login Success.";
            $_SESSION ["success_message"] = "Login Success";
            $_SESSION ["success"] = true;
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header("Location: ../messages.php"); // '../' berguna untuk ke direktori yang ada diluar folder controller.
        }
        else {
            $_SESSION ["error_message"] = "Login Failed";
            $_SESSION['login'] = false;
            $_SESSION ["error"] = true;
            //echo "Login Failed";
            // echo $_SESSION["error_message"];
            header("Location: ../login.php");   //Kalau login gagal maka user akan dilempar kembali ke login.php
        }

    }
