@extends('layouts.admin')
@section('title','İstifadəçilər')
@section('theme_css')
<link href="{{asset('admin')}}\global_assets\css\icons\fontawesome\styles.min.css" rel="stylesheet" type="text/css">
@endsection
@section('theme_js')

@endsection


@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <div class="card">
        <div class="card-header header-elements-inline">

            <h5 class="card-title"><a href="{{route('admin.roles.create')}}" class="btn btn-info"><i class="icon-plus3 mr-3 icon-xl"></i>İmtiyaz əlave et</a></h5>

        </div>

        <table class="table ">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Daxil etmə tarixi</th>
                    <th>Düzəliş et</th>
                    <th class="text-center">Sil</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{$role->created_at}}</td>
                    <td> <a href="{{route('admin.roles.edit',$role->id)}}"><i class="btn btn-info fa fa-edit"></i></a></td>
                    <td class="text-center"><a class="deleteRecord " data-id="{{ $role->id }}"><i class="btn btn-danger fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(".deleteRecord").click(function() {
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    var confirmDelete = confirm("Silməyə əminsiniz?");
    if (!confirmDelete) {
        return false;
    }
    
    $.ajax({
        url: "role_delete/" + id,
        type: 'post',
        data: {
            "id": id,
            "_token": token,
        },
        success: function() {
            $(`.deleteRecord[data-id="${id}"]`).closest('tr').remove();
        }
    });

});
</script>

@endsection