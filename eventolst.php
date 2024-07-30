<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Eventos Contratados</title>
    <link rel="stylesheet" href="css/eventolst.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #4d6ea6;
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .input-group label {
            flex: 1;
            margin-right: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input[type="number"],
        .input-group input[type="datetime-local"],
        .input-group input[type="submit"] {
            width: 20%;
            padding: 10px;
            margin: 5px 0 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-group input[type="number"]:focus,
        .input-group input[type="datetime-local"]:focus {
            border-color: #4d6ea6;
            outline: none;
        }

        .input-group input[type="submit"] {
            background-color: #4d6ea6;
            color: white;
            border: none;
            cursor: pointer;
            margin: 0 auto;
            margin-top: 10px;
        }

        .input-group input[type="submit"]:hover {
            background-color: #4d6ea6;
        }

        .input-group input[type="number"],
        .input-group input[type="datetime-local"] {
            flex: 2;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #333;
            background-color: #f2f2f2;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        a:hover {
            background-color: #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            padding: 15px;
            text-align: center;
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
<div class="form-container">
    <h1>Relatório - Eventos Contratados</h1>
    <form action="eventolst.php" method="post" name="form1">
        <div class="input-group">
            <label for="id_cliente">ID Cliente:</label>
            <input type="number" name="id_cliente" id="id_cliente" class="form-control"/>
        </div>
        <div class="input-group">
            <label for="data_inicio">Data do Evento:</label>
            <input type="datetime-local" name="data_inicio" id="data_inicio" class="form-control"/>
        </div>
        <div class="input-group">
            <input type="submit" name="botao" value="Gerar" class="button"/>
        </div>
    </form>

    <?php
    include('config.php');

    if (isset($_POST['botao']) && $_POST['botao'] == "Gerar") {
        $id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
        $data_inicio = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : '';

        $query = "SELECT cliente.id_cliente, cliente.nome, evento.tipo_evento, 
                  evento.numero_convidados, evento.valor, realiza.data_inicio, realiza.data_fim, local.tipo_local
                  FROM realiza
                  INNER JOIN evento ON realiza.id_evento = evento.id_evento
                  INNER JOIN cliente ON evento.id_cliente = cliente.id_cliente
                  INNER JOIN local ON realiza.id_local = local.id_local";

        if ($id_cliente !== '') {
            $query .= " WHERE cliente.id_cliente = " . intval($id_cliente);
        }
        if ($data_inicio !== '') {
            $query .= ($data_inicio !== '' ? " AND" : " WHERE") . " evento.data_inicio = '" . mysqli_real_escape_string($mysqli, $data_inicio) . "'";
        }

        $query .= " ORDER BY cliente.id_cliente";

        $result = mysqli_query($mysqli, $query);

        if (!$result) {
            die("Erro na consulta: " . mysqli_error($mysqli));
        }
    }
    ?>

    <?php if (isset($result) && mysqli_num_rows($result) > 0) { ?>
        <table>
            <tr style="background-color: #4d6ea6; color: white;">
                <th width="5%" style="padding: 12px;">Código</th>
                <th width="25%" style="padding: 12px;">Nome Completo</th>
                <th width="15%" style="padding: 12px;">Tipo do Evento</th>
                <th width="10%" style="padding: 12px;">Número de Convidados</th>
                <th width="10%" style="padding: 12px;">Valor</th>
                <th width="15%" style="padding: 12px;">Data Início</th>
                <th width="15%" style="padding: 12px;">Data Fim</th>
                <th width="15%" style="padding: 12px;">Local</th>
            </tr>

            <?php while ($coluna = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td class="relatorio"><?php echo $coluna['id_cliente']; ?></td>
                    <td class="relatorio"><?php echo $coluna['nome']; ?></td>
                    <td class="relatorio"><?php echo $coluna['tipo_evento']; ?></td>
                    <td class="relatorio"><?php echo $coluna['numero_convidados']; ?></td>
                    <td class="relatorio"><?php echo $coluna['valor']; ?></td>
                    <td class="relatorio"><?php echo $coluna['data_inicio']; ?></td>
                    <td class="relatorio"><?php echo $coluna['data_fim']; ?></td>
                    <td class="relatorio"><?php echo $coluna['tipo_local']; ?></td>
                </tr>
          <?php } ?>
       </table>
      <?php } elseif (isset($result)) { ?>
      <p>Nenhum resultado encontrado.</p>
        <?php } ?>

   </div>
  <a href="index.html">Home</a>
  </body>
  </html>
