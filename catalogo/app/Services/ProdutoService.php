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
        $validation = service('validation');

        if ($validation->withRequest($image)->run(null, 'produto')) {
       
            if ($image->isValid() && !$image->hasMoved()) {
                return $this->saveImage(['imagem' => $image]);
            }

         
        }

        return view('produto/create', ['errors' => $validation->getErrors()]);
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
