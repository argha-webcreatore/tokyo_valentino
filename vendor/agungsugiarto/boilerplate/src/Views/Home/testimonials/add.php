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
                        <a href="<?= base_url('admin/home/testimonials') ?>" class="btn btn-sm btn-block btn-secondary"><i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/home/testimonials/add') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="inputName" class="col-form-label">Name</label>
                        <div class="">
                            <div class="input-group">
                                <input type="text" name="name" value="<?= old('name') ?>" class="form-control <?= session('error.name') ? 'is-invalid' : '' ?>" placeholder="Name" autocomplete="off">
                            </div>
                            <?php if (session('error.name')) { ?>
                            <div class="text-danger">
                                <h6><?= session('error.name') ?></h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="">Location</label>
                        <div class="">
                            <div class="input-group">
                                <input type="text" name="location" value="<?= old('location') ?>" class="form-control <?= session('error.location') ? 'is-invalid' : '' ?>" placeholder="Location" autocomplete="off">
                            </div>
                            <?php if (session('error.location')) { ?>
                            <div class="text-danger">
                                <h6><?= session('error.location') ?></h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="">Description</label>
                        <div class="">
                            <div class="input-group">
                                <textarea type="number" name="description" class="form-control <?= session('error.description') ? 'is-invalid' : '' ?>" placeholder="Description" autocomplete="off"><?= old('description') ?></textarea>
                            </div>
                            <?php if (session('error.description')) { ?>
                            <div class="text-danger">
                                <h6><?= session('error.description') ?></h6>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSkills" class="">Image</label>
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

