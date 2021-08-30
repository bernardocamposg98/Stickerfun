@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<x-app-layout>
    <div class="py-12 container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <a type="button" href="{{ route('stickers.create') }}" class="bg-indigo-500 px-12 py-2 rounded text-gray-500 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">New</a>
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th data-priority="1" class="border px-4 py-2">ID</th>
                            <th data-priority="2" class="border px-4 py-2">NAME</th>
                            <th data-priority="3" class="border px-4 py-2">PUBLISHER</th>
                            <th data-priority="4" class="border px-4 py-2">DESCRIPTION</th>
                            {{-- <th data-priority="5" class="border px-4 py-2">STICKER</th> --}}
                            <th data-priority="6" class="border px-4 py-2">EMAIL</th>
                            <th data-priority="7" class="border px-4 py-2">WEBSITE</th>
                            <th data-priority="8" class="border px-4 py-2">TAGS</th>
                            <th data-priority="9" class="border px-4 py-2">ACTIONS</th>
                        </tr>  
                    </thead>    
                    <tbody>
                        @foreach ($stickers as $sticker)
                        <tr>
                            <td class="border px-4 py-2">{{$sticker->id}}</td>
                            <td class="border px-4 py-2">{{$sticker->name}}</td>
                            <td class="border px-4 py-2">{{$sticker->publisher}}</td>
                            <td class="border px-4 py-2">{{$sticker->description}}</td>
                            {{-- <td class="border px-4 py-2">
                                <img src="/imagestickerfree/{{$sticker->tray_image_file}}" width="50%">
                            </td> --}}
                            <td class="border px-4 py-2">{{$sticker->publisher_email}}</td>
                            <td class="border px-4 py-2">{{$sticker->publisher_website}}</td>
                            <td class="border px-4 py-2">
                                @foreach ($tags as $tag)
                                @if($tag->sticker_id == $sticker->id)
                                {{$tag->name}}
                                @endif
                                @endforeach
                            </td>           
                            <td class="border px-4 py-2">
                                <div class="flex justify-center rounded-lg text-lg" role="group">
                                    <!-- botón editar -->
                                    <a href="{{ route('stickers.edit', $sticker->id) }}" class="rounded bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4">S</a>
                                    <a href="{{ route('tags.edit', $sticker->id) }}" class="rounded bg-red-500 hover:bg-gray-600 text-white font-bold py-2 px-4">T</a>
                                    <a href="{{ route('stickerpays.edit', $sticker->id) }}" class="rounded bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4">P</a>
                                    <!-- botón borrar -->
                                    {{-- <form action="{{ route('stickers.destroy', $sticker->id) }}" method="POST" class="formEliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded bg-pink-400 hover:bg-pink-500 text-white font-bold py-2 px-4">Hide</button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach   
                    </tbody>           
                </table>   
                <div>
                    {!! $stickers->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    (function () {
    'use strict'
    var forms = document.querySelectorAll('.formEliminar')
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {        
            event.preventDefault()
            event.stopPropagation()        
            Swal.fire({
                    title: 'Do you want to hide the item?',        
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        Swal.fire('¡Hidden!', 'It was hidden correctly.','success');
                    }
                })                      
        }, false)
        })
    })()
</script>
{{-- <a href="stickers/create" class="btn btn-primary mb-3">New</a>
<table id="stickers" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Publisher</th>
            <th scope="col">Description</th>
            <th scope="col">Sticker</th>
            <th scope="col">Email</th>
            <th scope="col">Website</th>
            <th scope="col">Tags</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stickers as $sticker)
        <tr>
            <td>{{ $sticker->id }}</td>
            <td>{{ $sticker->name }}</td>
            <td>{{ $sticker->publisher }}</td>
            <td>{{ $sticker->description }}</td>
            <td  class="border px-14 py-1">
                <img src="/imagestickerfre/{{$sticker->tray_image_file}}" width="60%">
            </td>
            <td>{{ $sticker->publisher_email }}</td>
            <td>{{ $sticker->publisher_website }}</td>
            <td>{{ $sticker->tags }}</td>
            <td>
                <a href="/stickers/{{ $sticker->id }}/edit" class="btn btn-info">Edit</a>
                <form class="formEliminar" action="{{ route ('stickers.destroy',$sticker->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Confirma la eliminación del registro?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script> --}}
@stop
@section('css')

<style>	
    /*Overrides for Tailwind CSS */
    
    /*Form fields*/
    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
        color: #4a5568; 			/*text-gray-700*/
        padding-left: 1rem; 		/*pl-4*/
        padding-right: 1rem; 		/*pl-4*/
        padding-top: .5rem; 		/*pl-2*/
        padding-bottom: .5rem; 		/*pl-2*/
        line-height: 1.25; 			/*leading-tight*/
        border-width: 2px; 			/*border-2*/
        border-radius: .25rem; 		
        border-color: #edf2f7; 		/*border-gray-200*/
        background-color: #edf2f7; 	/*bg-gray-200*/
    }

    /*Row Hover*/
    table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover {
        background-color: #ebf4ff;	/*bg-indigo-100*/
    }
    
    /*Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button		{
        font-weight: 700;				/*font-bold*/
        border-radius: .25rem;			/*rounded*/
        border: 1px solid transparent;	/*border border-transparent*/
    }
    
    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current	{
        color: #fff !important;				/*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06); 	/*shadow*/
        font-weight: 700;					/*font-bold*/
        border-radius: .25rem;				/*rounded*/
        background: #667eea !important;		/*bg-indigo-500*/
        border: 1px solid transparent;		/*border border-transparent*/
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover		{
        color: #fff !important;				/*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);	 /*shadow*/
        font-weight: 700;					/*font-bold*/
        border-radius: .25rem;				/*rounded*/
        background: #667eea !important;		/*bg-indigo-500*/
        border: 1px solid transparent;		/*border border-transparent*/
    }
    
    /*Add padding to bottom border */
    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;	/*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }
    
    /*Change colour of responsive icon*/
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
        background-color: #667eea !important; /*bg-indigo-500*/
    }
    
</style>
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">@stop
@section('js')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                    responsive: true,
                    "lengthMenu": [[5,10,50,-1], [5,10,50, "All"]]
                } )
                .columns.adjust()
                .responsive.recalc();
        });
    </script>
@stop





