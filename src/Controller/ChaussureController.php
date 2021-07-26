<?php

namespace App\Controller;

use App\Entity\Chaussure;
use App\Repository\ChaussureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ChaussureController extends AbstractController
{
    /**
     * @Route("/chaussure", name="chaussure")
     */
    public function index(ChaussureRepository $repository, SerializerInterface $serializer): Response
    {
        $chaussures = $repository->findAll();
//
        return $this->json($chaussures, 200, [], ['groups' => 'chaussuresIndex']);

    }
    /**
     * @Route("/chaussure/create", name="create_chaussure", methods={"POST"})
     */
    public function create(Request $request, SerializerInterface $serializer, EntityManagerInterface $manager):Response
    {

        $myRequest = $request->getContent();

        $chaussure = $serializer->deserialize($myRequest, Chaussure::class, 'json');

        $manager->persist($chaussure);

        $manager->flush();

        return  $this->json($chaussure);
    }
}
