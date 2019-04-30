<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Stores;
use League\Csv\Reader;
use League\Csv\Statement;

class StoresFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $csv = Reader::createFromPath('%kernel.root_dir%/../assets/data/stores.csv');
        $csv->setHeaderOffset(0);

        $stmt = new Statement();

        $records = $stmt->process($csv);

        foreach ($records as $record) {

            $store = new Stores();

            $store->setCity($record['city']);
            $store->setNumber($record['sitenum']);
            $store->setAddress($record['address']);
            $store->setDef($record['def']);
            $store->setFlagship($record['flagship']);
            $store->setCarWash($record['car_wash']);
            $store->setEthanolFree($record['ethfree_store']);

            $manager->persist($store);
        }

        $manager->flush();
    }
}
