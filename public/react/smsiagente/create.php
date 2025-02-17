<?php

try {
    $sms = new \IagenteSms\SmsIagente();
    $sms->setCelular($dados['celular']);
    $sms->setMensagem($dados['mensagem']);
    $sms->setId($dados['id']);
    $sms->envia();

    if(!empty($sms->getError())) {
        $up = new \Conn\Update();
        $up->exeUpdate("smsiagente", ["status" => "Erro: " . $sms->getError()], "WHERE id = :id", ["id" => $dados['id']]);
        $data['error'] = $sms->getError();
    }

} catch (Exception $e) {
    //Não faz nada com possíveis erros
}