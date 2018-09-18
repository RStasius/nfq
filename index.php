<?php

include 'server.php';

$conn = openCon();

?>
<!DOCTYPE html>

<html>

<head>
    <title>NFQ 1ST TASK</title>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>
<header>
    <h1> NFQ Project</h1>
    <nav>
        <div class="container">
            <div class="row" style="padding: 50px 10px 5px 250px">
                <div class="col">
                    <button type="button" onclick="location.href='chair.php';" class="btn btn-inline-info">Užsakymo
                        forma
                    </button>
                </div>
                <div class="col">
                    <button type="button" onclick="location.href='order.php';" class="btn btn-outline-info">Užsakymų
                        sąrašas
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>
</body>
</html>
