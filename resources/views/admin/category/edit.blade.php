@extends('layouts.app')

@section('title','category')

@push('css')

@endpush

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add New Category</h4>
              </div>
              <div class="card-body">
                <div class="card-content">
                    <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" class="form-control" placeholder="Update your category"  name="category" value="{{ $category->category }}">
                                </div>
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
