//1) Observe o trecho de código abaixo: int INDICE = 13, SOMA = 0, K = 0;
//Enquanto K < INDICE faça { K = K + 1; SOMA = SOMA + K; }
//Imprimir(SOMA);
//Ao final do processamento, qual será o valor da variável SOMA?

<?php
$INDICE = 13;
$SOMA = 0;
$K = 0;

while ($K < $INDICE) {
    $K = $K + 1;
    $SOMA = $SOMA + $K;
}

echo "O valor da variável SOMA ao final do processamento é: $SOMA";
?>
