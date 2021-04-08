

<?php


if(isset($_POST['submit'])){
  $category = $_POST["category"];
  $color = $_POST["color"];
  $size = $_POST["size"];
  $modelname = $_POST["modelname"];


  //include("connection.php");

  $conn = mysqli_connect("localhost","root","","3dprintshop");
  if (mysqli_connect_errno()){
      
      echo "error occured while connectiing with DB".mysqli_connect_errno();
  }else{
      echo "SUCCESS !!!!!!! ";
  }


  session_start();

  $sql = "SELECT * FROM 3dprintshop.model WHERE ModelName LIKE '%" . $modelname. "%'";
  echo "sql::::" .$sql;




  

}
?>

<script type="text/javascript">
   function resetForm(myFormId)
   {
       var myForm = document.getElementById(myFormId);
       for (var i = 0; i < myForm.elements.length; i++)
       {
           if ('submit' != myForm.elements[i].type && 'reset' != myForm.elements[i].type)
           {
             if( 'text' == myForm.elements[i].type) {
              myForm.elements[i].value = '';
             }else{
              myForm.elements[i].selectedIndex = 0;
             }
               
           }
       }
   }
</script>

<!DOCTYPE html>
<!--
Template Name: Besloor
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<?php include "./header.html" ?>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/backgrounds/main_image.jpg');"> 
  <!-- ################################################################################################ -->
  <?php include "./topbar.html" ?>

  <?php include "./header_menu.html" ?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-8">
      <h6 class="heading underline font-x2">Search Models</h6>
    </div>
    <div class="row g-3">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <h2>Search Conditions</h2>
        
        <ul class="nospace group latest">
            <li class="first">
              <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data" id="myFormId">
                <div class="row g-3">
                    <div class="col-sm-5">
                        <label for="Category" class="form-label">Country</label>
                        <select class="form-select" id="category" name="category">
                            <option value="*">Choose..</option>
                            <option value="Beauty">Beauty</option>
                            <option value="Toy">Toy</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="Color" class="form-label">Colour</label>
                        <select class="form-select" id="color" name="color">
                            <option value="*">Choose..</option>
                            <option value="red">Red</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="Size" class="form-label">Size</label>
                        <select class="form-select" id="size" name="size">
                            <option value="*">Choose..</option>
                            <option value="small">small</option>
                            <option value="middle">middle</option>
                            <option value="large">large</option>
                        </select>
                    </div>
                    <div col="col-12">
                        <label for="modelName" class="form-label">Model Name</label>
                        <input type="text" class="form-control" id="modelName" name="modelname">
                    </div>
                    <div class="col-12 center">                        
                        <a href="#" class="btn btn-outline-orange" onclick="resetForm('myFormId'); return false;" >Reset</a>
                        <a href="#" class="btn btn-orange">Search</a>
                        <button type="submit" class="btn btn-orange btn-block" name="submit"> Search  </button>
                        
                    </div>
                </div>
              </form> 
            </li>
        </ul>
        <p></p>
        <h2>Result Models</h2>
        
        <ul class="nospace group latest">
            <li class="first">
                
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></th>
                        <th scope="col">#</th>
                        <th scope="col">Model Name</th>
                        <th scope="col">Colour</th>
                        <th scope="col">Size</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      if(isset($_POST['submit'])){
                        $result = mysql_query($sql);
                        if($result === FALSE) { 
                          die(mysql_error()); // TODO: better error handling
                        }else{
                      while($row = mysql_fetch_array($result)) {
                    ?>
                      <tr>
                        <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                        <th scope="row"><?php echo $row['ModelID'] ?></th>
                        <td><?php echo $row['ModelName'] ?></td>
                        <td>White</td>
                        <td>Middle</td>
                        <td>$20</td>
                      </tr>
                      <?php 
                        }
                        $conn->close();
                      }
                    }
                      ?>
                    </tbody>
                  </table>
                  <div class="col-12 center">                        
                    <a href="./myCart.html" class="btn btn-orange my-2">Add Cart</a>
                </div>
            </li>
        </ul>
        
     </div> 
    </div>
    <div class="col-md-2"></div>  
    <footer class="center"><a class="btn" href="#">Bibendum eget hendrerit</a></footer>
    <!-- ################################################################################################ -->
  </section>
</div>
<?php include "./footer.html" ?>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>