

</<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style type="text/css">
        .btn-add>a, .btn-add>a:hover, .btn-add>a:focus
        {
            color:#fff;
        }

        .detail-box
        {
            margin: 25px 0;
            
            padding: 10px;
        }

        .header-detail
        {
            margin:25px 10px;
            border:1px solid #000;
            padding: 15px;
            position: relative;
        }

        .header-title
        {
            font-size: 18pt;
            font-weight: 600;
        }

        .header-price
        {
            position: absolute;
            right: 10%;
            bottom: 10%;
            font-size: 16pt;
            font-weight: 400;
        }

        .content-detail
        {
            margin:10px 10px;
        }

        .tab-cover
        {
            padding: 15px;
        }

        .title-tab
        {
            font-size: 14pt;
            background-color: #f69320;
            text-align: center;
            color: #fff;
        }

        .display-comment
        {
            padding:10px 0;
            margin:5px 0;
            border-bottom: 1px solid #000;
        }

        .user-comment
        {
            font-size: 12pt;
            font-weight: 400;
        }

        .date-comment
        {
            font-size: 10pt;
            font-weight: 300;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="detail-box">
                    <div class="header-detail">
                        <div class="header-title">
                             {{ $product->brand. ' '.$product->model }}
                        </div>
                        <div class="header-image">
                            <center>
                                <img src="{!! url('/images/'.$product->fileToUpload) !!}" height="150">
                            </center>
                        </div>
                        <div class="header-price">
                            {{ "Rp ".number_format($product->price,2) }}
                        </div>
                    </div>
                    <div class="content-detail">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="tab-cover">
                                    <div class="title-tab">
                                        Dimensions
                                    </div>
                                    <div class="content-tab">
                                        <div class="form-group" style="padding-top: 10px;">
                                            <label>Length</label>
                                            <div class="value-tab">{{ number_format($product->length) }}</div>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label>Width</label>
                                            <div class="value-tab">{{ number_format($product->width) }}</div>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label>Height</label>
                                            <div class="value-tab">{{ number_format($product->height)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="tab-cover">
                                    <div class="title-tab">
                                        Engine
                                    </div>
                                    <div class="content-tab">
                                        <div class="form-group" style="padding-top: 10px;">
                                            <label>Fuel System</label>
                                            <div class="value-tab">{{ $product->fuel }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="part-comment">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4>Comments</h4>
                                
                                @foreach($post_comment as $comment)
                                <div class="row">
                                    <div class="col-lg-1 col-md-1 col-sm-1">
                                    </div>
                                    <div class="col-lg-11 col-md-11 col-sm-11">
                                        <div class="display-comment">
                                            <div class="user-comment">Guest</div>
                                            <div class="date-comment">{{ $comment->created_at }}</div>
                                            <br/>
                                            <p>{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                <hr />
                                
                                <form method="post" action="{{ route('post_comment', $product->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" name="body"></textarea>
                                        <input type="hidden" name="post_id" id="post_id" value="{{ $product->id }}" />
                                        <input type="hidden" name="title" id="title" value="{{ $product->brand. ' '.$product->model }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Add Comment" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
                    

           
        </div>
    </div>
</body>
</html>