<?php

namespace App\Controller;

use App\Entity\Specimen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    #[Route('/specimen/', name: 'app_specimen', methods:"GET")]
    public function list_specimen(
        EntityManagerInterface $entityManager
    ){
        $queryBuilder = $entityManager->createQueryBuilder();
        $queryBuilder->select('s')
            ->from('App\Entity\Specimen', 's');
        $specimens = $queryBuilder->getQuery()->getResult();

        return $this->render('dashboard/specimen_list.html.twig', [
            "specimens" =>  $specimens
        ]);

    }

    #[Route('/specimen/insert', name: 'app_specimen_insert', methods:"POST")]
    public function insert_specimen(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        // Only as an example, should be reorganized

        $p = $request->request;
        $image = $p->get("image"); // in the validation part
        $image = $image != null ? $image : ""; // need to recheck code from previous programs
        // The image needed to be loaded separately

        $entity = new Specimen();
        $entity->setLocation($p->get("location"));
        $entity->setCollectorName($p->get("collectorName"));
        $entity->setTemperature($p->get("temperature"));
        $entity->setImage($image);
        $entity->setSampleId($p->get("sampleId"));
        $entityManager->persist($entity);
        $entityManager->flush();

        /*
        $entity->setTemperature($p["temperature"]);
        $entity->setCollectorName($p["collectorName"]);
        $entity->setImage($p["image"]);
        $entity->setSampleId($p["sampleId"]);
        */

        // The validation should be in the BL layer
        //$entityManager->persist($entity);
        //$entityManager->flush();

        return new Response('Inserted');
    }
}
