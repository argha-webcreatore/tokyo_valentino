<!-- Include -->
<?= $this->include('agungsugiarto\boilerplate\Views\load\select2') ?>
<!-- Extend from layout index -->
<?= $this->extend('agungsugiarto\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <div class="float-left">
                    <div class="btn-group">
                        <a href="<?= base_url('admin/home/stores') ?>" class="btn btn-sm btn-block btn-secondary"><i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/home/stores/edit/'.$store['id']) ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <?= csrf_field() ?>
                    <input type="hidden" name="storeId" id="<?= $store['id'];?>">
                    <div class="form-group">
                        <label for="inputName" class="col-form-label">Store name</label>
                        <div class="">
                            <div class="input-group">
                                <input type="text" name="store_name" value="<?= $store['name'];?>" class="form-control <?= session('error.store_name') ? 'is-invalid' : '' ?>" placeholder="Store name" autocomplete="off">
                            </div>
                            <?php if (session('error.store_name')) { ?>
                            <div class="text-danger">
                                <h6><?= session('error.store_name') ?></h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="">Store address</label>
                        <div class="">
                            <div class="input-group">
                                <input type="text" name="store_address" value="<?= $store['address']; ?>" class="form-control <?= session('error.store_address') ? 'is-invalid' : '' ?>" placeholder="Store address" autocomplete="off">
                            </div>
                            <?php if (session('error.store_address')) { ?>
                            <div class="text-danger">
                                <h6><?= session('error.store_address') ?></h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="">Store contact</label>
                        <div class="">
                            <div class="input-group">
                                <input type="number" name="store_contact" value="<?= $store['contact']; ?>" class="form-control <?= session('error.store_contact') ? 'is-invalid' : '' ?>" placeholder="Store contact" autocomplete="off">
                            </div>
                            <?php if (session('error.store_contact')) { ?>
                            <div class="text-danger">
                                <h6><?= session('error.store_contact') ?></h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="">Store description</label>
                        <div class="">
                            <div class="input-group">
                                <textarea name="store_description" class="form-control <?= session('error.store_description') ? 'is-invalid' : '' ?>" placeholder="Store Description" autocomplete="off"><?= $store['description']; ?></textarea>
                            </div>
                            <?php if (session('error.store_description')) { ?>
                            <div class="text-danger">
                                <h6><?= session('error.store_description') ?></h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSkills" class="">Store image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFileLang" name="file" lang="es">
                            <label class="custom-file-label" id="" for="customFileLang">Choose file</label>
                        </div>
                        <?php if (session('error.file')) { ?>
                        <div class="text-danger">
                            <h6><?= session('error.file') ?></h6>
                        </div>
                        <?php } ?>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="float-right">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-sm btn-block btn-primary">
                                        <?= lang('boilerplate.global.save')?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $('.select').select2();
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("customFileLang").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
<?= $this->endSection() ?>

