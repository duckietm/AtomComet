<x-app-layout>
    @push('title', 'Create a ticket')

    <x-content.content-card icon="chat-icon" classes="border dark:border-gray-900 col-span-12 lg:col-span-9">
        <x-slot:title>
            {{ __('Edit your ticket') }}
        </x-slot:title>

        <x-slot:under-title>
            {{ __('Please describe your request below') }}
        </x-slot:under-title>

        <form action="{{ route('help-center.ticket.update', $ticket) }}" method="POST">
            @method('PUT')
            @csrf

            <select name="category_id" id="category_id"
                    class="focus:ring-0 border-4 border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:border-[#eeb425] w-full @error('category_id') border-red-600 ring-red-500 @enderror">
                <option value="{{ $ticket->category_id }}" selected>
                    {{ $ticket->category->name }}
                </option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name  }}
                    </option>
                @endforeach
            </select>

            <div class="mt-4 no-tailwind">
                <x-form.label for="password_confirmation">
                    {{ __('Title') }}
                </x-form.label>

                <x-form.input name="title" type="text" value="{{ $ticket->title }}"
                              placeholder="{{ __('Enter a title for your ticket') }}"/>
            </div>

            <x-form.wysiwyg-editor :content="$ticket->content"/>

            <x-form.secondary-button type="submit" classes="mt-4">
                {{ __('Update ticket') }}
            </x-form.secondary-button>
        </form>
    </x-content.content-card>

    <div class="col-span-12 lg:col-span-3">
        <x-content.content-card icon="duo-chat-icon"
                                classes="border dark:border-gray-900 dark:text-gray-100">
            <x-slot:title>
                {{ __('Open tickets') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Your current open tickets') }}
            </x-slot:under-title>


            <div class="flex flex-col gap-2">
                @forelse($openTickets as $ticket)
                    <div class="w-full rounded bg-gray-200 p-2 dark:bg-gray-700">
                        <div class="flex items-center gap-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"/>
                            </svg>

                            <a data-turbolinks="false" href="{{ route('help-center.ticket.show', $ticket) }}" class="hover:text-[#eeb425]">
                                {{ Str::limit($ticket->title, 20) }}
                            </a>
                        </div>
                    </div>
                @empty
                    <p>
                        You currently have no open tickets.
                    </p>

                @endforelse
            </div>
        </x-content.content-card>
    </div>
</x-app-layout>
