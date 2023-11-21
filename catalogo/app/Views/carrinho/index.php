<!DOCTYPE html>
<html>

<head>
    <title>Carrinho de Compras</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #6f42c1;
            background-image: url("/imgs/CarrinhoBackground.jpg");

            background-repeat: no-repeat;
            background-size: 100%;

        }

        /* Estilos para o container dos produtos no carrinho */
        .cart-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Estilos para cada item do carrinho */
        .cart-item {
            width: 30%;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
            text-align: center;
        }

        /* Estilos para a imagem do produto no carrinho */
        .cart-item img {
            max-width: 100%;
            height: auto;
        }

        /* Estilos para o nome do produto no carrinho */
        .cart-item h2 {
            font-size: 18px;
            margin: 10px 0;
        }

        /* Estilos para a quantidade de produtos no carrinho */
        .cart-item .quantity {
            font-size: 14px;
        }

        /* Estilos para o preço unitário do produto no carrinho */
        .cart-item .price {
            font-size: 16px;
            font-weight: bold;
            color: #f60;

        }

        /* Estilos para o total do item no carrinho */
        .cart-item .total {
            font-size: 16px;
            font-weight: bold;
            color: #f00;
        }

        /* Estilos para o resumo do carrinho */
        .cart-summary {
            width: 30%;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #946ddc;
        }
    </style>
</head>

<body>
    <h1>Carrinho de Compras</h1>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <?php if (isset($carrinho) && !empty($carrinho)) : ?>
        <div class="cart-summary">
            <h2>Resumo do Carrinho</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID do Produto</th>
                        <th>Preço unitário</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalCarrinho = 0; ?>
                    <?php foreach ($carrinho as $produto) : ?>
                        <tr>
                            <td><?= $produto['produto_id']; ?></td> <!-- Alterado para produto_id -->
                            <td>R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></td>
                            <td><?= $produto['quantidade']; ?></td>
                            <?php
                            $subtotal = $produto['preco'] * $produto['quantidade'];
                            $totalCarrinho += $subtotal;
                            ?>
                            <td>R$ <?= number_format($subtotal, 2, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>Total: R$ <?= number_format($totalCarrinho, 2, ',', '.'); ?></p>
            <button><a href="<?= site_url('produtos') ?>">Continuar Comprando</a></button>

            <form method="post" action="<?= site_url('carrinho/limpar') ?>">
                <button type="submit">Finalizar Compra</button>
            </form>

        <?php else : ?>
            <p>Seu carrinho está vazio.</p>
            <button><a href="<?= site_url('produtos') ?>">Ir às Compras</a></button>
        <?php endif; ?>

        </div>


</body>

</html>