$(document).ready(function() {
      
   get_user_list();   
      
      
   $('#userselectbox').click(function() {  
      //alert("2"); 
        
   });
   
   
   $('#call_back_btn').click(function() {
         
      //alert("we are going to save");   
      save_user(); 
      get_user_list(); 
   });
   
    $('#call_back_btn2').click(function() {
         
      alert("we are going to call a script");   
      call_script_1(); 
       
   });


   function save_user() {
      // $.post(url, data, callback, type)
     $.post("demophp4.php"  ,
     {
     first_name: $('#first_name').val(),
     surname: $('#surname').val(),
     datepicker: $('#datepicker').val(),
     task: "save_user"
     }
     ,
     function (data) 
     {
       $('#responseText').val(data);
       alert(data);
     }
     );
   }
   
   function get_user_list() {
         $.post("ajax_getuserlist_demo4.php", // 1parameter
          {                          // 2 parameter
            task: "get_user_list"
          },
          function(data)  // 3 parameter
          {
          // $('#responseText').val(data)  
           
           var people = jQuery.parseJSON(data);
           for (var i in people)
               {
                var opt ="<option value='"+people[i].id+"'>" + people[i].first_name +" "+ people[i].surname +"</option>"; 
                $('#userselectbox').prepend(opt); //.append(opt); 
                $('#userselectbox_multiple').append(opt);
               }
          }
          ); 
     }
   
   
   function call_script_2() {  
   $.getScript( "js/simplescript", function( data, textStatus, jqxhr ) {
  console.log( data ); // Data returned
  console.log( textStatus ); // Success
  console.log( jqxhr.status ); // 200
  console.log( "Load was performed." );
});
   }
   
   function call_script_1() {  
     //  $.getScript(url, callback)
       
       $.getScript("js/simplescript.js", 
       function(data)  // 3 parameter
         {
     //  $('#responseText2').val(data); 
     //  $( "#ajax" ).html( "<h2>Triggered ajaxError handler</h2>" );
         }
      );
   }
   
   

 
   function call_script_1() { 
var url="http://localhost/lessons/jason_source.php";
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
 
 
 //I never forget that JQuery is just a wrapper around JS .
 //Anonymous callback functions are used extensively in Javascript ,
 //for better readability . JQuery’s each method is just a helper method ,
 //which then creates a “for-loop” statement behind the scenes .
 //Each “for-loop” returns an Object . 
 //In the context of our script , the callback function is “looping” 
 //through the values of each Object’s content . 
 //    The “i” is just a pointer , it marks the position
 //of the current loop . It dictates when the callback 
 //functions should stop looping (as it has reached the end of Object’s content ) .
 
 
 

   
});