<?php
  include_once("config/Conexion.php");
  header("Content-Type: aplication/json");
  $descuento = new Descuento();

  switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
      $descuentoGet  = $descuento->getDescuento();
      echo $descuentoGet;
    break;
    case 'POST':
      if($_POST['method'] == 'oferta'){
        $descuentostoreoferta = $descuento->storeOferta($_POST);
        echo $descuentostoreoferta;
      } else if($_POST['method'] == 'regalo'){
          $descuentostoreregalo = $descuento->storeRegalo($_POST,$_FILES);
          echo $descuentostoreregalo;
      } else if($_POST['method'] == 'disabledpromo'){
          $disabledromo = $descuento->activateporcentaje($_POST);
          echo $disabledromo;
      }

    break;
    case 'PUT':
      $descuentoactivo = $descuento->activateporcentaje($_GET);
      echo $descuentoactivo;
    break;
    case 'DELETE':
    break;

  }

  class Descuento{
    private $con;
    private $request = array();

    public function __construct(){
      $conexion = $this->con = new Conexion();
      $this->con = $conexion->conectar();
    }

    public function getDescuento(){
      try {
        $sql =  "SELECT * FROM promomes order by id desc";
        $result = $this->con->query($sql);
        $data =  $result->fetch_object();

        $request['code'] = 200;
        $request['status'] = 'success';
        $request['data']= $data ;


      } catch (Exception $e) {
        $request['code'] = 500;
        $request['status'] = 'error';
        $request['msm']= $e->getMessage();
      }
      return json_encode($request);
    }

    public function storeOferta($request){
      try {
          $sqlofertaexistregalo = "SELECT * FROM promomes WHERE id=" . $request['iddescuento'] . " LIMIT 1";
          $resultoferta = $this->con->query($sqlofertaexistregalo);
          $dataOferta =  $resultoferta->fetch_object();

          $rutafilepromo = "../" . $dataOferta->url;

          if(file_exists($rutafilepromo)){
            $deletefile = unlink($rutafilepromo);
          }
          $sql = "UPDATE promomes SET porcentaje=" . $request['porcentajeUpdate'] .
                                  ", FechaInicioPromocion='" . $request['from']. "'" .
                                  ", basemoney=" . $request['baseporcentaje'].
                                  ", activo='true' " .
                                  ", FechaFinalPromocion='" . $request['to'] . "'" .
                                  ", descripcion = 'NULL' " .
                                  ", url = 'NULL' " .
                                  ", typeslider= 'oferta' ".
                                  ", updated_at = '" . date("Y-m-d H:m:s") . "'" .
                                  " WHERE id="  . $request['iddescuento'];
          $result = $this->con->query($sql);
          $request['code'] = 200;
          $request['status'] = "success";
          $request['msm'] = "Se modifico la promoción con exito";
          
      } catch (Exception $e) {
        $request['code'] = 500;
        $request['status'] = 'error';
        $request['msm']= $e->getMessage();
      }
      return json_encode($request);
    }

    public function storeRegalo($request,$file){
      try {
        $rutafilepromo = "../src/asset/storage/promo";
        $rutaActual = $_SERVER['DOCUMENT_ROOT'] . __RUTA_LOCAL__;
        $rutafullname = $rutaActual . 'src/asset/storage/promo/'.$_FILES['promocion-img']['name'];
        $img ='src/asset/storage/promo/'.$_FILES['promocion-img']['name'];

        // crea la carpeta donde va todo los sliders
        if(!file_exists($rutafilepromo)){
            mkdir($rutafilepromo, 0777, true);
        }

        $sqlofertaexistregalo = "SELECT * FROM promomes WHERE id=" . $request['iddescuento'] . " LIMIT 1";
        $resultoferta = $this->con->query($sqlofertaexistregalo);
        $dataOferta =  $resultoferta->fetch_object();

        $rutafilepromo = "../" . $dataOferta->url;
        if(file_exists($rutafilepromo)){
          $deletefile = unlink($rutafilepromo);
        }

        if(move_uploaded_file($_FILES['promocion-img']['tmp_name'], $rutafullname)){
              $sql = "UPDATE promomes SET porcentaje= 'NULL' "  .
                                      ", FechaInicioPromocion='" . $request['from']. "'" .
                                      ", basemoney= 'NULL' " .
                                      ", activo='true' " .
                                      ", FechaFinalPromocion='" . $request['to'] . "'" .
                                      ", descripcion = ' " . $request['promodesc'] . "'" .
                                      ", url = '" . $img . "'" .
                                      ", typeslider= 'regalo' ".
                                      ", updated_at = '" . date("Y-m-d H:m:s") . "'" .
                                      " WHERE id="  . $request['iddescuento'];

              $result = $this->con->query($sql);

              if($result == 1){
                $request['code'] = 200;
                $request['status'] = "success";
                $request['msm'] = "Se modifico el porcentaje con exito";
              } else{
                $request['code'] = 202;
                $request['status'] = "warning";
                $request['msm'] = "Tubimos un problema al modificar el porcentaje";
                $request['dif'] = $sql;
              }
        } else{
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

    public function activateporcentaje($request){
      try {

        $sql = "UPDATE promomes SET activo= 'false'  WHERE id=" . $request['id'];

        $result = $this->con->query($sql);

        if($result == 1){
          $request['code'] = 200;
          $request['status'] = "success";
          $request['msm'] = "Se desctivo el porcentaje con exito";
        } else{
          $request['code'] = 202;
          $request['status'] = "warning";
          $request['msm'] = "Tubimos un problema al descactivar el porcentaje";
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
