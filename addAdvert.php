<!DOCTYPE html>
<?php
$post = New Post;

if(isset($_SESSION['message'])) {
  $msg = new Message;
  $msg->addMessage($_SESSION['message']);
  unset($_SESSION['message']);
}

if(isset($_POST['btn_car_details'])) {
    
  $postData = [
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      'imageName' => $_FILES['imageUpload']['name'],
      'imageTmpName' => $_FILES['imageUpload']['tmp_name'],
      'imageSize' => $_FILES['imageUpload']['size'],
      'brand'   => $_POST["brand"],
      'model'   => $_POST["model"],
      'type'   => $_POST["type"],
      'fueltype'  => $_POST["fueltype"],
      'price'  => $_POST["price"],
      'editPassword' => $_POST['editPassword']
  ];
   $post->addPost($connection, $postData);
  
}

              if(!isset($_POST['generate']))
              $password = "Stlačením vygenerujete heslo pre úpravu inzerátu";
              else
                {
                  $password = substr(md5(rand()), 0, 5); 
                }       
?>
<html>
<div
      class="modal fade"
      id="enroll"
      tabindex="-1"
      aria-labelledby="enrollLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="enrollLabel">Pridať inzerát</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form enctype="multipart/form-data" id="advert_form" action=<?php echo htmlspecialchars('index.php', ENT_QUOTES);?> method = "post" >
          
          <div class="modal-body" >
            <ul class="nav nav-tabs">
           <li class="nav-item">
           <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_advert_details">Inzerát</a>
            </li>
           <li class="nav-item">
           <a class="nav-link inactive_tab1" id="list_car_details" style="border:1px solid #ccc">Informácie o vozidle</a>
            </li>
          </ul>
          <div class="tab-content" style="margin-top:16px;">
              <div class="tab-pane active" id="advert_details">
              <div class="panel-body">
              <div class="mb-3">
               <label for="title" class="col-form-label">
                 Názov inzerátu:
                </label>
                <input type="text" class="form-control" name="title" id="title" />
                <span id="error_title" class="text-danger"></span>
                </div>
              <div class="mb-3">
                <label for="content" class="col-form-label">
                  Popis inzerátu:
                </label>
                <textarea class="form-control" id="content" name="content" rows="10"></textarea>
                <span id="error_content" class="text-danger"></span>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                <button class="btn btn-dark" type="submit"  id="generate" name="generate" formaction="">Heslo</button>
              </div>
                <input type="text" class="form-control"  name="editPassword" id="editPassword" value="<?php echo $password; ?>" aria-describedby="basic-addon1" readonly="readonly">
              </div>

              <div class="mb-3">
                <label for="imageUpload" class="btn btn-dark image-picker">
                  Foto
                </label>
                <input type="file" id="imageUpload" name="imageUpload">
              </div>
              <br/>
                <button type="button" name="btn_advert_details" id="btn_advert_details" class="btn btn-dark btn-lg">Ďalej</button>
              <br/>
              </div>
              </div>
       
        
          <div class="tab-pane fade" id="car_details">
          <div class="panel-body">
              <div class="mb-3">
                <label for="brand" class="col-form-label">
                  Značka:
                </label>
                <input type="text" class="form-control" name="brand" id="brand" />
              </div>
              <div class="mb-3">
                <label for="model" class="col-form-label">
                  Model:
                </label>
                <input type="text" class="form-control" name="model" id="model" />
              </div>
              <div class="mb-3">
                <label for="type" class="col-form-label">
                  Typ vozidla:
                </label>
                <select class="form-select form-select-sm" name="type" id="type" aria-label=".form-select-sm example">
                  <option selected>Vyberte typ vozidla</option>
                  <option value="SUV">SUV</option>
                  <option value="Combi">Combi</option>
                  <option value="Hatchback">Hatchback</option>
                  <option value="Sedan">Sedan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="fueltype" class="col-form-label">
                  Typ paliva:
                </label>
                <select class="form-select form-select-sm" name="fueltype" id="fueltype" aria-label=".form-select-sm example">
                  <option selected>Vyberte typ paliva</option>
                  <option value="Benzín">Benzín</option>
                  <option value="Nafta">Nafta</option>
                  <option value="Plyn">Plyn</option>
                  <option value="Elektro">Elektro</option>
                  <option value="Hybrid">Hybrid</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="price" class="col-form-label">
                  Cena:
                </label>
                <input type="text" class="form-control" name="price" id="price" />
              </div>
              <br />
            <button type="button" name="previous_btn_car_details" id="previous_btn_car_details" class="btn btn-dark">Naspäť</button>
            <button type="submit" name="btn_car_details" id="btn_car_details" class="btn btn-dark">Odoslať</button>
            <br />
            </div>
           </div> 
         </div>
       </div>
       </form>
      </div>
    </div>
  </div>
  </html>
 