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

            <h5 class="card-title"><a href="{{route('admin.user.create')}}" class="btn btn-info"><i class="icon-plus3 mr-3 icon-xl"></i> İstifadəçi əlave et</a></h5>

        </div>

        <table class="table table-hover border table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                   
                    <td> <a href="{{route('admin.user.edit',$user->id)}}"><i class="btn btn-info fa fa-edit"></i></a>
                    <a href="{{route('admin.user.role',$user->id)}}">Role</a>

                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
    </div>
</div>
<script>
    let table = new DataTable('#dataTable');
</script>

@endsection