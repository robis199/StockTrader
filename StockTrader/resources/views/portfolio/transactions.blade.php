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
                    <td class="p-3">{{$currentPrices[$stock->company_symbol] ?? 'CURRENTLY UNAVAILABLE'}}</td>
                    <td class="p-3">
                        <a href="{{ route('portfolio.stock' ,$stock) }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" value="sell">Sell</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
