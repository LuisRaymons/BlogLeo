<?php
include_once ("config/Conexion.php");
header("Content-Type: aplication/json");
$video = new Video();
switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        $videoall = $video->getVideoAll($_GET);
        echo $videoall;
    break;

    case 'POST':
      $videostore =   $video->store($_POST,$_FILES);
      echo $videostore;
    break;

    case 'PUT':
    break;

    case 'DELETE':
      $videodelete = $video->delete($_GET);
      echo $videodelete;
    break;
}

class Video
{
    private $con;
    private $request = array();

    public function __construct()
    {
        $conexion = $this->con = new Conexion();
        $this->con = $conexion->conectar();
    }

    public function getVideoAll($requestDe)
    {
        try
        {

            if($requestDe['typetable'] == 'principal'){
              $sql = "SELECT * FROM videos WHERE typevideo='pricipal'";
            } else{
              $sql = "SELECT * FROM videos WHERE typevideo='misas'";
            }

            $result = $this->con->query($sql);
            $resultData = array();
            $position = 0;

            while ($data = $result->fetch_assoc())
            {
                $resultData[$position] = $data;
                $position++;
            }

            $draw = isset($_GET['draw']) ? $_GET['draw'] : 0;

            $request['code'] = 200;
            $request['status'] = 'success';
            $request['draw'] = intval($draw);
            $request['recordsTotal'] = intval($result->num_rows);
            $request['recordsFiltered'] = intval($result->num_rows);
            $request['data'] = $resultData;
        }
        catch(Exception $e)
        {
            $request['code'] = 500;
            $request['status'] = 'error';
            $request['msm'] = $e->getMessage();
        }

        return json_encode($request);

    }

    public function store($request, $filedata)
    {
        try
        {
          if($request['typeInsertvideo'] == 'pricipal'){
            $rutafilesslider = "../src/asset/storage/videos/principal";
            $rutaActual = $_SERVER['DOCUMENT_ROOT'] . __RUTA_LOCAL__;
            $rutafullname = $rutaActual . 'src/asset/storage/videos/principal/' . str_replace(" ","-",trim($_FILES['videoadd']['name']));
            $video = 'src/asset/storage/videos/principal/' . str_replace(" ","-",trim($_FILES['videoadd']['name']));

            // crea la carpeta donde va todo los sliders
            if (!file_exists($rutafilesslider))
            {
                mkdir($rutafilesslider, 0777, true);
            }
            if (move_uploaded_file($_FILES['videoadd']['tmp_name'], $rutafullname))
            {
                $sql = "INSERT INTO videos(url,titulo,typevideo,created_at,updated_at) VALUES('" . $video . "','" . $request['titulo'] . "','pricipal','" . date('Y-m-d H:m:s') . "','" . date('Y-m-d H:m:s') . "')";
                $sqlexist = "SELECT * FROM videos WHERE url='" . $video . "'";

                $resultexist = $this
                    ->con
                    ->query($sqlexist);

                if ($resultexist->num_rows == 0)
                {
                    $result = $this
                        ->con
                        ->query($sql);

                    if ($result == 1)
                    {
                        $request['code'] = 200;
                        $request['status'] = "success";
                        $request['msm'] = "Video registrado con exito";
                        $request['seres'] = $request;
                    }
                    else
                    {
                        $request['code'] = 202;
                        $request['status'] = "warning";
                        $request['msm'] = "Tubimos un problema al insertar el video";
                    }
                }
                else
                {
                    $request['code'] = 202;
                    $request['status'] = "warning";
                    $request['msm'] = "El video ya existe";
                }

            }
            else
            {
                $request['code'] = 202;
                $request['status'] = 'warning';
                $request['msm'] = 'La imagen para slider no se pudo guardar';
            }

          } else if($request['typeInsertvideo'] == 'misas'){
            $rutafilesslider = "../src/asset/storage/videos/misa";
            $rutaActual = $_SERVER['DOCUMENT_ROOT'] . __RUTA_LOCAL__;
            $rutafullname = $rutaActual . 'src/asset/storage/videos/misa/' . str_replace(" ","-",trim($_FILES['videoadd']['name']));
            $video = 'src/asset/storage/videos/misa/' . str_replace(" ","-",trim($_FILES['videoadd']['name']));

            // crea la carpeta donde va todo los sliders
            if (!file_exists($rutafilesslider))
            {
                mkdir($rutafilesslider, 0777, true);
            }

            if (move_uploaded_file($_FILES['videoadd']['tmp_name'], $rutafullname))
            {
                $sql = "INSERT INTO videos(url,titulo,typevideo,created_at,updated_at) VALUES('" . $video . "','" . $request['titulo'] . "','misas','" . date('Y-m-d H:m:s') . "','" . date('Y-m-d H:m:s') . "')";
                $sqlexist = "SELECT * FROM videos WHERE url='" . $video . "'";

                $resultexist = $this
                    ->con
                    ->query($sqlexist);

                if ($resultexist->num_rows == 0)
                {
                    $result = $this
                        ->con
                        ->query($sql);

                    if ($result == 1)
                    {
                        $request['code'] = 200;
                        $request['status'] = "success";
                        $request['msm'] = "Video registrado con exito";
                    }
                    else
                    {
                        $request['code'] = 202;
                        $request['status'] = "warning";
                        $request['msm'] = "Tubimos un problema al insertar el video";
                    }
                }
                else
                {
                    $request['code'] = 202;
                    $request['status'] = "warning";
                    $request['msm'] = "El video ya existe";
                }

            }
            else
            {
                $request['code'] = 202;
                $request['status'] = 'warning';
                $request['msm'] = 'La imagen para slider no se pudo guardar';
            }
          }

        }
        catch(Exception $e)
        {
            $request['code'] = 500;
            $request['status'] = 'error';
            $request['msm'] = $e->getMessage();
        }

          return json_encode($request);

    }

    public function delete($datarequest){
      try {
        $rutaActual =$_SERVER['DOCUMENT_ROOT'] . __RUTA_LOCAL__;
        $idfull = isset($datarequest['id']) ? : 0;
        //print_r($datarequest);

        if($datarequest['id'] != 0){
          $sql = "DELETE FROM videos WHERE id=". $datarequest['id'];
          $sqlexist = "SELECT * FROM videos WHERE id=".$datarequest['id'];

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
               $request['msm']= "El video fue eliminado con exito";
             } else{
               $request['code'] = 202;
               $request['status'] = 'warning';
               $request['msm']= "Tubimos un problema al eliminar el video";
             }
           } else{
             $request['code'] = 202;
             $request['status'] = 'warning';
             $request['msm']= "Tubimos un problema al eliminar el video";
           }
           //print_r($rutaActual.$data['url']);

        } else{
          $request['code'] = 202;
          $request['status'] = 'warning';
          $request['msm']= "No se encontro el video, intente otraves";
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
