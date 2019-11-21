<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ControleurController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return new Response(" <h1> Bienvenue sur la page d'accueil de Prostages </h1> " );
    }
	
	/**
     * @Route("/entreprises", name="entreprises")
     */
    public function entreprises()
    {
        return new Response(" <h1> Cette page affichera la liste des entreprises proposant un stage <h1> " );
    }
	
	/**
     * @Route("/formations", name="formations")
     */
    public function formations()
    {
        return new Response(" <h1> Cette page affichera la liste des formations de l'IUT <h1> " );
    }
	
	/**
     * @Route("/stages/{id}", name="stages")
     */
    public function stages(int $id)
    {
        return new Response(" <h1> Cette page affichera le descriptif du stage ayant pour identifiant $id <h1> " );
    }
}
