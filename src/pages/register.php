<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/components/reset.css">
    <link rel="stylesheet" href="../css/register.css">
    <script src="../js/script.js" defer></script>
    <title>Registros</title>
</head>

<body>
    <header>
        <h2>GGames</h2>
        <div class="sair">
            <a href="../../index.html">Sair</a>
        </div>
    </header>
    <div class="Tabela">
        <?php include('crud/getAllGames.php') ?>

        <!-- <table>
            <tr>
                <th>Nome do Jogo</th>
                <th>Genero</th>
                <th>Valor</th>
                <th>Plataforma</th>
                <th>Ações</th>
            </tr>
            <tr>
                <td>oloco</td>
                <td>oloco</td>
                <td>oloco</td>
                <td>oloco</td>
                <td>
                    <div class="formulario">
                        <form action="">
                            <button id="editar">Editar</button>
                            <button id="excluir">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    -->
    </div>
    <div class="add">
        <button id="adici">Adicionar</button>
        <dialog>
            <h3>Insira as informações do jogo: </h3>
            <form id="gameForm">
                <div class="geral">
                <input type="hidden" name="id" id="id">
                    <div class="nome">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome">
                    </div>
                    <div class="genero">
                        <label for="genero">Gênero</label>
                        <input type="text" name="genero" id="genero">
                    </div>
                    <div class="valor">
                        <label for="valor">Valor</label><br>
                        <input type="number" name="valor" id="valor">
                    </div>
                    <div class="plataforma">
                        <label for="plataforma">Plataforma</label>
                        <input type="text" name="plataforma" id="plataforma">
                    </div>
                </div>
                
                <button type="button" id="enviado">Enviar</button>
                <button type="button" id="enviarEdicao">Editar</button>
            </form>
        </dialog>
    </div>


    <script>
        var elementoEditado;
        document.addEventListener("DOMContentLoaded", function() {
        var enviado = document.getElementById('enviado');
        enviado.addEventListener('click', function() {
            let nome = document.getElementById('nome').value;
            let genero = document.getElementById('genero').value;
            let valor = document.getElementById('valor').value;
            let plataforma = document.getElementById('plataforma').value;

            let formData = {
                'nome': nome,
                'genero': genero,
                'valor': valor,
                'plataforma': plataforma
            };

            console.log(formData);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'crud/insert.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    console.log(xhr.responseText);
                    location.reload();
                }
            };
            xhr.send(JSON.stringify(formData));
        });

        var enviarEdicao = document.getElementById('enviarEdicao');
        enviarEdicao.addEventListener('click', function() {
            let id = document.getElementById('id').value;
            let nome = document.getElementById('nome').value;
            let genero = document.getElementById('genero').value;
            let valor = document.getElementById('valor').value;
            let plataforma = document.getElementById('plataforma').value;

            let formData = {
                'id': id,
                'nome': nome,
                'genero': genero,
                'valor': valor,
                'plataforma': plataforma
            };

            console.log(formData);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'crud/update.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    console.log(xhr.responseText);
                    location.reload();
                }
            };
            xhr.send(JSON.stringify(formData));
        });
    });


    function deleteGame(id) {
        let formData = { "id": id };
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'crud/delete.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                console.log(xhr.responseText);
                location.reload();
            }
        };
        xhr.send(JSON.stringify(formData));
    }

        // function infos(id){
        //     let formData = {"id": id};
        //     $.ajax({
        //         type: 'GET',
        //         url: 'crud/d',
        //         success: function(response) {
        //             // Handle the response from the PHP script
        //             console.log(response);
        //             location.reload()
        //         }
        //     }); 
        // }

        function editGame(id){
            elementoEditado = id;
            let row = document.getElementById(id); // Get the table row with the corresponding ID
            let cells = row.getElementsByTagName('td'); // Find all the table cells within the row

            let current_id = cells[0].innerText; // Retrieve the inner text of the first cell
            let current_nome = cells[1].innerText; // Retrieve the inner text of the second cell
            let current_genero = cells[2].innerText; // Retrieve the inner text of the third cell
            let current_valor = cells[3].innerText; // Retrieve the inner text of the fourth cell
            let current_plataforma = cells[4].innerText; // Retrieve the inner text of the fifth cell

            document.getElementById('id').value = current_id;
            document.getElementById('nome').value = current_nome;
            document.getElementById('genero').value = current_genero;
            document.getElementById('valor').value = current_valor;
            document.getElementById('plataforma').value = current_plataforma;

            
            //$('#enviarEdicao').prop('disabled', false);
            //$('#enviarEdicao').show();
            modal.showModal()
        }
    </script>
</body>

</html>
