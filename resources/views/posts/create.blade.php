<x-layouts.header>
    <x-page-header>
    Post yaratish
    </x-page-header>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action="{{ route('posts.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="control-group mb-4">
                                    <input type="text" class="form-control p-4" name="title" value="{{ old('title') }}" placeholder="Title"/>
                                    @error('title')
                                         <p class="help-block text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="control-group mb-4">
                                    <select  name="category_id" aria-label=".form-select-lg example">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name}}</option>      
                                        @endforeach
                                    </select>
                                    {{-- @error('category')
                                        <p class="help-block text-danger">{{ $message }}</p>
                                     @enderror --}}
                                </div>
                            <div class="control-group mb-4">
                                <textarea class="form-control p-4" rows="3" name="shortContent"  placeholder="Short Content">{{ old('shortContent')}}</textarea>
                                @error('shortContent')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-4">
                                <textarea class="form-control p-4" rows="6" name="content" placeholder="Content">{{ old('content')}}</textarea>
                                @error('content')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <p>Rasm Yuklash</p>
                                <input type="file" placeholder="Rasm yuklash" name="photo">
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