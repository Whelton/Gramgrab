/* Author:

*/

$(".gram").click(function(){
  	window.open('get.php?url='+$(this).children('.url').val());
});

$(".gram").hover(
	function () {
    	$(this).children('.dim').css('visibility', 'visible');
    	$(this).children('.meta').css('visibility', 'visible');
  	}, 
  	function () {
    	$(this).children('.dim').css('visibility', 'hidden');
    	$(this).children('.meta').css('visibility', 'hidden');
  	}
);