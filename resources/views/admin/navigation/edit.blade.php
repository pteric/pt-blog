@extends('layouts.admin')
@section('content')

    <!--面包屑导航 开始-->
    {{--<div class="crumb_warp">--}}
        {{--<i class="fa fa-home"></i> <a href="#">首页</a> &raquo; 编辑导航--}}
    {{--</div>--}}
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            @if(count($errors) > 0)
            <div style="color:red">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/navigation/create')}}"><i class="fa fa-plus"></i>添加导航</a>
                <a href="{{url('admin/navigation')}}"><i class="fa fa-recycle"></i>全部导航</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/navigation/' . $field->navigation_id)}}" method="post">
            <input type='hidden' name='_method' value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i>导航名称：</th>
                    <td>
                        <input type="text" class="lg" name="navigation_name" value="{{$field->navigation_name}}">
                        <input type="text" name="navigation_alias" class="sm" value="{{$field->navigation_alias}}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>导航路径：</th>
                    <td>
                        <input type="text" value="{{$field->navigation_url}}" name="navigation_url">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection