<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jemmy Cloud Quiz 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid m-0 p-3 mx-auto">
        @error('files.*')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            <form action="/" method="POST" enctype="multipart/form-data" class="col-12 col-md-6 col-lg-4 mx-auto p-5 border border-dark" style="border-radius: 10%">
                @csrf
                <div class="mt-3 d-flex justify-content-center">      
                    <label 
                        for="files" 
                        class="form-label h1"> 
                        Coffee Cloud Boot
                    </label>
                </div>
                <input 
                    type="text"
                    name="firstname" 
                    class="form-control form-control-lg my-3" 
                    placeholder="First Name" 
                    required />
                <span class="text-danger">@error('firstname') {{$message}} @enderror</span>

                <input
                    type="text"
                    name="lastname"
                    class="form-control form-control-lg my-3"
                    placeholder="Last Name"
                    required />
                <span class="text-danger">@error('lastname') {{$message}} @enderror</span>

                <input 
                    id="files" 
                    class="my-3 form-control form-control-lg" 
                    type="file" 
                    name="files[]" 
                    onchange="checkFile()" 
                    multiple />

                <div class="my-3 row">
                    <div class="col-6">
                        <div class="d-flex justify-content-start">
                        <a href="/files" class="btn btn-primary">
                            <i class="fa-solid fa-folder">
                                </i> Files </a>
                    </div>
                    </div class="col-6">
                        <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <input 
                                id="upload" 
                                class="btn btn-success d-none" 
                                type="submit" 
                                value="Upload">
                        </div>
                    </div>
                </div>
            
            </form>
    </div>

     <script>
        // JavaScript function to check if a file is selected
        function checkFile() {
            var fileInput = document.getElementById('files');
            var submitBtn = document.getElementById('upload');
            
            // Check if any file is selected
            if (fileInput.value) {
                submitBtn.classList.remove('d-none'); // Show the submit button
            } else {
                submitBtn.classList.add('d-none'); // Hide the submit button
            }
        }
    </script>
</body>
</html>
