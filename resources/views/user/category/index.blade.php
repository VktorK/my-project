
@section('title', 'Categories')

    <x-app-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="w-75">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Название категории</th>
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
                            <th scope="row" class="text-center" >{{$category['id']}}</th>
                            <td class="text-center" style="cursor: pointer;">{{$category['title']}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
        </x-app-layout>
