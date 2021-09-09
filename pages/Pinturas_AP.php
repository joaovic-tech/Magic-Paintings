<!-- <?php

    $msg = false;    

    
    if(isset($_POST['Publicar'])){
        
        include_once("../assets/PHP/Conexao_Banco.php");
        $Autor = filter_input(INPUT_POST, 'Autor', FILTER_SANITIZE_STRING);
        $NomeFoto = filter_input(INPUT_POST, 'nome-foto', FILTER_SANITIZE_STRING);
        $DescriçãoFoto = filter_input(INPUT_POST, 'descrição-foto', FILTER_SANITIZE_STRING);
        $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        $novo_nome = md5(time()).".".$extensao;
        $diretorio = "../assets/IMAGES/Fotos/";

        move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);

        $sql_code = "INSERT INTO pinturas (Autor, Nome da Foto, Descrição da foto, Imagem, Criado) VALUES ('$Autor', '$NomeFoto', '$DescriçãoFoto', '$novo_nome', NOW())";        
        if($Resultado_Publicação = mysqli_query($conexao, $sql_code))
            $msg = "Puiblicado com sucesso :)";            
        else
            $msg = "Falha: Tente Novamente ou  espere alguns minutos :(";
            
    }

?> -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/Geral.css">
    <link rel="stylesheet" href="../assets/styles/TP_Admin.css">  
    <title id="Nome-Site">Perfil | Magics Paintings</title>              
</head>
<body>
    <nav class="Menu">
        <a href="../InPinturas/InPinturas.html" class="Logo">Magics Paintings</a>            
        <a class="btn-menu" onclick="Voltar()"><i class="fas fa-chevron-left IconG"></i>Voltar</a>
    </nav>

    <div class="container">
        <div class="Fundo">       
            <div class="ContAdmin">         <!-- Foto tem que ser menor que 338 x 338 -->
                <form action="Pinturas_AP.php" method="POST" id="AdminForm">
                    <input type="file" class="form-control-file" name="foto" id="imgPerfil" accept="image/*">
                    <label for="imgPerfil" class="AlteraImg-Perfil">Alterar imagem<i style="margin-left: 10px;" class="fas fa-paint-brush"></i></label>   
                    <img class="Foto-Admin" src="https://img.freepik.com/vetores-gratis/astronauta-bonito-voando-no-espaco-dos-desenhos-animados-icone-ilustracao_138676-2702.jpg?size=338&ext=jpg&ga=GA1.2.2045703221.1627862400">                    
                    <div class="Info-Admin">
                        <div id="AreaPerfil">
                            <h1 id="Nome-Admin">MC Rodolfinho</h1>
                            <p id="Desc-Admin">Ao som do MC Rodolfinho HÀAAAAAAAAAAA os mlk é liso</p>
                            <div id="Menu-EditPerfil">                                
                                <input type="text" id="InputNomeAdmin" class="InputP" maxlength="60" placeholder="Alterar o Nome">
                                <input type="text" id="InputDescAdmin" class="InputP" maxlength="60" placeholder="Alterar a Descrição">
                            </div>
                            <button type="submit" id="BtnSP">Salvar</button>                                
                        </div>
                        <button type="button" class="btn-menu edp">Editar Perfil</button>
                    </div>
                </form>
                <h4 class="TextE">Envie uma mensagem para o pintor atrévez:</h4>
                <a class="Redes" href="mailto:joaovictorca2004@gmail.com"><i class="fas fa-envelope E"></i></a>
                <a class="Redes" href="https://wa.me/+554899227431"><i class="fab fa-whatsapp W"></i></a>
                <a class="Redes" href="#"><i class="fab fa-facebook F"></i></a>
                <a class="Redes" href="#"><i class="fab fa-instagram I"></i></a>
                <a class="Redes" href="#"><i class="fab fa-twitter T"></i></a>  
                <buttom id="Aparecer" class="btn-menu botaoA" onclick="AparecerE()"><i class="fas fa-cog IconG"></i>Editar Pinturas</buttom> 
                <buttom id="btn-add" class="btn-menu botaoA" ><i class="fas fa-plus IconG"></i>Adicionar</buttom>
            </div>    
                <div id="Cont-Master">
                    <div id="MSG">                        
                        <?php if($msg != false) echo "<p class='TextE' style='color: red;'>$msg</p>"; else echo "<p class='TextE' style='color: green;'>$msg</p>"; ?> 
                    </div>
                    <div class="Pint-Completa">
                        <div class="Fundo-Pint">
                            <img class="Pintura" src="../assets/IMAGES/Edits/Ban.png">
                        </div>                                          
                        <div class="Fundo-Desc">   
                            <h1 class="Nome-Pint">Nome da publicação</h1>
                            <p class="Desc-Pint">Descrição da publicação</p>
                            <button class="btn-delete" >Excluir<i class="fas fa-trash-alt IconE"></i></button> 
                            <form action="Pinturas_AP.php" method="POST" enctype="multipart/form-data" class="Editar">
                                <h2>Novas Alterações</h2>
                                <input type="text" id="InputAlt" name="Altor" placeholder="Digite o nome do autor">
                                <input type="text" class="InputAlt" id="NNPint" maxlength="50" name="nome-foto" placeholder="Digite o nome da pintura">
                                <input type="text" class="InputAlt" id="DNPint" name="descrição-foto" placeholder="Digite a descrição da pintura">
                                <input type="file" class="form-control-file" name="foto" id="SelectIMG0" accept="image/*">  
                                <div id="BTN-IN">
                                    <label for="SelectIMG0" class="SelectP">Selecionar Imagem</label>
                                    <input type="submit" name="Publicar" value="Publicar" class="btn-SP" onclick="NPintura()">
                                </div>
                            </form>                               
                        </div>
                    </div>
                    <div class="espaço"></div>                                        
                </div>
        </div>                  
        <!-- Scripts -->
    <script src="../assets/JS/Geral.js"></script>
    <script src="../assets/JS/TP_Admin.js"></script>

</body>
</html>    
<script>