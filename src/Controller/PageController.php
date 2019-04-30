<?php

namespace App\Controller;

use App\Entity\Stores;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PageController extends AbstractController
{


    /**
     * @return Response
     */

    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    public function page($slug = 'index'): Response
    {

        $template = "pages/$slug.html.twig";

        if ($this->get('twig')->getLoader()->exists($template)) {
            return $this->render($template);
        } else {
            return $this->render('index.html.twig');
        }

    }

}