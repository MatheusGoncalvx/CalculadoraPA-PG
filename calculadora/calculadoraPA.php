<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de PA</title>
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
            <h5>Calculadora de Progressão Aritmética</h5>
            <form method="POST" action="">
                <!--"Required" é um atributo boolean no HTML-->
                <label for="a1">Primeiro Termo (a1):</label>
                <input type="number" name="a1"><br><br>

                <label for="an">Último Termo (an):</label>
                <input type="number" name="an"><br><br>

                <label for="n">Número de Termos (n):</label>
                <input type="number" name="n"><br><br>

                <label for="r">Razão (r):</label>
                <input type="number" name="r"><br><br>

                <label for="opcao">Escolha uma opção:</label>
                <select name="opcao">
                    <option value="razao">Calcular a razão (r)</option>
                    <option value="soma_finita">Calcular a soma finita dos termos</option>
                    <option value="soma_infinita">Calcular a soma infinita dos termos</option>
                    <option value="termo_geral">Calcular o termo geral</option>
                    <option value="primeiro_termo">Calcular o primeiro termo (a1)</option>
                    <option value="numero_termos">Calcular o número de termos (n)</option>
                    <option value="ultimo_termo">Calcular o ultimo termo (an)</option>
                </select><br><br>

                <input type="submit" name="calcular" class="btn btn-info" value="Calcular">
            </form><br>
            <?php
            if (isset($_POST['calcular'])) {
                $a1 = $_POST['a1'];
                $an = $_POST['an'];
                $n = $_POST['n'];
                $r = $_POST['r'];
                $opcao = $_POST['opcao'];

                if ($opcao == 'razao') {
                    $razao = ($an - $a1) / ($n - 1);
                    $menos1 = $n - 1;
                    $sub1n = $an - $a1;
                    $Razao = $sub1n / $sub1n;

                    echo "$an = $a1 + ($n - 1) * r<br>";
                    echo "($an - $a1) = ($n - 1) * r<br>";
                    echo "$sub1n = $menos1 * r<br>";
                    echo " $sub1n/$menos1 = r<br>";
                    echo " $razao = r<br>";
                    echo "<strong><p>A razão da PA é: $razao</p></strong>";

                } elseif ($opcao == 'soma_finita') {
                    $somaFinita = ($n * ($a1 + $an)) / 2;
                    $soma = $a1 + $an;
                    $mult = $n * $soma;
                    $divi = $mult / 2;

                    echo "S = $n * ($a1 + $an) / 2 <br>";
                    echo "S = ($n * $soma) / 2 <br>";
                    echo "S = $mult / 2 <br>";
                    echo "S =  $divi <br>";
                    echo "<strong><p>A soma finita dos $n primeiros termos da PA é: $somaFinita</p></strong>";

                } elseif ($opcao == 'soma_infinita') {
                    if ($n >= 1) {
                        echo "<strong><p>A soma infinita dos termos da PA não pode ser calculada quando o número de termos é finito.</p></strong>";
                    } else {
                        $somaInfinita = $a1 / (1 - $r);
                        $subtra = 1 - $r;
                        $divi = $a1 / $subtra;

                        echo "S = $a1 / (1 - $r) <br>";
                        echo "S = $a1 / ($subtra)<br>";
                        echo "S = $divi";
                        echo "<strong><p>A soma infinita dos termos da PA é: $somaInfinita</p></strong>";
                    }
                } elseif ($opcao == 'termo_geral') {
                    $termoGeral = $a1 + ($n - 1) * $r;
                    $menos1 = $n - 1;
                    $mult = $menos1 * $r;

                    echo "A$an = $a1 + ($n - 1) * $r<br>";
                    echo "A$an = $a1 + $menos1 * $r<br>";
                    echo "A$an = $a1 + $mult<br>";
                    echo "A$an = $termoGeral<br>";
                    echo "<strong><p>O termo geral da PA é: $termoGeral</p></strong>";
                } elseif ($opcao == 'primeiro_termo') {
                    $primeiroTermo = $an - ($n - 1) * $r;
                    $menos1 = $n - 1;
                    $mult = $menos1 * $r;
                    $subtracao = $an - $mult;

                    echo "A$a1 = $an - ($n - 1) * $r<br>";
                    echo "A$a1 = $an - $menos1 * $r<br>";
                    echo "A$a1 = $an - $mult<br>";
                    echo "A$a1 = $subtracao<br>";
                    echo "<strong><p>O primeiro termo da PA é: $primeiroTermo</p></strong>";
                } elseif ($opcao == 'numero_termos') {
                    $numeroTermos = ($an - $a1) / $r + 1;
                    $subtracao = $an - $a1;
                    $divisao = $subtracao / $r;
                    $soma = $divisao + 1;

                    echo "A$an = $a1 + ($n - 1) * $r<br>";
                    echo "$an - $a1 = ($n - 1) * $r<br>";
                    echo "$subtracao = ($n - 1) * $r<br>";
                    echo "$subtracao / $r = ($n - 1)<br>";
                    echo "$divisao + 1 = $n<br>";
                    echo "<strong><p>O número de termos da PA é: $numeroTermos</p></strong>";
                } elseif ($opcao == 'ultimo_termo'){
                    $ultimoTermo = $a1 + ($n - 1) * $r;
                    $subtrac = $n - 1;
                    $mult = $subtrac * $r;
                    $soma = $a1 + $mult;  

                    echo "An = $a1 + ($n - 1) * $r <br>";
                    echo "An = $a1 + ($subtrac * $r) <br>";
                    echo "An = $a1 + $mult <br>";
                    echo "An = $soma <br>";
                    echo "<strong><p>O último termo da PA é: $ultimoTermo</p></strong>";
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