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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    private function getImagesDir(): string
    {
        return $this->getParameter('kernel.project_dir').'/public/images/';
    }

    #[Route('/experience', name: 'experience')]
    public function experience(ExperienceRepository $repository): Response
    {
        $data['experiencesList'] = $repository->getExperiencesWithCompany();
        
        return $this->render(
            'experience.html.twig',
            ['page' => 'experience', 'data' => $data]
        );
    }

    #[Route('/competences', name: 'competences')]
    public function competences(SkillRepository $skillRepository, SkillTypeRepository $skillTypeRepository): Response
    {
        $data['skillTypesList'] = $skillTypeRepository->getSkillTypes();
        $data['skillsList'] = $skillRepository->getSkillsOrderByType();

        return $this->render(
            'competences.html.twig',
            ['page' => 'competences', 'data' => $data]
        );
    }

    #[Route('/formation', name: 'formation')]
    public function formation(EducationRepository $educationRepository): Response
    {
        $data['educationsList'] = $educationRepository->getEducationsWithSchool();

        return $this->render(
            'formation.html.twig',
            ['page' => 'formation', 'data' => $data]
        );
    }

    #[Route('/projets', name: 'projets')]
    public function projets(ProjectRepository $projectRepository): Response
    {
        $data['projectsList'] = $projectRepository->getProjects();

        return $this->render(
            'projets.html.twig',
            ['page' => 'projets', 'data' => $data]
        );
    }

    #[Route('/arcade', name: 'arcade')]
    public function arcade(ArcadeTypeRepository $arcadeTypeRepository): Response
    {
        $arcadeTypesList = $arcadeTypeRepository->getArcadeTypes();
        $arcadeList = [];

      /*  foreach ($arcadeTypesList as $type) {
            $arcadeList[$type->getLabel()] = [];

            $finder = new Finder();
            $finder->in($this->getImagesDir().'arcade/'.$type->getLabel());
            foreach ($finder as $file) {
                $arcadeList[$type->getLabel()][] = $file->getFileName();
            }
        }*/

        $data['arcadeTypesList'] = $arcadeTypesList;
        $data['arcadeList'] = $arcadeList;

        return $this->render(
            'arcade.html.twig',
            ['page' => 'arcade', 'data' => $data]
        );
    }

    #[Route('/creations', name: 'creations')]
    public function creations(CreationTypeRepository $creationTypeRepository): Response
    {
        $creationTypesList = $creationTypeRepository->getCreationTypes();

        $creationsList = [];
        /*foreach ($creationTypesList as $type) {
            $creationsList[$type->getLabel()] = [];

            $finder = new Finder();
            $finder->in($this->getImagesDir().'creations/'.$type->getLabel());
            foreach ($finder as $file) {
                $creationsList[$type->getLabel()][] = $file->getFileName();
            }
            shuffle($creationsList[$type->getLabel()]);
        }*/

        $data['creationTypesList'] = $creationTypesList;
        $data['creationsList'] = $creationsList;

        return $this->render(
            'creations.html.twig',
            ['page' => 'creations', 'data' => $data]
        );
    }

    #[Route('/photos', name: 'photos')]
    public function photos(PhotoTypeRepository $photoTypeRepository): Response
    {
        $photoTypesList = $photoTypeRepository->getPhotoTypes();

        $photosList = [];
        /*foreach ($photoTypesList as $type) {
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
        }*/

        $data['photoTypesList'] = $photoTypesList;
        $data['photosList'] = $photosList;

        return $this->render(
            'photos.html.twig',
            ['page' => 'photos', 'data' => $data]
        );
    }
}