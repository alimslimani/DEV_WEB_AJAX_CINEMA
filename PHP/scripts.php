   
<?php
    include 'cnx.php';
    // write query 
    $sql = $cnx->prepare("  SELECT f.codeFilm,f.nomFilm,f.imageFilm,f.genreFilm,f.nbVotes,f.totalVotes
                            FROM film f,cinema c,projeter p
                            WHERE c.codeCine=p.numCinema
                            AND p.numFilm = f.codeFilm
                            AND c.codeCine ='".$_GET['codeC']."'");
    // execure query
    $sql->execute();
    echo "<br>";
    echo "<table border CELLPADDING=10 CELLSPACING=0 bgcolor='bisque'>";
        foreach($sql-> fetchAll(PDO::FETCH_ASSOC) as $line){             
            echo "<td id=".$line['codeFilm'].">";
            echo "<input type='button' id=".$line['codeFilm']." 
                    onclick='showActeurs(this.id)'
                    value=".$line['codeFilm'].">
                    <img src=".$line['imageFilm']." style='float:right' height='80' width='80'>
                    <br>
                    ".$line['nomFilm']."
                    <p>nb Votes : ".$line['nbVotes']."</p>
                    <p>total Votes : ".$line['totalVotes']."</p>
                    Genre : ".$line['genreFilm']."
                    </button>";
                    echo "</br>";
                    echo "Ajouter une notation au film : ";
                    echo "<input type='button' value=+1 onclick = voter(".$line['codeFilm'].",1)></input>";
                    echo "<input type='button' value=+2 onclick = voter(".$line['codeFilm'].",2)></input>";
                    echo "<input type='button' value=+3 onclick = voter(".$line['codeFilm'].",3)></input>";
            echo'</td>';
        }    
        echo "</table>";     
?>