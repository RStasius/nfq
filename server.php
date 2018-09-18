<link type= "text/css" rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function(){
        var $select = $(".1-10");
        for (i=1;i<=10;i++){
            $select.append($('<option></option>').val(i).html(i))
        }
    });
</script>
<?php

function openCon() {
    $db = mysqli_connect('localhost','root','','nfq');

    if(isset($_POST['save'])){
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $email=$_POST['email'];
        $adress=$_POST['adress'];
        $color=$_POST["color"];
        $leather=$_POST['leather'];
        $amount=$_POST['amount'];
        $price=$_POST["price"];
        $errorCount = $_POST["errorCount"];

        if($errorCount == 0 && $_POST["save"] == "Pirkti")
        {
            $query = "INSERT INTO Data(name, surname,email,adress,color, leather, amount, price) VALUES ('$name', '$surname', '$email', '$adress', '$color', '$leather', '$amount', '$price')";
            if ($db->query($query) === TRUE) {
                mysqli_close($db);
                return true;
            } else {
                echo "Error: " . $query . "<br>" . $db->error;
                mysqli_close($db);
                return false;
            }
        }
    }
}
function getData()
{
    $db = mysqli_connect('localhost','root','','nfq');
    $results=mysqli_query($db, "SELECT * FROM Data");
    mysqli_close($db);
    return $results;
}
function paging()
{
    $db = mysqli_connect('localhost','root','','nfq');
    $per_page = 5;
    $page = 2;
//    var_dump($_POST["color"]);
  //  var_dump($_GET["page"]);
    if(isset($_GET['page']))
    {
        $page = intval($_GET['page']);
        if ($page < 1) $page = 1;
    }
  //  var_dump($_POST["color"]);
    //var_dump($_GET["page"]);
    $start_from = ($page - 1) * $per_page;
    $results = mysqli_query($db, "SELECT * FROM `Data` ORDER BY `name` LIMIT $start_from, $per_page"); //paging + sorting
    $total_rows = mysqli_query($db, "SELECT COUNT(*) FROM `Data`");
    $total_rows = mysqli_fetch_row($total_rows);
    $total_rows = $total_rows[0];

    $total_pages = $total_rows / $per_page;
    $total_pages = ceil($total_pages);
    $info[0] = $results;
    $info[1] = $total_pages;
    mysqli_close($db);
    return $info;
}
function filteredPaging()
{
    $db = mysqli_connect('localhost', 'root', '', 'nfq');
    $per_page = 5;
    $page = 2;
        //       var_dump($_POST["color"]);
        //     var_dump($_GET["page"]);
        if (isset($_GET['filteredPage'])) {
            $page = intval($_GET['filteredPage']);
            if ($page < 1) $page = 1;
        }
        // var_dump($page);
        $start_from = ($page - 1) * $per_page;
        $color = $_GET["colorlist"];
        //
    //$total_rows = mysqli_query($db, "SELECT COUNT(*) FROM `Data` WHERE color= '$color'");
        $filter = mysqli_query($db, "SELECT * FROM `data` WHERE color = '$color'" );
        //$total_rows = mysqli_fetch_row($total_rows);
        //$total_rows = $total_rows[0];
        //var_dump($total_rows);
        //$total_pages = $total_rows / $per_page;
        //$total_pages = ceil($total_pages);

        $info[0] = $filter;
        //$info[1] = $total_pages;
    var_dump($info[0]);
    mysqli_close($db);
        return $info;
    }

?>