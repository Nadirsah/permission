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
    <div class="card">
        <div class="card-header header-elements-inline">

            <h5 class="card-title"><a href="{{route('admin.roles.create')}}" class="btn btn-info"><i class="icon-plus3 mr-3 icon-xl"></i>İmtiyaz əlave et</a></h5>

        </div>

        <table class="table table-striped table-hover">
            <tr>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td> <a href="{{route('admin.roles.edit',$role->id)}}"><i class="btn btn-info fa fa-edit"></i></a>
                    <form action="{{route('admin.roles.destroy',$role->id)}}" method="post" onsubmit="return confirm('Emisnisniz?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>

                    </form>
                </td>

            </tr>

            @endforeach
        </table>
    </div>
</div>
<script>
    let table = new DataTable('#dataTable');
</script>

@endsection