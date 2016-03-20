<?php
  require_once("pretty_json.php");

function jsonrpc_exec($request) {
  $gs = new GeonlpService();
  $content = $gs->proc($request);

  $opt = getopt("j", array("json"));
  if (count($opt) > 0) {
    $content = preg_replace("!\\\/!", "/", indent($content));
  } else {
    $content = var_export(json_decode($content, true), true);
  }
  return $content;
}
