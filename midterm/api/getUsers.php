<?php
include 'db.php';
function get_matches()
{
    $conn = getDatabaseConnection("cinder");
    
    //username, picture, description
    $sql = "SELECT username, about_me, picture_url from `user` where id not in (select match_user_id from `match` where user_id = :id)";
    $namedParamenters = array();
    $namedParamenters["id"]=1;
    
    $stmnt = $conn->prepare($sql);
    $stmnt->execute($namedParamenters);
    $records = $stmnt->fetchAll(PDO::FETCH_ASSOC);
    //echo json_encode($namedParameters);
    return json_encode($records);
    
}




  session_start();

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        header("Content-Type: application/json");
        exit();

      case "GET":
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        echo get_matches();
        break;
      case 'POST':
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");

        break;
      case 'PUT':
        header("Access-Control-Allow-Origin: *");
        http_response_code(401);
        echo "Not Supported";
        break;
      case 'DELETE':
        header("Access-Control-Allow-Origin: *");
        http_response_code(401);
        break;
    }

?>