<style>
    button.removeImage {
        background-color: rgba(0,0,0,0.1);
        color: rgba(0,0,0,0.5);
        margin-bottom: 20px;
    }
    button.removeImage:hover {
        background-color: rgba(0,0,0,0.2);
        color: rgba(0,0,0,0.5);
    }
</style>
<div class="">
    <!-- Main content -->
    <section class="invoice" style="margin:0;">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header clearfix">
                <i class="fa fa-amazon"></i> {{ $inventory->product->name }}
                <span class="pull-right btn btn-xs btn-white" id="reloadInv">&nbsp; <i class="fa fa-undo fa-flip-horizontal"></i></span>
                <span class="pull-right text-success">{{ $inventory->currency->code??'' }}. {{ $inventory->getCurrenctPrice() }}</span>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <table style="width: 100%;">
                    <tr>
                        <th colspan="3">
                            <div style="border-bottom: 1px solid gray;">Stock Appearance</div>
                        </th>
                    </tr>
                    <tr>
                        <td width="30%">Color</td>
                        <td width="20px">:</td>
                        <td>
                            @if($color = $inventory->color)
                            {{ $color->color }}
                            @else
                            No information
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Size</td>
                        <td width="20px">:</td>
                        <td>
                            @if($size = $inventory->size)
                            {{ $size->size }}
                            @else
                            No information
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Currency</td>
                        <td width="20px">:</td>
                        <td>
                            @if($currency = $inventory->currency)
                            {{ $inventory->currency->title }} ({{ $inventory->currency->code }})
                            @else
                            No information
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Price</td>
                        <td width="20px">:</td>
                        <td>{{ $inventory->currency->code ?? '' }}. {{ $inventory->price ?: 0 }}</td>
                    </tr>
                </table>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <table style="width: 100%;">
                    <tr>
                        <th colspan="3">
                            <div style="border-bottom: 1px solid gray;">Pasal information</div>
                        </th>
                    </tr>
                    @if($pasal = $inventory->pasal)
                    <tr>
                        <td width="30%">Name</td>
                        <td width="20px">:</td>
                        <td>{{ $pasal->name }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Email</td>
                        <td width="20px">:</td>
                        <td>{{ $pasal->email }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Contact</td>
                        <td width="20px">:</td>
                        <td>{{ $pasal->contact }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Quantity</td>
                        <td width="20px">:</td>
                        <td>{{ $inventory->quantity?:0 }}</td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="3">No information</td>
                    </tr>
                    <tr>
                        <td width="30%">Quantity</td>
                        <td width="20px">:</td>
                        <td>{{ $inventory->quantity?:0 }}</td>
                    </tr>
                    @endif
                </table>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <table style="width: 100%">
                    <tr>
                        <th colspan="3">
                            <div style="border-bottom: 1px solid gray;">
                                Discount Information
                                @if(is_null($inventory->discount))
                                <span class="btn btn-xs btn-flat btn-primary pull-right add-discount" data-id="{{ $inventory->id }}" style="margin-top: -6px;">Add discount</span>
                                @else
                                <span class="btn btn-xs btn-flat btn-primary pull-right edit-discount" data-id="{{ $inventory->id }}" data-did="{{ $inventory->discount->id }}" style="margin-top: -6px; margin-left: 10px;">Edit</span>
                                <span class="btn btn-xs btn-flat btn-danger pull-right cancel-discount" data-id="{{ $inventory->id }}" style="margin-top: -6px;">Remove</span>
                                @endif
                            </div>
                        </th>
                    </tr>
                    @if($discount = $inventory->discount)
                    <tr>
                        <td width="30%">Discount</td>
                        <td width="20px">:</td>
                        <td>{{ $discount->title }}</td>
                    </tr>
                    <tr>
                        <td width="30%">Discount %</td>
                        <td width="20px">:</td>
                        <td>{{ $discount->percent }}%</td>
                    </tr>
                    <tr>
                        <td width="30%">Amount</td>
                        <td width="20px">:</td>
                        <td>{{ $discount->amount ? ($inventory->currency->code ?? '') : '' }}. {{ $discount->amount }}</td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="3">No information</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <section class="invoice" style="margin: 0;">
        <div class="row">
            <div class="col-xs-12">
                <div>
                    <h3 class="h4">Description</h3>
                    <div>{!! $inventory->product->desc !!}</div>
                </div>
                <hr>
                <div>
                    <h3 class="h4 clearfix">
                        <i class="fa fa-photo"></i> Images
                        <button type="button" id="fileUpload" class="btn btn-xs btn-primary pull-right btn-flat" style="padding: 1px 15px;">
                            <i class="fa fa-upload"></i> Upload
                        </button>
                    </h3>
                    <div class="row">
                        @forelse($inventory->files as $key => $image)
                            <div class="col-sm-6 col-md-4 col-lg-3" style="margin-bottom: 15px;">
                                <div style="height: 150px;overflow: hidden;">
                                    <img src="{{ url("inventoryImage/{$image->id}") }}" alt="{{ $inventory->product->name }}" class="img-responsive popOutImage" data-key="{{ $key }}">
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12"><div>No image uploaded.</div></div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $model = $inventory->orders->first() ?? null;
    ?>
    <section class="invoice" style="margin: 0;">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header clearfix">
                <i class="fa fa-truck"></i> Orders
                <button class="btn btn-xs btn-flat btn-success pull-right add-new-order" type="button"
                data-table="orders" data-target=".add-new-modal" data-redirect="true">
                    &nbsp; <i class="fa fa-plus"></i> &nbsp; New &nbsp;
                </button>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <div class="row invoice-row">
            <div class="col-sm-12 invoice-col">
                <table id="dynamicTable" class="table table-striped" style="width: 100%;">
                    <thead>
                        @if($model)
                        <tr>
                            <th data-field="first_name">First Name</th>
                            <th data-field="last_name">Last Name</th>
                            <th data-field="email">Email</th>
                            <th data-field="inventories.length">Items</th>
                            <th data-field="actions" data-width="100">Actions</th>
                        </tr>
                        @else
                            <tr>
                                <th class="text-center">No orders</th>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@include('admin.blueprint.master-modal')
<div class="modal" id="discountModal"></div>
<div class="modal" id="fileUploadModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <div class="modal-title pull-left">File Upload &nbsp; <i class="fa fa-upload"></i></div>
                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/admin/fileupload/inventories/{{ $inventory->id }}" id="fileUploadForm">
                    <div class="form-group">
                        <input type="file" name="images[]" class="form-control" multiple="multiple">
                    </div>
                    <hr>
                    <div>
                        <button type="submit" class="btn btn-success" style="padding: 2px 15px;">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if($inventory->files->count() > 0)
<div class="modal" id="popOutImagePreview">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center" style="padding: 0;">
            <button type="button" class="close text-white" style="position: absolute;right: -20px;" data-dismiss="modal">&times;</button>
                <div id="myImageCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    @foreach($inventory->files as $key => $image)
                    <li data-target="#myImageCarousel" data-slide-to="{{ $key }}" @if($loop->index == 0) class="active" @endif></li>
                    @endforeach
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    @foreach($inventory->files as $key => $image)
                    <div class="item {{ $loop->index == 0 ? 'active' : '' }}">
                      <img src="{{ url("inventoryImage/{$image->id}") }}" alt="{{ $inventory->product->name }}" style="margin:0 auto;">
                      <div class="carousel-caption">
                          <button type="button" class="btn btn-xs removeImage" data-id="{{ $image->id }}">
                              <i class="fa fa-times"></i>
                          </button>
                      </div>
                    </div>
                    @endforeach
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myImageCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myImageCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if($model)

<script type="text/javascript">
    $(function() {

        let dynamicTable = $('#dynamicTable');
        let columns = [];
        dynamicTable.find('thead tr th').each(function() {
            if(this.dataset.field)
                columns.push({data: this.dataset.field});
        });
        // return;
        let table = dynamicTable.DataTable({
            ajax: "/admin/inventory/{{ $inventory->id }}/orders/getData",
            columns,
            columnDefs: [{
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-xs goto-order-details" type="button" title="View"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-xs btn-primary edit-order" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-xs btn-danger delete-order" type="button" title="Delete"><i class="fa fa-times"></i></button>`
            }],
            createdRow: (row, data) => {row.dataset.id = data.id; row.dataset.mod = data.id;}
        });

        $(document).off('click', '.add-new-btn').on('click', '.add-new-btn', function(e) {
            addNewMod('{{ title_case(str_singular($model->getTable())) }}', '{{ $model->getTable() }}');
        });
        $(document).off('click', '.delete-confirmed').on('click', '.delete-confirmed', function(e) {
            e.preventDefault();
            let _token = $('meta[name="csrf-token"]').attr('content');
            let id = $(this).data('id');
            $.post('/admin/orders/remove/'+ id, { _token }).then(resp => {
                $('#master_modal').modal('hide');
                showStaticDetails({{ $inventory->id }}, 'inventories');
            });
        });
        
        $(document).off('click', '.edit-order').on('click', '.edit-order', function(e) {
            let id = $(this).closest('tr').data('id');
            $.get('/admin/inventory/orders/edit/'+ id + '?inv_id={{ $inventory->id }}').then(form => $('#cModal').html(form).modal('show'));
        });
        $(document).off('click', '.goto-order-details').on('click', '.goto-order-details', function(e) {
            let samePageTables = ['orders','inventories','pasals','discounts'];
            let currentTable = '{{ $model->getTable() }}';
            if(samePageTables.indexOf(currentTable) === -1)
                showDetails(this, '{{ $model->getTable() }}');
            else showStaticDetails(this, '{{ $model->getTable() }}');
        });
    });
</script>
@endif
<script>
    $(function() {
        $(document).off('click', '#reloadInv').on('click', '#reloadInv', function(e) {
            showStaticDetails({{ $inventory->id }}, 'inventories');
        });
        $(document).off('click', '#fileUpload').on('click', '#fileUpload', function(e) {
            $('#fileUploadModal').modal('show');
        });
        $('.add-new-order').off('click').on('click', function(e) {
            $('#cModal').loader().modal('show');
            $.get('/admin/inventory/{{ $inventory->id }}/orders/add').then(form => $('#cModal').html(form));
        });
        $(document).off('click', '.remove-confirmed').on('click', '.remove-confirmed', function(e) {
            e.preventDefault();
            let _token = $('meta[name="csrf-token"]').attr('content');
            let id = $(this).data('id');
            $.post('/admin/inventory/' + id + '/discountRemove', { _token }).then(resp => {
                $('#master_modal').modal('hide');
                $('#content-wrapper').html(resp);
                {{-- showStaticDetails({{ $inventory->id }}, 'inventories'); --}}
            });
        });
        $(document).off('submit', '#fileUploadForm').on('submit', '#fileUploadForm', function(e) {
            e.preventDefault();
            let _token = $('meta[name="csrf-token"]').attr('content');
            let data = new FormData(this);
            data.append('_token', _token);
            $.post({
                url : this.action,
                data : data,
                contentType : false,
                processData : false
            }).then(response => {
                $('#fileUploadModal').modal('hide');
                $('#content-wrapper').html(response);
            });
        });
        $(document).off('click', '.popOutImage').on('click', '.popOutImage', function(e) {
            let key = parseInt($(this).data('key'));
            $('#myImageCarousel').carousel({
                interval: false
            }).carousel(key);
            $('#popOutImagePreview').modal('show');
        });
        $(document).off('click', '.removeImage').on('click', '.removeImage', function(e) {
            let id = $(this).data('id');
            $('#master_modal').modalSetting({
                classes: { 'modal-dialog': 'modal-sm', 'modal-header': 'bg-danger', 'modal-footer': 'p-10' },
                html: { 'modal-title h3': 'DELETE', 'modal-body': 'Are you sure do you want to delete image?' },
                buttons: [{ text: 'Yes ! Delete', class: 'btn-danger deleteConfirmedImage', data: { id } }]
            }).modal('show').css('z-index', 9999);
        });
        $(document).off('click', '.deleteConfirmedImage').on('click', '.deleteConfirmedImage', function(e) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.post('/admin/inventoryImage/remove/{{ $inventory->id }}/'+ $(this).data('id'), { _token }).then(resp => {
                $('.modal').modal('hide');
                $('#content-wrapper').html(resp);
            });
        });
    });
</script>