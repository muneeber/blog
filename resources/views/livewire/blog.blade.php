<div>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">The Blog</h2>
{{--            <p class="mt-1 text-gray-600 dark:text-neutral-400">See how game-changing companies are making the most of every engagement with Preline.</p>--}}
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card -->
            @foreach($posts as $post)

            <a href="{{ route('blog-content',$post->id) }}" class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5 dark:border-neutral-700 dark:hover:border-transparent dark:hover:shadow-black/40 dark:focus:border-transparent dark:focus:shadow-black/40">
                <div class="aspect-w-16 aspect-h-11">
                    <img class="w-full object-cover rounded-xl" src="{{ Storage::url($post->thumbnail)  }}" alt="Blog Image">
                </div>
                <div class="my-6">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-neutral-300 dark:group-hover:text-white">
                        {{ $post->title }}
                    </h3>
                    <p class="mt-5 text-gray-600 dark:text-neutral-400">
                        {{ $post->excerpt }}.
                    </p>
                </div>
                <div class="mt-auto flex items-center gap-x-3">
                    <img class="size-8 rounded-full" src="{{ Storage::url($post->author->avatar) }}" alt="Avatar">
                    <div>
                        <h5 class="text-sm text-gray-800 dark:text-neutral-200">By {{ $post->author->writerName }}</h5>
                    </div>
                </div>
            </a>
            @endforeach

            <!-- End Card -->

            <!-- Card -->

        </div>
        <!-- End Grid -->

        <!-- Card -->

        <!-- End Card -->
    </div>
    <!-- End Card Blog -->
</div>
