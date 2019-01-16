<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product : {{ $pasal->name }}
      </h1>
    </section>


    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> AdminLTE, Inc.
            <small class="pull-right">{{ $pasal->created_at }}</small>
          </h2>
        </div>
        <!-- /.col --> 
      </div>
  
   
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Information</strong> <br>
            @if($pasal->pasalAddress)
            <b>Address 1:</b>{{ $pasal->pasalAddress->address->add1 ? $pasal->pasalAddress->address->add1 :'no information'}}<br>
            <b>Address 2 :</b>{{ $pasal->pasalAddress->address->add2 ? $pasal->pasalAddress->address->add2 :'no information' }}<br>
            <b>city :</b>{{ $pasal->pasalAddress->address->city ?  $pasal->pasalAddress->address->city : 'no infromation'}}<br>
            <b>country :</b>{{ $pasal->pasalAddress->address->country ?  $pasal->pasalAddress->address->country : 'no infromation'}}<br>
            <b>state :</b>{{ $pasal->pasalAddress->address->state ?  $pasal->pasalAddress->address->state : 'no infromation'}}<br>
            <b>Zip :</b>{{ $pasal->pasalAddress->address->zip ?  $pasal->pasalAddress->address->zip : 'no infromation'}}<br>
            @else 
            No information Avilable
            @endif 
          </address>
        </div>


{{-- 
    <div class="box" style="margin-bottom: 0">
  <ul class="nav nav-tabs" id="mod-nav-tabs">
    <li class="active">
      <a data-toggle="tab" href="#home"><h3>pasal</h3></a>
    </li>
        
    @if($pasal)
    <li class="pull-right">
      <button class="btn btn-xs btn-success pull-right add-new-btn" type="button"
    data-mod="{{ $pasal->getTable() }}" style="margin: 10px;">
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
            @foreach($pasal->heads as $key => $head)
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
      ajax: "{{ admin_url('table') }}/getData?mod={{ $pasal->getTable() }}",
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
      addNewMod('{{ title_case(str_singular($pasal->getTable())) }}', '{{ $pasal->getTable() }}');
    });
    $(document).off('click', '.delete-confirmed').on('click', '.delete-confirmed', function(e) {
      e.preventDefault();
      deleteAction.call(this, table, '{{ $pasal->getTable() }}', '{{ csrf_token() }}');
    });
    $(document).off('click', '.edit-row').on('click', '.edit-row', function(e) {
      editAction.call(this, '{{ str_singular($pasal->getTable()) }}', '{{ $pasal->getTable() }}');
    });
    $(document).off('click', '.goto-details').on('click', '.goto-details', function(e) {
      let samePageTables = ['orders','inventories','pasals','discounts'];
      let currentTable = '{{ $pasal->getTable() }}';
      if(samePageTables.indexOf(currentTable) === -1)
        showDetails(this, '{{ $pasal->getTable() }}');
      else showStaticDetails(this, '{{ $pasal->getTable() }}');
    })
  });
</script>
 --}}


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