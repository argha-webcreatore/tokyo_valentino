<!-- Include -->
<?= $this->include('agungsugiarto\boilerplate\Views\load\select2') ?>
<!-- Extend from layout index -->
<?= $this->extend('agungsugiarto\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            
            <div class="card-body">
                <form action="<?= base_url('admin/home/about') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="inputSkills" class="">About video</label>
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
                        <label for="inputName" class="">About description</label>
                        <div class="">
                            <div class="input-group">
                                <textarea name="description" class="form-control <?= session('error.description') ? 'is-invalid' : '' ?>" placeholder="About Description" autocomplete="off"><?= $description;?></textarea>
                            </div>
                            <?php if (session('error.description')) { ?>
                            <div class="text-danger">
                                <h6><?= session('error.description') ?></h6>
                            </div>
                            <?php } ?>
                        </div>
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

