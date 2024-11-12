<?php
include "conexao.php";

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$setor_resp = $_POST['setor'];
$detalhes = $_POST['detalhes'];

$sql = "INSERT INTO tb_protocolos 
    (nome_completo, cpf, email, telefone, setor_resp, detalhes)
    VALUES
    ('$nome', '$cpf', '$email', '$telefone', '$setor_resp', '$detalhes')";
$cadastrar = $pdo->prepare($sql);

try{
    $cadastrar->execute();
    $numero = $pdo->lastInsertId();
    echo "
        Solicitação concluída com sucesso! <br>
        Anote o número do protocolo: <br>
        <span id='numeroSolicitacao'>$numero</span>
    ";
}catch(PDOException $erro){
    echo "Falha ao cadastrar solicitação!".$erro->getMessage();    
}



?>