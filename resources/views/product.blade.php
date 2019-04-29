@extends('layouts.app')

      <style type="text/css">
        .btn-add>a, .btn-add>a:hover, .btn-add>a:focus
        {
            color:#fff;
        }

        .hr-border
        {
            border-top:1px solid black;
            
            margin: 10px 0px;
        }

        .linkadd
        {
            text-decoration: none !important;
        }

        .box-border {
          box-sizing: content-box;  
          width: auto;
          height: auto;
          padding: 30px;  
          border: 5px solid black;
          margin-left: 0px !important;
          margin-right: 0px !important;
          margin-top: 10px !important;
          margin-bottom: 10px !important;
        }

        a
        {
            text-decoration: none !important;
        }
     
    </style>
@section('content')
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1>All Information About Product</h1>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div style="margin:15px 0">
                    <button class="btn btn-success btn-add">
                        <a class="linkadd" href="{{ route('uploadform') }}">Add Product</a>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">

            @if( count($product)>0)

                    @foreach ($product as $prod)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <a href="{{ route('detail', $prod->id) }}">
                            <div class="row box-border">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="img-div">
                                        <center>
                                            <img src="{!! url('/images/'.$prod->fileToUpload) !!}" height="150">
                                        </center>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 hr-border">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <center>
                                    <div class="prod-desc">
                                        {{ $prod->brand. ' '.$prod->model }}
                                        <br/>
                                        {{ $prod->fuel }}
                                        <br/>
                                        {{ "Rp ".number_format($prod->price,2) }}
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

            @else
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <center>
                            <i>No Data available</i>
                        </center>
                    </div>
            @endif
        </div>
    </div>
@endsection
