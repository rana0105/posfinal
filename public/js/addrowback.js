$(document).ready(function(){
	calculation();

	$('.addRowback').on('click', function(){
		var bpro = $('#bpro').val();
		addRowback(bpro);
		
	});

	//$('#auto').load('backup.php'); 

});

function addRowback(bpro)
	{
		var tr='<tr>'+
	   				'<td>'+
	   				'<select class="livesearch form-control product-name"  name="name[]" >'+
                    	'<option value="0" disabled="trform-controlue" selected="ture">--Select--</option>';
                     	$.each( JSON.parse(bpro), function( key, value ) {
						   tr +='<option value="'+ value['id'] +'">'+value['name'] +'</option>';
						 });   	
        		  tr +=  '</select>'+ 
            		'</td>'+
	   				'<td><input type="text" name="qtn[]" class="form-control qtn" onblur="qtn_check()"></td>'+
	   				// '<td><input type="text" name="u_price[]" class="form-control u_price"></td>'+
	   				'<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>'+
	   				'</tr>';
			$('tbody').append(tr);
			$(".livesearch").chosen();
			
	};

$(document).ready(function(){
	$('.remove').live('click', function(){
		var len = $('tbody tr').length;		
			$(this).parent().parent().remove();
			total();
			ntotal();
			due();		
	});
});

