@extends('layouts.admin')
@section('title','İstifadəçi əlave et')
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
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$role->name}}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    <hr>
    <!-- /basic tabs -->

    <div>
        <h2>Role Permission</h2>
        @if($role->permissions)
        @foreach($role->permissions as $role_permission)
        <form action="{{route('admin.roles.permission.revoke',[$role->id,$role_permission->id])}}" method="post" onsubmit="return confirm('Emisnisniz?')">
            @csrf
            @method('DELETE')
            <button type="submit">{{$role_permission->name}}</button>
        </form>
        @endforeach
        @endif
    </div>
    <hr>
    <form action="{{ route('admin.roles.permissions',$role->id) }}" method="POST">
        @csrf
        <div class="row">
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <select name="permission" id="">
                    @foreach($permissions as $permission)
                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                    @endforeach
                </select>
            </div> -->

            @foreach ($permissions as $value)
            <label>
                <input type="checkbox" @if (in_array($value->name, $rolePermissions)) checked @endif name="permission[]"
                value="{{$value->name}}" class="name">
                {{ $value->name }}</label>
            <br />
            @endforeach

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Assign</button>
            </div>
        </div>
    </form>
</div>
@endsection