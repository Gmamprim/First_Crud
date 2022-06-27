
<?php
    include('./components/header.php');
?>
    <section>
        <h1>Clientes</h1>
        <!-- Formulario de cadastro META -->
        <form method="post" action="./form.php">
            <div class="d-flex">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" id="name" name="name" max="50" required>
            </div>

            <div class="d-flex">
                <label for="Document" class="form-label">Cpf ou Cnpj:</label>
                <input type="text" id="documento" name="documento" max="50" required>
            </div>

            <div class="d-flex">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" id="telefone" name="telefone" placeholder="(99)1234-5678" required>
            </div>

            <div class="d-flex">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" max="50" placeholder="123@gmail.com" required>
            </div>
            <button type="submit" class="">Salvar</button>
        </form>

        <!-- Listagem de registros -->
        <table>

            <!-- Cabeçalho -->
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ/CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>#</th>
            </tr>

            <?php
            #inclusão do arquivo functions para o contexto
            include('./actions/functions.php');

            #chamada da função que retorna os dados da consulta no banco de dados
            $results = readQuery("SELECT * FROM clientes");

            #verifica o retorno da função
            if ($results) {
                foreach ($results as $client) {

            ?>
                    <tr>
                        <td><?php echo $client['id'] ?></td>
                        <td><?php echo $client['nome'] ?></td>
                        <td><?php echo $client['documento'] ?></td>
                        <td><?php echo $client['telefone'] ?></td>
                        <td><?php echo $client['email'] ?></td>

                        <td>#</td>
                    </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="6" style="text-align:center">Nenhum registro encontrado</td></tr>';
            }
            ?>
        </table>
    </section>
<?php
include('./components/footer.php');
?>
