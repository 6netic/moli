<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Bookings;



class BookingController extends AbstractController {
   
    /**
     * @Route("/", name="booking")
     */
    public function index() {
        return $this->render('booking/index.html.twig');
    }

    /**
     * @Route("/lesdest", name="index_route")
     */
    public function home() {
    	return $this->render('booking/home.html.twig');
    }

    /**
     * @Route("/gares", name="gares_route")
     */
    public function gares() {
        return $this->render('booking/gares.html.twig');
    } 

    /**
     * @Route("/aeroports", name="aeroports_route")
     */
    public function aeroports() {
        return $this->render('booking/aeroports.html.twig');
    } 

    /**
     * @Route("/autre", 
     * name="autre_route")
     * 
     */
    public function autredest(Request $request) {
        $booking = new Bookings();
        $formulaire = $this->createFormBuilder($booking)
            ->add('destination', TextType::class, array('attr' => ['class' => 'selectHeure']))
            ->add('save', SubmitType::class, array('attr' => ['class' =>'noms_Passagers']))
            ->getForm();
        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $location = $formulaire->getData()->getDestination();
            return $this->redirectToRoute('destinations_route', array('location' => $location));
        }
        
        return $this->render('booking/autredestination.html.twig', [
            'formulaire' => $formulaire->createView()
        ]);
    } 

    /**
     * @Route("/new",
     * name="create_form")
     */
    public function formcreation(Request $request) {
            
            return $this->render('booking/formulaire.html.twig');
    }
    
    /**
     * @Route("/destination/{location}",
     * name="destinations_route",
     * methods={"GET", "POST"})
     */
    public function destinations($location, ObjectManager $manager, Request $request) { 
        $bookingDate = new Bookings();
        // $prix = new calculTarifs();
        $myForm = $this->createFormBuilder($bookingDate)
            ->add('destination', HiddenType::class, array('data' => $location))
            ->add('departureDate', DateType::class, array('widget' => 'single_text', 'attr' => ['class' => 'form-control']))
            ->add('departureTime', TimeType::class, array(
                'input' => 'string', 'widget' => 'choice', 'minutes' => array(0, 20, 40), 'attr' => ['class' => 'form-control']))
            ->add('sharing', ChoiceType::class, array('choices' => array('Oui' => 'Oui', 'Non' => 'Non',),'attr' => ['class' => 'form-control']))
            ->add('save', SubmitType::class, array('attr' => ['class' =>'btn btn-success']))
            ->getForm()
        ;
        $myForm->handleRequest($request);
 
// Si on a cliqué sur le bouton de soumission
        if ($myForm->isSubmitted() && $myForm->isValid()) {
        // On récupère l'entité par rapport aux critères de recherche   
            $repo = $this->getDoctrine()->getManager()->getRepository(Bookings::class);
        // On récupère les valeurs des champs pour ensuite les afficher   
            $partage = $myForm->getData()->getSharing();
    // var_dump($partage); echo 'C la valeur de $partage <br>';
            $destination = $myForm->getData()->getDestination();
            $laDate = $myForm->getData()->getDepartureDate();
    // var_dump($laDate); echo 'C la variable $laDate <br>'; // $laDate est un objet date lui
            $heure = $myForm->getData()->getDepartureTime();
            $horaire = substr($heure, 0, 5);
            $heure = substr($heure, 0, 2); 
            $heure = intval($heure);
                // var_dump($heure); echo '<br>';
            //$date = $myForm->getData()->getDepartureDate();
    // var_dump($date); echo ' C la variable $date <br>';        
            $jourReservation = date_format($laDate, 'D');
            // $date = date_format($date, 'd/m/Y');
            $dateRaw = date_format($laDate, 'Y-m-d'); 
    // var_dump($dateRaw); echo 'C la valeur de dateRaw <br>';
    // var_dump($destination); echo '<br>';
    // var_dump($jourReservation); echo 'C le jour de reservation <br>';
    
                // var_dump($jourReservation);
            $arrayJoursFeries = array('2019-01-01', '2019-04-22', '2019-05-01', '2019-05-08', '2019-05-30', '2019-06-10', '2019-07-14', '2019-08-15', '2019-11-01', '2019-11-11', '2019-12-25', '2020-01-01', '2020-01-13', '2020-05-01', '2020-05-08', '2020-05-21', '2020-05-31', '2020-06-01', '2020-07-14', '2020-08-15', '2020-11-01', '2020-11-11', '2020-12-25', '2021-01-01', '2021-04-05', '2021-05-01', '2021-05-08', '2021-05-13', '021-05-24', '2021-07-14', '2021-08-15', '2021-11-01', '2021-11-11', '2021-12-25', '2022-01-01', '2022-04-18', '2022-05-01', '2022-05-08', '2022-05-26', '2022-06-06', '2022-07-14', '2022-08-15', '2022-11-01', '2022-11-11', '2022-12-25', '2023-01-01', '2023-04-10', '2023-05-01', '2023-05-08', '2023-05-29', '2023-07-14', '2023-08-15', '2023-11-01', '2023-11-11', '2023-12-25');
                // On détermine le tarif kilométrique
            if ($jourReservation === "Mon" or $jourReservation === "Tue" or $jourReservation === "Wed" or $jourReservation === "Thu" or $jourReservation === "Fri") { 
                    if ($heure >= 8 and $heure < 20) { $tarifKilometre = 1.01; }
                    else { $tarifKilometre = 1.56; }
            }               
            if ($jourReservation === "Sat" or $jourReservation === "Sun" or (in_array($dateRaw, $arrayJoursFeries))) 
                { $tarifKilometre = 1.61; }
            $distance = array('Gare du Nord' => 51, 'Gare Saint-Lazare' => 47.5, 'Gare de Lyon' => 60, 
                                'Gare Montparnasse' => 60.4, 'Aéroport Charles De Gaulle' => 41.4, 
                                'Aéroport de Beauvais' => 43.2, 'Aéroport d\'Orly' => 80);
            if (array_key_exists($destination, $distance)) { $distance = $distance[$destination]; }
            else { 
                    $varDistance = $request->request->get('varDistance');
                    $distance = (int)$varDistance;
                    $distance = ($distance / 1000); 
            }
           
    // var_dump($tarifKilometre); echo 'C le tarif au kilometre  <br>';
    // var_dump($distance);  echo 'C la valeur de $distance <br>';
 
            $bookings = $repo->selDestDate($destination , $laDate, $partage);            
    
        // Si on a au moins une réservation enregistrée à la date sélectionnée alors.... 
            if (!empty($bookings) and $partage == 'Oui') {
                foreach ($bookings as $booking) {
                    $timeArray[] = $booking->getDepartureTime();
                }
        // On rend les valeurs du tableau uniques
                $timeUniqueArray = array_unique($timeArray);
        // On comptabilise les occurences pour les stocker dans un array associatif
                foreach ($timeUniqueArray as $value) {
                    $nb_passagers[$value] = (count(array_keys($timeArray, $value)));
                    
        // Insertion du calcul pour chaque horaire différent trouvé.        
            // Fonction de calcul tarifaire 
                    $nb_passagers[$value] = $nb_passagers[$value] + 1;
                    // if ($nb_passagers[$value] == 1) { $tauxReduction = 0; }
                    if (($nb_passagers[$value] > 1) and ($nb_passagers[$value] <= 3)) { $tauxReduction = 0.95; } // 0.05
                    if (($nb_passagers[$value] > 3) and ($nb_passagers[$value] <= 7)) { $tauxReduction = 0.92; } // 0.08
                    if (($nb_passagers[$value] > 7) and ($nb_passagers[$value] <= 22)) { $tauxReduction = 0.88; } // 0.12
                    if (($nb_passagers[$value] > 22) and ($nb_passagers[$value] <= 54)) { $tauxReduction = 0.8; } // 0.2
                // var_dump($nb_passagers[$value]); echo '<br>';  
                // var_dump($tauxReduction); echo '<br>';  
                    $prixCourses[$value] = $tauxReduction * ($tarifKilometre * $distance);
                    $prixCourses[$value] = round($prixCourses[$value], 2);
                // var_dump($prixCourses); echo '<br>'; 
                // var_dump($nb_passagers); echo '<br>';
                    $prixCourse = ($tarifKilometre * $distance);
                    $prixCourse = round($prixCourse, 2);
                }
                return $this->render('booking/destinations-test.html.twig', [
                    'location' => $location,
                    'horaire' => $horaire,
                    'prixCourse' => $prixCourse,
                    'nb_passagers' => $nb_passagers,
                    'prixCourses' => $prixCourses,
                    'dateRaw' => $dateRaw,
                    'partage' => 'Oui',
                    'myForm' => $myForm->createView()
               ]);

            }
        // Calcul du tarif pour un seul passager
                $prixCourse = ($tarifKilometre * $distance);
                $prixCourse = round($prixCourse, 2);
                // var_dump($horaire); echo 'C la valeur de $horaire. <br>';
                return $this->render('booking/destinations-test.html.twig', [
                    'location' => $location, 
                    'horaire' => $horaire,
                    'prixCourse' => $prixCourse,
                    'dateRaw' => $dateRaw,
                    'partage' => $partage,
                    'myForm' => $myForm->createView()
                ]); 
        }
        else {
            
            return $this->render('booking/destinations-test.html.twig', [
                    'location' => $location,
                    'firstDisplay' => 'yes',
                    'myForm' => $myForm->createView(),
                ]);
        }
    }

    /**
     * @Route("/recording",
     * name="recording", 
     * methods={"GET", "POST"})
     */
    public function recording(Request $request) { 
        // Afficher les 3 paramètres en dur puis un formulaire en dessous avec nom, prenom, email, CB

        // $request = Request::createFromGlobals(); On en a même pas besoin !
        $location = $request->query->get('location');
        $dateRaw = $request->query->get('dateRaw');
        $partage = $request->query->get('partage');

        // $dateRaw = new \Datetime($dateRaw);
        // $dateRaw = date_format($dateRaw, 'Y-m-d');
        //$laDate = $request->query->get('laDate');
        //$dateRaw = new \Datetime('2019/12/25');
        // var_dump($dateRaw); echo 'C la valeur de $dateRaw <br>';
        // $dateRow = new 
        $horaire = $request->query->get('horaire');
        // var_dump($horaire); echo 'C la valeur de $horaire <br>';
        // $repo = $this->getDoctrine()->getManager()->getRepository(Bookings::class);
        // var_dump($location); echo '<br>'; var_dump($date); echo '<br>'; var_dump($horaire); echo '<br>';
        // On affiche le formulaire ici
        $booking = new Bookings();
        // $booking->setDepartureDate(new \DateTime($dateRaw));
        // $booking->setEmail('cbonpourmoi');
        
        $myForm = $this->createFormBuilder($booking)
                       ->add('firstname', TextType::class, array('attr' => ['class' => 'form-control']))
                       ->add('lastname', TextType::class, array('attr' => ['class' => 'form-control']))
                       ->add('email', TextType::class, array('attr' => ['class' => 'form-control']))
                       ->add('save', SubmitType::class, array('attr' => ['class' =>'btn btn-success']))
                       ->getForm();
        $myForm->handleRequest($request);   
        // dump($myForm);

// Si le form est submitted
        if ($myForm->isSubmitted() && $myForm->isValid()) {
            $booking->setDestination($location);
            $booking->setDepartureTime($horaire);
            $booking->setDepartureDate(new \DateTime($dateRaw));
            $booking->setSharing($partage);
            $em = $this->getDoctrine()->getManager();
            $em->persist($booking);
            $em->flush();

            return $this->redirectToRoute('booking'); // Ne pas rediriger vers la page d'acceuil
        }
        
        return $this->render('booking/recording.html.twig', [
                    'location' => $location,
                    'horaire' => $horaire,
                    'dateRaw' => $dateRaw,
                    'partage' => $partage,
                    'myForm' => $myForm->createView(),
                ]);
    }

}




























