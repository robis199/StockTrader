<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($company->getName() . ' info') }}
        </h2>
    </x-slot>

<h3> {{$company->getName()}} </h3>

    <img src="{{$company->profile()->getLogo()}}" alt="LOGO" style="width: 50px">

<ul>
    <li>{{$company->getPrice()}}</li>
</ul>


<form method="post" action="{{route('stock.buy', $company->getSymbol())}}">
    @csrf

    <input id="amount" name="amount" type="text" placeholder="Amount">
    <button type="submit" value="buy">Buy stock</button>
</form>




</x-app-layout>
