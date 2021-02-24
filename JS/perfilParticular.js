// JavaScript Document

$(document).ready(function(){
	
	$("body").hide().fadeIn(1500);
	
	$("#div_file2").hide();
	//$("#fotosDesplegadas").hide();
	
	$("#div_file").click(function(){
		$("#div_file").hide();
		$("#div_file2").show();
	});
	
	var contador = 1;
	
	$("#desplegarfotos").click(function(){
		
		if(contador == 1){
			$("#fotosDesplegadas").animate({
				bottom: '39px'
			}, { duration: 1800, easing: "swing"});
			contador = 0;
		}else{
			contador = 1;
			$("#fotosDesplegadas").animate({
				bottom: '-100%'
			}, { duration: 3000, easing: "swing"});
		}
	});
	
	$("#btn1").click(function(){
    	$("#estados").slideDown();
	});
	
  	$("#btn2").click(function(){
    	$("#estados").slideUp();
  	});
	
});