<?php

/**
 * This file is part of Portfolio project.
 * (c) Caroline Noyer <hello@carolinenoyer.info>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Controller;

use App\Repository\ArcadeTypeRepository;
use App\Repository\CreationTypeRepository;
use App\Repository\EducationRepository;
use App\Repository\ExperienceRepository;
use App\Repository\PhotoTypeRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use App\Repository\SkillTypeRepository;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends IndexController
{
    #[Route('/experience', name: 'experience')]
    public function experience(ExperienceRepository $repository): Response
    {
        $data['experiencesList'] = $repository->getExperiencesWithCompany();

        return $this->render(
            'experience.html.twig', [
                'page' => 'experience',
                'data' => $data,
                'canonical_url' => $this->getCanonicalUrl(),
                'meta_title' => 'Caroline Noyer — Expériences professionnelles',
                'meta_description' => "Mon expérience m'a permis d'acquérir les compétences en gestion de projet et d'équipe, en communiquant de façon claire.",
                'meta_keywords' => 'Product Owner,Squad Leader,Développeur back senior,Développeur fullstack',
            ]);
    }

    #[Route('/competences', name: 'competences')]
    public function competences(SkillRepository $skillRepository, SkillTypeRepository $skillTypeRepository): Response
    {
        $data['skillTypesList'] = $skillTypeRepository->getSkillTypes();
        $data['skillsList'] = $skillRepository->getSkillsOrderByType();

        return $this->render(
            'competences.html.twig', [
                'page' => 'competences',
                'data' => $data,
                'canonical_url' => $this->getCanonicalUrl(),
                'meta_title' => 'Caroline Noyer — Compétences',
                'meta_description' => "Mes compétences transverses couvrent la gestion de produit, la partie technique ainsi que l'expérience utilisateur.",
                'meta_keywords' => 'Product,Agile,Scrum,Figma,Notion,Jira,PHP,Symfony',
            ]);
    }

    #[Route('/formation', name: 'formation')]
    public function formation(EducationRepository $educationRepository): Response
    {
        $data['educationsList'] = $educationRepository->getEducationsWithSchool();

        return $this->render(
            'formation.html.twig', [
                'page' => 'formation',
                'data' => $data,
                'canonical_url' => $this->getCanonicalUrl(),
                'meta_title' => 'Caroline Noyer — Formations universitaires et professionnelles',
                'meta_description' => "De formation universitaire dans l'informatique, j'ai obtenu un Master 2 en stratégies et pilotage de projets.",
                'meta_keywords' => 'Formation The Design Crew,Master 2 Pro,Master 2 Recherche',
            ]);
    }

    #[Route('/projets', name: 'projets')]
    public function projets(ProjectRepository $projectRepository): Response
    {
        $data['projectsList'] = $projectRepository->getProjects();

        return $this->render(
            'projets.html.twig', [
                'page' => 'projets',
                'data' => $data,
                'canonical_url' => $this->getCanonicalUrl(),
                'meta_title' => 'Caroline Noyer — Projets réalisés',
                'meta_description' => "Ma passion pour le digital et le design m'ont conduit vers la création de sites Internet et de créations graphiques.",
                'meta_keywords' => 'Créations graphiques,Développement de sites web',
            ]);
    }

    #[Route('/arcade', name: 'arcade')]
    public function arcade(ArcadeTypeRepository $arcadeTypeRepository): Response
    {
        $arcadeTypesList = $arcadeTypeRepository->getArcadeTypes();
        $arcadeList = [];

        foreach ($arcadeTypesList as $type) {
            $arcadeList[$type->getLabel()] = [];

            $finder = new Finder();
            $finder->in($this->getImagesDir().'arcade/'.$type->getLabel());
            foreach ($finder as $file) {
                $arcadeList[$type->getLabel()][] = $file->getFileName();
            }
        }

        $data['arcadeTypesList'] = $arcadeTypesList;
        $data['arcadeList'] = $arcadeList;

        return $this->render(
            'arcade.html.twig', [
                'page' => 'arcade',
                'data' => $data,
                'canonical_url' => $this->getCanonicalUrl(),
                'meta_title' => "Caroline Noyer — Borne d'arcade",
                'meta_description' => "Mon intérêt pour les travaux manuels et les anciens jeux vidéos m'ont mené à créer moi-même ma borne d'arcade.",
                'meta_keywords' => "Borne,Arcade,Borne d'arcade,Nostalgie,Jeux vidéos,Nintendo,Super Mario",
            ]);
    }

    #[Route('/creations', name: 'creations')]
    public function creations(CreationTypeRepository $creationTypeRepository): Response
    {
        $creationTypesList = $creationTypeRepository->getCreationTypes();

        $creationsList = [];
        foreach ($creationTypesList as $type) {
            $creationsList[$type->getLabel()] = [];

            $finder = new Finder();
            $finder->in($this->getImagesDir().'creations/'.$type->getLabel());
            foreach ($finder as $file) {
                $creationsList[$type->getLabel()][] = $file->getFileName();
            }
            shuffle($creationsList[$type->getLabel()]);
        }

        $data['creationTypesList'] = $creationTypesList;
        $data['creationsList'] = $creationsList;

        return $this->render(
            'creations.html.twig', [
                'page' => 'creations',
                'data' => $data,
                'canonical_url' => $this->getCanonicalUrl(),
                'meta_title' => "Caroline Noyer — Créations d'argile",
                'meta_description' => "L'un de mes passe-temps réside dans le modelage d'argile, c'est un processus créatif qui permet une liberté d'expression.",
                'meta_keywords' => 'Argile,Modelage,Sculpture',
            ]);
    }

    #[Route('/photos', name: 'photos')]
    public function photos(PhotoTypeRepository $photoTypeRepository): Response
    {
        $photoTypesList = $photoTypeRepository->getPhotoTypes();

        $photosList = [];
        foreach ($photoTypesList as $type) {
            $photosList[$type->getLabel()] = [];

            $finder = new Finder();
            $finder->in($this->getImagesDir().'photos/'.$type->getLabel());
            foreach ($finder as $file) {
                $caption = explode('-', str_replace(['.JPG', '.jpg'], '', $file->getFileName()));
                $title = '';
                if (array_key_exists(1, $caption)) {
                    $title = str_replace('_', ' ', $caption[1]);
                }
                $photosList[$type->getLabel()][] = [
                    'filename' => $file->getFileName(),
                    'caption' => $title,
                ];
            }
            shuffle($photosList[$type->getLabel()]);
        }

        $data['photoTypesList'] = $photoTypesList;
        $data['photosList'] = $photosList;

        return $this->render(
            'photos.html.twig', [
                'page' => 'photos',
                'data' => $data,
                'canonical_url' => $this->getCanonicalUrl(),
                'meta_title' => 'Caroline Noyer — Photographies',
                'meta_description' => "La randonnée m'a permis d'expérimenter la photo en alliant la découverte de notre belle région.",
                'meta_keywords' => 'Photographies,Photos,Auvergne,Puy-de-Dôme,Randonnées',
            ]);
    }
}
