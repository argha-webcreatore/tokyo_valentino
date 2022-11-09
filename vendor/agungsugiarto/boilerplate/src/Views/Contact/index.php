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
                    
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/contact_us') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="inputName" class="col-form-label">Address</label>
                        <div class="">
                            <div class="input-group">
                                <input type="text" name="address" value="<?= $contact_us_address;?>" class="form-control" placeholder="Address" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="">Email</label>
                        <div class="">
                            <div class="input-group">
                                <input type="text" name="email" value="<?= $contact_us_email;?>" class="form-control" placeholder="Email" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="">Telephone</label>
                        <div class="">
                            <div class="input-group">
                                <input type="text" name="telephone" value="<?= $contact_us_telephone;?>" class="form-control" placeholder="Telephone" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="">Store Hours</label>
                        <div class="">
                            <div class="input-group">
                                <input type="text" name="store_hours" value="<?= $contact_us_store_hours;?>" class="form-control" placeholder="Store hours" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="">Gmap Embedded Link</label>
                        <div class="">
                            <div class="input-group">
                                <textarea name="gmap" class="form-control" placeholder="Google map embeddded link" autocomplete="off"><?= $contact_us_gmap;?></textarea>
                            </div>
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

