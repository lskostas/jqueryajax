/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// The root URL for the RESTful services
var rootURL = "http://localhost/jqueryajax/api/v1/articles";

$(document).ready(function() {
    findAll();   


// Register listeners
$('#btn_api_1').click(function() {
   deleteArticle();
});

$('#btn_api_2').click(function() {
  addArticle(); 
});

$('#btn_api_3').click(function() {
  updateArticle(); 
});

//$('#search_api').keypress(function() {
//  console.log( "Handler for .keypress() called." );
//});

// Trigger search when pressing 'Return' on search key input field
$('#search_api').keypress(function(e){
	if(e.which == 13) {
		search($('#search_api').val());
		e.preventDefault();
		return false;
                
    }
});

function search(searchKey) {
	if (searchKey == '') 
		findAll();
	else
		findByName(searchKey);
}







   $('#get_articles_api').change(function() { 
     var id= this.value; 
     
     findById(id);
    });
    
  



});  // end document ready



function findAll() {
	console.log('findAll');
	$.ajax({
		type: 'GET',
		url: rootURL,
		dataType: "json", // data type of response
		success: renderList
	});
}

function renderList(data) {
	// JAX-RS serializes an empty list as null, and a 'collection of one' as an object (not an 'array of one')
	var list = data == null ? [] : (data.article instanceof Array ? data.article : [data.article]);

	//$('#wineList li').remove();
                  $('#get_articles_api')
                  .find('option')
                  .remove()
                  .end()
                .append('<option value="0">Select an article</option>');
                //.val('whatever');
        
          
	$.each(list, function(index, article) 
        {       
      //  $('#wineList').append('<li><a href="#" data-identity="' + article.id + '">'+article.author+'</a></li>');
  
        var opt ="<option value='"+article.id+"'>" + article.author + article.email + "</option>";  
       $('#get_articles_api').append(opt);
        
	}     
);
        
}



function findById(id) {
	console.log('findById: ' + id);
	$.ajax({
		type: 'GET',
		url: rootURL + '/' + id,
		dataType: "json",
		success: function(data){
			//$('#btnDelete').show();
                        $('#debugging_area_api').val(data.id + data.title + data.author + data.email);
			console.log('findById success: ' + data.id + data.title);
			currentArticle = data;
			renderDetails(currentArticle); 
		}
	});
}



function addArticle() {
	console.log('addArticle');
	$.ajax({
		type: 'POST',
		contentType: 'application/json',
		url: rootURL,
		dataType: "json",
		//data: formToJSON(), Alternative kai pio kalo
                data: {id: $('#id_api').val(),
                       email: $('#email_api').val(),
                       title:$('#title_api').val(),
                       author:$('#author_api').val(),
                       summary:$('#summary_api').val(),
                       content:$('#content_api').val()
                       },
                
		success: function(data, textStatus, jqXHR){                   
		     alert('Article created successfully');
                     findAll();  // Reload again the select with the newest added
                     initialize_input(); // function that Empties the textboxes 
			//$('#btnDelete').show();
			//$('#wineId').val(data.id);
		},
		error: function(jqXHR, textStatus, errorThrown){
		alert('addArticle error: ' + textStatus);
		}
	});
}


function deleteArticle() {
	console.log('deleteArticle');
	$.ajax({
		type: 'DELETE',
		url: rootURL + '/' + $('#id_api').val(),
		success: function(data, textStatus, jqXHR){
			findAll();  // Reload again the select with the newest added
                        initialize_input(); // function that Empties the textboxes 
                        alert('Article deleted successfully');
                        
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('deleteWine error');
		}
	});
}

function updateArticle() {
	console.log('updateArticle');
	$.ajax({
		type: 'PUT',
                contentType: 'application/json',
		url: rootURL + '/' + $('#id_api').val(),
                dataType: "json",
		data: formToJSON(), // ayto edo einai ena javascript object se json - einai ola ta fields
		
                success: function(data, textStatus, jqXHR){
			findAll();  // Reload again the select with the newest added
                        initialize_input(); // function that Empties the textboxes 
                        alert('Article UPDATED successfully');
                        
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert('updateWine error');
		}
	});
}

// SIMANTIKO equivalent to $.get
//$.ajax({  
//  type: method,
//  url: url,
//  data: data,
//  success: success,
//  dataType: dataType
//});


function findByName_ALTERNATIVE(searchKey) {
console.log('findByName: ' + searchKey);
	$.ajax({
		type: 'POST',
		url: rootURL + '/search/' + searchKey,
		//dataType: "json", den einai json edo
		  success: function(data){
                      
                      if(data=='[]') {  // Ean epistrepsei adeio json object
                        alert("article doesn't not exist");  
                    } else {
                          // var currentArticle = jQuery.parseJSON(data); 
                       var newString = data.substring(1, data.length-1); 
                       //var currentArticle = JSON.parse(newString);                   
                        var currentArticle = JSON.parse(newString);
                       alert(currentArticle.email);
                      

			renderDetails(currentArticle); 
                     
                    }
                    
                      }
	});
}

 function findByName(searchKey) {
     
    // $.post(url, data, callback, type)
   $.post(rootURL + '/search/' + searchKey, // url 
     
    { // this is javascript object-PARAMETER DATA to pass inside the request
    //task : "save_user_task"
    },
     
    function(data) 
     {   // ayto einai callback
         $('#debugging_area_api').val(data);
        //var currentArticle = jQuery.parseJSON(data);
    
     // console.log(data); 
    var newString = data.substring(1, data.length-1); 

     //alert(newString); 
     // http://www.mkyong.com/javascript/how-to-access-json-object-in-javascript/
     
 // How to Remove Square bracket from JSON
//http://stackoverflow.com/questions/19699452/how-to-remove-square-bracket-from-json 

 var currentArticle = JSON.parse(newString);
// alert(currentArticle.email);      
// $('#id_api').val(currentArticle.id);    
// $('#title_api').val(currentArticle.title);
// $('#author_api').val(currentArticle.author);
// $('#email_api').val(currentArticle.email);
// $('#summary_api').val(currentArticle.summary);
//$('#content_api').val(currentArticle.content);
          
          
  renderDetails(currentArticle); 
     }
    )    
 }
 
 function renderDetails(article) {
	$('#id_api').val(article.id);
       
	$('#title_api').val(article.title);
	$('#author_api').val(article.author);
	$('#email_api').val(article.email);
        $('#summary_api').val(article.summary);
        $('#content_api').val(article.content);
	
	//$('#pic').attr('src', 'pics/' + wine.picture);
	//$('#description').val(wine.description);	
}


// Helper function to serialize all the form fields into a JSON string
function formToJSON() {
	return JSON.stringify({
		"id": $('#id_api').val(), 
		"email": $('#email_api').val(), 
		"title": $('#title_api').val(),
		"author": $('#author_api').val(),
		"summary": $('#summary_api').val(),
		"content": $('#content_api').val()
		//"picture": currentWine.picture,
		//"description": $('#description').val(),
		//"cat_id": $('#category').val()
		});
}

function initialize_input() {  // function that Empties the textboxes 
		$('#id_api').val(''), 
		$('#email_api').val(''), 
		$('#title_api').val(''),
		$('#author_api').val(''),
		$('#summary_api').val(''),
		$('#content_api').val('');
		
}