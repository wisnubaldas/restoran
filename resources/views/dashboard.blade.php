
@extends('adminlte::page')

@section('title', 'Dashboard')
@section('plugins.Toastr', true)

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="290" text="Reputation" icon="fas fa-medal text-dark"
            theme="danger" url="#" url-text="Reputation history" id="sbUpdatable"/>
        </div>
    </div>
@stop

@push('js')
<script>

    $(document).ready(function() {
        

        let sBox = new _AdminLTE_SmallBox('sbUpdatable');

        let updateBox = () =>
        {
            // Stop loading animation.
            sBox.toggleLoading();

            // Update data.
            let rep = Math.floor(1000 * Math.random());
            let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
            let text = 'Jumlah Pesanan';
            let icon = 'fas fa-medal ' + ['text-primary', 'text-light', 'text-warning'][idx];
            let url = ['url1', 'url2', 'url3'][idx];

            let data = {text, title: rep, icon, url};
            sBox.update(data);
        };

        let startUpdateProcedure = () =>
        {
            // toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            // Simulate loading procedure.
            sBox.toggleLoading();
            // Wait and update the data.
            setTimeout(updateBox, 2000);
        };

        setInterval(startUpdateProcedure, 10000);
    })

</script>
@endpush