<input type="text" 
       name="usuario" 
       placeholder="Escribe tu nombre"
       minlength="3" 
       maxlength="50" 
       required>


<input type="password" name="clave" required>

<input type="email" name="correo" placeholder="email@ejemplo.com">

<input type="number" 
       name="edad" 
       min="18" 
       max="99" 
       step="1">

       <!-- Fechas-->
       <input type="date" name="fecha_nacimiento">
        <input type="time" name="hora">
        <input type="datetime-local" name="cita">

        <!-- Checkbox-->
        <input type="checkbox" name="acepto" value="1"> Acepto términos

        <!-- Checkbox varios-->
        <input type="checkbox" name="intereses[]" value="música"> Música
        <input type="checkbox" name="intereses[]" value="deporte"> Deporte
         
        <!-- Enviar-->
        <input type="submit" value="Enviar formulario">

        <select name="pais">
            <option value="es">España</option>
            <option value="mx">México</option>
            <option value="ar">Argentina</option>
        </select>
        
         <!-- Hidden-->   
        <input type='hidden' name='tablero' value='$strTablero'>

        <?php
        $dias = ["Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo"];

        foreach ($dias as $dia) {
            echo "<label>$dia:</label>";
            echo "<input type='text' name='dia_$dia'><br>";
        }
?>

