<?php

namespace App\Controller;


use App\service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(CartService $cartService)
    {

        return $this->render('cart/index.html.twig', [
            'paniers' =>  $cartService->getallPanier(),
            'total' =>  $cartService->total()
        ]);
    }
    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService)
    {
        $cartService->add($id);


        return $this->redirectToRoute('product_index');
    }
    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function supprimer($id, CartService $cartService)
    {
        $cartService->remove($id);
        return $this->redirectToRoute('cart_index');
    }
}