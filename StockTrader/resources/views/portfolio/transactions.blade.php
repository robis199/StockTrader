<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <tbody>
            <tr class="border-b">
                <th class="text-left p-3 px-5">Company</th>
                <th class="text-left p-3 px-5">Price bought</th>
                <th class="text-left p-3 px-5">Amount acquired</th>
                <th class="text-left p-3 px-5">Price sold</th>
                <th class="text-left p-3 px-5">Current price</th>
                <th></th>
            </tr>
            @foreach($stocks as $stock)
                <tr class="bg-blue-100 lg:text-black">
                    <td class="p-3">{{$stock->company}}</td>
                    <td class="p-3">{{$stock->buying_price}}</td>
                    <td class="p-3">{{$stock->amount_acquired}}</td>
                    <td class="p-3">{{$stock->price_sold ?? 'Not yet sold'}}</td>
                    <td class="p-3"></td>

                            <td class="p-3">
                                    <form method="POST" action="{{route('stock.sell', $stock->id)}}">
                                        @csrf
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit" value="sell">Sell</button>
                                    </form>
                            </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
