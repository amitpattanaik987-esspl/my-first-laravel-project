<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="//unpkg.com/alpinejs" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="{{ asset('images/logo.svg') }}" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="flex mt-8 md:mt-0 items-center gap-5">
                @auth
                <button> <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}</span>
                </button>
                <form method="POST" action="/logout" class="inline-flex items-center">
                    @csrf
                    <button type="submit" class="text-xs font-semibold text-blue-600 ml-4">Log Out</button>
                </form>
                <a href="/admin/posts/create" class="text-blue-600">Create Post</a>

                @if(Gate::allows('admin'))
                <a href="/admin/posts" class="text-blue-600">Dashboard</a>
                @endif
                @else
                <a href="/register" class="text-xs font-bold uppercase">REGISTER</a>
                <a href="/login" class="text-xs font-bold uppercase ml-3">LOG IN</a>
                @endauth
            </div>
        </nav>

        {{$slot}}

        <footer id="newsteller" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="{{asset('images/lary-newsletter-icon.svg')}}" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="{{asset('images/mailbox-icon.svg')}}" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    <x-flash />
</body>