@extends('layouts.app')

@section('title','Slider')

@push('css')

@endpush

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Add New Slider</h4>
              </div>
              <div class="card-body">
                <div class="card-content">
                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" placeholder="Title"  name="title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subtitle</label>
                                    <input type="text" class="form-control" placeholder="Sub Title" name="sub_title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="btn btn-info" style="color:white;"> <input type="file" name="image"></label>

                            </div>
                        </div>
                        <a href="{{ route('slider.index') }}" class="btn btn-danger">back</a>
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
