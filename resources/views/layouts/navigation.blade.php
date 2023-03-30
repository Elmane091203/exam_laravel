<?php
use App\Models\Role_User;
?>
<nav x-data="{ open: false }" class="bar sticky-top border-b border-light-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('premiere') }}" style="width: 125%; height: 30%;">
                        <img src="{{ asset('images/logo.png') }}" style="width: 100%; height: 100%;" alt="logo" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @if (Auth::user())
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link class="text-white" :href="route('acceuil')" :active="request()->routeIs('acceuil')">
                            {{ __('Acceuil') }}
                        </x-nav-link>
                    </div>
                @endif
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('apropos')" :active="request()->routeIs('apropos')" class="text-white">
                        {{ __('A propos') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <x-nav-link class="text-white">
                                <button
                                    class="inline-flex items-center  text-white leading-4 font-medium rounded-md text-gray-500 transition ease-in-out duration-150">
                                    <span>{{ __('Passager') }}</span>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-nav-link>
                        </x-slot>
                        <x-slot name="content" class="w-100">
                            <x-dropdown-link :href="route('passagers.index')">
                                {{ __('Comment ça marche') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('passagers.index')">
                                {{ __('Nos prix & engagements') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <x-nav-link class="text-white">
                                <button
                                    class="inline-flex items-center  text-white leading-4 font-medium rounded-md text-gray-500 transition ease-in-out duration-150">
                                    {{ __('Chauffeur') }}

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-nav-link>
                        </x-slot>
                        <x-slot name="content" class="w-100">
                            <x-dropdown-link :href="route('chauffeur.index')">
                                {{ __('Comment ça marche') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <x-nav-link class="text-white">
                                <button
                                    class="inline-flex items-center  text-white leading-4 font-medium rounded-md text-gray-500 transition ease-in-out duration-150">
                                    {{ __('Inscription') }}

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-nav-link>
                        </x-slot>
                        <x-slot name="content" class="w-100">
                            <x-dropdown-link :href="route('compte.passager')">
                                {{ __('Compte Passager') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('compte.chauffeur')">
                                {{ __('Compte Chauffeur') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                @if (Auth::user())
                    @if (Auth::user()->hasRole('admin'))
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link class="text-white" :href="route('administration')" :active="request()->routeIs('administration')">
                                {{ __('Administation') }}
                            </x-nav-link>
                        </div>
                    @endif
                @endif
                @if (Auth::user())
                @endif
            </div>
            @if (Route::has('login'))
                @auth
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->nom . ' ' . Auth::user()->prenom }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Se Deconnecter') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('login')">
                                    {{ __('Se Connecter') }}
                                </x-dropdown-link>

                                @if (Route::has('register') && count(Role_User::where('role_id', '=', 1)->get()) == 0)
                                    <x-dropdown-link :href="route('register')">
                                        {{ __('Inscription') }}
                                    </x-dropdown-link>
                                @endif
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endauth
            @endif

        </div>
    </div>

</nav>
