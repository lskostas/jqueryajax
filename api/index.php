<?php


require 'Slim/Slim.php';

$app = new Slim();

$app->get('/v1/articles', 'getArticles');
$app->get('/v1/articles/:id',	'getArticle');
//$app->get('/v1/articles/search/:query', 'findByName');

 $app->post('/v1/articles/search/:query', 'findByName');
$app->post('/v1/articles', 'addArticle');

$app->put('/v1/articles/:id', 'updateArticle');
$app->delete('/v1/articles/:id','deleteArticle');

$app->run();


//$method = $_SERVER['REQUEST_METHOD'];
//echo $method;




function getArticles() {


	$sql = "select * FROM article ORDER BY title";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$articles = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"article": ' . json_encode($articles) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}



function getArticle($id) {
       $sql = "SELECT * FROM article WHERE id=:id";	
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$article = $stmt->fetchObject();  
		$db = null;
		echo json_encode($article); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function addArticle() {
	//error_log('addWine\n', 3, '/var/tmp/php.log');
	$request = Slim::getInstance()->request();
	$article = json_decode($request->getBody());
        $sql="INSERT INTO article (email, title, author, summary, content) VALUES (:email, :title, :author, :summary, :content)";
        try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("email", $article->email);
		$stmt->bindParam("title", $article->title);
		$stmt->bindParam("author", $article->author);
		$stmt->bindParam("summary", $article->summary);
		$stmt->bindParam("content", $article->content);		
		$stmt->execute();
		$article->id = $db->lastInsertId();
		$db = null;
		echo json_encode($article); 
	} catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function deleteArticle($id) {     // var_dump
                                  // GET REQUEST METHOR dokimase to
     $sql = "delete from article WHERE id=:id";
     try { $db = getConnection();
	   $stmt = $db->prepare($sql); 
           $stmt->bindParam("id", $id);
           $stmt->execute();
           $db = null;
      } catch(PDOException $e) {   
     echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}
}


function updateArticle($id) {
	$request = Slim::getInstance()->request();
	$body = $request->getBody();
	$article = json_decode($body);
	//$sql = "UPDATE wine SET name=:name, grapes=:grapes, country=:country, region=:region, year=:year, description=:description , temp=:temp WHERE id=:id";
	$sql = "UPDATE article SET email=:email, title=:title, author=:author, summary=:summary, content=:content WHERE id=:id";
        try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("email", $article->email);
		$stmt->bindParam("title", $article->title);
		$stmt->bindParam("author", $article->author);
		$stmt->bindParam("summary", $article->summary);
		$stmt->bindParam("content", $article->content);

		
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$db = null;
		echo json_encode($article); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function findByName($query) {
 
	$sql = "SELECT * FROM article WHERE UPPER(title) LIKE :query ORDER BY title";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$query = "%".$query."%";  
		$stmt->bindParam("query", $query);
		$stmt->execute();
		$articles = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
              //   var data = '{"name": "mkyong","age": 30,"address": {"streetAddress": "88 8nd Street","city": "New York"},"phoneNumber": [{"type": "home","number": "111 111-1111"},{"type": "fax","number": "222 222-2222"}]}';
              
              // echo '{"article": ' . json_encode($articles) . '}';  // gia des to decode
                echo json_encode($articles);  
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}






function getConnection2() {
	$dbhost="127.0.0.1";
	$dbuser="root";
	$dbpass="iri2010";
	$dbname="rest";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

function getConnection() {
	$dbhost="basil.arvixe.com";
	$dbuser="restuser";
	$dbpass="youknowthepass";
	$dbname="rest";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

?>