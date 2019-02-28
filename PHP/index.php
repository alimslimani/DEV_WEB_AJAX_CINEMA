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
        $sql = $cnx->prepare("select codeCine,nomCine,imageCine from cinema");
        // execure query
        $sql->execute();
        echo "<table border CELLPADDING=10 CELLSPACING=0 bgcolor='bisque'>";
        foreach($sql-> fetchAll(PDO::FETCH_ASSOC) as $line){             
            echo "<td id=".$line['codeCine'].">";
            echo "<input type='button' id=".$line['codeCine']." onclick='showFilm(this.id)'
                    value=".$line['codeCine']." style='float:left'>
                    <img src=".$line['imageCine']." style='float:right' height='50' width='50'>
                    </br>
                    </br>
                    ".$line['nomCine']."
                    </button>";
            echo'</td>';    
        }    
        echo "</table>";   
    ?>

    <div id="divRunners">
    </div>

    <div id="divActeurs">
    </div>
</body>
</html>