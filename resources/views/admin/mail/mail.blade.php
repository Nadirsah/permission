@extends('layouts.admin')
@section('title','İstifadəçilər')
@section('theme_css')
<link href="{{asset('admin')}}\global_assets\css\icons\fontawesome\styles.min.css" rel="stylesheet" type="text/css">
@endsection
@section('theme_js')
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin')}}\global_assets\js\plugins\forms\styling\uniform.min.js"></script>
<script src="{{asset('admin')}}\global_assets\js\plugins\forms\styling\switchery.min.js"></script>
<script src="{{asset('admin')}}\global_assets\js\plugins\forms\styling\switch.min.js"></script>
<script src="{{asset('admin')}}\global_assets\js\demo_pages\form_checkboxes_radios.js"></script>
@endsection


@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <!-- Basic tabs -->
    <form action="{{ route('admin.postemail') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Text:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <h1>E-POCT</h1>
    <a href="{{ route('admin.sendemail') }}"><span>Gonder</span></a>
</div>
<hr>
<table class="table text-center">
    <thead>
        <tr>
            <td>Text</td>
        </tr>
    </thead>
    <tbody >
        @foreach($data as $item)
        <tr>
            <td>{{$item->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<form action="{{route('admin.sendcustomer')}}" method="POST">
    @csrf
    <label for="name">Adınız:</label>
    <input type="text" id="name" name="name" required>



    <button type="submit">Göndər</button>
</form>

@endsection