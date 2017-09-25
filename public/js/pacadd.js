$(document).ready(function(){
	calculation();

	$('.pacAdd').on('click', function(){
		//alert('called...');
		var ppro = $('#ppro').val();
		pacAdd(ppro);
		
	});

	//$('#auto').load('backup.php'); 

});


function pacAdd(ppro)
	{
		var tr='<tr>'+
	   				'<td>'+
	   				'<select class="livesearch form-control product-name"  name="pname[]" >'+
                    	'<option value="0" disabled="trform-controlue" selected="ture">--Select--</option>';
                     	$.each( JSON.parse(ppro), function( key, value ) {
						   tr +='<option value="'+ value['id'] +'">'+value['name'] +'</option>';
						 });   	
        		  tr +=  '</select>'+ 
            		'</td>'+
	   				'<td><input type="text" name="pqtn[]" class="form-control pqtn" onblur="qtn_check()"></td>'+
	   				'<td><a href="javascript:void(0)" class="btn btn-danger btn-sm remove"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a></td>'+
	   				'</tr>'
	   				'</tr>';
			$('tbody').append(tr);
			$(".livesearch").chosen();
			calculation();
			
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