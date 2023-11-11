<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ setting('hotel_name') }} - {{ __('Maintenance') }}</title>

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

    @vite(['resources/themes/atom/css/app.css', 'resources/themes/atom/js/app.js'])
</head>

<body class="h-screen overflow-hidden" style="background: url({{ asset('assets/images/maintenance/background.png') }})">
    <x-messages.flash-messages />

    <x-modals.modal-wrapper classes="flex flex-col justify-center items-center h-full relative">
        @guest
            <div class="absolute top-6 right-6">
                <button @click="open = !open"
                    class="rounded-full bg-white bg-opacity-70 px-4 py-2 font-semibold text-black transition duration-200 ease-in-out hover:bg-opacity-100">
                    {{ __('Staff login') }}
                </button>
            </div>
        @endguest

        <img src="{{ asset('assets/images/maintenance/pictures.png') }}" alt="{{ setting('hotel_name') }}">

        <div class="text-white">
            <h1 class="text-center text-3xl font-semibold">{{ __('Maintenance') }}</h1>
            <p class="text-center">{{ setting('maintenance_message') }}</p>
        </div>

        <x-modals.regular-modal x-model="show {{ session()->get('wrong-auth') }}">
            <x-auth.login-form />
        </x-modals.regular-modal>
    </x-modals.modal-wrapper>
</body>

</html>
