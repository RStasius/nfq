<?php include('server.php')?>
<?php
$results= getData();
/*if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;
    $rec = mysqli_query($db,"SELECT * FROM Data WHERE id=$id");
    $record=mysqli_fetch_array($rec);
    $name = $record['name'];
    $surname = $record['surname'];
    $email = $record['email'];
    $adress = $record['adress'];
    $id = $record['id'];
}*/
?>

<!DOCTYPE html>
<html>

<head>
    <title>Produktas</title>

</head>

<body>

<header>
    <h1> Patvirtinti kėdžių užsakymai </h1>
</header>
<div class="container">
    <div class="row">
        <div class="col" style="padding: 5px 90px;">
            <button type="button" onclick="location.href='chair.php';" style="font-size: 20px" class="btn btn-outline-info">Užsakymo forma</button>
        </div>
        <div class="col">
            <form action="" method="get" class="formfix" style="width: 200px; height: 173px">
            <h5>Pasirinkite spalvą filtravimui</h5>
            <select name="colorlist"style="width: 80%;">
                <option value="Raudona">Raudona</option>
                <option value="Melyna">Mėlyna</option>
                <option value="Ruda">Ruda</option>
                <option value="Juoda">Juoda</option>
                <option value="Balta">Balta</option>
            </select>
                <input type="submit" class="divider btn" name="color" value="Filter"/>

            </form>
        </div>
    </div>
</div>

<table>
    <thead>
    <tr>
        <th>Vardas</th>
        <th>Pavardė</th>
        <th>Elektroninis paštas</th>
        <th>Adresas</th>
        <th>Spalva</th>
        <th>Odos tipas</th>
        <th>Kiekis</th>
    </tr>
    </thead>
    <tbody>

    <?php
    var_dump($_GET);
    $results=Paging();
    $totalPages = $results[1];
    //var_dump(mysqli_fetch_array($results[0]));
    $row = mysqli_fetch_array($results[0]);
    echo $row["color"];
    //var_dump($results["color"]);
    ?>
    <?php if(isset($_GET["color"])) : ?>
    <?php $results  = filteredPaging();?>
    <?php while($row = mysqli_fetch_array($results[0])) { ?>
        <?php //var_dump($row)?>
        <form action="delete.php" class="formfix" method="get">
            <tr>
                <td> <?php echo $row["name"]?></td>
                <td><?php echo $row["surname"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["adress"]?></td>
                <td><?php echo $row["color"]?></td>
                <td><?php echo $row["leather"]?></td>
                <td><?php echo $row["amount"]?></td>
                <td>
                    <input type="hidden" name="id" value=<?php echo $row["id"]?>/>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </td>
        </form>
    <?php } ?>
    </tr>
    <?php else: ?>
        <?php $results  = Paging();?>
        <?php while($row = mysqli_fetch_array($results[0])) { ?>
            <?php //var_dump($row)?>
            <form action="delete.php" class="formfix" method="get">
                <tr>
                    <td> <?php echo $row["name"]?></td>
                    <td><?php echo $row["surname"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><?php echo $row["adress"]?></td>
                    <td><?php echo $row["color"]?></td>
                    <td><?php echo $row["leather"]?></td>
                    <td><?php echo $row["amount"]?></td>
                    <td>
                        <input type="hidden" name="id" value=<?php echo $row["id"]?>/>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </td>
            </form>
        <?php } ?>
    <?php endif; ?>

    </tbody>
</table>
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
        </div>
        <div class="col">
                <div class="pagination">
                <?php
                if(isset($_GET["color"]))
                {

                    for($i = 1; $i  <= $totalPages; ++$i)
                    {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href='?page=$i'>$i</a></li> ";
                    }
                }
                else
                {

                     //var_dump($totalPages);
                    //var_dump($_GET);
                    //var_dump($totalPages);
                    //var_dump($totalPages);
                    for($i = 1; $i  <= $totalPages; ++$i)
                    {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href='?page=$i'>$i</a></li> ";
                    }
                }
                ?>
                </div>
        </div>
    </div>
</div>
<!--
<form method="post" action="">
    <div class="input-group">
        <label>Vardas</label>
        <input type="text" name="name">
    </div>
    <div class="input-group">
        <label>Pavardė</label>
        <input type="text" name="surname">
    </div>
    <div class="input-group">
        <label>Elektronins paštas</label>
        <input type="text" name="email">
    </div>
    <div class="input-group">
        <label>Adresas</label>
        <input type="text" name="adress">
    </div>
    <?php if($edit_state == false): ?>
        <button type="submit" name="save" class="btn">Save</button>
    <?php else: ?>
        <button type="submit" name="update" class="btn">Update</button>
    <?php endif; ?>
</form>
-->
</body>
</html>

