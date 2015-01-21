$(document).ready(function(){

    var container = $("#container");
    var listagem_subcategorias = container.find("#listagem-subcategorias");

    listagem_subcategorias.on('click', '.btn-deletar-subcategoria', function(event){
        
        var id = $(this).attr('data-id');

        $.ajax({
            url: '/subcategoria/deletar/'+id,
            type: 'DELETE',
            success: function(data){

                if(data == 'deletado'){
                    location.reload();
                }else{
                    alert('Erro ao deletar registro, tente novamente, caso não consiga deletar contate o programador do sistema.');
                }

            }
        });

        event.preventDefault();
    });


});