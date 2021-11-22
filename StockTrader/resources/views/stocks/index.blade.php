<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trading floor') }}
        </h2>
    </x-slot>

    <form action="{{route('company.search')}}" class="w-full max-w-sm">
        @csrf
        <div class="flex items-center border-b border-teal-500 py-2">
            <input id="company" name="company" type="text" placeholder="Search company by name or symbol"
                   class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                   aria-label="Full name">
            <button type="submit"
                    class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
                Search
            </button>
        </div>
    </form>

    @if (!is_null($companies))
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
            <tr class="border-b">
                <th class="text-left p-3 px-5">Name</th>
                <th class="text-left p-3 px-5">Symbol</th>
                <th></th>
            </tr>
            </tbody>

            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->getName()}}</td>
                    <td>{{ $company->getSymbol() }}</td>
                    <td>{{ $company->getLogoUrl() }}</td>

                    <td>

                        <a class="btn btn-small btn-success" href="{{ route('stocks.info' . $company->getSymbol()) }}">More
                            info</a>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif
</x-app-layout>
