<?php 

// Connexion � la base de donn�es
include 'connect/connexion.php';

if($_POST['envoi_connexion'])
{
  if(empty($_POST['login']) OR empty($_POST['password'])) 
  {   
	include('index.php');
	echo "<center><h2><font color='red'>Merci de remplir tous les champs</h2></font></center>";
	
  }
  else
  {   
    //S�curisation des donn�es entr�es par le membre
    $login = $_POST['login']; 
    $password = $_POST['password'];
    //On v�rifie que les donn�es correspondent dans la base de donn�es 
    $sql = "SELECT * FROM LOGIN WHERE LOG_LOGIN='$login' AND LOG_MDP='$password'";
    $result = mysql_query($sql) or die (mysql_error());
    if(mysql_num_rows($result) > 0)
    {  
      $data = mysql_fetch_array($result);
      session_start();
      $_SESSION['profilLogin'] = $data['LOG_LOGIN'];
      header('Location: ../statut.php');
    }
    else
    {
      
      include('index.php');
	 
	 echo "<center><h2><font color='red'>Erreur dans les logins</h2></font></center>";
    }
  }
}
?>