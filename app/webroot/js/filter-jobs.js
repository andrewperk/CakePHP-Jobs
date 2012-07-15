$(document).ready(function() {
	var jobtypevalue;
	var joblocationvalue;
	var jobcompanynamevalue;
	var jobtitlevalue;
	
	$('#JobJobtype').change(function(){
		jobtypevalue = $('#JobJobtype').val();
		joblocationvalue = $('#JobJoblocation').val();
		jobcompanynamevalue = $('#JobCompanyname').val();
		jobtitlevalue = $('#JobJobtitle').val();
		
		$('#main').load('/cakephpjobs/jobs/index/jobtype:'+jobtypevalue+'/joblocation:'+joblocationvalue+'/jobtitle:'+jobtitlevalue+'/companyname:'+jobcompanynamevalue+' #content');
	});
	
	var searchfields = ['JobJoblocation', 'JobJobtitle', 'JobCompanyname'];
	
	for (field in searchfields) {
		$('#'+searchfields[field]).keypress(function(){
			jobtypevalue = $('#JobJobtype').val();
			joblocationvalue = $('#JobJoblocation').val();
			jobcompanynamevalue = $('#JobCompanyname').val();
			jobtitlevalue = $('#JobJobtitle').val();
			
			$('#main').load('/cakephpjobs/jobs/index/jobtype:'+jobtypevalue+'/joblocation:'+joblocationvalue+'/jobtitle:'+jobtitlevalue+'/companyname:'+jobcompanynamevalue+' #content');
		});
	}
	
	$('#filter-jobs .button').hide();
});


