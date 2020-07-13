<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
    /**
     * @Route("/client/add", name="addClient")
     */
    public function AddClient(Client $client = null, CartService $cartService, Request $request)
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);


        return $this->render('cart/valider.html.twig', [
            'clients' => $form->createView(),
            'paniers' =>  $cartService->getallPanier(),
            'total' =>  $cartService->total()
        ]);
    }
}