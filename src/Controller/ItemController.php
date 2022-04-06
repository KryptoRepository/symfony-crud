<?php

namespace App\Controller;

use App\Entity\Item;
use App\Repository\ItemRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends AbstractController
{
    public function index(ManagerRegistry $doctrine): Response
    {
        return $this->render('item/index.html.twig', [
            'controller_name' => 'ItemController',
        ]);
    }

    public function items(ManagerRegistry $doctrine):Response {
        $items = $doctrine->getRepository(Item::class)->findAll();
        return $this->json($doctrine->getRepository(Item::class)->findAll());
    }

    public function getCreateForm()
    {

    }

    public function create(Request $request)
    {

    }

    public function getEditForm(ManagerRegistry $doctrine, int $id)
    {

    }

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
