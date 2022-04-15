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

    #[Route('/', name: 'index')]
    public function formProduct(): Response
    {
        return $this->render('index.html.twig');
    }

}
