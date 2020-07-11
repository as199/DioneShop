<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\service\CartService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product_index")
     */
    public function index(ProductRepository $productRepository, PaginatorInterface $paginator, Request $request, CartService $cartService)
    {
        $product = $paginator->paginate(
            $productRepository->findAll(),
            $request->query->getInt('page', 1),
            3
        );
        return $this->render('product/index.html.twig', [
            'products' => $product
        ]);
    }
}
