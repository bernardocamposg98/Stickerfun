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
                        Edit Tag
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
            <form action="{{ route('tags.update', $sticker->id) }}" method="POST" enctype="multipart/form-data">
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
                <div  class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                    <div id="dynamic_field" class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-black font-semibold">Tags:</label>
                        {{-- <input  name="tags[]" class="name_list py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" required/> --}}
                        <div>
                            <button type="button" name="add" id="add" class="btn btn-success py-2 px-3" value="submit"> Add </button>
                        </div>
                        @foreach ($tags as $tag)
                        <div id="hola{{$tag->id}}">
                            <input value="{{$tag->name}}" name="tags[]" class="name_list py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"/>
                            <button id="{{$tag->id}}" type="button" name="remove"  class="btn btn-danger btn_remove">Delete</button>
                        </div>
                        @endforeach
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
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
<script>
    $(document).ready(function(){
        var i = 1;
        $('#add').click(function (){
            i++;
            $('#dynamic_field').append(
                '<div id="row'+i+'" >' +
                    '<input name="tags[]" class="name_list py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"/>' +
                    '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button>' +
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

