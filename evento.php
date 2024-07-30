<!DOCTYPE html>
<html lang="port-br">

<head>
    <meta charset="UTF-8">
    <?php include('config.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento</title>
    <link rel="stylesheet" href="css/evento.css">
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
            margin: 5px auto;
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
            gap: 15px;
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
        .form-control input[type="datetime-local"],
        .form-control input[type="number"] {
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
        <form action="evento.php" method="post" name="cliente">
            <h2>Cadastro de Evento do Cliente</h2>

            <div class="form-control">
                <label for="tipo_evento">Tipo de Evento:</label>
                <input type="text" id="tipo_evento" name="tipo_evento" class="field">
            </div>

            <div class="form-control">
                <label for="id_cliente">ID Cliente:</label>
                <input type="number" id="id_cliente" name="id_cliente" class="field">
            </div>

            <div class="form-control">
                <label for="data_contratada">Data Contratada:</label>
                <input type="datetime-local" id="data_contratada" name="data_contratada" class="field">
            </div>

            <div class="form-control">
                <label for="valor">Valor:</label>
                <input type="number" id="valor" name="valor" class="field">
            </div>

            <div class="form-control">
                <label for="numero_convidados">Número de Convidados:</label>
                <input type="number" id="numero_convidados" name="numero_convidados" class="field">
            </div>

            <input type="submit" value="Gravar" name="botao">
        </form>
        <a href="index.html">Home</a>
    </div>

    <?php
    if (@$_POST['botao'] == "Gravar") {
        $tipo_evento = $_POST['tipo_evento'];
        $id_cliente = $_POST['id_cliente'];
        $data_contratada = $_POST['data_contratada'];
        $valor = $_POST['valor'];
        $numero_convidados = $_POST['numero_convidados'];

        $insere = "INSERT into evento(tipo_evento, id_cliente, data_contratada, valor, numero_convidados ) VALUES ('$tipo_evento', '$id_cliente', '$data_contratada', '$valor', '$numero_convidados')";
        mysqli_query($mysqli, $insere) or die("Não foi possível inserir os dados");
    }
    ?>
</body>

</html>
