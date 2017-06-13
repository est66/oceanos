<html>
    <head>
        <meta charset="UTF-8"> 
        <title>title</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
              rel="stylesheet" 
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
              crossorigin="anonymous">
    </head>
    <body>
 
<div class="container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action = "{{route('upload.media')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
            <input type="file" id="medias" name="media" multiple="multiple" />
            <p style="text-align: right; margin-top: 20px;">
                <input type="submit" value="Upload" class="btn btn-lg btn-primary" />
            </p>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

    </body>
</html>
