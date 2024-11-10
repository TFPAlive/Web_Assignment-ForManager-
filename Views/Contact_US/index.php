<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Contact</title>

        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://use.fontawesome.com/721412f694.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/320d0ac08e.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="stylesheet" href="Views/CSS/contact.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap">
    </head>
    <body>
        <?php require_once("Views/Navbar/index.php");?> 

        <div class="body">
            <div class="container-fuild">
                <div class="row">
                    <div class="col-12 nonepadding head d-flex justify-content-center flex-wrap align-content-center">
                        <h1>Thông tin liên hệ</h1>
                    </div>
                    <div class="col-12 nonepadding">
                        <div class="row justify-content-center flex-wrap align-content-center paddingTD-100">
                            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-3">
                                <div class="row flex-wrap align-content-center justify-content-center">
                                    <div class="col-11 col-sm-10 col-md-12 padding-10 white myshadow border-10">
                                        <div class="row align-content-center align-items-center">
                                            <div class="col-3">
                                                <p class="circle">
                                                    <i class="fas fa-phone-alt"></i>
                                                </p>
                                            </div>
                                            <div class="col-9">
                                                <div class="d-flex flex-column ">
                                                    <h4>Số điện thoại</h4>
                                                    <h6>+(84)123 456 789</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 col-sm-10 col-md-12 padding-10 white myshadow border-10">
                                        <div class="row align-content-center  align-items-center">
                                            <div class="col-3">
                                                <p class="circle">
                                                    <i class="far fa-envelope"></i>
                                                </p>
                                            </div>
                                            <div class="col-9">
                                                <div class="d-flex flex-column ">
                                                    <h4>Địa chỉ Email</h4>
                                                    <h6>Support@Valcloshop.com</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 col-sm-10 col-md-12 padding-10 white myshadow border-10">
                                        <div class="row align-content-center align-items-center">
                                            <div class="col-3">
                                                <p class="circle">
                                                    <i class="fas fa-fax"></i>
                                                </p>
                                            </div>
                                            <div class="col-9">
                                                <div class="d-flex flex-column ">
                                                    <h4>Địa chỉ Fax</h4>
                                                    <h6>+(84)123 456 789</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11 col-sm-10 col-md-12 padding-10 white myshadow border-10">
                                        <div class="row align-content-center align-items-center">
                                            <div class="col-3">
                                                <p class="circle">
                                                    <a href="https://goo.gl/maps/2WBXjbQXdKmyzxQC8" target="_blank">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="col-9">
                                                <div class="d-flex flex-column ">
                                                    <h4>Địa chỉ</h4>
                                                    <h6>268 Lý Thường Kiệt, Phường 14, Quận 10, TP.HCM</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <?php
                            echo 
                                "<div class='col-12 col-sm-12 col-md-6 col-lg-6 col-xl-7 white border-10 myshadow padding-20'>
								    <div class='row'>";
                            if(!empty($data["message"])) {
                                foreach($data["message"] as $row) {
                                    $string = "Đã phản hồi";
                                    if($row["check"] == 0) {$string = "Chưa phản hồi";}
                                    echo 
                                        "<div class='col-12 white border-10 myshadow padding-20 mydotted'>
                                            <div class='col-12'>
                                                <div class='row justify-content-between'>
                                                    <h4 class='col-6 name-contact-page'>Thư số: #" . $row["id"] ."</h4>
                                                    <h6 class='col-6'>". $string ."</h6>
                                                </div>
                                            </div>
                                            <form action='' id='form-contact' onsubmit='return false;'>
                                                <div class='row'>
                                                    <div class='col-xxl-6'>
                                                        <input type='text' name='name' value='" . $row["name"] . "' disabled>
                                                    </div>
                                                    <div class='col-xxl-6'>
                                                        <input type='text' name='address' value='" . $row["email"] . "' disabled>
                                                    </div>
                                                    <div class='col-xxl-6'>
                                                        <input type='text' name='phone' value='". $row["phone"] ."' disabled>
                                                    </div>
                                                    <div class='col-xxl-6'>
                                                        <input type='text' name='subject' value='" . $row["sub"] . "' disabled>
                                                    </div>
                                                    <div class='col-12'>
                                                        <textarea name='content' disabled>" . $row["content"] . "</textarea>
                                                    </div>
                                                </div>
                                                <button type='button' class='btn btn-primary active mgl-12' onclick='inform(this);'>Phản hồi</button>
                                            </form>
                                        </div>";
                                }
                            }
                            else echo "<h5>Không có tin nhắn nào</h5>";
                            echo 
                                    "</div>
                                </div>";
                            ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-center padding-20">
                            <div class="col-12 col-xxl-7">
                                <h3 class="padding-20">Tìm chúng tôi trên Google Maps</h3>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.494599504969!2d106.65843061494166!3d10.773379562195545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec3c161a3fb%3A0xef77cd47a1cc691e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJDhuqFpIGjhu41jIFF14buRYyBnaWEgVFAuSENN!5e0!3m2!1svi!2sus!4v1655394433253!5m2!1svi!2sus" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <?php require_once "Views/footer/index.php";?>
        <script src="Views/JS/contact.js"></script>
    </body>
</html>