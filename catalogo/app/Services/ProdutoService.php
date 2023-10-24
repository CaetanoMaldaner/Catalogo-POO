<?php

namespace App\Services;

use App\Entities\Produto;
use App\Models\ProdutoModel;

class ProdutoService
{
    protected $produtoModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
    }

    public function createProduct($data)
    {
        // logica da imagem

        $produto = new Produto($data);

        // Insira os dados no banco de dados
        return $this->produtoModel->insert($produto);
    }



    public function insertImage($image)
    {
        if ($image !== null) {
            if ($image->isValid() && !$image->hasMoved()) {
                return $this->saveImage($image);
            }
        }
        return null;
    }

    public function moveImage($image, $newName = null)
    {
        // Certifique-se de configurar o diretório de destino corretamente
        $diretorioDestino = 'public/imgs';

        if ($image !== null) { // Verifica se $image não é nulo
            if ($image->isValid() && !$image->hasMoved()) {
                if ($newName === null) {
                    $newName = $image->getName();
                }

                if ($image->move($diretorioDestino, $newName)) {
                    return $newName;
                }
            }
        }

        return null;
    }


    public function renameImage($originalName)
    {
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $newName = time() . '.' . $extension;
        return $newName;
    }

    private function saveImage($image)
    {
        // Lógica para inserção de imagem
        if ($image['imagem']['error'] === UPLOAD_ERR_OK) {
            $diretorioDestino = 'public/imgs';
            $nomeUnico = uniqid() . '.' . pathinfo($image['imagem']['name'], PATHINFO_EXTENSION);

            if (move_uploaded_file($image['imagem']['tmp_name'], $diretorioDestino . $nomeUnico)) {
                return $nomeUnico;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
