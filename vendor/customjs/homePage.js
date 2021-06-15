$( document ).ready(function() {

getPageData();

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
          rows = rows + '<td>';
        rows = rows + '<button class="btn btn-danger remove-item">Deletar</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});
	$("tbody").html(rows);
}

});