<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    protected function getImagesDir(): string
    {
        return $this->getParameter('kernel.project_dir').'/public/images/';
    }

    protected function getCanonicalUrl(): string
    {
        return $this->getParameter('app.canonical_url');
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $data = ['nbYearsExperience' => (new \DateTime('2006-10-01'))->diff(new \DateTime('now'))->y];

        $data['mentalLandscape'] = [
            'rugby' => ['image' => 'images/home/rugby-asm.jpeg', 'alt' => 'Rugby', 'big' => false],
            'zen' => ['image' => 'images/home/lac-zen.jpg', 'alt' => 'Sérénité', 'big' => true],
            'chat' => ['image' => 'images/home/chat.jpg', 'alt' => 'Chat', 'big' => false],
            'auvergne' => ['image' => 'images/home/auvergne.jpg', 'alt' => 'Auvergne', 'big' => false],
            'equipe' => ['image' => 'images/home/equipe.jpg', 'alt' => 'Equipe', 'big' => false],
        ];

        return $this->render('home.html.twig', [
            'page' => 'home',
            'data' => $data,
            'canonical_url' => $this->getCanonicalUrl(),
            'meta_title' => 'Caroline Noyer — Product Owner',
            'meta_description' => 'Product owner depuis 4 ans sur des produits SaaS B2B, 
                compétences UX et 12 ans de background technique dans le développement web. 
                Dynamique, autonome et minutieuse.',
            'meta_keywords' => 'CV,Design,Product Owner,Développeur,Développeur web full-stack,PHP,Symfony',
        ]);
    }
}
