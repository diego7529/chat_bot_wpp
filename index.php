<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'chat_bot';
$conn = mysqli_connect($servidor,$usuario,$senha,$banco);


/*
#INSERIR NO BANCO
$sql = "INSERT INTO chat_bot (nome,telefone) VALUES ('$nome', '$telefone')";
$query = mysqli_query($conn,$sql);
if(!$query){
    echo "erro ao inserir os dados";
}
else{
    echo "deu tudo certo";
}


#ATUALIZAR NO BANCO
$sqlUpdate = "UPDATE chat_bot SET nome = '$nome' WHERE id= 4";
$queryUpdate = mysqli_query($conn,$sqlUpdate);
if(!$queryUpdate){
    echo "erro";
}else{
    echo "certo";
}


#BUSCAR NO BANCO DE DADOS   
$sqlSearch = "SELECT *FROM chat_bot WHERE id > 0";
$querySearch = mysqli_query($conn,$sqlSearch);  

while ($rows_usuarios = mysqli_fetch_array($querySearch)) {
    $nome = $rows_usuarios["nome"];
    $id = $rows_usuarios["id"];
    echo "$nome";
    echo "$id";
}
*/

$telefone = $_GET['telefone'];
$msg = $_GET['msg'];
$usuario = $_GET['usuario'];
$status = '0';

#echo"*Telefone* $numero_telefone *MSG* $msg *usuario* $usuario";

$sqlSearch = "SELECT *FROM usuario WHERE telefone = '$telefone'";
$querySearch = mysqli_query($conn,$sqlSearch);  
$total = mysqli_num_rows($querySearch);

while($rows_usuarios = mysqli_fetch_array($querySearch)){
    $status = $rows_usuarios['status'];
}

$menu = "Bem-vindo ao nosso chat! Como posso ajudar você hoje? Se tiver alguma dúvida ou precisar de assistência, estou aqui para fornecer as informações necessárias.";
$menu2 = "segunda mensagem";
$menu3 = "terceira mensagem";
$menu4 = "quarta mensagem";
$menu_reset = "Muito obrigado pela atenção";

if ($total == 0) {
    $sql = "INSERT INTO usuario (telefone, status) VALUES ('$telefone','1')";
    $query = mysqli_query($conn,$sql);
    if ($query) {
        $resposta = $menu;
    }
}
if ($total == 1) {
    if($status ==0){
        $resposta = $menu;
    }
    if($status ==1){
        $resposta = $menu2;
    }
    if($status ==2){
        $resposta = $menu3;
    }
    if($status ==3){
        $resposta = $menu4;
    }

}

if($status < 4){
    $status2 = $status + 1;
    $sqlUpdate = "UPDATE usuario SET status = '$status2' WHERE telefone = '$telefone'";
    $queryUpdate = mysqli_query($conn,$sqlUpdate);

    echo $resposta;
}
if($status >= 4){
    $resposta = $menu_reset;
    $status2 = $status + 1;
    $sqlUpdate = "UPDATE usuario SET status = '0' WHERE telefone = '$telefone'";
    $queryUpdate = mysqli_query($conn,$sqlUpdate);
    
    echo $resposta;
    }
 
$data = date('d-m-y');
$sql = "INSERT INTO historico (telefone, msg_cliente, msg_bot, data) VALUES ('$telefone', '$msg','$resposta', '$data')";
$query = mysqli_query($conn,$sql);
