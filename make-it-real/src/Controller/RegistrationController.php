<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, \Swift_Mailer $mailer): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Set new user
            $user->setPassword(//Encode password
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $user->setFirstName($form->get('firstName')->getData());
            $user->setLastName($form->get('lastName')->getData());
            $user_role = ['ROLE_CANDIDATE'];
            $user->setRoles($user_role);
            $user->generateCode();

            //Add to databse
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            //Send confirmation code
            $message = (new \Swift_Message('Welcome to make-it-real '.$user->getFirstName().' !'))
                ->setFrom('webmaster.makeitreal@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        'mir_mail/registration.html.twig',
                        ['user' => $user]
                    ),
                    'text/html'
                );

            $mailer->send($message);

            return $this->redirectToRoute('app_login');
        }

        return $this->render('mir_public/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/register/{code}/{id}", name="app_confirm")
     */
    public function confirm($code,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findOneBy(array('code' => $code,'id' => $id));
        if($user && $user->getCode()) {
            $user_role = ['ROLE_USER'];
            $user->setRoles($user_role);
            $user->setCode(null);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('user_panel');
        } else {
            return $this->redirectToRoute('public_home');
        }
    }
}
