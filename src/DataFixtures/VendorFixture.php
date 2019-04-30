<?php

namespace App\DataFixtures;

use App\Entity\Vendor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use League\Csv\Reader;
use League\Csv\Statement;

class VendorFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $addr = [
            'Austin' => [
                'addr_1' => '500  W.  2nd  St.',
                'addr_2' => 'FL 19, Suite #207',
                'citystatezip' => 'Austin, TX 78701'
            ],
            'Pearland' => [
                'addr_1' => '11200 W. Broadway',
                'addr_2' => 'Suite 2332',
                'citystatezip' => 'Pearland, TX 77584'
            ],
            'LakeJackson' => [
                'addr_1' => '327 FM 2004',
                'addr_2' => '',
                'citystatezip' => 'Lake Jackson, TX 77566'
            ]
        ];

        $csv = Reader::createFromPath('%kernel.root_dir%/../assets/data/vendors.csv');
        $csv->setHeaderOffset(0);

        $stmt = new Statement();

        $records = $stmt->process($csv);

        foreach ($records as $record) {

            $vendor = new Vendor();

            $full_addr = $addr[$record['city']];

            $vendor->setCategory($record['category']);
            $vendor->setAddrLine1($full_addr['addr_1']);
            $vendor->setAddrLine2($full_addr['addr_2']);
            $vendor->setAddrCityStateZip($full_addr['citystatezip']);

            $manager->persist($vendor);

            $manager->flush();
        }
    }
}
