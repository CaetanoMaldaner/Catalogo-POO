<!DOCTYPE html>
<html>

<head>
    <title>Minha Loja Online</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <style>
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Estilos para cada produto */
        .product {
            width: 20%;
            margin: 15px;
            padding: 25px;
            background-color:  #322383;
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
    <div class="product-container">
        <?php foreach ($produtos as $produto) : ?>
            <div class="product">
                <img src="<?php echo $produto->imagem_url; ?>" alt="<?php echo $produto->nome; ?>">
                <h2><?php echo $produto->nome; ?></h2>
                <p><?php echo $produto->descricao; ?></p>
                <div class="price">R$ <?php echo number_format($produto->preco, 2, ',', '.'); ?></div>
                <form method="post" action="<?= site_url('carrinho/add/' . $produto->id) ?>">
                    <button type="submit">Comprar</button>
                </form>
                <form method="get" action="<?= site_url('produtos/delete/' . $produto->id) ?>">
                    <button type="submit">Excluir Produto</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
        <a href="<?= site_url('carrinho') ?>">
            Acessar Carrinho de Compras (
            <?php
            $carrinho = session('carrinho');
            echo is_array($carrinho) ? count($carrinho) : 0;
            ?> itens)
        
        </a>
    </button>
</body>

</html>
