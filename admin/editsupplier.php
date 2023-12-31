<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');
include('header.php');
?>
<?php 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
$stmt = $conn->prepare("SELECT * FROM suppliers WHERE id='".$_GET['id']."'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Edit Supplier</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Supplier
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Input Validation start -->
                <section class="input-validation">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form-horizontal" action="app/suppliers" method="post" enctype="multipart/form-data" novalidate>
                                            <input type="hidden" name="id" value="<?=$result['id']?>">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <h5>Supplier name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control mb-1" value="<?=$result['name']?>" required data-validation-required-message="Supplier name is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Address <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control mb-1" value="<?=$result['address']?>" required data-validation-required-message="Address is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Telephone <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="telephone" class="form-control mb-1" value="<?=$result['telephone']?>" required data-validation-required-message="Telephone is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <h5>Fax <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="fax" class="form-control mb-1" value="<?=$result['fax']?>" required data-validation-required-message="Fax is required">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>Info <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="info" class="form-control mb-1" required data-validation-required-message="Info is required" rows="10"><?=$result['info']?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" name="btn_edit" class="btn btn-success">Submit <i class="la la-thumbs-o-up position-right"></i></button>
                                                        <a href="categories" class="btn btn-danger">Cancel <i class="la la-close position-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Input Validation end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <?php include 'footer.php'; ?>