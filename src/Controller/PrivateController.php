<?php

namespace App\Controller;

use App\Entity\PrivateCoaching;
use App\Form\PrivateCoachingType;
use App\Repository\PrivateCoachingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/private')]
class PrivateController extends AbstractController
{
    #[Route('/', name: 'app_private_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $privateCoachings = $entityManager
            ->getRepository(PrivateCoaching::class)
            ->findAll();

        return $this->render('private/index.html.twig', [
            'private_coachings' => $privateCoachings,
        ]);
    }

    #[Route('/new', name: 'app_private_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $privateCoaching = new PrivateCoaching();
        $form = $this->createForm(PrivateCoachingType::class, $privateCoaching);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($privateCoaching);
            $entityManager->flush();

            return $this->redirectToRoute('app_private_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('private/new.html.twig', [
            'private_coaching' => $privateCoaching,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_private_show', methods: ['GET'])]
    public function show(PrivateCoaching $privateCoaching): Response
    {
        return $this->render('private/show.html.twig', [
            'private_coaching' => $privateCoaching,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_private_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PrivateCoaching $privateCoaching, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PrivateCoachingType::class, $privateCoaching);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_private_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('private/edit.html.twig', [
            'private_coaching' => $privateCoaching,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_private_delete', methods: ['POST'])]
    public function delete(Request $request, PrivateCoaching $privateCoaching, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$privateCoaching->getId(), $request->request->get('_token'))) {
            $entityManager->remove($privateCoaching);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_private_index', [], Response::HTTP_SEE_OTHER);
    }
}
