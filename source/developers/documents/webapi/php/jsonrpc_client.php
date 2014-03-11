<?php
require_once("pretty_json.php");

function jsonrpc_exec($request) {
  $gs = new GeonlpService("/usr/local/etc/geonlp.rc");
  $content = $gs->proc($request);

  $opt = getopt("j", array("json"));
  if (count($opt) > 0) {
    $content = preg_replace("!\\\/!", "/", indent($content));
  } else {
    $content = json_decode($content, true);
  }
  return $content;
}
