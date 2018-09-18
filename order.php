<?php include('server.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Produktas</title>

</head>

<body>

<header>
    <h1>Patvirtinti kėdžių užsakymai</h1>
</header>
<div class="container">
    <div class="row">
        <div class="col" style="padding: 5px 90px;">
            <button type="button" onclick="location.href='chair.php';" style="font-size: 20px"
                    class="btn btn-outline-info">Užsakymo forma
            </button>
        </div>
        <div class="col">
            <form action="" method="get" class="formfix" style="width: 200px; height: 173px">
                <h5>Pasirinkite spalvą filtravimui</h5>
                <select name="colorlist" style="width: 80%;">
                    <?php
                    $colors = ['Raudona', 'Melyna', 'Ruda', 'Juoda', 'Balta'];

                    foreach ($colors as $color) {
                        $colorSelected = '';
                        if (isset($_GET['colorlist']) && $color == $_GET['colorlist']) {
                            $colorSelected = ' selected="selected"';
                        }

                        echo "<option value=\"$color\"' . $colorSelected . '>$color</option>";
                    }
                    ?>
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
    $results = Paging();
    $totalPages = $results[1];
    $row = mysqli_fetch_array($results[0]);
    ?>
    <?php $results = Paging(); ?>
    <?php while ($row = mysqli_fetch_array($results[0])) { ?>
        <form action="delete.php" class="formfix" method="get">
            <tr>
                <td> <?php echo $row["name"] ?></td>
                <td><?php echo $row["surname"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["adress"] ?></td>
                <td><?php echo $row["color"] ?></td>
                <td><?php echo $row["leather"] ?></td>
                <td><?php echo $row["amount"] ?></td>
                <td>
                    <input type="hidden" name="id" value=<?php echo $row["id"] ?>/>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </td>
        </form>
    <?php } ?>
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
                $query = $_GET;
                for ($i = 1; $i <= $totalPages; ++$i) {
                    $query['page'] = $i;
                    echo "<li class=\"page-item\"><a class=\"page-link\" href='?" . http_build_query($query) . "'>$i</a></li> ";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

