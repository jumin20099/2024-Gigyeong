<?php
include('./config/DBConnect.php');
session_start();


$request = $_SERVER['REQUEST_URI'];
$path = explode("?", $request);
$path[1] = isset($path[1]) ? $path[1] : null;
$resource = explode("/", $path[0]);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./bootstrap/dist/css/bootstrap.css">
    <title>Skills Camping</title>
</head>

<body>
    <?php
    $page = "";
    include('./components/header.php');

    switch ($resource[1]) {
        case '':
            $page = "./pages/main.php";
            break;

        case 'camping':
            $page = "./pages/" . $resource[1] . ".php";
            break;

        case 'myPage':
            $page = "./pages/" . $resource[1] . ".php";
            break;

        case 'reservation':
            $page = "./pages/" . $resource[1] . ".php";
            break;

        case 'login':
            $page = "./pages/" . $resource[1] . ".php";
            break;

        case 'logout':
            $page = "./pages/" . $resource[1] . ".php";
            break;

        default:
            $page = "./pages/main.php";
            break;
    }
    include($page);
    include('./components/footer.php');
    ?>
    <script src="./jquery/jquery-3.6.0.js"></script>
    <script src="./bootstrap/dist/js/bootstrap.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>