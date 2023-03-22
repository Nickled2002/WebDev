<?php
            $message = file_get_contents('php://input');
            echo $message;
            $id = "230a86b930728cee";

            //  set up the data to be inserted
            $info = new stdClass() ;
            $info -> id = $id;
            $info -> date = date('Y-m-d H:i:s');
            $info -> state = $message;

            //  set up the request
            $request = new stdClass();
            $request -> jsonrpc = "2.0" ;
            $request -> method = "createRecord" ;
            $request -> params = $info ;
            $request -> id = "510572" ;
            $txt = json_encode($request) ;
            echo $txt.'<br/><br/>' ;

            //  set up for the curl
            $url = "https://mayar.abertay.ac.uk/~2001975/cmp306/api/block3/index.php";
            $ch = curl_init($url) ;
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            $headers = array (
                'Content-Type: application/json',
                'Content-Length: ' . strlen($txt) ) ;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers) ;
            curl_setopt($ch, CURLOPT_POSTFIELDS, $txt);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch) ;

            //  display the result of the call
            echo $response ;    
?>
