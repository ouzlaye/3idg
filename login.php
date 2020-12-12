
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Login</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method ="post" action="login.php">
        <h2 class="form-login-heading">Se connecter</h2>
        <div class="login-wrap">
          <input type="email" class="form-control" placeholder="email" name= 'email' required autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="pass" required>
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" href="login.php" type="submit" name="submit"><i class="fa fa-lock"></i> CONNEXION</button>
          <hr>
          <?php
        
  
            if(isset($_POST['submit']))
{
  if(isset($_POST['email']) && (isset($_POST['pass']))){

    $test = 0;
    require("connexion.php");
   
    
    // test si l'entreé est valide 
    $sql  = 'SELECT * FROM user where login="'.addslashes($_POST['email']).'" AND pass="'.addslashes($_POST['pass']).'"';
    $result = $bdd->query($sql);// or die ('Erreur : '.mysqli_error() );
    


    session_start();
    while($data =$result->fetchAll(PDO::FETCH_ASSOC)){
      echo $data['login'];
      if( $data['login']== $_POST['email'] && $data['pass'] == $_POST['pass']){

        $test= 1;
        $_SESSION['user']= $data['prenom']."".$data['nom'];
        $_SESSION['id_user'] = $data['id_user'];
        header("Location: indexAdmin.php");
      }

      else{header("Location: AjoutAdmin.php");}
    }

    
    

  }
} ?>
          
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
              
            </div>
            
          </div>
          
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
