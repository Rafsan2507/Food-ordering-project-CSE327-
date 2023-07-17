@extends('BackEnd.master')
@section('title')
    Manage Dish
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dish</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Dish Name</th>
                    <th>Category Name</th>
                    <th>Dish Detail</th>
                    <th>Dish Image</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($dishes as $dish)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            {{$dish->dish_name}}
                        </td>
                        <td>
                            {{$dish->category_name}}
                        </td>
                        <td>
                            {{$dish->dish_detail}}
                        </td>
                        <td>
                            <img src="{{asset($dish->dish_image)}}" height="125" width="125" class="img-fluid img-thumbnail">
                        </td>
                        <td>
                            {{$dish->price}}
                        </td>
                        <td>
                            @if($dish->dish_status==1)
                                <a class="btn btn-outline-success" href="{{route('dish_inactive',['dish_id'=>$dish->dish_id])}}">
                                    <i class="fas fa-arrow-up"title="Click to deactivate"></i>
                                </a>
                            @else
                                <a class="btn btn-outline-info" href="{{route('dish_active',['dish_id'=>$dish->dish_id])}}">
                                    <i class="fas fa-arrow-down"title="Click to activate"></i>
                                </a>
                            @endif
                            <a type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{$dish->dish_id}}">
                                <i class="fas fa-edit"title="Edit"></i>
                            </a>
                            <a class="btn btn-outline-dark" href="{{route('delete_dish',['dish_id'=>$dish->dish_id])}}">
                                <i class="fas fa-trash" title="Delete"></i>
                            </a>
                        </td>
                    </tr>

                    {{--=====Modal Start Here=====--}}

                    <div class="modal fade" id="edit{{$dish->dish_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Dish</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('update_dish')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="dish_name" value="{{$dish->dish_name}}">
                                            <input type="hidden" class="form-control" name="dish_id" value="{{$dish->dish_id}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select id="category_id" name="category_id" class="form-control">
                                                <option>--Select Category--</option>
                                                @foreach($categories as $cate)
                                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea type="text" name="dish_detail" class="form-control" rows="5">{{$dish->dish_detail}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" class="form-control" name="dish_image" accept="image/*">
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control" name="price" value="{{$dish->price}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="btn" class="btn btn-primary" value="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--=====Modal End Here=====--}}
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
