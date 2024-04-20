<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="folha de estilo">
    <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/sytles.css">

    <title>Simulação de Financiamento</title>
</head>
<body>
    
    <div class="container">
        <nav id="navbar" class="container">
        <div class="row justify-content-center">
            <a href="#">Home</a>
            <a href="#">Financiamento</a>
            <a href="#">Sobre nós</a>
        </div>
        </nav>

    <h1>Simulação de Financiamento</h1>
        
        <form action="calculate.php" method="post">
            
            <h4>Dados pessoais:</h4>
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Data de Nascimento:</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <br>

            <h4>Informações do Financiamento:</h4>
            <div class="form-group">
                <label for="purchaseValue">Valor da Compra:</label>
                <input type="number" class="form-control" id="purchaseValue" name="purchaseValue" required>
            </div>
            <div class="form-group">
                <label for="interestRate">Taxa de Juros (em decimal):</label>
                <input type="number" class="form-control" id="interestRate" name="interestRate" step="0.01" min="0" max="1" required>
            </div>
            <div class="form-group">
                <label for="numInstallments">Número de Parcelas:</label>
                <input type="number" class="form-control" id="numInstallments" name="numInstallments" min="1" required>
            </div>
            <div class="form-group">
                <label for="initialPayment">Valor de Entrada:</label>
                <input type="number" class="form-control" id="initialPayment" name="initialPayment" min="0">
            </div>

            <button type="submit" class="btn btn-primary">Simular</button>
        </form>
        
        <?php
        session_start();
        if(isset($_SESSION['simulations']) && !empty($_SESSION['simulations'])) {
            echo "<h2>Simulações Realizadas:</h2>";
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>CPF</th>";
            echo "<th>E-mail</th>";
            echo "<th>Telefone</th>";
            echo "<th>Data de Nascimento</th>";
            echo "<th>Valor da Compra</th>";
            echo "<th>Taxa de Juros</th>";
            echo "<th>Número de Parcelas</th>";
            echo "<th>Valor de Entrada</th>";
            echo "<th>Total a Pagar (Cenário 1)</th>";
            echo "<th>Total a Pagar (Cenário 2)</th>";
            echo "<th>Total a Pagar (Cenário 3)</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach($_SESSION['simulations'] as $simulation) {
                echo "<tr>";
                echo "<td>{$simulation['name']}</td>";
                echo "<td>{$simulation['cpf']}</td>";
                echo "<td>{$simulation['email']}</td>";
                echo "<td>{$simulation['phone']}</td>";
                echo "<td>{$simulation['birthdate']}</td>";
                echo "<td>{$simulation['purchaseValue']}</td>";
                echo "<td>{$simulation['interestRate']}</td>";
                echo "<td>{$simulation['numInstallments']}</td>";
                echo "<td>{$simulation['initialPayment']}</td>";
                echo "<td>" . number_format($simulation['total1'], 2, ',', '.') . "</td>";
                echo "<td>" . number_format($simulation['total2'], 2, ',', '.') . "</td>";
                echo "<td>" . number_format($simulation['total3'], 2, ',', '.') . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        ?>
    </div>

    <footer class="container">
      <p class="secondary-color">Nos encontre nas redes sociais:</p>
      <div class="row justify-content-center" id="social-icons-container">
        <div class="col-1">
          <a href="#"><i class="bi bi-facebook secondary-color"></i></a>
        </div>
    
        <div class="col-1">
          <a href="#"><i class="bi bi-instagram secondary-color"></i></a>
        </div>
        <div class="col-1">
          <a href="#"><i class="b bi-twitter secondary-color"></i></a>
        </div>
      </div>
      <br>
      <p class="secondary-color">Financiamento &copy; 2020</p>
    </footer>

    <script src="./js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
