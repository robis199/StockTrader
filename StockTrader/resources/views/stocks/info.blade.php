<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

<h3> {{$company->getName()}} </h3>

<img src="{{ $company->getLogoUrl() }}" alt="{{ $company->getName() }}"/>

<ul>
    <li>{{$quote->getOpen()}}</li>
    <li>{{$quote->getClose()}}</li>
    <li>{{$quote->getCurrent()}}</li>
</ul>


<form method="post" action="{{route('company.buy', $company->getSymbol())}}">
    @csrf
    <button type="submit" value="buy">Buy stock</button>
</form>




</x-app-layout>
