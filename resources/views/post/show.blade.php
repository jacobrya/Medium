<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl mb-4">{{$post->title}}</h1>

                    <div class="flex gap-4 mb-6">
                      <x-user-avatar :user="$post->user" />

                        <div>
                            <div class="flex gap-2">
                                <a href="{{route('profile.show',$post->user)}}" class="hover:underline">{{$post->user->name}}</a>
                                &middot;
                                <a href="#" class="text-emerald-500">Follow</a>
                            </div>
                            <div class="flex gap-2 text-sm">
                                <span class="text-gray-500">{{$post->readTime()}} min read</span>
                                &middot;
                                <span>{{$post->created_at->format('M d, Y')}}</span>
                            </div>
                        </div>
                    </div>
                    <x-clap-button :post="$post" />

                    {{-- Изображение поста --}}
                    <div class="mt-6">
                        <img class="w-full rounded-lg" src="{{Storage::url($post->image)}}" alt="{{$post->title}}">
                    </div>

                    {{-- Контент поста --}}
                    <div class="mt-6 prose max-w-none mb-10">
                        {!! $post->content !!}
                    </div>
                    <div class="mb-10">
                        <span class="px-4 py-2 bg-gray-200 rounded-lg text-gray-500">{{$post->category->name}}</span>
                    </div>
                    <x-clap-button :post="$post" />


                </div>

            </div>

        </div>
    </div>
</x-app-layout>
