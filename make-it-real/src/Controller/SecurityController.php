<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ForgotFormType;
use App\Form\ResetFormType;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('mir_public/login.html.twig', ['error' => $error]);
    }

    /**
     * @Route("/forgot_password", name="app_reset_pwd")
     */
    public function resetPwd(\Symfony\Component\HttpFoundation\Request $request, \Swift_Mailer $mailer): Response
    {
        $form = $this->createForm(ForgotFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository(User::class)->findOneBy(array('email' => $form->get('email')->getData()));

            if($user) {
                $user->generateCode();
                //Send confirmation code
                $message = (new \Swift_Message('make-it-real | Recover your password '.$user->getFirstName().' !'))
                    ->setFrom('webmaster.makeitreal@gmail.com')
                    ->setTo($user->getEmail())
                    ->setBody(
                        $this->renderView(
                            'mir_mail/recover.html.twig',
                            ['user' => $user]
                        ),
                        'text/html'
                    );

                $mailer->send($message);
                $em->persist($user);
                $em->flush();


                return $this->render('mir_public/forgotPassword.html.twig',[
                    'forgotForm' => $form->createView(),
                    'alert' => ['success','A recovery email has been sent to the address '.$form->get('email')->getData()]
                ]);
            } else {
                return $this->render('mir_public/forgotPassword.html.twig',[
                    'forgotForm' => $form->createView(),
                    'alert' => ['danger','No account matches this email']
                ]);
            }
        }

        return $this->render('mir_public/forgotPassword.html.twig',[
            'forgotForm' => $form->createView(),
            'alert' => null
        ]);
    }

    /**
     * @Route("/recover/{code}/{id}", name="app_recover")
     */
    public function recover($code,$id,\Symfony\Component\HttpFoundation\Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findOneBy(array('code' => $code,'id' => $id));

        if($user) {

            $form = $this->createForm(ResetFormType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                //Set new user
                $user->setPassword(//Encode password
                    $passwordEncoder->encodePassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );

                $user->setCode(null);

                $em->persist($user);
                $em->flush();

                return $this->render('mir_public/recover.html.twig',[
                    'resetForm' => $form->createView(),
                    'alert' => ['success',''],
                    'code' => $code,
                    'id' => $id
                ]);
            }

            return $this->render('mir_public/recover.html.twig',[
                'resetForm' => $form->createView(),
                'alert' => null,
                'code' => $code,
                'id' => $id
            ]);

        } else {
            return $this->redirectToRoute('public_home');
        }
    }
}
