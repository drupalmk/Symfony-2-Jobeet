<?php

namespace Acme\JobsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\JobsBundle\Entity\Jobs;
use Acme\JobsBundle\Form\JobsType;

/**
 * Jobs controller.
 *
 */
class JobsController extends Controller
{
    /**
     * Lists all Jobs entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $qb = $em->createQueryBuilder();
        $categories = $qb->add('select', 'c')
                ->add('from', 'JobsBundle:Categories c')
                ->innerJoin('c.jobs', 'j', 'WITH', 'j.category = c')
                ->getQuery()
                ->getResult();
                
        $limit = $this->getParameter('max_jobs_on_homepage');
        
        foreach($category as $categories) {
            $qb = $this->_em->createQueryBuilder();
            $jobs = $qb->add('select', 'j')
                     ->add('from', 'JobsBundle:Job j')
                     ->add('where', $qb->expr()->andx(
                          $qb->expr()->eq('j.category', '?1'),
                          $qb->expr()->gt('j.expiresAt', '?2')
                       ))
                     ->add('orderBy', 'j.expiresAt DESC')
                     ->setMaxResults($limit)
                     ->setParameter(1, $category->getId())
                     ->setParameter(2, new \DateTime())
                     ->getQuery()
                     ->getResult();
            $category->setActiveJobs($jobs);
        }

        return $this->render('JobsBundle:Jobs:index.html.twig', array(
            'categories' => $categories
        ));
    }

    /**
     * Finds and displays a Jobs entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JobsBundle:Jobs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jobs entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JobsBundle:Jobs:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Jobs entity.
     *
     */
    public function newAction()
    {
        $entity = new Jobs();
        $form   = $this->createForm(new JobsType(), $entity);

        return $this->render('JobsBundle:Jobs:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Jobs entity.
     *
     */
    public function createAction()
    {
        $entity  = new Jobs();
        $request = $this->getRequest();
        $form    = $this->createForm(new JobsType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('jobs_show', array('id' => $entity->getId())));
            
        }

        return $this->render('JobsBundle:Jobs:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Jobs entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('JobsBundle:Jobs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jobs entity.');
        }

        $editForm = $this->createForm(new JobsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JobsBundle:Jobs:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Jobs entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('JobsBundle:Jobs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jobs entity.');
        }

        $editForm   = $this->createForm(new JobsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('jobs_edit', array('id' => $id)));
        }

        return $this->render('JobsBundle:Jobs:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Jobs entity.
     *  
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('JobsBundle:Jobs')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Jobs entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('jobs'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
