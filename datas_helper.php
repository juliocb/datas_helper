<?php

/* Tratar datas, tanto para inserir no bd como para recuperar */

function converte_data($data)
{
    // Se a data não for passada... retornar default
    if (empty($data)) {
        return NULL;
    } elseif ($data == "0000-00-00") {
        return "";
    } elseif (!strstr($data, '/')) {
        // $data está no formato ISO (yyyy-mm-dd) e deve ser convertida
        // para dd/mm/yyyy
        $dt = explode('-', $data);
        return "$dt[2]/$dt[1]/$dt[0]";
    } else {
        // $data está no formato brasileiro e deve ser convertida para ISO
        $dt = explode('/', $data);
        return "$dt[2]-$dt[1]-$dt[0]";
    }
    return false;
}

// Converte data e hora
function converte_data_hora($data)
{
    $timestamp = strtotime($data); // Gera o timestamp da data
    return date('d/m/Y  - H:i:s', $timestamp); // Converte para linguagem humana
}

// Converte hora sem os segundos
function converte_hora($hora)
{
    $timestamp = strtotime($hora); // Gera o timestamp da hora
    return date('H:i', $timestamp); // Converte para linguagem humana
}

// Retorna só a data do timestamp
function so_a_data($data)
{
    $timestamp = strtotime($data); // Gera o timestamp da data
    return date('d/m/Y', $timestamp); // Converte para linguagem humana
}

// Calcula a quantidade de dias para determinada data
function dias_restantes($dt_fim)
{
    $dt_inicio = date('Y-m-d');
    // Calcula a diferença em segundos entre as datas
    $diferenca = strtotime($dt_fim) - strtotime($dt_inicio);

    //Calcula a diferença em dias
    $dias = floor($diferenca / (60 * 60 * 24));

    return $dias;
}
