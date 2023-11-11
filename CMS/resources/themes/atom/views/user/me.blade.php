<x-app-layout>
    @push('title', auth()->user()->username)

    <div class="col-span-12 space-y-3 md:col-span-9">
        <x-user.me-backdrop :user="$user" />

        <div
            class="flex flex-col justify-between gap-3 rounded border bg-white p-1 shadow dark:border-gray-900 dark:bg-gray-800 lg:flex-row">
            <div
                class="py-2 px-2 relative flex justify-center items-center rounded text-sm font-semibold dark:text-gray-300 bg-[#e9b124] dark:border-gray-700">
                <div class="absolute bg-[#e9b124] w-6 h-6 -right-1 rotate-45 invisible lg:visible"></div>
                <img src="{{ asset('/assets/images/icons/online-friends.png') }}" alt="{{ __('Online Friends') }}"
                    class="mr-2 mb-1 inline-flex" style="max-width: 24px; max-height: 24px">
                <span class="relative text-white h-100">{{ __('Online Friends') }}</span>
            </div>

            <div class="relative flex flex-1 items-center justify-center gap-2 pl-2 h-100 sm:justify-start">
                @foreach ($onlineFriends as $friend)
                    <div data-popover-target="friend-{{ $friend->username }}"
                        style="image-rendering: pixelated; background-image: url({{ setting('avatar_imager') }}{{ $friend->look }}&direction=2&head_direction=3&gesture=sml&action=wav&headonly=1&size=s)"
                        class="inline-block h-10 w-10 rounded-full border-2 border-gray-300 bg-center bg-no-repeat dark:border-gray-900">
                    </div>

                    <div data-popover id="friend-{{ $friend->username }}" role="tooltip"
                        class="invisible absolute z-10 inline-block w-64 rounded-lg border border-gray-200 bg-white text-sm font-light text-gray-500 opacity-0 shadow-sm transition-opacity duration-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400">
                        <div
                            class="rounded-t-lg border-b border-gray-200 bg-gray-100 px-3 py-2 dark:border-gray-600 dark:bg-gray-700">
                            <div
                                class="flex w-full items-center justify-center font-semibold text-gray-900 dark:text-white">
                                {{ $friend->username }}
                            </div>
                        </div>
                        <div class="overflow-y-auto px-3 py-2" style="max-height: 200px">
                            <b class="mr-1 font-bold">{{ __('Mission') }}:</b>{{ $friend->motto }}<br>
                            <b
                                class="mr-1 font-bold">{{ __('Online Since') }}:</b>{{ date(config('habbo.site.date_format'), $friend->last_online) }}
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="col-span-12 space-y-4 md:col-span-3">
        <div class="relative w-full" style="height: 213px">
            @if (!$articles->isEmpty())
                <div class="relative swiper articles-slider">
                    <div class="swiper-wrapper">
                        @foreach ($articles as $article)
                            <x-article-card :for-slider="true" :article="$article" />
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination" style="bottom: 0px !important; z-index: 0;"></div>
            @endif
        </div>

        <x-user.discord-widget />
    </div>

    @push('javascript')
        <script>
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
        </script>
    @endpush
</x-app-layout>