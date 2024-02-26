<?php
            include("Db/ConDb.php");
            $getconnection = new Connection();
            $getconn1 = $getconnection->conn1();

            $consulta = "SELECT * FROM cliente";
            $resultado = mysqli_query($conn1, $consulta);
            while ($fila = mysqli_fetch_assoc($resultado))
            {
                echo "<tr>";
                    echo "<td>" . $fila["Cod_cliente"] . "</td>";
                    echo "<td>" . $fila["Nom_cliente"] . "</td>";
                    echo "<td>" . $fila["DNI_cliente"] . "</td>";
                    // Form para el boton eliminar
                    echo "<td>
                            <form action='eliminar_fila.php' method='POST'>
                                <input type='hidden' name='Cod_cliente' value='" . $fila["Cod_cliente"] . "'>
                                <input type='hidden' name='Nom_cliente' value='" . $fila["Nom_cliente"] . "'>
                                <input type='hidden' name='Ape_cliente' value='" . $fila["Ape_cliente"] . "'>
                                <input type='hidden' name='Email_cliente' value='" . $fila["Email_cliente"] . "'>
                                <input type='hidden' name='Tlf_cliente' value='" . $fila["Tlf_cliente"] . "'>
                                <input type='hidden' name='DNI_cliente' value='" . $fila["DNI_cliente"] . "'>
                                <input type='hidden' name='Cod_postal_cliente' value='" . $fila["Cod_postal_cliente"] . "'>
                                <input type='hidden' name='Localidad_cliente' value='" . $fila["Localidad_cliente"] . "'>
                                <input type='hidden' name='Provincia_cliente' value='" . $fila["Provincia_cliente"] . "'>
                                <input type='hidden' name='Observaciones' value='" . $fila["Observaciones"] . "'>

                                <input type='submit' name='eliminar' value='eliminar' onclick='return confirmacion()'>
                            </form>
                        </td>";
                    // Form para el boton actualizar
                    echo "<td>
                            <form action='actualizar_fila.php' method='POST'>
                                <input type='hidden' name='Cod_cliente' value='" . $fila["Cod_cliente"] . "'>
                                <input type='hidden' name='Nom_cliente' value='" . $fila["Nom_cliente"] . "'>
                                <input type='hidden' name='Ape_cliente' value='" . $fila["Ape_cliente"] . "'>
                                <input type='hidden' name='Email_cliente' value='" . $fila["Email_cliente"] . "'>
                                <input type='hidden' name='Tlf_cliente' value='" . $fila["Tlf_cliente"] . "'>
                                <input type='hidden' name='DNI_cliente' value='" . $fila["DNI_cliente"] . "'>
                                <input type='hidden' name='Cod_postal_cliente' value='" . $fila["Cod_postal_cliente"] . "'>
                                <input type='hidden' name='Localidad_cliente' value='" . $fila["Localidad_cliente"] . "'>
                                <input type='hidden' name='Provincia_cliente' value='" . $fila["Provincia_cliente"] . "'>
                                <input type='hidden' name='Observaciones' value='" . $fila["Observaciones"] . "'>
                                
                                
                                <input type='submit' name='editar' value='editar''>
                            </form>
                          </td>";
                echo "</tr>";
            }
            mysqli_close($getconn1);
            ?>