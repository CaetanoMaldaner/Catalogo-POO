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

    public function createProduct($data, $imageName)
    {
        $produto = new Produto($data);
        $produto->imagem = $imageName;

        $now = date('Y-m-d H:i:s'); // Obtém a data e hora atual

        $produto->created_at = $now; // Define a data de criação
        $produto->updated_at = $now; // Define a data de atualização

        return $this->produtoModel->insert($produto);
    }



    public function insertImage($image)
    {
        if ($image !== null) {
            if (is_object($image) && method_exists($image, 'isValid') && $image->isValid() && !$image->hasMoved()) {
                return $this->saveImage($image);
            } elseif (is_string($image) && file_exists($image) && getimagesize($image)) {

                return $this->saveImageFromFile($image);
            }
        }

        return null;
    }


    public function saveImageFromFile($imagePath)
    {

        if (file_exists($imagePath)) {

            $destinationDirectory = FCPATH . '/imgs';



            $filename = uniqid() . '_' . basename($imagePath);


            $destinationPath = $destinationDirectory . $filename;


            if (rename($imagePath, $destinationPath)) {

                return $destinationPath;
            } else {

                return null;
            }
        }


        return null;
    }

    public function moveImage($image, $newName = null)
    {
        $diretorioDestino = 'public/imgs';

        if ($image !== null) {
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

                return $nomeUnico;
            }
        } else {
            return false;
        }
    }
}
