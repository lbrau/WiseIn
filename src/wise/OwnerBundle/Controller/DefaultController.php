<?php

namespace wise\OwnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use wise\OwnerBundle\Entity\Proprietaire;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bienRepo = $em->getRepository("wiseOwnerBundle:Bien");
        $loc = $em->getRepository("wiseOwnerBundle:Proprietaire")->findAll();
        $biens = $bienRepo->findAll();
        dump($loc,$biens);
        return $this->render('wiseOwnerBundle:Default:dashboard.html.twig', array('biens' => $biens));
    }

    public function welcomeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        // TODO faire une redirection tpl en fonction des utilisateur connecté
        dump($this->getUser());
        /** @var $user Proprietaire*/
        if ($user = $this->getUser()) {
           if ($user->hasRole('ROLE_OWNER') ) {
               dump('sonde owner connected');
               return $this->redirect($this->generateUrl('wise_owner_homepage'));
           } else if ($user->getRoles()){}
       }
//        $response = new Response();
//        $filename = "toto.mp4111";
//        $response->headers->set("Content-type", "application/octet-stream");
//        $response->headers->set("Content-disposition", "attachment;filename=$filename");
//        return $response;
        return $this->render(':layout:welcome_index_layout.html.twig');
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function loginAction(Request $request)
    {
        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        $authErrorKey = Security::AUTHENTICATION_ERROR;
        $lastUsernameKey = Security::LAST_USERNAME;

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has($authErrorKey)) {
            $error = $request->attributes->get($authErrorKey);
        } elseif (null !== $session && $session->has($authErrorKey)) {
            $error = $session->get($authErrorKey);
            $session->remove($authErrorKey);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);

        $csrfToken = $this->has('security.csrf.token_manager')
            ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
            : null;

        return $this->renderLogin(array(
            'last_username' => $lastUsername,
            'error' => $error,
            'csrf_token' => $csrfToken,
        ));
    }


    public function userResgistrationAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $form = $this->createForm('fos_user_registration', $user);

        // TODO faire gestion du formulaire apres soumission.
        return $this->render('Security/registration.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return Response
     */
    protected function renderLogin(array $data)
    {
        return $this->render(':Security:login.html.twig', $data);
    }
}
