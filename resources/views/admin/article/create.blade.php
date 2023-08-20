<x-app-layout title="Add New Post" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <form id="form-post" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @if(session('error'))
                <div
                    class="mt-2 alert flex space-x-2 rounded-lg border border-error px-4 py-4 text-error"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    >
                    <path
                        fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                    />
                    </svg>
                    <p>{{ session('error') }}</p>
                </div>
            @endif
            @if(session('success'))
            <div
                class="mt-2 alert flex rounded-lg border border-success/30 bg-success/10 py-4 px-4 text-success sm:px-5"
            >
                {{ session('success') }}
            </div>
            @endif
            <div class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6">
                <div class="flex items-center space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
                        New Post
                    </h2>
                </div>
                <div class="flex justify-center space-x-2">
                    <button
                        class="btn min-w-[7rem] border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                        Preview
                    </button>
                    <button
                        class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        Save
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                <div class="col-span-12 lg:col-span-8">
                    <div class="card">
                        <div class="tabs flex flex-col">
                            <div class="is-scrollbar-hidden overflow-x-auto">
                                <div class="border-b-2 border-slate-150 dark:border-navy-500">
                                    <div class="tabs-list -mb-0.5 flex">
                                        <button
                                            class="btn h-14 shrink-0 space-x-2 rounded-none border-b-2 border-primary px-4 font-medium text-primary dark:border-accent dark:text-accent-light sm:px-5">
                                            <i class="fa-solid fa-layer-group text-base"></i>
                                            <span>General</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content p-4 sm:p-5">
                                <div class="space-y-5">
                                    <label class="block">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">Title</span>
                                        <input
                                            name="title"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter post title" type="text" />
                                        @error('title')
                                            <span class="text-red-600 text-xs">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <label class="block">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">Caption</span>
                                        <input
                                            name="caption"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter post caption" type="text" />
                                        @error('caption')
                                            <span class="text-red-600 text-xs">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <div>
                                        <span class="font-medium text-slate-600 dark:text-navy-100">Post Content</span>
                                        <div class="mt-1.5 w-full">
                                            <div id="content" class="h-48" x-init="$el._x_quill = new Quill($el, {
                                                modules: {
                                                    toolbar: [
                                                        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                                                        ['blockquote', 'code-block', 'link', 'image'],
                                                        [{ header: 1 }, { header: 2 }], // custom button values
                                                        [{ list: 'ordered' }, { list: 'bullet' }],
                                                        [{ script: 'sub' }, { script: 'super' }], // superscript/subscript
                                                        [{ indent: '-1' }, { indent: '+1' }], // outdent/indent
                                                        [{ direction: 'rtl' }], // text direction
                                                        [{ size: ['small', false, 'large', 'huge'] }], // custom dropdown
                                                        [{ header: [1, 2, 3, 4, 5, 6, false] }],
                                                        [{ color: [] }, { background: [] }], // dropdown with defaults from theme
                                                        [{ font: [] }],
                                                        [{ align: [] }],
                                                        ['clean'], // remove formatting button
                                                    ],
                                                },
                                                placeholder: 'Enter your content...',
                                                theme: 'snow',
                                            })"></div>
                                            <input type="hidden" value="" id="body" name="body">
                                            @error('body')
                                                <span class="text-red-600 text-xs">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <span class="font-medium text-slate-600 dark:text-navy-100">Post Images</span>
                                        <div class="filepond fp-bordered fp-grid mt-1.5 [--fp-grid:2]">
                                            <input type="file" name="image" id="image" x-init="$el._x_filepond=FilePond.create($el, {storeAsFile: true,})"/>
                                        </div>
                                        @error('image')
                                            <span class="text-red-600 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4">
                    <div class="card space-y-5 p-4 sm:p-5">
                        <label class="block">
                            <span class="font-medium text-slate-600 dark:text-navy-100">Select Author</span>
                            <select name="author" id="authorclass="mt-1.5 w-full" x-init="$el._tom = new Tom($el,{create: true,sortField: {field: 'text',direction: 'asc'}})">
                                <option value="Kerel Khalif Afif">Kerel Khalif Afif</option>
                            </select>
                            @error('author')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block">
                            <span class="font-medium text-slate-600 dark:text-navy-100">Category</span>
                            <select id="category" name="category" class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, { create: false, sortField: { field: 'text', direction: 'asc' } })">
                                <option value>Select the category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="block">
                            <span class="font-medium text-slate-600 dark:text-navy-100">Tags</span>
                            <input id="tags" name="tags" class="mt-1.5 w-full" placeholder="Enter Tags" x-init="$el._x_tom = new Tom($el, { create: true })" />
                            @error('tags')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </label>

                        <label>
                            <span class="font-medium text-slate-600 dark:text-navy-100">Publish Date</span>
                            <span class="relative mt-1.5 flex">
                                <input id="publish-date" name="publish_date" x-init="$el._x_flatpickr = flatpickr($el)"
                                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Choose date..." type="text" />
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </span>
                            </span>
                            @error('publish_date')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script type='module'>
        $(document).on('submit', '#form-post', function(e) {
            e.preventDefault();
            $('#body').val($('#content')[0]._x_quill.root.innerHTML)
            e.target.submit();
        })
    </script>
</x-app-layout>
