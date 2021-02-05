<?php

class Cliente {
    //Estado
    private $dni;
    private $nombre;
    private $apellidos;
    private $fnac;
    private $email;

    //Comportamiento
    function __construct($dni,$nombre,$apellidos,$fnac,$email) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fnac = $fnac;
        $this->email = $email;
    }

    //darse de alta
    function darAlta($conn) {
        $sql = "INSERT INTO clientes (dni,nombre,apellidos,fechadenacimiento,email) VALUES ('$this->dni','$this->nombre','$this->apellidos','$this->fnac','$this->email');"; 

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            //hago la construccion del email y lo mando
            //$miEmail = new envioEmail();
            //$miEmail->sendMail();
        
    
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }

    function buscarCliente($busqueda,$tipoBusqueda,$conn){

                // Consulta para realizar la búsqueda en la base de datos
        $sql = "SELECT * FROM clientes WHERE ";
        switch ($tipoBusqueda){
          case "onom":
            $sql = $sql."nombre like '%$busqueda%';";
          break;
          case "oape":
            $sql = $sql."apellidos like '%$busqueda%';";
          break;
          case "omail":
            $sql = $sql."email like '%$busqueda%';";
          break;
          case "odni":
            $sql = $sql."dni like '%$busqueda%';";
          break;
          default:
            echo "Se ha producido un error durante la búsqueda.";
        }

        $resultado = mysqli_query($conn, $sql);

        // Consulta para realizar la busqueda en la base de datos
        if (mysqli_num_rows($resultado) > 0) {
          // Salida de datos por cada fila
          while($row = mysqli_fetch_assoc($resultado)) {
            echo "- Nombre: ".$row["nombre"].", Apellidos: ".$row["apellidos"].", Email: ".$row["email"].", DNI: ".$row["dni"]."<br>";
          }
        }else{
          echo "No se han encontrado resultados.";
        }



    }
    


   }
?>