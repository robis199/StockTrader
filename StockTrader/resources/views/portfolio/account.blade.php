<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <main class="profile-page">
        <section class="">
            <div class=" w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
          ">
                <span id="blackOverlay" class="w-full h-full opacity-50 bg-black"></span>
            </div>
            <div class="left-0 right-0 w-full pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </div>
        </section>
        <section class="py-16 bg-blueGray-200">
            <div class="container mx-auto px-4">
                <div class="">
                    <div class="">
                        <div class="flex flex-wrap justify-center">
                            <div class="flex">
                                <form method="post" class="deposit" action="{{route('portfolio.increaseBalance')}}">
                                    @csrf
                                    <input class="w-29 h-6 text-sm" type="text" name="amount" id="amount" placeholder="Enter amount">
                                    <button class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="submit">
                                        Deposit
                                    </button>
                                </form>
                                </div>
                            </div>
                            <div class="">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">33</span><span class="text-sm text-blueGray-400">Trades made</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ Auth::user()->cash_balance }}$</span><span class="text-sm text-blueGray-400">Account balance</span>
                                    </div>
                                    <div class="lg:mr-4 p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">33</span><span class="text-sm text-blueGray-400">Profit</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                {{ Auth::user()->name }}
                            </h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                                <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                                {{ Auth::user()->email }}
                            </div>

                        </div>
                        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">

                                    <a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="font-normal text-pink-500">Show more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-blueGray-200 pt-8 pb-6 mt-8">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </main>


</x-app-layout>

