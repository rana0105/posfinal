// message auto delete<<<<<<<<<<<<<<<<<<<<<<

window.setTimeout(function() {
	 $(".alert").fadeTo(500, 0).slideUp(500, function(){
	 $(this).remove(); 
			 });
}, 4000);

//message auto delete end <<<<<<<<<<<<<<<<<<<<<<

// product delete alert 
$('button.delete-btn').on('click', function(e){
    e.preventDefault();
    var self = $(this);
    swal({
        title             : "Are you sure?",
        text              : "You will not be able to recover this!",
        type              : "warning",
        showCancelButton  : true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText : "Yes, Delete it!",
        cancelButtonText  : "No, Cancel delete!",
        closeOnConfirm    : false,
        closeOnCancel     : false
    },
    function(isConfirm){
        if(isConfirm){
            swal("Deleted!","It has been deleted", "success");
            setTimeout(function() {
                self.parents(".delete_form").submit();
            }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
        }
        else{
              swal("Cancelled","It is safe", "error");
        }
    });
});

$( document ).ready(function() {
    $('.carousel[data-type="multi"] .item').each(function(){
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<4;i++) {
      next=next.next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      
      next.children(':first-child').clone().appendTo($(this));
    }
  });

       // $('#auto').load('backup.php'); 
      markAsRead();
     $(".hidenoti").click(function(){
          $(".noti").hide();
      });  

});

function markAsRead(notificationCount) {
  if(notificationCount != 0)
  $.get('/markAsRead');
}
