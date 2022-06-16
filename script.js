$(document).ready(function(){


  
$('.btnsuppress').click(function(e) {
    console.log($(this).attr('id').slice(11));  
    e.preventDefault();
    $.post (
        'suppress.php',
        {$idtosuppress: $(this).attr('id').slice(11) },
        function (data) {
            window.location.href='index.php';
        }
    )
})

$("#search").click(function(){
    $("#search").val("");
})



document.addEventListener("keyup", function(){;
    $.post(
        "autoremplissage.php",
        {search: $("#search").val()},
        function(data){
            $(".aa").prop("hidden", "hidden");
            let results = JSON.parse(data); 
            for(i=0;i<results.length; i++){
                result = results[i];
                $(".suggest"+result.id).prop("hidden", "");
                $(".suggest"+result.id).html('<div class="row"><div class="col-12 pb-3 text-center suggesttitle">'+result.title+'</div><div class="col-3 offset-2 text-center"><img width="120px" height="auto" src="'+result.image+'"></div><div class="col-6 text-left">'+result.petit+'</div></div>');
                
            }
            



        }
    )
})








    
})