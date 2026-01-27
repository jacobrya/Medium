<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl mb-4">{{$post->title}}</h1>

                    <div class="flex gap-4 mb-6">
                      <x-user-avatar :user="$post->user" />

                        <div>

                            <x-follow-ctr :user="$post->user" class="flex gap-2">
                                <a href="{{route('profile.show',$post->user)}}" class="hover:underline">{{$post->user->name}}</a>
                                @auth
                                &middot;

                                <a href="#" class="text-emerald-500" x-text="following ? 'Unfollow' : 'Follow' " :class="following ? 'text-red-600' : 'text-emerald-600'" @click="follow()"></a>
                                    @endauth
                            </x-follow-ctr>
                            <div class="flex gap-2 text-sm">
                                <span class="text-gray-500">{{$post->readTime()}} min read</span>
                                &middot;
                                <span>{{$post->created_at->format('M d, Y')}}</span>
                            </div>

                        </div>


                    </div>
                    @if($post->user->id === auth()->id())
                    <div class="mt-4 mb-6 border-t pt-4 border-radius-lg flex gap-4">
                        <x-primary-button href="{{route('post.edit',$post->slug)}}">Edit Post</x-primary-button>
                        <form action="{{route('post.destroy',$post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>Delete Post</x-danger-button>
                        </form>



                    </div>
                    @endif
                    <x-clap-button :count="$post->claps()->count()" :post="$post" />


                    <div class="mt-6">
                        <img class="w-full rounded-lg" src="{{Storage::url($post->image)}}" alt="{{$post->title}}">
                    </div>


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
