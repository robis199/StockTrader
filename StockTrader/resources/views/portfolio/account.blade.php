<div class="rounded-3xl overflow-hidden shadow-xl max-w-xs my-3 bg-blue-500">
    <img src="https://images.unsplash.com/photo-1601382270349-49c15bddf738?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="w-full" />
    <div class="flex justify-center -mt-8">
        <img src="" class="rounded-full border-solid border-white border-2 -mt-3">
    </div>
    <div class="text-center px-3 pb-6 pt-2">
        <h3 class="text-white text-sm bold font-sans">{{ Auth::user()->name }}</h3>
        <p class="mt-2 font-sans font-light text-white">{{ Auth::user()->email }}</p>
    </div>
    <div class="flex justify-center pb-3 text-white">
        <div class="text-center mr-3 border-r pr-3">
            <h2>{{ Auth::user()->cash_balance }}</h2>
            <span>Credit</span>
        </div>
        <div class="text-center">
            <h2>42</h2>
            <span>Trades made</span>
        </div>
    </div>
</div>
