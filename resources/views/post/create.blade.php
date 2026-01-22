<x-app-layout>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="mt-4">
                                <x-input-label for="category_id" :value="__('category_id')" />
                                <select id="category_id" name="category_id" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{$category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>

                            <!-- Image-->
                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                                    autofocus />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>

                            <!-- title Address -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                    :value="old('title')"  autofocus />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <!-- content -->
                                <div class="mt-4">
                                    <x-input-label for="Content" :value="__('Content')" />
                                    <x-input-textarea id="Content" class="block mt-1 w-full" name="content">
                                        {{old('content')}}</x-input-textarea>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                </div>
                        </div>
                        <x-primary-button class="mt-4">
                            Submit
                        </x-primary-button>
                    </form>

                </div>
            </div>
        </div>

</x-app-layout>
