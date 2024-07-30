# Sistema Organizador de Eventos

Este sistema foi desenvolvido como parte de uma atividade prática, proposta em sala de aula, para criar uma solução básica de organização de eventos. O sistema permite o cadastro de clientes, locais, eventos e datas de eventos, além de fornecer relatórios para análise.

## Funcionalidades

- **Cadastro de Clientes**
- **Cadastro de Locais**
- **Cadastro de Eventos**
- **Cadastro de Datas de Eventos**
- **Relatórios de Eventos Contratados**
- **Relatório de Valor por Mês**
- **Relatório de Valor por Local**

## Tecnologias Utilizadas

- **PHP**
- **XAMPP**

## Estrutura do Projeto

O projeto está organizado nas seguintes páginas:
- `index.html`: Página inicial.
- `cliente.php`: Interface e lógica para cadastro de clientes.
- `local.php`: Interface e lógica para cadastro de locais.
- `evento.php`: Interface e lógica para cadastro de eventos.
- `realiza.php`: Interface e lógica para registro de datas de eventos.
- `eventolst.php`: Interface e lógica para visualização do relatório de eventos contratados.
- `lstlocal.php`: Interface e lógica para visualização do relatório de valor de 12 meses por locais.
- `lstmes.php`: Interface e lógica para visualização do relatório de valor por mês.

## Como Configurar e Rodar o Projeto

1. **Instale o XAMPP**: Faça o download e instale o XAMPP a partir do site oficial [Apache Friends](https://www.apachefriends.org/index.html).
2. **Clone o Repositório**: Clone este repositório em seu ambiente local na pasta `htdocs` do XAMPP.
   ```bash
   git clone https://github.com/imLelly/organizador-evento-crud.git
   ```
3. **Configure o Ambiente**: Inicie os módulos Apache e MySQL no painel de controle do XAMPP.
4. **Crie o Banco de Dados**: Utilize o código do arquivo `migration.sql`. 
5. **Acesse o Projeto**: Abra um navegador e digite `localhost/organizador-evento-crud/index.html` para começar a usar o sistema.


