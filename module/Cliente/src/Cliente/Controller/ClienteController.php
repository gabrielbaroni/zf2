<?php

namespace Cliente\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cliente\Form\ClienteForm;
use Cliente\Form\ClienteFilter as ClienteFilterSite;
use Cliente\Entity\Clientes;

class ClienteController extends AbstractActionController {

    public function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $clientes = $em->getRepository('Cliente\Entity\Clientes')->findAll();
        return new ViewModel(array('clientes' => $clientes));
    }

    public function addAction()
    {
        $em = $this->getEntityManager();
        $form = new ClienteForm();

        $request = $this->getRequest();
        if ($request->isPost()) {

            $clienteFilter = new ClienteFilterSite();
            $form->setInputFilter($clienteFilter->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $data = $form->getData();

                $cliente = new Clientes();
                $cliente->setNome($data['nome']);
                $cliente->setSalario($data['salario']);
                $cliente->setDataNascimento($data['data_nascimento']);
                $cliente->setHoraNascimento($data['hora_nascimento']);
                $cliente->setSexo($data['sexo']);
                $em->persist($cliente);
                $em->flush();

                return $this->redirect()->toRoute('cliente');
            }
        }

        return new ViewModel(array( 'form' => $form ));
    }

    public function editAction(){
        $em = $this->getEntityManager();

        $id = $this->params()->fromRoute('id');
        if(!$id){
            return $this->redirect ()->toRoute('cliente', array('controller' => 'cliente', 'action' => 'index'));
        }
        else{
            $cliente = $em->getRepository('Cliente\Entity\Clientes')->find($id);
        }

        $request = $this->getRequest();

        if($request->isPost()){
            // var_dump($request->getPost('nome'));
            $cliente->setNome($request->getPost('nome'));
            $cliente->setSalario($request->getPost('salario'));
            $cliente->setSexo($request->getPost('sexo'));
            $cliente->setDataNascimento($request->getPost('data_nascimento'));
            $cliente->setHoraNascimento($request->getPost('hora_nascimento'));
            $em->merge($cliente);
            $em->flush();
        }

        return new ViewModel(array('form' => $form, 'cliente' => $cliente));
    }

    public function deleteAction()
    {
        $em = $this->getEntityManager();
        $id = (int) $this->params()->fromRoute('id', 0);

        if(!$id){
            return $this->redirect ()->toRoute('cliente', array('controller' => 'cliente', 'action' => 'index'));
        }
        else{
            $cliente = $em->getRepository('Cliente\Entity\Clientes')->find($id);
        }

        if(!is_null($cliente)){
            $em->remove($cliente);
            $em->flush();
            return $this->redirect()->toRoute('cliente');
        }
        else{
            return $this->redirectToRoute('cliente');
        }
    }

}
