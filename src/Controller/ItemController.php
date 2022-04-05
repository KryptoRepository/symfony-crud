<?php

namespace App\Controller;

use App\Entity\Item;
use App\Repository\ItemRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): Response
    {
        return $this->render('item/index.html.twig', [
            'controller_name' => 'ItemController',
        ]);
    }

    #[Route('/items', name: 'items_list', methods: ['GET'])]
    public function items(ManagerRegistry $doctrine):Response {
        $items = $doctrine->getRepository(Item::class)->findAll();
        return $this->json($doctrine->getRepository(Item::class)->findAll());
    }

    public function getCreateForm()
    {

    }

    public function create()
    {

    }

    public function getEditForm(ManagerRegistry $doctrine, int $id)
    {

    }

    #[Route('/edit/{id}', name: 'item_put')]
    public function update(ManagerRegistry $doctrine, int $id): Response
    {
//        $item = $repository->find($id);
        $item = $doctrine->getRepository(Item::class)->find($id);

        dump($item);
        $resp = new Response();
        $resp->setContent(var_export($item, true));
        return $resp;
    }


}
