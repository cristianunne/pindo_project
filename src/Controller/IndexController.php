<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Index Controller
 *
 * @property \App\Model\Table\IndexTable $Index
 */
class IndexController extends AppController
{


    //Recibe como parametro el usuario autentifiado
    //En cada controlador, vuelvo a crear este metodo y le paso los permisos a las acciones que uiero

    public function isAuthorized($user)
    {

        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
    public function index()
    {

        $tablaRodales = $this->loadModel('Rodales');

        $query = $tablaRodales->find();
        $query->select(['count' => $query->func()->count('*')]);

        $res_count_rod = $query->toArray();

        $rodal_count = $res_count_rod[0]['count'];
        $this->set('rodal_count', $rodal_count);


        //Cuento las Emsefor Registradas
        $tablaEmsefor= $this->loadModel('Emsefor');
        $query_ems = $tablaEmsefor->find();
        $query_ems->select(['count' => $query_ems->func()->count('*')]);

        $ems_count_rod = $query_ems->toArray();

        $ems_count = $ems_count_rod[0]['count'];
        $this->set('ems_count', $ems_count);

        //Hago un recuento de las Maquinas
          //Cuento las Emsefor Registradas
        $tablaMaquinas = $this->loadModel('Maquinas');
        $query_maq = $tablaMaquinas->find();
        $query_maq->select(['count' => $query_maq->func()->count('*')]);

        $maq_count_rod = $query_maq->toArray();

        $maq_count = $maq_count_rod[0]['count'];
        $this->set('maq_count', $maq_count);


        //Procedencias
        $tablaProcedencias = $this->loadModel('Procedencias');
        $query_proc = $tablaProcedencias->find();
        $query_proc->select(['count' => $query_proc->func()->count('*')]);

        $proc_count_rod = $query_proc->toArray();

        $proc_count = $proc_count_rod[0]['count'];
        $this->set('proc_count', $proc_count);


        //Recupero la Tabla Sagpyas
        //Procedencias
        $tablaSagpyas = $this->loadModel('Sagpyas');
        $query_sagpya = $tablaSagpyas->find();
        $query_sagpya->select(['count' => $query_sagpya->func()->count('*')]);

        $sagpya_count_rod = $query_sagpya->toArray();

        $sagpya_count = $sagpya_count_rod[0]['count'];
        $this->set('sagpya_count', $sagpya_count);





        return $this->render();
    }




}
