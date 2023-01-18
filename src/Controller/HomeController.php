<?php

namespace App\Controller;

use App\Entity\Tasklist;
use App\Repository\TasklistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(TasklistRepository $tasklistRepository): Response
    {
        $data = $tasklistRepository->findAll();
        $pick = 0;
        
        return $this->render('home/index.twig', [
            'data' => $data,
            'pick' => $pick,
        ]);
    }

    #[Route('/sample', name: 'sample')]
    public function sample(ManagerRegistry $doctrine): Response
    {
        $content = new Tasklist;
        $content->setTask('Aufgabe');
        $content->setDate('2023-01-17');

        $em = $doctrine->getManager();
        $em->persist($content);
        $em->flush();

        return $this->redirect($this->generateUrl('home'));
    }

    #[Route('/pick/{id?}', name: 'pick')]
    public function pick(TasklistRepository $tasklistRepository, Request $request): Response
    {
        $data = $tasklistRepository->findAll();
        $pick = $request->get('id');
        
        return $this->render('home/index.twig', [
            'data' => $data,
            'pick' => $pick,
        ]);
    }

    #[Route('/done/{id?}', name: 'done')]
    public function done($id, TasklistRepository $tasklistRepository, ManagerRegistry $doctrine): Response
    {
        $modifyTask = $tasklistRepository->find($id);

        $em = $doctrine->getManager();
        $em->remove($modifyTask);
        $em->flush();

        return $this->redirect($this->generateUrl('home'));
    }

    #[Route('/edit', name: 'edit')]
    public function edit(TasklistRepository $tasklistRepository, ManagerRegistry $doctrine): Response
    {
        $modifyTask = $tasklistRepository->find($_POST['edit']);
        $modifyTask->setTask($_POST['newTitle']);

        $em = $doctrine->getManager();
        $em->persist($modifyTask);
        $em->flush();

        return $this->redirect($this->generateUrl('home'));
    }

    #[Route('/create', name: 'create')]
    public function create(ManagerRegistry $doctrine): Response
    {
        $create = new Tasklist;
        $create->setTask($_POST['newTask']);
        $date = (new \DateTimeImmuTable)->format('Y-m-d');
        $create->setDate($date);

        $em = $doctrine->getManager();
        $em->persist($create);
        $em->flush();

        return $this->redirect($this->generateUrl('home'));
    }
}
