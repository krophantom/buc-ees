<?php

namespace App\Controller;

use App\Entity\Stores;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class StoresController extends AbstractController
{

    public function locations(): Response
    {

        $stores = $this->getDoctrine()->getRepository(Stores::class)->findBy([],['city' => 'ASC', 'number' => 'ASC']);

        return $this->render('pages/stores.html.twig', ['stores' => $stores]);

    }

}