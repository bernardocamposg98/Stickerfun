@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-1">
                    <h2 class="text-center uppercase text-gray-500 text-black font-semibold">
                        Edit Stickerspay
                    </h2>
                </div>
                <div class="text-left col-md-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <p>-{{$error}}</p>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                {{-- {{ route('tag.update', $sticker->id) }} --}}
                <form action="{{ route('stickerpays.update', $sticker->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Name:</label>
                            <input disabled name="label" value="{{$sticker->name}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Publisher:</label>
                            <input disabled name="publisher" value="{{$sticker->publisher}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Descripción:</label>
                            <input disabled name="description" value="{{$sticker->description}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Email:</label>
                            <input disabled name="publisher_email" value="{{$sticker->publisher_email}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Website:</label>
                            <input disabled name="publisher_website" value="{{$sticker->publisher_website}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold mb-1">Upload Sticker</label>
                    </div>
                    {{-- <div class="overflow-hidden grid grid-cols-8  mx-7">
                        <button type="button" name="add" id="add" class="btn btn-success py-2 px-3" value="submit"> Add </button>
                    </div> --}}
                    <div class="grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7">
                        {{-- <div id="dynamic_field" class="">
                            @foreach ($stickerpays as $stickerpay)
                            <div id="hola{{$stickerpay->id}}">
                                <div class='flex items-center '>
                                    <button class="bg-indigo hover:bg-indigo-dark text-white font-bold py-2 px-4 inline-flex items-center">
                                        <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                                        </svg>
                                        <span class="ml-2">Upload File</span>
                                    </button>
                                    <input type="hidden" name="check[]" value="{{$stickerpay->name}}">
                                    <input value="{{$stickerpay->name}}" class="cursor-pointer absolute block opacity-0 pin-r pin-t" accept=".webp" name="pays[]" id="imagen" type='file' multiple/>
                                    <img src="/Pack{{$sticker->id}}/{{ $stickerpay->name }}.webp" width="50px" id="imagenSeleccionada">
                                </div>
                                <div>
                                    <button id="{{$stickerpay->id}}" type="button" name="remove"  class="btn btn-danger btn_remove">Delete</button>
                                </div>
                            </div>
                            @endforeach
                        </div> --}}
                        {{-- @foreach ($stickerpays as $stickerpay)
                        <img src="/Pack{{$sticker->id}}/{{ $stickerpay->name }}.webp" width="50px" id="imagenSeleccionada">
                        @endforeach --}}
                        {{-- 
                        <div class='flex items-center '>
                            <button class="bg-indigo hover:bg-indigo-dark text-white font-bold py-2 px-4 inline-flex items-center">
                                <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                                </svg>
                                <span class="ml-2">Upload Fileeee</span>
                                <input class="cursor-pointer absolute block opacity-0 pin-r pin-t" accept=".webp" name="pays[]" id="imagen" type='file' multiple/>
                            </button>
                            <input type="hidden" name="check[]" value="{{$stickerpay->name}}">
                        </div> --}}
                       
                        {{-- <button class="bg-indigo hover:bg-indigo-dark text-white font-bold py-2 px-4 w-full inline-flex items-center">
                            <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                            </svg>
                            <span class="ml-2">Upload File</span>
                        </button> --}}
                        <input id="fileUpload" class="" accept=".webp" name="tray_image_file" id="imagen" type='file' multiple/>
                        @foreach ($stickerpays as $stickerpay)
                        <img src="/imagestickerfree/{{ $sticker->tray_image_file }}" width="50px" id="imagenSeleccionada">
                        @endforeach
                        <div id="image-holder"></div>
                    </div>
                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <a href="{{ route('stickers.index') }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</x-app-layout>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
<script>
    $("#fileUpload").on('change', function () {

//Get count of selected files
var countFiles = $(this)[0].files.length;

var imgPath = $(this)[0].value;
var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
var image_holder = $("#image-holder");
image_holder.empty();

if (extn == "gif" || extn == "webp" || extn == "jpg" || extn == "jpeg") {
    if (typeof (FileReader) != "undefined") {

        //loop for each file selected for uploaded.
        for (var i = 0; i < countFiles; i++) {

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                        "class": "thumb-image"
                }).appendTo(image_holder);
            }

            image_holder.show();
            reader.readAsDataURL($(this)[0].files[i]);
        }

    } else {
        alert("This browser does not support FileReader.");
    }
} else {
    alert("Pls select only images");
}
});
</script>
<script>
    $(document).ready(function(){
        var i = 1;
        $('#add').click(function (){
            i++;
            $('#dynamic_field').append(
                // '<div id="row'+i+'" >' +
                //     '<input name="pays[]" id="imagen" type="file"/>'+
                //     '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button>' +
                // '</div>'
                '<div id="row'+i+'">' +
                    '<div class="flex items-center">' +
                        '<button class="bg-indigo hover:bg-indigo-dark text-white font-bold py-2 px-4 inline-flex items-center">' +
                            '<svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">' +
                                '<path d="M0 0h24v24H0z" fill="none"/>' +
                                '<path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>' +
                            '</svg>' +
                            '<span class="ml-2">Upload File</span>' +
                        '</button>' +
                        '<input class="cursor-pointer absolute block opacity-0 pin-r pin-t" accept=".webp" name="pays[]" id="imagen" type="file" multiple/>' +
                        '<img src="/Pack.webp" width="50px" id="imagenSeleccionada1">' +
                    '</div>' +
                    '<div>' +
                        '<button id="'+i+'" type="button" name="remove"  class="btn btn-danger btn_remove">Delete</button>' +
                    '</div>' +
                '</div>' 
                );
        });
        $(document).on('click', '.btn_remove', function (){
        var id = $(this).attr('id');
        $('#row'+id).remove();
        // alert(id);
        });
        $(document).on('click', '.btn_remove', function (){
        var id = $(this).attr('id');
        $('#hola'+id).remove();
        // alert(id);
        });
    })
    
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

