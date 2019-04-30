<?php

namespace App\Controller;

use App\Entity\Vendor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class VendorController extends AbstractController
{

    public function vendor(): Response
    {

        $repository = $this->getDoctrine()->getRepository(Vendor::class);

        $vendors = $repository->findAll();

        return $this->render('vendors.html.twig', ['vendors' => $vendors]);


    }

    public function vendorApi(int $id = 0): JsonResponse
    {
        $repository = $this->getDoctrine()->getRepository(Vendor::class);

        $vendor = $repository->find($id);

        if (!$vendor) {
            return new JsonResponse([
                'vendor' => [],
                'success' => false,
            ]);
        }

        return new JsonResponse([
            'vendor' => [
                'category' => $vendor->getCategory(),
                'addr_line_1' => $vendor->getAddrLine1(),
                'addr_line_2' => $vendor->getAddrLine2(),
                'addr_city_state_zip' => $vendor->getAddrCityStateZip()
            ],
            'success' => true]);
    }

}