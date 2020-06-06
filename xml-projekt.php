<?php  

if (isset($_POST['album'])){
    $album = $_POST['album'];
    $izvodac = $_POST['izvodac'];
    $godina = $_POST['godina'];
    $zanr = $_POST['zanr'];
    $prijedlog = $_POST['prijedlog'];
    $ocjena = $_POST['ocjena'];
    
    $ispis = '';
    $ispis .= "<Album>\n";
    $ispis .= "<ImeAlbuma>" . $album . "</ImeAlbuma>\n";
    $ispis .= "<Izvodac>" . $izvodac . "</Izvodac>\n";
    $ispis .= "<Godina>" . $godina . "</Godina>\n";
    $ispis .= "<Zanr>" . $zanr . "</Zanr>\n";
    $ispis .= "<Prijedlog>" . $prijedlog . "</Prijedlog>\n";
    $ispis .= "<Ocjena>" . $ocjena . "</Ocjena>\n";
    $ispis .= "</Album>\n";

    $filename = 'Albumi.xml';
    if(file_exists($filename)){
        $dok = file_get_contents($filename);
        $dok = str_replace("</Albumi>\n", '', $dok);
        file_put_contents($filename, $dok);
        file_put_contents($filename, $ispis, FILE_APPEND);
        file_put_contents($filename,"</Albumi>\n",FILE_APPEND);
    }else{
        $file = '';
        $file .= "<?xml version='1.0' encoding='UTF-8' standalone='no' ?>\n";
$file .= "<Albumi>\n";
    $file .= $ispis;
    $file .= "</Albumi>\n";
file_put_contents($filename, $file);
}

}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600&display=swap" rel="stylesheet">
    <title>Le Nouvel Observateur</title>
</head>

<body>
    <header>

        <div class="clearfix">
            <div class="logo">
                <img class="in_img" src="img/logo.svg" style="width: 200px;" alt="">
            </div>

            <nav>
                <ul>
                    <div class="topnav" id="myTopnav">
                        <li><a href="index.html">HOME</a></li>
                        <li><a href="#politique">POLITIQUE</a></li>
                        <li><a href="#immobilier">IMMOBILIER</a></li>
                        <li><a href="administracija.html">ADMINISTRACIJA</a></li>
                        <li><a href="xml-projekt.php">Unos XML</a></li>
                        <li><a target="_blank" href="Albumi.xml">Pregled
                                XML</a></li>
                        <li><a href="javascript:void(0);" class="icon" onclick="menu()">
                                <i class="fa fa-bars"></i>
                            </a></li>
                    </div>

                </ul>
            </nav>
        </div>
        <script>
        function menu() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
        </script>
    </header>

    <hr>

    <main>
        <div class="wrapper">
            <div class="clearfix">
                <form action="xml-projekt.php" method="POST">
                    <div class="forma">
                        <label for="album">Ime albuma</label><br>
                        <input type="text" name="album" id="album"><br><br>
                    </div>

                    <div class="forma">
                        <label for="izvodac">Izvođač</label><br>
                        <input type="text" name="izvodac" id="izvodac"><br><br>
                    </div>


                    <div class="forma">
                        <label for="godina">Godina izdanja</label><br>
                        <input type="number" name="godina" id="godina"><br><br>
                    </div>

                    <div class="forma">
                        <label for="zanr">Žanr albuma</label><br>
                        <input type="text" name="zanr" id="zanr"><br><br>
                    </div>

                    <div class="forma">
                        <label for="prijedlog">Predlažete li album</label><br>
                        <select name="prijedlog" id="prijedlog">
                            <option value="Predlažem">Da</option>
                            <option value="Ne predlažem">Ne</option>
                        </select><br><br>
                    </div>

                    <div class="forma">
                        <label for="ocjena">Vaša ocjena albuma</label><br>
                        <input type="range" min="1" max="5" step="1" class="slider" name="ocjena" id="ocjena"><br>

                        <span id="prikaz"></span><br><br>
                        <button class="button" type="submit">Spremi kao XML</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
    var ocjena = document.getElementById("ocjena")
    var prikaz = document.getElementById("prikaz")
    prikaz.innerHTML = ocjena.value

    ocjena.oninput = function() {
        prikaz.innerHTML = this.value
    }
    </script>
    <div class="footer">
        <footer>
            <p>L'Obs copyright 2020. Borna Jaklenec,
                bjaklenec@tvz.hr</p>
        </footer>
    </div>


</body>

</html>