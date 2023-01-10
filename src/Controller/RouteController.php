<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class RouteController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): JsonResponse
    {
        return new JsonResponse([
           'action' => 'index',
           'time' => time()
        ]);
    }
}