@extends('layouts.admin-theme-main-app')

@section('content')
<div class="container-fluid">
    <h3 class="mt-4">Pages</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Interface > Pages</li>
    </ol>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if(session()->get('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('success') }}  
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
        	<div class="row">
        		<div class="col-sm-12 col-md-12 text-right">
        			<a class="btn btn-primary" href="{{route('page-configuration.create')}}">
                        <small>{{ __('Add New Page') }}</small>
                    </a>
        		</div>
        	</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Sort Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Sort Order</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	@foreach($pages as $page)
                        <tr>
                            <td>{{$page->page_name}}</td>
                            <td>{{$page->page_sort_order}}</td>
            				<td>
            					<div class="row ml-auto">
                                    <a href="{{ route('page-configuration.edit',$page->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <span>&nbsp;</span>
                                    <form action="{{ route('page-configuration.destroy', $page->id)}}" method="post" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </div>
            				</td>
                        </tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('stylesheets')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous" defer></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" crossorigin="anonymous" defer></script>
    <script src="{{ asset('admin-theme/js/list-page-js/list.js') }}" defer></script>
@endpush