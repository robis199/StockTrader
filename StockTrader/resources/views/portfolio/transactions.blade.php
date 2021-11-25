<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>
    <div class="px-3 py-4 flex justify-center flex-flow: column wrap">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
            <tr class="border-b">
                <th class="text-left p-3 px-5">Company</th>
                <th class="text-left p-3 px-5">Price when bought</th>
                <th class="text-left p-3 px-5">Amount acquired</th>
                <th class="text-left p-3 px-5">Price sold</th>
                <th class="text-left p-3 px-5">Current Price</th>
                <th class="text-left p-3 px-5">Quick Sale</th>
            </tr>
            @foreach($stocks as $stock)
                <tr class="bg-blue-100 lg:text-black">
                    <td class="p-3">{{$stock->company}}</td>
                    <td class="p-3">{{$stock->buying_price}}</td>
                    <td class="p-3">{{$stock->amount_acquired}}</td>
                    <td class="p-3">{{$stock->price_sold ?? 'Not yet sold'}}</td>
                    @if($currentPrices[$stock->company_symbol]>$stock->buying_price)
                        <td class="p-3 text-green-600">{{$currentPrices[$stock->company_symbol] ?? 'CURRENTLY UNAVAILABLE'}}</td>
                    @elseif($currentPrices[$stock->company_symbol]===$stock->buying_price)
                        <td class="p-3">{{$currentPrices[$stock->company_symbol] ?? 'CURRENTLY UNAVAILABLE'}}</td>
                    @else
                        <td class="p-3 text-red-600">{{$currentPrices[$stock->company_symbol] ?? 'CURRENTLY UNAVAILABLE'}}</td>
                    @endif
                    <td class="p-3">
                        <a href="{{ route('portfolio.stock' ,$stock) }}">
                            <button class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                                    value="sell">Sell
                            </button>
                        </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-app-layout>
