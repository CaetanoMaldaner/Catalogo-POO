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
        // Check if the image file exists
        if (file_exists($imagePath)) {
            // Determine the destination directory where you want to save the image
            $destinationDirectory = FCPATH . '/imgs';


            // Generate a unique filename or use the original filename if needed
            $filename = uniqid() . '_' . basename($imagePath);

            // Define the full path for the new image file in the destination directory
            $destinationPath = $destinationDirectory . $filename;

            // Attempt to move the image file to the destination directory
            if (rename($imagePath, $destinationPath)) {
                // Image was successfully moved, and you can return any relevant information or the path
                return $destinationPath;
            } else {
                // Failed to move the image, handle the error or return null
                return null;
            }
        }

        // If the image file doesn't exist, return null or handle the error accordingly
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
