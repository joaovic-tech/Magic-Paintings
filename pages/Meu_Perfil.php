<?php 
include '../assets/PHP/Conexao_Banco.php';
// Encontrar Logado
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location: ./Login.php');   
}
$usuario_logado = $_SESSION['nome-user'];
$IdUser = mysqli_insert_id($conexao);

require '../assets/PHP/dados_perfil.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/styles/Menuhover.css">
    <link rel="stylesheet" href="../assets/styles/Geral.css">
    <link rel="stylesheet" href="../assets/styles/Meu_Perfil.css"> 
    <title id="Nome-Site">Perfil | <?php echo $usuario_logado ?></title>              
</head>
<body>
    <nav id='nav'>        
        <a class="logo" href="#topo">Magic Paintings</a>
        <div id='juntar'>
        <ul class="list_menu">
            <label for="" class='hoverCLASS' id='B_Nav'>Páginas<i style="display: none; font-size: 24px;" class="fas fa-sort-down"></i></label>                
            <div class="div_nav" id='d' style="display: none;">
                <i class="fas fa-sort-up Icon_up"></i>
                <li><a class="btn_nav" href="./Inicio.php"><i style="margin-right: 15px;"  class="fas fa-home"></i> Inicio</a></li>
                <li><a class="btn_nav" href="./editar_perfil.php"><i style="margin-right: 15px;"  class="fas fa-user-edit"></i> Editar perfil</a></li>
                <li><a class="btn_nav" href="../ajuda.php"><i style="margin-right: 15px;"  class="fas fa-question-circle"></i> Ajuda</a></li>
                <li><a class="btn_nav" href="./Sobre.php"><i style="margin-right: 15px;"  class="fas fa-info-circle"></i> Sobre</a></li>
            </div>            
        </ul>
        <ul class="list_menu">
            <label for="" class='hoverCLASS' id='B_Nav2'>Atalhos<i style="display: none; font-size: 24px;" class="fas fa-sort-down"></i></label>
            <div class="div_nav" id='d2' style="display: none;">
                <i class="fas fa-sort-up Icon_up"></i>                    
                <li><a class="btn_nav" href="#MenuPublicar" id="btn_Adicionar2"><i style="margin-right: 15px;"  class="fas fa-plus"></i> Publicar</a></li>
            </div>
        </ul>
        <li><a href="../assets/PHP/loginOFF.php" id="btn-sair"><i style="margin-right: 15px;" class="fas fa-sign-out-alt"></i>Sair</a></li>
        </div>
    </nav> 
    <div class="container">     
        <div class="ContAdmin">         <!-- Foto tem que ser menor que 338 x 338 -->
            <div id="AdminForm">
                <div id="divIMGAdmin">
                <?php require '../assets/PHP/FP_UsuarioLogado.php' ?>                      
                <?php
                if(isset($_SESSION['msg_publicar'])){
                    echo $_SESSION['msg_publicar'];
                    unset($_SESSION['msg_publicar']);

                }    
                
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }                    
                ?>  
                </div>              
                <div class="Info-Admin">
                    <div id="AreaPerfil">
                        <h1 id="Nome-Admin"><?php echo $usuario_logado ?></h1>
                        <p id="Desc-Admin"><?php echo $Desc_Perfil ?></p>                                                        
                    </div>
                    <a id="btn_editP" href="./editar_perfil.php"><i class="fas fa-user-edit "></i>    Conta</a>                                            
                </div>
            </div>
            <h4 class="TextE">Clique em ADICIONAR para publicar uma nova pintura</h4>
            <div id="div_link">                
                <?php if($Email != 'nenhum'){ echo "<a class='Redes' href='".'mail:'.$Email."'><i class='fas fa-envelope E'></i></a>";} ?>
                <?php if($Whats != 'nenhum'){ echo "<a class='Redes' href='".'https://wa.me/+'.$Whats."'><i class='fab fa-whatsapp W'></i></a>";} ?>
                <?php if($Insta_Perfil != 'nenhum'){ echo "<a class='Redes' href='".'https:/www.instagram.com/'.$Insta_Perfil."'><i class='fab fa-instagram I'></i></a>";} ?>
                <?php if($Twitter_Perfil != 'nenhum'){ echo "<a class='Redes' href='".'https://wa.me/'.$Twitter_Perfil."'><i class='fab fa-twitter T'></i></a>";} ?>  
                <a href="#MenuPublicar" id="btn-Adicionar" class="botaoA"><i class="fas fa-plus IconG"></i>Adicionar</a>
            </div>
            <?php
            if(isset($_SESSION['msg_pintura'])){
                echo $_SESSION['msg_pintura'];
                unset($_SESSION['msg_pintura']);
            }
            ?>
            <?php                
            if(isset($_SESSION['msg_deletar'])){
                echo $_SESSION['msg_deletar'];
                unset($_SESSION['msg_deletar']);
            }                
            ?>
        </div>    
            <div id="Cont-Master">                    
                <form action="../assets/PHP/Publicar_Pintura.php" method="POST" enctype="multipart/form-data" id="MenuPublicar">
                    <h2>Publicar</h2>
                    <div id="MenuSepara">
                        <div id="MS-1">
                            <input type="text" minlength = "3" maxlength = "150" id="inputP_autor" class="InputPublic" name="NomeAltor" placeholder="Digite o nome do autor" required>
                            <input type="text" minlength = "3" maxlength = "50" id="inputP_Nome_Pintura" class="InputPublic" name="NomeFoto" placeholder="Digite o nome da pintura" required>
                            <textarea name="DescriçãoFoto" id="InputPublicD" style="resize: none;" cols="100" rows="10" minlength = "3" maxlength = "150"  maxlength="220" placeholder="Digite a descrição da pintura"></textarea>
                        </div>
                        <div id="MS-2">   
                            <input type="file" class="form-control-file" name="arquivo" id="SelectIMG" accept="image/*" required>  
                            <label for="SelectIMG" id="Select_img_public"><i class="fas fa-images"></i> Imagem</label>                                                 
                            <div id="divIMG">
                                <img src="" id="IMGpublic">          
                            </div>    
                            <button type="submit" id="btn_publicar" name="Publicar" class="btn-SP">Publicar</button>                    
                        </div>                                          
                    </div> 
                    <br>
                </form>

                <?php require '../assets/PHP/Pinturas_Usuario.php' ?>                                                                                      
            </div>                                
    </div>          
                    <!-- Scripts -->
    <script src="../assets/JS/Geral.js"></script>
    <script src="../assets/JS/Meu_Perfil.js"></script>
    <script src="../assets/JS/Menu.js"></script>
 </body>
</html> 