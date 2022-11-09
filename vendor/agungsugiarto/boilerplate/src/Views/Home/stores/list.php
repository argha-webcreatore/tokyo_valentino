<?= $this->include('agungsugiarto\boilerplate\Views\load\select2') ?>
<?= $this->include('agungsugiarto\boilerplate\Views\load\datatables') ?>
<!-- Extend from layout index -->
<?= $this->extend('agungsugiarto\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<!-- SELECT2 EXAMPLE -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Store</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-center">Are you sure want to delete this store ?</h4>
        <div class="d-flex justify-content-center">
            <button class="btn btn-danger btn_delete" id="">Continue</button>
            <button class="btn btn-secondary ml-2" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card card-default">
    <div class="card-header">
        <div class="card-tools">
            <div class="btn-group">
                <a href="<?= base_url('admin/home/stores/add') ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i>
                    <?= lang('boilerplate.store.add') ?>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-hover va-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Store image</th>
                                <th>Store name</th>
                                <th>Store address</th>
                                <th>Store contact</th>
                                <th>Store description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    var table = $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?=base_url('admin/home/stores/list')?>",
        "order": [
            [4, 'desc']
        ],
        "columnDefs": [{
                "targets": 0,
                "name": "id",
                'searchable': false,
                'orderable': false
            },
            {
                "targets": 1,
                "name": "image",
                'searchable': false,
                'orderable': false
            },
            {
                "targets": 2,
                "name": "name",
                'searchable': true,
                'orderable': true
            },
            {
                "targets": 3,
                "name": "address",
                'searchable': true,
                'orderable': true
            },
            {
                "targets": 4,
                "name": "contact",
                'searchable': true,
                'orderable': true
            },
            {
                "targets": 5,
                "name": "description",
                'searchable': true,
                'orderable': true
            },
            {
                "targets": 5,
                "name": "Status",
                'searchable': false,
                'orderable': false
            },
            {
                "targets": 6,
                "name": "edit",
                'searchable': false,
                'orderable': false
            },
            {
                "targets": 7,
                "name": "delete",
                'searchable': false,
                'orderable': false
            }
        ]
    });

    function changeStoreStatus(id, status)
    {
        if(id > 0)
        {
            $.ajax({
                url : "<?= base_url('admin/home/stores/updateStatus');?>",
                type : "post",
                data : {['<?= csrf_token() ?>'] : '<?= csrf_hash() ?>', sId : id, status : status},
                success : function(data)
                {
                    table.ajax.reload(null, false);
                }
            })
        }
    }

    function deleteStore(id)
    {
        $('#deleteModal').modal('show');
        $('.btn_delete').attr('id', id);
    }


    $('.btn_delete').click(function(){
        var id = $(this).attr('id');
        $.ajax({
            url : "<?= base_url('admin/home/stores/delete');?>",
            type : "post",
            data : {['<?= csrf_token() ?>'] : '<?= csrf_hash() ?>', sId : id},
            success : function(data)
            {
                // console.log(data);
                $('#deleteModal').modal('hide')
                table.ajax.reload(null, false);

            }
        })
    })
</script>
<?= $this->endSection() ?>