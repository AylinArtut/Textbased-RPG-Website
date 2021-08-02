// After the website is fully loaded: 
$(document).ready(function(){
	// When any section in my navigation is clicked:
	$("a[id]").click(function (){
		// Get the ID of clicked section, built file-name and load input of file to my content-div:
		$("#contentMenu").load("WebsitePages/" + $(this).attr("id") + ".php");
	});
});