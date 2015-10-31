<?php
/**
 * Created by PhpStorm.
 * User: sebastien
 * Date: 30/10/15
 * Time: 21:11
 */

namespace SC\SebastienCaumesBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SC\SebastienCaumesBundle\Entity\Tags;

class LoadTagsData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $php = new Tags();
        $php->setCategorie('language');
        $php->setName('php');

        $java = new Tags();
        $java->setCategorie('language');
        $java->setName('Java');

        $css = new Tags();
        $css->setCategorie('language');
        $css->setName('css');

        $html = new Tags();
        $html->setCategorie('language');
        $html->setName('html');

        $jquery = new Tags();
        $jquery->setCategorie('language');
        $jquery->setName('jQuery');

        $symfony = new Tags();
        $symfony->setCategorie('framework');
        $symfony->setName('Symfony');

        $android = new Tags();
        $android->setCategorie('os');
        $android->setName('Android');

        $libgdx = new Tags();
        $libgdx->setCategorie('framework');
        $libgdx->setName('LibGDX');

        $manager->persist($php);
        $manager->persist($java);
        $manager->persist($css);
        $manager->persist($html);
        $manager->persist($jquery);
        $manager->persist($symfony);
        $manager->persist($android);
        $manager->persist($libgdx);

        $manager->flush();
    }
}