<?php
  include_once("config/Conexion.php");
  header("Content-Type: aplication/json");
  $slider = new Slider();
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
    if($_GET['method'] == 'pricipal'){
      $sliderall = $slider->getslider();
      echo $sliderall;
    } else if($_GET['method'] == 'misa'){
      $sliderall = $slider->getslidermisa();
      echo $sliderall;
    }
    break;
    case 'POST':
    if($_POST['method']=='pricipal'){
      $sliderstore = $slider->store($_FILES);
      echo $sliderstore;
    } else if($_POST['method']=='misa'){
      $sliderstore = $slider->storemisa($_FILES);
      echo $sliderstore;
    }

    break;

    case 'PUT':
    break;

    case 'DELETE':
    $sliderdelete = $slider->delete($_GET);
    echo $sliderdelete;
    break;
  }


  class Slider{
    private $con;
    private $request = array();

    public function __construct(){
      $conexion = $this->con = new Conexion();
      $this->con = $conexion->conectar();
    }

    public function getslider(){
      try {
        $sql =  "SELECT * FROM slider WHERE typeslider =  'pricipal'";
        $result = $this->con->query($sql);
        $resultData = array();
        $position = 0;

        while (  $data = $result->fetch_assoc()) {
          $resultData[$position] = $data;
          $position++;
        }

        $draw = isset($_GET['draw']) ? $_GET['draw'] : 0;

        $request['code'] = 200;
        $request['status'] = 'success';
        $request['draw']=intval($draw);
        $request['recordsTotal']=intval($result->num_rows);
        $request['recordsFiltered']=intval($result->num_rows);
        $request['data'] = $resultData;

      } catch (Exception $e) {
          $request['code'] = 500;
          $request['status'] = 'error';
          $request['msm']= $e->getMessage();
      }
      return json_encode($request);
    }

    public function getslidermisa(){
      try {
        $sql =  "SELECT * FROM slider WHERE typeslider =  'misas'";
        $result = $this->con->query($sql);
        $resultData = array();
        $position = 0;

        while (  $data = $result->fetch_assoc()) {
          $resultData[$position] = $data;
          $position++;
        }

        $draw = isset($_GET['draw']) ? $_GET['draw'] : 0;

        $request['code'] = 200;
        $request['status'] = 'success';
        $request['draw']=intval($draw);
        $request['recordsTotal']=intval($result->num_rows);
        $request['recordsFiltered']=intval($result->num_rows);
        $request['data'] = $resultData;

      } catch (Exception $e) {
          $request['code'] = 500;
          $request['status'] = 'error';
          $request['msm']= $e->getMessage();
      }
      return json_encode($request);
    }

    public function store($fileData){
      try {
        $rutafilesslider = "../src/asset/storage/slider";
        $rutaActual =$_SERVER['DOCUMENT_ROOT'] . __RUTA_LOCAL__;
        $rutafullname = $rutaActual . 'src/asset/storage/slider/'.strtr($_FILES['sliderimg']['name'], " ", "_");
        $img ='src/asset/storage/slider/'. strtr($_FILES['sliderimg']['name'], " ", "_");

        // crea la carpeta donde va todo los sliders
        if(!file_exists($rutafilesslider)){
            mkdir($rutafilesslider, 0777, true);
        }

        if(move_uploaded_file($_FILES['sliderimg']['tmp_name'], $rutafullname)){

          $sql = "INSERT INTO slider(url,typeslider,created_at,updated_at) VALUES('". $img ."','pricipal','". date('Y-m-d H:m:s') ."','". date('Y-m-d H:m:s') ."')";
          $sqlexist = "SELECT * FROM slider WHERE url='" . $img . "'";

          $resultexist = $this->con->query($sqlexist);

          if ($resultexist->num_rows == 0) {
            $result = $this->con->query($sql);

            if($result == 1){
              $request['code'] = 200;
              $request['status'] = "success";
              $request['msm'] = "Imagen registrado con exito";
            } else{
              $request['code'] = 202;
              $request['status'] = "warning";
              $request['msm'] = "Tubimos un problema al insertar la imagen";
            }
          } else{
            $request['code'] = 202;
            $request['status'] = "warning";
            $request['msm'] = "La imagen de slider ya existe";
          }

    		}else{
          $request['code'] = 202;
          $request['status'] = 'warning';
          $request['msm']= 'La imagen para slider no se pudo guardar';
    		}

      } catch (Exception $e) {
          $request['code'] = 500;
          $request['status'] = 'error';
          $request['msm']= $e->getMessage();
      }
      return json_encode($request);

    }

    public function storemisa($fileData){
      try {
        $rutafilesslider = "../src/asset/storage/slider";
        $rutaActual =$_SERVER['DOCUMENT_ROOT'] . __RUTA_LOCAL__;
        $rutafullname = $rutaActual . 'src/asset/storage/slider/'. strtr($_FILES['sliderimgmida']['name'], " ", "_");
        $img ='src/asset/storage/slider/'. strtr($_FILES['sliderimgmida']['name'], " ", "_");

        // crea la carpeta donde va todo los sliders
        if(!file_exists($rutafilesslider)){
            mkdir($rutafilesslider, 0777, true);
        }

        if(move_uploaded_file($_FILES['sliderimgmida']['tmp_name'], $rutafullname)){

          $sql = "INSERT INTO slider(url,typeslider,created_at,updated_at) VALUES('". $img ."','misas','". date('Y-m-d H:m:s') ."','". date('Y-m-d H:m:s') ."')";
          $sqlexist = "SELECT * FROM slider WHERE url='" . $img . "'";

          $resultexist = $this->con->query($sqlexist);

          if ($resultexist->num_rows == 0) {
            $result = $this->con->query($sql);

            if($result == 1){
              $request['code'] = 200;
              $request['status'] = "success";
              $request['msm'] = "Imagen registrado con exito";
            } else{
              $request['code'] = 202;
              $request['status'] = "warning";
              $request['msm'] = "Tubimos un problema al insertar la imagen";
            }
          } else{
            $request['code'] = 202;
            $request['status'] = "warning";
            $request['msm'] = "La imagen de slider ya existe";
          }

        }else{
          $request['code'] = 202;
          $request['status'] = 'warning';
          $request['msm']= 'La imagen para slider no se pudo guardar';
        }

      } catch (Exception $e) {
          $request['code'] = 500;
          $request['status'] = 'error';
          $request['msm']= $e->getMessage();
      }
      return json_encode($request);

    }

    public function delete($datarequest){
      try {
        $rutaActual =$_SERVER['DOCUMENT_ROOT'] . __RUTA_LOCAL__;
        $idfull = isset($datarequest['id']) ? : 0;
        //print_r($datarequest);

        if($datarequest['id'] != 0){
          $sql = "DELETE FROM slider WHERE id=". $datarequest['id'];
          $sqlexist = "SELECT * FROM slider WHERE id=".$datarequest['id'];

           $resultexist = $this->con->query($sqlexist);
           $data =  $resultexist->fetch_object();
           $datare = $resultexist->num_rows;

           if($datare > 0){
             $result = $this->con->query($sql);
             if($result == 1){
               // borrar archivo
               $a = unlink($rutaActual.$data->url);

               $request['code'] = 200;
               $request['status'] = 'success';
               $request['msm']= "La imagen fue eliminado del slider";
             } else{
               $request['code'] = 202;
               $request['status'] = 'warning';
               $request['msm']= "Tubimos un problema al eliminar la imagen del slider 1";
             }
           } else{
             $request['code'] = 202;
             $request['status'] = 'warning';
             $request['msm']= "Tubimos un problema al eliminar la imagen del slider 2";
           }
           //print_r($rutaActual.$data['url']);

        } else{
          $request['code'] = 202;
          $request['status'] = 'warning';
          $request['msm']= "No se encontro la imagen, intente otraves";
        }

      } catch (Exception $e) {
        $request['code'] = 500;
        $request['status'] = 'error';
        $request['msm']= $e->getMessage();
      }
      return json_encode($request);

    }

  }

 ?>
