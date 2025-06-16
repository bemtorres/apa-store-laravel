<?php

namespace App\Presenters;

use App\Services\Imagen;

class ProductoPresenter extends Presenter
{
  private $folderImg = 'assets/tienda/';
  private $imgLogo = "producto.png";

  public function getPhoto() {
    // $folderImg = $this->folderImg . $this->model->dominio . "/";
    return (new Imagen($this->model->img ?? null, $this->folderImg, $this->imgLogo))->call();
  }
}
