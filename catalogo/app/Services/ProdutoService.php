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
        
        $produto = new Produto($data);

        return $this->produtoModel->insert($produto);
        //atualizar o metodo de create para adicionar o nome novo da imagem no banco!!!
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
        
        if ($image->getError() === UPLOAD_ERR_OK) {
            $diretorioDestino = 'imgs';
            $extension = pathinfo($image->getName(), PATHINFO_EXTENSION);
                $nomeUnico = time() . '.' . $extension;
                
            if ($image->move($diretorioDestino, $nomeUnico)) {
                // O nome da imagem no diretório de destino será $newName
                return $nomeUnico;
            }
        } else {
            return false;
        }
    }
}
