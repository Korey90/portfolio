<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Edit Post: {{ $post->title }}</h2>
                <a href="{{ route('posts.index') }}" class="link">Back to list</a>
            </div>

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label class="form-label" for="title_pl">Title PL:</label>
                <input class="form-control" type="text" id="title_pl" name="title_pl" value="{{ $post->title_pl }}" required>
                <br>
                <label class="form-label" for="title_en">Title EN:</label>
                <input class="form-control" type="text" id="title_en" name="title_en" value="{{ $post->title_en }}" required>
                <br>
                <label class="form-label" for="title_pt">Title PT:</label>
                <input class="form-control" type="text" id="title_pt" name="title_pt" value="{{ $post->title_pt }}" required>
                <br>
                <label class="form-label" for="slug">Slug:</label>
                <input class="form-control" type="text" id="slug" name="slug" value="{{ $post->slug }}" required readonly>
                <br>
                <hr>

                <label class="form-label" for="description_pl">Wstęp PL:</label>
                <textarea class="form-control tinymce-editor" id="description_pl" rows="6" name="description_pl" >{{ $post->description_pl }}</textarea>
                <br>
                <label class="form-label" for="description_en">Wstęp EN:</label>
                <textarea class="form-control tinymce-editor" id="description_en" rows="6" name="description_en" >{{ $post->description_en }}</textarea>
                <br>
                <label class="form-label" for="description_pt">Wstęp PT:</label>
                <textarea class="form-control tinymce-editor" id="description_pt" rows="6" name="description_pt" >{{ $post->description_pt }}</textarea>
                <br>
                <hr>


                <label class="form-label" for="content_pl">Content PL:</label>
                <textarea class="form-control tinymce-editor" id="content_pl" name="content_pl" rows="35" >{{ $post->content_pl }}</textarea>
                <br>
                <label class="form-label" for="content_en">Content EN:</label>
                <textarea class="form-control tinymce-editor" id="content_en" name="content_en" rows="35" >{{ $post->content_en }}</textarea>
                <br>
                <label class="form-label" for="content_pt">Content PT:</label>
                <textarea class="form-control tinymce-editor" id="content_pt" name="content_pt" rows="35" >{{ $post->content_pt }}</textarea>
                <br>
                
                <hr>
                <label class="form-label" for="image">Image:</label>
                <input class="form-control" type="file" id="image" name="image">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100px;">
                @endif
                <br>
                <label class="form-label" for="category_id">Category:</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="active" value="1" id="active" {{ $post->active ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">
                        Tick to make it visible
                    </label>
                </div>
                
                <br>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
        <script src="https://cdn.tiny.cloud/1/k8osdonys9e8786w9eve0t8xqd50808syfmzjs24oh3gilqr/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

        <script>

                tinymce.init({
                    selector: '.tinymce-editor',
                    plugins: 'link image paste codesample',
                    paste_data_images: true,
                    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | indent outdent  | blocks fontfamily fontsize | forecolor backcolor | link | image | codesample',
                    codesample_languages: [
                        {text: 'HTML/XML', value: 'markup'},
                        {text: 'JavaScript', value: 'javascript'},
                        {text: 'CSS', value: 'css'},
                        {text: 'PHP', value: 'php'},
                        {text: 'Python', value: 'python'},
                        {text: 'Ruby', value: 'ruby'},
                        {text: 'Java', value: 'java'},
                        {text: 'C', value: 'c'},
                        {text: 'C#', value: 'csharp'},
                        {text: 'C++', value: 'cpp'}
                    ],
                    content_css: 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.10.0/styles/base16/gruvbox-dark-medium.min.css',
                    content_style: '.hljs { background: #1f1f1f; padding: 0.5em; }'
                });

            $(document).ready(function() {
                $('#title_en').on('keyup', function(){
                //          console.log(stringToSlug(this.value));
                return $('#slug').val(stringToSlug(this.value));
                
                });
            });
        </script>
    @endsection

</x-app-layout>