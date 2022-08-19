<!DOCTYPE html>
<?php
require_once('connection.php');
require_once('insertClass.php');
require_once('editAdvert.php');
require_once('addAdvert.php');

$post = new Post;

if (isset($_GET['adID'])) {
  $_SESSION['adID'] = $_GET['adID'];
}


$row = $post->getPosts($connection, " AND adID = ? ", null, $_SESSION['adID']);
?>
<html lang="sk">
<head>
    <?php include('header.html'); ?>
    <title>AutoMazar</title>
</head>

<body class="d-flex flex-column min-vh-100">

<section class="p-5">
    <div class="container">
      <div class="row text-center g-4">

        <div class="col-md-7">
          <div class="card bg-dark text-light">
             <img src="img/<?php echo $row['image'] == null ? 'placeholder.jpeg' : $row['image']; ?>" class="card-img-top-sale" alt=""> 
            <div class="card-body body-height text-start">
              <div class="mb-3">
              <h3 class="card-text colorh"><?php echo $row['title']; ?></h3>  
              <p class="card-text"><?php echo $row['content']; ?></p>
              </div> 
            </div>
          </div>
        </div>

        <div class="col-md">
          <div class="card bg-secondary text-light">
            <div class="card-header">
              <h3>Základné informácie</h3>
            </div>
            <div class="card-body">
            <table class="table">
            <tbody> 
              <tr>
                <th scope="row">Značka</th>
                <td><?php echo $row['brand']; ?></td>
              </tr>
              <tr>
                <th scope="row">Model</th>
                <td><?php echo $row['model']; ?></td>
              </tr>
              <tr>
                <th scope="row">Typ</th>
                <td><?php echo $row['type']; ?></td>
              </tr>
              <tr>
                <th scope="row">Pohon</th>
                <td><?php echo $row['fueltype']; ?></td>
              </tr>
              <tr>
                <th scope="row">CENA</th>
                <td><?php echo $row['price']; ?></td>
              </tr>
            </tbody>
          </table>

            </div>
            </div>
            <br>
            <button
            type="button"
              class="btn btn-mrg btn-dark"
             name="edit_pass" id="edit_pass" data-bs-toggle="modal" data-bs-target="#editModal" >Upraviť inzerát</button>
              <form id="delete_button" href="edit.php?adID=<?php echo $adID; ?>" method = "post" >
            <button type="submit" name="delete" id="delete" class="btn btn-mrg btn-dark">Vymazať inzerát</button>
            </form>
          </div>

      </div>
    </div>
    </section>

</body>

</html>   

<script>
$(document).ready(function(){
 
 $('#btn_advert_details').click(function(){
  var error_title = '';
  var error_content = '';
 
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
  if(error_title != '' || error_content != '')
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
$(document).ready(function(){
 
 $('#btn_advert_edit').click(function(){
  var error_title1 = '';
  var error_content1 = '';
 
  if($.trim($('#title1').val()).length == 0)
  {
   error_title1 = 'Názov inzerátu nemôže byť prázdny.';
   $('#error_title1').text(error_title1);
   $('#title1').addClass('has-error');
  }
  else
  {
   error_title = '';
   $('#error_title1').text(error_title1);
   $('#title1').removeClass('has-error');
  }

  if($.trim($('#content1').val()).length == 0)
  {
   error_content1 = 'Popis inzerátu nemôže byť prázdny.';
   $('#error_content1').text(error_content1);
   $('#content1').addClass('has-error');
  }
  else
  {
   error_content1 = '';
   $('#error_content1').text(error_content1);
   $('#content').removeClass('has-error');
  }
  if(error_title1 != '' || error_content1 != '')
  {
   return false;
  }
  else
  {
   $('#list_advert_details1').removeClass('active active_tab1');
   $('#list_advert_details1').removeAttr('href data-toggle');
   $('#advert_details1').removeClass('active');
   $('#list_advert_details1').addClass('inactive_tab1');
   $('#list_car_details1').removeClass('inactive_tab1');
   $('#list_car_details1').addClass('active_tab1 active');
   $('#list_car_details1').attr('href', '#car_details1');
   $('#list_car_details1').attr('data-toggle', 'tab');
   $('#car_details1').addClass('show active');
  }
 });
 
 $('#previous_btn_car_details1').click(function(){
  $('#list_car_details1').removeClass('active active_tab1');
  $('#list_car_details1').removeAttr('href data-toggle');
  $('#car_details1').removeClass('show active');
  $('#list_car_details1').addClass('inactive_tab1');
  $('#list_advert_details1').removeClass('inactive_tab1');
  $('#list_advert_details1').addClass('active_tab1 active');
  $('#list_advert_details1').attr('href', '#advert_details1');
  $('#list_advert_details1').attr('data-toggle', 'tab');
  $('#advert_details1').addClass('show active');
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

