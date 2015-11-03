<html>
  
  <head>
    <title>EverySpeak</title>
    <link rel="stylesheet" type="text/css" href="style.css"  />

  </head>
  
  <body>
    <?php
      session_start();
      if (!isset($_SESSION['k_username'])){
          header("Location: index.php");}
    ?>
    <div id = 'head'>
      <div id = 'tit'>EverySpeak</div>
      
      <div id = 'paginas'>
        <a href="indexcli.php"><div class = 'liga'>Inicio</div></a>
        <a href="busqueda.php"><div class = 'liga'>Busqueda</div></a>
        <a href="perfil.php"><div class = 'liga'>Perfil</div></a>
        <a href="chat.php"><div class = 'liga'>Chat</div></a>
        <a href="contacto.php?id=1"><div class = 'liga'>Contacto</div></a>
        <a href="salir.php"><div class = 'liga'>Salir</div></a>
      </div>
    </div>
    
    <div id = 'cont'>
      <div id = 'temp'> 
          <div id = "sidebar">
            <?php
              $my_id = $_SESSION['k_username'];
              
              $link=mysqli_connect("localhost","root","");
              mysqli_select_db($link,"dsw");
              
              $res =  mysqli_query($link,"select id_u from Usuario where
                Usuario.nombre_u = '$my_id'");
              while($roe=mysqli_fetch_array($res))
              {
                $id_u = $roe['id_u'];
              }
              $result=mysqli_query($link,"select amigo2, nombre_u from Amigos, Usuario where
                Amigos.amigo1 = '$id_u' and Usuario.id_u = Amigos.Amigo2");
              while($row=mysqli_fetch_array($result))
              {
                $am = $row['nombre_u'];
                echo "<div class = 'contact'>$am<br></BUTTON></div>";
                
              }
              mysqli_close($link);
            ?>
          </div>
          <div id="conv"><br>
            <?php
              $link=mysqli_connect("localhost","root","");
              mysqli_select_db($link,"dsw");
              
              $res =  mysqli_query($link,"select id_u from Usuario where
                Usuario.nombre_u = '$my_id'");
            ?>
            <textarea id="msj"></textarea><h2>
            <input type ="submit" id = "env" class = "send" value="Enviar"></h2>
          </div>
      </div>
      
      
    </div>
    <div id = 'footer'>Copyright || Jesus Paleta, Liam Morales</div>
  </body>
  
</html>
