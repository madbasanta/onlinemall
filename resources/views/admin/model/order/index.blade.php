<div class="">
    <!-- Main content -->
    <section class="invoice" style="margin:0;">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header clearfix">
                    <i class="fa fa-user"></i> {{ $order->first_name . ' ' . $order->last_name }}
                    <span class="pull-right btn btn-xs btn-white" id="reloadInv">&nbsp; <i class="fa fa-undo fa-flip-horizontal"></i></span>
                    <span class="pull-right text-success">{{ date('d-M-Y', strtotime($order->created_at)) }}</span>
                
                    <span class="btn btn-xs pull-right @if($order->shipped) btn-danger @else btn-primary @endif" id="markShipped" data-token="{{ csrf_token() }}" data-id="{{ $order->id }}" 
                    @if($order->shipped) data-val="0" @else data-val="1" @endif
                    style="margin-right:15px;">
                        @if($order->shipped) <i class="fa fa-truck "></i> Mark Unshipped @else <i class="fa fa-truck"></i> Mark Shipped @endif
                    </span>
                    
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <table style="width: 100%">
                    <tr>
                        <th colspan="3">
                            <div style="border-bottom: 1px solid gray;margin-bottom: 10px;">Contact info</div>
                        </th>
                    </tr>
                    <tr>
                        <td width="70px">Phone</td>
                        <td width="20px">:</td>
                        <td>{{ $order->contact }}</td>
                    </tr>
                    <tr>
                        <td width="70px">Email</td>
                        <td width="20px">:</td>
                        <td>{{ $order->email }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-8 invoice-col">
                <table style="width: 100%;">
                    <tr>
                        <th colspan="6">
                            <div style="border-bottom: 1px solid gray;margin-bottom:10px;">Shipping Information</div>
                        </th>
                    </tr>
                    @if($address = $order->address->first())
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
    <?php
    $model = $order->inventories->first() ?? null;
    ?>
    <section class="invoice" style="margin: 0;">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header clearfix">
                <i class="fa fa-amazon"></i> Inventories
                <button class="btn btn-xs btn-success pull-right add-new-inv" type="button">
                    &nbsp; <i class="fa fa-plus"></i> &nbsp; Manage Inventory &nbsp;
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
                            <th data-field="order_quantity">Quantity</th>
                            <th data-field="currency.code">Currency</th>
                            <th data-field="order_price">Price</th>
                            <th data-field="total_order_price">Total</th>
                            <th data-field="actions" data-width="100">Actions</th>
                        </tr>
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No inventories</td>
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                    </tbody>
                    @if($model)
                    @php $inv = $order->inventories()->withPivot('price', 'quantity')->get(); @endphp
                    <tfoot>
                        <tr>
                            <th>Grand Total</th>
                            <th colspan="2">{{ $inv->reduce(function($acc, $curr) {
                                return $acc += (float) $curr->pivot->quantity;
                            }, 0) }}</th>
                            <th colspan="1">{{ $inv->reduce(function($acc, $curr) {
                                return $acc += (float) $curr->pivot->price;
                            }, 0) }}</th>
                            <th colspan="2">{{ $inv->reduce(function($acc, $curr) {
                                return $acc += (float) $curr->pivot->price * (float) $curr->pivot->quantity;
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
<div class="modal" id="previewImg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <img src="" id="imgSrc" class="img-responsive" style="margin: 0 auto;">
            </div>
        </div>
    </div>
</div>

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
            ajax: "/admin/order/{{ $order->id }}/inventories/getData",
            columns,
            columnDefs: [{
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-xs goto-inv-details" type="button" title="View"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-xs btn-primary previewImg" type="button" title="Preview"><i class="fa fa-photo"></i></button>
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
            $.post('/admin/order/{{ $order->id }}/inventories/remove/'+ id, { _token }).then(resp => {
                $('#master_modal').modal('hide');
                showStaticDetails({{ $order->id }}, 'orders');
            });
        });
        
        $(document).off('click', '.goto-inv-details').on('click', '.goto-inv-details', function(e) {
            let samePageTables = ['orders','inventories','pasals','discounts'];
            let currentTable = '{{ $model->getTable() }}';
            if(samePageTables.indexOf(currentTable) === -1)
                showDetails(this, '{{ $model->getTable() }}');
            else showStaticDetails(this, '{{ $model->getTable() }}');
        });

        $(document).off('click', '.previewImg').on('click', '.previewImg', function(e) {
            e.preventDefault();
            let id = $(this).closest('tr').data('id');
            $.get('imgSrc/inv/'+ id).then(src => {
                if(!src) return alert('No image available');
                let targetModal = $('#previewImg');
                targetModal.find('#imgSrc').attr('src', src);
                targetModal.modal('show');
            }, err => false);
        });
    });
</script>
@endif
<script>
    $(function() {
        $('.add-new-inv').off('click').on('click', function(e) {
            $('#cModal').loader().modal('show');
            $.get('/admin/inventory/orders/edit/{{ $order->id }}').then(form => $('#cModal').html(form).modal('show'));
        });
        $('#reloadInv').off('click').on('click', e => showStaticDetails({{ $order->id }}, 'orders'));
    });
</script>