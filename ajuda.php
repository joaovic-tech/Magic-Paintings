<?php
include_once('./assets/PHP/Conexao_Banco.php');
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
}else{
  $usuario_logado = $_SESSION['nome-user'];
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/ajuda.css">
    <link rel="stylesheet" href="./assets/styles/Geral.css">
    <link rel="stylesheet" href="./assets/styles/UsuarioLogado.css">
    <title>Ajuda | Magic Paintings</title>
</head>
<body>            
      <?php  
      if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        ?>  <!-- Usuario OFF -->
        <nav id="nav_menu">
          <h2 id="TituloMenu">Magic Paintings</h2>
          <a class="menu-link" href="./index.html"><i class="fas fa-home"></i>   Inicio</a>  
        </nav>         
        <section id="instrucoes">
          <div id="div_1">
            <div class="card_instru">
              <h1>Como cadastrar usuário?</h1>
              <p><label for="">Campo Nome: </label> Esse campo só aceita letras maiúsculas, minúsculas e números e não pode existe usuários com o mesmo nome.<br> <br>
              <label for="">Campo Sobrenome: </label> Esse campo aceita qualquer tipo de letra, numero ou símbolo. <br> <br>
              <label for="">Campo Email: </label> Esse campo é onde você irar colocar seu email. <br> <br>
              <label for="">Campo Senha: </label> Esse campo aceita qualquer tipo de letra, numero ou símbolo. <br> <br>
              <label for="">Campo Telefone: </label> Esse campo aceita só numeros.</p>
            </div>
            <div class="card_instru">
              <h1>Tela Etapa</h1>
              <p>Essa tela você irar construir seu perfil adicionando informações e sua foto de perfil</p>
            </div>
          </div>
          <div id="div_2">
            <div class="card_instru">
              <h1>Como publicar uma imagem?</h1>
              <p>Para postar uma imagem você tera que ir em seu perfil e clicar em Adicionar <br>
              Campos de texto: Você pode colocar qualquer tipo de letra, numero ou símbolo. <br>
              E só poderá publicar com uma imagem adicionada.</p>
            </div>
            <div class="card_instru">
              <h1>Como editar seu perfil?</h1>
              <p>Para editar seu perfil você terá que ir no seu perfil e clicar em editar perfil <br>
              Lá haverá vários campos iguais as telas anteriores e com o mesmo esquema de valida nomes <br>
              Essa tela você pode também APAGAR SUA CONTA!</p>
            </div>
          </div>                  
        </section>  
        <div id="Lembrete">
          <h2>Lembre-se</h2>
          <p>Você só poderar ver as imagens com cadastro no site Magic Paintings!</p>
        </div>  
        <section id="Master">        
            <div id="container">              
              <div class="card">
                  <h2 id="T1">Dica para você</h2>
                  <p id="T2">Relate ao lado oque você gostaria que nós 
                              mudássemos ou tire uma print e mostre o problema que encontruo 
                              com isso você vai nos ajudar bastante para um melhor funcionamento 
                              em nosso site.
                  </p>
                  <p id="T2">Vamos ajuda você no que precisar</p>
              </div>  
              <form action="./ajuda.html" method="post" enctype="media">
                <div class="card">
                  <div id="e">
                    <h2 id="T1">Conte-nos</h2>
                    <p id="T2">Mande uma mensagem por aqui e caso deseja adicione uma imagem clique em adicionar imagem abaixo</p> 
                    <input type="text" name="mensagem" id="Input_mensagem" placeholder='Digite aqui...'>
                  </div>
                  <input type="submit" value="Enviar" name="btn_enviar" id="btn_enviar"> 
                  <div id="divIMG">
                        <img src="" id="IMGpublic">          
                  </div>          
                    <input type="file" class="form-control-file" name="arquivo" id="SelectIMG" accept="image/*">  
                    <label for="SelectIMG" id="Select_img_public">Adicionar imagem</label>  
                </div>             
              </form>
          </div>       
      </section>
        <?php
      }
      else{
        ?>
        <nav id="nav_menu">
          <h2 id="TituloMenu">Magic Paintings</h2>
          <a class="menu-link" href="./assets/PHP/verificarETAPA.php"><i class="fas fa-home"></i>   Inicio</a>  
        </nav> 

        <div id="CardUser">
        <div id="Img_UserL">
          <?php
          // pegar a foto do usuario logado 

          $pasta = './assets/IMAGES/Foto_Perfil/'.$usuario_logado.'/';

          if (file_exists("$pasta")) {
              /* echo 'existe'; */
              $diretorio = dir($pasta);

              while($FP_Usuario = $diretorio->read()){
                  if($FP_Usuario != '.' && $FP_Usuario != '..'){                
                      ?>
                      
                      <?php echo "<a id='linkUser' href='./pages/Meu_Perfil.php'><img src='".$pasta.$FP_Usuario."' id='Img-UsuarioL'></a>"; ?>           
                      
                      <?php
                  }    
              }
          }
          ?>                                         
          </div>
          <h3 id="Nome_User"><?php echo $usuario_logado ?></h3>
        </div>
        <section id="instrucoes">
          <div id="div_1">
            <div class="card_instru">
              <h1>Tela Etapa</h1>
              <p>Essa tela você irar construir seu perfil adicionando informações e sua foto de perfil</p>
            </div>
          </div>
          <div id="div_2">
            <div class="card_instru">
              <h1>Como publicar uma imagem?</h1>
              <p>Para postar uma imagem você tera que ir em seu perfil e clicar em Adicionar <br>
              Campos de texto: Você pode colocar qualquer tipo de letra, numero ou símbolo. <br>
              E só poderá publicar com uma imagem adicionada.</p>
            </div>
            <div class="card_instru">
              <h1>Como editar seu perfil?</h1>
              <p>Para editar seu perfil você terá que ir no seu perfil e clicar em editar perfil <br>
              Lá haverá vários campos iguais as telas anteriores e com o mesmo esquema de valida nomes <br>
              Essa tela você pode também APAGAR SUA CONTA!</p>
            </div>
          </div>                  
        </section>  
        <div id="Lembrete">
          <h2>Lembre-se</h2>
          <p>Você só poderar ver as imagens com cadastro no site Magic Paintings!</p>
        </div>
        <section id="Master">        
            <div id="container">          
            <div class="card">
                    <h2 id="T1">Dica para você <?php echo $usuario_logado; ?></h2>
                    <p id="T2">Relate ao lado oque você gostaria que nós 
                                mudássemos ou tire um print e mostre o problema que encontruo 
                                com isso você vai nos ajudar bastante para um melhor funcionamento 
                                em nosso site.
                    </p>
                    <p id="T2">Vamos ajuda você no que precisar</p>
                </div>
                <form action="./ajuda.html" method="post" enctype="media">
                  <div class="card">
                    <div id="e">
                      <h2 id="T1">Conte-nos</h2>
                      <p id="T2">Mande uma mensagem por aqui e caso deseja adicione uma imagem clique em adicionar imagem abaixo</p> 
                      <input type="text" name="mensagem" id="Input_mensagem" placeholder='Digite aqui...'>
                    </div>
                    <input type="submit" value="Enviar" name="btn_enviar" id="btn_enviar"> 
                    <div id="divIMG">
                          <img src="" id="IMGpublic">          
                    </div>          
                      <input type="file" class="form-control-file" name="arquivo" id="SelectIMG" accept="image/*">  
                      <label for="SelectIMG" id="Select_img_public">Adicionar imagem</label>  
                  </div>             
                </form>
            </div>       
        </section>
        <?php
      }
    ?>

    <footer id="desenvolvedores">
        <h2>Desenvolvedores</h2>
        
        <div id="desig">
          <div class="desen">
            <img class="img-P" src="./assets/IMAGES/img_settings/astronauta.jpg" alt="Isabella">
            <h3>João Victor</h3>
          </div>
          <p>Bla bla bla</p>
          <div class="social-media">
            <a href="#"><i class="fab fa-instagram Redes"></i></a>
            <a href="#"><i class="fab fa-facebook Redes"></i></a>
            <a href="https://github.com/Joao-A17"><i class="fab fa-github Redes"></i></a>
          </div>
        </div>
        <div id="desig">
          <div class="desen">
            <img class="img-P" src="./assets/IMAGES/img_settings/astronauta.jpg" alt="Isabella">
            <h3>Isabella Oliveira</h3>
          </div>
          <p>Bla bla bla</p>
          <div class="social-media">
            <a href="#"><i class="fab fa-instagram Redes"></i></a>
            <a href="#"><i class="fab fa-facebook Redes"></i></a>
            <a href="https://github.com/bellinha524"><i class="fab fa-github Redes"></i></a>
          </div>
        </div>
        <div id="desig">
          <div class="desen">
            <img class="img-P" src="./assets/IMAGES/img_settings/astronauta.jpg" alt="Isabella">
            <h3>Kauã Vieira</h3>
          </div>
          <p>Bla bla bla</p>
          <div class="social-media">
            <a href="#"><i class="fab fa-instagram Redes"></i></a>
            <a href="#"><i class="fab fa-facebook Redes"></i></a>
            <a href="https://github.com/kah66"><i class="fab fa-github Redes"></i></a>
          </div>
        </div>
      </footer>
      <script src="./assets/JS/ajuda.js"></script>
</body>
</html>