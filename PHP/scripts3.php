<?php
    include 'cnx.php';
    // write query to update nb Vote
    $sql = $cnx->prepare("UPDATE film set nbVotes = nbVotes + 1 where codeFilm  ='".$_GET['codeF']."' ");
    // execure query
    $sql->execute();

    // write query to update nb total
    $sql = $cnx->prepare("UPDATE film set totalVotes = totalVotes + '".$_GET['vote']."' where codeFilm ='".$_GET['codeF']."' ");
    // execure query
    $sql->execute();
             
?>
