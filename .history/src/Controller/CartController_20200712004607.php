<?php

namespace App\Controller;

use App\Entity\Client;
use App\service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/panier/reduct/{id}", name="cart_reduct")
     */
    public function reduct($id, CartService $cartService)
    {
        $cartService->reduct($id);


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

    /**
     * @Route("/panier/valider", name="cart_valider")
     */
    public function valider(Client $client, Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientT::class, $etudiant);
        $form->handleRequest($request);


        return $this->render('cart/valider.html.twig', []);
    }
}