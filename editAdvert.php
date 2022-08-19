<!DOCTYPE html>
<?php
require_once('insertClass.php');
require_once('connection.php');
require_once('edit.php');

?>
<html>
<div
      class="modal fade"
      id="edit"
      tabindex="-1"
      aria-labelledby="enrollLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="enrollLabel">Upraviť inzerát</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <img src="img/<?php echo $row['image'] == null ? 'placeholder.jpeg' : $row['image']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>"><br><br>
          <form id="advert_edit_form" href="edit.php?adID=<?php echo $adID; ?>" method = "post" >
          <div class="modal-body" >
            <ul class="nav nav-tabs">
           <li class="nav-item">
           <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_advert_details1">Inzerát</a>
            </li>
           <li class="nav-item">
           <a class="nav-link inactive_tab1" id="list_car_details1" style="border:1px solid #ccc">Informácie o vozidle</a>
            </li>
          </ul>
          <div class="tab-content" style="margin-top:16px;">
              <div class="tab-pane active" id="advert_details1">
              <div class="panel-body">
              <div class="mb-3">
               <label for="title" class="col-form-label">
                 Názov inzerátu:
                </label>
                <input type="text" class="form-control" name="title1" id="title1" value="<?php echo $row['title']; ?>"/>
                <span id="error_title1" class="text-danger"></span>
                </div>
              <div class="mb-3">
                <label for="content" class="col-form-label">
                  Popis inzerátu:
                </label>
                <textarea class="form-control" id="content1" name="content1" rows="10"><?php echo $row['content']; ?></textarea>
                <span id="error_content1" class="text-danger"></span>
              </div>
                <br/>
                <button type="button" name="btn_advert_edit" id="btn_advert_edit" class="btn btn-dark btn-lg">Ďalej</button>
              <br/>
              </div>
              </div>
       
        
          <div class="tab-pane fade" id="car_details1">
          <div class="panel-body">
              <div class="mb-3">
                <label for="brand" class="col-form-label">
                  Značka:
                </label>
                <input type="text" class="form-control" name="brand1" id="brand1" value="<?php echo $row['brand']; ?>" />
              </div>
              <div class="mb-3">
                <label for="model" class="col-form-label">
                  Model:
                </label>
                <input type="text" class="form-control" name="model1" id="model1" value="<?php echo $row['model']; ?>" />
              </div>
              <div class="mb-3">
                <label for="type" class="col-form-label">
                  Typ vozidla:
                </label>
                <select class="form-select form-select-sm" name="type1" id="type1" aria-label=".form-select-sm example">
                  <option selected=><?php echo $row['type']; ?></option>
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
                <select class="form-select form-select-sm" name="fueltype1" id="fueltype1" aria-label=".form-select-sm example">
                  <option selected><?php echo $row['fueltype']; ?></option>
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
                <input type="text" class="form-control" name="price1" id="price1" value="<?php echo $row['price']; ?>" />
              </div>
              <br />
            <button type="button" name="previous_btn_car_details1" id="previous_btn_car_details1" class="btn btn-dark">Naspäť</button>
            <button  type="submit" name="btn_edit1" id="btn_edit1" class="btn btn-dark">Odoslať</button>
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
 