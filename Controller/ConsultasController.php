<?php
namespace Controller;
use \Model\ConsultaModel;
class ConsultasController extends AppController {
    public function __construct() {
        parent::__construct();
    }
    public function consulta1(){
        $consulta1 = (new ConsultaModel())->cantidadAlumnosPorAsignatura();
        $this->redirect(["consulta1.php"], ["consulta1" => $consulta1]);
    }
    public function consulta2(){
        $consulta2 = (new ConsultaModel())->cantidadProfesoresPorDep();
        $this->redirect(["consulta2.php"], ["consulta2" => $consulta2]);
    }
    public function consulta3(){
        $consulta3 = (new ConsultaModel())->cantidadAsignaturasPorGradoPorDep();
        $this->redirect(["consulta3.php"], ["consulta3" => $consulta3]);
    }
}
