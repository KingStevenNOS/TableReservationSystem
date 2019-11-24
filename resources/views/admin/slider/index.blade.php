@extends('layouts.app')

@section('title','Slider')

@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@endpush

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">All Sliders</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table" cellspacing="0" width="100%">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Title
                      </th>
                      <th>
                        Subtitle
                      </th>
                      <th>
                        Image
                      </th>
                      <th class="text-right">
                        Created At
                      </th>
                      <th class="text-right">
                        Updated At
                      </th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach ($sliders as $slider)
                       <tr>
                        <td>
                          {{ $slider->id }}
                        </td>
                        <td>
                          {{ $slider->title }}
                        </td>
                        <td>
                          {{ $slider->sub_title }}
                        </td>
                        <td>
                          {{ $slider->image }}
                        </td>
                        <td class="text-right">
                          {{ $slider->created_at }}
                        </td>
                        <td class="text-right">
                          {{ $slider->updated_at }}
                        </td>
                        <td>
                            <a href="{{ route('slider.edit',$slider) }}" class="btn btn-black" style="color:white">Edit</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <a href="{{ route('slider.create') }}" class="btn btn-info">Add New</a>
        </div>
      </div>

      @if (session('successMsg'))
          <div class="alert alert-success">
              <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
              <span><strong>Done!! - </strong>{{ Session('successMsg') }}</span>
          </div>
      @endif
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function ()
    {
        $('#myTable').DataTable();
    });
</script>
@endpush
