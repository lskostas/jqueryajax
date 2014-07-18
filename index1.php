<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jquery ajax methods and bootstrap</title>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://code.jquery.com/jquery.js"></script> -->
        <script src="js/jquery-1.11.0.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h3>Shorthand Methods AJAX JQUERY</h3>
	
    <!-- Nav tabs -->
    
	 	<div class="jumbotron"> 
        <div class="container">
 
<!-------->
<div id="content">
   
    
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#red" data-toggle="tab">jQuery.get()</a></li>
        <li><a href="#orange" data-toggle="tab">jQuery.getJSON()</a></li>
        <li><a href="#yellow" data-toggle="tab">jQuery.getScript()</a></li>
        <li><a href="#green" data-toggle="tab">jQuery.post()</a></li>
        <li><a href="#blue" data-toggle="tab">.load()</a></li>
        <li><a href="#orangepost" data-toggle="tab">jQuery Form Submit DEMO</a></li>
        <li><a href="#blueserialize" data-toggle="tab">.serialize()</a></li>
        <li><a href="#post_sample_2" data-toggle="tab">.Post() articles</a></li>
        <li><a href="#jquery_coding_standards" data-toggle="tab">.JQuery Stadards</a></li>
         <li><a href="#php_api_slim" data-toggle="tab">API php</a></li>
         
         <li><a href="#facebook_api_tab" data-toggle="tab">facebook graph api</a></li>   
 
         <li><a href="#api_task_manager" data-toggle="tab"> API Task Manager </a></li>  
         <li><a href="#dynamic_elements" data-toggle="tab"> jquery dynamically elements </a></li>  
    </ul>
    

    
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="red">
        <h3>jQuery.get()</h3>
        <!-- Button trigger modal -->
        <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal_get_example">
        Notes(Launch modal)
        </button>
        <!-- end modal -->
        <p>Load data from the server using a HTTP GET request.</p>
                  

            
            
  
   <div class="col-xs-12 col-md-4">                
    
     <p>
     <select class="form-control" id="country">
     <option value="0">Select a country</option>
     </select> 
     </p>  
     <p>
      <select class="form-control" id="user">
      <option value="0">Select a user</option>
      </select>     
     </p> 
   </div>
            
            



      <div class="col-xs-12 col-md-4"> 
       <button class="btn btn-default btn-sm" id="btn1" type="button" >
        Get method
     </button>     
      </div>
           
     
   <div class="col-xs-12 col-md-4"> 
       <p> <input type="text" class="form-control" id="country_textbox" placeholder="country"> </p>
      <p> <input type="text" class="form-control" id="user_textbox" placeholder="user"> </p>
      
       <textarea class="form-control" id="debugging_area" rows="4"> This is Debuggin area</textarea>
       
        <div id="divarea"> data from server!!!</div>
   </div>       
            
  
     </div>
        <div class="tab-pane" id="orange">
                <h3>jQuery.getJSON()</h3>
            <p>Load JSON-encoded data from the server using a GET HTTP request.</p>
    
            
   <button class="btn btn-default btn-lg" id="btn_json1" type="button" >
    Load json data
  </button>         
            
   <table id="userdata" border="1">
    <thead>
    <th>Id</th>
    <th>First Name</th>
    <th>Surname</th>
    <th>Title</th> 
    </thead>
    <tbody></tbody>
   </table>
    
        </div>
        
     <div class="tab-pane" id="orangepost">
         <h3>Jquery Form Submit Demo</h3>
         <div class="col-xs-4 col-md-4"> 
         <form name="myform" id="testForm" method="POST" action="demojqueryajax.php">
         <div class="form-group">
         <label for="exampleInputEmail1">Firstname</label>
         <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter firstname">
         </div>
         <div class="form-group">
         <label for="exampleInputPassword1">Surname</label>
         <input type="text" id="surname" name="surname" class="form-control" placeholder="Enter Surname">
         </div>
         <div class="form-group">
         <label for="exampleInputPassword1">Date of Birth</label>
         <input type="date" id="dob" name="dob" class="form-control">
         </div>
         <input type="hidden" name="task" value="task_form_submition"/> <br/>  
         </form>
         </div>   
         
         <div class="col-xs-4 col-md-4"> 
         <input class="btn btn-default" type="button" id="submit1" value="Submit by Form ID" />
         <input class="btn btn-default" type="button" id="submit2" value="Submit by Form Name" />
         <input class="btn btn-default" type="button" id="submit3" value="Submit by Form Index" />
         <input class="btn btn-default" type="button" id="submit4" value="Submit with Event Handler" />
         
          
         
         </div>
         
         
         <div class="col-xs-4 col-md-4">
             
           <blockquote>
  <p>We use  Jquery command $("#testForm").submit(); and the submited data goes directly
  to demojqueryajax.php You dont use $.ajax or $.post or $.get in this example</p>
</blockquote>
              <textarea class="form-control" id="textarea_2" rows="4"> receiving data from server</textarea>     
         </div>
     
         
     </div>     
        
        <div class="tab-pane" id="blueserialize">
               
        <div class="col-xs-4 col-md-4">
             
          <blockquote>
           <p>.serialize()
          Encode a set of form elements as a string for submission. </p> 
          </blockquote>
     
             
             <p> Serialize a form to a query string that could be sent to a server in an Ajax request.</p>
         
            
        </div>
               
         <div class="col-xs-4 col-md-4">
             <div>Example </div>
             <form id="myform_for_serialize">
           
              <select class="form-control" id="single2" name="single2">
               <option value="0">Select a Double</option>
               <option>SingleDD</option>
                <option>SingleDD2</option>
                 <option>SingleDD3</option>
               </select>
                 
                 
                 
              <select class="form-control" id="single3" name="single3">
               <option value="0">Select a single</option>
               <option>Single2</option>
                <option>Single3</option>
                 <option>Single4</option>
               </select>
 
               <br>
              <select name="multiple" multiple="multiple">
              <option selected="selected">Multiple</option>
              <option>Multiple2</option>
              <option selected="selected">Multiple3</option>
              </select>
 
                 <br>
                <input type="checkbox" name="check" value="check1" id="ch1">
                <label for="ch1">check1</label>
                <input type="checkbox" name="check" value="check2" checked="checked" id="ch2">
                <label for="ch2">check2</label>
 
                <br>
                <input type="radio" name="radio" value="radio1" checked="checked" id="r1">
                <label for="r1">radio1</label>
                <input type="radio" name="radio" value="radio2" id="r2">
                <label for="r2">radio2</label>
           </form>
             
          <p><tt id="results"></tt></p>     
             
                 <button class="btn btn-primary btn-md" id="serialize_button">
        .serialize() in action
        </button>             
             
             
             <textarea class="form-control" id="textarea_3" rows="4">  Debugging area</textarea>  
         </div>
               
       </div>    
        
        <div class="tab-pane" id="post_sample_2">
            <h3>jQuery.post()</h3>
            <p>Load data from the server using a HTTP POST request.</p>
            
             <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first"> 
               
              <p>
              <select class="form-control" id="article">
              <option value="0">Select an article</option>
              </select> 
              </p> 
                 
                   <div id="messageContent">  </div>  
                 
                 
             </div>   
            
                 
            
         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first"> 
         <div class="form-group">
         <label>title</label>
         <input type="text" id="title" name="title" class="form-control" placeholder="Enter title">
         
         <label>Author</label>
         <input type="text" id="author" name="author" class="form-control" placeholder="Enter author">
         
          <label>email</label>
          <input type="text" class="form-control" id="email"placeholder="Enter email"> 
         
         
     <!--    <label>Summary</label>
          <textarea class="form-control" id="summary_articles" rows="3"> Summary</textarea> -->
         
         </div> 
             
             
           
           <button class="btn btn-primary btn-md" id="new_answer">
        New Article
        </button>      
             
                 
          <button class="btn btn-primary btn-md" id="update_answer">
        Update article
        </button>            
                 
          <button class="btn btn-primary btn-md" id="delete_answer">
        Delete selected article
        </button>            
                      
                 
             </div>  
            
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first"> 
              
               <textarea class="form-control" id="debug_area_article" rows="3"> results from server</textarea>  
              
            </div>   
            
            
            
            
            
        </div> 
        
        
        
        <!-- JQUERY STANDARDS TAB -->
        
       <div class="tab-pane" id="jquery_coding_standards">     
       <div class="container">  
                  
         <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 first">    
               <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
         Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
       1 KEIMENO .
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
           Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        2 KEIMENO
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
         Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
       3 KEIMENO
      </div>
    </div>
  </div>
</div>
             
             
             
             
             
             
         </div>
           
           
         <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first">    
      B COLUMN
         </div>       
           
           
      </div> <!-- CONTAINER -->  
      </div> <!-- end tab -->
        
        


        
      <div class="tab-pane" id="php_api_slim"> 
                   
      <h3>php slim api and jquery </h3>
      <p>Building a restfull api</p>
       
            
           <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 first">   
  <button class="btn btn-default btn-lg" id="btn_api_1" type="button" >
    Delete article
  </button> 
               
   <button class="btn btn-default btn-lg" id="btn_api_2" type="button" >
    New article
  </button> 
               
     <button class="btn btn-default btn-lg" id="btn_api_3" type="button" >
    Update article
  </button>   
               
      <label>Search article by title </label>
    <input type="text" class="form-control" id="search_api"  placeholder="Search by name">            
       
        <label>Results Api </label>
     <div id="results_api">this is content</div>  
    
               
           </div>
            
           <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 first">      
            
            
            <select class="form-control" id="get_articles_api">
              <option value="0">Select Article</option>
            </select> 
           
           </div> 
              
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 first">  
                
     <label>Article Id </label>
    <input type="text" class="form-control" id="id_api"  placeholder="id" disabled>            
                
          <label>Article Name </label>
    <input type="text" class="form-control" id="title_api"  placeholder="title">
    
        <label>Article Author </label>
    <input type="text" class="form-control" id="author_api"  placeholder="author">
    
        <label>Article Email </label>
    <input type="text" class="form-control" id="email_api"  placeholder="Email">
  
 
            </div>    
            
              <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 first">        
             <label>Article Summary </label>
     <textarea class="form-control" id="summary_api" rows="3"></textarea>
     
      <label>Article Content </label>
     <textarea class="form-control" id="content_api" rows="3"></textarea>
              </div>
            

          <textarea class="form-control" id="debugging_area_api" rows="3"></textarea>
                   
         <script src="api/js/main_jquery_api.js"></script>
                   
      </div>   
        
        
   
        
        
         <div class="tab-pane" id="facebook_api_tab">
        
             
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first">
         <button class="btn btn-default btn-lg" id="btn_fb_api" type="button" >
  Get facebook feeds
  </button>
             
          <label>facebook graph api </label>
     <textarea class="form-control" id="facebook_entries" rows="3"></textarea>      
              </div>
   
             
             <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first">
               
     <p> another column </p>
            
         </div>
         </div>   
        
      
        
        <div class="tab-pane" id="api_task_manager">
            <h3> Api Task Manager </h3> 
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first">
            <h3>Register </h3>
            
           <label>Email </label>
          <input type="text" class="form-control" id="api_task_manager_email_register" placeholder="Enter email"> 
          
            <label>Name</label>
          <input type="text" class="form-control" id="api_task_manager_name_register" placeholder="Enter name"> 
          
          
            <label>Password</label>
          <input type="text" class="form-control" id="api_task_manager_password_register" placeholder="Enter password"> 
            
        <button class="btn btn-primary btn-md" id="api_task_manager_register_btn">
        Register
        </button> 
            
            </div>
            
            
            
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first">
            
           <h2> Login </h2>      
                <label>email</label>
          <input type="text" class="form-control" id="api_task_manager_email"placeholder="Enter email"> 
          
            <label>Name</label>
          <input type="text" class="form-control" id="api_task_manager_name"placeholder="Enter name"> 
          
          
            <label>Password</label>
          <input type="text" class="form-control" id="api_task_manager_password"placeholder="Enter password"> 
         
    
        <button class="btn btn-primary btn-md" id="api_task_manager_login_btn">
        Login
        </button>    
            </div>
            
            
            
            
            
            
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 first">
                  <label>Authorisation Number</label>
          <input type="text" class="form-control" id="api_task_manager_authorisation" placeholder="Enter authorisation"> 
          
          
            <label> Task Name</label>
          <input type="text" class="form-control" id="api_task_manager_task_name" placeholder="Enter task name"> 
         
    
        <button class="btn btn-primary btn-md" id="api_task_manager_create_task_btn">
         Create task
        </button>  
                
          <div>   
                
                <label> AREA DEBUG</label>   
                <textarea class="form-control" id="task_manager_api_debug" rows="2"> Area receiving data from server</textarea> 
           </div>   
          
          </div>
        
    
        </div>
        <!-- End div api -->
        
        
        <!-- start div dynamic elements -->
        <div class="tab-pane" id="dynamic_elements">
            
             <h3> ADD remove dynamic elements in JQUERY </h3> 
            	   <div class="jumbotron">
	            <div class="container">
	   
	            <div id="parent">
                    <div id="block_1" >
                    <img src="img/down.png">
                    <div>
                    <input type="text">
                    </div>
                    <div><a class="remove_block">Remove</a></div>
                    </div>
                    </div>
			
		    <p><a class="btn btn-lg btn-primary" id="add_dynamically" role="button">ADD</a></p> 
	   
	   
	   
	   </div><!-- container -->
	   </div><!-- jumbotron -->
            
            
            
        </div>
        <!-- end div dynamic elements -->
        
        
        
             
        <div class="tab-pane" id="yellow"> 
            <h3>jQuery.getScript()</h3>
            <p>Load a JavaScript file from the server using a GET HTTP request, then execute it.</p>
       
  <button class="btn btn-default btn-lg" id="btn_js_file1" type="button" >
    Load js file
  </button>  
            
   <textarea class="form-control" id="textarea1" rows="3"></textarea> 
   
   <div id="my_divarea"> this is a div before call</div> 
            
        
        
        
        
    </div>
        
        
    <div class="tab-pane" id="green">
            <h3>jQuery.post()</h3>
            <p>Load data from the server using a HTTP POST request.</p>
  
            <div class="jumbotron-green">          
            
   
            
     <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 first"> 
       
         <h4>Users</h4>
 <select class="form-control" id="getusersdropdown">
 <option value="0">Select a subscriber</option>
 </select>      
                 
  <button class="btn btn-default btn-sm" id="btn_post" type="button" >
    jquery post method
  </button>    
         
  <div class="customform">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="firstname" required="required" placeholder="Enter name">
     <label for="exampleInputEmail1">Surname</label>
    <input type="text" class="form-control" id="surname" required="required" placeholder="Enter surname">
     <label for="exampleInputEmail1">Date</label>
     <input type="date" class="form-control" required="required" id="dob">
  </div>  
         
         
         
  <button class="btn btn-default btn-sm" id="btn_clear" type="button" >
    clear debug area
  </button>  
  <button class="btn btn-default btn-sm" id="btn_clear_all" type="button" >
    clear all 
  </button>  
           
  <textarea class="form-control" id="debugging_area1" rows="2"> Area receiving data from server</textarea>         
         
         
   
     </div>   
                
 <h4>Questions Wiki</h4>
 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 first">                
 <select class="form-control" id="getquestiondropdown">
 <option value="0">Select a Question</option>
 </select>      
                 
  <button class="btn btn-default btn-sm" id="btn_post_question" type="button" >
    jquery post method
  </button>    
         
  <div class="customform">
    <label>Question</label>
    <input type="text" class="form-control" id="question" required="required" placeholder="Question">
    <label>Answer</label>
    <input type="text" class="form-control" id="answer" required="required" placeholder="Enter Answer">
    <label>Link</label>
    <input type="text" class="form-control" id="link" required="required" placeholder="link">
  </div> 
     
  <div>debugging area2 </div>     
  <textarea class="form-control" id="debugging_area2" rows="3"> Area receving data from server</textarea>      
       
   </div>  
       
  </div> <!-- jumbotron_green -->
        
            
            
            
            
        </div>
        <div class="tab-pane" id="blue">
            <h3>.load()</h3>
            <p>Load data from the server and place the returned HTML into the matched element.</p>
        </div>
    </div>
</div>
 
 
<script type="text/javascript">
    $(document).ready(function ($) {
        $('#tabs').tab();
       
    });
    
  
</script>    
</div> <!-- container -->
</div>
    
    
<!-- Modal for get example-->
<div class="modal fade" id="myModal_get_example" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>      



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="js/jquery.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
        <script src="js/jqueryajax_main.js"></script>
  </body>
</html>
