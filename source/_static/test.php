<?php

function showHeader() {
  echo <<<_HEADER_
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"
  />
    <title>GeoNLP API Checker</title>
</head>
<body>
_HEADER_;
}

function showFooter() {
  echo <<<_FOOTER_
<div id="footer">
    &copy; 2013 National Institute of Information, All Right Reserved.
</div>
</div><!-- content -->
</body>
</html>
_FOOTER_;
}

function showContent($req, $res) {
echo <<<_CONTENT_
<div id="content">
<div id="header">
GeoNLP API Checker
</div>
<h1>Request</h1>
<form method="post">
<textarea id="req" name="req" rows="20" cols="80">
{$req}
</textarea><br />
<input type="submit" value="Send Request" />
<h1>Response</h1>
<textarea id="response" rows="20" cols="80">
{$res}
</textarea>
_CONTENT_;
}

function jsonrpc_exec($json_request) {
  $endpoint = "https://192.168.20.91/webapi/proxy/api_ver1.php";
  $header  = array("Content-Type: application/json",
                   "Content-Length: ".strlen($json_request));
  $options = array('http' => array('method' => 'POST', 'header' => implode("\r\n", $header), 'content' => $json_request));
  $content = file_get_contents($endpoint, false, stream_context_create($options));
  return $content;
}

if (array_key_exists('req', $_POST)) {
  $req = $_POST['req'];
  $res = jsonrpc_exec($req);
} else {
  $req = <<<_REQUEST_
{
  "method": "geonlp.parse",
  "params":
    [
      "NIIは千代田区一ツ橋２－１－２にあります。神保町から徒歩3分。",
      { "geocoding":true,
        "remove-class":[".*Station"]
      }
    ],
  "id": "1"
}
_REQUEST_;
  $res = '';
}

showHeader();
showContent($req, $res);
showFooter();
