<?php
    class Alumno {
        public $id;
        public $nombre;
        public $ap_paterno;
        public $ap_materno;
        public $grado;

        public function __construct($id, $nombre, $ap_paterno, $ap_materno, $grado){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->ap_paterno = $ap_paterno;
            $this->ap_materno = $ap_materno;
            $this->grado = $grado;
        }

        public function getid(){
            return $this->id;
        }

        public function setid($id){
            $this->id = $id;
            return $this;
        }

        public function getnombre(){
            return $this->nombre;
        }

        public function setnombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        public function getap_paterno(){
            return $this->ap_paterno;
        }

        public function setap_paterno($ap_paterno){
            $this->ap_paterno = $ap_paterno;
            return $this;
        }

        public function getap_materno(){
            return $this->ap_materno;
        }

        public function setap_materno($ap_materno){
            $this->ap_materno = $ap_materno;
            return $this;
        }

        public function getgrado(){
            return $this->grado;
        }

        public function setgrado($grado){
            $this->gradp = $grado;
            return $this;
        }

        public function __toString(){
            return $this->nombre . " | " .
            $this->ap_paterno . " | " .
            $this->ap_materno . " | " .
            $this->grado . " | ";
        }

        public static function consultarAlumnos() {
            // Set database credentials
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumno";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // Perform query
            $sql = "SELECT * FROM alumno.alumnos_info";
            $result = $conn->query($sql);
            // Check for errors
            if (!$result) {
                die("Error: " . $sql . "<br>" . $conn->error);
            }
            // Process results
            while ($row = $result->fetch_assoc()) {
                // show each row content
                echo " [ID: " . $row["id"]." | ";
                echo "Nombre: " . $row["nombre"]." | ";
                echo "Apellido Paterno: " . $row["ap_paterno"]." | " ;
                echo "Apellido Materno: " . $row["ap_materno"] ." | ";
                echo "Grado: " . $row["grado"] . "] ";
            }
            // Close connection
            $conn->close();

        }

        public function guardarAlumno() {
            // Set database credentials
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumno";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "INSERT INTO alumnos_info (id, nombre, ap_paterno, ap_materno, grado)
                    VALUES ('$this->id','$this->nombre', '$this->ap_paterno', '$this->ap_materno', '$this->grado')";
            if ($conn->query($sql) === TRUE) {
                echo " [ID: " . $this->id." | ";
                echo "Nombre: " . $this->nombre." | ";
                echo "Apellido Paterno: " . $this->ap_paterno." | " ;
                echo "Apellido Materno: " . $this->ap_materno ." | ";
                echo "Grado: " . $this->grado . "] ";
            }
            else{
                die("Error: " . $sql . "<br>" . $conn->error);
            }
            // Close connection
            $conn->close();
        }

        public static function consultarAlumno($indice) {
            // Set database credentials
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumno";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // Perform query
            $sql = "SELECT * FROM alumno.alumnos_info WHERE id = '$indice'";
            $result = $conn->query($sql);

            // Check for errors
            if (!$result) {
                die("Error: " . $sql . "<br>" . $conn->error);
            }

            // Process results
            while ($row = $result->fetch_assoc()) {
                // show each row content
                echo " [ID: " . $row["id"]." | ";
                echo "Nombre: " . $row["nombre"]." | ";
                echo "Apellido Paterno: " . $row["ap_paterno"]." | " ;
                echo "Apellido Materno: " . $row["ap_materno"] ." | ";
                echo "Grado: " . $row["grado"] . "] ";
            }

            // Close connection
            $conn->close();
        }

        public static function eliminarAlumno($indice) {
            // Set database credentials
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumno";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "DELETE FROM alumnos_info
                    WHERE id='$indice'";
            if ($conn->query($sql) === TRUE) {
                echo " ELIMINADO => ";
                echo " [ID: " . $indice." | ";
            }
            else{
                die("Error: " . $sql . "<br>" . $conn->error);
            }
            // Close connection
            $conn->close();

        }

        public function actualizarAlumno($indice) {
            // Set database credentials
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "alumno";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "UPDATE alumnos_info
                    SET id='$this->id', nombre='$this->nombre', ap_paterno='$this->ap_paterno', 
                    ap_materno='$this->ap_materno', grado='$this->grado'
                    WHERE id='$indice'";
            if ($conn->query($sql) === TRUE) {
                echo " [ID: " . $this->id." | ";
                echo "Nombre: " . $this->nombre." | ";
                echo "Apellido Paterno: " . $this->ap_paterno." | " ;
                echo "Apellido Materno: " . $this->ap_materno ." | ";
                echo "Grado: " . $this->grado . "] ";
            }
            else{
                die("Error: " . $sql . "<br>" . $conn->error);
            }
            // Close connection
            $conn->close();
        }
    }
?>