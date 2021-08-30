@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Coming Soon...</h1> --}}
@stop

@section('content')
<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-1">
                    <h2 class="text-center uppercase text-gray-500 text-black font-semibold">
                        Create Sticker
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
                <form action="{{ route('stickers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Name:</label>
                            <input name="name" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Publisher:</label>
                            <input name="publisher" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Descripción:</label>
                            <input name="description" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Email:</label>
                            <input name="publisher_email" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Website:</label>
                            <input name="publisher_website" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <img id="imagenSeleccionada"  width="100px" >           
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold mb-1">Upload Sticker</label>
                        <input name="tray_image_file" id="imagen" type='file'/>
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
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>
    $(document).ready(function(){
        var i = 1;
        $('#add').click(function (){
            i++;
            $('#dynamic_field').append(
                '<div id="row'+1+'" class="grid grid-cols-1">' +
                    '<input name="tags[]" class="name_list py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"/>' +
                    '<button type="button" name="remove" id="'+1+'" class="btn btn-danger btn_remove"></button>' +
                '</div>');
                // '<tr id="row'+1+'">' +
                // '<td><input type="text" name="name[]" placeholder="add tag" class="form-control name_list" /></td>' +
                // '<td><button type="button" name="remuoe" id="'+1+'" class="btn btn-danger btn_remove"></button></td>' +
                // '</tr>');
        });
        $(document).on('click', '.btn_remove', function (){
        var id = $(this).attr('id');
        $('#row'+id).remove();
        // alert(id);
        });
    })
    
</script>
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
{{-- <form action="/stickers" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form label">Name:</label>
        <input id="name" name="name" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Publisher:</label>
        <input id="publisher" name="publisher" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Description:</label>
        <input id="description" name="description" type="text" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Sticker:</label>
        <input id="tray_image_file" name="tray_image_file" type="text" class="form-control" tabindex="4">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Email:</label>
        <input id="publisher_email" name="publisher_email" type="text" class="form-control" tabindex="5">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Website:</label>
        <input id="publisher_website" name="publisher_website" type="text" class="form-control" tabindex="6">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Tags:</label>
        <input id="tags" name="tags" type="text" class="form-control" tabindex="6">
    </div>
    <a href="/stickers" class="btn btn-secondary" tabindex="7">Cancel</a>
    <button type="submit" class="btn btn-primary" tabindex="8">Save</button>
</form> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

{{-- @extends('layouts.base')

@section('contenido')
<h2>Crear Sticker </h2>

<form action="/stickers" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form label">Name:</label>
        <input id="name" name="name" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Publisher:</label>
        <input id="publisher" name="publisher" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Description:</label>
        <input id="description" name="description" type="text" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Sticker:</label>
        <input id="tray_image_file" name="tray_image_file" type="text" class="form-control" tabindex="4">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Email:</label>
        <input id="publisher_email" name="publisher_email" type="text" class="form-control" tabindex="5">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Website:</label>
        <input id="publisher_website" name="publisher_website" type="text" class="form-control" tabindex="6">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Tags:</label>
        <input id="tags" name="tags" type="text" class="form-control" tabindex="6">
    </div>
    <a href="/stickers" class="btn btn-secondary" tabindex="7">Cancel</a>
    <button type="submit" class="btn btn-primary" tabindex="8">Save</button>
</form>
@endsection --}}