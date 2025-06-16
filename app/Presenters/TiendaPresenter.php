<?php

namespace App\Presenters;

use App\Services\Imagen;

class TiendaPresenter extends Presenter
{
  private $folderImg = 'assets/tienda/';
  private $imgLogo = "logo.png";

  public function getLogo() {
    $folderImg = $this->folderImg . $this->model->dominio . "/";
    return (new Imagen($this->model->img ?? null, $folderImg, $this->imgLogo))->call();
  }

  public function getIcon() {
    $folderImg = $this->folderImg . $this->model->dominio . "/";
    return (new Imagen($this->model->icon ?? null, $folderImg, $this->imgLogo))->call();
  }
}
