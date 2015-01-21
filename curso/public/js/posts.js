$(document).ready(function(){
	
 var container = $("#container");
 var btn_form_editar=container.find("#btn-form-editar");
 var form_post = container.find("#form-post");
 var tbody = $("tbody");
 var posts=container.find('#posts');
 var table_posts = posts.find('#table-posts');
 var form_atualizar_post = posts.find('#form-atualizar-post');
 var btn_atualizar_post=posts.find("#btn-atualizar-post");
 var form_editar=posts.find("#form-editar");

 container.on('click', ".btn-deletar", function(){
 	var id = $(this).attr('data-id');
 	$.ajax({
 		url: '/home/deletar/'+id,
 		type:'DELETE',
 		success: function(data){
 			if(data === 'deletou'){
 				alert('deletado com sucesso');
 				location.reload();
 			}else{
 				alert('Ocorreu um erro ao deletar o post');
 			}
 		}
 	})
 })

btn_form_editar.on('click', function(event){
	event.preventDefault();
	$.ajax({
		url:'/post/atualizar/'+form_post.serialize(),
		type: 'PUT',
		success: function(data){
			if(data === 'atualizou'){
				alert('Atualizado com sucesso !');
				location.reload(); 
			}else{
				alert('Erro ao atualizar o post');
			}
		}
	})
});

$.ajax({
	url : '/admin/painel/listar',
	dataType: 'json',
	success: function(data){
		var html='';
		$.each(data, function(key, value){
			html+='<tr>';
			html+='<td>'+data[key].tb_posts_titulo+'</td>';
			html+='<td><a href="#" id="btn-editar" data-id="'+data[key].id+'">Editar</a></td>';
			html+='<td><a href="#" id="btn-deletar" data-id="'+data[key].id+'">Deletar</a></td>';
			html+='</tr>';
		});
		tbody.append(html);
	}
})

table_posts.on('click', '#btn-deletar', function(event){
	var id = $(this).attr('data-id');
	$.ajax({
		url: '/admin/post/deletar/'+id,
		dataType: 'json',
		type: 'DELETE',
		success: function(data){
			if(data === 'deletou'){
				location.reload();
			}else{
				alert('Erro ao deletar, tente novamente');
			}
		}
	})
		event.preventDefault();
})

table_posts.on('click', '#btn-editar', function(event){
	event.preventDefault();
	var id = $(this).attr('data-id');
	var post_titulo=posts.find('#post-titulo');
	var post_texto=posts.find('#post-texto');
	$.ajax({
		url: '/admin/post/editar/'+id,
		type: 'GET',
		dataType: 'json',
		success: function(data){
			btn_atualizar_post.attr('data-id', id);
			form_atualizar_post.show();
			post_titulo.val(data.tb_posts_titulo);
			post_texto.val(data.tb_posts_texto);
			
		}
	})
})

btn_atualizar_post.on('click', function(event){
	event.preventDefault();
	var id = $(this).attr('data-id');
	$.ajax({
		url: '/admin/post/editar/'+id,
		type: 'PUT',
		data: form_editar.serialize(),
		success: function(data){
			if(data === 'atualizou'){
				alert('atualizado com sucesso');
				location.reload();
			}else{
				alert('erro ao atualizar');
			}
		}
	})

});

});