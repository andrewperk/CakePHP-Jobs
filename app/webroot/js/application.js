$(document).ready(function() {
	/**
	 * Filtering Jobs via Ajax
	 */ 

	// Job form values
	var jobtypevalue;
	var joblocationvalue;
	var jobcompanynamevalue;
	var jobtitlevalue;
	
	// If Job Type select element changes load in the appropriate jobs
	$('.job-type-filter').change(function(){
		jobtypevalue = $('.job-type-filter').val();
		joblocationvalue = $('.job-location-filter').val();
		jobcompanynamevalue = $('.job-company-name-filter').val();
		jobtitlevalue = $('.job-title-filter').val();
		
		$('#main').load('/projects/cakephpjobs/jobs/index/jobtype:'+jobtypevalue+'/joblocation:'+joblocationvalue+'/jobtitle:'+jobtitlevalue+'/companyname:'+jobcompanynamevalue+' #content');
	});
	
	// An array of search input fields
	var searchfields = ['job-location-filter', 'job-title-filter', 'job-company-name-filter'];
	
	// Loop through all search input fields
	// and listen for keypresses to load in 
	// appropriate jobs
	for (field in searchfields) {
		$('.'+searchfields[field]).keypress(function(){
			jobtypevalue = $('.job-type-filter').val();
			joblocationvalue = $('.job-location-filter').val();
			jobcompanynamevalue = $('.job-company-name-filter').val();
			jobtitlevalue = $('.job-title-filter').val();
			
			$('#main').load('/projects/cakephpjobs/jobs/index/jobtype:'+jobtypevalue+'/joblocation:'+joblocationvalue+'/jobtitle:'+jobtitlevalue+'/companyname:'+jobcompanynamevalue+' #content');
		});
	}
	
	// Hide the jobs button
	$('#filter-jobs .button').hide();


	// ============================= //


	/**
	 * Alternate Job Rows styling
	 */
	$('#jobs tr:even').addClass('highlight-even')
	$('#jobs tr:odd').addClass('highlight-odd');
	
	$('#devs tr:even').addClass('highlight-even')
	$('#devs tr:odd').addClass('highlight-odd');


	// ============================ //


	// load in post a job with ajax
	/*
	$('#sidebar #post-job').live('click', function(event){
		event.preventDefault();
		var href = $(this).attr('href');
		$('#main').load(href+' #content');
	});
	*/
	
	
	// progress bar 
	// when linked is clicked loads in section with ajax
	$('#wizard div a').live('click', function(event){
		event.preventDefault();
		var href = $(this).attr('href');
		$('#main').load(href+' #content');
	});
});


