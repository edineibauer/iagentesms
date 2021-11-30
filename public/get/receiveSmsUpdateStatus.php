<?php

parse_str(explode("receiveSmsUpdateStatus?", $_SERVER['REQUEST_URI'])[1], $dados);

!empty($dados["codigosms"]) || die;

$datatime = explode(" ", $dados["data"]);
$datatime2 = explode("/", $datatime[0]);
$datatime = $datatime2[2] . "-" . $datatime2[1] . "-" . $datatime2[0] . " " . $datatime[1];

$up = new \Conn\Update();
$up->exeUpdate("smsiagente", ["status" => $dados["status"], "data" => $datatime], "WHERE id = :c", "c={$dados["codigosms"]}");