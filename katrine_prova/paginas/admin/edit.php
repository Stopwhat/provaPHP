<?php
session_start();
include_once "../../connect.php";

if (!empty($_GET["id"])) {
  $id = $_GET["id"];

  // Consulta ao banco de dados para obter os dados do usuário com o ID fornecido
  $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
  $result = $conexao->query($sqlSelect);

  // Verifica se encontrou algum registro
  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $nome = $row["nome"];
      $email = $row["email"];
      $password = $row["password"];
      $nivel_acesso = $row["nivel_acesso"];
    }
  } else {
    // Se não encontrou nenhum registro, redireciona de volta para a página admin.php
    header("Location: dash-adm.php");
    exit();
  }
} else {
  // Se não foi fornecido nenhum ID, redireciona de volta para a página admin.php
  header("Location: dash-adm.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
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

.input-field {
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

    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Editar</h2>
        </div>
        <form class="product-form" action="saveEdit.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <input type="text" id="name" name="nome" class="input-field" placeholder="Nome" required value="<?php echo $nome; ?>">
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" class="input-field" placeholder="email" required value="<?php echo $email; ?>" >
            </div>
            <div class="form-group">
                <input type="password" id="price" name="password" class="input-field" step="0.01" placeholder="password" required value="<?php echo $password; ?>">
            </div>
            <div class="form-group">
               <select name="nivel_acesso" id="role" required>
                <option value="2" <?php echo $nivel_acesso == 2 ? "selected" : ""; ?>>Cliente</option>
                <option value="1" <?php echo $nivel_acesso == 1 ? "selected" : ""; ?>>Admin</option>
            </select>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
