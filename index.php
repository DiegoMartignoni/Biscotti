<?php
	$contatore = 0;
    $nomeBiscotto = "Biscotto";
	setcookie ($nomeBiscotto, $contatore, time() + (86400 * 7));
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tanti Biscotti!</title>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <style>
        	div.corpo{
            	position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
            }
            p.testo{
            	text-align: center;
                font-family: Segoe UI;
                font-size: 40px!important;
            }
            a.collegam{
            	color: #000000;
    			text-decoration: none;
            }
        </style>
	</head>
	<body>
    	<div class="corpo">
            <?php
            if(!isset($_COOKIE[$nomeBiscotto])) {
            	echo "<a href='index.php'><img src='/forno2.png' alt='biscotto'></a>";
                echo "<p class='testo'>". $nomeBiscotto . " in cottura</p>";
            } else {
                if($_GET['elimina']==true) {
                    setcookie($nomeBiscotto);
                    echo "<a href='index.php' class='collegam'><p class='testo'>Oh no! Sono finiti i biscotti!</p></a>";
                } else {
                    $contatore = ++$_COOKIE[$nomeBiscotto];
                    setcookie ($nomeBiscotto, $contatore, time() + (86400 * 7));
                    echo "<body style='background-color:#fae3ca'>";
                    echo "<a href='index.php?elimina=true'><img src='/bisco3.png' alt='biscotto'></a>";
                    $bisco = ($_COOKIE[$nomeBiscotto] == 1) ? "biscotto!" : "biscotti!";
                    echo "<a class='collegam' href='index.php'><p class='testo'>Wow. Hai sfornato ". $_COOKIE[$nomeBiscotto] . " ". $bisco. "</p></a>";
                }
            }
            ?>
          </div>
	</body>
</html>