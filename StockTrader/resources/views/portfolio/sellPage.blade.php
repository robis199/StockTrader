<x-app-layout>

    <div class="bg-white rounded-lg p-6">
        <h1 class="text-bold"> Stock: {{$stock->company}}</h1>
        <p>Amount of stock you currently hold: {{$stock->amount_acquired}}</p>
    </div>

    <div class="flex flex-row flex-wrap p-3">
        <div class="mx-auto w-2/3">
            <h1 class="text-gray-700 font-bold tracking-wider">Sell Stock</h1>
            <p>{{$stock->amount_bought}}</p>
            <div class="flex flex-wrap">
                <form method="post" action="{{route('stock.sell', $stock)}}">
                    @csrf

                    <input class="top-3" id="amount" name="amount" type="text" placeholder="Amount you want to sell">
                    <button
                        class="bg-yellow-200 hover:bg-yellow-500 hover:text-white text-yellow-500 text-center py-2 px-4 rounded"
                        type="submit" value="buy">Sell stock
                    </button>
                </form>
            </div>
        </div>
    </div>
    @error('balance')
    <p class="text-red-500">{{ $message }}</p>
    @enderror
    @error('amount')
    <p class="text-red-500">{{ $message }}</p>
    @enderror
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
