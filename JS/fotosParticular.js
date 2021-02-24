// JavaScript Document
$(document).ready(function(){
	
	$("#div_file2").hide();
	//$("#fotosDesplegadas").hide();
	
	$("#div_file").click(function(){
		$("#div_file").hide();
		$("#div_file2").show();
	});
	
	var contador = 1;	
	$("#desplegable").stop().click(function(){
		
		if(contador == 1){
			
			$(this).animate({
				left: "0px"
			},1200, "easeOutBounce");
			
			contador = 0;
			
		}else{
						
			$(this).animate({
				left: "-80%"
			},1100, "easeOutBounce");
			
			contador = 1;
			
		}
			
	});
				
	
	$("#desplegable a").fancybox({
					
		overlayColor:"#797e79",
		overlayOpacity: .6,
		transitionIn: "elastic",
		transitionOut: "elastic",
		
		titlePosition:"Outside",
					
		cyclic:true,
		
		speedIn: 1200,
		speedOut: 1500,
		
		
	});
				
});