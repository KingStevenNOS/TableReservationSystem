@extends('layouts.app')

@section('title','Menu')

@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

@endpush

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">All menus</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="myTable" class="table" cellspacing="0" width="100%">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Category</th>
                      <th>Food Name</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th class="text-right">Price</th>
                      <th></th>
                    </thead>
                    <tbody>
                    @foreach ($menus as $menu)
                       <tr>
                        <td>
                          {{ $menu->id }}
                        </td>
                        <td>
                          {{ $menu->category }}
                        </td>
                        <td>
                          {{ $menu->food_name }}
                        </td>
                        <td>
                          {{ $menu->food_description }}
                        </td>
                        <td>
                          {{ $menu->image }}
                        </td>
                        <td class="text-right">
                          {{ $menu->price }}
                        </td>
                        <td>
                            <td>
                                <a href="{{ route('menu.edit',$menu) }}" class="btn btn-success" style="color:white">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('menu.edit',$menu) }}" class="btn btn-danger" style="color:white" onclick="if(confirm('Are You Sure You want to delete this?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $menu->id }}').submit();
                                }else{
                                    event.preventDefault();
                                }">Delete</a>
                                <form id="delete-form-{{ $menu->id }}" action="{{ route('menu.destroy', $menu) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>

                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <a href="{{ route('menu.create') }}" class="btn btn-info">Add New</a>
        </div>
      </div>

      @if (session('successMsg'))
          <div class="alert alert-success">
              <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
              <span><strong>Done!! - </strong>{{ Session('successMsg') }}</span>
          </div>
      @endif

      <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="card-title"> Categories</h4>
                <p class="category">Here is a list of all the categories</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id='myTable' class="table">
                    <thead class=" text-primary">
                        <th>
                            Category
                        </th>

                        <th class="text-right">

                        </th>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach ($categories as $item)
                            <td>
                                {{ $item->category }}
                            </td>

                            <td class="text-right">

                                <td>
                                    <a href="{{ route('category.edit',$item) }}" class="btn btn-success" style="color:white">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('category.edit',$item) }}" class="btn btn-danger" style="color:white" onclick="if(confirm('Are You Sure You want to delete this?'))
                                    {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $item->id }}').submit();
                                    }else
                                    {
                                        event.preventDefault();
                                    }">
                                        Delete
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('category.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>

                            </td>
                        @endforeach

                      </tr>
                    </tbody>
                  </table>
                  <a href="{{ route('category.create') }}" class="btn btn-info">Add New</a>


                </div>
              </div>
            </div>
      </div>
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
