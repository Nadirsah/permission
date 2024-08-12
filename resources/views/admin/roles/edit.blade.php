@extends('layouts.admin')
@section('title','İstifadəçi əlave et')
@section('theme_js')
<script src="{{asset('admin')}}\global_assets\js\demo_pages\user_pages_list.js"></script>
@endsection

@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <!-- Basic tabs -->
    <form action="{{ route('admin.roles.update',$role->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>İmtiyaz:</strong>
                    <input type="text" name="name" value="{{$role->name}}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Yenilə</button>
            </div>
        </div>
    </form>
    <hr>
    <!-- /basic tabs -->

    <div>
        <h5 class="text-center">İmtiyaz icazələri</h5>
        <div class="row">
            @foreach($role->permissions as $role_permission)
            <div class="permission col-lg-3 col-sm-6">
                <div class="thumbnail">
                    <div class="thumb">
                        <form id="revoke-permission-form" action="{{route('admin.roles.permission.revoke',[$role->id,$role_permission->id])}}" method="post" onsubmit="return confirm('Emisnisniz?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger ">{{$role_permission->slug}}</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-flat">

                <div class="panel-body">
                    <h6 class="panel-title text-center">İcazələr</h6>
                    <hr>
                    <form action="{{ route('admin.roles.permissions',$role->id) }}" method="POST">
                        @csrf

                        <div class="row">
                            @foreach ($permissions as $value)
                            <div class="col-md-3 ">
                                <div class="form-group text-success">
                                    <label>
                                        <input type="checkbox" @if (in_array($value->name, $rolePermissions)) checked @endif name="permission[]"
                                        value="{{$value->name}}" class="text-danger">
                                        {{ $value->slug }}</label>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Assign</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</div>
<script>
    $(document).ready(function() {
        $('#revoke-permission-form').on('submit', function(event) {
            event.preventDefault(); 
            var token = $("meta[name='csrf-token']").attr("content");
            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var data = form.serialize();

            

            $.ajax({
                url: url,
                type: method,
                data: data,token, 
                success: function() {
                    form.closest('.permission').remove();
                },
                error: function(xhr) {
                    alert('Bir xəta baş verdi: ' + xhr.responseText);
                }
            });
        });
    });
</script>
@endsection