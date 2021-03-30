<?php
namespace Model;
class ConsultaModel extends AppModel {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    private function cantidadAlumnosPorAsignaturaQuery(){
        return "select a.nombre as asignatura, count(aea.id_alumno) as cantidad from alumno_en_asignatura aea inner join asignatura a on aea.id_asignatura = a.id inner join persona p on aea.id_alumno = p.id group by aea.id_asignatura order by a.nombre";
    }
    public function cantidadAlumnosPorAsignatura(){
        $datos = [];
        $consulta = $this->fetchValues($this->cantidadAlumnosPorAsignaturaQuery());
        foreach ($consulta as $row){
            $dato = [];
            $dato[0] = $row["asignatura"];
            $dato[1] = $row["cantidad"];
            array_push($datos, $dato);
        }
        return $datos;
    }
    private function cantidadProfesoresPorDepQuery(){
        return "select d.nombre as departamento, count(pf.id_profesor) as cantidad_de_profesores from departamento d inner join profesor pf on pf.id_departamento = d.id group by d.id;";
    }
    public function cantidadProfesoresPorDep(){
        $datos = [];
        $consulta = $this->fetchValues($this->cantidadProfesoresPorDepQuery());
        foreach ($consulta as $row){
            $dato = [];
            $dato[0] = $row["departamento"];
            $dato[1] = $row["cantidad_de_profesores"];
            array_push($datos, $dato);
        }
        return $datos;
    }
    private function cantidadAsignaturasPorGradoQuery(){
        return "SELECT g.nombre as grado, count(a.id) as cantidad_de_asignaturas from grado g inner join asignatura a on a.id_grado = g.id group by g.id";
    }
    public function cantidadAsignaturasPorGradoPorDep(){
        $datos = [];
        $consulta = $this->fetchValues($this->cantidadAsignaturasPorGradoQuery());
        foreach ($consulta as $row){
            $dato = [];
            $dato[0] = $row["grado"];
            $dato[1] = $row["cantidad_de_asignaturas"];
            array_push($datos, $dato);
        }
        return $datos;
    }
    /*-------------------------------*/
    protected function getCheckMessage() { }
    protected function getCheckParameter($unique) { }
    protected function getCheckQuery() { }
    protected function getCreateParameter($object) { }
    protected function getCreateQuery() { }
    protected function getDeleteParameter($object) { }
    protected function getDeleteQuery($notUsed = true) { }
    protected function getFindParameter($criterio = null) { }
    protected function getFindQuery($criterio = null) { }
    protected function getFindXIdQuery() { }
    protected function getUpdateParameter($object) { }
    protected function getUpdateQuery() { }
    public function createEntity($row) { }
}
