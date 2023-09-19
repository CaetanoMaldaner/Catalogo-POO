<?php


if(!function_exists('debug')){
    function debug($param){
        echo "<pre>";
        print_r($param);
        exit;
    }
}

if(!function_exists('br2bd')){
    function br2bd($date){
        return implode('/', array_reverse(explode('-', $date)));
    }
}

if(!function_exists('bd2br')){
    function bd2br($date){
        return implode('-', array_reverse(explode('/', $date)));
    }
}

if(!function_exists('retirarCaracteresEspeciais')){
    function retirarCaracteresEspeciais($string){
        return preg_replace('/[^A-Za-z0-9\s]/', '', $string);
    }
}

if(!function_exists('timestamp2br')){
    function timestamp2br($timestamp){
        return date('d/m/Y H:i', $timestamp);
    }
}

/**
 * Criar 4 funcoes dentro do helper
 * 
 * br2bd - converter data br para padrao americano 00/00/0000 -> 0000-00-00
 * bd2br - converter data padrao americano para br  0000-00-00 -> 00/00/0000
 * retirarCaracteresEspeciais
 * mostrar data e hora do cadatro de qualquer registro para br, timestamp
 * 
 * 
 * 
 * Mostrar na tela inicial do dashboard o nome do usuário data e hora que fez o login
 * e mostrar a data de criação desse usuário.
 * 
 * criar o campo created_at na tabela de users
 * 
 * 
 */