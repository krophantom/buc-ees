<?php

namespace App\DataFixtures;

use App\Entity\Vendor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpKernel\HttpCache\Store;

class VendorFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $vendor = new Vendor();

        $vendor->setCategory('Fashion Accessories');
        $vendor->setAddrLine1('11200 W. Broadway');
        $vendor->setAddrLine2('Suite 2332');
        $vendor->setAddrCityStateZip('Pearland, TX 77584');

        $manager->persist($vendor);

        $manager->flush();
    }
}
