<?php

namespace App\service;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
  protected $session;
  protected $productRepository;
  public function __construct(SessionInterface $session, ProductRepository $productRepository)
  {
    $this->session = $session;
    $this->productRepository = $productRepository;
  }

  public function add(int $id)
  {
    $panier = $this->session->get('panier', []);
    if (!empty($panier[$id])) {
      $panier[$id]++;
    } else {
      $panier[$id] = 1;
    }


    $this->session->set('panier', $panier);
  }

  public function remove(int $id)
  {
    $panier = $this->session->get('panier', []);

    if (!empty($panier[$id])) {
      unset($panier[$id]);
    }
    $this->session->set('panier', $panier);
  }

  public function getallPanier(): array
  {
    $panier = $this->session->get('panier', []);
    $panierWithData = [];
    foreach ($panier as $id => $quantity) {
      $panierWithData[] = [
        'product' => $this->productRepository->find($id),
        'quantity' => $quantity
      ];
    }
    return  $panierWithData;
  }
  public function total(): float
  {
    $total = 0;

    foreach ($this->getallPanier() as $item) {

      $total += $item['product']->getPrice() * $item['quantity'];
    }
    return $total;
  }
}
