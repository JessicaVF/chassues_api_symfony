<?php

namespace App\Controller;

use App\Entity\Chaussure;
use App\Entity\Lacet;
use App\Repository\ChaussureRepository;
use App\Repository\LacetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class LacetController extends AbstractController
{
    /**
     * @Route("/lacet", name="lacet")
     */
    public function index(LacetRepository $repository): Response
    {
        $lacets= $repository->findAll();
        return $this->json($lacets, 200, [], ['groups' => 'chaussuresIndex']);
    }
    /**
     * @Route("/lacet/create/{id}", name="lacet_create", requirements={"id"="\d+"}, methods={"POST"})
     */
    public function create(Chaussure $chaussure, Request $request, SerializerInterface $serializer, EntityManagerInterface $manager): Response
    {

        $myRequest = $request->getContent();

        $lacet = $serializer->deserialize($myRequest, Lacet::class, 'json');

        $lacet->setChaussure($chaussure);

        $manager->persist($lacet);

        $manager->flush();

        return $this->json($lacet, 200, [], ['groups' => 'lacetCreate']);
    }
}
