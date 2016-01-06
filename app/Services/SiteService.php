<?php

namespace App\Services;

use Intervention\Image\ImageManagerStatic as Image;

class SiteService
{
    /**
     *  Verifica se foi enviada imagem e se for o caso faz o crop e envia para a pasta
     */
    /**
     * Description
     * @param object $request
     * @param string $destino
     * @return array
     */
    public function cropImage($request, $destino)
    {
        $data = $request->all();
        if ($request->hasFile('logotipo')) {
            $novoNome = date('d-m-Y-h-i-s') . '-' . $request->file('logotipo')->getClientOriginalName();

            if ($data['x1'] !== '' && $data['x2'] !== '' && $data['y1'] !== '' && $data['y2'] !== '') {

                $w = $data['x2'] - $data['x1'];
                $h = $data['y2'] - $data['y1'];
                $x = $data['x1'];
                $y = $data['y1'];

                Image::configure(array('driver' => 'gd'));
                $image = Image::make($request->file('logotipo'));
                // width, height, $x, $y
                $image->crop($w, $h, $x, $y);
                $image->save($destino . $novoNome);

            } else {
                $image = Image::make($request->file('logotipo'));
                $image->save($destino . $novoNome);
            }

            $data["logotipo"] = $novoNome;

        }
        unset($data['_token']);
        unset($data['x1']);
        unset($data['y1']);
        unset($data['x2']);
        unset($data['y2']);

        return $data;
    }
}
