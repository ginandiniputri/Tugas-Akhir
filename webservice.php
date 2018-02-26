<?php 			
// $text = '<loginPilot>
// 			 <Row>
// 			 	<signature>dd7298aa1a5d2220ba3b11d82db4feb9a3bc908e</signature>
// 			 	<username>fathi</username>
// 			 	<password>123456</password>
// 			 </Row>
// 		</loginPilot>';
error_reporting(0);
$text = $_POST['xmlRequest'];
//$text = '[This] is a [test] string, [eat] my [shorts].';
preg_match_all("/\<([^\>]*)\>/", $text, $namafunction);
$request_ws = $namafunction[1][0];
preg_match_all('/<'.$request_ws.'>(.*?)<\/'.$request_ws.'>/s', $text, $matches); 
//nanti login pilotnya dynamic ya, dari hasil deteksi function yg dia request apa. 
//Itu kamu tadi miss formatnyanya penutupnya bukan </Login> cmn <login> jadi ga ketemu eriskuuuuuuu

preg_match_all('/<Row>(.*?)<\/Row>/s', $matches[1][0], $matches1);

$my_build = array();

for($a=0;$a<count($matches1[1]);$a++){
		$to_arr=array();
		$dom = new DOMDocument();
		$str = "<Row>".$matches1[1][$a]."</Row>";
		libxml_use_internal_errors(true);
		$dom->loadHTML($str);

		libxml_use_internal_errors(false);
		$results = $dom->getElementsByTagName('row');
		foreach($results as $node)
		{
		    if($node->childNodes->length)
		    {
		        foreach($node->childNodes as $child)
		        {
		        	$to_arr[$child->nodeName] = $child->nodeValue;
		        }
		    }
		}
	$my_build[]=$to_arr;
}

//echo json_encode($my_build);
$curl = curl_init();
$url_to_request = 'http://operation.kpptechnology.co.id/eris/gina/api/services/'.$request_ws;
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url_to_request , //ambil nama function ni dynamic
    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => $my_build[0]
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
/////
header ( 'Access-Control-Allow-Origin: *' );
		header ( 'Access-Control-Expose-Headers: Access-Control-Allow-Origin' );
		header ( "HTTP/1.1 200 OK" );
		header ( 'Content-Type: application/json' );
echo $resp;

die;
 ?>