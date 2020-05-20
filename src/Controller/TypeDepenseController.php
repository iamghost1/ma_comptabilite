<?php

namespace App\Controller;


use App\Entity\TypeDepense;
use App\Form\TypeDepenseType;
use App\Repository\TypeDepenseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeDepenseController extends AbstractController{

    /**
     * @var TypeDepenseRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(TypeDepenseRepository $repository, EntityManagerInterface $em)
    {
        $this->repository=$repository;
        $this->em=$em;
    }
    /**
     * @return Response
     * @Route("/TypeDepense", name="typedepense.index")
     */
    public function index(){
        $typedepense = $this->repository->findAll();
        return $this->render('typedepense/index.html.twig',['typedepense'=>$typedepense]);
    }


}