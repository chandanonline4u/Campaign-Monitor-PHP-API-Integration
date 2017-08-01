<?php
// prevent direct access
/*$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if(!$isAjax) {
  $user_error = 'Invalid!';
  echo $user_error;
  exit;
}*/

$result = array('success' => 0, 'message' => '');
$section = (isset($_GET['type']) AND $_GET['type']!=='' ) ? $_GET['type'] : '';

switch($section) {
  case 'subscription':
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    if($name<>'' AND $email<>''){
      //Add to campaign monitor
      $theme_dir = $_SERVER['DOCUMENT_ROOT'].'/codeBase/campaignMonitor';
      require_once $theme_dir.'/inc/csrest_subscribers.php';
      
      $apikey = '5c5bf4c30f64bc3453a1899efbe8752f'; //Campaign Monitor API Key
      $listid = '97023d68ee98cbc884b524caebf839d6'; //Subscription List
      
      $wrap = new CS_REST_Subscribers($listid, $apikey);
      $cm_result = $wrap->add(array(
        'EmailAddress' => $email,
        'Name' => $name,
//        'CustomFields' => array(
//          array(
//            'Key' => 'Company',
//            'Value' => $company
//          ),
//          array(
//            'Key' => 'Designation',
//            'Value' => $designation
//          ),
//          array(
//            'Key' => 'ContactNumber',
//            'Value' => $phone
//          ),
//        ),
//        'Resubscribe' => true
      ));
        
      $result['success'] = 1;
      $result['message'] = "Subscribed Successfully!";
    
    } else { // If required fields are blank
      $result['success'] = 0;
      $result['message'] = "Please fill all the required fields.";
    }
    
    header( 'content-type= application/json; charset=utf-8' );
    echo json_encode( $result );
    die();
    break;
  
  
  default:
    echo "Invalid!";
    break;
    
}