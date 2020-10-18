@extends('layouts.admin-theme-main-app')

@section('content')
<div class="container-fluid">
    <h3 class="mt-4">Edit Page <small>(Note : Fields marked with <span class="text-danger">*</span> are compulsory fields) </small></h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            Interface > <a  href="{{ route('page-configuration.index') }}">Page </a> > Edit Page
        </li>
    </ol>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div>
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('page-configuration.update', $page->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">    
                                <label for="page_name">Name <span class="text-danger">*</span></label>
                                <input type="text" id="page_name" class="form-control" name="page_name" value="{{$page->page_name}}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="page_sort_order">Sort Order <span class="text-danger">*</span></label>
                                <input type="text" id="page_sort_order" class="form-control" name="page_sort_order" value="{{$page->page_sort_order}}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="page_url">Url <span class="text-danger">*</span></label>
                                <input type="text" id="page_url" class="form-control" name="page_url" value="{{$page->page_url}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="page_keywords">Keywords</label>
                        <textarea class="form-control" rows="2" id="page_keywords" name="page_keywords">{{$page->page_keywords}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="page_description">Description</label>
                        <textarea class="form-control" rows="2" id="page_description" name="page_description">{{$page->page_description}}</textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
