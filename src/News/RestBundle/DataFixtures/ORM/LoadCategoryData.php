<?php
namespace News\RestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use News\RestBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setTitle('Xa hoi');
        $manager->persist($category);
        $this->addReference('category-1', $category);

        $category = new Category();
        $category->setTitle('Chinh tri');
        $manager->persist($category);
        $this->addReference('category-2', $category);

        $category = new Category();
        $category->setTitle('CNTT-Vien Thong');
        $manager->persist($category);
        $this->addReference('category-3', $category);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}