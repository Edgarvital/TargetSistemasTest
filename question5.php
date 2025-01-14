<?php
#5) Escreva um programa que inverta os caracteres de um string.

#IMPORTANTE:
#a) Essa string pode ser informada através de qualquer entrada de sua preferência ou pode ser previamente definida no código;
#b) Evite usar funções prontas, como, por exemplo, reverse;

echo "Digite a mensagem que será invertida: ";
$inputString = fgets(STDIN);

$reversedString = "";
$stringLength = strlen($inputString);

for ($i = $stringLength - 1; $i >= 0; $i--) {
    $reversedString = $reversedString . $inputString[$i];
}

echo "A string invertida é: $reversedString\n";
?>

