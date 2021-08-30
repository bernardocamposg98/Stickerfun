@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')

<x-app-layout>
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-1">
                    <h2 class="text-center uppercase text-gray-500 text-black font-semibold">
                        Edit Sticker
                    </h2>
                </div>
                <form action="{{ route('stickers.update', $sticker->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Name:</label>
                            <input name="name" value="{{$sticker->name}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Publisher:</label>
                            <input name="publisher" value="{{$sticker->publisher}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Descripción:</label>
                            <input name="description" value="{{$sticker->description}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Email:</label>
                            <input name="publisher_email" value="{{$sticker->publisher_email}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Website:</label>
                            <input name="publisher_website" value="{{$sticker->publisher_website}}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/>
                        </div>
                    </div>

                    <!-- Para ver la imagen seleccionada, de lo contrario no se -->
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        {{-- <img id="imagenSeleccionada" style="max-height: 300px;">            --}}
                        <img src="/imagestickerfree/{{ $sticker->tray_image_file }}" width="100px" id="imagenSeleccionada">
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold mb-1">Upload Sticker</label>
                        <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Select image</p>
                                </div>
                            <input name="tray_image_file" id="imagen" type='file' class="hidden" />
                            </label>
                        </div>
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
{{-- <form action="/stickers/{{$sticker->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form label">Name:</label>
        <input id="name" name="name" type="text" class="form-control" tabindex="1" value="{{$sticker->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Publisher:</label>
        <input id="publisher" name="publisher" type="text" class="form-control" tabindex="2" value="{{$sticker->publisher}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Description:</label>
        <input id="description" name="description" type="text" class="form-control" tabindex="3" value="{{$sticker->description}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Sticker:</label>
        <input id="tray_image_file" name="tray_image_file" type="text" class="form-control" tabindex="4" value="{{$sticker->tray_image_file}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Email:</label>
        <input id="publisher_email" name="publisher_email" type="text" class="form-control" tabindex="5" value="{{$sticker->publisher_email}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Website:</label>
        <input id="publisher_website" name="publisher_website" type="text" class="form-control" tabindex="6" value="{{$sticker->publisher_website}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Tags:</label>
        <input id="tags" name="tags" type="text" class="form-control" tabindex="6" value="{{$sticker->tags}}">
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
<h2>Edit Sticker </h2>

<form action="/stickers/{{$sticker->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form label">Name:</label>
        <input id="name" name="name" type="text" class="form-control" tabindex="1" value="{{$sticker->name}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Publisher:</label>
        <input id="publisher" name="publisher" type="text" class="form-control" tabindex="2" value="{{$sticker->publisher}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Description:</label>
        <input id="description" name="description" type="text" class="form-control" tabindex="3" value="{{$sticker->description}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Sticker:</label>
        <input id="tray_image_file" name="tray_image_file" type="text" class="form-control" tabindex="4" value="{{$sticker->tray_image_file}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Email:</label>
        <input id="publisher_email" name="publisher_email" type="text" class="form-control" tabindex="5" value="{{$sticker->publisher_email}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Website:</label>
        <input id="publisher_website" name="publisher_website" type="text" class="form-control" tabindex="6" value="{{$sticker->publisher_website}}">
    </div>
    <div class="mb-3">
        <label for="" class="form label">Tags:</label>
        <input id="tags" name="tags" type="text" class="form-control" tabindex="6" value="{{$sticker->tags}}">
    </div>
    <a href="/stickers" class="btn btn-secondary" tabindex="7">Cancel</a>
    <button type="submit" class="btn btn-primary" tabindex="8">Save</button>
</form>
@endsection --}}