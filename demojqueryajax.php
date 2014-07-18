<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

 // if (isset($_GET['ajax'])) {
//} else
//{
// echo "get method not found";   
//}

$method = $_SERVER['REQUEST_METHOD'];
if (isset($method) && (strtolower($method)=='post') ) {
    

    
   if (isset($_POST['task']) && $_POST['task']=="get_user_list_task"  )  {
       $people = get_user_list();  // kanei feed i function get_user_list stin metavliti people
       echo json_encode($people);
      
    } 
 
     if (isset($_POST['task']) && $_POST['task']=="get_user_task"  )  {
       $person = get_user($_POST['id']); 
       echo json_encode($person);    
    }

    if (isset($_POST['task']) && $_POST['task']=="task_get_question_with_post"){
        //question="data returned from query";
       $question = get_question($_POST['id']);
        echo json_encode($question);    
    }
    
     if (isset($_POST['task']) && $_POST['task']=="get_country_task"  )  {
       $country = get_country($_POST['id']); 
       echo json_encode($country);    
    } 
    
    if (isset($_POST['task']) && $_POST['task']=="task_save_question" ) {
        
        save_question();
        
       // $questions = "these are from php mysql";
       // echo json_encode($questions);
    }
    
     if (isset($_POST['task']) && $_POST['task']=="task_form_submition" ) {
        
      // $firstname = $_POST['firstname'];
      // $surname = $_POST['surname'];
      // $dob= $_POST['dob'];
      // $results=array($firstname,$surname,$dob);
      // foreach ($results as $value) {
      // echo "Value: $value<br />\n";
       //$results = $firstname . $surname . $dob;
       // echo json_encode($results);
       save_user(); 
       
       }
       
    if (isset($_POST['task']) && $_POST['task'] == "task_get_articles_list") {
      
       $myarticles = get_articles_list();  // kanei feed i function get_articles_list stin metavliti people
       
       echo json_encode($myarticles); // to json_encode xreiazetai gia na to ypodexthei stin jquery to jQuery.parseJSON(data);
      
      
    }   
    
    
    if (isset($_POST['task']) && $_POST['task']== 'task_get_article') {
        
       $article_id =$_POST['option_value'];
       
       
       $myarticle = get_article($article_id);
       echo json_encode($myarticle); 
    }
    
    
    if (isset($_POST['task']) and $_POST['task']=='task_save_article' ) {
     
   //  $cars=array("Volvo","BMW","Toyota");     
   //  echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
  //  echo count($cars);
    
    $inemail = $_POST['email'];
    $checked_email = check_if_email_exist_in_articles($inemail);
    
   if (isset($checked_email)) { // If yparxei to
   
    echo json_encode($checked_email); 
   } else{    
    save_article();      
    }
    }
    
    
    if (isset($_POST['task']) && $_POST['task'] == 'task_update_article') {
       
        
       $update_title_id = $_POST['update_title_id']; 
       $title = $_POST['title'];
       $author = $_POST['author'];
        $email = $_POST['email'];
       //$summary = $_POST($summary);
             
       $update_article = update_article($update_title_id,$title,$author,$email); 
       echo json_encode($update_article); 

    }
       
       if (isset($_POST['task']) && $_POST['task']=="task_delete_selected_article")  {
        
        $selected_title_id = $_POST['article']; // mporeis ayto me get
                                                // na proeidopoiei oti tha sviseis tin row
        
       delete_article($selected_title_id);  
    }
    
    if (isset($_POST['task']) && $_POST['task']=="save_user_task"  ) {
         save_user();      
    }
   
// http://stackoverflow.com/questions/17267468/jquery-variable-to-php-variable   
    
} else { 
   // echo "request method is Not POST";
   // if (isset($_POST['task']) && $_POST['task']=="task_get_user_with_get_method"  )  {
     if (isset($_GET['task']) &&  $_GET['task']=="task_get_user_with_get_method"  )  {
     //  $country = $_GET['country'];
     //  $user = $_GET['user'];
     save_user_with_get(); 
   
    }
}

function connect() {
 
  $connect = mysql_connect('localhost','root','iri2010');
 $db= mysql_select_db('rest'); 
 // $connect = mysql_connect('basil.arvixe.com','restuser','lskostas13');  
 // $db= mysql_select_db('rest');  
}

function check_if_email_exist_in_articles($inemail) {
    connect();  
    $sql2 = "select * from article where email='$inemail'";
    $query2 = mysql_query($sql2);
       if ($query2) {
    if (mysql_num_rows($query2) > 0) {
        $row = mysql_fetch_object($query2); // ferneis object tou row
        return $row;
    }   
    }  
   else {
   echo "email NOT found";  
    } 
      }


function get_user_list() {
    
    connect();  
    
      $sql = "select * from people_ajax order by id asc" ;
      $query=mysql_query($sql);
      
      if ($query) {
        
       if (mysql_num_rows($query)> 0) {
           $people = array();  // ftiaxneis ena array $people
           while ($row=mysql_fetch_object($query)){
               $people[] = $row;
           }
           return $people;
           
       }     
        return null;
      }     
}





function get_articles_list() {
    
    connect();  
    $sql = "select * from article" ;
    $query=mysql_query($sql);
      
    if ($query) {    
       if (mysql_num_rows($query)> 0) {
           $articles = array();  // ftiaxneis ena array $articles
           while ($row=mysql_fetch_object($query)){
               $articles[] = $row;
           }
           return $articles; 
          
      }     
      return null;
      
      }     
}



  
 function get_articles_list_ME_TRY_CATCH() {
   
  connect();   
     
  try {
  
  $sql= "select * from article";    
  $query = mysql_query($sql);
  
  $articles = array();
  while ($row=mysql_fetch_object($query)){
   $articles[] = $row;
   //echo var_dump($articles)
  }
  return $articles;
  
 } catch(Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} 
}

 
  



function get_question($id) {
   connect();
   
   $sql="select * from wiki where id = '$id'";
   $query=mysql_query($sql);
   
   if ($query) {
       if (mysql_num_rows($query)== 1) {
        
           $row = mysql_fetch_object($query); // ferneis object tou row
           return $row;
       }   
       }
       
   else {
     echo "query for questions not succed";  
   }
}



function get_user($id) {
    connect();  
      $sql = "select * from people_ajax where id='$id'";
      $query=mysql_query($sql);
       if ($query) 
            {
            if (mysql_num_rows($query)== 1)
            {
                $row = mysql_fetch_object($query);
                //echo json_encode($row);
                return $row;  
            }
        }
        return null;
}

function get_article($id) {
    connect();
    
    $sql = "select * from article where id='$id'";
    $query = mysql_query($sql);
    
    if ($query) {
        if (mysql_num_rows($query) == 1) 
        {
          $row = mysql_fetch_object($query);
          return $row;
        }      
    } else {
        
        Echo "something went wrong";
    }
}

function update_article($update_title_id,$title,$author,$email) {
    connect();

     //  $var_dumb = $title;
       
       
    $sql = "UPDATE article 
     SET title = '$title',
         author = '$author',
         email = '$email'
WHERE id='$update_title_id'";
    $query = mysql_query($sql); 
    
    
    if ($query) {
        // echo "inserted";  // fere to object tou row pou egine molis inserted oste na to doseis stin jquery
        
         $sql2 = "select * from article" ;
         $query_select=mysql_query($sql2);
        
        if (mysql_num_rows($query_select)> 0) {
           $articles = array();  // ftiaxneis ena array $articles
           while ($row=mysql_fetch_object($query_select)){
               $articles[] = $row;
           }
           return $articles;   // afou kaneis return object
          
      }           
        
    } else {
      echo "update went wrong in query"; 
     
    }   
}

function update_article_TRYCATCH($title,$author,$summary) {
    connect();

    try {   
    $sql = "UPDATE article 
     SET title = '$title' , 
     author = '$author', 
     summary = '$summary'
WHERE title=$title";
    $query = mysql_query($sql); 
    }
    
   catch(Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} 
    
}

function save_article () {
    
     $title = $_POST['title'];
    $author= $_POST['author'];
    $email= $_POST['email'];
   // $summary=$_POST['summary'];
    
    
    connect();
    
    $sql="INSERT INTO article
(title, author, email, summary, content) 
VALUES ('$title','$author', '$email', 'dummy_summary', 'dummy_text');";
    $query=  mysql_query($sql);
    
    if ($query) {
        $id= mysql_insert_id(); // retrieving the last inserted id
        $sql2 = "SELECT * FROM article where id='$id'";
        $query2= mysql_query($sql2);
        
        if (mysql_num_rows($query2)==1) {
           $row =  mysql_fetch_object($query2);  // apothikeyo to object tou last inserted sto $row
           echo json_encode($row);  // to kano echo se json
        } else {
           echo "error:didnt insert 1 row maybe more"; 
        } 
    } else {
         echo "error:something went wrong with the query";
        
    }
    
    
}

function delete_article($selected_title_id) {  
   connect();
    $sql5="delete from article where id='$selected_title_id'";
    $query5=  mysql_query($sql5);
    
    if ($query5) {
      $row = mysql_affected_rows();  
         $deleted_article = array();
     
          $deleted_article[] = $row;
          echo json_encode($deleted_article);
         // echo $row[]; PROKALEI PROVLIMA ME JSON
    } else {
      echo "Query not executed";
    }
    
} 




function save_question() {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $link = $_POST['link'];
     
    connect();
    $sql = "insert into wiki (question,answer,link)values ('$question', '$answer', '$link') ";
    $query = mysql_query($sql);
    
    if ($query) {
        
         // now extract the data from database       
          $id= mysql_insert_id(); // retrieving the last inserted id
          $sql="select * from wiki where id='$id'";
          $query = mysql_query($sql);
        
        if (mysql_num_rows($query)==1) {
           $row =  mysql_fetch_object($query);  // apothikeyo to object tou last inserted sto $row
           echo json_encode($row);  // to kano echo se json
        }       
    } else
    {
      echo "something wrong with the query";  
    }  
}



function save_user() {
     //echo "request method is POST";
     $first_name = $_POST['firstname'];
     $sur_name = $_POST['surname'];
     $dob = $_POST['dob'];

     //$response = $first_name . $sur_name . $dateofbirth . $_GET['ajax']; 
     //$response = $first_name . $sur_name . $dateofbirth; 
     //echo json_encode($response);
     //echo "server responce through php";
      connect();  
    
      $sql = "insert into people_ajax (first_name,surname,dob) values ('$first_name','$sur_name','$dob')" ;
      $query=mysql_query($sql);
   
      if ($query) {
          // now extract the data from database       
          $id= mysql_insert_id(); // retrieving the last inserted id
          $sql="select * from people_ajax where id='$id'";
          $query = mysql_query($sql);
          if ($query) {     
              if (mysql_num_rows($query) == 1)
              {
                   //$row = mysql_fetch_object($query);             
                  // return $row;     
                  
              $row =  mysql_fetch_object($query);  // apothikeyo to object tou last inserted sto $row
              //echo json_encode($row);  // to kano echo se json
              echo '{"user":'.json_encode($row).'}';
              
              }  
          }  
      } else
      {
          echo "something wrong with the query";
      }  
}

function save_user_with_get() {  // FTIAKSO META
     //echo "request method is GET";
     $first_name = $_GET['user'];
     $country = $_GET['country'];
     $dateofbirth = '2000-02-18';

      connect();  
    
      $sql = "insert into people_ajax (first_name,country,dob) values ('$first_name','$country','$dateofbirth')" ;
      $query=mysql_query($sql);
   
      if ($query) {     
          // now extract the data from database       
          $id= mysql_insert_id(); // retrieving the last inserted id
          $sql="select * from people_ajax where id='$id'";
          $query = mysql_query($sql);
          
          if ($query) {
              
              if (mysql_num_rows($query) == 1)
              {
                  $row = mysql_fetch_object($query);
                  echo json_encode($row);
              }
    
          } 
        
          
      } else
          
      {
          echo "somthing wrong with the query";
      }  
    
}





 
?>
