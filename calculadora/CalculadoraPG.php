<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de PG</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<body>
<style>
    body {
        background-color: #D6E4FF;
    }
</style>
<nav class="navbar navbar-expand-lg bg-info" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="calculadoraPA.php">Calculadora de PA</a>
        <a class="navbar-brand" href="calculadoraPG.php">Calculadora de PG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informações e Formulas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="formPA.php">Progressão Aritmética</a></li>
                        <li><a class="dropdown-item" href="formPG.php">Progressão Geométrica</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br>
<div class="container text-center">
    <div class="row">
        <div class="col">
            &nbsp;
        </div>
        <div class="col">
            <h5>Calculadora de Progressão Geométrica</h5>
            <form method="POST" action="">
                <!-- "Required" é um atributo booleano no HTML -->
                <!-- "step="any" permite que o usuário insira qualquer número decimal -->
                <label for="a1">Primeiro Termo (a1):</label>
                <input type="number" name="a1" step="any"><br><br>

                <label for="an">Último Termo (an):</label>
                <input type="number" name="an" step="any"><br><br>

                <label for="n">Número de Termos (n):</label>
                <input type="number" name="n" step="any"><br><br>

                <label for="r">Razão (r):</label>
                <input type="text" name="r" step="any"><br><br>

                <label for="antecessor">Antecessor (anterior ao primeiro termo):</label>
                <input type="number" name="antecessor" step="any"><br><br>

                <label for="opcao">Escolha uma opção:</label>
                <select name="opcao">
                    <option value="razao">Calcular a razão (r)</option>
                    <option value="soma_finita">Calcular a soma finita dos termos</option>
                    <option value="soma_infinita">Calcular a soma infinita dos termos</option>
                    <option value="termo_geral">Calcular o termo geral</option>
                    <option value="primeiro_termo">Calcular o primeiro termo (a1)</option>
                    <option value="numero_termos">Calcular o número de termos (n)</option>
                    <option value="ultimo_termo">Calcular o último termo (an)</option>
                </select><br><br>

                <input type="submit" name="calcular" class="btn btn-info" value="Calcular">
            </form><br>
            <?php
            if (isset($_POST['calcular'])) {
                $a1 = $_POST['a1'];
                $an = $_POST['an'];
                $n = $_POST['n'];
                $r = $_POST['r'];
                $antecessor = $_POST['antecessor'];
                $opcao = $_POST['opcao'];

                if ($opcao == 'razao') {
                    $razao = $an / $antecessor;

                    echo "q = $an / $antecessor <br>";
                    echo "<strong><p>A razão da PG é: $razao</p></strong>";

                } elseif ($opcao == 'soma_finita') {
                    $somaFinita = $a1 * ((1 - ($r ** $n)) / (1 - $r));
                    $elevado = 1 - ($r ** $n);
                    $subtrac = 1-$r;
                    $div = $elevado / $subtrac;
                    $mult =  $a1 * $div;

                    echo "$a1 * ((1 - $r ** $n) / (1 - $r)) <br>";
                    echo "$a1 * (($elevado) / (1 - $r)) <br>";
                    echo "$a1 * ($elevado / $subtrac) <br>";
                    echo "$a1 * $div <br>";
                    echo "$mult <br>";
                    echo "<strong><p>A soma finita dos $n primeiros termos da PG é: $somaFinita</p></strong>";

                } elseif ($opcao == 'soma_infinita') {
                    if ($r < 1) {
                        $somaInfinita = $a1 / (1 - $r);
                        $subtra = 1 - $r;
                        $divis2 = $a1 / $subtra; 

                        echo "$a1 / (1 - $r) <br>";
                        echo "$a1 / $subtra <br>";
                        echo "$divis2 <br>";
                        echo "<strong><p>A soma infinita dos termos da PG é: $somaInfinita</p></strong>";
                    } else {
                        echo "<strong><p>A soma infinita dos termos da PG não existe, pois a razão (r) é maior ou igual a 1.</p></strong>";
                    }

                } elseif ($opcao == 'termo_geral') {
                    $termoGeral = $a1 * ($r ** ($n - 1));
                    $eleva = $r ** ($n - 1);
                    $multi = $a1 * $eleva;

                    echo "$a1 * ($r ** ($n - 1)) <br>";
                    echo "$a1 * ($eleva) <br>";
                    echo "$multi";
                    echo "<strong><p>O termo geral da PG é: $termoGeral</p></strong>";

                } elseif ($opcao == 'primeiro_termo') {
                    $primeiroTermo = $an / ($r ** ($n - 1));
                    $elevado2 = $r ** ($n - 1);
                    $divisao = $an / $elevado2;

                    echo "$an / ($r ** ($n - 1)) <br>";
                    echo "$an / $elevado2 <br>";
                    echo "$divisao";
                    echo "<strong><p>O primeiro termo da PG é: $primeiroTermo</p></strong>";

                } elseif ($opcao == 'numero_termos') {
                    if ($r == 1) {

                        echo "<strong><p>O número de termos da PG não pode ser calculado, pois a razão (r) é igual a 1.</p></strong>";
                    } else {
                        $numeroTermos = log($an / $a1) / log($r) + 1;

                        echo "log($an / $a1) / log($r) + 1";
                        echo "<strong><p>O número de termos da PG é: $numeroTermos</p></strong>";
                    }

                } elseif ($opcao == 'ultimo_termo') {
                    $ultimoTermo = $a1 * ($r ** ($n - 1));
                    $elev =  $r ** ($n - 1);
                    $mult = $a1 * $elev;

                    echo "$a1 * ($r ** ($n - 1)) <br>";
                    echo "$a1 * $elev <br>";
                    echo "$mult <br>";
                    echo "<strong><p>O último termo da PG é: $ultimoTermo</p></strong>";
                }
            }
            ?>
        </div>
        <div class="col">
            &nbsp;
        </div>
    </div>
</div>
</body>
</html>