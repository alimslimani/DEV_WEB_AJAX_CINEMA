<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>M1INFO_DEV_TP3_AJAX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css" />
    <script src="../JQUERY/jquery-3.1.1.js"></script>
    <script src="../JS/functions.js"></script>
</head>
<body>
<?php
    include 'cnx.php';
    // write query 
    $sql = $cnx->prepare("  SELECT f.codeFilm,a.nomActeur,a.imageActeur,f.genreFilm,f.nbVotes,f.totalVotes
                            FROM film f,jouer j,acteur a
                            WHERE f.codeFilm=j.numFilm
                            AND j.numActeur = a.codeActeur
                            AND f.codeFilm ='".$_GET['codeF']."'");
    // execure query
    $sql->execute();
    echo "<br>";
    echo "<table border CELLPADDING=10 CELLSPACING=0 bgcolor='bisque'>";
        foreach($sql-> fetchAll(PDO::FETCH_ASSOC) as $line){             
            echo "<td id=".$line['codeFilm'].">";
            echo "<input type='button' id=".$line['codeFilm']."
                    value=".$line['codeFilm'].">
                    <img src=".$line['imageActeur']." style='float:right' height='50' width='50'>
                    ".$line['nomActeur']."
                    </button>";
            echo"</td>";
        }    
        echo "</table>";  

           
?>
</body>
</html>