$(document).ready(function(){

    var xhr = null;

    if(window.XMLHttpRequest) // Firefox et autres
        xhr = new XMLHttpRequest();
    else if(window.ActiveXObject){ // Internet Explorer
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    else { // XMLHttpRequest non supporté par le navigateur
        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
        xhr = false;
    };

//////////////////////

/// btn submit ///

//////////////////////
///
    $(document).ready(function() {
        $("#newsletter-submit").click(function(){
            $.ajax({
                url:  '' ,
                type: 'POST',
                data : '',
                dataType : 'html',
                cache:false,
                success:function(code_html, statut,data){
                    afficher(data);
                    //console.log(code_html);
                    //console.log(statut);
                    //console.log(data);
                    //console.log(xhr.responseXML);
                },
                error:function(XMLHttpRequest,textStatus, errorThrown){
                    //console.log(XMLHttpRequest);
                    console.log(textStatus);
                    //console.log(errorThrown);
                    //alert(textStatus+' '+'url');
                },
                complete : function(resultat, statut){
                    //console.log(resultat);
                    //console.log(statut);

                }
            })
            //console.log($.ajax('data'));
        });

    });



    function afficher(data){




    }

    //alert('zz');
});


