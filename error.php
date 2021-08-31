<?php
if (!isset($_GET['error'])) {
  header("location:index.php");
}


else {
  $errormsg = "";
  $error = $_GET['error'];
  switch ($error) {
    case 'prdmissing':
      $errormsg = "Its seems item is missing or your link has expired";
      break;
      case 'delsuccess':
        $errormsg = " SUCESSFUL DELETED";
        break;
        case 'stmtfailed':
          $errormsg = " Something went wrong try again!";
          break;
          case 'ordersucess':
            session_start();
              if (!isset($_SESSION['email'])) {
                  header("location:index.php");
                }

            $errormsg = " ORDER SUCESSFUL <br>Verify your Phone or Email<br><code>".$_SESSION['email']."</code><br>";
            $errormsg = $errormsg."<form action='incs/ver.inc.php' method='post'><input type='text' name='vernemail' value='".$_SESSION['email']."'readonly ><input placeholder='Verification pin' type='text' name='verifypin'> <br> <input type='submit' value='Verify'></form>";
            break;
            case 'verified':
              $errormsg = "Your purchased is verified";
              break;
              case 'alverified':
              $errormsg = "This purchase has already been verified ";
              break;
              case 'wrgver':
                $errormsg = "Oops wrong verification code!";
                break;
                case 'ordmissing':
                  $errormsg = "Order has Expired or an error occured";
                  break;

    default:
      header("location:index.php");
      break;
  }
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <style media="screen">

     *{
       margin: 0;
       padding: 0;

     }


     body{
       width: 100%;
       background: linear-gradient(-45deg,#FBB917,#555);
       background-repeat: no-repeat;
       height: 100vh;
      display: flex;
      align-items:center;
      justify-content:center;


     }
     .errorbody{
      
       min-height: 400px;
       min-width:70vw;
       background-color: white;
       font-size: xx-large;
       
       align-items: center;
       line-height: 70px;
       background: rgba(50,50,50,0.5);
       color: white;
       font-family: cursive;
       text-align: center;
       padding: 10px;
       justify-content: center;
       display: flex;
       flex-direction: column;

     }
     .errorbody form input[type="text"]{
       width:70%;
       max-width: 250px;
       padding:10px 3px;
       border:none;
       background:transparent;
       border-bottom:solid 5px #ffffcc;
     }
      .errorbody form input[type="submit"]{
       width:70%;
       max-width: 250px;
       padding:10px 3px;
       background:transparent;
       border:solid 5px #ffffcc;
       
     }
     .errorbody form input[type="submit"]:hover{
       background: #FBB917;
     }
     .errorbody form input[type="text"]::placeholder{
       font-size:25px;
       color:antiquewhite;
     }

     .errorbody code{
       font-size:20px;
       color:yellow;
       font-weight: lighter;
     
     }

     .errorbody em{
       color:burlywood;
       font-weight: bolder;
     }

     .errorbody button{
       width: 60%;
       max-width: 300px;
       background-color:  #ffffcc;
       border: transparent;
       padding: 10px;
       position: relative;
       bottom: 0px;
       opacity: 0.7;
       transition: all .6s;
       color: grey;
       font-size: xx-large;
     }
     .errorbody button:hover{
       opacity: 1;

     }
     </style>
   </head>
   <body>
     <div class="errorbody">
        <span>  <?php echo $errormsg;
         ?> </span><br>
            <button type="button" name="button" onclick="goBack()">Continue </button>
          </div>
   </body>
   <script>
function goBack() {
    window.history.back()
}
</script>
 </html>
