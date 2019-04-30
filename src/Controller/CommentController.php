<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Form\CommentsType;
use App\Entity\Stores;
use App\Entity\Comment;

class CommentController extends AbstractController
{

    public function index()
    {


        return $this->render('comments/index.html.twig');

    }

    public function comment(Request $request) : Response
    {

        $form = $this->createForm(CommentsType::class, []);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Validate Name and Email

            // Validate Arbitrary Conditions

            $manager = $this->getDoctrine()->getManager();

            dump($data);

            $comment = new Comment();
            $comment->setName($data['name']);
            $comment->setEmail($data['email']);

            if ($data['store'] instanceof Stores) {
                $comment->setStore($data['store']);
            } else {
                $comment->setStore(null);
            }

            $comment->setText($data['text']);

            dump($comment);

            $manager->persist($comment);
            $manager->flush();

            return $this->render('index.html.twig');
        }


        return $this->render('comment.html.twig', [
            'form' => $form->createView()
        ]);
    }


}