
@extends('adminlte::page')

@section('title', 'Bayar Pesanan')
@section('plugins.Select2', true)
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)
@section('content_header')
<h1 class="m-0 text-dark">Bayar Pesanan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <x-adminlte-select2 id="mySelect2" name="sel2Vehicle" label-class="text-lightblue"
                    igroup-size="lg" data-placeholder="Select an option..." autocomplete="true">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option/>
                    <option selected="true" value="x">Nomer Pesanan</option>
                    @foreach($bayar as $i => $b)
                        <option value="{{$i}}">{{$b->no_pesan}}</option>
                    @endforeach
                </x-adminlte-select2>

        </div>
    </div>
</div>
<div class="col-12">
    <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-globe"></i> RESTORAN X, Inc.
                <small class="float-right">Date: 2/10/2014</small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <b >Invoice <span id="iv">#</span></b><br>
              <br>
              <b>Order ID:</b> <span id="order_number"></span><br>
              <b>Payment Due:</b> 2/22/2014<br>
              <b>Account:</b> <span id="pelayan"></span>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Qty</th>
                  <th>Product</th>
                  <th>Meja</th>
                  <th>Harga</th>
                  <th>Subtotal</th>
                </tr>
                </thead>
                <tbody class="detail">
                
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <p class="lead">Payment Methods:</p>
              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                plugg
                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Amount Due 2/22/2014</p>

              <div class="table-responsive">
                <table class="table text-right">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><span id="total_bayar"></span></td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td><span id="pajak"></span></td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><span id="grand"></span></td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a id="cash" href="#" type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
              </a>
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
</div>
@stop

@section('js')
<script type="text/javascript" src="http://openexchangerates.github.io/accounting.js/accounting.min.js"></script>
<script type="text/javascript">
    const bayar = @json($bayar);

    $(document).ready(function(a){
        $('#mySelect2').on('select2:select', function (e) {
            if($(this).val() !== 'x')
            {
                const y = bayar[$(this).val()]
                invoice(y)
            }
        });
    })
    let invoice = function(a)
    {
        console.log(a)
        $('#iv').html(Math.floor(Math.random() * 99999));
        $('#order_number').html(a.no_pesan)
        $('#no_pesan').html(a.pelayan)
        $('#total_bayar').html(accounting.formatNumber(a.total_bayar))
        const pajak = a.total_bayar*9.3/100;
        $('#pajak').html(accounting.formatNumber(pajak))
        $('#grand').html(accounting.formatNumber(a.total_bayar+pajak))
        a.detail.forEach( function(e, index) {
            let x = `<tr>
                  <td>${e.jumlah_pesan}</td>
                  <td>${e.menu}</td>
                  <td>${e.meja}</td>
                  <td>${accounting.formatNumber(e.harga)}</td>
                  <td>${accounting.formatNumber(e.total)}</td>
                </tr>`;
            $('.detail').append(x)
        });
        $('#cash').attr('href','/proses-pesanan/bayar/cash/'+a.no_pesan)
    }
</script>
@stop