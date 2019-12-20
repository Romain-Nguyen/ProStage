<?php

namespace App\Controller;
use App\Entity\Entreprise;
use App\Entity\Formation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ControleurController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('controleur/index.html.twig', [
          'titre'=>'le titre de ma page d\'accueil',
        ]);
    }

	/**
     * @Route("/entreprises", name="entreprises")
     */
    public function entreprises()
    {
        $listeEntreprise = $this -> getDoctrine() -> getRepository(Entreprise::class) -> findAll();
        return $this->render('controleur/entreprises.html.twig',[
          "listeEntreprise" => $listeEntreprise
        ]);
    }

	/**
     * @Route("/formations", name="formations")
     */
    public function formations()
    {
        $listeFormation = $this -> getDoctrine() -> getRepository(Formation::class) -> findAll();
        return $this->render('controleur/formations.html.twig', [
          "listeFormation" => $listeFormation
        ]);
    }

	/**
     * @Route("/stages/{id}", name="stages")
     */
    public function stages(int $id)
    {
        return $this->render('controleur/stages.html.twig', ['id' => $id]);
    }
}
