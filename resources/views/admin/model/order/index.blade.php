<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order : {{ $order->id }}
      </h1>
    </section>


    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> AdminLTE, Inc.
            <small class="pull-right">{{ $order->created_at }}</small>
          </h2>
        </div>
        <!-- /.col --> 
      </div>
  
   
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
        {{--   <address>
            <strong>Information</strong> <br>
            @if($order->inventory->discount!=null)
            <b>Discount:</b>{{ $order->inventory->discount->title ? $order->inventory->discount->title :'no information'}}<br>
            <b>Discount amount :</b>{{ $order->inventory->discount->amount ? $order->inventory->discount->amount :'no information' }}<br>
            <b>Perecentage :</b>{{ $order->inventory->discount->percent ?  $order->inventory->discount->percent : 'no infromation'}}<br>
            @else 
            No information Avilable
            @endif 
            @if($order->inventory->category)
            {{ $order->inventory->product->category->name }}
            @endif --}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <proinfo>
            <strong>Stock Appearance</strong><br>
            <b> Color :</b>
            @if($order->color)
            {{ $order->inventory->color->color ? $order->inventory->color->color :'no information'}}
            @endif
            <br>  
            
            <b> Size :</b>
             @if($order->size!=null)
              {{ $order->inventory->size->size ? $order->inventory->size->size :'no infromation' }}
             @endif
            <br>  
            <b> Currency :</b> 
              @if($order->currency)
              {{ $order->currency->tittle ? $order->currency->tittle :'no information'}}
              @endif


          </proinfo>
        </div>
        <!-- /.col -->
        <strong>order Information</strong><br>
        <div class="col-sm-4 invoice-col">
          <b>Quantity____:  </b>{{ $order->quantity ? $order->quantity : 'no information' }}<br>
          <b>Current Price_______:     </b>{{ $order->current_price ?  $order->current_price : 'no information' }}<br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



    <div class="box" style="margin-bottom: 0">
  <ul class="nav nav-tabs" id="mod-nav-tabs">
    <li class="active">
      <a data-toggle="tab" href="#home"><h3>order</h3></a>
    </li>
        
    @if($order)
    <li class="pull-right">
      <button class="btn btn-xs btn-success pull-right add-new-btn" type="button"
    data-mod="{{ $order->getTable() }}" style="margin: 10px;">
      &nbsp; <i class="fa fa-plus"></i> &nbsp; New &nbsp;
    </button>
    </li>
    @endif
  </ul>

  <div class="tab-content" id="mod-tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="box-body">
      <table id="dynamicTable" class="table table-striped" style="width: 100%;">
        <thead>
          <tr>
            @foreach($order->heads as $key => $head)
            <th data-field="{{ $key }}">{{ $head }}</th>
            @endforeach
            <th data-field="actions" data-width="100">Actions</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
    </div>
  </div>
</div>

@include('admin.blueprint.master-modal')

<script type="text/javascript">
  $(function() {
    let dynamicTable = $('#dynamicTable');
    let columns = [];
    dynamicTable.find('thead tr th').each(function() {
      if(this.dataset.field)
        columns.push({data: this.dataset.field});
    });
    let table = dynamicTable.DataTable({
      ajax: "{{ admin_url('table') }}/getData?mod={{ $order->getTable() }}",
      columns,
      columnDefs: [{
        targets: -1,
        data: null,
        defaultContent: `<button class="btn btn-xs goto-details" type="button" title="View"><i class="fa fa-eye"></i></button>
          <button class="btn btn-xs btn-primary edit-row" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-xs btn-danger delete-row" type="button" title="Delete"><i class="fa fa-times"></i></button>`
      }],
      createdRow: (row, data) => {row.dataset.id = data.id; row.dataset.mod = data.id;}
    });

    $(document).off('click', '.add-new-btn').on('click', '.add-new-btn', function(e) {
      addNewMod('{{ title_case(str_singular($order->getTable())) }}', '{{ $order->getTable() }}');
    });
    $(document).off('click', '.delete-confirmed').on('click', '.delete-confirmed', function(e) {
      e.preventDefault();
      deleteAction.call(this, table, '{{ $order->getTable() }}', '{{ csrf_token() }}');
    });
    $(document).off('click', '.edit-row').on('click', '.edit-row', function(e) {
      editAction.call(this, '{{ str_singular($order->getTable()) }}', '{{ $order->getTable() }}');
    });
    $(document).off('click', '.goto-details').on('click', '.goto-details', function(e) {
      let samePageTables = ['orders','inventories','pasals','discounts'];
      let currentTable = '{{ $order->getTable() }}';
      if(samePageTables.indexOf(currentTable) === -1)
        showDetails(this, '{{ $order->getTable() }}');
      else showStaticDetails(this, '{{ $order->getTable() }}');
    })
  });
</script>



      <!-- Table row -->
      
      <div class="row">
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>