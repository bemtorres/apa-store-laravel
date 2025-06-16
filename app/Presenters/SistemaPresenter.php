<?php

namespace App\Presenters;

use App\Services\Imagen;

class SistemaPresenter extends Presenter
{
  private $folderImg = 'assets/sistema/';
  // private $imgFondo = "/dist/img/international.jpg";
  // private $imgFondoLogin = "/dist/img/international.jpg";
  private $imgLogo = "pantalla.png";

  public function getLogo() {
    return (new Imagen($this->model->config['logo'] ?? null, $this->folderImg, $this->imgLogo))->call();
  }

  public function getIcon() {
    return (new Imagen($this->model->config['icon'] ?? null, $this->folderImg, $this->imgLogo))->call();
  }

  // public function getBackgroundLogin() {
  //   return (new Imagen($this->model->config['background'] ?? null, $this->folderImg, $this->imgLogin))->call();
  // }
}
