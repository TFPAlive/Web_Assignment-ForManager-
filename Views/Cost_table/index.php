<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Cost Table</title>

        <script src="https://use.fontawesome.com/721412f694.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="stylesheet" href="Views/CSS/costtable.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap">
    </head>
    <body>
        <?php require_once("Views/Navbar/index.php");?>

        <div class="row container-fluid px-3 px-sm-5 my-5 text-center">
            <h3 class='mb-5'>Quản lý các gói</h3>
            <div class='add-combo-btn' style='text-align: left; margin-bottom: 2rem;'>
                <button type='button' class='btn btn-success' id='addCombo-btn' style='width: 8rem;'>
                    <i class='fas fa-plus'></i> Thêm gói </button>
            </div>
            <form id='add_cycle' action='?url=Home/add_cycle' method='POST'>
                <div class='row'>
                    <label class='col-lg-2' for='cycle-time'> Thời gian chu kì: </label>
                    <div class='col-lg-6'>
                        <input type='number' name='cycle-time' placeholder='Nhập thời gian chu kì'>
                    </div>
                </div>
                <div class='btn-conf-add'>
                    <button type='submit'>Thêm</button>
                </div>
            </form>
            <?php
            if(empty($data["combo"])) echo "empty combo";
            else {
                $count = 1;
                foreach($data["combo"] as $row) {
                    echo 
                        "<div class='col-xxl-4 col-xl-6 col-lg-6 mb-4'>
                            <section>
                                <div class='card'>
                                    <span hidden>" . $row["id"] . "</span>
                                    <div class='card-header text-center py-1'>
                                        <h5 class='mb-0 fw-bold'>" . $row["name"] . "</h5>
                                    </div>
                                    <div class='card-body'>
                                        <h3 class='text-warning mb-2'>" . $row["price"] . "VND</h3>
                                        <h6>Mỗi hộp bao gồm: </h6>
                                        <ol class='list-group list-group-numbered'>";
                    foreach($row["product"] as $product) {echo "<li class='list-group-item'>" . $product["name"] . "</li>";}
                    echo        
                        "<div class='card-footer d-flex justify-content-between py-3'>
                            <div>
                                <button type='button' class='btn btn-danger' id='deleteCombo-btn' data-bs-toggle='modal' data-bs-target='#delcomboModal-" .$count . "'>
                                    <i class='fas fa-trash'></i> Xóa
                                </button>
                            </div>
                            <div>
                                <button type='button' class='btn btn-success' id='updateCombo-btn-" . $row['id'] ."' value = '". $row['id']. "' onClick = 'update_combo(this.value)'>
                                    <i class='fas fa-edit'></i> Chỉnh sửa
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
                <div class='modal fade' id='delcomboModal-" .$count . "' tabindex='-1' aria-labelledby='delcomboModalLabel-" .$count . "' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='delcomboModalLabel-" .$count . "'>Xác nhận</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'> Bạn có chắc chắn muốn xóa gói này </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Đóng</button>
                                <button type='button' class='btn btn-primary' data-bs-dismiss='modal' onclick='remove_combo(" . (int)$row["id"] . ", this)'>Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";  
                    $count += 1;
                    echo 
                        "<div id='updateCombo-modal-" . $row['id']. "' class='add-combo-modal'>
                            <div class='addCombo-modal-content'>
                                <div class='addCombo-modal-header' id='updateCombo-modal'>
                                    <span class='close-modal-addc-update-" . $row['id']. "'>&times;</span>
                                    <h2>Chỉnh sửa gói</h2>
                                </div>
                                <div class='addCombo-modal-body'>
                                    <form action='?url=Home/update_new_combo' method='POST'>
                                        <div class='row'>
                                            <div class='col-lg-8'>
                                                <input value ='" . $row["id"] . "' type='text' name='cid' placeholder='Nhập tên combo' hidden>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <label class='col-lg-4' for='cname'>
                                                    Tên combo: 
                                                    </label>
                                                <div class='col-lg-8'>
                                                    <input value ='" . $row["name"] . "' type='text' name='cname' placeholder='Nhập tên combo' class='form-control is-valid' id='validationSuccess' required>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <label class='col-lg-4' for='price'>
                                                    Giá:
                                                    </label>
                                                    <div class='col-lg-8'>
                                                        <input value ='" . $row["price"] . "' type='number' name='price' placeholder='Nhập giá của combo' class='form-control is-valid' id='validationSuccess' required>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <label class='col-lg-4' for='c-shirt'>PC/Laptop:</label>
                                                        <div class='col-lg-8'>
                                                            <select id='c-shirt' name='c-shirt'>
                                                                <option selected disabled>Chọn PC/Laptop cho combo</option>";
                    foreach($data["product"] as $row1) {
                        if($row1["cate"] == "PC Gaming" || $row1["cate"] == "Laptop Gaming") {
                            echo "<option value='" . $row1["id"] . "'";
                            foreach($row["product"] as $row2) {if($row1["name"] == $row2["name"]) echo " selected";} 
                            echo">" . $row1["name"] . "</option>";
                        }
                    }
                    echo 
                        "</select>
                    </div>
                </div>
                <div class='row'>
                    <label class='col-lg-4' for='c-pants'>Console:</label>
                    <div class='col-lg-8'>
                    <select id='c-pants' name='c-pants'>
                        <option selected disabled>Chọn console cho combo</option>";
                    foreach($data["product"] as $row1) {
                        if($row1["cate"] == "Console") {
                            echo "<option value='" . $row1["id"] . "'";
                            foreach($row["product"] as $row2) {if($row1["name"] == $row2["name"]) echo " selected";} 
                            echo">" . $row1["name"] . "</option>";
                        }
                    }
                    echo 
                        "</select>
                    </div>
                </div>
                <div class='row'>
                    <label class='col-lg-4' for='c-ass'>Phụ kiện:</label>
                    <div class='col-lg-8'>
                    <select id='c-ass' name='c-ass'>
                        <option selected disabled>Chọn phụ kiện cho combo</option>";
                    foreach($data["product"] as $row1) {
                        if($row1["cate"] == "Accessories") {
                            echo "<option value='" . $row1["id"] . "'";
                            foreach($row["product"] as $row2){if($row1["name"] == $row2["name"]) echo " selected";} 
                            echo">" . $row1["name"] . "</option>";
                        }
                    }
                    echo 
                        "</select>
                    </div>
                </div>
                <div class='btn-conf-add'>
                    <button type='submit'>Hoàn tất chỉnh sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id='addCombo-modal' class='add-combo-modal'>
    <div class='addCombo-modal-content'>
        <div class='addCombo-modal-header'>
            <span class='close-modal-addc'>&times;</span>
            <h2>Thêm gói mới</h2>
        </div>
        <div class='addCombo-modal-body'>
            <form action='?url=Home/add_new_combo' method='POST' class='needs-validation ' novalidate=''>
                <div class='row'>
                    <label class='col-lg-4' for='cname'> Tên combo: </label>
                    <div class='col-lg-8'>
                        <input type='text' name='cname' placeholder='Nhập tên combo' class='form-control is-valid' id='validationSuccess' required>
                    </div>
                </div>
                <div class='row'>
                    <label class='col-lg-4' for='price'> Giá: </label>
                    <div class='col-lg-8'>
                        <input type='number' name='price' placeholder='Nhập giá của combo' class='form-control is-valid' id='validationSuccess' required>
                    </div>
                </div>
                <div class='row'>
                    <label class='col-lg-4' for='c-shirt' class='form-control is-valid' id='validationSuccess' required> PC/Laptop: </label>
                    <div class='col-lg-8'>
                        <label for='validationCustom04' class='form-label'></label>
                        <select id='c-shirt' name='c-shirt' class='form-select' id='validationCustom04' required=''>
                            <option selected='' disabled='' value=''>Chọn PC/Laptop cho combo</option>";
                    foreach($data["product"] as $row) {
                        if($row["cate"] == "PC Gaming" || $row["cate"] == "Laptop Gaming") {echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";}
                    }
                    echo 
                        "</select>
                        <div class='invalid-feedback'>
                            Vui lòng chọn PC/Laptop.
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <label class='col-lg-4' for='c-pants' class='form-control is-valid' id='validationSuccess' required>Console:</label>
                    <div class='col-lg-8'>
                        <label for='validationCustom05' class='form-label' ></label>
                        <select id='c-pants' name='c-pants' class='form-select' id='validationCustom05' required=''>
                            <option selected='' disabled='' value=''>Chọn console cho combo</option>";
                    foreach($data["product"] as $row){
                        if($row["cate"] == "Console") {echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";}
                    }
                    echo 
                        "</select>
                        <div class='invalid-feedback'>
                            Vui lòng chọn console.
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <label class='col-lg-4' for='c-ass' class='form-control is-valid' id='validationSuccess' required>Phụ kiện:</label>
                    <div class='col-lg-8'>
                        <label for='validationCustom06' class='form-label' ></label>
                    <select id='c-ass' name='c-ass' class='form-select' id='validationCustom06' required=''>
                        <option selected='' disabled='' value=''>Chọn phụ kiện cho combo</option>";
                    foreach($data["product"] as $row) {
                        if($row["cate"] == "Accessories") {echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";}
                    }
                    echo 
                        "</select>
						<div class='invalid-feedback'>
                            Vui lòng chọn phụ kiện.
                        </div>
					</div>
				</div>
				<div class='btn-conf-add'>
				    <button type='submit'>Thêm Combo</button>
				</div>
			</form>
		</div>
	</div>
</div>";
                }
            }    
            ?> 
        </div> 
        <?php require_once("Views/footer/index.php");?>
        <script src="Views/JS/costtable.js"></script>
    </body>
</html>