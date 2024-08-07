@extends('layouts.admin')
@section('title','İstifadəçi əlave et')
@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <!-- Basic tabs -->
    <form action="{{ route('admin.permissions.update',$permissions->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$permissions->name}}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    <!-- /basic tabs -->
    <div>
        <h2>Permission Role </h2>
        @if($permissions->roles)
        @foreach($permissions->roles as $permission_role)
        <form action="{{route('admin.permissions.roles.remove',[$permissions->id,$permission_role->id])}}" method="post" onsubmit="return confirm('Emisnisniz?')">
            @csrf
            @method('DELETE')
            <button type="submit">{{$permission_role->name}}</button>
        </form>
        @endforeach
        @endif
    </div>
    <hr>
    <form action="{{ route('admin.permission.roles',$permissions->id) }}" method="POST">
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
@endsection