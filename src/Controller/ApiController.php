<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Tax;
use App\Repository\ProductRepository;
use App\Repository\TaxRepository;
use Mudde\Formgen4Symfony\Helper\FormgenHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api")]
class ApiController extends AbstractController
{

    #[Route('/products/form', name: 'product_form')]
    public function formProduct(): Response
    {
        return $this->json(FormgenHelper::toJson(Product::class));
    }

    #[Route('/taxes/form', name: 'tax_form')]
    public function formTax(): Response
    {
        return $this->json(FormgenHelper::toJson(Tax::class));
    }

}
