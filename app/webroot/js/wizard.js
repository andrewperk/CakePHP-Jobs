$(document).ready(function(){
	// load in post a job with ajax
	$('#sidebar #post-job').live('click', function(event){
		event.preventDefault();
		var href = $(this).attr('href');
		$('#main').load(href+' #content');
	});
	
	// progress bar 
	// when linked is clicked loads in section with ajax
	$('#wizard div a').live('click', function(event){
		event.preventDefault();
		var href = $(this).attr('href');
		$('#main').load(href+' #content');
	});
});
