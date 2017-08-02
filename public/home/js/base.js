$('.nav .list').hover(
	function(){
		$(this).css({background:'#fff',borderLeft:'1px solid #ccc',borderRight:'1px solid #ccc'}).children('.none').show();
		// $(this);
		$(this).find('.s2').css('top',-1);
	},function(){
		$(this).children('.none').hide();
		$(this).find('.s2').css('top',-7);
		$(this).css({background:'none',borderLeft:'1px solid #E3E4E5',borderRight:'1px solid #E3E4E5'});
	}
);