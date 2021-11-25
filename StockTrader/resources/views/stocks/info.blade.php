<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{'Your choice: '. __($company->getName()) }}
        </h2>
    </x-slot>





    <div class="w-screen h-screen bg-white flex flex-row flex-wrap p-3">
        <div class="mx-auto w-2/3">
            <!-- Profile Card -->
            <div class="rounded-lg shadow-lg bg-gray-600 w-full flex flex-row flex-wrap p-3 antialiased" style="

  background-size: cover;
  background-blend-mode: multiply;
">
                <div class="md:w-1/3 w-full">
                    <img class="rounded-lg shadow-lg antialiased" src="{{$company->profile()->getLogo()}}" alt="LOGO" style="width: 50px">
                </div>
                <div class="md:w-2/3 w-full px-3 flex flex-row flex-wrap">
                    <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">
                        <div class="text-2xl text-white leading-tight">{{$company->getName()}}</div>
                        <div class="text-normal text-gray-300"><span class="border-b border-dashed border-gray-500 pb-1">price: {{$company->getPrice()}}</span></div>
                    </div>
                </div>
            </div>




    <div class="flex flex-wrap">
<form method="post" action="{{route('stock.buy', $company->getSymbol())}}">
    @csrf

    <input class="top-3" id="amount" name="amount" type="text" placeholder="Amount">
    <button class="bg-yellow-200 hover:bg-yellow-500 hover:text-white text-yellow-500 text-center py-2 px-4 rounded" type="submit" value="buy">Buy stock</button>
</form>
        @error('credits')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
        </div>
    </div>



</x-app-layout>
