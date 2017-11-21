$(document).ready(function(){
    $('#save').click(function(){
        $.ajax({
            type:"POST",
            url:"../Controller/ctrlDemostracion.php?opcion=1",
            data:$("#frmDemostracion").serialize(),
            error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus + "\n" + errorThrown);
            },
            success: function(result){
                var data=eval('('+result+')');
                
                if(data.res=='fail'){
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-tittle').text("no Guardo");
                    modal.find('.modal-message').html(data.msg);
                }else if(data.res=='all'){
                    $("#LoadingImage").hide();
                    var modal = $('#exampleconfirmacion');
                    modal.find('.modal-title').text("Registro exitoso.");
                    modal.find('#modal-message').html("<div style='color: #009d48'>" + data.msg + " </div>");
                }
            }
        });
    });
});

