<?php

require_once '../../Model/Pokemon.class.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pokemon
 *
 * @author Guilherme
 */
session_start();
if(!isset($_SESSION['lista'])){
$_SESSION['lista'] = array();
}

$action = 'list';

$pag = 1;
if (isset($_GET['pag']))
    $pag = $_GET['pag'];


$offset = 8 * ($pag-1);

if($offset<0)
    $offset = 0;

if(isset($_GET['action']))
    $action = $_GET['action'];

switch ($action) {
    case 'list':

        if(!isset($_GET['back'])){
        $_SESSION['lista'] = array();
        $content = file_get_contents("http://pokeapi.co/api/v2/pokemon?limit=8&offset=$offset", FALSE, NULL, 0);
        $json = json_decode($content);

        foreach ($json->results as $item) {
            $listaTipo = array();
            $listaHabilidade = array();
            $listaMovimento = array();
            $idPokemon = explode("pokemon/", $item->url);
            $idPokemon = str_replace("/", "", $idPokemon[1]);
            $pokemon = new Pokemon($idPokemon, $item->name);

            $content = file_get_contents($item->url, FALSE, NULL, 0);
            $json = json_decode($content);
            $listaTipo = array();
            foreach ($json->types as $types) {
                $type = $types->type;
                $listaTipo[] = $type->name;
            }
            foreach ($json->abilities as $abilities) {
                $ability = $abilities->ability;
                $listaHabilidade[] = $ability->name;
            }
            foreach ($json->moves as $moves) {
                $move = $moves->move;
                $listaMovimento[] = $move->name;
            }
            $pokemon->setTipo($listaTipo);
            $pokemon->setHabilidade($listaHabilidade);
            $pokemon->setMovimento($listaMovimento);
            $content = file_get_contents($json->forms[0]->url, FALSE, NULL, 0);
            $json = json_decode($content);
            $pokemon->setFoto($json->sprites->front_default);

            $_SESSION['lista'][$pokemon->getId()] = $pokemon;
            $listaPokemon = $_SESSION['lista'];
        }

        }else{
            $listaPokemon = $_SESSION['lista'];
        }
        include_once '../View/Home/index.php';

        break;
        
    case 'details':
        if(isset($_GET['id'])){
       
        $pokemon = $_SESSION['lista'][$_GET['id']];
        include_once '../View/Home/details.php';
        }
        break;
}