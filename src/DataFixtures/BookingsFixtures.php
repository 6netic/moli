<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Bookings;

class BookingsFixtures extends Fixture {
    public function loadIt(ObjectManager $manager) {
        for($i = 1; $i <= 12; $i++) {
        	$booking = new Bookings();
        	$booking->setDestination('Gare Saint-Lazare')
        		->setDepartureDate(new \Datetime('2019-02-25'))
        		->setDepartureTime('15:20')
        		->setSharing('Oui')
        		->setFirstname('Donald')
        		->setLastname('Trump')
        		->setEmail('donald.trump@free.fr');
        	$manager->persist($booking);
        }
        $manager->flush();
    }

    public function load(ObjectManager $manager) {
        $booking1 = new Bookings();
        $booking1->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Agnes')
                 ->setLastname('Lafarge')
                 ->setEmail('agnes.lafarge@antalise.com')
        ;
        $manager->persist($booking1);

        $booking2 = new Bookings();
        $booking2->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-25'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Olivier')
                 ->setLastname('Pourcel')
                 ->setEmail('olivier.pourcel@polyarte.com')
        ;
        $manager->persist($booking2);

        $booking3 = new Bookings();
        $booking3->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Aimé')
                 ->setLastname('Sayarath')
                 ->setEmail('aime.sayarath@polyarte.com')
        ;
        $manager->persist($booking3);

        $booking4 = new Bookings();
        $booking4->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Andrew')
                 ->setLastname('Jordan')
                 ->setEmail('andrew.jordan@antalise.com')
        ;
        $manager->persist($booking4);

        $booking5 = new Bookings();
        $booking5->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-25'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Benjamin')
                 ->setLastname('Cottaz')
                 ->setEmail('benjamin.cottaz@antalise.com')
        ;
        $manager->persist($booking5);

        $booking6 = new Bookings();
        $booking6->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-25'))
                 ->setDepartureTime('03:00')
                 ->setSharing('Oui')
                 ->setFirstname('Anne')
                 ->setLastname('Panis')
                 ->setEmail('anne.panis@antalise.com')
        ;
        $manager->persist($booking6);

        $booking7 = new Bookings();
        $booking7->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Ayoub')
                 ->setLastname('Zassi')
                 ->setEmail('ayoub.zassi@antalox.com')
        ;
        $manager->persist($booking7);

        $booking8 = new Bookings();
        $booking8->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-25'))
                 ->setDepartureTime('03:00')
                 ->setSharing('Oui')
                 ->setFirstname('Bertille')
                 ->setLastname('Bachelier')
                 ->setEmail('bertille.bachelier@protui.com')
        ;
        $manager->persist($booking8);

        $booking9 = new Bookings();
        $booking9->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Catherine')
                 ->setLastname('Devinaux')
                 ->setEmail('cat.devine@polyarte.com')
        ;
        $manager->persist($booking9);

        $booking10 = new Bookings();
        $booking10->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Céline')
                 ->setLastname('Dirou')
                 ->setEmail('celine.dirou@antalise.com')
        ;
        $manager->persist($booking10);

        $booking11 = new Bookings();
        $booking11->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Andrew')
                 ->setLastname('Jordan')
                 ->setEmail('andrew.jordan@antalise.com')
        ;
        $manager->persist($booking11);

        $booking12 = new Bookings();
        $booking12->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-25'))
                 ->setDepartureTime('03:00')
                 ->setSharing('Oui')
                 ->setFirstname('Benjamin')
                 ->setLastname('Cottaz')
                 ->setEmail('benjamin.cottaz@antalise.com')
        ;
        $manager->persist($booking12);

        $booking13 = new Bookings();
        $booking13->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Anne')
                 ->setLastname('Panis')
                 ->setEmail('anne.panis@antalise.com')
        ;
        $manager->persist($booking13);

        $booking13 = new Bookings();
        $booking13->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-25'))
                 ->setDepartureTime('03:00')
                 ->setSharing('Oui')
                 ->setFirstname('Ayoub')
                 ->setLastname('Zassi')
                 ->setEmail('ayoub.zassi@antalox.com')
        ;
        $manager->persist($booking13);

        $booking14 = new Bookings();
        $booking14->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Agnes')
                 ->setLastname('Lafarge')
                 ->setEmail('agnes.lafarge@antalise.com')
        ;
        $manager->persist($booking14);

        $booking15 = new Bookings();
        $booking15->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Olivier')
                 ->setLastname('Pourcel')
                 ->setEmail('olivier.pourcel@polyarte.com')
        ;
        $manager->persist($booking15);

        $booking16 = new Bookings();
        $booking16->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('20:40')
                 ->setSharing('Oui')
                 ->setFirstname('Djawed')
                 ->setLastname('Aberkane')
                 ->setEmail('djawed.aberkane@antalane.com')
        ;
        $manager->persist($booking16);

        $booking17 = new Bookings();
        $booking17->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Elsa')
                 ->setLastname('Fanelli')
                 ->setEmail('elsa.fanelli@antalise.com')
        ;
        $manager->persist($booking17);

        $booking18 = new Bookings();
        $booking18->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('20:40')
                 ->setSharing('Oui')
                 ->setFirstname('Benjamin')
                 ->setLastname('Cottaz')
                 ->setEmail('benjamin.cottaz@antalise.com')
        ;
        $manager->persist($booking18);

        $booking19 = new Bookings();
        $booking19->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Elsa')
                 ->setLastname('Fanelli')
                 ->setEmail('elsa.fanelli@antalisec.com')
        ;
        $manager->persist($booking19);

        $booking20 = new Bookings();
        $booking20->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('20:40')
                 ->setSharing('Oui')
                 ->setFirstname('Hélène')
                 ->setLastname('Bejjani')
                 ->setEmail('helene.bejjani@arjomix.com')
        ;
        $manager->persist($booking20);

        $booking21 = new Bookings();
        $booking21->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-25'))
                 ->setDepartureTime('14:40')
                 ->setSharing('Oui')
                 ->setFirstname('Pascal')
                 ->setLastname('Cuisset')
                 ->setEmail('pascal.cuisset@antalise.com')
        ;
        $manager->persist($booking21);

        $booking22 = new Bookings();
        $booking22->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-25'))
                 ->setDepartureTime('14:40')
                 ->setSharing('Oui')
                 ->setFirstname('Olivier')
                 ->setLastname('Pourcel')
                 ->setEmail('olivier.pourcel@polyarte.com')
        ;
        $manager->persist($booking22);

        $booking23 = new Bookings();
        $booking23->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Valérie')
                 ->setLastname('Duflo')
                 ->setEmail('valerie.duflo@polyartrite.com')
        ;
        $manager->persist($booking23);

        $booking24 = new Bookings();
        $booking24->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-25'))
                 ->setDepartureTime('08:40')
                 ->setSharing('Oui')
                 ->setFirstname('Yves')
                 ->setLastname('Guezel')
                 ->setEmail('yves.guezel@antalise.com')
        ;
        $manager->persist($booking24);

        $booking25 = new Bookings();
        $booking25->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Xavier')
                 ->setLastname('Jouvet')
                 ->setEmail('xavier.jouvet@cantal.com')
        ;
        $manager->persist($booking25);

        $booking26 = new Bookings();
        $booking26->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Wyem')
                 ->setLastname('Oueslati')
                 ->setEmail('wyem.oueslati@antalise.com')
        ;
        $manager->persist($booking26);

        $booking27 = new Bookings();
        $booking27->setDestination('Gare de Lyon')
                 ->setDepartureDate(new \Datetime('2019-02-24'))
                 ->setDepartureTime('14:00')
                 ->setSharing('Oui')
                 ->setFirstname('Virginie')
                 ->setLastname('Maillet')
                 ->setEmail('virginie.maillet@antalox.com')
        ;
        $manager->persist($booking27);
    
        $manager->flush();
    }    
}
