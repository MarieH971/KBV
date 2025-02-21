<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    // Afficher un adhérent spécifique
    #[Route('/user/{id}', name: 'user_show')]
    public function show(user $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    // Inscription d'un nouvel adhérent
    #[Route('/inscription/user', name: 'inscription_user')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new user();
        $form = $this->createForm(userType::class, $user); // Formulaire d'inscription

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRegistrationDate(new \DateTime());
            $user->setLicenseExpirationDate(new \DateTime('+1 year')); // Licence valable 1 an à partir de la date d'inscription
            $entityManager->persist($user);
            $entityManager->flush();

            foreach ($form->getErrors(true) as $error) {
                dump($error->getMessage());
            }

            // Message de succès et redirection vers la liste des adhérents
            $this->addFlash('success', 'Inscription effectuée avec succès!');
            return $this->redirectToRoute('app_user');
        }

        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // Créer un nouvel adhérent
    // #[Route('/user/new', name: 'user_create')]
    // public function create(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $user = new user();
    //     $form = $this->createForm(userType::class, $user); // Formulaire de création

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $user->setregistrationDate(new \DateTime()); // La date d'inscription est la date actuelle
    //         $user->setDateExpirationLicence(new \DateTime('+1 year')); // Exemple : licence valable 1 an
    //         $entityManager->persist($user);
    //         $entityManager->flush();

    //         // Message de succès et redirection vers la liste des adhérents
    //         $this->addFlash('success', 'Adhérent créé avec succès!');
    //         return $this->redirectToRoute('app_user');
    //     }

    //     return $this->render('user/create.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }

    // Modifier un adhérent existant
    #[Route('/user/{id}/edit', name: 'user_edit')]
    public function edit(Request $request, user $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(userType::class, $user); // Formulaire de modification
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush(); // Enregistrer les modifications
            $this->addFlash('success', 'Adhérent modifié avec succès!');
            return $this->redirectToRoute('user_show', ['id' => $user->getId()]);
        }

        return $this->render('user/edit.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    // Supprimer un adhérent
    #[Route('/user/{id}/delete', name: 'user_delete')]
    public function delete(Request $request, user $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
            $this->addFlash('success', 'Adhérent supprimé avec succès!');
        }

        return $this->redirectToRoute('app_user');
    }
}