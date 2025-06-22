#!/usr/bin/env php
<?php
require __DIR__.'/db.php';
$user   = 'LeeMarshall1113';
$token  = getenv('GITHUB_TOKEN') ?: '';
$ch     = curl_init("https://api.github.com/users/{$user}/repos?per_page=100");
curl_setopt_array($ch,[CURLOPT_USERAGENT=>'gh-portfolio','CURLOPT_RETURNTRANSFER'=>true]);
if($token) curl_setopt($ch,CURLOPT_HTTPHEADER,["Authorization: token {$token}"]);
$repos = json_decode(curl_exec($ch),true);

$stmt = $pdo->prepare(
  'REPLACE INTO repos(id,name,html_url,description,language,stars,updated_at)
   VALUES(?,?,?,?,?,?,?)'
);
foreach($repos as $r){
  $stmt->execute([
      $r['id'],
      $r['name'],
      $r['html_url'],
      $r['description'],
      $r['language'],
      $r['stargazers_count'],
      $r['pushed_at']
  ]);
}
