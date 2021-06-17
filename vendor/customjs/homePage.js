$(document).ready(function() {

	getPageData();

	// Evento Submit do formulário Excel
	$('#formUpload').on('submit',(function(e) {
 
		e.preventDefault();
		$.ajax({
		   url: './../src/uploadXLS.php',
		   type: "POST",
		   data: new FormData(this),
		   dataType: 'json',
		   processData: false,  
		   contentType: false,
		   success: function(retorno){
	   			if (retorno.status == '1'){
					alert('Itens Criados com sucesso!');
					getPageData();
	   			}else{
					alert('Houve uma falha! Tente novamente.');
	   			}
	   	   }
		});
 
	}));

	function getPageData() {
		$.ajax({
			dataType: 'json',
			url: './../src/getData.php',
		}).done(function(data){
			manageRow(data.dados);
		});
	}

	function manageRow(data) {
		var	rows = '';
		$.each( data, function( key, value ) {
			rows = rows + '<tr>';
			rows = rows + '<td>'+value.id_product+'</td>';
			rows = rows + '<td>'+value.ean+'</td>';
			rows = rows + '<td>'+value.name_product+'</td>';
			rows = rows + '<td>'+value.price+'</td>';
			rows = rows + '<td>'+value.stock+'</td>';
			rows = rows + '<td>'+value.fab_date+'</td>';
			rows = rows + '<td data-id="'+value.id_product+'">';
			rows = rows + '<button value="teste" id="btnExcluir" name="btnExcluir" class="btn btn-danger remove-item">Deletar</button>';
			rows = rows + '</td>';
			rows = rows + '</tr>';
		});
		$("tbody").html(rows);
	}

	//chamada pra deletar item
	$("body").on("click",".remove-item",function(){
		var id = $(this).parent("td").data('id');
	    var c_obj = $(this).parents("tr");
		$.ajax({
			dataType: 'json',
			type:'POST',
			url: './../src/deleteData.php',
			data:{id:id}
		}).done(function(data){
			alert('Dado Excluido!');
			c_obj.remove();
		});
	});


});