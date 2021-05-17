<?php
    include_once("config/Conexion.php");
    header("Content-Type: aplication/json");

    $menu = new Menu();

      switch ($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if($_GET['menuss']=='menu'){
              $menus = $menu->geturl();
              echo  $menus;
            } else if($_GET['menuss'] == 'submenu'){
              $submenus = $menu->geturlsubmenu($_GET['id']);
              echo  $submenus;
            } else if($_GET['menuss'] == 'menuall'){
              $allmenu = $menu->geturlall();
              echo  $allmenu;
            } else if($_GET['menuss'] == 'menudisabled'){
              $diabledurl =  $menu->disableurl($_GET['id'],$_GET['statusurl']);
              echo  $diabledurl;
            }
        break;
        case 'POST':
        break;
        case 'PUT':
        break;
        case 'DELETE':
        break;
      }


      class Menu{
        private $con;
        private $request = array();

        public function __construct(){
          $conexion = $this->con = new Conexion();
          $this->con = $conexion->conectar();
        }

        public function geturl(){
          try {
            $sql = "SELECT * FROM menu WHERE activo='true'";
            $result = $this->con->query($sql);
            $position = 0;

            while ($data = $result->fetch_assoc()) {
              $resultData[$position] = $data;
              $position++;
            }
              $request['code'] = 200;
              $request['status'] = "success";
              $request['data'] =  $resultData;

          } catch (Exception $e) {
            $request['code'] = 500;
            $request['status'] = "error";
            $request['msm'] = $e->getMessage();
          }
          return json_encode($request);
        }

        public function geturlsubmenu($id){
          try {
            $sql = "SELECT * FROM submenu WHERE activo='true' AND id_menu=" . $id;
            $result = $this->con->query($sql);
            $position = 0;

            while ($data = $result->fetch_assoc()) {
              $resultData[$position] = $data;
              $position++;
            }
              $request['code'] = 200;
              $request['status'] = "success";
              $request['data'] =  $resultData;

          } catch (Exception $e) {
            $request['code'] = 500;
            $request['status'] = "error";
            $request['msm'] = $e->getMessage();
          }
          return json_encode($request);
        }

        public function geturlall(){
          try {
            $sql = "SELECT * FROM menu";
            $result = $this->con->query($sql);
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
            $request['status'] = "error";
            $request['msm'] = $e->getMessage();
          }
          return json_encode($request);
        }

        public function disableurl($id,$status){
          try {
            $sql = "UPDATE menu set activo = '".$status."' WHERE id=". $id;
             $result = $this->con->query($sql);
             $statusrequest = ($status == 'true' ? 'Se activo la url' : 'Se desactivo la url');
             if($result == 1){
               $request['code'] = 200;
               $request['status'] = 'success';
               $request['msm']= $statusrequest;
               
             } else{
               $request['code'] = 202;
               $request['status'] = 'warning';
               $request['msm']= "No pudo cambiar el status de la url";
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
