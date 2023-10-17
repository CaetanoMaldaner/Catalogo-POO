<?php

echo "VIEW CREATE";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Produtos</title>
</head>
<body>
    <h1>Gerenciamento de Produtos</h1>

    <h2>Produtos</h2>
    <ul>
        <li><a href="/produtos">Lista de Produtos</a></li>
        <li><a href="/produtos/create">Adicionar Produto</a></li>
    </ul>

    <h2>Criar Produto</h2>
    <form action="/produtos/store" method="post">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" id="nome">
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao"></textarea>
        <br>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco">
        <br>
        <label for="imagem">Imagem:</label>
        <input type="text" name="imagem" id="imagem">
        <br>
        <label for="categoria_id">ID da Categoria:</label>
        <input type="text" name="categoria_id" id="categoria_id">
        <br>
        <input type="submit" value="Criar Produto">
    </form>

    <h2>Editar Produto</h2>
    <form action="/produtos/update/{id}" method="post">
        <!-- Substitua {id} pelo ID do produto que deseja editar -->
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" id="nome">
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao"></textarea>
        <br>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco">
        <br>
        <label for="imagem">Imagem:</label>
        <input type="text" name="imagem" id="imagem">
        <br>
        <label for="categoria_id">ID da Categoria:</label>
        <input type="text" name="categoria_id" id="categoria_id">
        <br>
        <input type="submit" value="Atualizar Produto">
    </form>

    <h2>Excluir Produto</h2>
    <form action="/produtos/delete/{id}" method="post">
        <!-- Substitua {id} pelo ID do produto que deseja excluir -->
        <input type="submit" value="Excluir Produto">
    </form>
</body>
</html>
