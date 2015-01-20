<?php
namespace News\RestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use News\RestBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $article->setCategory($this->getReference('category-1'));
        $article->setTitle('Sharing Objects between Fixtures - 1');
        $article->setThumbnail('p-1.jpg');
        $article->setSumary('Doctrine fixtures for Symfony are maintained in the DoctrineFixturesBundle. The bundle uses external Doctrine Data Fixtures library.');
        $article->setContent('ixtures are used to load a controlled set of data into a database. This data can be used for testing or could be the initial data required for the application to run smoothly. Symfony2 has no built in way to manage fixtures but Doctrine2 has a library to help you write fixtures for the Doctrine ORM or ODM.');
        $manager->persist($article);

        $article = new Article();
        $article->setCategory($this->getReference('category-1'));
        $article->setTitle('Sharing Objects between Fixtures - 2');
        $article->setThumbnail('p-2.jpg');
        $article->setSumary('Doctrine fixtures for Symfony are maintained in the DoctrineFixturesBundle. The bundle uses external Doctrine Data Fixtures library.');
        $article->setContent('ixtures are used to load a controlled set of data into a database. This data can be used for testing or could be the initial data required for the application to run smoothly. Symfony2 has no built in way to manage fixtures but Doctrine2 has a library to help you write fixtures for the Doctrine ORM or ODM.');
        $manager->persist($article);

        $article = new Article();
        $article->setCategory($this->getReference('category-1'));
        $article->setTitle('Sharing Objects between Fixtures - 3');
        $article->setThumbnail('p-3.jpg');
        $article->setSumary('Doctrine fixtures for Symfony are maintained in the DoctrineFixturesBundle. The bundle uses external Doctrine Data Fixtures library.');
        $article->setContent('ixtures are used to load a controlled set of data into a database. This data can be used for testing or could be the initial data required for the application to run smoothly. Symfony2 has no built in way to manage fixtures but Doctrine2 has a library to help you write fixtures for the Doctrine ORM or ODM.');
        $manager->persist($article);

        $article = new Article();
        $article->setCategory($this->getReference('category-1'));
        $article->setTitle('Sharing Objects between Fixtures - 4');
        $article->setThumbnail('p-4.jpg');
        $article->setSumary('Doctrine fixtures for Symfony are maintained in the DoctrineFixturesBundle. The bundle uses external Doctrine Data Fixtures library.');
        $article->setContent('ixtures are used to load a controlled set of data into a database. This data can be used for testing or could be the initial data required for the application to run smoothly. Symfony2 has no built in way to manage fixtures but Doctrine2 has a library to help you write fixtures for the Doctrine ORM or ODM.');
        $manager->persist($article);

        $article = new Article();
        $article->setCategory($this->getReference('category-1'));
        $article->setTitle('Sharing Objects between Fixtures - 5');
        $article->setThumbnail('p-5.jpg');
        $article->setSumary('Doctrine fixtures for Symfony are maintained in the DoctrineFixturesBundle. The bundle uses external Doctrine Data Fixtures library.');
        $article->setContent('ixtures are used to load a controlled set of data into a database. This data can be used for testing or could be the initial data required for the application to run smoothly. Symfony2 has no built in way to manage fixtures but Doctrine2 has a library to help you write fixtures for the Doctrine ORM or ODM.');
        $manager->persist($article);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}