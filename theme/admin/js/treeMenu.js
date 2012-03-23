$(document).ready(function (){
		
		// TREE MENU
		
		$('#treeMenu ul li:has("div")').find('span:first').addClass('closed');
		$('#treeMenu ul li:has("div")').find('div').hide();	
		$('#treeMenu li:has("div")').find('span:first').click (function (){ 
			$(this).parent('li').find('span:first').toggleClass('opened');
			$(this).parent('li').find('div:first').slideToggle();
		 
		 });
	});