<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script> --}}
{{-- <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> --}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



{!! Html::script('dist/js/jquery.spinner.js') !!}
{!! Html::script('js/addrow.js') !!}
{!! Html::script('js/pacadd.js') !!}
{!! Html::script('js/addrowback.js') !!}
{!! Html::script('js/main.js') !!}
{!! Html::script('js/date.js') !!}


<script type="text/javascript">

$(document).ready(function(){
	loadProduct();
	addToCart();
	loadPackage();
	//addPacakgeCart();
	getProductid();
	// getProductnoti();

	// $.ajax({
	// 	url: '{{URL::to('backup.php')}}',
	// 	type: 'get',
	// 	data: {},
	// 	success: function(data){
	// 		console.log(data);
	// 	}
	// }); 

	$('.submit').click(function(){
		var formdate = $('#dateform').val();
		var todate = $('#dateto').val();

		$.ajax({
			url: '{{URL::to('purchasereportcall')}}',
			type: 'get',
			data: {'formdate':formdate,'todate':todate,},
			success: function(data){
				$('#showdata').html(data);
			}
		});
	});
	

	$('.ssubmit').click(function(){
		var saleoutlet = $('#saleoutlet').val();
		var counter = $('#counter').val();
		var dform = $('#dform').val();
		var dto = $('#dto').val();

		$.ajax({
			url: '{{URL::to('salereportcall')}}',
			type: 'get',
			data: {'saleoutlet':saleoutlet,'counter':counter,'dform':dform,'dto':dto,},
			success: function(data){
				$('#datashow').html(data);
			}
		});
	});

	$('.exsubmit').click(function(){ 
		var exoutlet = $('#exoutlet').val();
		var datform = $('#datform').val();
		var datdto = $('#datdto').val();

		$.ajax({
			url: '{{URL::to('expensereportcall')}}',
			type: 'get',
			data: {'exoutlet':exoutlet,'datform':datform,'datdto':datdto,},
			success: function(data){
				$('#exdatashow').html(data);
			}
		});
	});

	$( ".spinner" ).spinner(); 
});



	// product js start

	function loadProduct(){
		$('.productCat').click(function(){
			var id = $(this).find('.id').val();
			$.ajax({
				url: '{{URL::to('loadProduct')}}',
				type: 'get',
				data: {'id':id,},
				success: function(data){
					$('.showProduct').html(data);
					addToCart();
				}
			});
		});
	}

	function addToCart(){
		$('.productinfo').click(function(){
			var id = $(this).find('.id').val();
			$.ajax({
				url: '{{URL::to('checkQuantity')}}',
				type: 'get',
				data: {'id':id,},
				success: function(data){
					if(data>0){
							var taskArray = new Array();
				            $(".p_id").each(function() {
				            	var p_id = $(this).val();
				            	taskArray.push(p_id);
				            });
				            if(taskArray.length >0){
				            	if(checkValue(id,taskArray) == 1){
					            	taskArray.push(id);

					            }
				            }
				            var quantity = new Array();
				            $('.qnt').each(function(){
				            	var qnt = $(this).val();
				            	var qid = $(this).attr('id');
				            	if(parseInt(qid) == id){

				            		quantity.push(parseInt(qnt)+1);
				            	}else{

				            		quantity.push(parseInt(qnt));
				            	}
				            	
				            });
							$.ajax({
								url: '{{URL::to('addToCart')}}',
								type: 'get',
								data: {'id':id,'taskArray':taskArray,'quantity':quantity,},
								success: function(data){
									if(data == ''){

										alert('this product is exist in cart');
										
									}else{
										//console.log(data);

										$('.cahange').html(data);
										var spin = $( ".spinner" ).spinner({ 
										});

										total();
										ntotal();						
										due();
										
									}
								}
							});
					}else{
						
						swal("Unavailable Stock" , "Please Product Stock !");
						console.log(data);
					}
				}
			});
			
		});
	}

	function checkValue(value,arr){
	  var status = 1;
	 
	  for(var i=0; i<arr.length; i++){
	   var name = arr[i];
	   if(name == value){
	    status = 0;
	    break;
	   }
	  }

	  return status;
	}

	function checkQuantity(id){
		var id = id;
		//alert(id);
		$.ajax({
			url: '{{URL::to('checkQuantity')}}',
			type: 'get',
			data: {'id':id,},
			success: function(data){
				return data;
			}
		});
	}

	// product js end 

	// package js start

	function loadPackage(){
		$('.packageCat').click(function(){
			//var id = $(this).find('.id').val();
			$.ajax({
				url: '{{URL::to('loadPackage')}}',
				type: 'get',
				data: {},
				success: function(data){
					$('.showProduct').html(data);
				    addToCart();
				}
			});
		});
	}

	function getProductid() { 
	    $.ajax({
	      type: "GET",
	      url: '{{URL::to('livenotification')}}',
	      success: function(data){
	      	if(data != ''){
	      		//alert("ok");

	      		//$("#modalId").trigger('click'); 
	      	    $("#modalId").modal('show'); 
		      	$("#divIdUnderModal").html(data);	
		      	console.log(data);
		      	//$(".result").dialog(data);
		      	// swal("Stock Limited" , "Please Product add to Stock !");
		      }else{
		      	 // $("#modalId").modal('show');  
		      	 // $("#divIdUnderModal").html(data);		
		      	//$('body').html(data);
		      }
	      	}
	      	
	    });

     //  $(".result").load("load.html");
 
  	  // setInterval('getProductid()', 10000); 
	}
	
</script>
