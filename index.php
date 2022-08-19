<!DOCTYPE html>
<?php
require_once('connection.php');
require_once('insertClass.php');
require_once('addAdvert.php');

$posts=$post->getPosts($connection," ORDER BY created DESC ");

//var_dump($posts);
?>
<html lang="sk">
<head>
<?php include('header.html'); ?>
<title>Domov</title>
</head>

  <body class="d-flex flex-column min-vh-100">
 
    <br>
    <!-- Showcase -->
    <section
      class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start" >
    <br>
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Autobazár pre <span class="text-warning"> VŠETKÝCH </span></h1>
            <p class="lead my-4">
              Spoločnosť AutoMazar poskytuje predaj a nákup ojazdených áut už od roku 1999. 
              Na našej stránke nájdete veľký výber ojazdených áut zo všetkých kútov Slovenska.
            </p>
          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="img/automazar2.png"
            alt=""
          />
        </div>
        <br>
      </div>
    </section>  
    <section class="p-5">
      <div class="container">
        <div class="row">
          <?php if (!empty($posts)){?>
            <?php foreach($posts as $key=>$post) {?>    
              <div class="card-group col-md-4">           
              <div class="card mb-3">           
                  <div class="card-body">
                  <img src="img/<?php echo $post['image'] == null ? 'placeholder.jpeg' : $post['image']; ?>" class="card-img-top" alt="">     
                    <h5 class="card-title" title="<?php echo $post['title']; ?>"><?php echo strlen($post['title']) < 100 ? $post['title'] : substr($post['title'], 0, 100). "..."; ?></h5>              
                    <p class="card-text"><?php echo strlen($post['content']) < 130 ? $post['content'] : substr($post['content'], 0, 130). "..."; ?></p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><?php echo $post['created']; ?></small>
              <a href="sale.php?adID=<?php echo $post['adID']; ?>" class="btn btn-primary btn-dark btn-view ">Zobraziť</a>
                  </div>
              </div>
            </div>
              <?php } ?>
              <?php } ?>
           </div>
        </div>
    </section>
    </body>

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative mt-auto">
      <div class="container">
        <p class="lead">Copyright &copy; 2021 Marek Mazar, Martin Lukáč</p>
      </div>
    </footer>
    

   
</html>



<script>
  $("#MyButton").click( function(){
    $.post("somefile.php");
  });
</script>

<script>
$('#btn_car_details').click(function () {
  $("#confirmPass").modal("show");
});

</script>

    <script>
$(document).ready(function(){
 
 $('#btn_advert_details').click(function(){
  var error_title = '';
  var error_content = '';
  var error_password = '';

  if($.trim($('#title').val()).length == 0)
  {
   error_title = 'Názov inzerátu nemôže byť prázdny.';
   $('#error_title').text(error_title);
   $('#title').addClass('has-error');
  }
  else
  {
   error_title = '';
   $('#error_title').text(error_title);
   $('#title').removeClass('has-error');
  }

  if($.trim($('#content').val()).length == 0)
  {
   error_content = 'Popis inzerátu nemôže byť prázdny.';
   $('#error_content').text(error_content);
   $('#content').addClass('has-error');
  }
  else
  {
   error_content = '';
   $('#error_content').text(error_content);
   $('#content').removeClass('has-error');
  }

  if($.trim($('#editPassword').val()).length !== 5)
  {
   error_password = 'Prosím, vygenerujte si heslo na úpravu inzerátu.';
   $('#error_password').text(error_password);
   $('#editPassword').addClass('has-error');
  }
  else
  {
   error_password = '';
   $('#error_password').text(error_password);
   $('#editPassword').removeClass('has-error');
  }
  if(error_title != '' || error_content != '' || error_password != '')
  {
   return false;
  }
  else
  {
   $('#list_advert_details').removeClass('active active_tab1');
   $('#list_advert_details').removeAttr('href data-toggle');
   $('#advert_details').removeClass('active');
   $('#list_advert_details').addClass('inactive_tab1');
   $('#list_car_details').removeClass('inactive_tab1');
   $('#list_car_details').addClass('active_tab1 active');
   $('#list_car_details').attr('href', '#car_details');
   $('#list_car_details').attr('data-toggle', 'tab');
   $('#car_details').addClass('show active');
  }
 });
 
 $('#previous_btn_car_details').click(function(){
  $('#list_car_details').removeClass('active active_tab1');
  $('#list_car_details').removeAttr('href data-toggle');
  $('#car_details').removeClass('show active');
  $('#list_car_details').addClass('inactive_tab1');
  $('#list_advert_details').removeClass('inactive_tab1');
  $('#list_advert_details').addClass('active_tab1 active');
  $('#list_advert_details').attr('href', '#advert_details');
  $('#list_advert_details').attr('data-toggle', 'tab');
  $('#advert_details').addClass('show active');
 });
 
 
});
</script>


<script>          
  $(document).ready(function () {
                /***Adds file name and change button color if file is uploaded**/
                $('#imageUpload').change(function(){
                    if( $('#imageUpload').get(0).files.length > 0 ){
                        $('.image-picker').removeClass('btn-primary');
                        $('.image-picker').addClass('btn-secondary');
                        var filename = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
                        $('.image-picker').html(filename);
                    }
                });
    
                             
                $.validator.addMethod('filesize', function (value, element, param) {
                    return this.optional(element) || (element.files[0].size <= param)
                }, 'Obrázok musí byť menší ako 550 kB');
            });
              

      </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

    <script>
      mapboxgl.accessToken =
        'pk.eyJ1IjoiYnRyYXZlcnN5IiwiYSI6ImNrbmh0dXF1NzBtbnMyb3MzcTBpaG10eXcifQ.h5ZyYCglnMdOLAGGiL1Auw'
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-71.060982, 42.35725],
        zoom: 18,
      })
    </script>
    
