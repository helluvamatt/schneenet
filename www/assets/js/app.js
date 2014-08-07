$(document).ready(function()
{
	var $window = $(window);
	$('section[data-type="background"]').each(function()
	{
		var $scroll = $(this);
		var scrollBackground = function()
		{
			var yPos = -($window.scrollTop() / $scroll.data('speed'));
			var coords = '50% ' + yPos + 'px';
			$scroll.css({
				backgroundPosition: coords
			});
		};
		$(window).scroll(scrollBackground);
		scrollBackground();
	});
});
