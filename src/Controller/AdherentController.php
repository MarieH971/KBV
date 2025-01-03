<?php

namespace App\Controller;


use App\Entity\Adherent;
use App\Form\AdherentType;
use App\Repository\AdherentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdherentController extends AbstractController
{
    #[Route('/adherent', name: 'app_adherent')]
    public function index(AdherentRepository $adherentRepository): Response
    {
        $adherents = $adherentRepository->findAll();
        return $this->render('adherent/index.html.twig', [
            'adherents' => $adherents,
        ]);
    }

    // Afficher un adhérent spécifique
    #[Route('/adherent/{id}', name: 'adherent_show')]
    public function show(Adherent $adherent): Response
    {
        return $this->render('adherent/show.html.twig', [
            'adherent' => $adherent,
        ]);
    }

    // Inscription d'un nouvel adhérent
    #[Route('/inscription/adherent', name: 'inscription_adherent')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adherent = new Adherent();
        $form = $this->createForm(AdherentType::class, $adherent); // Formulaire d'inscription

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adherent->setDateInscription(new \DateTime());
            $adherent->setDateExpirationLicence(new \DateTime('+1 year')); // Licence valable 1 an à partir de la date d'inscription
            $entityManager->persist($adherent);
            $entityManager->flush();

            foreach ($form->getErrors(true) as $error) {
                dump($error->getMessage());
            }

            // Message de succès et redirection vers la liste des adhérents
            $this->addFlash('success', 'Inscription effectuée avec succès!');
            return $this->redirectToRoute('app_adherent');
        }

        return $this->render('adherent/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // Créer un nouvel adhérent
    // #[Route('/adherent/new', name: 'adherent_create')]
    // public function create(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $adherent = new Adherent();
    //     $form = $this->createForm(AdherentType::class, $adherent); // Formulaire de création

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $adherent->setDateInscription(new \DateTime()); // La date d'inscription est la date actuelle
    //         $adherent->setDateExpirationLicence(new \DateTime('+1 year')); // Exemple : licence valable 1 an
    //         $entityManager->persist($adherent);
    //         $entityManager->flush();

    //         // Message de succès et redirection vers la liste des adhérents
    //         $this->addFlash('success', 'Adhérent créé avec succès!');
    //         return $this->redirectToRoute('app_adherent');
    //     }

    //     return $this->render('adherent/create.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }

    // Modifier un adhérent existant
    #[Route('/adherent/{id}/edit', name: 'adherent_edit')]
    public function edit(Request $request, Adherent $adherent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdherentType::class, $adherent); // Formulaire de modification
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush(); // Enregistrer les modifications
            $this->addFlash('success', 'Adhérent modifié avec succès!');
            return $this->redirectToRoute('adherent_show', ['id' => $adherent->getId()]);
        }

        return $this->render('adherent/edit.html.twig', [
            'form' => $form->createView(),
            'adherent' => $adherent,
        ]);
    }

    // Supprimer un adhérent
    #[Route('/adherent/{id}/delete', name: 'adherent_delete')]
    public function delete(Request $request, Adherent $adherent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $adherent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($adherent);
            $entityManager->flush();
            $this->addFlash('success', 'Adhérent supprimé avec succès!');
        }

        return $this->redirectToRoute('app_adherent');
    }
}
