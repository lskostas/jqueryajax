// http://lab.abhinayrathore.com/jquery-standards/

$(document).ready(function() {
    
    
    getuserlist(); // kalietai me document ready fernei users
    // get_users_with_get();
    fetch_json_users(); // xrisimopoieite sto 1tab
    fetch_json_countries(); // xrisimopoieite 1tab
   // gettoserver2();
 
    fetch_json_questions(); // xrisimopoieite sto 4tab
    
    
    
    get_articles_list(); // xrisimopoieite sto tab me ta post() articles
    
    $('#article').change(function() { // otan allazo timi sto dropdown me ta articles
       get_article();
    });
    
    
    $('#new_answer').click(function() {     
     
      save_article();
    });
    
    $('#update_answer').click(function() { // kano update to article
        update_article();
    });
    
    $('#delete_answer').click(function() {
       delete_article();
    });
    
     $('#btn_get_game').click(function() {  // Button gia api game
       
    var game_variable = $("#game").val();
    var game_text = $('#game').find(':selected').text()  

  

        
    alert(game_variable);
    alert(game_text);
    
    get_game_results_json();
     
     });
     
      $('#btn_fb_api').click(function() {  // Button gia facebook game 
    get_fb_api_data();
     });
     
   
    
     $('#api_task_manager_register_btn').click(function() { // Button gia API_TASK_MANAGER register
       task_manager_api_register();  
     });
    
    
     $('#api_task_manager_login_btn').click(function() { // Button gia API_TASK_MANAGER
       task_manager_api_login();  
     });
    
    
    $('#api_task_manager_create_task_btn').click(function() { // Button gia API_TASK_MANAGEr create task
       task_manager_api_create_task(); 
        
    });
    
    
     /* ADD remove dynamic elements in JQUERY */
    /* http://stackoverflow.com/questions/19129794/how-to-remove-an-element-that-is-added-dynamically-in-javascript */
	 $("#add_dynamically").click(function() {
	 add_block()
	 });
	 
	 
	// $('a.remove_block').on('click',function(events){ /* lathos kodikas */
        //  $(this).parents('div').eq(1).remove();
        // });
	 
	  $('#parent').on('click', 'a.remove_block', function(events){ /* sostos */
          $(this).parents('div').eq(1).remove();
          });
	  /* END of code: ADD remove dynamic elements in JQUERY */
    
    
    
    

   $('#btn1').click(function() {
      get_method_to_server();
      // get_method_to_server2();
      //get_method_to_server3();
     
   } );
    
   $('#users').change(function(){
        alert("see in js where it is triggered");
       //get_users_with_get();       
   }); 
    
    
   $('#btn_clear_all').click(function() {
     
     $('#dob').val(''); //users
     $('#surname').val('');
     $('#firstname').val('');
     
     $('#question').val(''); //questions
     $('#answer').val('');
     $('#link').val('');
     $('#debugging_area1').val(''); // empty the debug area  
     $('#debugging_area2').val('');  
   });  
    
    
   $('#btn_clear').click(function() {
       
     $('#debugging_area1').val(''); // empty the debug area  
     $('#debugging_area2').val('');  
   }); 
    
    
    
   $('#getquestiondropdown').change(function(){
       
      get_question(); 
   }); 
    
   $('#getusersdropdown').change(function(){
       get_user();
   });
   
   

   $('#btn_json1').click(function() {  
       fetchjsonfromserver();
     });


  $('#btn_js_file1').click(function() {
      
      //alert(2);
      fetchjsfromserver();
     });
  
  
  $('#btn_post').click(function() 
  {
   postfunctionexample();  
  });
  
  $('#btn_post_question').click(function(){
      // $.post(url, data, callback, type)
      save_question();
  });
  
  
  
  // Submit form with Jquery Form Submit Demo
  //1) Submit Form using Form's ID
  $('#submit1').click(function(){
    alert('Form will be submitted by Forms ID');
    $("#testForm").submit();  
  }); 
    

   //2 Submit Form using Form's Name
     $('#submit2').click(function(){
   alert('Form will be submitted by Forms Name');
   $("form[name='myform']").submit();
   
     });

   //3 Submit Form using Form's Index.
     $('#submit3').click(function(){
      alert('Form will be submitted by Forms Index');        
      $("form:first").submit();
    });
  // end jquery form submision  
  
  
  // jquery code used for explain .serialize() form 
  
  
  
  showValues();
  
  $('#serialize_button').click(function() {
  showValues();
  });
 
    function showValues() {
    var str = $( "#myform_for_serialize" ).serialize();
    $( "#textarea_3" ).text( str );
  
  $( "input[type='checkbox'], input[type='radio']" ).on( "click", showValues );
  $( "select" ).on( "change", showValues );
    }


//http://stackoverflow.com/questions/4122910/facebook-jquery-ajax-json-call-uncaught-syntaxerror-unexpected-token?rq=1

function get_fb_api_data() {
   alert("starting");
 var fbUrl = "http://www.facebook.com/feeds/page.php?id=20531316728&format=JSON";

$.ajax({
    url: "http://query.yahooapis.com/v1/public/yql",
    dataType: "jsonp",
    data: {
        q: 'select * from json where url="' + fbUrl + '"',
        format: "json"
    },
    success: function (data) {
         alert(data);
        
        $.each(data.query.results.json.entries, function (i, v) {
            $('#facebook_entries').append(data.query.results.json.entries[i].title + '<br />');
        });
    }
});
}








function fetch_json_questions() {
   var url="http://localhost/jqueryajax/jason_source_questions.php";  
   $("#debugging_area2").html('');  
   $.getJSON(url,function(data) // function call back
   {     
       $.each(data.questions ,  function(i,question){
           
        var question2 =
       "<option value='"+question.id+"'>"
       + question.question +"</option>"; 
        $('#getquestiondropdown').append(question2);     
       })  
   })    
}


function fetch_json_users() {
    
var url="http://localhost/jqueryajax/jason_source.php";
 $( "#debugging_area" ).html(''); // svinei ta sxolia mesa stin area

$.getJSON(url,function(data) // function call back
{ 
  //$.each(data.members, function(i,user){ ean vazeis sto json mprosta members  
  $.each(data.members, function(i,user){
  var people =
  "<tr>" 
  +"<td>"+user.id+"</td>"
  +"<td>"+user.surname+"</td>"
  +"</tr>" ;
  $('#userdata').append(people);  //$(people).appendTo("#userdata");
});

  $.each(data.members, function(i,user)
  {  
  var people =
  "<option value='"+user.id+"'>"
+ user.firstname +" "
+ user.surname +"</option>"; 

 $("#user").append(people);
 
 $( "#debugging_area" ).append(user.id);  // append(user.id) tha grapsei 1,2,3,4 - val(user.id) tha grapsei 4
});
  // $( "#debugging_area" ).append(data).val();
});
}


function  fetch_json_countries() {
 var url2="http://localhost/jqueryajax/jason_source_countries.php";

 $.getJSON(url2,function(data) // function call back
{ 
  //$.each(data.members, function(i,user){ ean vazeis sto json mprosta members  
  $.each(data.countries, function(i,countries){
  var country =
  "<option value='"+countries.id+"'>"
  +"<td>"+countries.country+"</td>"
  +"</option>" ;
  $('#country').append(country);  //$(people).appendTo("#userdata");
});
});
}

function fetchjsonfromserver() { 
var url="http://localhost/jqueryajax/jason_source.php";
$("#userdata tbody").html("");
$.getJSON(url,function(data){
$.each(data.members, function(i,user){
var tblRow =
"<tr>"
+"<td>"+user.id+"</td>"
+"<td>"+user.firstname+"</td>"
+"<td>"+user.surname+"</td>"
+"<td>"+user.title+"</td>"
+"</tr>" ;
$(tblRow).appendTo("#userdata tbody");
});
});
}



 function get_method_to_server() {   

   $.ajax({
      
        type: "get",
        url: "demojqueryajax.php",
        //this is javascript object-PARAMETER DATA to pass inside the request    
        data:{ 
        task: "task_get_user_with_get_method", // firstname:property of the object-will be the key for the post variable in php -- value-pair
        //country: $('#country').val(), // i timi tou country arithmos
        // user: $('#user').val(), //i timi tou user arithmos
        country:$('#country').find(':selected').text(),
        user:$('#user').find(':selected').text()
           }    
      })
      .done(function( data ) {
       alert( "Data Saved: " + data ); // (1)to data(json) apo mono tou den mporei na deiksei first_name
       
       var mydata = jQuery.parseJSON(data); // (2)to kano assign se metavliti kai Parse
       
          $('#country_textbox').val(mydata.country); //(3) kai deixno to apotelesma se textbox
          $('#user_textbox').val(mydata.first_name);
          
           
        
      });
}

function get_method_to_server2() {

     $.get( "demojqueryajax.php", 
    { 
      task: "task_get_user_with_get_method",  
      country:$('#country').find(':selected').text(),
      user:$('#user').find(':selected').text()
    }
    )
   .done(function( data ) {
   alert( "Data are in ALERT BOX: " + data );
  })
  .done(function() {
    alert( "second success" );
  })
  .fail(function() {
    alert( "error" );
  })
  .always(function() {
    alert( "finished" );
  });
}

function get_method_to_server3() {   
   $.get( "demophp.php",  // esvisa to demophp.php parigage json names xrisimopoio demojqueryajax.php
   function( data ) {
  $( "#debugging_area" )
    .append( "Name: " + data.name ) // John
    .append( "Time: " + data.time ); //  2pm
}, "json" );
}


// SIMANTIKO equivalent to $.get
//$.ajax({  
//  url: url,
//  data: data,
//  success: success,
//  dataType: dataType
//});

 function task_manager_api_login() {   

   $.ajax({
      
        type: "post",
        url: "http://localhost/task_manager/v1/login",
        //this is javascript object-PARAMETER DATA to pass inside the request        
         data:{ 
        name: $('#api_task_manager_name').val(), 
        email: $('#api_task_manager_email').val(), 
        password: $('#api_task_manager_password').val()
           }    
      })
      .done(function( data ) {
       // alert( "Data Saved: " + data );
        alert(data.email);
         alert(data.apiKey);
      $('#task_manager_api_debug').val(data.email + data.apiKey)
   //    apiKey: "c3d6dc39d85f162133ca3b7763a3c5cd"
   //createdAt: "2014-04-11 16:26:25"
   //email: "ls.kostas@gmail.com"
   //error: false
   //name: "Kostas"      
      });
}

 function task_manager_api_register() { 
     
      $.ajax({
      
        type: "post",
        url: "http://localhost/task_manager/v1/register",
        //this is javascript object-PARAMETER DATA to pass inside the request        
         data:{ 
        name: $('#api_task_manager_name_register').val(), 
        email: $('#api_task_manager_email_register').val(), 
        password: $('#api_task_manager_password_register').val()
           }    
      })
      .done(function( data ) {
          
       if (data.error == "true")
  {
  alert(data.message);
  }
else
  {
 alert(data.message);
  }           
 });
     
 }


function task_manager_api_create_task() {
    
     $.ajax({
      
        type: "post",
        url: "http://localhost/task_manager/v1/tasks",
        //this is javascript object-PARAMETER DATA to pass inside the request 
        headers: {
         "Authorization":  $('#api_task_manager_authorisation').val()
       // Header_Name_One: 'Header Value One',   //If your header name has spaces or any other char not appropriate
       // "Header Name Two": 'Header Value Two'  //for object property name, use quoted notation shown in second
    },
        
         data:{ 
        task: $('#api_task_manager_task_name').val()
           }    
      })
      .done(function( data ) {
        alert(data);  
            
 });
    
    
}


function add_block() {  // It is used on ADD remove dynamic elements in JQUERY
   var curDiv = $('#parent');
   var i = $('#parent div').size()/4 + 1;
   var newDiv='<div id="block_'+ i + '" class="parent_div">' +
   '<img src="img/down.png">' +
   '<div>' +
    '<input type="text">' +
    '</div><div><a class="remove_block">Remove</a></div>';
    $(newDiv).appendTo(curDiv);
};













   
   function getuserlist() {
     
   // $.post(url, data, callback, type)
   // $.post('demojqueryajax.php?ajax=true', // url with ajax variable
   $.post('demojqueryajax.php', // url 
     
   { //this is javascript object-PARAMETER DATA to pass inside the request
 task: "get_user_list_task"   
   },     
   function(data) // callback
   { 
     //$('#debugging_area1').val(data);
     var people = jQuery.parseJSON(data); // parse to json pou paragetai stin php
           for (var i in people)
       {
         var opt ="<option value='"+people[i].id+"'>" + people[i].first_name +" "+ people[i].surname +" "+ people[i].dob +"</option>"; 
         $('#getusersdropdown').prepend(opt); //.append(opt); 
       }    
    }
   )    
 }

function get_articles_list() { 
  $.post('demojqueryajax.php',
   {
    task : "task_get_articles_list"
   } ,
   function(data) { // callback
    
    var articles = jQuery.parseJSON(data);
    for (var i in articles)
        {
     var opt ="<option value='"+articles[i].id+"'>" + articles[i].title +" "+ articles[i].author +"</option>";  
      $('#article').append(opt);      
        }     
      $('#debug_area_article').val(data);
}
)}
function get_article() {
   $.post('demojqueryajax.php',
    {
      task: "task_get_article",  // this is javascript object-PARAMETER DATA to pass inside the request
      option_value: $('#article option:selected').val() 
    },
    function(data) {  // callback 
        // alert(data);
        
        var selected_article = jQuery.parseJSON(data);
        
        $('#title').val(selected_article.title);
        $('#author').val(selected_article.author);
      //  $('#summary_articles').val(selected_article.summary);
         $('#email').val(selected_article.email);       
        alert ("you have chose:" + selected_article.title);
        
    }
)}


function update_article() {
    
  $.post("demojqueryajax.php",

    {
     task: "task_update_article",
     update_title_id: $('#article option:selected').val() ,
     title: $('#title').val(),
     author: $('#author').val(),
     email: $('#email').val()
    },
    
    function(data) {
       
     alert(data);  
     var allarticles = jQuery.parseJSON(data);  // isos den thelei append thelei kati pou na kanei ap tin arxi refresh
     
     $('#article').empty();
     
     for (var i in allarticles)
        {
     var opt ="<option value='"+allarticles[i].id+"'>" + allarticles[i].title +" "+ allarticles[i].email +"</option>";  
     $('#article').append(opt);   
       }
       
     $('#messageContent').html("");
     $('#messageContent').append('<p>success</p>'); 
     
     
     $('$title').val("title");
     //location.reload(); // kanei refresh oli tin selida
    // $("#article").hide().fadeIn('fast');
      
   // $('#article').children().remove().end().append(opt); 
   // $("#article").html(opt); 
    }
)  
}

 function save_article() {
     
   //  $.post(url, data, callback, type)
     alert('save is about to happen');
     $.post("demojqueryajax.php",
    {
     task: "task_save_article",
     title: $('#title').val(),
     author:$('#author').val(),
     email:$('#email').val()
     //summary:$('#summary_articles').val()
    },
    function (data) {   
       //alert(data); 
       var checked_email = jQuery.parseJSON(data);
       alert(checked_email.email);   
       
       
       $('#article').empty(); // emprty in order to refill it 
       get_articles_list(); 
     
    }

)
     
 }
 
 
 function delete_article() {
     
     //$.post(url, data, callback, type)
     $.post("demojqueryajax.php",
       {
        task:"task_delete_selected_article",
         article: $('#article option:selected').val() 
           
       },
       function(data) 
           {
          
          alert("this is what is what deleted");
          alert(data);    
           $('#article').empty(); // emprty in order to refill it 
           get_articles_list();    
           
           $('#title').val(''),
           $('#author').val(''),
           $('#email').val('')
           
           
           }
          
      )
 }
 

    
 function fetchjsfromserver() {
      //$.getScript(url, callback)
       
       $.getScript("js/simplescript.js", 
       function(data)  // 3 parameter
         {
     $('#textarea1').val(data); 
     $('#my_divarea').html('<h2>#my_div html and css changed! </h2>');
     
         }
      );
 }
 

 function postfunctionexample() {  // ti kanei? saves a user
     
    // $.post(url, data, callback, type)
    // $.post('demojqueryajax.php?ajax=true', // url with ajax variable
   $.post('demojqueryajax.php', // url 
     
    { // this is javascript object-PARAMETER DATA to pass inside the request
    firstname: $('#firstname').val(), // firstname:property of the object-will be the key for the post variable in php -- value-pair
    surname: $('#surname').val(), 
    dob: $('#dob').val(),
    task : "save_user_task"
    },
     
    function(data) 
     {   // ayto einai callback
         $('#debugging_area1').val(data);
         //alert(data);        
        // var people = JSON.parse(data);
        // alert(people);
     }
    )    
 }
 
 function save_question() {
     // $.post(url, data, callback, type)    
     $.post("demojqueryajax.php",
     {
      task : "task_save_question",
      question: $('#question').val(),
      answer:    $('#answer').val(),
      link:       $('#link').val()
     }
        ,
 function(data)   // callback function which updates my dom
       {
        var questions = jQuery.parseJSON(data);
         $('#debugging_area2').val(data);
           
        alert("we are about to empty textboxes");   
        $('#question').val(''); 
        $('#answer').val('');
        $('#link').val('');
        
     $('#question').val(questions.question); //questions
     $('#answer').val(questions.answer);
     $('#link').val(questions.link);
        
         $('#debugging_area2').val(data);
       }
     )
 }
 
 function get_question() {
     $.post("demojqueryajax.php",
      {
       id: $('#getquestiondropdown').val(),  // javascript object
       task: "task_get_question_with_post"   
      },
      function(data) 
      {  
          
       var question = jQuery.parseJSON(data);    
          
      $('#question').val(question.question),
      $('#answer').val(question.answer),
      $('#link').val(question.link),
          
            
      $('#debugging_area2').val(data)
      } 
      );   
 }
 


 
 
 function get_user() {
   
   $.post("demojqueryajax.php", // 1parameter
          {             
           id: $('#getusersdropdown').val(),  // javascript object
           task: "get_user_task"
          },
          function(data)  // 3 parameter
          {
           var person = jQuery.parseJSON(data);   
              
         $('#debugging_area1').val(data),        
           $('#firstname').val(person.first_name),
           $('#surname').val(person.surname),
           $('#dob').val(person.dob)
          } 
          );   
 }






 });