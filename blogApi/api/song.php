<?php
  include_once("config/Conexion.php");
  header("Content-Type: aplication/json");
  $song = new Song();
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
      if(isset($_GET['id'])){
        $songById = $song->getsongById($_GET['id']);
        echo $songById;
      } else{
        $songall = $song->getsong();
        echo $songall;
      }
    break;
    case 'POST':
      $songstore = $song->store($_FILES,$_POST);
      echo $songstore;
    break;
    case 'PUT':
    break;
    case 'DELETE':
      $songsdelete = $song->delete($_GET);
      echo $songsdelete;
    break;
  }

  class Song{
    private $con;
    private $request = array();

    public function __construct(){
      $conexion = $this->con = new Conexion();
      $this->con = $conexion->conectar();
    }

    public function getsong(){
        try {
          $sql =  "SELECT * FROM reproductor";
          $result = $this->con->query($sql);
          $resultData = array();
          $position = 0;

          while ($data = $result->fetch_assoc()) {
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

    public function getsongById($id){
      try {
        $idgull = $id + 1;
        $resultData = array();
        $ids = array();
        $position = 0;

        $sql =  "SELECT * FROM reproductor WHERE id=" . $idgull;
        $result = $this->con->query($sql);


        while ($data = $result->fetch_assoc()) {
          $resultData[$position] = $data;
          $position++;
        }

        $request['code'] = 200;
        $request['status'] = 'success';
        $request['data'] = $resultData;
        $request['id'] = $idgull;

      } catch (Exception $e) {
          $request['code'] = 500;
          $request['status'] = 'error';
          $request['msm']= $e->getMessage();
      }
      return json_encode($request);
    }

    public function store($fileData,$datarequest){
      try {
        $rutafilesslider = "../src/asset/storage/reproductor";
        $rutaActual =$_SERVER['DOCUMENT_ROOT'] . __RUTA_LOCAL__;
        $rutafullname = $rutaActual . 'src/asset/storage/reproductor/'. str_replace(" ","-",trim($fileData['filesong']['name']));
        $song ='src/asset/storage/reproductor/'. str_replace(" ","-",trim($fileData['filesong']['name']));

        // crea la carpeta donde va todo los sliders
        if(!file_exists($rutafilesslider)){
            mkdir($rutafilesslider, 0777, true);
        }

        if(move_uploaded_file($fileData['filesong']['tmp_name'], $rutafullname)){

          $sql = "INSERT INTO reproductor(url,nombre,created_at,updated_at) VALUES('". $song ."','". $datarequest['namesong'] ."','". date('Y-m-d H:m:s') ."','". date('Y-m-d H:m:s') ."')";
          $sqlexist = "SELECT * FROM reproductor WHERE url='" . $song . "'";

          $resultexist = $this->con->query($sqlexist);

          if ($resultexist->num_rows == 0) {
            $result = $this->con->query($sql);

            if($result == 1){
              $request['code'] = 200;
              $request['status'] = "success";
              $request['msm'] = "La cancion registrado con exito";
            } else{
              $request['code'] = 202;
              $request['status'] = "warning";
              $request['msm'] = "Tubimos un problema al insertar la cancion";
            }
          } else{
            $request['code'] = 202;
            $request['status'] = "warning";
            $request['msm'] = "La cancion ya existe";
          }

    		}else{
          $request['code'] = 202;
          $request['status'] = 'warning';
          $request['msm']= 'La cancion no se pudo guardar';
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
          $sql = "DELETE FROM reproductor WHERE id=". $datarequest['id'];
          $sqlexist = "SELECT * FROM reproductor WHERE id=".$datarequest['id'];

           $resultexist = $this->con->query($sqlexist);
           $data =  $resultexist->fetch_object();
           $datare = $resultexist->num_rows;

           if($datare > 0){
             $result = $this->con->query($sql);
             if($result == 1){
               // borrar archivo
               $songdelete = unlink($rutaActual.$data->url);

               $request['code'] = 200;
               $request['status'] = 'success';
               $request['msm']= "La cancion fue eliminado con exito";
             } else{
               $request['code'] = 202;
               $request['status'] = 'warning';
               $request['msm']= "Tubimos un problema al eliminar la cancion";
             }
           } else{
             $request['code'] = 202;
             $request['status'] = 'warning';
             $request['msm']= "Tubimos un problema al eliminar la cancion";
           }
           //print_r($rutaActual.$data['url']);

        } else{
          $request['code'] = 202;
          $request['status'] = 'warning';
          $request['msm']= "No se encontro la cancion, intente otraves";
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
