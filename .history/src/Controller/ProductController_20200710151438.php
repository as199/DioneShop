<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product_index")
     */
    public function index(ProductRepository $productRepository,Pagina)
    {
        $pagination = $paginator->paginate(
            $cartService->total(),
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll()
        ]);
    }
}
