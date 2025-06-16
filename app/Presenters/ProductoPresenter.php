<?php

namespace App\Presenters;

use App\Services\Imagen;

class ProductoPresenter extends Presenter
{
  private $folderImg = 'assets/tienda/';
  private $imgLogo = "pantalla.png";

  public function getLogo() {
    $folderImg = $this->folderImg . $this->model->dominio . "/";
    return (new Imagen($this->model->img ?? null, $folderImg, $this->imgLogo))->call();
  }
}
