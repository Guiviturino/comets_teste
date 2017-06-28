<?php

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
class Pokemon {

    private $id;
    private $nome;
    private $foto;
    private $tipo;
    private $movimento;
    private $habilidade;

    public function __construct($id = NULL, $nome = NULL, $foto = NULL,
            $tipo = NULL, $movimento = NULL, $habilidade = NULL) {
            $this->id = $id;
            $this->nome = $nome;
            $this->foto = $foto;
            $this->tipo = $tipo;
            $this->movimento = $movimento;
            $this->habilidade = $habilidade;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getFoto() {
        return $this->foto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    function getMovimento() {
        return $this->movimento;
    }

    function getHabilidade() {
        return $this->habilidade;
    }

    function setMovimento($movimento) {
        $this->movimento = $movimento;
    }

    function setHabilidade($habilidade) {
        $this->habilidade = $habilidade;
    }

    
    function getStructTipo() {
        $retorno = "";
        $i = 1;
        foreach ($this->tipo as $item) {
            if (count($this->tipo) - 1 == $i) {
                $retorno = $retorno . $item . " e ";
            } else {
                if (count($this->tipo) == $i) {
                    $retorno = $retorno . $item;
                } else {
                    $retorno = $retorno . $item.", ";
                }
            }
            $i++;
        }

        return $retorno;
    }
    
    function getStructMovimento() {
        $retorno = "";
        $i = 1;
        foreach ($this->movimento as $item) {
            if (count($this->movimento) - 1 == $i) {
                $retorno = $retorno . $item . " e ";
            } else {
                if (count($this->movimento) == $i) {
                    $retorno = $retorno . $item;
                } else {
                    $retorno = $retorno . $item.", ";
                }
            }
            $i++;
        }

        return $retorno;
    }
    
    function getStructHabilidade() {
        $retorno = "";
        $i = 1;
        foreach ($this->habilidade as $item) {
            if (count($this->habilidade) - 1 == $i) {
                $retorno = $retorno . $item . " e ";
            } else {
                if (count($this->habilidade) == $i) {
                    $retorno = $retorno . $item;
                } else {
                    $retorno = $retorno . $item.", ";
                }
            }
            $i++;
        }

        return $retorno;
    }
}