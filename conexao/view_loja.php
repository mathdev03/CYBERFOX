<?php

require_once("_conexao.php");

try {
    // Variável que contém a instrução SQL a ser executado
    $comandoSQL = "SELECT * FROM jogos order by id_jogo desc";

    //comndo para executar a instrução SQL no banco
    $dadosSelecionados = $conexao->query($comandoSQL);

    // Transforma os dados vindo do banco em uma matriz
    $dados = $dadosSelecionados->fetchAll();

    // Total de registros retornados da consulta
    $totalRegistros = $dadosSelecionados->rowCount();



} catch (PDOExeption $erro) {
    //echo $erro->getMessage();
    echo("Entre em contato com a suporte");
}