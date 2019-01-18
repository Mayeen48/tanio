

    
       

<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title')
    </title>
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/font-awesome-4.7.0/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/tanio/custom.css')}}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <!-- <script type="text/javascript" src="{{asset('public/tanio/script.js')}}"></script> -->
</head>
<body>
 @include('includes.header')
        <div class="container">
            @yield('mainContent') 
        </div>
 @include('includes.footer')


 
</body>
</html>

<script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".csv,.xlsx",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("file/delete") }}',
                    data: {filename: name},
                    success: function (data){

                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                console.log(response);

       //          var ext = checkFileExt(response.success); // Get extension
       //          var newimage = "";
       //            console.log(ext);
       //         // Check extension
			    // if(ext != 'png' && ext != 'jpg' && ext != 'jpeg'){
			    //   newimage = response.noImage; // default image path
			    // }
			    // console.log(newimage);
 
    			//  this.createThumbnailFromUrl(response.success, newimage);


                document.getElementById('my_iframe').src = response.success;
               
            },
            error: function(file, response)
            {
            	alert("Please select only CSV or XLSX file only");
                var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
               //return false;
            }
};

// Get file extension
// function checkFileExt(filename){
//   filename = filename.toLowerCase();
//   return filename.split('.').pop();
// }
</script>