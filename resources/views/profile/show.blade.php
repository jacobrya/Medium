<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1 pr-8">
                        <h1 class="text-5xl">{{$user->username}}</h1>
                        <div class="mt-8">
                            @forelse ($posts as $post)
                                <x-post-item :post="$post"></x-post-item>

                            @empty
                                <div class="text-center text-gray-400">No Posts Found</div>


                            @endforelse

                        </div>

                    </div>
                    <div
                        x-data="{
        following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
        followerCount: {{ $user->followers->count() }},
        follow() {
            axios.post('{{ route('follow', $user) }}')
                .then(res => {
                    this.following = !this.following;
                    this.followerCount = res.data.followers_count;
                })
                .catch(err => console.log(err));
        }
    }"
                        class="w-[320px] border-l px-8">

                        <x-user-avatar :user="$user" class="w-32 h-32 rounded-full mb-4"/>
                        <h3>{{$user->name}}</h3>
                        <p class="text-gray-500">
                            <span x-text="followerCount"></span> followers
                        </p>
                        <p>{{$user->bio}}</p>

                        @auth
                            @if(auth()->id() !== $user->id)
                                <div class="mt-4">
                                    <button
                                        @click="follow()"
                                        class="rounded-xl text-white px-4 py-2"
                                        x-text="following ? 'Unfollow' : 'Follow'"
                                        :class="following ? 'bg-red-600 hover:bg-red-700' : 'bg-emerald-600 hover:bg-emerald-700'">
                                    </button>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

