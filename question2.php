<?php
#2) Dado a sequência de Fibonacci, onde se inicia por 0 e 1 e o próximo valor sempre será a soma dos 2 valores anteriores
#(exemplo: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34...), escreva um programa na linguagem que desejar onde, informado um número,
#ele calcule a sequência de Fibonacci e retorne uma mensagem avisando se o número informado pertence ou não a sequência.

#IMPORTANTE: Esse número pode ser informado através de qualquer entrada de sua preferência ou pode ser previamente definido no código;

echo "Digite um número para verificar se ele pertence à sequência de Fibonacci: ";
$num = (int)fgets(STDIN);

function existsInFibonacci($num) {
    $currentElement = 1;
    $previousElement = 0;
    if($num < 0){
        return false;
    } else if ($previousElement == $num) {
        return true;
    }


    while($currentElement <= $num) {
        if($currentElement == $num){
            return true;
        }
        $temp = $previousElement + $currentElement;
        $previousElement = $currentElement;
        $currentElement = $temp;
    }
    return false;
}

$existsInFibonacci = existsInFibonacci($num);

if ($existsInFibonacci) {
    echo "O número $num existe na sequência de fibonacci.\n";
} else {
    echo "O número $num não existe na sequência de fibonacci.\n";
}
?>