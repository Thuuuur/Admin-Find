<?php
session_start();

if (!isset($_SESSION['token'])) {
    header("Location: ../view/index.php");
    echo "<script>alert('Usuário ou senha incorretos!');</script>";
    exit();
}

$token = $_SESSION['token'];

$jsonUrl = 'http://localhost/Administrador/select/selectProdutos.php';
$url = 'http://localhost:3000/usuarios';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

curl_setopt($ch, CURLOPT_URL, $jsonUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jsonContent = curl_exec($ch);
$produtosArray = json_decode($jsonContent, true);

curl_close($ch);

if ($response !== false) {
    $usuarios = json_decode($response, true);
} else {
    $usuarios = [];
    echo 'Erro ao obter a lista de usuários.';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../controller/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <nav>
        <img src="../imagens/Logo Preta.png" class="logo-image">
        <div class="nav-diretorios">
            <a href="#" class="nav-buttons" data-target="overlay1">
                <img src="../imagens/icone4.png" class="icones-image">Contas Ativas
            </a>
            <a href="#" class="nav-buttons" data-target="overlay2">
                <img src="../imagens/icone3.png" class="icones-image">Financeiro
            </a>
            <a href="#" class="nav-buttons" data-target="overlay3">
                <img src="../imagens/icone2.png" class="icones-image">Região
            </a>
            <a href="#" class="nav-buttons" data-target="overlay4">
                <img src="../imagens/icone1.png" class="icones-image">Suporte
            </a>
        </div>
    </nav>
    <div class="dashboard-navbar">
        <div class="dashboard-navbar-title">DASHBOARD</div>
        <div class="dashboard-navbar-menu">
            <div class="divBusca">
                <input type="text" class="txtBusca" placeholder="Pesquisar" />
                <img src="../imagens/icone8.png" class="icon-busca" alt="Buscar" />
            </div>
            <div class="dashboard-navbar-menu-item1">
                <a href="">
                    <img src="../imagens/icone6.png" alt="">
                </a>
            </div>
            <div class="dashboard-navbar-menu-item2">
                <a href="" id="accountButton">
                    <img src="../imagens/icone7.png" alt="">
                </a>
            </div>
            <div id="accountBox">
                <div class="adm-box">
                    <div class="foto-adm">
                        <img src="../imagens/adm.png">
                    </div>
                    <div class="text-conta-adm">
                        <p class="nome-adm">Silvio Santos da Silva Pinto</p>
                        <p class="email-adm">silvioobrabo777@gmail.com</p>
                    </div>
                    <div class="button-container">
                        <form action="../controller/logout.php" method="post">
                            <button type="submit" class="logout-button">
                                <img src="../imagens/logout.png" alt="Sair" class="icon">Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- overlay 1 -->
    <div id="overlay1" class="overlay">
        <div class="graficos1">
            <div class="grafico1">
                <canvas id="userDistributionChart"></canvas>
                <div class="graficos-text1">
                    <p>Distribuição de Usuários</p>
                </div>
            </div>
            <div class="grafico1">
                <div class="cubo-dados">
                    <div class="cubo-laranja"><img src="../imagens/grupo-de-usuarios.png"></div>
                    <div class="dados">
                        <p>Total:</p>
                        <h1>58</h1>
                    </div>
                </div>
                <div class="graficos-text">
                    <p>Quantidade de Usuários</p>
                </div>
            </div>
            <div class="grafico1">
                <div class="cubo-dados">
                    <div class="cubo-laranja"><img src="../imagens/grupo-de-usuarios.png"></div>
                    <div class="dados">
                        <p>Recentes:</p>
                        <h1>11</h1>
                    </div>
                </div>
                <div class="graficos-text">
                    <p>Novos Acessos</p>
                </div>
            </div>
        </div>
        <div class="graficos2">
            <div class="grafico2">
                <div class="lineChart-container">
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="grafico-lineChart">
                    <p>Tendência de crescimento das contas ativas ao longo do tempo (gráfico de linha).</p>
                </div>
            </div>
            <div class="grafico2">
                <div class="barChart-container">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="grafico-barChart">
                    <p>Gráfico de barras mostrando o número de acessos mensais por conta.</p>
                </div>
            </div>
            <div class="grafico2">
                <div class="histogramChart-container">
                    <canvas id="histogramChart"></canvas>
                </div>
                <div class="grafico-histogramChart">
                    <p>Histograma de frequência de login das contas ativas.</p>
                </div>
            </div>
        </div>
        <div class="tables">
            <div class="table-container">
                <table>
                    <tr class="table-title">
                        <th class="table-title" id="table-title-start">ID </th>
                        <th class="table-title">Nome </th>
                        <th class="table-title">Cpf</th>
                        <th class="table-title">Data de Nascimento</th>
                        <th class="table-title">Telefone </th>
                        <th class="table-title">Cep</th>
                        <th class="table-title">Logradouro</th>
                        <th class="table-title">Bairro </th>
                        <th class="table-title">Cidade </th>
                        <th class="table-title" id="table-title-end">Email</th>
                    </tr>
                    <!-- Dados da tabela -->
                    <tr>
                        <td>1</td>
                        <td>Maria Silva</td>
                        <td>123.456.789-00</td>
                        <td>1990-05-14</td>
                        <td>(11) 98765-4321</td>
                        <td>01000-000</td>
                        <td>Rua A</td>
                        <td>Centro</td>
                        <td>São Paulo</td>
                        <td>maria.silva@email.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>João Souza</td>
                        <td>987.654.321-00</td>
                        <td>1985-10-23</td>
                        <td>(21) 97654-3210</td>
                        <td>02000-000</td>
                        <td>Avenida B</td>
                        <td>Copacabana</td>
                        <td>Rio de Janeiro</td>
                        <td>joao.souza@email.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>João Souza</td>
                        <td>987.654.321-00</td>
                        <td>1985-10-23</td>
                        <td>(21) 97654-3210</td>
                        <td>02000-000</td>
                        <td>Avenida B</td>
                        <td>Copacabana</td>
                        <td>Rio de Janeiro</td>
                        <td>joao.souza@email.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>João Souza</td>
                        <td>987.654.321-00</td>
                        <td>1985-10-23</td>
                        <td>(21) 97654-3210</td>
                        <td>02000-000</td>
                        <td>Avenida B</td>
                        <td>Copacabana</td>
                        <td>Rio de Janeiro</td>
                        <td>joao.souza@email.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>João Souza</td>
                        <td>987.654.321-00</td>
                        <td>1985-10-23</td>
                        <td>(21) 97654-3210</td>
                        <td>02000-000</td>
                        <td>Avenida B</td>
                        <td>Copacabana</td>
                        <td>Rio de Janeiro</td>
                        <td>joao.souza@email.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>João Souza</td>
                        <td>987.654.321-00</td>
                        <td>1985-10-23</td>
                        <td>(21) 97654-3210</td>
                        <td>02000-000</td>
                        <td>Avenida B</td>
                        <td>Copacabana</td>
                        <td>Rio de Janeiro</td>
                        <td>joao.souza@email.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>João Souza</td>
                        <td>987.654.321-00</td>
                        <td>1985-10-23</td>
                        <td>(21) 97654-3210</td>
                        <td>02000-000</td>
                        <td>Avenida B</td>
                        <td>Copacabana</td>
                        <td>Rio de Janeiro</td>
                        <td>joao.souza@email.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>João Souza</td>
                        <td>987.654.321-00</td>
                        <td>1985-10-23</td>
                        <td>(21) 97654-3210</td>
                        <td>02000-000</td>
                        <td>Avenida B</td>
                        <td>Copacabana</td>
                        <td>Rio de Janeiro</td>
                        <td>joao.souza@email.com</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>João Souza</td>
                        <td>987.654.321-00</td>
                        <td>1985-10-23</td>
                        <td>(21) 97654-3210</td>
                        <td>02000-000</td>
                        <td>Avenida B</td>
                        <td>Copacabana</td>
                        <td>Rio de Janeiro</td>
                        <td>joao.souza@email.com</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- overlay 2 -->
        <div id="overlay2" class="overlay">
            <div class="teste">
                <h1>Ainda não contem conteúdo !</h1>
            </div>
        </div>
        <!-- overlay 3 -->
        <div id="overlay3" class="overlay">
            <div class="teste">
                <h1>Ainda não contem conteúdo !</h1>
            </div>
        </div>
        <!-- overlay 4 -->
        <div id="overlay4" class="overlay">
            <div class="teste">
                <h1>Ainda não contem conteúdo !</h1>
            </div>
        </div>
        <script src="../controller/js/grafico-pizza.js"></script>
        <script src="../controller/js/overlay.js"></script>
        <script src="../controller/js/lineChart.js"></script>
        <script src="../controller/js/barChart.js"></script>
        <script src="../controller/js/histogramChart.js"></script>
        <script src="../controller/js/conta.js"></script>
</body>

</html>