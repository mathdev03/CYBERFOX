<?php
    class Teste{

        public function testando(){
            echo "Deu certo";
        }

        public function testando2($nome, $sobrenome){
            echo $nome;
            echo $sobrenome;
        }
    }

    $teste = new Teste();

    $nome = [];
    $nome[0] = "Matheus";
    $nome[1] = "Jonathan";

    $sobrenome = [];
    $sobrenome[0] = "Yuji";
    $sobrenome[1] = "Kim";

    echo $teste->testando2($nome[0], $sobrenome[0]);
    echo "<br>";
    echo $teste->testando2($nome[1], $sobrenome[1]);