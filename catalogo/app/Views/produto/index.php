<!DOCTYPE html>
<html>
<head>
    <title>Minha Loja Online</title>
    <style>
        /* Estilos para o container dos produtos */
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Estilos para cada produto */
        .product {
            width: 30%;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
            text-align: center;
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
        }

        /* Estilos para a descrição do produto */
        .product p {
            font-size: 14px;
        }

        /* Estilos para o preço do produto */
        .product .price {
            font-size: 16px;
            font-weight: bold;
            color: #f60;
        }
    </style>
</head>
<body>
    <h1>Produtos em Destaque</h1>
    <div class="product-container">
        <?php foreach ($produtos as $produto) : ?>
            <div class="product">
                <img src="<?php echo $produto->imagem_url; ?>" alt="<?php echo $produto->nome; ?>">
                <h2><?php echo $produto->nome; ?></h2>
                <p><?php echo $produto->descricao; ?></p>
                <div class="price">R$ <?php echo number_format($produto->preco, 2, ',', '.'); ?></div>
                <button>Comprar</button>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>