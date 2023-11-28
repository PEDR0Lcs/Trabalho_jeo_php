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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var elementoEditado;
        $(document).ready(function() {
            $('#enviado').on('click', function(){
                var nome = $('#nome').val();
                var genero = $('#genero').val();
                var valor = $('#valor').val();
                var plataforma = $('#plataforma').val();

                // Create a JSON object with the form data
                var formData = {
                    'nome': nome,
                    'genero': genero,
                    'valor': valor,
                    'plataforma': plataforma,
                };
                console.log(formData);
                // Send the form data to the PHP script using AJAX
                $.ajax({
                    type: 'POST',
                    url: 'crud/insert.php',
                    data: formData,
                    success: function(response) {
                        // Handle the response from the PHP script
                        console.log(response);
                        location.reload()
                    }
                });
            });

            $('#enviarEdicao').on('click', function(){
                var id = $('#id').val();
                var nome = $('#nome').val();
                var genero = $('#genero').val();
                var valor = $('#valor').val();
                var plataforma = $('#plataforma').val();

                // Create a JSON object with the form data
                var formData = {
                    'id': id,
                    'nome': nome,
                    'genero': genero,
                    'valor': valor,
                    'plataforma': plataforma,
                };
                console.log(formData);
                // Send the form data to the PHP script using AJAX
                $.ajax({
                    type: 'POST',
                    url: 'crud/update.php',
                    data: formData,
                    success: function(response) {
                        // Handle the response from the PHP script
                        console.log(response);
                        location.reload()
                    }
                });

                //$('#enviarEdicao').prop('disabled', true);
                //$('#enviarEdicao').hide();
            });
        });

        function deleteGame(id){
            let formData = {"id": id};
            $.ajax({
                type: 'POST',
                url: 'crud/delete.php',
                data: formData,
                success: function(response) {
                    // Handle the response from the PHP script
                    console.log(response);
                    location.reload()
                }
            });            
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
            var row = $("#" + id); // Get the table row with the corresponding ID using jQuery
            var cells = row.find('td'); // Find all the table cells within the row

            var current_id = $(cells[0]).text(); // Retrieve the inner text of the first cell
            var current_nome = $(cells[1]).text(); // Retrieve the inner text of the first cell
            var current_genero = $(cells[2]).text(); // Retrieve the inner text of the second cell
            var current_valor = $(cells[3]).text(); // Retrieve the inner text of the third cell
            var current_plataforma = $(cells[4]).text(); // Retrieve the inner text of the fourth cell
         
            var id = $('#id').val(current_id);
            var nome = $('#nome').val(current_nome);
            var genero = $('#genero').val(current_genero);
            var valor = $('#valor').val(current_valor);
            var plataforma = $('#plataforma').val(current_plataforma);
            
            //$('#enviarEdicao').prop('disabled', false);
            //$('#enviarEdicao').show();
            modal.showModal()
        }
    </script>
</body>

</html>
