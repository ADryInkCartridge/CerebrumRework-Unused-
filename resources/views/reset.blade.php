@extends('layouts.sidenav')

@section('content')

<div class="p-10">
    <div class="font-medium text-white text-3xl pb-4">Reset All?</div>
    <div class="w-full tambahuserheight bg-white rounded-xl p-10 relative">
        @include('flash-message')
        <form class="flex flex-col gap-y-8 h-full" method="POST" action="{{route('purge')}}">
            @csrf
            <div class="flex flex-1 items-end justify-end  absolute bottom-10 right-10">
                <button class="w-36 h-12 rounded-lg bg-backgroundCerebrum text-white" type="Submit">Reset</button>
            </div>
        </form>
    </div>
</div>


@endsection