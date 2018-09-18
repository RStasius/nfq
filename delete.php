<?php //delete order
    $db = mysqli_connect('localhost','root','','nfq');
    $deleted = "";
    if(isset($_GET["id"]))
    {

        try {
            $id = $_GET["id"];
            $sql = "DELETE FROM data WHERE ID = '$id'";

            $statement = $db->prepare($sql);
            $statement->execute();
            $deleted = true;

            header("Location: order.php");
            echo "User successfully deleted";

        } catch(PDOException $error) {
            $deleted = false;
            echo $sql . "<br>" . $error->getMessage();

        }

    }

?>

