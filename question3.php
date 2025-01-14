<?php
#Dado um vetor que guarda o valor de faturamento diário de uma distribuidora, faça um programa, na linguagem que desejar, que calcule e retorne:
#• O menor valor de faturamento ocorrido em um dia do mês;
#• O maior valor de faturamento ocorrido em um dia do mês;
#• Número de dias no mês em que o valor de faturamento diário foi superior à média mensal.

#IMPORTANTE:
#a) Usar o json ou xml disponível como fonte dos dados do faturamento mensal;
#b) Podem existir dias sem faturamento, como nos finais de semana e feriados. Estes dias devem ser ignorados no cálculo da média;

$jsonData = '
[
	{
		"dia": 1,
		"valor": 22174.1664
	},
	{
		"dia": 2,
		"valor": 24537.6698
	},
	{
		"dia": 3,
		"valor": 26139.6134
	},
	{
		"dia": 4,
		"valor": 0.0
	},
	{
		"dia": 5,
		"valor": 0.0
	},
	{
		"dia": 6,
		"valor": 26742.6612
	},
	{
		"dia": 7,
		"valor": 0.0
	},
	{
		"dia": 8,
		"valor": 42889.2258
	},
	{
		"dia": 9,
		"valor": 46251.174
	},
	{
		"dia": 10,
		"valor": 11191.4722
	},
	{
		"dia": 11,
		"valor": 0.0
	},
	{
		"dia": 12,
		"valor": 0.0
	},
	{
		"dia": 13,
		"valor": 3847.4823
	},
	{
		"dia": 14,
		"valor": 373.7838
	},
	{
		"dia": 15,
		"valor": 2659.7563
	},
	{
		"dia": 16,
		"valor": 48924.2448
	},
	{
		"dia": 17,
		"valor": 18419.2614
	},
	{
		"dia": 18,
		"valor": 0.0
	},
	{
		"dia": 19,
		"valor": 0.0
	},
	{
		"dia": 20,
		"valor": 35240.1826
	},
	{
		"dia": 21,
		"valor": 43829.1667
	},
	{
		"dia": 22,
		"valor": 18235.6852
	},
	{
		"dia": 23,
		"valor": 4355.0662
	},
	{
		"dia": 24,
		"valor": 13327.1025
	},
	{
		"dia": 25,
		"valor": 0.0
	},
	{
		"dia": 26,
		"valor": 0.0
	},
	{
		"dia": 27,
		"valor": 25681.8318
	},
	{
		"dia": 28,
		"valor": 1718.1221
	},
	{
		"dia": 29,
		"valor": 13220.495
	},
	{
		"dia": 30,
		"valor": 8414.61
	}
]';

function calcMinAndMax($billingDays) {
    $minValue = null;
    $maxValue = null;

    foreach ($billingDays as $day) {
        $value = $day['valor'];
        if ($value > 0) {
            if ($minValue === null) {
                $minValue = $value;
                $maxValue = $value;
            } else {
                $minValue = min($minValue, $value);
                $maxValue = max($maxValue, $value);
            }
        }
    }

    return [$minValue, $maxValue];
}

function calcAverageBilling($billingDays) {
    $billingSum = 0;
    $daysWithBilling = 0;

    foreach ($billingDays as $day) {
        $value = $day['valor'];
        if ($value > 0) {
            $billingSum += $value;
            $daysWithBilling++;
        }
    }

    return $daysWithBilling > 0 ? $billingSum / $daysWithBilling : 0;
}

function countDaysAboveAverage($billingData, $average) {
    $count = 0;

    foreach ($billingData as $day) {
        if ($day['valor'] > $average) {
            $count++;
        }
    }

    return $count;
}


try {
    $billingData = json_decode($jsonData, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Error to decode json: ' . json_last_error_msg());
    }

    $result = calcMInAndMax($billingData);
    $minValue = $result[0];
    $maxValue = $result[1];

    $monthlyAverage = calcAverageBilling($billingData);
    $daysAboveAverage = countDaysAboveAverage($billingData, $monthlyAverage);

    echo "Menor valor de faturamento: R$ " . $minValue . "\n";
    echo "Maior valor de faturamento: R$ " . $maxValue . "\n";
    echo "Número de dias com faturamento acima da média mensal: $daysAboveAverage\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>