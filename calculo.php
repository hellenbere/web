<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = floatval($_POST["numero"]);

    if ($n < 0) {
        echo "No se puede calcular la raíz cuadrada de un número negativo.";
        exit;
    }

    echo "<h2>Resolviendo la raíz cuadrada de $n paso a paso</h2>";

    // Método de Herón: x_{n+1} = (x_n + n / x_n) / 2
    echo "<p><strong>Fórmula del método de Herón:</strong><br>";
    echo "x<sub>n+1</sub> = (x<sub>n</sub> + n / x<sub>n</sub>) / 2</p>";

    $x = $n / 2; // Adivinanza inicial
    $iteracion = 0;
    $tolerancia = 0.000001;

    echo "<p><strong>Iteraciones:</strong></p>";
    do {
        $iteracion++;
        $anterior = $x;
        $x = ($x + $n / $x) / 2;

        echo "<p><strong>Iteración $iteracion:</strong><br>";
        echo "x = ($anterior + $n / $anterior) / 2<br>";
        echo "x = (" . round($anterior, 6) . " + " . round($n / $anterior, 6) . ") / 2<br>";
        echo "x = " . round($x, 6) . "</p>";
    } while (abs($x - $anterior) > $tolerancia);

    echo "<h3>Resultado final: √$n ≈ " . round($x, 6) . "</h3>";
}
?>
