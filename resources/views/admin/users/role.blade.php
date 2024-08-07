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
    <div class="bg-info"> <span class="text-warning">User Role</span> <br>
        {{$user->name}} <br>
        {{$user->email}}
    </div>
    <hr>
    <div style="border-style:  dashed ;">
        <div>
            <h2>User  Role</h2>
            @if($user->roles)
            @foreach($user->roles as $user_roles)
            <form action="{{route('admin.user.roles.remove',[$user->id,$user_roles->id])}}" method="post" onsubmit="return confirm('Emisnisniz?')">
                @csrf
                @method('DELETE')
                <button type="submit">{{$user_roles->name}}</button>
            </form>
            @endforeach
            @endif
        </div>
        <hr>
        <form action="{{ route('admin.user.roles',$user->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <select name="role" id="">
                        @foreach($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </div>
        </form>
    </div>

    <hr>
    <div style="border-style:  dashed ;">
        <div>
            <h2>User  Permission</h2>
            @if($user->permissions)
            @foreach($user->permissions as $user_permissions)
            <form action="{{route('admin.user.permissions.remove',[$user->id,$user_permissions->id])}}" method="post" onsubmit="return confirm('Emisnisniz?')">
                @csrf
                @method('DELETE')
                <button type="submit">{{$user_permissions->name}}</button>
            </form>
            @endforeach
            @endif
        </div>
        <hr>
        <form action="{{ route('admin.user.permissions',$user->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <select name="permission" id="">
                        @foreach($permissions as $permission)
                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </div>
        </form>
    </div>

</div>


@endsection