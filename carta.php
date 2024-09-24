<?php

class Carta {
    private $numero;
    private string $nome;

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function exibirCarta()
    {
        return $this->nome . " de " . $this->numero;
    }
}

function criarBaralho()
{
    $nomes = ['Copas', 'Espadas', 'Ouros', 'Paus'];
    $baralho = [];

    for ($i = 0; $i < 7; $i++) {
        $carta = new Carta();
        $carta->setNumero(rand(1, 13));
        $carta->setNome($nomes[array_rand($nomes)]);
        $baralho[] = $carta;
    }

    return $baralho;
}

function exibirBaralho(array $baralho)
{
    foreach ($baralho as $b => $carta) {
        echo ($b + 1) . ". " . $carta->exibirCarta() . "\n";
    }
}

function jogar()
{
    $baralho = criarBaralho();
    $sorteada = $baralho[array_rand($baralho)];
     echo "advinhe a carta da sorte\n";

    do {
        echo "Cartas disponíveis:\n";
        exibirBaralho($baralho);

        $sorte = readline("Escolha o número de 1 a 7: ");

        if ($sorte < 1 || $sorte > 7) {
            echo "Palpite inválido. Escolha um número entre 1 e 7.\n";
            continue;
        }

        $escolha = $baralho[$sorte - 1];

        if ($escolha->getNumero() === $sorteada->getNumero() &&
            $escolha->getNome() === $sorteada->getNome()) {
            echo "RESPOSTA CERTA: " . $sorteada->exibirCarta() . "\n";
            break;
        } else {
            echo "Infelizmente voce errou :(  Tente novamente.\n \n";
        }

    } while (true);
}

jogar();


