<h3> {{$company->getName()}} </h3>

<img src="{{ $company->getLogoUrl() }}" alt="{{ $company->getName() }}"/>

<ul>
    <li>{{$quote->getOpen()}}</li>
    <li>{{$quote->getClose()}}</li>
    <li>{{$quote->getCurrent()}}</li>
</ul>


<form method="post" action="{{route('stocks.buy')}}">
    @csrf
    <button type="submit" value="buy">Buy stock</button>
</form>
