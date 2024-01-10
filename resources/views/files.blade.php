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
        <div class="col-12 col-md-8 mx-auto">
            <div class="my-3">
                <a href="/" class="text-primary"> <i class="fa-solid fa-arrow-left"> BACK</i></a>
            </div>
            <h3 class="mt-3"> Space Storage </h3>
            <table border="1" class="table table-striped table-bordered table-hover table-responsive">
                <thead>
                    <tr class="table-primary p-2">
                        <th class="text-center">#</th>
                        <th class="">Name</th>
                        <th class="">Filename</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($space as $sp)
                        <tr class="container-fluid align-middle">
                            <td class="text-center">{{ $sp -> id }}</td>
                            <td class="">{{ $sp -> firstname }}-{{ $sp -> lastname }} </td>
                            <td class=""><em>{{ $sp -> filename }}</em></td>
                            <td align="center">
                                <img src="{{ env('DO_SPACES_PATH') }}/{{ $sp -> path }}" alt="" height="100px">
                            </td>
                            <td class="text-center">
                                <a href="{{ env('DO_SPACES_PATH') }}/{{ $sp -> path }}" class="btn btn-secondary"><i class="fa-solid fa-eye"></i></a>
                                <a href="/deletespace/{{ $sp -> id }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
