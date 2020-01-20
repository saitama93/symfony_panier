<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * Permet d'afficher le panier
     * 
     * @Route("/panier", name="cart_index")
     * 
     * @param CartService $cartService
     * 
     * @return Response
     */
    public function index(CartService $cartService)
    {

        return $this->render('cart/index.html.twig', [
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }

    /**
     * Permet l'ajout d'un produit au panier
     * 
     * @Route("/panier/ajout/{id}", name="card_add")
     *
     * @param integer $id
     * @param CartService $cartService
     * 
     * @return Response
     */
    public function add($id, CartService $cartService)
    {
        $cartService->add($id);

        // Pense au message flash
        return $this->redirectToRoute('cart_index');
    }

    /**
     * Permet de supprimer un produit du panier
     * 
     * @Route("/panier/supp/{id}", name="cart_remove")
     *
     * @param integer $id
     * @param CartService $cartService
     * 
     * @return Response
     */
    public function remove($id, CartService $cartService)
    {
        $cartService->remove($id);

        return $this->redirectToRoute('cart_index');
    }
}
