<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Form\ContributionsType;


class ContributionsController extends AbstractController
{

    private function getNextReviewDate()
    {

    }

    public function contributions(Request $request): Response
    {

        $defaultData = [];

        $form = $this->createForm(ContributionsType::class, $defaultData);

        return $this->render('contributions.html.twig', ['nextreviewdate' => 'PLACEHOLDER', 'form' => $form->createView()]);

    }

    public function review() {

    }

}

