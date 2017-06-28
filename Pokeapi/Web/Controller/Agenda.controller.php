<?php

require_once '../../Business/GerenciadorPokemon.php';
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
$action = 'list';
$listaPokemon = array();

if(count($_SESSION['lista']) < 8)
$_SESSION['lista'] = array();

echo count($_SESSION['lista']);
/* $gerenciadoraPokemon = new GerenciadorPokemon();
  $gerenciadoraPokemon->listaPokemon = unserialize($_GET['lista']);
 */
switch ($action) {
    case 'list':


        if(count($_SESSION['lista']) < 8){
        $content = file_get_contents("http://pokeapi.co/api/v2/pokemon?limit=8", FALSE, NULL, 0);
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
            
            $listaPokemon[$pokemon->getId()] = $pokemon;
            $_SESSION['lista'] = $listaPokemon;
            
            print_r($_SESSION['lista']);
        }
          // echo "ID: ".$pokemon->getId()."  |   Nome: ".$pokemon->getNome()."  |  Tipo: ".$pokemon->getStructTipo()."   |    Foto: ".$pokemon->getFoto()."</br>";
        }else{
            $listaPokemon = $_SESSION['lista'];
        }
        
        include_once '../View/Agenda/form_list_pokemon.php';

        break;
}