<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CryptoService;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CryptoController extends AbstractController
{
    public function __construct(
        private readonly CryptoService $cryptoService,
        private readonly ValidatorInterface $validator
    ) {
    }

    #[Route('/crypto', name: 'crypto')]
    public function index(): Response
    {
        $bitcoinPriceDto = $this->cryptoService->downloadCrypto();
        $errors = $this->validator->validate($bitcoinPriceDto);

        return $this->render('crypto/index.html.twig', [
            'bitcoinPriceDto' => $bitcoinPriceDto,
            "errors" => $errors
        ]);
    }
}
