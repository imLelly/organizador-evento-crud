<!DOCTYPE html>
<html lang="port-br">

<head>
    <meta charset="UTF-8">
    <?php include('config.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local</title>
    <style>
        * {
    box-sizing: border-box;
    font-family: Helvetica;
    margin: 0;
    padding: 0;
}

body {
    font-family: Helvetica, sans-serif;
    font-size: 16px;
    line-height: 1.5;
}

.container {
    display: grid;
    grid-template-columns: 1fr 2fr;
    align-items: center;
    padding: 30px;
    margin: 40px auto;
    max-width: 1000px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.logo {
    margin-bottom: 20px;
}

.logo img {
    width: 300px;
    height: auto;
    margin: 20px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

h2 {
    margin-top: 0;
    color: #4d6ea6;
}

.form-control {
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.form-control label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

.form-control input[type="text"],
.form-control input[type="number"]{
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

input[type="submit"] {
    background: #4d6ea6;
    border: none;
    border-radius: 5px;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
    padding: 10px 20px;
    transition: background-color 0.4s, color 0.4s;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
    background: #0d2d64;
    color: #FFFFFF;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

a {
    text-decoration: none;
    color: #4d6ea6;
}

a:hover {
    color: #182950;
}
    </style>
</head>

<body>
    <div class="container">
    <div class="logo"><img src="img/1.png" alt="Logo"></div>

        <form action="local.php" method="post" name="local"> 
        <h2>Cadastro do Local</h2>
            <div class="form-control">
                <label for="tipo_local">Nome do Local:</label>
                <input type="text" id="tipo_local" name="tipo_local" class="field">
            </div>
            <div class="form-control">
                <label for="capacidade">Capacidade:</label>
                <input type="number" id="capacidade" name="capacidade" class="field">
              </div>
              <input type="submit"  value="Gravar" name="botao">
           
        </form>
        <a href="index.html">Home</a>
    </div>

    <?php
    if (@$_POST['botao'] == "Gravar") {
        $tipo_local = $_POST['tipo_local'];
        $capacidade = $_POST['capacidade'];


        $insere = "INSERT into local(tipo_local, capacidade) VALUES ('$tipo_local', '$capacidade')";
        mysqli_query($mysqli, $insere) or die("Não foi possível inserir os dados");
    }

    ?>

</body>

</html>