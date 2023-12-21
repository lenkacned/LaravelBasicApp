@props(['image'])

<!--Any attributes i passsed throue post-card compoinent will be merged here -->
<article

        {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}>
                    <div class="py-6 px-5 h-full flex flex-col">
                        <div>
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Blog Post illustration" class="rounded-xl">
                        </div>

                        <div class="mt-6 flex flex-col justify-between flex-1">
                            <header>
                                <div class="mt-2">
                                    <h1 class="text-3xl clamp one-line">
                                        <a href="/images/{{ $image->slug }}"
                                    >{{$image->title}}</a>
                                    </h1>

                                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{ $image->created_at->diffForhumans() }}</time>
                                    </span>
                                </div>
                            </header>
                            <footer class="flex justify-between mt-8">
                                <div>
                                    <a href="/images/{{ $image->slug }}"
                                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                                    >Open for more</a>
                                    @include ('admin.images._delete-image-form')
                                </div>
                            </footer>
                        </div>
                    </div>
                </article>