<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
</head>
<body>

<h2>Liste des utilisateurs</h2>

<form action="index.php" method="get">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" name="username" id="username">
    <input type="button" value="Afficher">
</form>

 <?php


// Tester la Connexxion à ma Base de données 

echo "<br>"."<br>";

 $dsn="mysql:host=localhost:3308;dbname=company";
 $username='erico';
 $password='1234';

 try{
    $pdo= new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les utilisateurs
    $sql="SELECT * FROM users ";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les utilisateurs

    foreach($users as $user){
        
        echo "ID : " . $user['id'] . "<br>";
        echo "Nom d'utilisateur : " . $user['username'] . "<br>";
        echo "<br>";
    }

 }catch(PDOException $e){
    echo "Erreur de connection à la base de données :" . $e->getMessage();
 }

 ?>
    
</body>
</html>



<!-- 

Code du cours adapté à ma base de données


$servername='localhost';
$username = 'erico';
$password = '1234';
$dbname = 'company';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
{
    die("connexion failed :" . $conn->connect_error);
}

if(isset($_GET['username']) &&  !empty($_GET['username']))
{
    $username=$_GET['username'];

    $sql= "SELECT * FROM users WHERE username='$username'";
    $result=$conn->query($sql);

  if($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
         echo "ID :" . $row['id'] . "- Username" . $row['username'] . "<br>";
    }
  }else
  {
    echo "0 results";
  }
}

$conn->close(); -->




