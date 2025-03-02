@extends('layout.app')

@section('title', 'Products')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-75">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">название категории</th>
                </tr>
                </thead>
                <tbody>
                @if(count($categoryResource) === 0)
                    <tr>
                        <td colspan="7" class="text-center">Категории не найдены</td>
                    </tr>
                @else
                    @foreach($categoryResource as $category)
                        <tr>
                            <th scope="row" class="text-center" onclick="window.location='{{ route('user.products.show', $category['id']) }}'">{{$category['id']}}</th>
                            <td class="text-center" onclick="window.location='{{ route('user.products.show', $category['id']) }}'" style="cursor: pointer;">{{$category['title']}}</td>
{{--                            @if(auth()->user()->role->title == 'admin')--}}
                            <td class="text-center actions">
                                <a href="{{ route('home') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Обновить</a>
                            </td>

                            <td class="text-center">
                                <form action="{{ route('home') }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="cursor: pointer;"><i class="fas fa-trash"></i> Удалить</button>
                                </form>
                            </td>
{{--                            @endif--}}
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-success">Добавить новую категорию</a>
            </div>
        </div>
    </div>
@endsection
