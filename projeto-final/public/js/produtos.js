$(document).ready(function(){


    var listar_produtos = $("#listar_produtos");

    listar_produtos.on('click', '.btn-deletar-produto', function( event ){

        var id = $(this).attr('data-id');

        $.ajax({
            url : '/produto/deletar/'+id,
            type: 'DELETE',
            success: function( data ){
                console.log(data);
                if(data == 'deletou'){
                    location.reload();
                }else{
                    alert('Erro ao deleter, tente novamente !!');
                }
            }
        });

        event.preventDefault();
    });

});