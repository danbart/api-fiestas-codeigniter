<?php
/**
 * Created by PhpStorm.
 * User: byron
 * Date: 23/04/18
 * Time: 11:48 AM
 */

class Comunidades_Model extends CI_model
{
    function  __construct()
    {
        parent::__construct();
    }

    public function get($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Comunidades')->where('idComunidades',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_object();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Comunidades')->get();
        if($query->num_rows()>0){
          return $query->result_object();

        }
        return false;
    }

    public function comunFiestas($id = null){
      if (!is_null($id)){
          $query = $this->db->query("select cm.Nombre_Comunidad as Comunidad, ft.Fecha_Inico as Fiesta, ft.Descripcion_Fiesta as Descripcion, fot.Nombre_Fotografia as img from Comunidades cm, Fiestas ft, Fotografia fot
where cm.idComunidades=ft.Comunidades_idComunidades and ft.idFiestas=fot._idFiestas and cm.idComunidades=$id");

          if ($query->num_rows()=== 1){
              return $query->result_object();
          }elseif ($query->num_rows()> 1) {
            return $query->result_object();
          }
          return false;
      }

      $query = $this->db->query("select cm.Nombre_Comunidad as Comunidad, ft.Fecha_Inico as Fiesta, ft.Descripcion_Fiesta as Descripcion, fot.Nombre_Fotografia as img from Comunidades cm, Fiestas ft, Fotografia fot
where cm.idComunidades=ft.Comunidades_idComunidades and ft.idFiestas=fot._idFiestas");
      if($query->num_rows()>0){
        return $query->result_object();

      }
      return false;
        // if (!is_null($id)){
        //   //LLAMAMOS FUNCIONES DEFINIDAS DENTRO DE LA CLASE
        //     $fiestas = json_decode(json_encode($this->getFiesta($id)), true);
        //     $comunidad = json_decode(json_encode($this->get($id)), true);
        //     $semanasanta = json_decode(json_encode($this->getSemanaSanta($id)), true);
        //     $array = array($comunidad);
        //   if($fiestas!=false){
        //     foreach($fiestas as $key1 => $value1) {
        //       $temp1 = $value1['idFiestas'];
        //       $temp1 = $temp1+0;
        //       $fotofiesta = json_decode(json_encode($this->getFotografiaFiesta($temp1)), true);
        //       if($fotofiesta!=false){
        //         // foreach ($variable as $key => $value) {
        //         //   array_push();
        //         // }
        //         $fotoFies = array($value1, $fotofiesta);
        //         foreach ($fotoFies as $key => $value4) {
        //           array_push($array, $value4);
        //         }
        //       }else{
        //           array_push($array, $value1);
        //       }
        //     }
        //   }
        //
        //   if($semanasanta!=false){
        //     foreach($semanasanta as $key2 => $value2) {
        //       $temp2 = $value2['idSemanaSanta'];
        //       $temp2 = $temp2+0;
        //       $fotofiesta = json_decode(json_encode($this->getFotografiaSemanaSanta($temp2)), true);
        //       if($fotofiesta != false){
        //         $fotoFies = array($value2, $fotofiesta);
        //         foreach ($fotoFies as $key => $value4) {
        //           array_push($array, $value4);
        //         }
        //       }else{
        //         array_push($array, $value2);
        //       }
        //     }
        //   }
        //     return $array;
        // }
        //
        // $array = array();
        // $comunidad =json_decode(json_encode($this->get()), true);
        // //RECORREMOS EL ARREGLO DE COMUNIDADES Y LE AGREGAMOS LAS FIESTAS CORRESPONDIENTES
        // foreach($comunidad as $key => $value) {
        //   $temp = $value['idComunidades'];
        //   $temp = $temp +0;
        //   $comunidad = array($value);
        //     // array_push($array, $value);
        //       $fiestas = json_decode(json_encode($this->getFiesta($temp)), true);
        //       $semanasanta = json_decode(json_encode($this->getSemanaSanta($temp)), true);
        //       //buscamos las fotos por fiesta
        //       if($fiestas!=false){
        //       foreach($fiestas as $key1 => $value1) {
        //         $temp1 = $value1['idFiestas'];
        //         $temp1 = $temp1+0;
        //         $fotofiesta = json_decode(json_encode($this->getFotografiaFiesta($temp1)), true);
        //         if($fotofiesta != false){
        //         $fotoFies = array($value1, $fotofiesta);
        //         array_push($comunidad, $fotoFies);
        //       }else{
        //         array_push($comunidad, $value1);
        //       }
        //       }
        //     }
        //       //buscamos las fotos por fiesta de Semana Santa
        //       if($semanasanta!=false){
        //         foreach($semanasanta as $key2 => $value2) {
        //           $temp2 = $value2['idSemanaSanta'];
        //           $temp2 = $temp2+0;
        //           $fotofiesta = json_decode(json_encode($this->getFotografiaSemanaSanta($temp2)), true);
        //           if($fotofiesta != false){
        //           $fotoFies = array($value2, $fotofiesta);
        //           array_push($comunidad, $fotoFies);
        //         }else{
        //           array_push($comunidad, $value2);
        //         }
        //        }
        //       }
        //       array_push($array, $comunidad);
        // }
        // return $array;
    }

    public function deparFiestas($id = null){
      if (!is_null($id)){
          $query = $this->db->query("select dp.Nombre_Deptos as Departamento, cm.Nombre_Comunidad as Comunidad, ft.Fecha_Inico as Fiesta, ft.Descripcion_Fiesta as Descripcion, fot.Nombre_Fotografia as img from Departamentos dp, Comunidades cm, Fiestas ft, Fotografia fot
where dp.idDepartamentos=cm.Departamentos_idDepartamentos and cm.idComunidades=ft.Comunidades_idComunidades
and ft.idFiestas=fot._idFiestas and dp.idDepartamentos=$id");

          if ($query->num_rows()=== 1){
              return $query->result_object();
          }elseif ($query->num_rows()> 1) {
            return $query->result_object();
          }
          return false;
      }

      $query = $this->db->query("select dp.Nombre_Deptos as Departamento, cm.Nombre_Comunidad as Comunidad, ft.Fecha_Inico as Fiesta, ft.Descripcion_Fiesta as Descripcion, fot.Nombre_Fotografia as img from Departamentos dp, Comunidades cm, Fiestas ft, Fotografia fot
where dp.idDepartamentos=cm.Departamentos_idDepartamentos and cm.idComunidades=ft.Comunidades_idComunidades
and ft.idFiestas=fot._idFiestas");
      if($query->num_rows()>0){
        return $query->result_object();

      }
      return false;
        // if (!is_null($id)){
        //   $array = array();
        //   //LLAMAMOS FUNCIONES DEFINIDAS DENTRO DE LA CLASE
        //     $departamentos = json_decode(json_encode($this->getDepartamento($id)), true);
        //     //agregamos el departamento al arreglo
        //       array_push($array, $departamentos);
        //       $temp = $departamentos['idDepartamentos'];
        //       $temp = $temp+0;
        //           $comunidad =json_decode(json_encode($this->getComunidad($temp)), true);
        //           //buscamos la comunidad y sus fiestas
        //             foreach($comunidad as $key => $value) {
        //               if($value!=false){
        //                 $temporal = $value['idComunidades'];
        //                 $temporal = $temporal +0;
        //                 $fiestas = json_decode(json_encode($this->comunFiestas($temporal)), true);
        //                array_push($array,  $fiestas);
        //             }
        //           }
        //     return $array;
        // }
        //
        // $array = array();
        // //LLAMAMOS FUNCIONES DEFINIDAS DENTRO DE LA CLASE
        //   $departamentos = json_decode(json_encode($this->getDepartamento()), true);
        //   //agregamos el departamento al arreglo
        //     foreach($departamentos as $llave => $valor) {
        //       array_push($array, $valor);
        //       $temp = $valor['idDepartamentos'];
        //       $temp = $temp+0;
        //       $comunidad = json_decode(json_encode($this->getComunidad($temp)), true);
        //       //buscamos la comunidad y sus fiestas
        //         if($comunidad!=false){
        //           foreach($comunidad as $key => $value) {
        //             $temp = $value['idComunidades'];
        //             $temp = $temp +0;
        //             $fiestas = json_decode(json_encode($this->comunFiestas($temp)), true);
        //             array_push($array,  $fiestas);
        //           }
        //           $comunidad = null;
        //         }
        //     }
        //   return $array;
    }

    public function getFiesta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fiestas')->where('Comunidades_idComunidades',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_object();
            }elseif ($query->num_rows()> 1) {
              return $query->result_object();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Fiestas')->get();
        if($query->num_rows()>0){
          return $query->result_object();

        }
        return false;
    }
    //obtenemos la semana santa desde id comunidad a la cual pertenece
    public function getSemanaSanta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('SemanaSanta')->where('_idComunidades',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_object();
            }elseif ($query->num_rows()> 1) {
              return $query->result_object();
            }
            return false;
        }

        $query = $this->db->select('*')->from('SemanaSanta')->get();
        if($query->num_rows()>0){
          return $query->result_object();

        }
        return false;
    }
    //obtenemos semana santa desde id
    public function getSemanaSantaId($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('SemanaSanta')->where('idSemanaSanta',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_object();
            }elseif ($query->num_rows()> 1) {
              return $query->result_object();
            }
            return false;
        }

        $query = $this->db->select('*')->from('SemanaSanta')->get();
        if($query->num_rows()>0){
          return $query->result_object();

        }
        return false;
    }

    public function getDepartamento($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Departamentos')->where('idDepartamentos',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_object();
            }elseif ($query->num_rows()> 1) {
              return $query->result_object();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Departamentos')->get();
        if($query->num_rows()>0){
          return $query->result_object();

        }
        return false;
    }

    public function getComunidad($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Comunidades')->where('departamentos_idDepartamentos',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_object();
            }elseif ($query->num_rows()> 1) {
              return $query->result_object();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Comunidades')->get();
        if($query->num_rows()>0){
          return $query->result_object();

        }
        return false;
    }

    public function getFotografiaFiesta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fotografia')->where('_idFiestas',$id)->get();
            // $query = $this->db->query('SELECT * FROM fotografia where fiesta_idFiestas='.$id);
            if ($query->num_rows()=== 1){
                return $query->result_object();
            }elseif ($query->num_rows()> 1) {
              return $query->result_object();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Fotografia')->get();
        if($query->num_rows()>0){
          return $query->result_object();

        }
        return false;
    }

    public function getFotografiaSemanaSanta($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fotografia')->where('_idSemanaSanta',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_object();
            }elseif ($query->num_rows()> 1) {
              return $query->result_object();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Fotografia')->get();
        if($query->num_rows()>0){
          return $query->result_object();

        }
        return false;
    }

    public function getFotograFestaNacional($id = null){
        if (!is_null($id)){
            $query = $this->db->select('*')->from('Fotografia')->where('Fiestas_Nacionales_idFinac',$id)->get();

            if ($query->num_rows()=== 1){
                return $query->result_object();
            }elseif ($query->num_rows()> 1) {
              return $query->result_object();
            }
            return false;
        }

        $query = $this->db->select('*')->from('Fotografia')->get();
        if($query->num_rows()>0){
          return $query->result_object();

        }
        return false;
    }

    public function getFiestasHoy($date = null){
      date_default_timezone_set('America/Guatemala');
      $today = new \DateTime("now");
      $fiestas = array();

          if (!is_null($date)){
            $date = date('Y-m-d',strtotime($date));
              $query = $this->db->query("select * from Fiestas where (dayofmonth(Fecha_Inico) = dayofmonth('$date') and month(Fecha_Inico) = month('$date')) or (dayofmonth(Fecha_Fin) = dayofmonth('$date') and month(Fecha_Fin) = month('$date'))");
              if($query->num_rows()>0){
                return $query->result_object();
              }
              return null;
          }
          $date= $today->format('Y-m-d');
          // $query = $this->db->query("select * from Fiestas where (dayofmonth(Fecha_Inico) = dayofmonth('$date') and month(Fecha_Inico) = month('$date'))  or (dayofmonth(Fecha_Fin) = dayofmonth('$date') and month(Fecha_Fin) = month('$date'))");
          $query = $this->db->query("select dp.Nombre_Deptos as Departamento, cm.Nombre_Comunidad as Comunidad, ft.Descripcion_Fiesta as Descripcion, ft.Fecha_Inico as Fiesta, fot.Nombre_Fotografia as img from Departamentos dp, Comunidades cm, Fiestas ft, Fotografia fot
where dp.idDepartamentos=cm.Departamentos_idDepartamentos and cm.idComunidades=ft.Comunidades_idComunidades and ft.idFiestas=fot._idFiestas and (dayofmonth(ft.Fecha_Inico) = dayofmonth('$date') and month(ft.Fecha_Inico) = month('$date'))  or (dayofmonth(ft.Fecha_Fin) = dayofmonth('$date') and month(ft.Fecha_Fin) = month('$date'))");
          if($query->num_rows()>0){
            return $query->result_object();
          }
          return $query->result_object();;

    }

    public function getFiestasMes($date = null){
      date_default_timezone_set('America/Guatemala');
      $today = new \DateTime("now");
      $fiestas = array();

          if (!is_null($date)){
            $date = date('Y-m-d',strtotime($date));
              $query = $this->db->query("select dp.Nombre_Deptos as Departamento, ft.Fecha_Inico as Fiesta, ft.Descripcion_Fiesta as Descripcion, ft.Nombre_Fiestas, cm.Nombre_Comunidad as Comunidad,  fot.Nombre_Fotografia as img
              from Departamentos dp,  Fiestas ft, Comunidades cm, Fotografia fot where dp.idDepartamentos=cm.Departamentos_idDepartamentos and ft.comunidades_idComunidades=cm.idComunidades and fot._idFiestas=ft.idFiestas and (month(ft.Fecha_Inico) = month('$date')) or (month(ft.Fecha_Fin) = month('$date'))");
              if($query->num_rows()>0){
                return $query->result_object();
              }
              return false;
          }
          $date= $today->format('Y-m-d');
          $query = $this->db->query("select dp.Nombre_Deptos as Departamento, ft.Fecha_Inico as Fiesta, ft.Descripcion_Fiesta as Descripcion, ft.Nombre_Fiestas, cm.Nombre_Comunidad as Comunidad,  fot.Nombre_Fotografia as img
          from Departamentos dp,  Fiestas ft, Comunidades cm, Fotografia fot where dp.idDepartamentos=cm.Departamentos_idDepartamentos and ft.comunidades_idComunidades=cm.idComunidades and fot._idFiestas=ft.idFiestas and (month(ft.Fecha_Inico) = month('$date'))  or (month(ft.Fecha_Fin) = month('$date'))");
          if($query->num_rows()>0){
            return $query->result_object();
          }
          return false;

    }

}
