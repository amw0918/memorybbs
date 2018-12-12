@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-default col-md-10 col-md-offset-1">
            <div class="panel-heading">
                <h4>
                    <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
                </h4>
            </div>

            @include('common.error')
            <div class="panel-body">

                <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="form-group">
                        <label for="name-field">昵称</label>
                        <input class="form-control" type="text" name="nickname" id="name-field" value="{{ old('nickname', $user->nickname) }}" />
                    </div>
                    <div class="form-group">
                        <label for="email-field">邮 箱</label>
                        <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $user->email) }}" />
                    </div>
                    <div class="form-group">
                        <label for="mobile-field">手 机</label>
                        <input class="form-control" type="text" name="mobile" id="mobile-field" value="{{ old('mobile', $user->mobile) }}" />
                    </div>
                    <div class="form-group">
                        <label for="introduction-field">个人简介</label>
                        <textarea name="intro" id="introduction-field" class="form-control" rows="3">{{ old('intro', $user->intro) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="avatar-field">头 像</label>
                        <input class="form-control" type="file" name="avatar" id="avatar-field"  />
                        @if($user->avatar)
                            <br>
                            <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
                        @endif
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection