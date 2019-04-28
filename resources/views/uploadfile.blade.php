@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 100%;">
                <div class="card-header">Product Form</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                        <form action="/uploadfile" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label>Brand</label>
                                    <input type="text" id="brand" name="brand" value="{{ old('brand') }}" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label>Model</label>
                                    <input type="text" id="model" name="model" value="{{ old('model') }}" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label>Fuel</label>
                                    <input type="text" id="fuel" name="fuel" value="{{ old('fuel') }}" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label>Price</label>
                                    <input type="text" id="price" name="price" value="{{ old('price') }}" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label>Dimension</label>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                    <label>Length</label>
                                    <input type="text" id="length" name="length" value="{{ old('length') }}" placeholder="in centimeters" class="form-control" autocomplete="off"> 
                                </div>

                                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                    <label>Width</label>
                                    <input type="text" id="width" name="width" value="{{ old('width') }}" placeholder="in centimeters" class="form-control" autocomplete="off"> 
                                </div>

                                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                    <label>Height</label>
                                    <input type="text" id="height" name="height" value="{{ old('price') }}" placeholder="in centimeters" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile" value="{{ old('fileToUpload') }}" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-danger">Back to Dashboard</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection