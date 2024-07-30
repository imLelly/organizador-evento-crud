<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório de Eventos Contratados</title>
  <link rel="stylesheet" href="css\eventolst.css">
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
      max-width: 1100px;
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
      margin-right: 5px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    .input-group input[type="month"],
    .input-group input[type="submit"] {
      width: 20%;
      padding: 10px;
      margin: 5px 0 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .input-group input[type="month"]:focus {
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

    .input-group input[type="month"] {
      flex: 2;
    }

    th {
      padding: 6px;
      width: 2000px;
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
    .resultado-periodo {
    font-size: 20px;
    color: black;
    margin-bottom: 20px;
    text-align: center;
    margin: 10px 0 10px 0;
    color: #4d6ea6; 
  }
  </style>
</head>
<body>
  <div class="form-container">
    <h1>Relatório - Eventos Contratados</h1>
    <form method="post" name="form1">
      <div class="input-group">
        <label for="data_contratada">Mês Evento:</label>
        <input type="month" name="data_contratada" id="data_contratada" class="form-control"/>
      </div>
      <div class="input-group">
        <input type="submit" name="botao" value="Gerar" class="button"/>
      </div>
    </form>

    <?php
      include('config.php');

      if (isset($_POST['botao']) && $_POST['botao'] == "Gerar") {
        $data_contratada = isset($_POST['data_contratada']) ? $_POST['data_contratada'] : '';

        if ($data_contratada != '') {
          $mes = date('m', strtotime($data_contratada)); 
          $ano = date('Y', strtotime($data_contratada)); 

          $query = "SELECT SUM(evento.valor) AS total_do_mes
                    FROM realiza
                    INNER JOIN evento ON realiza.id_evento = evento.id_evento
                    INNER JOIN cliente ON evento.id_cliente = cliente.id_cliente
                    INNER JOIN local ON realiza.id_local = local.id_local
                    WHERE MONTH(realiza.data_inicio) = $mes AND YEAR(realiza.data_inicio) = $ano";

          $result = mysqli_query($mysqli, $query);

          if ($result) {
            $row = mysqli_fetch_row($result);
            $total_do_mes = $row[0];
            if ($total_do_mes !== null) {
              echo '<table>
                      <tr style="background-color: #4d6ea6; color: white;">
                        <th>Valor Total</th>
                      </tr>
                      <tr>
                        <td class="relatorio">' . htmlspecialchars($total_do_mes) . '</td>
                      </tr>
                    </table>';
            } else {
              echo "<p  class='resultado-periodo'>Nenhum resultado encontrado para o mês selecionado.</p>";
            }
          } 
        } else {
          echo "<p  class='resultado-periodo' >Por favor, selecione um mês para gerar o relatório.</p>";
        }
      }
    ?>
  </div>
  <a href="index.html">Home</a>
</body>
</html>
