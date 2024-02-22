@extends('dashboard.layout.app')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> {{ $data['page'] }} </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data['page'] }}</li>
            </ol>
        </nav>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <script src="{{ asset('assets/vendors/ckeditor/ckeditor.js') }}"></script>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Price</h4>
                    <form class="form-sample" method="POST" action="{{ route('submitNewUser') }}">
                        @csrf
                        <p class="card-description">  </p>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-sm-3 col-form-label">Enter Price Description</label>
                                <br>

                                <textarea class="ckeditor form-control" name="editor" id="editor" rows="20"></textarea>


                            </div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary mr-2 ">Submit</button>

                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('assets/vendors/ckeditor/ckeditor.js') }}"></script>

    <script>
    //     ClassicEditor
    // .create(document.querySelector('#editor'), {
    //     toolbar: {
    //         items: [
    //             'undo',
    //             'redo',
    //             '|',
    //             'bold',
    //             'italic',
    //             'strikethrough'
    //         ]
    //     }
    // })
    // .then(editor => {
    //     console.log('Editor was initialized', editor);
    // })
    // .catch(error => {
    //     console.error('There was an error initializing the editor', error);
    // });


        // ClassicEditor
        // .create(document.querySelector('#editor'))
        // .then(editor => {
        //     console.log(editor.plugins._availablePlugins);
        //     // console.log(Array.from(editor.ui.componentFactory.names()));
        // })
        // .catch(error => {
        //     console.error('There was an error initializing the editor', error);
        // });

    </script>



    <!-- content-wrapper ends -->
@endsection


