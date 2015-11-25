<?php

namespace WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\BrowserKit\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/home", name="home")
     * @Template()
     */
    public function homeAction()
    {
        return [];
    }

    /**
     * @Route("/openingsuren", name="openingsuren")
     * @Template()
     */
    public function openingsurenAction()
    {
        return [];
    }

    /**
     * @Route("/catalogus/{categorie}", name="catalogus")
     * @Template()
     */
    public function catalogusAction($categorie)
    {
        return [
            'items' => [
                [
                    'id' => 1,
                    'title' => 'Toog met 2 tapkranen',
                    'description' => '
                     Aansluiting voor co2 met drukregelaar. Gardena aansluiting voor watertoevoer.

                    Ijsbak 80kg, 50li 3/4 pk

                    220V - 1050W

                    170cm x 60cm x 100cmH
                    ',
                    'price' => '&euro;100',
                    'img_src' => '/images/catalogus/toog1.jpg'
                ],
                [
                    'id' => 2,
                    'title' => 'Tetris toog element',
                    'description' => '
                     140cmB, 80cm diep
                     Inclusief verlichting, kleuren zelf aan te passen adhv afstandsbediening
                    ',
                    'price' => '&euro;90 / element',
                    'img_src' => '/images/catalogus/toog2.jpg'
                ],
                [
                    'id' => 3,
                    'title' => 'Toog 2m lang',
                    'description' => '',
                    'price' => '&euro;40',
                    'img_src' => '/images/catalogus/toog3.jpg'
                ],
                [
                    'id' => 4,
                    'title' => 'Spoelbak',
                    'description' => '65cm diep, 150cm lang, 90cmH',
                    'price' => '&euro;30',
                    'img_src' => '/images/catalogus/toog4.jpg'
                ],
                [
                    'id' => 5,
                    'title' => 'Ice pot',
                    'description' => '110cmH, 100cm diameter',
                    'price' => '&euro;75',
                    'img_src' => '/images/catalogus/toog5.jpg'
                ],
            ]
        ];
    }

    /**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction()
    {
        return [
            'form' => $this->getContactForm()->createView()
        ];
    }

    /**
     * @Route("/contact/versturen", name="verstuur_contact")
     *
     */
    public function verstuurContactAction()
    {
        $contactForm = $this->getContactForm();
        $contactForm->handleRequest($this->getRequest());

        if($contactForm->isValid()) {
            $this->addFlash('message.success', 'Contactformulier werd successvol verzonden');
        }

        return $this->render('WebsiteBundle:Default:contact.html.twig', [
            'form'=> $contactForm->createView()
        ]);
    }

    private function getContactForm()
    {
        $contactFormBuilder = $this->createFormBuilder();
        $contactFormBuilder
            ->add('naam')
            ->add('voornaam')
            ->add('telefoon')
            ->add('email', 'email')
            ->add('vraag', 'textarea')
        ;

        return $contactFormBuilder->getForm();
    }
}
