
$(document).ready(function(){
	console.log('***Start In***');
	$('.save-product').on('click', function(e){
	
    var pName = $("#ProductName").val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var vars = "_token="+CSRF_TOKEN+"&ProductName="+pName;
    var url = "addErplyProduct";
    var hr = new XMLHttpRequest();
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = JSON.parse(hr.responseText);
        console.log(return_data);
        $("#ProductName").val('');
        $('#replyMessageContent').html("<label>Status: "+return_data.status+"</label>");
       }
    }
    if(pName){
    	 hr.send(vars); 
     $('#replyMessageContent').html("<i style='color:green;'>posting product.....please waite.....</i>");
    }else{
     $('#replyMessageContent').html("<i style='color:#F00;'>Product Name is Required</i>");
    }

    	
	});
});