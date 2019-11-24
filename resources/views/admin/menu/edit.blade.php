@extends('layouts.app')

@section('title','menu')

@push('css')

@endpush

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add New menu</h4>
              </div>
              <div class="card-body">
                <div class="card-content">
                    <form action="{{ route('menu.update',$menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Food Name</label>
                                    <input type="text" class="form-control" placeholder="Name Your Food Item"  name="food_name" value="{{ $menu->food_name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Food Description</label>
                                    <input type="textarea" class="form-control" placeholder="What Does The Food Come With" name="food_description" value="{{ $menu->food_description }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" placeholder="What Does The Food Come With" name="price" value="{{ $menu->price }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Category</label><br>
                                    <select name="category" id="category" class="form-control">
                                            <option value="{{ $menu->category }}" disabled><span style="color:red;">{{ $menu->category }}</span></option>
                                            <option value="" disabled><b><hr></b></option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->category }}">{{ $item->category }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label class="btn btn-info" style="color:white;"> <input type="file" name="image" value="{{ $menu->image }}"></label>

                            </div>
                        </div>
                        <a href="{{ route('menu.index') }}" class="btn btn-danger">back</a>
                        <button type="submit" class="btn btn-info">Save</button>
                    </form>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')

@endpush
