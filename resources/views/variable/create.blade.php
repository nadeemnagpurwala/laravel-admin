@extends('layouts.admin-theme-main-app')

@section('content')
<div class="container-fluid">
    <h3 class="mt-4">New System Variable <small>(Note : Fields marked with <span class="text-danger">*</span> are compulsory fields) </small></h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            Settings > <a  href="{{ route('variable-configuration.index') }}">System Variables </a> > Create System Variable
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
                <form method="post" action="{{ route('variable-configuration.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">    
                                <label for="variable_name">Variable Name <span class="text-danger">*</span></label>
                                <input type="text" id="variable_name" class="form-control" name="variable_name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="variable_code">Variable Code <span class="text-danger">*</span></label>
                                <input type="text" id="variable_code" class="form-control" name="variable_code"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="variable_plain_value">Variable Plain Value</label>
                        <textarea class="form-control" rows="2" id="variable_plain_value" name="variable_plain_value"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="variable_html_value">Variable Html Value</label>
                        <textarea class="form-control" rows="2" id="variable_html_value" name="variable_html_value"></textarea>
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
