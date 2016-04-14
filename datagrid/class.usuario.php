<?php

class Gestion_Usuarios{
  function ValidaUsuario($correo, $clave){
      $pdo = Basedatos::Connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM adsi_usuarios WHERE correo = ? AND clave = ?";

      $query = $pdo->prepare($sql);

      $query->execute(array($correo, $clave));
      // fetch cuando voy a mostrar un solo registro
      // fetchALL cuando voy a mostrar mas de un registro

      $results = $query->fetch(PDO::FETCH_BOTH);
      Basedatos::Disconnect();

      return $results;
    }

    function ReadAll(){
        $pdo = Basedatos::Connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM adsi_usuarios";

        $query = $pdo->prepare($sql);

        $query->execute();
        // fetch cuando voy a mostrar un solo registro
        // fetchALL cuando voy a mostrar mas de un registro

        $results = $query->fetchALL(PDO::FETCH_BOTH);
        Basedatos::Disconnect();

        return $results;
      }


      function ReadbyId($codigo){
          $pdo = Basedatos::Connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = "SELECT * FROM adsi_usuarios WHERE id=?";

          $query = $pdo->prepare($sql);

          $query->execute(array($codigo));
          // fetch cuando voy a mostrar un solo registro
          // fetchALL cuando voy a mostrar mas de un registro

          $results = $query->fetch(PDO::FETCH_BOTH);
          Basedatos::Disconnect();

          return $results;
        }

        function Delete($codigo){
            $pdo = Basedatos::Connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM adsi_usuarios WHERE id = ?";

            $query = $pdo->prepare($sql);

            $query->execute(array($codigo));
            // fetch cuando voy a mostrar un solo registro
            // fetchALL cuando voy a mostrar mas de un registro

            Basedatos::Disconnect();

          }
}

 ?>
