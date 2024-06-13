<?php
session_start();
include_once "../../connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $nivel_acesso = $_POST["nivel_acesso"];

  $verifica_email = "SELECT * FROM usuarios WHERE email = '$email'";
  $result_validate = mysqli_query($conexao, $verifica_email);

  if (mysqli_num_rows($result_validate) > 0) {
    echo "<p class='temEmail' >EMAIL JA CADASTRADO!</p>";
  } else {
/*    $hashed_password = password_hash($password, PASSWORD_BCRYPT);*/
    $query = "INSERT INTO usuarios (nome, email, password, nivel_acesso) VALUES ('$nome', '$email', '$password', '$nivel_acesso')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
      header("Location: dash-adm.php");
      exit();
    } else {
      echo "<p>Erro ao atualizar os dados!</p>";
      exit();
    }
  }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <style>
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background: linear-gradient(135deg, #ffcdd4, #f99aaa);
  height: 90vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.form-container {
  background-color: #ffffff;
  padding: 40px;
  border-radius: 20px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  width: 300px;
  max-width: 80%;
  text-align: center;
}

.form-header {
  margin-bottom: 20px;
}

.form-header h2 {
  color: #e57d90;
}

.input-field, select {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  border: 1px solid #f1889b;
  border-radius: 25px;
  box-sizing: border-box;
  outline: none;
}

.input-field:focus {
  border-color: #e57d90;
}

.submit-button {
  width: 100%;
  padding: 12px;
  background: linear-gradient(135deg, #f1889b, #fdb4bf);
  border: none;
  border-radius: 25px;
  color: white;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-button:hover {
  background: linear-gradient(135deg, #fdb4bf, #f1889b);
}

select {
  width: 100%;
  padding: 12px;
  background: linear-gradient(135deg, #f1889b, #fdb4bf);
  border: none;
  border-radius: 25px;
  color: white;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background: url('data:image/svg+xml;utf8,<svg fill="%23e57d90" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 12px center;
  background-color: white;
}

    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Cadastro de Produtos</h2>
        </div>
        <form class="product-form" action="add.php" method="post">
            <div class="form-group">
                <input type="text" id="name" name="nome" class="input-field" placeholder="Nome" required>
            </div>
            <div class="form-group">
                <input type="text" id="email" name="email" class="input-field" placeholder="email" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="input-field" step="0.01" placeholder="password" required>
            </div>
            <div class="form-group">
               <select name="nivel_acesso" id="role" required>
                <option value="2">Cliente</option>
                <option value="1">Admin</option>
            </select>
            </div>
            
            <div class="form-group">
                <button type="submit" class="submit-button">Cadastrar Produto</button>
            </div>
        </form>
    </div>
</body>
</html>
