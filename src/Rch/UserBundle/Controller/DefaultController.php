<?php

namespace Rch\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	/** Liste d'utilisateur **/

    public function userlistAction()
    {   
    	//access user manager services 
	    $userManager = $this->get('fos_user.user_manager');
	    $users = $userManager->findUsers();

        return $this->render('UserBundle:Site:admin.users.html.twig', array('users' =>   $users));     
    }

    /** Ajouter utilisateur **/

    public function userajouterAction()
    {   
        
        return $this->render('UserBundle:Registration:register_content.html.twig');     
    }

    /** Editer utilisateur **/
    public function userediterAction(Users $user)
    {   
        $user = $userManager->createUser();
		$user->setUsername($username);
		$user->setEmail($email);

		$userManager->updateUser($user);     
    }

    /** Supprimer utilisateur **/
    public function usersupprimerAction(Users $user)
    {
    	//access user manager services 
	    $userManager = $this->get('fos_user.user_manager');
	    $userManager = $container->get('fos_user.user_manager');
		$userManager->deleteUser($user);
		$userManager->flush();

		/*$userManager = $container->get('fos_user.user_manager');
		$userManager->deleteUser($user);*/
    }
      
}
