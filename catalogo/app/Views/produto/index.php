<!DOCTYPE html>
<html>

<head>
    <title>Minha Loja Online</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <style>
        .product-container {
            width: 80%;
            /* ou qualquer largura desejada */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }


        /* Estilos para cada produto */
        .product {
            width: 20%;
            margin: 15px;
            padding: 25px;
            background-color: #4b209b;
            text-align: center;
            color: #fff;
        }

        /* Estilos para a imagem do produto */
        .product img {
            max-width: 100%;
            height: auto;
        }

        /* Estilos para o nome do produto */
        .product h2 {
            font-size: 18px;
            margin: 10px 0;
            color: #fff;
        }

        /* Estilos para a descrição do produto */
        .product p {
            font-size: 14px;
            color: #fff;
        }

        /* Estilos para o preço do produto */
        .product .price {
            font-size: 16px;
            font-weight: bold;
            color: #fff;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        button {
            margin-top: 30px;
            text-align: center;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <h1>Produtos</h1>



    <div class="header">
        <a href="/logout" class="button">LOGOUT</a>
        <a href="/perfil" class="button">PERFIL</a>



        <a href="<?= site_url('carrinho') ?>" class="button">ACESSAR CARRINHO DE COMPRA</a>


        <?php
        // Verifica se o usuário logado é um ADM
        $isAdmin = session()->get('isAdmin');
        if ($isAdmin) {
            // Exibe o botão "Excluir Produto" apenas se o usuário for um ADM
        ?>



            <a href="<?= site_url('produtos/create') ?>" class="button">CRIAR NOVO PRODUTO</a>


            <a href="<?= site_url('categorias/create') ?>" class="button">CRIAR NOVA CATEGORIA</a>

        <?php
        }
        ?>


    </div>

    <div class="product-container">
        <?php foreach ($produtos as $produto) : ?>
            <div class="product">
                <img src="<?php echo base_url() . 'imgs/' . $produto->imagem; ?>" alt="<?php echo $produto->nome; ?>">
                <h2><?php echo $produto->nome; ?></h2>
                <p><?php echo $produto->descricao; ?></p>

                <div class="price">R$ <?php echo number_format($produto->preco, 2, ',', '.'); ?></div>
                <form method="post" action="<?= site_url('carrinho/add/' . $produto->id) ?>">
                    <button class="button">COMPRAR</button>
                </form>

                <?php
                // Verifica se o usuário logado é um ADM
                $isAdmin = session()->get('isAdmin');
                if ($isAdmin) {
                    // Exibe o botão "Excluir Produto" apenas se o usuário for um ADM
                ?>
                    <form method="get" action="<?= site_url('produtos/delete/' . $produto->id) ?>">
                        <button class="button">EXCLUIR PRODUTO</button>
                    </form>

                    <a href="<?= site_url('produtos/edit/' . $produto->id) ?>" class="button">EDITAR PRODUTO</a>

                    </form>

                <?php
                }
                ?>


            </div>

        <?php endforeach; ?>
    </div>




</body>

</html>