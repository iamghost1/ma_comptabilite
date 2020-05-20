<?php

namespace App\Controller;

use App\Entity\Depenses;
use App\Entity\TypeDepense;
use App\Form\DepenseType;
use App\Form\TypeDepenseType;
use App\Repository\DepensesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepenseController extends AbstractController{

    /**
     * @var DepensesRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(DepensesRepository $repository, EntityManagerInterface $em)
    {
        $this->repository=$repository;
        $this->em=$em;
    }

    /**
     * @return Response
     * @Route("/Depense", name="depense.index")
     */
    public function index(){
        $depense = $this->repository->findAll();
        return $this->render('depense/index.html.twig',['depense'=>$depense]);
    }

    /**
     * @Route("/Depense/create", name="depense.new")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function new(Request $request)
    {
        $depense = new Depenses();
        $form = $this->createForm(DepenseType::class, $depense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($depense);
            $this->em->flush();
            $this->addFlash('success','depense crée avec succès');
            return $this->redirectToRoute('depense.index');
        }
        return $this->render('depense/new.html.twig', [
            'depense' => $depense,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/Depense/edit/{id}", name="depense.edit", methods={"GET|POST"})
     * @param Depenses $depenses
     * @param Request $request
     * @return RedirectResponse|Response
     */

    public function edit(Depenses $depenses, Request $request)
    {
        $form = $this->createForm(DepenseType::class, $depenses);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success','depense modifié avec succès');
            return $this->redirectToRoute('depense.index');
        }
        return $this->render('depense/edit.html.twig',[
            'depense'=>$depenses, 'form' =>$form->createView()
        ]);
    }

    /**
     * @Route("/Depense/{id}", name="depense.delete", methods="DELETE")
     * @param Depenses $depenses
     * @param Request $request
     * @return RedirectResponse
     */

    public function delete(Depenses $depenses, Request $request)
    {
        if ($this->isCsrfTokenValid($depenses->getId(), $request->get('_token')))
        {
            $this->em->remove($depenses);
            $this->em->flush();
            $this->addFlash('success','depense supprimé avec succès');
        }
        return $this->redirectToRoute('depense.index');
    }
}