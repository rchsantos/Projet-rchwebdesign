<?php

namespace Rch\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Rch\SiteBundle\Entity\Articles;
use Rch\SiteBundle\Form\ArticlesType;


class SiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('SiteBundle:Site:index.html.twig');
    }

    public function adminAction()
    {
        return $this->render('SiteBundle:Site:admin.index.html.twig');
    }

    public function articlesAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        $article =  $em->getRepository("SiteBundle:Articles")->findAll();

        return $this->render('SiteBundle:Site:admin.articles.html.twig', array(
            'Articles' => $article
        ));
    }

    public function ajouterAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $article = new articles();

        $form = $this->createForm (new ArticlesType(), $article);

        $request = $this->getRequest();
        if($request->ismethod('POST')) {
            $form->bind($this->getRequest($request));

            $article = $form->getData();
            $em->persist($article);
            //$em->persist($article->getImage());
            $em->flush();

            //$this->get('session')->getFlashBag()->add('notice', 'Article bien enregistré');

            return $this->redirect($this->generateUrl('site_admin_articles'));

        }


        return $this->render('SiteBundle:Site:admin.articles.ajouter.html.twig', array(
             'form' => $form->createView(),
        ));
    }

    public function editerAction(Articles $article)
    {
        $em = $this->getDoctrine()->getManager();


        $form = $this->createForm (new ArticlesType(), $article);

        $request = $this->getRequest();
        if($request->ismethod('POST')) {
            $form->bind($this->getRequest($request));

            $article = $form->getData();
            $em->persist($article);
            $em->flush();

            return $this->redirect($this->generateUrl('site_admin_articles', array(
                'id' => $article->getId(),
                ))
            );
        }

       return $this->render('SiteBundle:Site:admin.articles.editer.html.twig', array(
             'Articles' => $article,
             'form'     => $form->createView(),
            ));
    }

    public function supprimerAction(Articles $article){

        $em = $this->getDoctrine()->getManager();

        $em->remove($article);
        $em->flush();

        return $this->redirect($this->generateUrl('site_admin_articles'));
    }

    public function categoriesAction()
    {
        return $this->render('SiteBundle:Site:admin.categories.html.twig');
    }

    public function mediasAction()
    {
        
        /* $em = $this->getDoctrine()->getManager();
        $article =  $em->getRepository("SiteBundle:Articles")->findAll();

        return $this->render('SiteBundle:Site:admin.articles.html.twig', array(
            'Articles' => $article
        )); */

        return $this->render('SiteBundle:Site:admin.medias.html.twig');
    }
}
