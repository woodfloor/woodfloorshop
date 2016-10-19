// JavaScript Document
$('body').on('click', '.subcat,._price', function(e){
	
	if($("#"+this.id).hasClass("unchecked")){
		$("#"+this.id).addClass('checked');
		$("#"+this.id).removeClass('unchecked');
	}else{
		$("#"+this.id).addClass('unchecked');
		$("#"+this.id).removeClass('checked');
	}
	var catArray=[];
	var priceArray=[];
	$('.checked').each(function () {
       var t = $(this);
	   if(t.hasClass('subcat')){
	   		catArray.push(t.attr('data-id'));			 
	   }else{
		   	priceArray.push(t.attr('data-id'));			 
	   }
     });
	
	 var storeUrl = jQuery("#storeurl").val();
	 	 $.ajax({
			url: storeUrl+"//modules/plugins/refine_search/ajax/ajax.filteredList.php",
			type:"POST",
			data:"pagecat_id="+$('#catId').val()+"&category="+catArray+"&prices="+priceArray+"&sortby="+$('#product_sort').val(),
			beforeSend: function(){
			 $("#loader").addClass("loading");				
			},
			complete: function(){
				$("#loader").removeClass("loading");				
			},           
			"success":function(data){
				$("#id_clearOptions").show();
				$("#product_list").html(data.html);	
				if(data.hashurl!="")	
					document.location.hash = data.hashurl;
				else
					onReload();
			},
			error: function(data) { // if error occured
				 alert("Error occured.please try again");			
			},		
			dataType:"json"
		 });
});
$('body').on('change', '.sortedProd', function(e){
	
	if($("#"+this.id).hasClass("unchecked")){
		$("#"+this.id).addClass('checked');
		$("#"+this.id).removeClass('unchecked');
	}else{
		$("#"+this.id).addClass('unchecked');
		$("#"+this.id).removeClass('checked');
	}
	var catArray=[];
	var priceArray=[];
	$('.checked').each(function () {
       var t = $(this);
	   if(t.hasClass('subcat')){
	   		catArray.push(t.attr('data-id'));			 
	   }else{
		   	priceArray.push(t.attr('data-id'));			 
	   }
     });
	
	 var storeUrl = jQuery("#storeurl").val();
	 	 $.ajax({
			url: storeUrl+"//modules/plugins/refine_search/ajax/ajax.filteredList.php",
			type:"POST",
			data:"pagecat_id="+$('#catId').val()+"&category="+catArray+"&prices="+priceArray+"&sortby="+$('#product_sort').val(),
			beforeSend: function(){
				$("#loader").addClass("loading");				
			},
			complete: function(){
				$("#loader").removeClass("loading");				
			},           
			success:function(data){				
				$("#product_list").html(data.html);	
				if(data.hashurl!="")	
					document.location.hash = data.hashurl;
				else
					onReload();
			},
			error: function(data) { // if error occured
				 alert("Error occured.please try again");			
			},		
			dataType:"json"
		 });
});
$('body').on('click', '.currentPage', function(e){
	e.preventDefault();
});

$('body').on('click', '.pagePaginate', function(e){
	e.preventDefault();
	
	var catArray=[];
	var priceArray=[];
	$('.checked').each(function () {
       var t = $(this);
	   if(t.hasClass('subcat')){
	   		catArray.push(t.attr('data-id'));			 
	   }else{
		   	priceArray.push(t.attr('data-id'));			 
	   }
     });
	
	 var storeUrl = jQuery("#storeurl").val();
	 	 $.ajax({
			url: storeUrl+"//modules/plugins/refine_search/ajax/ajax.filteredList.php",
			type:"POST",
			data:"pagecat_id="+$('#catId').val()+"&category="+catArray+"&prices="+priceArray+"&sortby="+$('#product_sort').val()+"&pageno="+$(this).attr("data-id"),
			beforeSend: function(){
				$("#loader").addClass("loading");				
			},
			complete: function(){
				$("#loader").removeClass("loading");				
			},           
			success:function(data){				
				$("#product_list").html(data.html);	
				if(data.hashurl!="")	
					document.location.hash = data.hashurl;
				else
					onReload();
			},
			error: function(data) { // if error occured
				 alert("Error occured.please try again");			
			},		
			dataType:"json"
		 });
});
function onReload(){
	var loc = window.location.href,
    index = loc.indexOf('#');

	if (index > 0) {
	  window.location = loc.substring(0, index);
	}
}

 onReload();