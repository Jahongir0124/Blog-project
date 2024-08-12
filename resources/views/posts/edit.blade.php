<x-layouts.header>
    <x-page-header>
        Post: {{ $post->id }}
    </x-page-header>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="contact-form">
                        <div id="success"></div>
                       
                        <form action="{{ route('posts.update', ['post' => $post->id])}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                <div class="control-group mb-4">
                                    <input type="text" class="form-control p-4" name="title" value="{{ $post->title}}" placeholder="Title"/>
                                    @error('title')
                                         <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            <div class="control-group mb-4">
                                <textarea class="form-control p-4" rows="3" name="shortContent"  placeholder="Short Content">{{ $post->short_content}} {{ old('shortContent')}}</textarea>
                                @error('shortContent')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-4">
                                <textarea class="form-control p-4" rows="6" name="content" placeholder="Content">{{ $post->content }}</textarea>
                                @error('content')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <p>Rasm Yuklash: <a href="{{ asset('storage/'.$post->photo)}}">Joriy rasm</a></p>
                                <input type="file" placeholder="Rasm yuklash" name="photo" value="">
                                @error('photo')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Saqlash</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.header>