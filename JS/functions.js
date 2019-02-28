var codeC;

function showFilm(clicked_id){
    codeC = clicked_id;
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/scripts.php",
            data:"codeC="+clicked_id,
            success: function(datas){
                $('#divRunners').empty();
                $('#divRunners').append(datas);
            },
            error: function(){
                    alert("Cannot retreive movies");
            }
        }
    )
}

function showActeurs(clicked_id){
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/scripts2.php",
            data:"codeF="+clicked_id,
            success: function(datas){
                $('#divActeurs').empty();
                $('#divActeurs').append(datas);
            },
            error: function(){
                    alert("Cannot retreive actors");
            }
        }
    )
}

function voter(idFilm,vote){
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/scripts3.php",
            data:"codeF="+idFilm+"&vote="+vote,
            success: function(){
                showFilm(codeC);
            },
            error: function(){
                    alert("Cannot retreive actors");
            }
        }
    )
}

