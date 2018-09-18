<link type="text/css" rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function () {
        var $select = $(".1-10");
        for (i = 1; i <= 10; i++) {
            $select.append($('<option></option>').val(i).html(i))
        }
    });
</script>
<?php

require_once 'config.php';

function getDbConn()
{
    global $config, $dbConnection;

    if (! isset($dbConnection) || ! $dbConnection) {
        $dbConnection = mysqli_connect($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbname']);

        if ($dbConnection->connect_error) {
            die("Connection failed: " . $dbConnection->connect_error);
        }
    }

    return $dbConnection;
}

function openCon()
{
    $db = getDbConn();

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $adress = $_POST['adress'];
        $color = $_POST["color"];
        $leather = $_POST['leather'];
        $amount = $_POST['amount'];
        $price = $_POST["price"];
        $errorCount = $_POST["errorCount"];

        if ($errorCount == 0 && $_POST["save"] == "Pirkti") {
            $query = "INSERT INTO `data` (`name`, `surname`, `email`, `adress`, `color`, `leather`, `amount`, `price`) VALUES ('$name', '$surname', '$email', '$adress', '$color', '$leather', '$amount', '$price')";

            if ($db->query($query) === TRUE) {
                return true;
            } else {
                echo "Error: " . $query . "<br>" . $db->error;
                return false;
            }
        }
    }
}

function getData()
{
    $db = getDbConn();
    $results = mysqli_query($db, "SELECT * FROM `data`");
    return $results;
}

function paging()
{
    $db = getDbConn();
    $per_page = 5;
    $page = 1;

    if (isset($_GET['page'])) {
        $page = intval($_GET['page']);
        if ($page < 1) $page = 1;
    }

    $start_from = ($page - 1) * $per_page;

    $where = '1';

    if (isset($_GET['colorlist'])) {
        $where .= " AND color = '{$_GET["colorlist"]}'";
    }

    $results = mysqli_query($db, "SELECT * FROM `data` WHERE $where ORDER BY `name` LIMIT $start_from, $per_page");
    $total_rows = mysqli_query($db, "SELECT COUNT(*) FROM `data` WHERE $where");
    $total_rows = mysqli_fetch_row($total_rows);
    $total_rows = $total_rows[0];

    $total_pages = $total_rows / $per_page;
    $total_pages = ceil($total_pages);
    $info[0] = $results;
    $info[1] = $total_pages;

    return $info;
}

?>