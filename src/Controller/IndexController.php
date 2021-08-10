<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Tax;
use App\Repository\TaxRepository;
use Mudde\Formgen4Symfony\Helper\FormgenHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/api/form/product', name: 'index')]
    public function formProduct(): Response
    {
        return $this->json(FormgenHelper::toJson(Product::class));
    }
    #[Route('/api/form/tax', name: 'index_test')]
    public function formTax(): Response
    {
        return $this->json(FormgenHelper::toJson(Tax::class));
    }
    #[Route('/api/data/tax', name: 'index_test')]
    public function dataTax(TaxRepository $repo): Response
    {
        return $this->json($repo->findAll());
    }

}
