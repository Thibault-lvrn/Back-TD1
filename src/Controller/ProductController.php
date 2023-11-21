<?php

namespace App\Controller;

use App\Services\Sluggify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_list_products')]
    public function listProducts(): Response
    {
        return $this->render('product/listProducts.html.twig', [
            'pageTitle' => 'Liste des produits',
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/product/{id}', name: 'app_view_product')]
    public function viewProducts(int $id): Response
    {
        return $this->render('product/viewProduct.html.twig', [
            'id' => $id,
            'controller_name' => 'ProductController',
            'pageTitle' => "Affichage du produit",
        ]);
    }

}
