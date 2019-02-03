<div class="">
    <!-- Main content -->
    <section class="invoice" style="margin:0;">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header clearfix">
                    <i class="fa fa-user"></i> {{ $pasal->name }}
                    <span class="pull-right btn btn-xs btn-white" id="reloadShop">&nbsp; <i class="fa fa-undo fa-flip-horizontal"></i></span>
                    <span class="pull-right text-success">{{ date('d-M-Y', strtotime($pasal->created_at)) }}</span>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-8 invoice-col">
                <table style="width: 100%;">
                    <tr>
                        <th colspan="6">
                            <div style="border-bottom: 1px solid gray;margin-bottom:10px;">Address Information</div>
                        </th>
                    </tr>
                    @if($address = $pasal->address->first())
                    <tr>
                        <td width="100px">Address1</td>
                        <td width="20px">:</td>
                        <td>{{ $address->add1 }}</td>
                        <td width="100px">Address2</td>
                        <td width="20px">:</td>
                        <td>{{ $address->add2 }}</td>
                    </tr>
                    <tr>
                        <td width="100px">City</td>
                        <td width="20px">:</td>
                        <td>{{ $address->city }}</td>
                        <td width="100px">Zip</td>
                        <td width="20px">:</td>
                        <td>{{ $address->zip }}</td>
                    </tr>
                    </tr>
                    <tr>
                        <td width="100px">Country</td>
                        <td width="20px">:</td>
                        <td>{{ $address->country }}</td>
                        <td width="100px">State</td>
                        <td width="20px">:</td>
                        <td>{{ $address->state }}</td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="6">No information</td>
                    </tr>
                    @endif
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <section class="invoice" style="margin: 0;">
        <div class="row invoice-row">
            <div class="col-xs-12">
                <h2 class="page-header clearfix">
                <i class="fa fa-th"></i> Images
                <button class="btn btn-xs btn-success pull-right add-new-image" type="button">
                    &nbsp; <i class="fa fa-plus"></i> &nbsp; Add Image &nbsp;
                </button>
                </h2>
            </div>
        </div>
        <div class="row invoice-row">
            @foreach($pasal->files as $file)
            <div class="col-sm-4 invoice-col">
                <div>
                    <img src="{{ url("shopImage/{$file->id}") }}" alt="{{ $file->type }} of {{ $pasal->name }}" style="max-width: 100%;max-height: 200px">
                    <p>
                        Type : {{ $file->type }} &nbsp; Uploaded at: {{ date('H:i a, d M. Y', strtotime($file->created_at)) }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <div id="imageModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" style="position: absolute;right: -20px;">&times;</button>
                    <form action="/admin/image/shop/{{ $pasal->id }}" id="shopImageForm">
                        @csrf
                        <div class="form-group">
                            <select name="type" class="form-control">
                                <option value="cover">Cover</option>
                                <option value="profile">Profile</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input name="image" type="file" class="form-control">
                        </div>
                        <div>
                            <button class="btn btn-sm btn-success" style="padding: 3px 15px;">
                                <i class=" fa fa-upload"></i>
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="invoice" style="margin: 0;">
        <div class="row invoice-row">
            <div class="col-xs-12">
                <h2 class="page-header clearfix">
                <i class="fa fa-th"></i> Categories
                <button class="btn btn-xs btn-success pull-right add-new-cat" type="button">
                    &nbsp; <i class="fa fa-plus"></i> &nbsp; Add Category &nbsp;
                </button>
                </h2>
            </div>
        </div>
        <div class="row invoice-row">
            <div class="col-sm-12 invoice-col">
                <table id="dynamicTable1" class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th data-field="code"></th>
                            <th data-field="name"></th>
                            <th data-field="action" data-width="100"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
    <?php
    $model = $pasal->inventories()->first() ?? null;
    ?>
    <section class="invoice" style="margin: 0;">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header clearfix">
                <i class="fa fa-amazon"></i> Inventories
                <button class="btn btn-xs btn-success pull-right add-new-inv" type="button">
                    &nbsp; <i class="fa fa-plus"></i> &nbsp; Add Inventory &nbsp;
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
                            <th data-field="product.name">Product</th>
                            <th data-field="quantity">Quantity</th>
                            <th data-field="currency.code">Currency</th>
                            <th data-field="price">Price</th>
                            <th data-field="actions" data-width="100">Actions</th>
                        </tr>
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No inventories</td>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                    </tbody>
                    @if($model)
                    @php $inv = $pasal->inventories()->get(); @endphp
                    <tfoot>
                        <tr>
                            <th>Grand Total</th>
                            <th colspan="2">{{ $inv->reduce(function($acc, $curr) {
                                return $acc += (float) $curr->quantity;
                            }, 0) }}</th>
                            <th colspan="2">{{ $inv->reduce(function($acc, $curr) {
                                return $acc += (float) $curr->price;
                            }, 0) }}</th>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </section>
</div>

@include('admin.blueprint.master-modal')
<div class="modal" id="discountModal"></div>
<div id="cateModal" class="modal"></div>
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
            ajax: "/admin/pasal/{{ $pasal->id }}/inventories/getData",
            columns,
            columnDefs: [{
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-xs goto-inv-details" type="button" title="View"><i class="fa fa-eye"></i></button>
                    <!--button class="btn btn-xs btn-primary edit-order" type="button" title="Edit"><i class="fa fa-pencil"></i></button-->
                                <button class="btn btn-xs btn-danger remove-order-inv" type="button" title="Remove item"><i class="fa fa-times"></i></button>`
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
            $.post('/admin/pasal/{{ $pasal->id }}/inventories/remove/'+ id, { _token }).then(resp => {
                $('#master_modal').modal('hide');
                showStaticDetails({{ $pasal->id }}, 'pasals');
            });
        });
        
        $(document).off('click', '.goto-inv-details').on('click', '.goto-inv-details', function(e) {
            let samePageTables = ['orders','inventories','pasals'];
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
        let dynamicTable1 = $('#dynamicTable1');
        let columns = [];
        dynamicTable1.find('thead tr th').each(function() {
            if(this.dataset.field)
                columns.push({data: this.dataset.field});
        });
        let table = dynamicTable1.DataTable({
            ajax: "/admin/pasal/{{ $pasal->id }}/categories/getData",
            columns,
            columnDefs: [{
                targets: -1,
                data: null,
                defaultContent: `<!--button class="btn btn-xs goto-inv-details" type="button" title="View"><i class="fa fa-eye"></i></button-->
                    <!--button class="btn btn-xs btn-primary edit-order" type="button" title="Edit"><i class="fa fa-pencil"></i></button-->
                                <button class="btn btn-xs btn-danger remove-shop-cat" type="button" title="Remove item"><i class="fa fa-times"></i></button>`
            }],
            createdRow: (row, data) => {row.dataset.id = data.id; row.dataset.mod = data.id;}
        });
        $('.add-new-cat').off('click').on('click', function(e) {
            $('#cModal').loader().modal('show');
            $.get('/admin/shop/{{ $pasal->id }}/subModal/pasal_categories?redirect=false').then(resp => {
                $('#cModal').html(resp);
            });
        });
        $(document).off('click', '#reloadShop').on('click', '#reloadShop', function(e) {
            showStaticDetails({{ $pasal->id }}, 'pasals');
        });
        $(document).off('click', '.deleteConfirmedCat').on('click', '.deleteConfirmedCat', function(e) {
            let id = $(this).data('id');
            $.post('/admin/shop/{{ $pasal->id }}/cat/'+ id, {_token: '{{ csrf_token() }}'}).then(r => {
                $('.modal').modal('hide');
                $('#content-wrapper').html(r);
            });
        });
        $(document).off('click', '.remove-shop-cat').on('click', '.remove-shop-cat', function(e) {
            let id = $(this).closest('tr').data('id');
            $('#master_modal').modalSetting({
                classes: { 'modal-dialog': 'modal-sm', 'modal-header': 'bg-danger', 'modal-footer': 'p-10' },
                html: { 'modal-title h3': 'DELETE', 'modal-body': 'Are you sure do you want to remove?' },
                buttons: [{ text: 'Yes ! Delete', class: 'btn-danger deleteConfirmedCat', data: { id } }]
            }).modal('show').css('z-index', 9999);
        });
        $('.add-new-inv').off('click').on('click', function(e) {
            $('#cModal').loader().modal('show');
            $.get('/load/sub-form/inventories').then(form => $('#cModal').html(form).modal('show'));
        });
        $('.add-new-image').off('click').on('click', function(e) {
            $('#imageModal').modal('show');
        });
        $('#shopImageForm').off('submit').on('submit', function(e) {
            e.preventDefault();
            let data = new FormData(this);
            $.post({
                url : this.action,
                data,
                method : 'post',
                contentType : false,
                processData : false
            }).then(data => {
                $('.modal').modal('hide');
                $('#content-wrapper').html(data);
            });
        });
    });
</script>