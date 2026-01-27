<x-app-layout>
    <div class="py-4">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <x-category-tabs>
                        No categories
                    </x-category-tabs>
                </div>
            </div>
        </div>
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="mt-8 text-gray 900">
                <div class="p-6 text-gray-900">
                    <h3 class="text-3xl">My Posts</h3>

                    @forelse ($posts as $post)
                        <x-post-item :post="$post"></x-post-item>

                    @empty
                        <div class="text-center text-gray-400">No Posts Found</div>


                    @endforelse
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
