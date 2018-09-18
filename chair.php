<?php include 'server.php' ?>
<?php
$nameErr = $surnameErr = $emailErr = $adressErr = "";
$name = $surname =$email = $adress = "";
//($_POST["save"] == "Pirkti")
//var_dump($_POST["save"]));
$errorCount=0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save"]) ) {
    $color=$_POST["color"];
    $leather= $_POST["leather"];
    $amount = $_POST["amount"];
    //$price = $_POST["price"];
    if (empty($_POST["name"])) {
        $nameErr = "Vardas yra reikalingas";
        $errorCount++;
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["surname"])) {
        $surnameErr = "Pavardė yra reikalinga";
        $errorCount++;
    } else {
        $email = test_input($_POST["email"]);
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } else {
        $errorCount++;
        $emailErr = "El. paštas yra reikalingas";
        $email = test_input($_POST["email"]);
        //$errorCount = $_POST;
        $_POST["errorCount"] = $errorCount;
        //var_dump($_POST["errorCount"]);
    }
    if(empty($_POST["adress"])) {
        $errorCount++;
        $adressErr = "Adresas yra reikalingas";
        $adress = test_input($_POST["adress"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
  <html>
    <head>
        <title>Produktas</title>

    </head>
    <body>
          <header>
                  <h1 class="elegantshadow"> Rankų darbo odinės kėdės </h1>
          </header>
          <form action="" method="post">
                  <div class="container">
                      <div class="container">
                          <div class="row">
                              <div class="col" style="padding: 10px 5px;">
                                  <button type="button" onclick="location.href='order.php';" class="btn btn-outline-info">Užsakymų sąrašas</button>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm">
                              <div class="input-group">
                                  <label>Rėmo spalva</label>
                                  <select name="colorlist">
                                      <option value="Raudona">Raudona</option>
                                      <option value="Melyna">Mėlyna</option>
                                      <option value="Ruda">Ruda</option>
                                      <option value="Juoda">Juoda</option>
                                      <option value="Balta">Balta</option>
                                  </select>
                              </div>
                              <div class="input-group">
                                  <label>Odos tipas</label>
                                  <select name="leatherlist">
                                      <option value="Dirbtine">Dirbtinė - 120€</option>
                                      <option value="Sudetine">Sudėtinė - 115€</option>
                                      <option value="Bikastine">Bikastinė - 90€</option>
                                      <option value="Split-grain">Split-grain - 100€</option>
                                      <option value="Full-grain">Full-grain - 105€</option>
                                      <option value="Top-grain">Top-grain - 150€</option>
                                  </select>
                              </div>
                                  <div class="input-group">
                                      <label>Kiekis</label>
                                      <select class="1-10" name="amount"></select>
                                  </div>
                              <?php
                              $price = 0;
                              if(isset($_POST['submits'])){
                                  $selected_val = $_POST['leatherlist'];
                                  $amount = $_POST['amount'];// Storing Selected Value In Variable
                                  $color = $_POST['colorlist'];
                                  $leather = $selected_val;
                                  if($selected_val == "Dirbtine") $price = 120 * $amount;
                                  if($selected_val == "Sudetine") $price = 115 * $amount;
                                  if($selected_val == "Bikastine") $price = 90 * $amount;
                                  if($selected_val == "Split-grain") $price = 100 * $amount;
                                  if($selected_val == "Full-grain") $price = 105 * $amount;
                                  if($selected_val == "Top-grain") $price = 150 * $amount;
                              }
                              if(isset($_POST["save"]))
                              {
                                  $price=$_POST["price"];
                              }
                              ?>
                              <input type="hidden" name="price" value="<?php $price?> ">
                              <div class="input-group">
                                  <label>Apskaičiuota kaina</label>
                                  <input type="text"  name="price"  style="width: 25%" value="<?php echo $price?> €" readonly/">
                              </div>
                              <input type="submit" class="price" name="submits" value="Patikrinti kainą" />
                          </div>
                          <div class="col-6">
                              <img src="chair.jpg" class ="image" alt="chair">
                          </div>
                      </div>
                  </div>
              </form>

          <?php if($price != 0 || $errorCount > 0) : ?>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  <div class="container">
                      <?php if(openCon() && isset($_POST["save"])) : ?>
                          <div class="alert alert-success">
                              <strong>Sveikiname!</strong> Jūs sėkmingai užpildėte pirkimo dokumentus.
                          </div>
                      <?php elseif(!openCon() && isset($_POST["save"])): ?>
                          <div class="alert alert-danger">
                              <strong>Dėmesio!</strong> Užpildykite visus reikiamus laukelius
                          </div>
                      <?php endif; ?>
                      <?php if( isset($_POST["submits"]) || $_POST["save"] == "Pirkti" && $_POST["errorCount"] > 0) : ?>
                      <div class="input-group">
                          <label>Vardas</label>
                          <input type="text" name="name">
                          <span class="error">* <?php echo $nameErr;?></span>
                          <br><br>
                      </div>
                      <div class="input-group">
                          <label>Pavardė</label>
                          <input type="text" name="surname">
                          <span class="error">* <?php echo $surnameErr;?></span>
                          <br><br>
                      </div>
                      <div class="input-group">
                          <label>Elektroninis paštas</label>
                          <input type="text" name="email">
                          <span class="error">* <?php echo $emailErr;?></span>
                          <br><br>
                      </div>
                      <div class="input-group">
                          <label>Adresas</label>
                          <input type="text" name="adress">
                          <span class="error">* <?php echo $adressErr;?></span>
                          <br><br>
                      </div>
                      <div class="input-group">
                          <label>Pasirinkta spalva</label>
                          <input type="text" name="color" style="border: none;" value=<?php echo $color?> readonly>
                      </div>
                      <div class="input-group">
                          <label>Pasirinktas odos tipas</label>
                          <input type="text" name="leather" style="border: none;" value=<?php echo $leather?> readonly>
                      </div>
                      <div class="input-group">
                          <label>Kiekis</label>
                          <input type="text" name="amount" style="border: none;" value=<?php echo $amount?> readonly>
                      </div>
                      <div class="input-group">
                          <label>Suma</label>
                          <input type="text" name="price" style="border: none;" value=<?php echo $price;?>  readonly >
                      </div>
                          <input type="hidden" name="errorCount" value=<?php $errorCount; ?>>
                          <input type="submit" name="save" class="btn" value="Pirkti" />
                   </div>
                  <?php endif; ?>
              </form>
          <?php endif; ?>

    </body>
  </html>
